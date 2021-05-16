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

		return redirect()->to(base_url());
	}

	public function perfil(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$autor = Usuario::find($id)->autor;
		$datos['autor'] = $autor;
		$datos['usuario'] = $usuario;
		echo view('header');
		echo view('paginaAutor', $datos);
		echo view('footer');
	}
}
