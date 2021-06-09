<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/estilos.css" rel="stylesheet">
  <link href="css/estiloEstrellas.css" rel="stylesheet">
  <link href="css/pdfcover.css" rel="stylesheet">

  <link rel="stylesheet" href="css/multiple-select.css" />

  <title>Truchameo</title>
  <script src="https://kit.fontawesome.com/e1b9012e50.js" crossorigin="anonymous"></script>
  

</head>

<body>
  <?php 
    use App\Models\Usuario;
    if (!isset($_SESSION)) {
    session_start();
  }   ?>

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#BE73EF;">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Truchameo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (isset($_SESSION['logueado'])) { ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout">Logout</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="perfilUsuario?id=<?php echo $_SESSION['datos_usuario']['id']; ?>"><?php echo 'Bienvenido ' . $_SESSION['datos_usuario']['nick']; ?></a>
              </li>

            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="loginpage">Login</a>
              </li>
            <?php }  ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ¡Comenzar!
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (!isset($_SESSION['logueado'])) { ?>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/registrarse">Registrarse</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['logueado']) && $_SESSION['datos_usuario']['tipo'] == 'cliente' and Usuario::find($_SESSION['datos_usuario']['id'])->cliente->suscripto == 0) { ?>
                  <li><a class="dropdown-item" href="<?php echo base_url(); ?>/suscribirse?id=<?php echo $_SESSION['datos_usuario']['id']; ?>">Suscribirse</a></li>
                <?php }  ?>
                <?php if (isset($_SESSION['logueado']) && $_SESSION['datos_usuario']['tipo'] == 'autor'){ ?>
                <li><a class="dropdown-item" href="nuevoRecurso">Publicar</a></li>
                <?php }  ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Libro">Libro</a></li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Audio-libro">Audio-libro</a></li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Revista">Revista</a></li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Podcast">Podcast</a></li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Documento">Documento</a></li>
                <li><a class="dropdown-item" href="mostrarRecursoTipo?tipo=Todos">Todos</a></li>
              </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="mostrarAutores">Autores</a>
            </li>

          </ul>
          <form class="d-flex" action="<?php echo base_url(); ?>/buscador" method="get">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
            <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button>
          </form>

        </div>
      </div>
    </nav>
  </div>