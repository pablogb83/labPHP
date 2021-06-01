<div class="container">
	<br>
	<div class="row">
		<div class="col">
			<img src="images/autor.jpg" alt="">
		</div>
		<div class="col">
			<div class="wrap">
				<h1>Pagina no econtrada</h1>

				<p>
					<?php if (!empty($message) && $message !== '(null)') : ?>
						<?= esc($message) ?>
					<?php else : ?>
						Sorry! Cannot seem to find the page you were looking for.
					<?php endif ?>
				</p>
			</div>
		</div>
	</div>
</div>

