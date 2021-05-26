<br>
<div class="container">
    <div class="alert alert-danger" role="alert">
        <h5>Errores</h5>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>

</div>