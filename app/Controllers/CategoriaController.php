<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categoria;
use Config\Services;

class CategoriaController extends BaseController
{
	protected $categoria;

	public function __construct()
	{
		$this->categoria = new Categoria();
	}

	
	public function index()
	{
		$categorias=$this->categoria->get();
		$categorias = array('categorias'=>$categorias);
		echo view('headerAdmin');
		echo view('listaCategoriasAdmin', $categorias);
		echo view('footerAdmin');
	}

	public function nueva(){
		
		echo view('headerAdmin');
		echo view('nuevaCategoria');
		echo view('footerAdmin');
	}

	public function guardar(){

		$request = Services::request();
		$this->categoria->nombre = $request->getPost('nombre');

		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$this->categoria->rutaImg = $name;
		$file->move('images', $name);

		$this->categoria->save();
		return redirect()->to(base_url().'/listaCategorias');

	}

	public function borrar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$categoria = $this->categoria::find($id);
		$categoria->delete();
		return redirect()->to(base_url().'/listaCategorias');
	}

	public function editar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$categoria = $this->categoria->find($id);
		$categoria=array('categoria'=>$categoria);
		echo view('headerAdmin');
		echo view('editarCategoria', $categoria);
		echo view('footerAdmin');
	}

	public function actualizar(){
		$request = \Config\Services::request();
		$id = $request->getPost('id');
		$categoria = $this->categoria->find($id);
		$categoria->nombre = $request->getPost('nombre');
		$categoria->save();
		return redirect()->to(base_url().'/listaCategorias');
	}
}
