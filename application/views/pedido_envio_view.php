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
			    <th>MÉTODO DE ENVÏO:</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<td>
						<input type="radio" name="metEnv" checked> Standard: 2 a 4 dias (*Excepto zonas remotas) MXN $ 55.00				
					</td>
				</tr>								
				<tr>
					<td>
						<input type="radio" name="metEnv" checked> Recogida en Tienda: 3 a 5 dias (*Excepto zonas remotas) GRATUITO
					</td>
				</tr>
			</tbody>				
		</table>
		<table class="table totalproducts env">
			<td class="total">Total de productos</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN env">
			<td class="total">Total</td>
			<td>MXN $<?php echo $this->cart->format_number($this->cart->total()); ?></td>			
		</table>
		<table class="table buttons">			
			<td class="totale"><a class="btn btn-primary active" role="button" href="compra">TU COMPRA</a></td>			
			<td class="total"><a class="btn btn-primary active" role="button" href="pago">SEGUIR</a></td>
		</table>
	</div>
</div>

<script type="text/javascript">		
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