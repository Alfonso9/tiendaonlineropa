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
					<?php $php_array = array(
							               'id'      => $prod->cod_prod,
							               'qty'     => 1,
							               'price'   => $prod->precio,
							               'name'    => $prod->tipo,
							               'options' => array(	'desc'	=> 	$prod->descrip,
							               						'color' => 	$prod->color, 
							               						'genero'=> 	$prod->genero,							               						
							               						'talla'	=>	$prod->talla,				               	
							               					)
            							);            			
					?>
					<a onclick="addProdCar(<?php echo htmlspecialchars(json_encode($php_array)); ?>);">
						<?php echo lang('caradd_submit_btn'); ?>
					</a>
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
		function test(das)
		{					
			alert(das['id']+das['name']);
		}

		function addProdCar(data) 
		{		
			/*var data = <?php echo json_encode($php_array); ?>;*/
	       	$.ajax
	        ({
	        	type: "POST",
		        url: "<?php echo base_url();?>auth/addProd",	        
				data: {'data' : data},
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
	</script>

<?php $this->load->view('footer/footer_view'); ?>