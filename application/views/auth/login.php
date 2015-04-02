<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>


<section class="#">
 <h1><?php echo lang('login_heading');?></h1> 
  <div id="infoMessage"><?php echo $message;?></div>
  <form class="form-horizontal" name="form" action="<?php base_url();?>login" method="POST">
    <div class="form-group">
      <label><?php echo lang('login_identity_label', 'identity');?></label>          
      <input type="email" name="identity" class="form-control"/>
    </div>
    <div class="form-group">
      <label><?php echo lang('login_password_label', 'password');?></label>          
      <input type="password" name="password" value="" class="form-control"/>
    </div>
    <div class="form-group">
      <label><?php echo lang('login_remember_label', 'remember');?></label>
      <input type="checkbox" name="remember" id="remember" value="1" checked="checked" />
    </div>
    <div class="form-group">
      <button type="submit" class="#"><?php echo lang('login_submit_btn');?></button>
    </div>
  </form>
  <div>
    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>    
  </div> 
  <h1><?php echo lang('signup_heading');?></h1> 
  <div>
    <a href="create_user">
      <button class=""><?php echo lang('signup_btn');?></button>
    </a>
  </div>
</section>

<?php $this->load->view('footer/footer_view'); ?>