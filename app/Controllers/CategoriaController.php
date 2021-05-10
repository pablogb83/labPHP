<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Entities\Categoria;
use Config\Services;

class CategoriaController extends BaseController
{
	protected $categoriaModel;

	public function __construct()
	{
		$this->categoriaModel = new CategoriaModel($db);
	}

	
	public function index()
	{
		$categorias=$this->categoriaModel->findAll();
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
		$categoria = new Categoria();
		$categoria->nombre = $request->getPost('nombre');

		$file = $request->getFile('rutaFoto');
		$name=$file->getRandomName();
		$categoria->rutaImg = $name;
		$file->move('images', $name);

		$this->categoriaModel->save($categoria);
		return redirect()->to(base_url().'/listaCategorias');

	}

	public function borrar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$this->categoriaModel->delete($id);
		return redirect()->to(base_url().'/listaCategorias');
	}

	public function editar(){
		$request = Services::request();
		$id = $request->getPostGet('id');
		$categoria = $this->categoriaModel->find($id);
		$categoria=array('categoria'=>$categoria);
		echo view('headerAdmin');
		echo view('editarCategoria', $categoria);
		echo view('footerAdmin');
	}

	public function actualizar(){
		$request = \Config\Services::request();
		$id = $request->getPost('id');
		$data = $request->getPost();
		$this->categoriaModel->update($id,$data);
		return redirect()->to(base_url().'/listaCategorias');
	}
}
