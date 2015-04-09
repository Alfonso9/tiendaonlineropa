<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>
<?php $i = 0; ?>
<?php foreach ($this->cart->contents() as $item):?>
	<hr>
	<label for="" ><?= $item['id']; ?></label><br>
	$i++;
<?php endforeach; ?>

<?php $this->load->view('footer/footer_view'); ?>