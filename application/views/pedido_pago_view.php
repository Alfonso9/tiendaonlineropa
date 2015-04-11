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
      <h2 class="envio des">2. Envío</h2>
      <h2 class="pago">3. Pago</h2>
    </div>
    <span>SELECCIONE SU MÉTODO DE PAGO:</span>
	<div class="table-responsive">          
		<table class="table method">
			<thead>
			  <tr>
			    <th></th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<th>
						VISA
					</th>
					<th>
						MASTERCARD
					</th>
					<th>
						PAYPAL
					</th>										
				</tr>								
				<tr>
					<td>
						<input type="radio" name="metEnv" checked> 				
					</td>
					<td>
						<input type="radio" name="metEnv" checked> 				
					</td>
					<td>
						<input type="radio" name="metEnv" checked> 				
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
			<td class="totale"><a class="btn btn-primary active" role="button" href="envio">ENVÏO</a></td>			
			<td class="total"><a class="btn btn-primary active" role="button" href="realizado">AUTORIZAR PAGO</a></td>
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