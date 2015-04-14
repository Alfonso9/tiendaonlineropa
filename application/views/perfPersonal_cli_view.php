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
        <h4>CAMBIO DE DATOS PERSONALES</h4>      
        <div id="infoMessage"><?php echo $message;?></div>          
      <form class="form-horizontal" name="form" action="<?php base_url();?>edit_personal" method="POST">
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_frfc_label');?></label><br>
                  <input type="text" name="rfc" class="form-control" value="<?php echo $query->rfc; ?>"> 
                  <input type="hidden" name="id" class="form-control" value="<?php echo $user->id; ?>">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fname_label');?></label><br>
                  <input type="text" name="first_name" class="form-control" value="<?php echo $query->nombre; ?>">
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_lname_label');?></label><br>
                  <input type="text" name="last_name" class="form-control" value="<?php echo $query->aPaterno.' '.$query->aMaterno; ?>">
            </div>               
            <div class="form-group">
                  <label><?php echo lang('create_user_phone_label', 'phone');?></label><br>
                  <input type="text" name="phone" class="form-control" value="<?php echo $user->phone; ?>">
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_birthday_label');?></label><br>
                  <input type="date" name="birthday" class="form-control" value="<?php echo $query->fecha_nac; ?>" disabled="true">          
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_faddres_label');?></label><br>
                  <input type="text" name="direccion" class="form-control" value="<?php echo $query->calle.' '; if($query->numero != 0) echo $query->numero; ?>">   
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fcp_label');?></label><br>
                  <input type="text" name="cp" class="form-control" value="<?php echo $query->cp; ?>">     
            </div>            
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fcolonia_label');?></label><br>
                  <input type="text" name="colonia" class="form-control" value="<?php echo $query->colonia; ?>">              
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fmuni_label');?></label><br>
                  <input type="text" name="municipio" class="form-control" value="<?php echo $query->municipio; ?>">              
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fcity_label');?></label><br>
                  <input type="text" name="ciudad" class="form-control" value="<?php echo $query->ciudad; ?>">   
            </div>
            <div class="form-group">
                  <label><?php echo lang('edit_user_validation_fstate_label');?></label><br>
                  <input type="text" name="estado" class="form-control" value="<?php echo $query->estado; ?>">     
            </div>
            <div>
                  <button class="form-btn" type="submit"><?php echo lang('edit_user_submit_btn');?></button>            
            </div>
      </form>
    </div>    
</div>
<?php $this->load->view('footer/footer_view'); ?>