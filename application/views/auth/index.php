<?php $this->load->view('head/librerias_view');?>
<?php $this->load->view('header/header_view');?>
<div>
	<a href="<?=base_url()?>auth/create_group">Nuevo Grupo</a>
	<a href="<?=base_url()?>auth/create_user">Nuevo Usuario</a>
	<a href="<?=base_url()?>auth/logout">Logout</a>
</div>
<section class="#">
	<?php foreach ($users as $user):?>
	  	<article class="#">
		    <!--<figure><img class="#" src="#" alt=""></figure>-->
		    <div class="#">
		    	<label for="">Nombre: </label>
		    	<?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?><br>
		    	<label for="">Apellido: </label>
		    	<?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?><br>
		    	<label for="">Correo: </label>
		    	<?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?><br>
		    	<label for="">Grupo: </label>
		    	<?php foreach ($user->groups as $group):?>
          			<?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?>
                <?php endforeach?>
                <br>
                <label for="">Estado: </label>
                <?php if($user->active){echo "Activo";} else {echo "Inactivo";} ?>
		    </div>
		    <div class="#"> 	<!--Botones-->		    
		    	<a type="button" class="#" href="<?php base_url()?>auth/delete_user/<?=$user->id;?>">Eliminar</a><br>
		    	<a type="button" class="#" href="<?php base_url()?>auth/edit_user/<?=$user->id;?>">Editar</a><br>
		    	<a type="button" class="#" href="<?php if($user->active == 1) echo "auth/deactivate/".$user->id; else echo "auth/activate/".$user->id; ?>">Estado</a><br>	    
		    </div>
	 	</article>
 	<?php endforeach;?> 	
</section> 

<?php $this->load->view('footer/footer_view'); ?>