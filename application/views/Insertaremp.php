<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Agregar Empleado</h1>
	</div>
	<div class="container">
		
		<form method="POST" >
			<table class="table table-hover" >
				<tr>
					<td><label for="nombre">Nombre :</label></td>
					<td><input type="text"  name="nombre" id="nombre" /></td>
				</tr>
				<tr>
					<td><label for="aPaterno">Apellido Paterno :</label></td>
					<td><input type="aPaterno"  name="aPaterno" id="aPaterno"/></td>
				</tr>
				<tr>
					<td><label for="aMaterno">Apellido Materno :</label></td>
					<td><input type="aMaterno"  name="aMaterno" id="aMaterno"/></td>
				</tr>
				<tr>
					<td><h6>* No podras insertar si no hay usuarios disponibles </h6></br>
						<input class="btn btn-success btn-lg" type="submit" name="Insertar" id="Insertar" value="Insertar"/></td>
				</tr>
				<tr>
				<select name="usuario">
					<?php
					$this->db->where('active','0'); 
					$query = $this->db->get('users');
					foreach ($query ->result() as $row) {
                    $combobit .=" <option value='".$row->id."'>".$row->username."</option>";
                }
      		  echo $combobit; ?>
   			</select>
			</tr>
			</table>
		</form>
	</div>
	<?php 
		if (isset($_POST['Insertar'])){
			$id= $this->input->post('iduser');
			$nombre= $this->input->post('nombre');
			$usuario=$_POST['usuario'];
				$aPaterno=$this->input->post('aPaterno');
				$aMaterno=$this->input->post('aMaterno');
				$data=array(
					'nombre'=>$nombre,
					'aPaterno'=>$aPaterno,
					'aMaterno'=>$aMaterno,
					'iduser'=>$usuario
					);
			$this->db->where('iduser',$id);
			$prueba= $this->db->get('empleado');
			if($prueba->num_rows() > 0){
				redirect('welcome/insertemp');
			}else{
				$this->db->insert('empleado',$data);
				redirect('welcome/Usuarios');
			}
		}
	?>	