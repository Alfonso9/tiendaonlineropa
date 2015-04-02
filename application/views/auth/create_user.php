<?php $this->load->view('head/librerias_view'); ?>
<?php $this->load->view('header/header_view'); ?>

<section class="#">
      <h1><?php echo lang('create_user_heading'); ?></h1>
      <div id="infoMessage"><?php echo $message;?></div>
      <form class="form-horizontal" name="form" action="<?php base_url();?>create_user" method="POST">
            <div class="form-group">
                  <label><?php echo lang('create_user_fname_label', 'first_name');?></label><br>
                  <input type="text" name="first_name" class="form-control">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_lname_label', 'last_name');?></label><br>
                  <input type="text" name="last_name" class="form-control">                                     
            </div>   
            <!--<div class="form-group">
                  <label><?php echo lang('create_user_company_label', 'company');?></label><br>
                  <input type="text" name="company" class="form-control">                                     
            </div>-->            
            <div class="form-group">
                  <label><?php echo lang('create_user_phone_label', 'phone');?></label><br>
                  <input type="text" name="phone" class="form-control">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_birthday_label');?></label><br>
                  <input type="date" name="birthday" class="form-control">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_email_label', 'email');?></label><br>
                  <input type="email" name="email" class="form-control">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_password_label', 'password');?></label><br>
                  <input type="password" name="password" class="form-control">                                     
            </div>
            <div class="form-group">
                  <label><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label><br>
                  <input type="password" name="password_confirm" class="form-control">                                     
            </div>
            <div>
                  <button class="#" type="submit"><?php echo lang('create_user_submit_btn');?></button>            
            </div>
      </form>
</section>


<?php $this->load->view('footer/footer_view'); ?>