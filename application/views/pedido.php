<?php $this->load->view('headers/menuMos'); ?>
<br></br>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#6EE768; text-align:center"> 
		<h1 style="font-size: 50pt">Crear Pedido</h1>
</div>
<?php
//error_reporting(0);
$host='localhost';
$basededatos='tienda';
$user='root';
$pass='1990';
$conexion=mysqli_connect($host,$user,$pass,$basededatos);

	$iduser="";
	$folio="";
	$cantidad="";
	$color="";
	$talla="";
	$cod_prod="";
	$fecha="";
	$archivo="";
	$servicio="";
	$pago="";
	$estado_ped="";

if (isset($_GET['modificar'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
		{
			$iduser=$_GET['modificar'];
			$sql2 = "SELECT iduser, folio, cantidad, cod_prod, color, talla, fecha, archivo, servicio, pago, estado_ped FROM pedido WHERE iduser='$iduser' AND cod_prod='$cod_prod'";
			$rec2 = mysqli_query($conexion, $sql2) or die("Error en: $sql2: " . mysqli_error($conexion));
			while ($row=mysqli_fetch_array($rec2)){
			$folio=$row['folio'];	
			$cantidad=$row['cantidad'];
			$fecha=$row['fecha'];
			$archivo=$row['archivo'];
			$servicio=$row['servicio'];
			$pago=$row['pago'];
			$estado_ped=$row['estado_ped'];

		}
}
?>


<div class="container">
			<div >
				<form method="POST"> 
					<table style="text-align:center" class="table table-condensed">
					<tr>
						<td>ID pedido</td>
						<td><input type="text" name="iduser" value = "<?php print $iduser ?>"></td>
					</tr>
					<tr>
						<td>Folio</td>
						<td><input type="text" name="folio" value = "<?php print $folio ?>"></td>
					</tr>
					<tr>
						<td>Cantidad</td>
						<td><input type="text" name="cantidad" value = "<?php print $cantidad ?>"></td>
					</tr>
					<tr>
						<td>Color</td>
						<td><input type="text" name="color" value = "<?php print $color ?>"></td>
					</tr>
					<tr>
						<td>Talla</td>
						<td><input type="text" name="talla" value = "<?php print $talla ?>"></td>
					</tr>
					<tr>
						<td>Codigo de Producto</td>
						<td><input type="text" name="cod_prod"value = "<?php print $cod_prod ?>"></td>
					</tr>
					<tr>
						<td>Fecha</td>
						<td><input type="date" name="fecha"value = "<?php print $fecha ?>"></td>
					</tr>
					<tr>
						<td>Archivo</td>
						<td><input type="text" name="archivo"value = "<?php print $archivo ?>"></td>
					</tr>
					<tr>
						<td>Servicio</td>
						<td><input type="text" name="servicio"value = "<?php print $servicio ?>"></td>
					</tr>
					<tr>
						<td>Pago</td>
						<td><input type="text" name="pago"value = "<?php print $pago ?>"></td>
					</tr>
					<tr>
						<td>Estado de Pedido</td>
						<td><input type="text" name="estado_ped"value = "<?php print $estado_ped ?>"></td>
					</tr>
					<tr>
						<td align =center><input class="btn btn-success btn-lg" type="submit" name="<?php if(isset($_GET['md'])){ echo "modificar"; }else{echo"ingresar";} ?>"value ="<?php if(isset($_GET['md'])){ echo "Modificar"; }else{echo"Ingresar";} ?>"></td>
						
					</tr>
					</table>
				</form>
			</div>
</div>
<div class="container">
	<table style="text-align:center" class="table table-condensed">
		<thead>
			</tr>
<?php


if (isset($_POST['ingresar']))
{
	$iduser=$_POST['iduser'];
	$folio=$_POST['folio'];
	$cantidad=$_POST['cantidad'];
	$color=$_POST['color'];
	$cod_prod=$_POST['cod_prod'];
	$fecha=$_POST['fecha'];
	$archivo=$_POST['archivo'];
	$servicio=$_POST['servicio'];
	$pago=$_POST['pago'];
	$estado_ped=$_POST['estado_ped'];
	$insertSQL = sprintf("INSERT INTO pedido (iduser, folio, cantidad, color, talla, cod_prod, fecha, archivo, servicio, pago, estado_ped) VALUES ('$iduser', '$folio', '$cantidad', '$color', '$talla', '$cod_prod','$fecha','$archivo','$servicio','$pago','$estado_ped')");
	mysqli_query($conexion, $insertSQL) or die(mysqli_error($conexion));
	redirect('welcome/Crp');
}

if (isset($_POST['modificar']))
{
	$folio=$_POST['folio'];
	$cantidad=$_POST['cantidad']; 
	$fecha=$_POST['fecha'];
	$archivo=$_POST['archivo'];
	$servicio=$_POST['servicio'];
	$pago=$_POST['pago'];
	$estado_ped=$_POST['estado_ped'];
	$SQL = "UPDATE pedido SET folio='$folio', cantidad='$cantidad', fecha='$fecha', archivo='$archivo', servicio='$servicio', pago='$estado_ped' WHERE iduser='$iduser' AND cod_prod='$cod_prod'";
	mysqli_query($conexion, $SQL) or die(mysqli_error());
	redirect('welcome/Crp');
	
}


if (isset($_GET['br']))
		{
			$iduser=$_GET['br'];
			$sql1="DELETE from pedido WHERE iduser='$iduser' AND cod_prod='$cod_prod'";	
			mysqli_query($conexion,$sql1) or die(mysqli_error($conexion));
		}

print 	   '<th>ID user:</th>'
		  .'<th>Folio:</th>'
		  .'<th>Cantidad:</th>'
		  .'<th>cod_prod:</th>'
		  .'<th>Fecha:</th>'
		  .'<th>Archivo:</th>'
		  .'<th>Servicio:</th>'
		  .'<th>Pago:</th>'
		  .'<th>Estado Pedido:</th>'
		 .'</tr>'
		 .'</thead>';

$sql6 = "SELECT * FROM pedido";
$rec6 = mysqli_query($conexion, $sql6) or die("Error en: $sql6: " . mysqli_error());
while ($row=mysqli_fetch_Array($rec6)) // recorre los clientes uno por uno hasta el fin de la tabla
{
		print '<tbody><tr>'
			
		  .'<td>'.$row['iduser'] .'</td>'
		  .'<td>'.$row['folio'] .'</td>'
		  .'<td>'.$row['cantidad'] .'</td>'
		  .'<td>'.$row['cod_prod'] .'</td>'
		  .'<td>'.$row['fecha'] .'</td>'
		  .'<td>'.$row['archivo'] .'</td>'
		  .'<td>'.$row['servicio'] .'</td>'
		  .'<td>'.$row['pago'] .'</td>'
		  .'<td>'.$row['estado_ped'] .'</td>'
		  .'<td><a href="?modificar='.$row['iduser'].'"><span class="glyphicon glyphicon-pencil"></a></span></td>'   // en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'<td><a href="?br='.$row['iduser'].'"><span class="glyphicon glyphicon-remove"></a></span></td>'		// lo correcto seria enviarlos por post con un submit por ejem.
		  .'</tr></tbody>';
         
 }
print '</table>';
?>
</div>


