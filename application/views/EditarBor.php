<?php $this->load->view('headers/menuBor'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FFA540; text-align:center"> 
		<h1 style="font-size: 50pt">Actualización Del Material</h1>
	</div>
	<div class="container">
		
		<form method="POST">
			<table class="table table-hover" >
				<tr>
					<td><label for="cod_mat">Codigo :</label></td>
					<td><label type="text"  name="cod_mat" id="cod_mat" ><?php echo $cod_mat ;?></lebel></td>
				</tr>
				<tr>
					<td><label for="desc_mat">Descripcion :</label></td>
					<td><label type="text"  name="desc_mat" id="desc_mat" ><?php echo $desc_mat ;?></lebel></td>
				</tr>
				<tr>
					<td><label for="color">Color : </label></td>
					<td><label type="text"  name="color" id="color" ><?php echo $color ;?></lebel></td>
				</tr>
				<tr>
					<td><label for="cant_mat">Cantidad De Materia :</label></td>
					<td><input type="text"  name="cant_mat" id="cant_mat" value="<?=$cant_mat?>"/></td>
				</tr>
				<tr>

					<td><h6>* Solo prodras Modificar Cantidad De Materia </h6></br>
						<input class="btn btn-success btn-lg" type="submit" name="Editar" id="Editar" value="Editar"/></td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
		if (isset($_POST['Editar'])){
			$cant_mat=$_POST['cant_mat'];
			$data=array(
				'cant_mat'=>$cant_mat
				);
			$this->db->where('cod_mat',$cod_mat);
			$this->db->update('material',$data);
			redirect('welcome/inventarioB');
		}
	?>	