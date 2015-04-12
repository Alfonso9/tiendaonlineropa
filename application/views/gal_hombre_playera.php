<?php $this->load->view('head/librerias_view');?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>

	<section>
		<?php foreach ($query as $prod): ?>
			<article class="producto">
				<img src="<?= base_url()."/".$prod->img_p;?>" alt="" class="img-responsive">
				<div class="compra">
					<?php 
						$tok = strtok($prod->talla, "|");
						while ($tok != "0") {
							echo '<div class="btn-group" role="group" aria-label="...">';
							echo '<button type="button" class="btn btn-default talla '.$tok.'">'.$tok.'</button>';
							echo '</div>';
							$tok = strtok("|");
						}						
					 ?>								 							
					<?php $php_array = array(
							               'id'      => $prod->cod_prod,
							               'qty'     => 1,
							               'price'   => $prod->precio,
							               'name'    => $prod->tipo,
							               'options' => array(	'desc'	=> 	$prod->descrip,
							               						'color' => 	$prod->color, 
							               						'genero'=> 	$prod->genero,							               						
							               					)
            							);            			
					?>					
					<a class="btnadd" onclick="addProdCar(<?php echo htmlspecialchars(json_encode($php_array)); ?>);">
						<?php echo lang('caradd_submit_btn'); ?></a>
				</div>
				<div>
					<p class="text-uppercase text-center"><?= $prod->tipo;?> <?= $prod->modelo;?></p>
					<span><strong><p class="text-center">MXN <?= $prod->precio;?></p></strong></span>
					<span><p class="text-center"><?= $prod->talla;?></p></span>
				</div>				
				<!--<button onclick="test(<?php# echo htmlspecialchars(json_encode($php_array)); ?>)"></button>-->
			</article>
		<?php endforeach;?>
	</section>	
	<script type="text/javascript">
		function test()
		{										
			alert(talla);
		}
		var btn1 = $(".CH"); 
		var btn2 = $(".M");
		var btn3 = $(".G");
		var btn4 = $(".XG");
		var talla = null;
		$(btn1).click(function(e){talla = "CH"});
		$(btn2).click(function(e){talla = "M"});
		$(btn3).click(function(e){talla = "G"});
		$(btn4).click(function(e){talla = "XG"});

		function addProdCar(data) 
		{		
			if(talla != null)
			{
				var jso = {"id":data['id'],"qty":data['qty'],"price":data['price'],"name":data['name'],
							"options":{"desc":data['options']['desc'],"color":data['options']['color'],
							"genero":data['options']['genero'],"talla":talla}};
				talla = null;
			
		       	$.ajax
		        ({
		        	type: "POST",
			        url: "<?php echo base_url();?>auth/addProd",	        
					data: {'data' : jso},
					success: function(json)
							{
								try
								{								
									alert("Agregado a tu compra");
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
				alert("Seleccione la talla");		
	    }
	</script>
<?php $this->load->view('footer/footer_view'); ?>