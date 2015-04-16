<?php $this->load->view('headers/menuAdm'); ?>
	<br></br>

	<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Actualización Del Producto</h1>
	</div>
	<div class="container">
		
		<form method="POST">
			<table class="table table-hover" >
				<tr>
					<td><label for="cod_prod">Codigo :</label></td>
					<td><label name="cod_prod" id="cod_prod" ><?php echo $cod_prod; ?></label></td>
				</tr>
				<tr>
					<td><label for="descrip">Descripcion :</label></td>
					<td><input type="text"  name="descrip" id="descrip" value="<?php echo $descrip ;?>"/></td>
				</tr>
				<tr>
					<td><label for="color">Color : </label></td>
					<td><input type="text"  name="color" id="color" value="<?php echo $color ;?>"/></td>
				</tr>
				<tr>
					<td><label for="tipo">Tipo : </label></td>
					<td><input type="text"  name="tipo" id="tipo" value="<?php echo $tipo ;?>"/></td>
				</tr>
				<tr>
					<td><label for="modelo">Modelo : </label></td>
					<td><input type="text"  name="modelo" id="modelo" value="<?php echo $modelo ;?>"/></td>
				</tr>
				<tr>
					<td><label for="talla">Talla : </label></td>
					<td><input type="text"  name="talla" id="talla" value="<?php echo $talla ;?>"/></td>
				</tr>
				<tr>
					<td><label for="precio">Precio : </label></td>
					<td><input type="text"  name="precio" id="precio" value="<?php echo $precio ;?>"/></td>
				</tr>
				<tr>
					<td><label for="genero">Genero : </label></td>
					<td><input type="text"  name="genero" id="genero" value="<?php echo $genero ;?>"/></td>
				</tr>
				<tr>
					<td><label for="cant_p">Cantidad De Producto :</label></td>
					<td><input type="text"  name="cant_p" id="cant_p" value="<?php echo $cant_p ;?>"/></td>
				</tr>
				<tr>
					<td><h6>* No se pobra cambiar el Codigo </h6></br>
						<input class="btn btn-success btn-lg" type="submit" name="Editar" id="Editar" value="Editar"/></td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
		if (isset($_POST['Editar'])){
			$color=$_POST['color'];
			$modelo=$_POST['modelo']; 
			$talla=$_POST['talla'];
			$cant_p=$_POST['cant_p'];
			$descrip=$_POST['descrip'];
			$precio=$_POST['precio'];
			$genero=$_POST['genero'];
			$tipo=$_POST['tipo'];
			$data = array(
					'color'=>$color,
					'modelo'=>$modelo,
					'talla'=>$talla,
					'cant_p'=>$cant_p,
					'descrip'=>$descrip,
					'precio'=>$precio,
					'genero'=>$genero,
					'tipo'=>$tipo
				);
			$this->db->where('cod_prod',$cod_prod);
			$this->db->update('Producto',$data);
			redirect('welcome/prodAdm');
		}
	?>	