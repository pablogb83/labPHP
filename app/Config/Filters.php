<?php

namespace Config;

use App\Filters\FilterAdmin;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\FilterCliente;
use App\Filters\FilterAutor;
use App\Filters\FilterCompartidas;
use App\Filters\FilterVisitante;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'logincliente'    => FilterCliente::class,
		'loginautor'    => FilterAutor::class,
		'filtervisitante' => FilterVisitante::class,
		'filterCompartidas' => FilterCompartidas::class,
		'filterAdmin' => FilterAdmin::class
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'loginautor' => ['except' => ['/dejarSeguirAutor','/quitarRecursoUsuario','/guardarRecursoCliente','/buscador','/mostrarRecursosCategoria','/registrarCategoriaHija','/nuevaCategoriaHija','/adminPage', '/loginpage', '/', '/registrarse', '/login','/perfilUsuario', '/logout', '/paginaAutor', '/paginaCliente','/paginaRecurso', '/admin','/loginAdmin', '/listaAutores','/listaClientes','/borrar','/editar','/actualizar','/listaCategorias','/nuevaCategoria','/registrarCategoria','/borrarCategoria','/editarCategoria','/actualizarCategoria','/perfilAutor','/registrarAutor','/perfilCliente','/registrarCliente','/seguirAutor','/suscribirse','/suscripExito']],
			'logincliente' =>['except' => ['/buscador','/mostrarRecursosCategoria','/registrarCategoriaHija','/nuevaCategoriaHija','/adminPage','/loginpage', '/', '/registrarse', '/login','/perfilUsuario', '/logout', '/paginaAutor', '/paginaCliente','/paginaRecurso', '/admin','/loginAdmin', '/listaAutores','/listaClientes','/borrar','/editar','/actualizar','/listaCategorias','/nuevaCategoria','/registrarCategoria','/borrarCategoria','/editarCategoria','/actualizarCategoria','/perfilAutor','/registrarAutor','/perfilCliente','/registrarCliente','/nuevoRecurso','/registrarRecurso']],
			'filtervisitante' => ['except' => ['/dejarSeguirAutor','/quitarRecursoUsuario','/guardarRecursoCliente','/buscador','/mostrarRecursosCategoria','/registrarCategoriaHija','/nuevaCategoriaHija','/adminPage','/','/perfilUsuario', '/logout', '/paginaAutor', '/paginaCliente','/paginaRecurso','/listaAutores','/listaClientes','/borrar','/editar','/actualizar','/listaCategorias','/nuevaCategoria','/registrarCategoria','/borrarCategoria','/editarCategoria','/actualizarCategoria','/nuevoRecurso','/registrarRecurso', '/suscribirse']],
			'filterAdmin' => ['except' => ['/dejarSeguirAutor','/quitarRecursoUsuario','/guardarRecursoCliente','/buscador','/mostrarRecursosCategoria','/loginpage', '/', '/registrarse', '/login','/perfilUsuario', '/logout', '/paginaAutor', '/paginaCliente','/paginaRecurso', '/admin','/loginAdmin','/perfilAutor','/registrarAutor','/perfilCliente','/registrarCliente','/seguirAutor','/suscribirse','/suscripExito', '/nuevoRecurso','/registrarRecurso']],
			'filterCompartidas' => ['except' => ['/dejarSeguirAutor','/quitarRecursoUsuario','/guardarRecursoCliente','/registrarCategoriaHija','/nuevaCategoriaHija','/adminPage','/loginpage', '/registrarse', '/login', '/logout', '/admin','/loginAdmin', '/listaAutores','/listaClientes','/borrar','/editar','/actualizar','/listaCategorias','/nuevaCategoria','/registrarCategoria','/borrarCategoria','/editarCategoria','/actualizarCategoria','/perfilAutor','/registrarAutor','/perfilCliente','/registrarCliente','/seguirAutor','/suscribirse','/suscripExito','/nuevoRecurso','/registrarRecurso']]
			//'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
