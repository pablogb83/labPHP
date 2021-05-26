<?php

namespace App\Controllers;

use App\Models\Autor;
use App\Models\Usuario;
use Config\Services;

use App\Controllers\BaseController;

class AutorController extends BaseController
{

	protected $autorModel;
	protected $usuarioModel;

	public function __construct()
	{
		$this->autorModel = new Autor();
		$this->usuarioModel = new Usuario();
	}

	public function index()
	{
		echo view('header');
		echo view('registrarAutor');
		echo view('footer');
	}

	public function guardar(){
		
		$request = Services::request();

		if (! $this->validate([
			'email' => "required|is_unique[usuarios.email]",
			'nick' => "required|is_unique[usuarios.nick]",
			'password' => "required",
			'passwordConf' => "required|matches[password]",
			//'foto' => "uploaded[foto]|is_image",
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
			echo view('registrarAutor');
			echo view('footer');
		}else{
		
			$this->usuarioModel->email = $request->getPost('email');
			$this->usuarioModel->nick = $request->getPost('nick');
			$this->usuarioModel->password = $request->getPost('password');
			$this->usuarioModel->tipo = 'autor';


			$this->autorModel->nombre = $request->getPost('nombre');
			$this->autorModel->apellido = $request->getPost('apellido');
			$this->autorModel->biografia = $request->getPost('biografia');

			
			$file = $request->getFile('foto');
			$name=$file->getRandomName();
			$this->autorModel->rutaImg = $name;
			$file->move('images', $name);

			$this->usuarioModel->save();
			$this->usuarioModel->autor()->save($this->autorModel);

			echo view('header');
			echo view('userRegExito');
			echo view('footer');
		}
	}

	public function perfil(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$autor = Usuario::find($id)->autor;
		$clientes = Autor::find($autor->id)->clientes()->get();
		$datos['autor'] = $autor;
		$datos['usuario'] = $usuario;
		$datos['clientes'] = $clientes;
		echo view('header');
		echo view('paginaAutor', $datos);
		echo view('footer');
	}
	/*
	public function seguidores(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$autor = Usuario::find($id)->autor;
		$clientes = Autor::find($autor->id)->clientes()->get();
	}*/
}
