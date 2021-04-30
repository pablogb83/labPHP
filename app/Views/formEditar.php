<?php include 'header.php'; ?>

<div class="container">
<br>
<form action="<?php echo base_url(); ?>/actualizar" method="post" >
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nickname" name="nick" value="<?php echo $user->nick ?>">
        <label for="floatingInput">Nickname</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" value="<?php echo $user->nombre ?>">
        <label for="floatingInput">Nombre</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido" value="<?php echo $user->apellido ?>">
        <label for="floatingInput">Apellido</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?php echo $user->email ?>">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput" placeholder="fecha nacimiento" name="fnac" value="<?php echo $user->fechaNac ?>">
        <label for="floatingInput">Fecha de nacimiento</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $user->password ?>">
        <label for="floatingPassword">Password</label>
    </div>
    <br>
    <div>
    <input type="submit" value="Actualizar" class="btn btn-primary">
    <input type="submit" value="Cancelar" class="btn btn-secondary">
    </div>
</form>
<?php include 'footer.php'; ?>