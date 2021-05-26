<div class="container" style="margin-top: 15px;">
  <div class="row justify-content-center">

    <div class="col">
      <?php foreach ($categorias as $categoria) { ?>
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
        <div class="row">
          <a href="checkSuscrip" class="btn btn-success" role="button">Comprar </a>
        </div>
        <br>
        <div class="row">
          <button class="btn btn-light"> Vista previa </button>
        </div>
        <br>
        <a href="<?php echo base_url(); ?>/guardarRecursoCliente?id=<?php echo $recurso->id ?>">
          <p><i class="far fa-bookmark"></i> Guardar para despues</p>
        </a>
        <hr>
        <p><i class="far fa-list-alt"></i> Crear una lista</p>
        <hr>
        <?php if ($recurso->descargable == 1) { ?>
          <p><i class="fas fa-arrow-circle-down"></i> Descargar </p>
        <?php } else { ?>
          <p>No disponible para descarga</p>
        <?php } ?>
        <hr>

        <a href="#" data-href="#" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro">
          <p><i class="fas fa-star-half-alt"></i> Comentar y calificar</p>
        </a>
        <hr>
      </div>

      <div class="col-6 col-md-6">
        <div class="row">
          <h2> <?php echo $recurso->nombre ?></h2>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Escrito por:</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <a href="<?php echo base_url(); ?>/paginaAutor?id=<?php echo $usuario->id; ?>"> <?php echo $autor->nombre . ' ' . $autor->apellido ?></a>
          </div>
        </div>
        <div class="row">
          <table style="margin-left: 10px;">
            <tbody>
              <tr class="hotel_a">
                <td>Nota</td>
                <td>
                  <div class="stars-outer">
                    <div class="stars-inner"></div>
                  </div>
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
        <dvi class="row">
          <h4>Comentarios</h4>

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
                <td> <?php $cont=0;$cont2=0;  while($cont<$comentario->nota || $cont2<5){

                        if($cont<$comentario->nota){
                          echo '<span class="fa fa-star checked"></span>';
                          $cont++;
                          $cont2++;
                        }else{
                          echo '<span class="fa fa-star"></span>';
                          $cont2++;
                        }

                }
                
                
                
                ?> </td>
              </tr>

            <?php } ?>
          </table>
        </dvi>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>/comentarRecurso?">
          <input type="hidden" name="id" value="<?php echo $recurso->id ?>">
          <input type="textarea" name="comentario" id="comentario">
          <input type="number" name="nota" id="nota" max="5" min="1">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
      </form>
    </div>
  </div>
</div>

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