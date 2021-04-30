<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Usuario;
use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{

	public function guardar()
	{	
		$usuarioModel = new UsuarioModel($db);
		$request = \Config\Services::request();
		$usuario = new Usuario();
		

		$usuario->nombre=$request->getPost('nombre');
		$usuario->email = $request->getPost('email');
		$usuario->apellido = $request->getPost('apellido');
		$usuario->nick = $request->getPost('nick');
		$usuario->fechaNac = $request->getPost('fnac');
		$usuario->password = $request->getPost('password');

		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$usuario->rutaImg = $name;
		$file->move('images', $name);

		/*
		$data = $request->getPost();
		$usuario->fill($data);*/
		$usuarioModel->save($usuario);
		return view('paginainicio');
	}

	public function login(){
		$usuarioModel = new UsuarioModel($db);
		$request = \Config\Services::request();
		$usuario = new Usuario();
		$pass=$request->getPost('password');
		$email=$request->getPost('email');
		$usuario=$usuarioModel->where('password', $pass)
		->where('email',$email)
		->findAll();
		if($usuario!=null){
			echo "Bienvenido ";
		}else{
			echo "Usuario no registrado";
		}
	}

	public function listar(){
		$usuarioModel = new UsuarioModel($db);
		$usuarios=$usuarioModel->findAll();
		$usuarios = array('usuarios'=>$usuarios);
		return view('listaUsuarios', $usuarios);
	}

	public function borrar(){
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$usuarioModel = new UsuarioModel($db);
		$usuarioModel->delete($id);
		$usuarios=$usuarioModel->findAll();
		$usuarios = array('usuarios'=>$usuarios);
		return view('listaUsuarios', $usuarios);
	}

	public function editar(){
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$usuarioModel = new UsuarioModel($db);
		$user = $usuarioModel->find($id);
		$user=array('user'=>$user);
		return view('formEditar', $user);
		//echo "esto es editar";
	}

	public function actualizar(){
		
		echo "No esta implementado, ya me pondre a ello!! </br>";
		echo "A.Z";
		/*
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$usuarioModel = new UsuarioModel($db);
		$usuario = $usuarioModel->find($id);
		$data = $request->getPost();
		$usuario->fill($data);
		$usuarioModel->save($data);
		$usuarios=$usuarioModel->findAll();
		$usuarios = array('usuarios'=>$usuarios);
		return view('listaUsuarios', $usuarios);
		*/
	}
}
