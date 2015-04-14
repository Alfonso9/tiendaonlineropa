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
        	<h1>Perfil /</h1>
            <li>
                <a href="dCuenta">0. MI CUENTA</a>
            </li>
            <li>
                <a href="dAcceso">1. DATOS DE ACCESO</a>
            </li>
            <li>
                <a href="dPersonal">2. DATOS PERSONALES</a>
            </li>
            <li>
                <a href="dPedido">3. PEDIDOS REALIZADOS</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
        <!--Main Content -->
    <div class="col-xs-5">   
        <section class="group">       
            <h2><?php echo $query->nombre.' '.$query->aPaterno.' '.$query->aMaterno; ?></h2>
            <h5><small><strong>DATOS DE ACCESO</strong></small></h5>
            <p>Podrás cambiar tus datos de acceso (e-mail y contraseña). Recuerda que la seguridad de tus datos personales es importante, debes utilizar una contraseña segura y cambiarla periódicamente.</p>    
            <h5><small><strong>DATOS PERSONALES</strong></small></h5>
            <p>Podrás acceder y modificar tus datos personales (nombre, dirección de facturación, teléfono,...) para facilitar tus futuras compras y notificarnos cambios en tus datos de contacto.</p>
            <h5><small><strong>PEDIDOS REALIZADOS</strong></small></h5>
            <p>Mantente informado sobre el estado de los pedidos que hayas realizado. Si los pedidos están siendo enviados a tu domicilio, encontrarás enlaces para hacer el seguimiento de la entrega.</p>
        </section>
    </div>    
</div>
<?php $this->load->view('footer/footer_view'); ?>