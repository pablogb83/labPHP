<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <div class="row">
                <img src="images/usuarios.jpeg" alt="">
            </div>
            
        </div>
        <div class="col">
            <form action="<?php echo base_url(); ?>/editarCliente?id=<?php echo $usuario->id ?>" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" value="<?php echo $cliente->nombre ?>" required>
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido"  value="<?php echo $cliente->apellido ?>" required>
                    <label for="floatingInput">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" name="fechNac" value="<?php echo $cliente->fechaNac ?>" required>
                    <label for="floatingInput">Fecha de nacimiento</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="foto" name="foto">
                    <label for="floatingInput">Foto</label>
                </div>

                <br>
                <div>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    <a href="paginaCliente?id=<?php echo $usuario->id ?>" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>