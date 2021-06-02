<div class="container">
	<br>
	<div class="row">
		<div class="col">
			<img src="images/error-404.png" alt="Ni siquiera econtramos la imagen, esto es vergonzoso">
		</div>
		<div class="col">
			<div class="wrap">
				<h1>Pagina no econtrada</h1>

				<p>
					<?php if (!empty($message) && $message !== '(null)') : ?>
						<?= esc($message) ?>
					<?php else : ?>
						Ups! Parece que la pagina que estas buscando no existe.
					<?php endif ?>
				</p>
			</div>
		</div>
	</div>
</div>

