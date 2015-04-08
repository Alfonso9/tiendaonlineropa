<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>

	<section>
		<?php foreach ($query as $prod): ?>
			<article>
				<img src="<?= base_url()."/".$prod->img_p;?>" alt="">
				<p><strong><?= $prod->tipo;?> <?= $prod->modelo;?></strong></p>
				<span>MXN <?= $prod->precio;?></span><br>
				<span><?= $prod->talla;?></span>
			</article>
		<?php endforeach;?>
	</section>

<?php $this->load->view('footer/footer_view'); ?>