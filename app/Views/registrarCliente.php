<div class="container">
<br>

<form action="<?php echo base_url(); ?>/registrarCliente" method="post" enctype="multipart/form-data">
    
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nick" name="nick">
        <label for="floatingInput">Nick</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre">
        <label for="floatingInput">Nombre</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido">
        <label for="floatingInput">Apellido</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
        <label for="floatingInput">Email</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
        <label for="floatingInput">Password</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput"  name="fechNac">
        <label for="floatingInput">Fecha de nacimiento</label>
    </div>

    <div class="form-floating mb-3">
        <input type="file" class="form-control" id="floatingInput" placeholder="foto" name="foto">
        <label for="floatingInput">Foto</label>
    </div>
    
    <br>
    <div>
    <input type="submit" value="Registrar" class="btn btn-primary">
    <a href="<?php echo base_url(); ?>" type="button" class="btn btn-secondary">Cancelar</a>
    </div>
</form>


</div>