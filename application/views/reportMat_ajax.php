<table class="table">
			<thead>
			  <tr>
			    <th>CÓDIGO</th>
			    <th>DESCRIPCIÓN</th>
			    <th>COLOR</th>
			    <th>CANTIDAD</th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach ($query as $items): ?>
					<tr>					    
					    <td class="text-uppercase"><?php echo $items->cod_mat; ?></td>
					    <td class="text-uppercase"><?php echo $items->desc_mat; ?></td>
					    <td class="text-uppercase"><?php echo $items->color; ?></td>
					    <td class="text-uppercase"><?php echo $items->cant_mat; ?></td>
					</tr>				  				
				<?php endforeach; ?>								
			</tbody>				
</table>