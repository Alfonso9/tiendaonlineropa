<?php $this->load->view('head/librerias_view'); ?>
<?php $this->load->view('header/header_view'); ?>

<div id="infoMessage"><?php echo $message;?></div>

<section class="#">
 	<h1>Crear Grupo</h1>
  	<div id="infoMessage"><?php echo $message;?></div>
	<?php echo form_open("auth/create_group");?>
     	<div class="form-group">
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name,'','type="text" class="form-control"');?>
      	</div>
		<div class="form-group">
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description,'','type="text" class="form-control"');?>
        </div>
		<div>
			<?php echo form_submit('submit', 'Guardar', "#'");?></p>
		</div>
	<?php echo form_close();?>
</section>


<?php $this->load->view('footer/footer_view'); ?>
