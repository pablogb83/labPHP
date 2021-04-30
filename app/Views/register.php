<?php include 'header.php'; ?>

<div class="container">
<br>
<form action="<?php echo base_url(); ?>/registrarUsuario" method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nickname" name="nick">
        <label for="floatingInput">Nickname</label>
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
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput" placeholder="fecha nacimiento" name="fnac">
        <label for="floatingInput">Fecha de nacimiento</label>
    </div>
    <div class="form-floating mb-3">
        <input type="file" class="form-control" id="floatingInput" placeholder="Foto" name="rutaFoto">
        <label for="floatingInput">Foto</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
    </div>
    <br>
    <div>
    <input type="submit" value="Registrar" class="btn btn-primary">
    <input type="submit" value="Cancelar" class="btn btn-secondary">
    </div>
</form>


</div>

