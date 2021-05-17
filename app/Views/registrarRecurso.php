<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <img src="images/autor.jpg" alt="">
        </div>
        <div class="col">
            <form action="<?php echo base_url(); ?>/registrarRecurso" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" id="floatingInput" name="id" value="<?php echo $_SESSION['datos_usuario']['id']; ?>">
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre">
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="textarea" class="form-control" id="floatingInput" placeholder="descripcion" name="descripcion">
                    <label for="floatingInput">Descripcion</label>
                </div>


                <label for="cars">Tipo de recurso</label>
                <br>
                <div class="form-floating mb-3">
                    <select name="tipo" id="tipo" class="form-select" aria-label="Default select example">
                        <option value="libro">Libro</option>
                        <option value="audio-libro">Audio-libro</option>
                        <option value="revista">Revista</option>
                        <option value="podcast">Podcast</option>
                        <option value="documento">Documento</option>
                    </select>
                </div>
                <br>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name="foto">
                    <label for="floatingInput">Foto</label>
                </div>

                <p>Descargable:</p>
                <input type="radio" id="descargable" name="descargable" value="1">
                <label for="1">Si</label><br>
                <input type="radio" id="female" name="descargable" value="2">
                <label for="2">No</label><br>


                <br>

                <p>Requiere Suscripcion:</p>
                <input type="radio" id="suscripcion" name="suscripcion" value="1">
                <label for="1">Si</label><br>
                <input type="radio" id="female" name="suscripcion" value="0">
                <label for="0">No</label><br>


                <br>

                <label for="cars">Categoria</label>
                <br><br>
                <select name="Categoria[]" id="Categoria" multiple class="form-select" aria-label="Default select example">
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
                    <?php } ?>
                </select>
                <br><br>
                <div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <a href="<?php echo base_url(); ?>" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>