
<form name='formTpv' method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr'> 
							<input type='hidden' name='cmd' value='_xclick'></input>
						    <input type='hidden' name='business' value='sb-v143vd5841920@personal.example.com'></input> 
						    <input type='hidden' name='item_name' value='Suscripcion Truchameo' readonly="readonly"></input> 
						    <input type='hidden' name='item_number' value='VENTA-X2561' readonly="readonly"></input> 
						    <input type='hidden' name='amount' value="20" readonly="readonly"></input>
						    <input type='hidden' name='page_style' value='primary'></input>
						    <input type='hidden' name='no_shipping' value='1'></input>
						    <input type='hidden' name='return' value="<?php echo base_url(); ?>/suscripExito?id=<?php echo $usuario->id ?>"/>
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
							<input type="submit" value="pagar" class="btn btn-info btn-md" style="margin-left: 20px"></input> 
</form>