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
      <h2 class="ped">Pedido Realizado.</h2>
    </div>
	<div class="table-responsive">          
		<table class="table realizado">
			<thead>
			  <tr>
			    <th>DIRECCIÓN:</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
				<?php endforeach; ?>									
				<tr>
					<td>
						<p>Nombre</p>
						<p>Calle</p>						
						<p>CP <span>Ciudad</span></p>
						<p>Estado</p>
						<p>Pais</p>
						<p>E-Mail</p>
					</td>		
				</tr>
			</tbody>				
		</table>
		<table class="table">
			<thead>
			  <tr>
			    <th>Producto</th>
			    <th>Descripción</th>
			    <th>Color</th>
			    <th>Genero</th>
			    <th>Talla</th>
			    <th>Cantidad</th>
			    <th>Precio</th>
			    <th>Total</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
					<tr>					    
					    <td><?php echo $items['name']; ?></td>
					    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					    	<td><?php echo $option_value; ?></td>
					    <?php endforeach; ?>				    
					    <td><?php echo $items['qty']; ?></td>
					    <td><?php echo $items['price']; ?></td>
					    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>		    
					</tr>				  				
				<?php endforeach; ?>								
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
			<td class="totale"><a class="btn btn-primary active" role="button" href="main">VOLVER A PRINCIPAL</a></td>			
			<td class="total"><a class="btn btn-primary active" role="button" href="">CANCELAR PEDIDO</a></td>
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