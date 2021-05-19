<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>profile with data and skills - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;
    }

    .main-body {
      padding: 15px;
    }

    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
      background-color: #e2e8f0;
    }

    .h-100 {
      height: 100% !important;
    }

    .shadow-none {
      box-shadow: none !important;
    }
  </style>

</head>

<body>
  <br>
  <div class="container">


    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <h4>Perfil del Cliente</h4>
      </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="images/<?php echo $cliente->rutaImg ?>" alt="Admin" class="rounded-circle" width="150" height="150">
              <div class="mt-3">
                <h4><?php echo $usuario->nick ?></h4>
                <br>
                <button class="btn btn-primary">Favoritos</button>
                <button class="btn btn-outline-primary">Autores Seguidos</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Nombre:</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $cliente->nombre ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Apellido</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $cliente->apellido ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $usuario->email ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Perfil</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <b><?php echo $usuario->tipo ?></b>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Fecha de Nacimiento</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $cliente->fechaNac ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Status</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php if ($cliente->suscripto == 1){ ?>
                <b> Suscripto </b>
                <?php }else{ ?>
                <a class="btn btn-success" href="<?php echo base_url(); ?>/suscribirse?id=<?php echo $_SESSION['datos_usuario']['id'];?>">Suscribirse</a>
                <?php } ?>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>