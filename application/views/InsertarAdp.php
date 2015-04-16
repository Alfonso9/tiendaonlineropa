<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Agregar Producto</h1>
	</div>
	<div class="container">
			<?php echo form_open_multipart('welcome/Guardar/'); ?>
			<table class="table table-hover" >
				  
				<tr>
					<td><label for="cod_prod">Codigo :</label></td>
					<td><input type="text"  name="cod_prod" id="cod_prod" /></td>
				</tr>
				<tr>
					<td><label for="descrip">Descripcion :</label></td>
					<td><input type="text"  name="descrip" id="descrip"/></td>
				</tr>
				<tr>
					<td><label for="color">Color : </label></td>
					<td><input type="text"  name="color" id="color" /></td>
				</tr>
				<tr>
					<td><label for="tipo">Tipo : </label></td>
					<td><input type="text"  name="tipo" id="tipo" /></td>
				</tr>
				<tr>
					<td><label for="modelo">Modelo : </label></td>
					<td><input type="text"  name="modelo" id="modelo" /></td>
				</tr>
				<tr>
					<td><label for="talla">Talla : </label></td>
					<td><input type="text"  name="talla" id="talla" /></td>
				</tr>
				<tr>
					<td><label for="precio">Precio : </label></td>
					<td><input type="text"  name="precio" id="precio" /></td>
				</tr>
				<tr>
					<td><label for="genero">Genero : </label></td>
					<td><input type="text"  name="genero" id="genero" /></td>
				</tr>
				<tr>
					<td><label for="cant_p">Cantidad De Producto :</label></td>
					<td><input type="text"  name="cant_p" id="cant_p" /></td>
				</tr>
				<tr>
					<td><label>Imagen:</label></td>
            		<td><?php echo form_upload('pic'); ?></td>
				</tr>
				<tr>
					<td><h6> </h6></br>
						<?php echo form_submit('submit', 'Guardar', 'class="btn btn-primary"'); ?></td>
				</tr>
			</table>
	</div>
	