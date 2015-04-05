<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>

	<section>
		<?php foreach ($query as $prod): ?>
			<article>
				<img src="<?= base_url()."/".$prod->img_p;?>" alt="">
				<p><strong><?= $prod->modelo;?></strong></p>
				<span>$ <?= $prod->precio;?></span>
				<span><?= $prod->talla;?></span>
			</article>
		<?php endforeach;?>
	</section>

<?php $this->load->view('footer/footer_view'); ?>