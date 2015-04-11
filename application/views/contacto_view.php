<?php $this->load->view('head/librerias_view'); ?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>

<div class="row">
    <!--Nav Bar -->
    <nav class="col-xs-3 bs-docs-sidebar">
        <ul id="sidebar" class="nav nav-stacked fixed">
        	<h1>Contacto   /</h1>
            <li>
                <a href="#GroupA">TELÉFONOS</a>
            </li>
            <li>
                <a href="#GroupB">CORREOS</a>
            </li>
            <li>
                <a href="#GroupC">REDES SOCIALES</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
    <div class="col-xs-5">
        <section id="GroupA" class="group">
            <h2>Teléfonos</h2>
            <p>
            	tel.- 522288126059
            </p>
        </section>
        <section id="GroupB" class="group">
            <h2>Correos</h2>
            <p>
            	correo.- contact.mx@tshirtandstaff.com
            </p>
        </section> 
        <section id="GroupC" class="group">
            <h2>Redes sociales</h2>
            <p>
            	facebook.- t-shirt & staff<br>
            	twitter.- @tshirtandstaff<br>
            	pinterest.- t-shirt & staff<br>
            	instagram.- t-shirt & staff<br>
            	spotifu.- t-shirt & staff<br>
            </p>
        </section>  
    </div>


	<div class="col-xs-3">
		<div class="imginfo fixed">
			<img src="<?=base_url()?>/images/contacto.jpg">
		</div>
	</div>

</div>

<?php $this->load->view('footer/footer_view'); ?>