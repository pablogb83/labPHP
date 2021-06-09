<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v10.0" nonce="ef2j7ht9"></script>

<div class="container" style="margin-top: 15px;">
  <div class="row justify-content-center">

    <div class="col">
      <?php

      use App\Models\Recurso;
      use App\Models\Usuario;

      foreach ($categorias as $categoria) { ?>
        <a href="<?php echo base_url(); ?>/mostrarRecursosCategoria?id=<?php echo $categoria->id ?>"><?php echo $categoria->nombre . " - "; ?></a>
      <?php } ?>

      <hr>
    </div>

    <div class="row justify-content-center">
      <div class="col-6 col-md-3">
        <div class="row">
          <img src="images/<?php echo $recurso->rutaImg ?>" alt="">
        </div>
        <br>
        <?php if ($recurso->suscripcion == 1 and isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente' and Usuario::find($_SESSION['datos_usuario']['id'])->cliente->suscripto == 0) { ?>
          <div class="row">
            <a href="checkSuscrip?id=<?php echo $recurso->id ?>" class="btn btn-success" role="button">Requiere Suscripción </a>
          </div>
          <br>
        <?php } ?>
        <div class="row">
          <button class="btn btn-light" data-toggle="modal" data-target="#modal-archivo" data-placement="top"> Vista previa </button>
        </div>
        <br>
        <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'autor' and Usuario::find($_SESSION['datos_usuario']['id'])->autor->id == $autor->id) { ?>
        <div class="row">
        <a href="editarRecurso?id=<?php echo $recurso->id ?>" class="btn btn-warning" role="button">Editar </a>
        </div>
        <br>
        <?php } ?>
        <a href="#" data-href="<?php echo base_url(); ?>/guardarRecursoCliente?id=<?php echo $recurso->id ?>" data-toggle="modal" data-target="#modal-guardar" data-placement="top" title="Guardar para despues">
          <p><i class="far fa-bookmark"></i> Guardar para despues</p>
        </a>
        <hr>
        <a href="#" data-href="#" data-toggle="modal" data-target="#modal-agrega" data-placement="top" title="Agregar a mi lista">
          <p><i class="far fa-list-alt"></i> Agregar a mi lista</p>
        </a>
        <hr>
        <?php if ($recurso->descargable == 1) { ?>
          <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
            <?php if (Usuario::find($_SESSION['datos_usuario']['id'])->cliente->suscripto == 1 and $recurso->suscripcion == 1) { ?>
              <a title="Descargar Archivo" href="archivos/<?php echo $recurso->rutaArch ?>" download="<?php echo $recurso->rutaArch ?>">
                <p id="descargas"><i class="fas fa-arrow-circle-down"></i> Descargar </p>
              </a>
            <?php } else { ?>
              <?php if ($recurso->suscripcion == 1) { ?>
                <p>Este recurso solo esta disponible para suscriptores</p>
              <?php } else { ?>
                <a title="Descargar Archivo" href="archivos/<?php echo $recurso->rutaArch ?>" download="<?php echo $recurso->rutaArch ?>">
                  <p id="descargas"><i class="fas fa-arrow-circle-down"></i> Descargar </p>
                </a>
              <?php } ?>
            <?php } ?>
          <?php } else { ?>
            <p>Debes estar logueado para descargar o ser cliente</p>
          <?php } ?>
        <?php } else { ?>
          <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
            <?php if (Usuario::find($_SESSION['datos_usuario']['id'])->cliente->suscripto == 1 and $recurso->suscripcion == 1) { ?>
              <a href="#" data-href="#" data-toggle="modal" data-target="#modal-verRecurso" data-placement="top" title="Ver recurso">
              <i class="fab fa-readme"></i> Ver recurso </a>
            <?php } else { ?>
              <?php if ($recurso->suscripcion == 1) { ?>
                <p>Este recurso solo esta disponible para suscriptores</p>
              <?php } else { ?>
                <a href="#" data-href="#" data-toggle="modal" data-target="#modal-verRecurso" data-placement="top" title="Ver recurso">
                <i class="fab fa-readme"></i> Ver recurso </a>
              <?php } ?>
            <?php } ?>
          <?php } else { ?>
            <p>Debes estar logueado para descargar o ser cliente</p>
          <?php } ?>
        <?php } ?>

        <hr>
        <a href="#" data-href="#" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Comentar y calificar">
          <p><i class="fas fa-star-half-alt"></i> Comentar y calificar</p>
        </a>
        <hr>

        <div class="fb-share-button" data-href="https://www.youtube.com/watch?v=GNP0ekSMypQ&amp;list=RDMMGNP0ekSMypQ&amp;start_radio=1" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DGNP0ekSMypQ%26list%3DRDMMGNP0ekSMypQ%26start_radio%3D1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>

      </div>

      <div class="col-6 col-md-8">
        <div class="row">
          <h2> <?php echo $recurso->nombre ?></h2>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <table>
              <tbody>
                <tr>
                  <th scope="row">Escrito por:</th>
                  <td><a href="<?php echo base_url(); ?>/paginaAutor?id=<?php echo $usuario->id; ?>"> <?php echo $autor->nombre . ' ' . $autor->apellido ?></a></td>
                </tr>
                <tr class="hotel_a">
                  <th scope="row">Nota:</th>
                  <td>
                    <div class="stars-outer">
                      <div class="stars-inner"></div>
                    </div>
                  </td>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr>
          </div>

          <div class="row">

            <h4>Nota del editor</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique consequatur harum accusamus distinctio aperiam ipsam, eveniet ea cupiditate laboriosam tenetur hic nostrum sed temporibus, nemo placeat ab tempora vel iste.</p>
          </div>

          <div class="row">
            <h4>Descripción</h4>
            <b>
              <p><?php echo $recurso->descripcion ?></p>
            </b>
            <hr>
          </div>
          <div class="row">
            <h4>Comentarios</h4>
            <div class="container" style="overflow-y: scroll; height: 240px;">
              <table class="table">
                <tr>
                  <th>Usuario</th>
                  <th>Comentario</th>
                  <th>Nota</th>
                </tr>

                <?php foreach ($comentarios as $comentario) { ?>

                  <tr>
                    <td> <?php echo $comentario->cliente->usuario->nick ?> </td>
                    <td> <em><?php echo '"' . $comentario->texto . '"' ?></em> </td>
                    <td> <?php $cont = 0;
                          $cont2 = 0;
                          while ($cont < $comentario->nota || $cont2 < 5) {

                            if ($cont < $comentario->nota) {
                              echo '<span class="fa fa-star checked"></span>';
                              $cont++;
                              $cont2++;
                            } else {
                              echo '<span class="fa fa-star"></span>';
                              $cont2++;
                            }
                          }
                          ?>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
        <?php if (Usuario::find($_SESSION['datos_usuario']['id'])->cliente->suscripto == 1) { ?>
          <?php if (!Recurso::chequeaComentario(Usuario::find($_SESSION['datos_usuario']['id'])->cliente->id, $recurso->id)) { ?>
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url(); ?>/comentarRecurso">
                  <input type="hidden" name="id" value="<?php echo $recurso->id ?>">
                  <input class="form-control" type=" textarea" name="comentario" id="comentario" required> <br>
                  <input class="form-control" type="number" name="nota" id="nota" max="5" min="1" required> <br>
                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Enviar</button>
                </form>
              </div>
            <?php } else { ?>
              <div class="modal-content">
                <div class="modal-header">
                  <p>Ya calificaste y comentaste este recurso</p>
                </div>
              </div>
            <?php } ?>
          <?php } else { ?>
            <div class="modal-content">
              <div class="modal-header">
                <p>Necesitas estar suscripto para esto</p>
              </div>
            </div>
          <?php } ?>
      <?php } else { ?>
        <div class="modal-content">
          <div class="modal-header">
            <p>Necesitas una cuenta cliente para esto</p>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-agrega" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar recurso a lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url(); ?>/agregarRecursoLista">
              <input type="hidden" name="id" value="<?php echo $recurso->id ?>">
              <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="lista" name="lista" required>
                <?php if ($_SESSION['datos_usuario']['tipo'] == 'cliente') {
                  foreach (Usuario::find($_SESSION['datos_usuario']['id'])->cliente->listas as $lista) { ?>
                    <option value="<?php echo $lista->id ?>"><?php echo $lista->nombre ?></option>
                <?php }
                } ?>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
          </form>
        </div>
      <?php } else { ?>
        <div class="modal-content">
          <div class="modal-header">
            <p>Necesitas una cuenta cliente para esto</p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="modal fade" id="modal-archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" oncontextmenu="return false;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vista previa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if ($recurso->tipo == 'audio-libro' or $recurso->tipo == 'podcast') { ?>
              <audio controls controlsList="nodownload" ontimeupdate="restrictAudio(this)" id="audio2" src="archivos/<?php echo $recurso->rutaArch ?>">

                Tu navegador no soporta audio HTML5.
              </audio>
            <?php } else { ?>
              <div class="wrapper" >
                <embed src="archivos/<?php echo $recurso->rutaArch ?>#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="5000" />
                <div class="embed-cover" style="width: 100%; height: 5000px; overflow-y: scroll;" ></div>
              </div>
            <?php } ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
          </div>
          </form>
        </div>
      <?php } else { ?>
        <div class="modal-content">
          <div class="modal-header">
            <p>Necesitas una cuenta cliente para esto</p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="modal fade" id="modal-guardar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <?php if (isset($_SESSION['logueado']) and $_SESSION['datos_usuario']['tipo'] == 'cliente') { ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Guardar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Agregar <b><?php echo $recurso->nombre?></b> a tu lista de guardados</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
            <a class="btn btn-danger btn-ok">Confirma</a>
          </div>
        <?php } else { ?>
          <div class="modal-content">
            <div class="modal-header">
              <p>Necesitas una cuenta cliente para esto</p>
            </div>
          </div>
        <?php } ?>
        </div>
    </div>
  </div>


  <div class="modal fade" id="modal-verRecurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ver recurso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php if ($recurso->tipo == 'audio-libro' or $recurso->tipo == 'podcast') { ?>
            <audio controls controlsList="nodownload" src="archivos/<?php echo $recurso->rutaArch ?>">
              Tu navegador no soporta audio HTML5.
            </audio>
          <?php } else { ?>
            <embed src="archivos/<?php echo $recurso->rutaArch ?>#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="500" />
        </div>
      <?php } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrrar</button>
      </div>
      </div>
    </div>
  </div>
</div>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

<script>
  const ratings = {
    hotel_a: <?php echo $recurso->nota ?>,

  };

  // total number of stars
  const starTotal = 5;

  for (const rating in ratings) {
    const starPercentage = (ratings[rating] / starTotal) * 100;
    const starPercentageRounded = `${
        Math.round(starPercentage / 10) * 10
      }%`;
    document.querySelector(`.${rating} .stars-inner`).style.width =
      starPercentageRounded;
  }
</script>


<!-- script para actualizar los recursos de las listas en la pagina del perfil de usuario -->
<script>
  $(function() {
    //mostrarRecursos();
  });

  function contarDescargas() {
    $.ajax({
      url: 'contarDescargaRecurso?id=' + <?php echo $recurso->id ?>,
      type: 'POST',
    });
  };
  $('#descargas').click(function() {
    contarDescargas();
    //alert(this.value);
  });
</script>
<!--
<script>
  myAudio = document.getElementById('audio2');
  myAudio.addEventListener('canplaythrough', function() {
    this.currentTime = 11;
    this.play();
  });
</script>
-->
<script>
  function restrictAudio(event) {
    // Trying to stop the player if it goes above 10 second
    if (event.currentTime < 10 || event.currentTime > 40) {
      event.pause();
      event.currentTime = 10
    }
  }
</script>
