<div class="container" style="margin-top: 15px;">

  <nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
      <h4>Perfil del Usuario</h4>
    </ol>
  </nav>
  <div class="row justify-content-center">

    <div class="row justify-content-center">
      <div class="col-6 col-md-3">
        <div class="row">
          <img src="images/<?php echo $usuario->cliente->rutaImg ?>" alt="">
        </div>

      </div>

      <div class="col-6 col-md-6">
        <div class="row">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Perfil <i class="fas fa-user"></i></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Autores <i class="fas fa-users"></i></button>
            </li>
            <?php if(isset($_SESSION['logueado']) and $usuario->id == $_SESSION['datos_usuario']['id']){ ?>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Recursos Guardados <i class="fas fa-bookmark"></i></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="false">Crear lista <i class="far fa-plus-square"></i></button>
            </li>
            <?php } ?>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="lista-tab" data-bs-toggle="tab" data-bs-target="#editarlista" type="button" role="tab" aria-controls="editarlista" aria-selected="false">Mis listas <i class="far fa-list-alt"></i></button>
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
                    <td><?php echo $cliente->nombre ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Apellido:</th>
                    <td><?php echo $cliente->apellido ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Email:</th>
                    <td><?php echo $usuario->email ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Fecha de nacimiento:</th>
                    <td><?php echo $cliente->fechaNac ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Perfil:</th>
                    <td><?php echo $usuario->tipo ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Status:</th>
                    <td> <?php if ($cliente->suscripto == 1) { ?>
                        <b> Suscripto </b>
                      <?php } else { ?>
                        <a class="btn btn-success" href="<?php echo base_url(); ?>/suscribirse?id=<?php echo $_SESSION['datos_usuario']['id']; ?>">Suscribirse</a>
                      <?php } ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <br>
              <h4>Autores Seguidos</h4>
              <hr>
              <table class="table">
                <tbody>
                  <thead>
                    <th>Nombre</th>
                    <th>Accion</th>
                  </thead>
                  <?php foreach ($autores as $autor) { ?>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/paginaAutor?id=<?php echo $autor->usuario->id; ?>"> <?php echo $autor->nombre . ' ' . $autor->apellido ?></a></td>
                      <td><a href="<?php echo base_url(); ?>/dejarSeguirAutor?id=<?php echo $autor->id; ?>"><i class="fas fa-eraser"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <br>
              <h4>Recursos guardados</h4>
              <hr>
              <table class="table">
                <tbody>
                  <thead>
                    <th>Nombre</th>
                    <th>Accion</th>
                  </thead>
                  <?php foreach ($cliente->recursos as $recurso) { ?>
                    <tr>
                      <td><a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>"> <?php echo $recurso->nombre ?></a></td>
                      <td><a href="<?php echo base_url(); ?>/quitarRecursoUsuario?id=<?php echo $recurso->id; ?>"><i class="fas fa-eraser"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="lista" role="tabpanel" aria-labelledby="lista-tab">
              <br>
              <h4>Crear una lista</h4>
              <hr>
              <form action="crearLista" method="post">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre de la lista"><br>
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="recursos" name="recursos[]" multiple class="form-select">
                    <?php foreach ($cliente->recursos as $recurso) { ?>
                      <option value="<?php echo $recurso->id ?>"><?php echo $recurso->nombre ?></option>
                    <?php } ?>
                  </select>
                  <p>Tipo:</p>
                  <input type="radio" id="tipo" name="tipo" value="1">
                  <label for="1">Publica</label><br>
                  <input type="radio" id="tipo" name="tipo" value="2">
                  <label for="2">Privada</label><br><br>
                  <input type="submit" value="Guardar" class="btn btn-success">
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="editarlista" role="tabpanel" aria-labelledby="editarlista-tab">
              <br>
              <h4>Editar mis listas</h4>
              <hr>
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="listas" name="listas">
                <?php foreach ($cliente->listas as $lista) { ?>
                  <option id="listaseditables" value="<?php echo $lista->id ?>"><?php echo $lista->nombre ?></option>
                <?php } ?>
              </select>
              <hr>

              <table class="table">
                <thead>
                  <th>Nombre Recurso</th>
                  <th>Accion</th>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- script para actualizar los recursos de las listas en la pagina del perfil de usuario -->
<script>
  $(function() {
    //mostrarRecursos();
  });

  function mostrarRecursos() {
    $.ajax({
      url: 'mostarRecursosLista?id=' + document.getElementById("listas").value,
      type: 'POST',
      success: function(res) {
        var js = JSON.parse(res);
        //var tabla;
        /*for (var i = 0; i<js.lenght; i++){
            tabla+='<tr><td>' + js[i].nombre + '</td></tr>';
        }*/
        $('#tbody').html(js);
      }
    });
  };
  $('#listas').click(function() {
    mostrarRecursos();
    //alert(this.value);
  });
</script>