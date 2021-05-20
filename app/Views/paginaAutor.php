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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#btn_seguidores").on("click", function() {
        if ($('#seguidores').css("display") == 'none') {
          $('#seguidores').css("display", "inline");
        } else {
          $('#seguidores').css("display", "none");
        }

      });
    });
  </script>


</head>

<body>
  <br>
  <div class="container">


    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <h4>Perfil del Autor</h4>
      </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="images/<?php echo $autor->rutaImg ?>" alt="Admin" class="rounded-circle" width="150" height="150">
              <div class="mt-3">
                <h4><?php echo $usuario->nick ?></h4>
                <br>
                <?php if (isset($_SESSION['logueado'])) {
                  if ($_SESSION['datos_usuario']['tipo'] == 'autor') { ?>
                    <a href="<?php echo base_url(); ?>/nuevoRecurso" class="btn btn-primary">Publicar</a>
                  <?php } else { ?>
                    <a href="<?php echo base_url(); ?>/seguirAutor?id=<?php echo $usuario->id; ?>" class="btn btn-primary">Seguir</a>
                <?php }
                } ?>
                <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Seguidores</button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Lista de seguidores</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                  <?php foreach ($clientes as $cliente){ ?>
                       <a href="<?php echo base_url(); ?>/paginaCliente?id=<?php echo $cliente->usuario->id; ?>"> <?php echo $cliente->nombre . ' ' . $cliente->apellido ?></a> <br>  
                    <?php } ?>
                  </div>
                </div>
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
                <?php echo $autor->nombre ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Apellido</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $autor->apellido ?>
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
                <h6 class="mb-0">Biografia</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $autor->biografia ?>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="container" id="seguidores" style="display: none;">
        <?php foreach ($clientes as $cliente) {
          echo $cliente->nombre . '<br>';
        } ?>
      </div>
    </div>
  </div>