<?php $this->load->view('head/librerias_view');?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>

<div class="container cesta">
	<div class="pedido">
      <h2 class="compra des">1. Tu Compra</h2>      
      <h2 class="envio">2. Envío</h2>
      <h2 class="pago des">3. Pago</h2>
    </div>
	<div class="table-responsive">          
		<table class="table">
			<thead>
			  <tr>
			    <th>MÉTODO DE ENVÍO:</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<td>
						<input type="radio" id="standard" name="metEnv" onclick="seleccion()"> Standard: 2 a 4 días (*Excepto zonas remotas) MXN 55.00				
					</td>
				</tr>								
				<tr>
					<td>
						<input type="radio" id="recogida" name="metEnv" onclick="seleccion()"> Recogida en Tienda: 3 a 5 días (*Excepto zonas remotas) GRATUITO
					</td>
				</tr>
			</tbody>				
		</table>
		<table class="table totalproducts env">
			<td class="total">Total de productos:</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN env">
			<td class="total">Total:</td>
			<td>MXN <?php echo $this->cart->format_number($this->cart->total()); ?></td>			
		</table>
		<table class="table buttons">			
			<td class="totale"><a class="form-btn-buy" role="button" href="compra">TU COMPRA</a></td>			
			<td class="total"><a class="form-btn-buy btn active pago" id="pagod" role="button" href="pagar">SEGUIR</a></td>
		</table>
	</div>
</div>

<script type="text/javascript">				
		window.onload = function(){ document.getElementById("pagod").setAttribute("disabled", "disabled"); }
		function seleccion()
		{
			var envio = null;
			if(document.getElementById('standard').checked == 1)
			{
				envio = 'standard';
			}
			else if(document.getElementById('recogida').checked == 1)
			{
				envio = 'recogida';
			}	
			if(envio != null)
			{	
				document.getElementById("pagod").removeAttribute("disabled", "disabled");
				$.ajax
		        ({
		        	type: "POST",
			        url: "<?php echo base_url();?>auth/addMetEnvio",	        
					data: {'envio' : envio},
					success: function()
							{
								try{}
								catch(e)
								{
									alert('Exception while resquest...');
								}						
							},
					error: 	function()
							{
								alert('Error while resquest..');
							}
			    });
			}
			else 
				alert("No ha seleccionado una forma de envío");
		}
		function delItem(data) 
		{		
	       	$.ajax
	        ({
	        	type: "POST",
		        url: "<?php echo base_url();?>auth/eliminarItem",	        
				data: {'data' : data},
				success: function()
						{
							try
							{								
								alert("Eliminado de tu compra");
								location.reload();
							}catch(e)
							{
								alert('Exception while resquest...');
							}						
						},
				error: 	function()
						{
							alert('Error while resquest..');
						}
		    });		
	    }
	</script>

<?php $this->load->view('footer/footer_view'); ?>