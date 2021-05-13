<?php

namespace App\Controllers;

use App\Entities\Autor;
use App\Models\AutorModel;
use App\Models\UsuarioModel;
use Config\Services;

use App\Controllers\BaseController;

class AutorController extends BaseController
{

	protected $autorModel;

	public function __construct()
	{
		$this->autorModel = new AutorModel($db);
	}

	public function index()
	{
		echo view('header');
		echo view('registrarAutor');
		echo view('footer');
	}

	public function guardar(){
		$request = Services::request();
		$autor = new Autor();
		
		$id = $request->getPost('id');
		$autor->id_usuario=$id;
		$autor->nombre = $request->getPost('nombre');
		$autor->apellido = $request->getPost('apellido');
		$autor->biografia = $request->getPost('biografia');

		
		$file = $request->getFile('foto');
		$name=$file->getRandomName();
		$autor->rutaImg = $name;
		$file->move('images', $name);

		/*
		$data = $request->getPost();
		$usuario->fill($data);*/

		$usuarioModel = new UsuarioModel($db);
		$usuarioModel->update($id,['tipo'=>'autor']);
		session_start();
		$_SESSION['datos_usuario']['tipo'] = 'autor';
		$this->autorModel->save($autor);
		return redirect()->to(base_url());
		echo $autor->nick_usuario;
	}

	public function perfil(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$autor = $this->autorModel->find($id);
		//var_dump($id);
		$usuarioModel = new UsuarioModel();
		$usuario = $usuarioModel->find($autor->id_usuario);
		$datos['autor'] = $autor;
		$datos['usuario'] = $usuario;
		echo view('header');
		echo view('paginaAutor', $datos);
		echo view('footer');
	}
}
