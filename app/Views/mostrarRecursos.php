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
        <div class="col-8">
            <div class="card-group" style="margin-top: 45px;">
                <?php foreach ($recursos as $recurso) { ?>
                    <div class="card">
                        <img src="images/<?php echo $recurso->rutaImg ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $recurso->nombre ?></h5>
                            <p class="card-text"><?php echo $recurso->tipo ?></p>
                            <p class="card-text"><?php echo $recurso->descripcion ?></p>
                            <a href="<?php echo base_url(); ?>/paginaRecurso?id=<?php echo $recurso->id; ?>">
                                <p>Leer mas...</p>
                            </a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?php echo $recurso->created_at ?></small>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>