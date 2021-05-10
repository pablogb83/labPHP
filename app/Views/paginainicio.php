


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
            <div class="card">
                <img src="images/postCiencia.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="">
                        <p>Ler mas...</p>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="images/postJuegos.jfif" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <a href="">
                        <p>Ler mas...</p>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="images/postNaturaleza.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <a href="">
                        <p>Ler mas...</p>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>

