inicio_login

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

 fon_login

 inicio_create_user

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

 fin_create_user

 ini_forg
<?php echo form_open("auth/forgot_password");?>
      <div>
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </div>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>
 fin_forg

 inicio_lib_view

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Proyecto T-SHIRT &amp; STAFF para la materia de Administracion de Proyectos">
    <meta name="author" content="Andrea Prott &amp; Alfonso Ramirez">
    <title>T-SHIRT &amp; STAFF</title>

    <!-- Inicio librerias Bootstrap-->
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- Fin librerias Bootstrap-->

    
    <!--Inicio ibrerias JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--Fin ibrerias JQuery-->

    <!-- Nuevas librerias-->

</head>

 fin_lib_view