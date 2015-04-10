<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>

<div class="container cesta">
	<div class="pedido">
      <h2 class="compra">1. Tu Compra</h2>      
      <h2 class="envio">2. Envío</h2>
      <h2 class="pago">3. Pago</h2>
    </div>
	<div class="table-responsive">          
		<table class="table">
			<thead>
			  <tr>
			  	<th>Codigo</th>
			    <th>#</th>
			    <th>Producto</th>
			    <th>Descripción</th>
			    <th>Color</th>
			    <th>Genero</th>
			    <th>Talla</th>
			    <th>Cantidad</th>
			    <th>Precio</th>
			    <th>Total</th>
			    <th>Eliminar</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
					<tr>
					    <td><?php echo $items['id']; ?></td>
					    <td><?php echo $i; ?></td>
					    <td><?php echo $items['name']; ?></td>
					    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					    	<td><?php echo $option_value; ?></td>
					    <?php endforeach; ?>				    
					    <td><?php echo $items['qty']; ?></td>
					    <td><?php echo $items['price']; ?></td>
					    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>				    									    
					    <td><a class="glyphicon glyphicon-remove" onclick="delItem(<?php echo htmlspecialchars(json_encode($items['rowid'])); ?>)"></a></td>
					</tr>				  				
				<?php endforeach; ?>								
			</tbody>				
		</table>
		<table class="table totalproducts">
			<td class="total">Total de productos</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN">
			<td class="total">Total</td>
			<td>MXN $<?php echo $this->cart->format_number($this->cart->total()); ?></td>			
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