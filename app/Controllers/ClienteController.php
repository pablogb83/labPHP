<?php

namespace App\Controllers;

use App\Entities\Cliente;
use App\Models\ClienteModel;
use App\Models\UsuarioModel;
use Config\Services;

use App\Controllers\BaseController;

class ClienteController extends BaseController
{

	protected $clienteModel;

	public function __construct()
	{
		$this->clienteModel = new ClienteModel($db);
	}

	public function index()
	{
		echo view('header');
		echo view('registrarCliente');
		echo view('footer');
	}

	public function guardar(){
		$request = Services::request();
		$cliente = new Cliente();
		
		$id = $request->getPost('id');
		$cliente->id_usuario=$id;
		$cliente->nombre = $request->getPost('nombre');
		$cliente->apellido = $request->getPost('apellido');
		$cliente->fechaNac = $request->getPost('fechNac');

		
		$file = $request->getFile('foto');
		$name=$file->getRandomName();
		$cliente->rutaImg = $name;
		$file->move('images', $name);

		/*
		$data = $request->getPost();
		$usuario->fill($data);*/

		$usuarioModel = new UsuarioModel($db);
		$usuarioModel->update($id,['tipo'=>'cliente']);
		session_start();
		$_SESSION['datos_usuario']['tipo'] = 'cliente';
		$this->clienteModel->save($cliente);
		return redirect()->to(base_url());
		//echo $cliente->nick_usuario;
	}
}
