<?php

namespace App\Controllers;


use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Autor;
use Config\Services;

use App\Controllers\BaseController;
use App\Models\Recurso;
use Exception;

class ClienteController extends BaseController
{

	protected $clienteModel;
	protected $usuarioModel;

	public function __construct()
	{
		$this->clienteModel = new Cliente();
		$this->usuarioModel = new Usuario();
	}

	public function index()
	{
		echo view('header');
		echo view('registrarCliente');
		echo view('footer');
	}

	public function guardar(){
		
		$request = Services::request();

		if (! $this->validate([
			'email' => "required|is_unique[usuarios.email]",
			'nick' => "required|is_unique[usuarios.nick]",
			'password' => "required",
			'passwordConf' => "required|matches[password]"
			//'nombre'  => 'required|alpha_numeric_spaces'
		],[   // Errors
			'email' => [
				'required' => 'El email es obligatorio',
				'is_unique' => 'Ya existe un usuario con ese email'
			],
			'nick' => [
				'required' => 'El nick es obligatorio',
				'is_unique' => 'Ya existe un usuario con ese nick'
			],
			'passwordConf' => [
				'required' => 'Por favor re ingresa tu password',
				'matches' => 'Los password no coinciden'
			],
			'password' => [
				'required' => 'Por favor ingresa tu password',
			]
		]))
		{
			echo view('header');
			echo view('_errors_list', [
				'errors' => $this->validator->getErrors()
			]);
			echo view('registrarCliente');
			echo view('footer');
		}else{

			$email = $request->getPost('email');

			$this->usuarioModel->email = $email;
			$this->usuarioModel->nick = $request->getPost('nick');
			
			$this->usuarioModel->password =password_hash($request->getPost('password'),PASSWORD_ARGON2I);
			$this->usuarioModel->tipo = 'cliente';

			$this->clienteModel->nombre = $request->getPost('nombre');
			$this->clienteModel->apellido = $request->getPost('apellido');
			$this->clienteModel->fechaNac = $request->getPost('fechNac');
			
			$file = $request->getFile('foto');
			if(!$file->isValid()){
				$this->clienteModel->rutaImg = 'default.png';
			}else{
				$name=$file->getRandomName();
				$this->clienteModel->rutaImg = $name;
				$file->move('images', $name);
			}
			$this->usuarioModel->save();
			$this->usuarioModel->cliente()->save($this->clienteModel);

			//loguear al usuario recien registrado
			
			$usuario = $usuario=$this->usuarioModel->where('email',$email)->first();
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$_SESSION['logueado'] = true;
			$_SESSION['datos_usuario'] = array(
				"id"	=> $usuario->id,
				"nick" => $usuario->nick,
				"tipo" => $usuario->tipo,
				"email"	=> $usuario->email
			);
			
			$this->usuarioModel->enviarEmail($this->usuarioModel->nick);

			echo view('header');
			echo view('userRegExito');
			echo view('footer');
			//return redirect()->to(base_url());
		}
	}

	public function perfil(){
		
		try{
			$request = Services::request();
			$id = $request->getPostGet('id');
			$usuario = Usuario::find($id);
			$cliente = Usuario::find($id)->cliente;
			$autores = $cliente->autores;
			$datos['cliente'] = $cliente;
			$datos['usuario'] = $usuario;
			$datos['autores'] = $autores;
			echo view('header');
			echo view('paginaCliente', $datos);
			echo view('footer');
		}catch(Exception $e){
			$message = 'Parece que este usuario no existe';
			$message = array('message' => $message);
			echo view('header');
			echo view('errors/html/error_404',$message);
			echo view('footer');
		}

	}

	public function seguirAutores(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$autor = Usuario::find($id)->autor;
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$id_cliente = $_SESSION['datos_usuario']['id'];
		$cliente = Usuario::find($id_cliente)->cliente;
		if($cliente->autores()->find($autor->id)==null){
			$cliente->autores()->save($autor);
		}
		return redirect()->to(base_url().'/paginaAutor?id='. $id);
		
	}

	public function dejarSeguirAutor(){
		$origen =  $_SERVER['HTTP_REFERER'];
	
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$autor = Autor::find($id);
		$usuario = Usuario::find($_SESSION['datos_usuario']['id']);
		$cliente = $usuario->cliente;
		$cliente->autores()->detach($autor->id);
		if(strpos($origen, "Cliente") != false){
			return redirect()->to(base_url().'/paginaCliente?id='. $_SESSION['datos_usuario']['id']);
		}else{
			return redirect()->to(base_url().'/paginaAutor?id='. $autor->usuario->id);
		}
		
		
	}

	public function formSuscrip(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$cliente = Usuario::find($id)->cliente;
		$datos=['usuario' => $usuario,
				'cliente' => $cliente
				];
		echo view('header');
		echo view('paginaSuscripcion', $datos);
		echo view('footer');

	}

	public function SuscripExito(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$cliente = Usuario::find($id)->cliente;
		$cliente->suscripto = true;
		$cliente->save();
		$datos=['usuario' => $usuario,
				'cliente' => $cliente
				];
		echo view('header');
		echo view('regresoSuscrip', $datos);
		echo view('footer');
	}

	public function guardarRecurso(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$recurso = Recurso::find($id);

		$usuario = Usuario::find($_SESSION['datos_usuario']['id']);
		$cliente = $usuario->cliente;
		if($cliente->recursos()->find($recurso->id)==null){
			$cliente->recursos()->save($recurso);
		}
		return redirect()->to(base_url().'/paginaRecurso?id='. $id);
	}

	public function borrarRecurso(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$recurso = Recurso::find($id);

		$usuario = Usuario::find($_SESSION['datos_usuario']['id']);
		$cliente = $usuario->cliente;
		$cliente->recursos()->detach($recurso->id);
		return redirect()->to(base_url().'/paginaCliente?id='. $_SESSION['datos_usuario']['id']);
	}

	public function paginaEditar()
	{
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$cliente = $usuario->cliente;
		$datos['cliente'] = $cliente;
		$datos['usuario'] = $usuario;
		echo view('header');
		echo view('paginaEditarCliente', $datos);
		echo view('footer');
	}

	public function editar()
	{
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$cliente = $usuario->cliente;
		$cliente->nombre = $request->getPost('nombre');
		$cliente->apellido = $request->getPost('apellido');
		$cliente->fechaNac = $request->getPost('fechNac');

		$file = $request->getFile('foto');
		if ($file->isValid()) {
			$name = $file->getRandomName();
			$cliente->rutaImg = $name;
			$file->move('images', $name);
		}
			
		$cliente->save();
		return redirect()->to(base_url().'/paginaCliente?id='. $id);
	}

}
