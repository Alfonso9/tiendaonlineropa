<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Agregar Material</h1>
	</div>
	<div class="container">
		
		<form method="POST" >
			<table class="table table-hover" >
				<tr>
					<td><label for="cod_mat">Codigo :</label></td>
					<td><input type="text"  name="cod_mat" id="cod_mat" /></td>
				</tr>
				<tr>
					<td><label for="desc_mat">Descripcion :</label></td>
					<td><input type="text"  name="desc_mat" id="desc_mat"/></td>
				</tr>
				<tr>
					<td><label for="color">Color : </label></td>
					<td><input type="text"  name="color" id="color" /></td>
				</tr>
				<tr>
					<td><label for="cant_mat">Cantidad De Materia :</label></td>
					<td><input type="text"  name="cant_mat" id="cant_mat" /></td>
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
			$cod_mat= $this->input->post('cod_mat');
			$desc_mat= $this->input->post('desc_mat');
				$cant_mat=$this->input->post('cant_mat');
				$color=$this->input->post('color');
				$data=array(
					'cod_mat'=>$cod_mat,
					'desc_mat'=>$desc_mat,
					'color'=>$color,
					'cant_mat'=>$cant_mat
					);
			$this->db->where('cod_mat',$cod_mat);
			$prueba= $this->db->get('material');
			if($prueba->num_rows() > 0){
				redirect('welcome/inserErr');
			}else{
				$this->db->insert('material',$data);
				redirect('welcome/materiAdm');
			}
		}
	?>	