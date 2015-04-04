<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>


<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>
<form class="form-horizontal" name="form" action="<?php base_url();?>forgot_password" method="POST">
	<div>
		<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label>
		<input type="email" name="email">		
	</div>
	<div>
		<button type="submit" class="#"><?php echo lang('forgot_password_submit_btn');?></button>
	</div>
</form>


<?php $this->load->view('footer/footer_view'); ?>