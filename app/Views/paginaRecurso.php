
<div class="container" style="margin-top: 15px;">
  <div class="row justify-content-center">
    
    <div class="col">
      <?php foreach($categorias as $categoria){ ?>
           <a href="<?php echo base_url(); ?>/mostrarRecursosCategoria?id=<?php echo $categoria->id ?>"><?php echo $categoria->nombre. " - "; ?></a>
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
          <button class="btn btn-success"> Comprar </button>
        </div>
        <br>
        <div class="row">
          <button class="btn btn-light"> Vista previa </button>
        </div>
        <br>
        <p><i class="far fa-bookmark"></i> Guardar para despues</p>
        <hr>
        <p><i class="far fa-list-alt"></i> Crear una lista</p>
        <hr>
        <?php if ($recurso->descargable == 1) { ?>
          <p><i class="fas fa-arrow-circle-down"></i> Descargar </p>
        <?php } else { ?>
          <p>No disponible para descarga</p>
        <?php } ?>
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
          <p>Aca va la valoracion ranking de estrellas</p>
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

        </div>

      </div>
    </div>
  </div>
</div>