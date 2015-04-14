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
         <h4>CAMBIO DE DATOS DE TU CUENTA</h4>    
        <div id="infoMessage"><?php echo $message;?></div>          
        <form class="form-horizontal" name="form" action="<?php base_url();?>edit_cuenta" method="POST">            
              <div class="form-group">
                    <label><?php echo lang('create_user_fuser_label');?></label><br>
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
              </div>
              <div class="form-group">
                    <label><?php echo lang('edit_user_validation_email_label');?></label><br>
                    <input type="email" name="email" class="form-control" disabled="true" value="<?php echo $user->email;?>">
              </div>               
              <div class="form-group">
                    <label><?php echo lang('create_user_password_label', 'phone');?></label><br>
                    <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                    <label><?php echo lang('create_user_password_confirm_label');?></label><br>
                    <input type="password" name="password_confirm" class="form-control">          
              </div>            
              <div>
                    <button class="form-btn" type="submit"><?php echo lang('edit_user_submit_btn');?></button>            
              </div>
        </form>
      </section> 
    </div>    
</div>
<?php $this->load->view('footer/footer_view'); ?>