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
				<?php foreach ($query as $items): ?>
					<tr>					    
					    <td class="text-uppercase"><?php echo $items->cod_prod.' '.$items->tipo.' '.$items->modelo; ?></td>
					    <td><?php echo $items->folio; ?></td>
					    <td class="text-uppercase"><?php echo $items->color; ?></td>
					    <td class="text-uppercase"><?php echo $items->genero; ?></td>
					    <td class="text-uppercase"><?php echo $items->talla; ?></td>
					    <td><?php echo $items->cantidad; ?></td>
					    <td>MXN <?php echo $items->pago; ?> .00</td>
					</tr>				  				
				<?php endforeach; ?>								
			</tbody>				
</table>