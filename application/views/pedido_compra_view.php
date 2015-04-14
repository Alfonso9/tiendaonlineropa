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
			<?php if(isset($error)) echo $error; ?>
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
			    <th>Archivo</th>
			    <th>Servicio</th>
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
					    	<?php if($option_name != "envio" && $option_name != "pago" && $option_name != "archivo")echo '<td>'.$option_value.'</td>'?>
					    <?php endforeach; ?>				    
					    <td>
							  <ul class="pagination pagination-sm ulcantidad">
							    <li class=""><a id="dism" onclick="disminuir(<?php echo htmlspecialchars(json_encode($items['qty'])).','.
							    												htmlspecialchars(json_encode($items['rowid'])); ?>)" 
							    	aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
							    <li class="disable"><a class="noactivo"><?php echo $items['qty']; ?><span class="sr-only">Current</span></a></li>
							    <li class=""><a onclick="aumentar(<?php echo htmlspecialchars(json_encode($items['qty'])).','.
							    												htmlspecialchars(json_encode($items['rowid'])); ?>)" 
							    	aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							  </ul>
					    </td>
					    <td><?php echo $items['price']; ?></td>
					    <td><?php echo $this->cart->format_number($items['subtotal']); ?></td>	
					    <td>				
					    	<form action="<?php echo base_url();?>auth/addArchivo" name="formdata" method="post" enctype="multipart/form-data">					    	
					    		<input type="file" class="loadfile" name="userfile" id="userfile" />
					    		<a class="glyphicon glyphicon-upload" onclick="subida()"></a>
					    		<input type="submit" class="loadfile submmiit" id="submmit" value="Subir">
					    	</form>
					    </td>
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
		<table class="table buttons">			
			<td class="totale"><a class="btn btn-primary active" role="button" href="mujer_playera">SEGUIR COMPRANDO</a></td>			
			<td class="total"><a class="btn btn-primary active" role="button" 
			onclick="<?php if($i>0) echo ""; else echo "incomplete()" ?>" 
			href="<?php if($i>0) echo "envio"; else echo "" ?>">TRAMITAR PEDIDO</a></td>
		</table>
	</div>
</div>
<script type="text/javascript">
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
		function subida() 
		{	
			alert("hola");
	       	//document.getElementById('submmit').click();
	    }

		function incomplete()
		{
			alert("No ha agregado articulos a su compra");

		    $.ajax
		    ({
			    var formData = new FormData($(this)[0]);

			    $.ajax({
			        url: <?php echo base_url();?>auth/addArchivo,
			        type: 'POST',
			        data: formData,
			        async: false,
			        success: function (data) {
			            alert(data)
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });

			     return false;
			});
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