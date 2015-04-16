<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Actualizacion de Empleados</h1>
	</div>
	<div class="container">
		
		<form method="POST">
			<table class="table table-hover" >
				<tr>
					<td><label for="nombre">Nombre :</label></td>
					<td><input type="text"  name="nombre" id="nombre"     value="<?php echo $nombre;?>"/></td>
				</tr>
				<tr>
					<td><label for="aPaterno">Apellido Paterno :</label></td>
					<td><input type="text"  name="aPaterno" id="aPaterno" value="<?php echo $aPaterno;?>"/></td>
				</tr>
				<tr>
					<td><label for="aMaterno">Apellido Materno : </label></td>
					<td><input type="text"  name="aMaterno" id="aMaterno" value="<?php echo $aMaterno ;?>"/></td>
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
			$nombre=$_POST['nombre'];
			$aPaterno=$_POST['aPaterno'];
			$aMaterno=$_POST['aMaterno'];
			$data=array(
				'nombre'=>$nombre,
				'aPaterno'=>$aPaterno,
				'aMaterno'=>$aMaterno,
				);
			$this->db->where('iduser',$iduser);
			$this->db->update('empleado',$data);
			redirect('welcome/Usuarios');
		}
	?>	