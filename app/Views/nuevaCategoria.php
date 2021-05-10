<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nueva Categoria</h1>
            <br>
            <form action="<?php echo base_url(); ?>/registrarCategoria" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre">
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" placeholder="Foto" name="rutaFoto">
                <label for="floatingInput">Foto</label>
                </div>
                <div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                </div>
            </form>



        </div>
    </main>