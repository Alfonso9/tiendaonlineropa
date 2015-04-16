<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Agregar Usuarios</h1>
	</div>
	<div class="container">
		
		<form method="POST" >
			<table class="table table-hover" >
				<tr>
					<td><label for="usernameid">Usuario :</label></td>
					<td><input type="text"  name="username" id="username" /></td>
				</tr>
				<tr>
					<td><label for="password">contraseña :</label></td>
					<td><input type="password"  name="password" id="password"/></td>
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
			$email="ejemplo@hotmail.com";
			$ipaddress="192.168.1.1";
			$creted_on='1';
			$active='0';
			$id= $this->input->post('id');
			$username= $this->input->post('username');
				$password=$this->input->post('password');
				$email=$this->input->post('email');
				$ipaddress=$this->input->post('ip_address');
				$creted_on=$this->input->post('creted_on');
				$data=array(
					'username'=>$username,
					'password'=>$password,
					'active'=>$active,
					);
			$this->db->where('id',$id);
			$prueba= $this->db->get('users');

			if($prueba->num_rows() > 0 ){
				redirect('welcome/insertusu');
			}else{
				$this->db->insert('users',$data);
				redirect('welcome/Usuarios');
			}
		}
	?>	