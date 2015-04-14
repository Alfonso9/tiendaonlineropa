<?php $this->load->view('head/librerias_view'); ?>
<?php $this->load->view('header/header_view'); ?>

<section class="create-user">
      <div class="form-create-user"> 
            <h2><?php echo lang('create_user_heading'); ?></h2>
            <h5><small><strong>CREAR CUENTA</strong></small></h5>
            <p><small>Completa el siguiente formulario para registrarte en TSHIRTANDSTAFF.COM Guardaremos los datos que nos proporciones para facilitar tus compras a través de la web.</small></p>
      <div id="infoMessage"><?php echo $message;?></div>
      <form class="form-horizontal" name="form" action="<?php base_url();?>create_user" method="POST">
            <div class="form-group">
                  <input type="text" name="first_name" class="form-control" placeholder="Nombre *">                                     
            </div>
            <div class="form-group">
                  <input type="text" name="last_name" class="form-control" placeholder="Apellidos *">                                     
            </div>
            <div class="form-group">
                  <input type="text" name="phone" class="form-control" placeholder="Télefono">                                     
            </div>
            <div class="form-group">
                  <input type="date" name="birthday" class="form-control" placeholder="Fecha de nacimiento">                                     
            </div>
            <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail *">                                     
            </div>
            <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Contraseña *">                                     
            </div>
            <div class="form-group">
                  <input type="password" name="password_confirm" class="form-control" placeholder="Verificar contraseña *">                                     
            </div>
            <div>
                  <p><small>* Campos obligatorios</small></p>  
            </div>
            <div>
                  <button class="form-btn" type="submit"><?php echo lang('create_user_submit_btn');?></button>         
            </div>
      </form>
      </div>
      
</section>


<?php $this->load->view('footer/footer_view'); ?>