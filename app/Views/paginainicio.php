


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
    
    <div class="container" id="categorias">
        
        <?php foreach($categorias as $categoria){ ?>
        <a href="">
            <figure>
                <img src="images/<?php echo $categoria->rutaImg ?>" alt="no hay imagen" width="210" height="150">
                <figcaption> <?php echo $categoria->nombre ?> </figcaption>
            </figure>
        </a>
        <?php } ?>

    </div>
    
    <div class="container">
        <center>
            <h2 class="titulopost">Ultimos post</h2>
        </center>
        
        <div class="card-group" style="margin-top: 45px;">
        <?php foreach($recursos as $recurso){ ?>
            <div class="card">
                <img src="images/<?php echo $recurso->rutaImg ?>" class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $recurso->nombre ?></h5>
                    <p class="card-text"><?php echo $recurso->descripcion ?></p>
                    <a href="">
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



