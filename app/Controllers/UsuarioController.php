<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Usuario;
use App\Models\UsuarioModel;
use Config\Services;

class UsuarioController extends BaseController
{

	protected $usuarioModel;

	public function __construct()
	{
		$this->usuarioModel = new UsuarioModel($db);
	}

	public function index(){

	}

	public function guardar()
	{	
		//$usuarioModel = new UsuarioModel($db);
		$request = Services::request();
		$usuario = new Usuario();
		

		
		$usuario->email = $request->getPost('email');
		$usuario->nick = $request->getPost('nick');
		$usuario->password = $request->getPost('password');

		/*
		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$usuario->rutaImg = $name;
		$file->move('images', $name);*/

		/*
		$data = $request->getPost();
		$usuario->fill($data);*/
		$this->usuarioModel->save($usuario);
		return redirect()->to(base_url());
	}

	public function login(){
		//$usuarioModel = new UsuarioModel($db);
		$request = Services::request();
		//$usuario = new Usuario();
		$pass=$request->getPost('password');
		$email=$request->getPost('email');
		$usuario=$this->usuarioModel->asArray()->where('password', $pass)
		->where('email',$email)
		->findAll();
		//$user=array('user'=>$usuario);
		//var_dump($usuario);
		//$usuario = new Usuario($data);
		//echo  'El usuarios encontrado es' . $usuario[0]['nick'];
		
		if($usuario!=null){
			session_start();
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
		session_start();
		unset($_SESSION['logueado']);
		unset($_SESSION['datos_usuario']);
		session_destroy();
		// Redirect
		return redirect()->to(base_url()); 
	}

	public function listarAutores(){
		//$usuarioModel = new UsuarioModel($db);
		$usuarios=$this->usuarioModel->where('tipo', 'autor')->findAll();
		$usuarios = array('usuarios'=>$usuarios);
		echo view('headerAdmin');
		echo view('listaAutoresAdmin', $usuarios);
		echo view('footerAdmin');
		//return view('listaUsuarios', $usuarios);
	}

	public function listarClientes(){
		//$usuarioModel = new UsuarioModel($db);
		$usuarios=$this->usuarioModel->where('tipo', 'cliente')->findAll();
		$usuarios = array('usuarios'=>$usuarios);
		echo view('headerAdmin');
		echo view('listaClientesAdmin', $usuarios);
		echo view('footerAdmin');
		//return view('listaUsuarios', $usuarios);
	}

	public function borrar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		//$usuarioModel = new UsuarioModel($db);
		$usuario = $this->usuarioModel->find($id);
		$tipo = $usuario->tipo;
		$this->usuarioModel->delete($id);
		//$usuarios=$this->usuarioModel->findAll();
		//$usuarios = array('usuarios'=>$usuarios);
		//return view('listaUsuarios', $usuarios);
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
		//$usuarioModel = new UsuarioModel($db);
		$user = $this->usuarioModel->find($id);
		$user=array('user'=>$user);
		echo view('headerAdmin');
		echo view('formEditar', $user);
		echo view('footerAdmin');
		
		
		//echo "esto es editar";
	}

	public function actualizar(){
		

		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		//$usuarioModel = new UsuarioModel($db);
		//$usuario = $this->usuarioModel->find($id);
		$data = $request->getPost();
		//$usuario->fill($data);
		$this->usuarioModel->update($id,$data);
		//$usuarios=$this->usuarioModel->findAll();
		//$usuarios = array('usuarios'=>$usuarios);
		//return view('listaUsuarios', $usuarios);
		$usuario = $this->usuarioModel->find($id);
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
