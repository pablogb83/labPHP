<?php

namespace App\Controllers;


use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Autor;
use App\Models\ClientesautoresModel;
use Config\Services;

use App\Controllers\BaseController;

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
		
		$this->usuarioModel->email = $request->getPost('email');
		$this->usuarioModel->nick = $request->getPost('nick');
		$this->usuarioModel->password = $request->getPost('password');
		$this->usuarioModel->tipo = 'cliente';


		$this->clienteModel->nombre = $request->getPost('nombre');
		$this->clienteModel->apellido = $request->getPost('apellido');
		$this->clienteModel->fechaNac = $request->getPost('fechNac');

		
		$file = $request->getFile('foto');
		$name=$file->getRandomName();
		$this->clienteModel->rutaImg = $name;
		$file->move('images', $name);

		$this->usuarioModel->save();
		$this->usuarioModel->cliente()->save($this->clienteModel);

		return redirect()->to(base_url());
	}

	public function perfil(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$usuario = Usuario::find($id);
		$cliente = Usuario::find($id)->cliente;
		$datos['cliente'] = $cliente;
		$datos['usuario'] = $usuario;
		echo view('header');
		echo view('paginaCliente', $datos);
		echo view('footer');
	}

	public function seguirAutores(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$autor = Usuario::find($id)->autor;
		session_start();
		$id_cliente = $_SESSION['datos_usuario']['id'];
		$cliente = Usuario::find($id_cliente)->cliente;
		$cliente->autores()->save($autor);
		return redirect()->to(base_url().'/paginaAutor?id='. $id);
		
	}
}
