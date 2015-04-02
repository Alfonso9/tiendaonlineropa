<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>


<section class="#">
 <h1>Iniciar Sesion</h1> 
  <div id="infoMessage"><?php echo $message;?></div>
  <?php echo form_open("auth/login");?>
    <div class="form-group">
      <?php echo lang('login_identity_label', 'identity');?>
      <?php echo form_input($identity,'','type="email" class="form-control"');?>
    </div>
    <div class="form-group">
      <?php echo lang('login_password_label', 'password');?>
      <?php echo form_input($password, '', 'type="password" class="form-control"');?>
    </div>
    <div>
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </div>
    <div>
      <?php echo form_submit('submit', lang('login_submit_btn'), "class='#'");?>
    </div>
  <?php echo form_close();?>
  <div>
    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
  </div>
</section>

<?php $this->load->view('footer/footer_view'); ?>