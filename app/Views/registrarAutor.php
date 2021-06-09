<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <center><img src="images/autor.jpg" alt=""></center>
        </div>
        <div class="col">
            <form action="<?php echo base_url(); ?>/registrarAutor" method="post" enctype="multipart/form-data">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nick" name="nick" required>
                    <label for="floatingInput">Nick</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" required>
                    <label for="floatingInput">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido" required>
                    <label for="floatingInput">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" required>
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password" required>
                    <label for="floatingInput">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Password Confirm" name="passwordConf" required>
                    <label for="floatingInput">Confirma el Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="textarea" class="form-control" id="floatingInput" placeholder="biografia" name="biografia" required>
                    <label for="floatingInput">Biografia</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="foto" name="foto" required>
                    <label for="floatingInput">Foto</label>
                </div>

                <br>
                <div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <a href="<?php echo base_url(); ?>" type="button" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>

        </div>
    </div>

</div>