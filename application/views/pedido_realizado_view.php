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
				<tr>
					<td>
						<p><?php echo $cliente->nombre.' '.$cliente->aPaterno.' '.$cliente->aMaterno;?></p>
						<p><?php echo $cliente->calle.' '.$cliente->numero; ?></p>						
						<p><?php echo $cliente->cp.' '.$cliente->ciudad; ?></p>
						<p><?php echo $cliente->estado; ?></p>
						<p><?php echo $user->email; ?></p>
					</td>
				</tr>
			</tbody>				
		</table>
		<table class="table">
			<thead>
			  <tr>
			    <th>Descripción</th>
			    <th>Folio</th>
			    <th>Color</th>
			    <th>Genero</th>
			    <th>Talla</th>
			    <th>Cantidad</th>
			    <th>Imagen a bordar</th>
			    <th>Precio</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; $envio; $pago = 0; $folio = 0;?>
				<?php foreach ($query as $items): ?>
					<tr>					    
					    <td><?php echo $items->cod_prod.' '.$items->tipo.' '.$items->modelo; ?></td>
					    <td><?php $folio = $items->folio; echo $items->folio; ?></td>
					    <td><?php echo $items->color; ?></td>
					    <td><?php echo $items->genero; ?></td>
					    <td><?php echo $items->talla; ?></td>
					    <td><?php echo $items->cantidad; ?></td>
					    <td><?php echo $items->archivo; ?></td>
					    <td><?php $pago += $items->pago; echo $items->pago; ?></td>
					</tr>				  				
				<?php $i++; endforeach; ?>								
			</tbody>				
		</table>
		<table class="table totalproducts env">
			<td class="total">Total de productos</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN env">
			<td class="total">Total</td>
			<td>MXN $<?php echo $pago; ?></td>			
		</table>
		<table class="table buttons">			
			<td class="totale"><a class="btn btn-primary active" role="button" href="main">VOLVER A PRINCIPAL</a></td>			
			<td class="total"><a class="btn btn-primary active" role="button" 
				onclick="eliPedido(<?php echo htmlspecialchars(json_encode($folio)); ?>)" href="compra">CANCELAR PEDIDO</a></td>
		</table>
	</div>
</div>

<script type="text/javascript">		
		function eliPedido(data) 
		{					
	       	$.ajax
	        ({
	        	type: "POST",
		        url: "<?php echo base_url();?>auth/eliPedido",	        
				data: {'data' : data},
				success: function()
						{
							try
							{								
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