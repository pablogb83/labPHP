

<div class="container">
<br>
<form action="<?php echo base_url(); ?>/registrarUsuario" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nickname" name="nick">
        <label for="floatingInput">Nickname</label>
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
    </div>
    <br>
    <div>
    <input type="submit" value="Registrar" class="btn btn-primary">
    <a href="<?php echo base_url(); ?>" type="button" class="btn btn-secondary">Cancelar</a>
    </div>
</form>


</div>

