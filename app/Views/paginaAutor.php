<div class="container" style="margin-top: 15px;">
  <?php

  use App\Models\Usuario; ?>
  <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
      <h4>Perfil del Autor</h4>
    </ol>
  </nav>
  <div class="row justify-content-center">

    <div class="row justify-content-center">
      <div class="col-6 col-md-3">
        <div class="row">
          <img src="images/<?php echo $usuario->autor->rutaImg ?>" alt="">
        </div>
        <br>
        <?php if (isset($_SESSION['logueado'])) {
          if ($_SESSION['datos_usuario']['tipo'] == 'autor' ) { ?>
            <div class="row">
              <a href="<?php echo base_url(); ?>/nuevoRecurso" class="btn btn-primary">Publicar</a>
            </div>

          <?php } else { ?>
            <?php if (Usuario::find($_SESSION['datos_usuario']['id'])->cliente->autores->find($autor->id) != null) { ?>
              <div class="row">
                <a href="<?php echo base_url(); ?>/dejarSeguirAutor?id=<?php echo $autor->id; ?>" class="btn btn-primary"> Dejar de Seguir</a>
              </div>
            <?php } else { ?>
              <div class="row">
                <a href="<?php echo base_url(); ?>/seguirAutor?id=<?php echo $usuario->id; ?>" class="btn btn-primary">Seguir</a>
              </div>
        <?php }
          }
        } ?>
        <br>
        <div class="row">
          <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Seguidores</button>
        </div>
        <br>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Lista de seguidores</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <table class="table">
              <thead>
                <th>Nombre</th>
                <th>Foto</th>
              </thead>
              <?php foreach ($clientes as $cliente) { ?>
                <tr>
                  <td><a href="<?php echo base_url(); ?>/paginaCliente?id=<?php echo $cliente->usuario->id; ?>"> <?php echo $cliente->nombre . ' ' . $cliente->apellido ?></a> </td>
                  <td> <img src="images/<?php echo $cliente->rutaImg  ?>" alt="" width="50px"> </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>


      </div>

      <div class="col-6 col-md-6">
        <div class="row">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Perfil <i class="fas fa-user"></i></button>
            </li>
            <?php if (isset($_SESSION['logueado']) and $usuario->id == $_SESSION['datos_usuario']['id']) { ?>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Mis publicaciones <i class="fas fa-cloud-upload-alt"></i></button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="false">Mas vistos <i class="far fa-plus-square"></i></button>
              </li>
            <?php } ?>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="lista-tab" data-bs-toggle="tab" data-bs-target="#editarlista" type="button" role="tab" aria-controls="editarlista" aria-selected="false">Top descargas <i class="fas fa-fire"></i></button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <br>
              <h4>Datos personales</h4>
              <hr>
              <table class="table">

                <tbody>
                  <tr>
                    <th scope="row">Nick:</th>
                    <td><?php echo $usuario->nick ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Nombre:</th>
                    <td><?php echo $autor->nombre ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Apellido:</th>
                    <td><?php echo $autor->apellido ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Email:</th>
                    <td><?php echo $usuario->email ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Biografia:</th>
                    <td><?php echo $autor->biografia ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Perfil:</th>
                    <td><?php echo $usuario->tipo ?></td>
                  </tr>
                </tbody>
              </table>
              <?php if (isset($_SESSION['logueado']) and $usuario->id == $_SESSION['datos_usuario']['id']) { ?>
              <a href="<?php echo base_url(); ?>/paginaEditAutor?id=<?php echo $usuario->id ?>" class="btn btn-primary">Editar</a>
              <?php }?>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <br>
              <h4>Mis publicaciones</h4>
              <hr>
              <div class="container" style="overflow-y: scroll; height: 260px;">
                <table class="table">
                  <tbody>
                    <thead>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Valoracion</th>
                    </thead>
                    <?php foreach ($autor->recursos as $recurso) { ?>
                      <tr>
                        <td><a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>"> <?php echo $recurso->nombre ?></a></td>
                        <td><?php echo $recurso->tipo ?></td>
                        <td><?php $cont = 0;
                            $cont2 = 0;
                            while ($cont < $recurso->nota || $cont2 < 5) {

                              if ($cont < $recurso->nota) {
                                echo '<span class="fa fa-star checked"></span>';
                                $cont++;
                                $cont2++;
                              } else {
                                echo '<span class="fa fa-star"></span>';
                                $cont2++;
                              }
                            }

                            ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="lista" role="tabpanel" aria-labelledby="lista-tab">
              <br>
              <h4>Mas vistos</h4>
              <hr>
              <table class="table">
                <tbody>
                  <thead>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Visitas</th>
                  </thead>
                </tbody>
                <?php foreach ($autor->masVistos() as $recurso) { ?>
                  <tr>
                    <td><a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>"> <?php echo $recurso->nombre ?></a></td>
                    <td><?php echo $recurso->tipo ?></td>
                    <td><?php echo $recurso->visitas ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="editarlista" role="tabpanel" aria-labelledby="editarlista-tab">
              <br>
              <h4>Descargas</h4>
              <hr>
              <table class="table">
                <thead class="thead-dark">
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Descargas</th>
                </thead>

                <tbody>
                  <?php foreach ($autor->masDescargados() as $recurso) { ?>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>"> <?php echo $recurso->nombre ?></a></td>
                      <td><?php echo $recurso->tipo ?></td>
                      <td><?php echo $recurso->descargas ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>