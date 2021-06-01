<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <img src="images/autor.jpg" alt="">
        </div>
        <div class="col">
            <form action="<?php echo base_url(); ?>/editarAutor?id=<?php echo $usuario->id ?>" method="post" enctype="multipart/form-data">


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" value="<?php echo $autor->nombre ?>" required>
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido" value="<?php echo $autor->apellido ?>" required>
                    <label for="floatingInput">Apellido</label>
                </div>


                <div class="form-floating mb-3">
                    <input type="textarea" class="form-control" id="floatingInput" placeholder="biografia" name="biografia"  value="<?php echo $autor->biografia ?>" required>
                    <label for="floatingInput">Biografia</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="foto" name="foto">
                    <label for="floatingInput">Foto</label>
                </div>

                <br>
                <div>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    <a href="paginaAutor?id=<?php echo $usuario->id ?>" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

        </div>
    </div>

</div>