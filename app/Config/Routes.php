<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/', 'MainController::index');
$routes->get('/loginpage', 'MainController::loginPage');
$routes->get('/admin', 'MainController::adminPage');
$routes->get('/registrarse', 'MainController::seleccionarPerfil');
$routes->post('/login', 'UsuarioController::login');
$routes->get('/logout', 'UsuarioController::logout');
$routes->get('/listaAutores', 'UsuarioController::listarAutores');
$routes->get('/listaClientes', 'UsuarioController::listarClientes');
$routes->get('/borrar', 'UsuarioController::borrar');
$routes->get('/editar', 'UsuarioController::editar');
$routes->post('/actualizar', 'UsuarioController::actualizar');
$routes->get('/listaCategorias', 'CategoriaController::index');
$routes->get('/nuevaCategoria', 'CategoriaController::nueva');
$routes->post('/registrarCategoria', 'CategoriaController::guardar');
$routes->get('/borrarCategoria', 'CategoriaController::borrar');
$routes->get('/editarCategoria', 'CategoriaController::editar');
$routes->post('/actualizarCategoria', 'CategoriaController::actualizar');
$routes->post('/loginAdmin', 'AdminController::index');
//$routes->get('/completarPerfil', 'MainController::seleccionarPerfil');
$routes->get('/perfilAutor', 'AutorController::index');
$routes->post('/registrarAutor', 'AutorController::guardar');
$routes->get('/perfilCliente', 'ClienteController::index');
$routes->post('/registrarCliente', 'ClienteController::guardar');
$routes->get('/nuevoRecurso', 'RecursoController::index');
$routes->post('/registrarRecurso', 'RecursoController::guardar');
$routes->get('/paginaRecurso', 'RecursoController::mostrar');
$routes->get('/paginaAutor', 'AutorController::perfil');
$routes->get('/paginaCliente', 'ClienteController::perfil');
$routes->get('/perfilUsuario', 'MainController::perfil');
$routes->get('/seguirAutor', 'ClienteController::seguirAutores');
$routes->get('/suscribirse', 'ClienteController::formSuscrip');
$routes->get('/suscripExito', 'ClienteController::suscripExito');
$routes->get('/adminPage', 'AdminController::mainpage');
$routes->get('/nuevaCategoriaHija', 'CategoriaController::nuevaHija');
$routes->post('/registrarCategoriaHija', 'CategoriaController::guardarHija');
$routes->get('/mostrarRecursosCategoria', 'CategoriaController::mostrarRecursos');
$routes->get('/buscador', 'MainController::buscador');
$routes->get('/guardarRecursoCliente', 'ClienteController::guardarRecurso');
$routes->get('/quitarRecursoUsuario', 'ClienteController::borrarRecurso');
$routes->get('/dejarSeguirAutor', 'ClienteController::dejarSeguirAutor');
$routes->get('/comentarRecurso', 'ComentarioController::guardar');
$routes->post('/crearLista', 'ListaController::guardar');
$routes->get('/agregarRecursoLista', 'ListaController::agregarRecurso');
$routes->post('/mostarRecursosLista', 'ListaController::mostarRecursosLista');
$routes->get('/quitarRecursoLista', 'ListaController::quitarRecursoLista');
$routes->get('/checkSuscrip', 'MainController::checkSuscrip');
//Nuevas rutas


$routes->get('/mostrarRecursoTipo', 'MainController::mostrarPorTipo');

$routes->post('/contarDescargaRecurso', 'RecursoController::contarDescargas');

$routes->get('/paginaEditAutor', 'AutorController::paginaEditar');
$routes->post('/editarAutor', 'AutorController::editar');
$routes->get('/paginaEditCliente', 'ClienteController::paginaEditar');
$routes->post('/editarCliente', 'ClienteController::editar');

$routes->get('/editarRecurso', 'RecursoController::paginaEditar');
$routes->post('/actualizarRecurso', 'RecursoController::editar');
$routes->get('/borrarRecurso', 'RecursoController::borrar');
$routes->get('/mostrarAutores', 'MainController::mostrarAutores');

$routes->get('/ExecutePayment', 'PaypalController::captureOrder');
$routes->get('/confirmarsus', 'PaypalController::createOrder');






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
