<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Nueva Categoria</h1>
            <br>
            <form action="<?php echo base_url(); ?>/actualizarCategoria" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" id="floatingInput" placeholder="Nickname" name="id" value="<?php echo $categoria->id ?>">
                </div>
            
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?php echo $categoria->nombre ?>" name="nombre">
                </div>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>



        </div>
    </main>