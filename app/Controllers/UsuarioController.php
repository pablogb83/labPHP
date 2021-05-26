<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Autor;
use App\Models\Usuario;
use Config\Services;

class UsuarioController extends BaseController
{

	protected $usuarioModel;

	public function __construct()
	{
		$this->usuarioModel = new Usuario();
	}


	public function index(){

	}
	//esta funcion no esta en uso
	public function guardar()
	{	
		//$usuarioModel = new UsuarioModel($db);
		$request = Services::request();
		$usuario = new Usuario();
		

		
		$this->usuarioModel->email = $request->getPost('email');
		$this->usuarioModel->nick = $request->getPost('nick');
		$this->usuarioModel->password = $request->getPost('password');

		/*
		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$usuario->rutaImg = $name;
		$file->move('images', $name);*/

		/*
		$data = $request->getPost();
		$usuario->fill($data);*/
		$this->usuarioModel->save();
		$usuario = $this->usuarioModel->asArray()->where('nick',$usuario->nick)->find();
		if($usuario!=null){
			session_start();
			$_SESSION['logueado'] = true;
			$_SESSION['datos_usuario'] = array(
				"id"	=> $usuario[0]['id'],
				"nick" => $usuario[0]['nick'],
				"tipo" => $usuario[0]['tipo'],
				"email"	=> $usuario[0]['email']
			);
		}
		//return redirect()->to(base_url());
		return redirect()->to(base_url().'/completarPerfil');
	}

	public function login(){
		//$usuarioModel = new UsuarioModel($db);
		$request = Services::request();
		//$usuario = new Usuario();
		$pass=$request->getPost('password');
		$email=$request->getPost('email');
		$usuario=$this->usuarioModel->where('password', $pass)
									->where('email',$email)
									->get();
		//$user=array('user'=>$usuario);
		//var_dump($usuario);
		//$usuario = new Usuario($data);
		//echo  'El usuarios encontrado es' . $usuario[0]['nick'];
		
		if($usuario!=null){
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$_SESSION['logueado'] = true;
			$_SESSION['datos_usuario'] = array(
				"id"	=> $usuario[0]['id'],
				"nick" => $usuario[0]['nick'],
				"tipo" => $usuario[0]['tipo'],
				"email"	=> $usuario[0]['email']
			);
			return redirect()->to(base_url());
		}else{
			return redirect()->to(base_url().'/login');
		}
	}

	public function logout(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		unset($_SESSION['logueado']);
		unset($_SESSION['datos_usuario']);
		session_destroy();
		// Redirect
		return redirect()->to(base_url()); 
	}

	public function listarAutores(){
		$usuarios=Usuario::where('tipo', 'autor')->get();
		$usuarios = array('usuarios'=>$usuarios);
		echo view('headerAdmin');
		echo view('listaAutoresAdmin', $usuarios);
		echo view('footerAdmin');
	}

	public function listarClientes(){
		$usuarios=Usuario::where('tipo', 'cliente')->get();
		$usuarios = array('usuarios'=>$usuarios);
		echo view('headerAdmin');
		echo view('listaClientesAdmin', $usuarios);
		echo view('footerAdmin');
	}

	public function borrar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$tipo = $usuario->tipo;
		if($tipo == 'autor'){
			$usuario->autor->delete();
		}else{
			$usuario->cliente->delete();
		}
		$usuario->delete();
		switch($tipo){
			case 'autor':
				return redirect()->to(base_url().'/listaAutores');
				break;
			case 'cliente':
				return redirect()->to(base_url().'/listaClientes');
				break;
		}
	}

	public function editar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$user = $this->usuarioModel->find($id);
		$user=array('user'=>$user);
		echo view('headerAdmin');
		echo view('formEditar', $user);
		echo view('footerAdmin');
	}

	public function actualizar(){
		
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$usuario->nick = $request->getPost('nick');
		$usuario->email = $request->getPost('email');
		$usuario->password = $request->getPost('password');
		$usuario->save();
		$tipo = $usuario->tipo;
		switch($tipo){
			case 'autor':
				return redirect()->to(base_url().'/listaAutores');
				break;
			case 'cliente':
				return redirect()->to(base_url().'/listaClientes');
				break;
		}
	}
}
