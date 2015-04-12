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
        <h2><?php echo $query->nombre.' '.$query->aPaterno.' '.$query->aMaterno; ?></h2>
        <h5>DATOS DE ACCESO</h5>
        <p>Podrás cambiar tu datos (contraseña). Recuarda que la sefuridad de tus datos es importante, debes
        utilizar una constraseña segura y cambiarla periodicamente.</p>    
    </div>    
</div>
<?php $this->load->view('footer/footer_view'); ?>