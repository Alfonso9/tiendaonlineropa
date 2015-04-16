<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Agregar Grupo</h1>
	</div>
	<div class="container">
		
		<form method="POST" >
			<table class="table table-hover" >
				<tr>
					<td><label for="name">Nombre del grupo :</label></td>
					<td><input type="text"  name="name" id="name"/></td>
				</tr>
				<tr>
					<td><label for="description">Descripcion : </label></td>
					<td><input type="text"  name="description" id="description" /></td>
				</tr>
				<tr>
					<td><h6>* Solo prodras Modificar Cantidad De Materia </h6></br>
						<input class="btn btn-success btn-lg" type="submit" name="Insertar" id="Insertar" value="Insertar"/></td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
		if (isset($_POST['Insertar'])){
			$id= $this->input->post('iduser');
			    $name= $this->input->post('name');
				$description=$this->input->post('description');
				$data=array(
					'name'=>$name,
					'description'=>$description,
					);
			$this->db->where('id',$id);
			$prueba= $this->db->get('groups');
			if($prueba->num_rows() > 0){
				redirect('welcome/insergru');
			}else{
				$this->db->insert('groups',$data);
				redirect('welcome/Grupo');
			}
		}
	?>	