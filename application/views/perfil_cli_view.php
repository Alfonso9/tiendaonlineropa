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
        	<h1>Guía de compra  /</h1>
            <li>
                <a href="#GroupA">CÓMO COMPRAR</a>
            </li>
            <li>
                <a href="#GroupB">PREGUNTAS FRECUENTES</a>
            </li>
            <li>
                <a href="#GroupC">PAGO</a>
            </li>
            <li>
                <a href="#GroupD">ENVÍO</a>
            </li>
            <li>
                <a href="#GroupE">DEVOLUCIONES</a>
            </li>
            <li>
                <a href="#GroupF">CAMBIOS</a>
            </li>
            <li>
                <a href="#GroupG">TECNOLOGÍA</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
    <div class="col-xs-5">
        <section id="GroupA" class="group">
            
        </section>        
    </div>