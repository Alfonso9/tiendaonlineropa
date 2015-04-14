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
      <h2 class="compra">1. Tu Compra</h2>      
      <h2 class="envio des">2. Envío</h2>
      <h2 class="pago des">3. Pago</h2>
    </div>
	<div class="table-responsive">          
		<table class="table">
			<thead>
			  <tr>
			  	<th>CODIGO</th>
			    <th>Nº</th>
			    <th>PRODUCTO</th>
			    <th>DESCRIPCIÓN</th>
			    <th>COLOR</th>
			    <th>GENERO</th>
			    <th>TALLA</th>
			    <th>CANTIDAD</th>
			    <th>PRECIO</th>
			    <th>TOTAL</th>
			    <th>ARCHIVO</th>
			    <th>SERVICIO</th>
			    <th>ELIMINAR</th>			    
			  </tr>
			</thead>
			<tbody class="text-uppercase">
				<?php $i = 0; $arch = "";?>
				<?php foreach ($this->cart->contents() as $items): ?>
					<?php $i++; ?>
					<tr>
					    <td><?php echo $items['id']; ?></td>
					    <td><?php echo $i; ?></td>
					    <td><?php echo $items['name']; ?></td>
					    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					    	<?php 	if($option_name != "envio" && $option_name != "pago" && $option_name != "archivo" && $option_name != "servicio")					    						
					    				echo '<td>'.$option_value.'</td>';?>
					    <?php endforeach; ?>				    
					    <td>
							  <ul class="pagination pagination-sm ulcantidad">
							    <li class=""><a id="dism" onclick="disminuir(<?php echo htmlspecialchars(json_encode($items['qty'])).','.
							    												htmlspecialchars(json_encode($items['rowid'])); ?>)" 
							    	aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
							    <li class="disable"><a class="noactivo"><?php echo $items['qty']; ?><span class="sr-only">Current</span></a></li>
							    <li class="#"><a onclick="aumentar(<?php echo htmlspecialchars(json_encode($items['qty'])).','.
							    												htmlspecialchars(json_encode($items['rowid'])); ?>)" 
							    	aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							  </ul>
					    </td>
					    <td>MXN <?php echo $items['price']; ?>.00</td>
					    <td>MXN <?php echo $this->cart->format_number($items['subtotal']); ?></td>	
					    <td>				
					    	<form action="<?php echo base_url();?>auth/addArchivo" name="fileinfo" id="archivoform" method="post" enctype="multipart/form-data">
					    		<input type="file" class="loadfile" name="userfile" id="userfile" />
					    		<input type="hidden" name="id" value="<?php echo $items['id']; ?>">
					    		<input type="submit" class="loadfile " id="submmit" value="Subir">
					    	</form>					    	
					    </td>
					    <td>
					    	<div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select servicio" data-toggle="dropdown" href="#">
					    	Servicio<span class="caret"></span></a>
					            <ul class="dropdown-menu servicio">
					                <li><a id="<?php echo $items['id']; ?>">Bordado</a></li>
					                <li><a id="<?php echo $items['id']; ?>">Serigrafía</a></li>
					            </ul>
					        </div>
					    </td>
					    <td><a class="glyphicon glyphicon-remove" onclick="delItem(<?php echo htmlspecialchars(json_encode($items['rowid'])); ?>)"></a></td>
					</tr>									  			
				<?php endforeach; ?>

			</tbody>				
		</table>
		<table class="table totalproducts">
			<td class="total">Total de productos:</td>
			<td><?php echo $i ?> Productos</td>			
		</table>
		<table class="table totalMXN">
			<td class="total">Total:</td>
			<td>MXN <?php echo $this->cart->format_number($this->cart->total()); ?></td>			
		</table>
		<table class="table buttons">			
			<td class="totale"><a class="form-btn-buy" role="button" href="mujer_playera">SEGUIR COMPRANDO</a></td>			
			<td class="total"><a class="form-btn-buy" role="button" 
			onclick="<?php if($i<1) echo "incomplete()"; ?>" 
			href="<?php if($i>0) echo "envio"; else echo ""; ?>" >TRAMITAR PEDIDO</a></td>
		</table>
	</div>
</div>
<script type="text/javascript">
		$(".servicio li a").click(function(){
		  	var selText = $(this).text();
		  	var id = $(this).val();
		  	$.ajax
		        ({
		        	type: "POST",
			        url: "<?php echo base_url();?>auth/addServicio",	        
					data: {'servicio' : selText, 'id' : $(this).attr('id') },
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
		  	//$(this).parents('.btn-group').find('.servicio').html(selText+' <span class="caret"></span>');
		});
		function disminuir(num, id)
		{
			if (num > 1) 
			{
				num -= 1;
				$.ajax
		        ({
		        	type: "POST",
			        url: "<?php echo base_url();?>auth/actCantidad",	        
					data: {'id' : id, 'num' : num},
					success: function()
							{
								try
								{								
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
		    else
		    	document.getElementById("dism").setAttribute("disabled", "disabled");

		}
		function aumentar(num, id)
		{
			num += 1;
			$.ajax
	        ({
	        	type: "POST",
		        url: "<?php echo base_url();?>auth/actCantidad",	        
				data: {'id' : id, 'num' : num},
				success: function()
						{
							try
							{								
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
		function incomplete()
		{
			alert("No ha agregado articulos a su compra");
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