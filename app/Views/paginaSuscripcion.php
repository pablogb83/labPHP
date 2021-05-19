<div class="container">

	<div class="row">
		<div class="col">
			<figure class="text-center">
				<h3>Bienvenido al sistema de suscripciones de Truchameo</h3> 
			</figure>
				
		</div>
		<div class="col">

			<figure class="text-center">
				<blockquote class="blockquote">
					<p>Disfruta de los beneficios de una suscripcion a Truchameo.</p>
				</blockquote>
				<figcaption class="blockquote-footer">
					Juvenal <cite title="Source Title">Todos quieren poseer conocimientos; pero pocos están dispuestos a pagar su precio</cite>
				</figcaption>
			</figure>

		</div>

	</div>

	<br>

	<div class="row">
		<div class="col">

			<center><img src="images/pagar.jpg" alt=""></center>
			<br><br><br>
			<center><h6><p class="text-secondary">*El precio de la suscripcion es anual, y se renueva automaticamente</p></h6></center>

		</div>

		<div class="col">


			<h5>Beneficios de la suscripción:</h5>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Accede a contenido exlusivo</li>
				<li class="list-group-item">Te querremos mas</li>
				<li class="list-group-item">Nos ayudas a seguir creciendo</li>
				<li class="list-group-item">Seras mas feliz</li>
				<li class="list-group-item">Tal vez hasta te hagas millonario</li>
			</ul>

			<h3><p class="text-success">Todo esto por solo: </p> <p class="text-info">U$S 20</p> </h3>

			<form name='formTpv' method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr'>
				<input type='hidden' name='cmd' value='_xclick'></input>
				<input type='hidden' name='business' value='sb-v143vd5841920@personal.example.com'></input>
				<input type='hidden' name='item_name' value='Suscripcion Truchameo' readonly="readonly"></input>
				<input type='hidden' name='item_number' value='VENTA-X2561' readonly="readonly"></input>
				<input type='hidden' name='amount' value="20" readonly="readonly"></input>
				<input type='hidden' name='page_style' value='primary'></input>
				<input type='hidden' name='no_shipping' value='1'></input>
				<input type='hidden' name='return' value="<?php echo base_url(); ?>/suscripExito?id=<?php echo $usuario->id ?>" />
				<input type='hidden' name='rm' value='2'></input>
				<input type='hidden' name='cancel_return' value="<?php echo base_url(); ?>"></input>
				<input type='hidden' name='no_note' value='1'></input>
				<input type='hidden' name='currency_code' value='EUR'></input>
				<input type='hidden' name='cn' value='PP-BuyNowBF'></input>
				<input type='hidden' name='custom' value=''></input>
				<input type='hidden' name='first_name' value='NOMBRE'> </input>
				<input type='hidden' name='last_name' value='APELLIDOS'> </input>
				<input type='hidden' name='address1' value='DIRECCIÓN'> </input>
				<input type='hidden' name='city' value='POBLACIÓN'> </input>
				<input type='hidden' name='zip' value='CÓDIGO POSTAL'></input>
				<input type='hidden' name='night_phone_a' value=''> </input>
				<input type='hidden' name='night_phone_b' value='TELÉFONO'> </input>
				<input type='hidden' name='night_phone_c' value=''> </input>
				<input type='hidden' name='lc' value='es'></input>
				<input type='hidden' name='country' value='ES'></input>
				<input type="submit" value="Me convencieron" class="btn btn-info btn-md"></input>
				<a href="<?php echo base_url(); ?>" type="button" class="btn btn-secondary">A robar a otro lado</a>
			</form>

		</div>

	</div>




</div>