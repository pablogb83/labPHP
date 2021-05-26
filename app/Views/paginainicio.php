<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/portadas-libros.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="tituloslider">First slide label</h2>
                    <h5 class="subslider">Some representative placeholder content for the first slide.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/librosPC.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="tituloslider">First slide label</h2>
                    <h5 class="subslider">Some representative placeholder content for the first slide.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/portadasRevistas.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="tituloslider">First slide label</h2>
                    <h5 class="subslider">Some representative placeholder content for the first slide.</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container">
    <center><button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-top: 30px; margin-bottom: 15px;">Ver todas</button></center>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Categorias</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php
                foreach($categorias as $categoria){
                    if($categoria->categoria_id==0){ ?>
                        <a href="<?php echo base_url() ?>/mostrarRecursosCategoria?id=<?php echo $categoria->id ?>"> <?php echo $categoria->nombre ?> </a><br>
                        <?php $categoria->mostrarHijos($categoria->hijas, 0); 
                    }
                }
            ?> 
        </div>
        </div>
</div>

<div class="container">
    <div class="row">
        <div class="container" style="overflow-x: scroll; height: 210px;">

            <?php $cont=0; foreach ($categorias as $categoria) { ?>
                <?php if($categoria->categoria_id == 0 /*&& $cont<6*/){  ?>
                <a href="<?php echo base_url(); ?>/mostrarRecursosCategoria?id=<?php echo $categoria->id ?>">
                    <figure>
                        <img src="images/<?php echo $categoria->rutaImg ?>" alt="no hay imagen" width="210" height="150">
                        <figcaption> <?php echo $categoria->nombre ?> </figcaption>
                    </figure>
                </a>

            <?php ++$cont; }} ?>

        </div>
    </div>
</div>
<div class="container">
    <center>
        <h2 class="titulopost" style="margin-top: 30px; ">Ultimos post</h2>
    </center>

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