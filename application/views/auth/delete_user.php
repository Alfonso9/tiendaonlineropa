<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>


<h1><?php echo lang('delete_heading');?></h1>
<p><?php echo sprintf(lang('delete_subheading'), $user->username);?></p>
<?php echo $user->id; ?>

<section>
	<form class="form-horizontal" name="form" action="auth/delete_user" method="POST">
		<div class="form-group">
			<?php echo lang('delete_confirm_y_label', 'confirm');?>	    
		    <input type="radio" name="confirm" value="yes" checked="checked"/>
			<?php echo lang('delete_confirm_n_label', 'confirm');?>
			<input type="radio" name="confirm" value="no" />			    
			<?php echo form_hidden($csrf); ?>
  			<?php echo form_hidden(array('id'=>$user->id)); ?>
		</div>
		<div>
			<button type="submit" class="#"><?php echo lang('delete_submit_btn');?></button>
		</div>
	</form>
</section>

<?php $this->load->view('footer/footer_view'); ?>