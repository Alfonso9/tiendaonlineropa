<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>

<section>
	<?php foreach ($query as $prod): ?>
		<article>
			<img src="<?= base_url()."/".$prod->img_p;?>" alt="">
			<p><strong><?= $prod->tipo;?> <?= $prod->modelo;?></strong></p>
			<span>MXN <?= $prod->precio;?></span><br>
			<span><?= $prod->talla;?></span><br>

			<!--<?php /*$php_array = array(	'codigo' => $prod->cod_prod,
										'tipo' => $prod->tipo,										
										'modelo' => $prod->modelo,
										'genero' => $prod->genero,
										'color' => $prod->color,
										'desc' => $prod->descrip,
										'precio' => $prod->precio,
										'cantidad' => 1
									);*/ 
			?>-->
			<?php $php_array = array(
								               'id'      => 'sku_123ABC',
								               'qty'     => 1,
								               'price'   => 39.95,
								               'name'    => 'T-Shirt',
								               'options' => array('Size' => 'L', 'Color' => 'Red')
            ); 
			?>
			<button onclick="addProdCar();"><?php echo lang('caradd_submit_btn'); ?></button>
		</article>
	<?php endforeach;?>
</section>
<a href="<?= base_url()?>auth/compra">compra</a>
<script type="text/javascript">
	function addProdCar() 
	{		
		var data = <?php echo json_encode($php_array); ?>;
       	$.ajax
        ({
        	type: "POST",
	        url: "<?php echo base_url();?>auth/addProd",	        
			data: {'data' : data},
			success: function(json)
					{
						try
						{								
							//alert(data['precio']);
							//var obj = jQuery.parseJSON(json);
							//alert(obj['codigo']);
							alert("listo");
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