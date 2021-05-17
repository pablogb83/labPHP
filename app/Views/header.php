<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e1b9012e50.js" crossorigin="anonymous"></script>
    <title>Truchameo</title>
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
<?php if(!isset($_SESSION)){
			session_start();
		}	 ?>
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Truchameo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if(isset($_SESSION['logueado'])) { ?>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout">Logout</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="perfilUsuario?id=<?php echo $_SESSION['datos_usuario']['id']; ?>"><?php echo 'Bienvenido ' . $_SESSION['datos_usuario']['nick']; ?></a>
                            </li>

                        <?php }else{ ?>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="loginpage">Login</a>
                        </li>
                        <?php }  ?>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      ¡Publicar!
                    </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/registrarse">Registrarse</a></li>
                                <?php if(isset($_SESSION['logueado']) && $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>/suscribirse?id=<?php echo $_SESSION['datos_usuario']['id'];?>">Suscribirse</a></li>
                                <?php }  ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">¿Necesitas ayuda?</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
</div>