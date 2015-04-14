<div class="container cesta">
	<a href="dPedido">< VOLVER</a>
	<div class="pedido">
      <h2 class="ped">Pedido Realizado</h2>
    </div>
	<div class="table-responsive verpedido">          
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
			    <th>DESCRIPCIÓN</th>
			    <th>FOLIO</th>
			    <th>COLOR</th>
			    <th>GENERO</th>
			    <th>TALLA</th>
			    <th>CANTIDAD</th>
			    <th>PRECIO</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; $envio; $pago = 0;?>
				<?php foreach ($query as $items): ?>
					<tr>					    
					    <td class="text-uppercase"><?php echo $items->cod_prod.' '.$items->tipo.' '.$items->modelo; ?></td>
					    <td><?php echo $items->folio; ?></td>
					    <td class="text-uppercase"><?php echo $items->color; ?></td>
					    <td class="text-uppercase"><?php echo $items->genero; ?></td>
					    <td class="text-uppercase"><?php echo $items->talla; ?></td>
					    <td><?php echo $items->cantidad; ?></td>
					    <td>MXN <?php $pago += $items->pago; echo $items->pago; ?> .00</td>
					</tr>				  				
				<?php $i++; endforeach; ?>								
			</tbody>				
		</table>
		<table class="table totalproducts env">
			<td class="total">Total de productos:</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN env">
			<td class="total">Total:</td>
			<td>MXN <?php echo $pago; ?> .00</td>			
		</table>
	</div>
</div>