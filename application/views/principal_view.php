<?php $this->load->view('head/librerias_view');?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>
	<!--Navbar-->
	<?php $this->load->view('carousel_view');?>
	<!--End Navbar-->

    <div class="container">
      <div class="starter-template">
        <h1 align="center">T-SHIRT & STAFF</h1>
        <p class="lead" align="center">Bienvenido a la tienda en linea de nuestra colección de playeras, sudaderas y gorras tanto para hombres como para mujeres, con bordados o impresos en serigrafía.</p>
      </div>
      <div style="text-align: center; width:100%;">
        <a href="#">
          <img src="<?=base_url()?>images/facebook.png">
        </a>
        <a href="#">
          <img src="<?=base_url()?>images/twitter.png">
        </a>
        <a href="#">
          <img src="<?=base_url()?>images/pinterest.png">
        </a>
        <a href="#">
          <img src="<?=base_url()?>images/instagram.png">
        </a>
        <a href="#">
          <img src="<?=base_url()?>images/email.png">
        </a>
        <a href="#">
          <img src="<?=base_url()?>images/spotify.png">
        </a>
      </div>
    </div>

<?php $this->load->view('footer/footer_view'); ?>