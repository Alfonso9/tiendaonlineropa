<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Actualizacion de Grupos</h1>
	</div>
	<div class="container">
		
		<form method="POST">
			<table class="table table-hover" >
				<tr>
					<td><label for="name">Nombre :</label></td>
					<td><input type="text"  name="name" id="name" value="<?php echo $name;?>"/></td>
				</tr>
				<tr>
					<td><label for="description">Descripcion:</label></td>
					<td><input type="text"  name="description" id="description" value="<?php echo $description;?>"/></td>
				</tr>
				<tr>
					<td><h6>* No se pobra cambiar el Numero </h6></br>
						<input class="btn btn-success btn-lg" type="submit" name="Editar" id="Editar" value="Editar"/></td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
		if (isset($_POST['Editar'])){
			$name=$_POST['name'];
			$description=$_POST['description'];
			$data=array(
				'name'=>$name,
				'description'=>$description,
				);
			$this->db->where('id',$id);
			$this->db->update('groups',$data);
			redirect('welcome/Grupo');
		}
	?>	