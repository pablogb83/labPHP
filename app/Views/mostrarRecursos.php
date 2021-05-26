<div class="container">
    <div class="row">
        <?php if (empty($recursos)) { ?>
            <div class="col">
                <h1>Lo sentimos ese contenido no ha sido creado</h1>
                <h4>Tal vez puedas inspirarte y crearlo tu, no te parece?</h4>
            </div>

        <?php } ?>
    </div>
    <div class="row">
        
    <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($recursos as $recurso) { ?>
                <div class="col">    
                <div class="card" style="width: 18rem;">
                    <img src="images/<?php echo $recurso->rutaImg ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $recurso->nombre ?></h5>
                        <p class="card-text"><?php echo $recurso->tipo ?></p>
                        <p class="card-text"><?php echo $recurso->descripcion ?></p>
                        <p class="card-text"><?php echo $recurso->created_at ?></p>

                        <a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>" class="btn btn-primary">Leer mas...</a>

                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
        
    </div>

</div>