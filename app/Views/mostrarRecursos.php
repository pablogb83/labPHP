<div class="container">
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