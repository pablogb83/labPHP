<style>
    .card-img-top {
        height: 350px;
        object-fit: cover;
    }
</style>

<div class="container">

    <div class="row">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($usuarios as $usuario) { ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?php echo $usuario->autor->rutaImg ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $usuario->autor->nombre . ' ' . strtoupper($usuario->autor->apellido) ?></h5>

                            
                                <p class="card-text"><?php helper('text'); echo word_limiter($usuario->autor->biografia,10,'...') ?></p>
                            
                    
                            <a href="<?php echo base_url(); ?>/paginaAutor?id=<?php echo $usuario->id; ?>" class="btn btn-light">Ver más...</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>