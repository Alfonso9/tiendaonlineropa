<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Actualizacion de Usuarios</h1>
	</div>
	<div class="container">
		
		<form method="POST">
			<table class="table table-hover" >
				<tr>
					<td><label for="id">Numero de Usuario :</label></td>
					<td><label type="text"  name="id" id="id" ><?php echo $id ;?></lebel></td>
				</tr>
				<tr>
					<td><label for="username">Usuario :</label></td>
					<td><input type="text"  name="username" id="username" value="<?php echo $username;?>"/></td>
				</tr>
				<tr>
					<td><label for="password">Password : </label></td>
					<td><input type="text"  name="password" id="password" value="<?php echo $password ;?>"/></td>
				</tr>
				<tr>
					<td><select name="estado">
						<option value="0">Desactivado</option>
  						<option value="1">activado</option>
					</select>
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
			$username=$_POST['username'];
			$Password=$_POST['password'];
			$active=$_POST['estado'];
			$data=array(
				'username'=>$username,
				'password'=>$Password,
				'active'=>$active
				);
			$this->db->where('id',$id);
			$this->db->update('users',$data);
			redirect('welcome/Usuarios');
		}
	?>	