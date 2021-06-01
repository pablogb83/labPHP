<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <img src="images/autor.jpg" alt="">
        </div>
        <div class="col">
            <form action="<?php echo base_url(); ?>/actualizarRecurso?id=<?php echo $recurso->id ?>" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" value="<?php echo $recurso->nombre ?>" required>
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="textarea" class="form-control" id="floatingInput" placeholder="descripcion" name="descripcion" value="<?php echo $recurso->descripcion ?>" required>
                    <label for="floatingInput">Descripcion</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name="foto">
                    <label for="floatingInput">Foto</label>
                </div>

                <div>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    <a href="paginaAutor?id=<?php echo $_SESSION['datos_usuario']['id'] ?>" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>