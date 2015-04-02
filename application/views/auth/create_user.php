<?php $this->load->view('head/librerias_view'); ?>
<?php $this->load->view('header/header_view'); ?>

<section class="#">
      <h1>Crear Usuario</h1>
      <div id="infoMessage"><?php echo $message;?></div>
      <?php echo form_open("auth/create_user");?>
            <div class="form-group">
                  <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                  <?php echo form_input($first_name,'','type="text" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                  <?php echo form_input($last_name,'','type="text" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_company_label', 'company');?> <br />
                  <?php echo form_input($company,'','type="text" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_email_label', 'email');?> <br />
                  <?php echo form_input($email,'','type="email" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_phone_label', 'phone');?> <br />
                  <?php echo form_input($phone,'','type="text" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_password_label', 'password');?> <br />
                  <?php echo form_input($password,'','type="password" class="form-control"');?>
            </div>
            <div class="form-group">
                  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                  <?php echo form_input($password_confirm,'','type="password" class="form-control"');?>
            </div>
            <div>
                  <?php echo form_submit('submit', 'Guardar', "class='#'");?></p>
            </div>
      <?php echo form_close();?>
</section>


<?php $this->load->view('footer/footer_view'); ?>