<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Recurso;
use App\Models\Usuario;
use App\Models\Comentario;
use Config\Services;


class ComentarioController extends BaseController
{
	protected $comentario;

	public function __construct()
	{
		$this->comentario = new Comentario();
	}

	public function index()
	{
	}

	public function guardar()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$request = Services::request();
		$id = $request->getPostGet('id');
		$nota = $request->getPostGet('nota');
		if ($nota <= 5 and $nota >= 1) {
			//$comentario = $request->getPostGet('comentario');
			$rec = Recurso::find($id);

			$usuario = Usuario::find($_SESSION['datos_usuario']['id']);
			$cliente = $usuario->cliente;
			$this->comentario->cliente_id = $cliente->id;
			$this->comentario->recurso_id = $request->getPostGet('id');
			$this->comentario->nota = $request->getPostGet('nota');
			$this->comentario->texto = $request->getPostGet('comentario');
			$this->comentario->save();
			$totalcalif = $rec->comentarios->count();
			$nuevaNota = ($rec->nota + $nota) / $totalcalif;
			$rec->nota = $nuevaNota;
			$rec->save();
		}

		return redirect()->to(base_url() . '/paginaRecurso?id=' . $id);
		//echo 'el recurso a comentar es: ' . $rec->nombre . '<br>';
		//echo 'el comentario es: ' . $comentario . '<br>';
		//echo 'y nota es: ' . $nota . '<br>';

	}
}
