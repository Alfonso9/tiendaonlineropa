<?php $this->load->view('headers/menuAdm'); ?>
<br></br>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Menu Principal</h1>
</div>
<div class="container"  style="text-align:center">
	
	
	<br/><br/>
	<div class="col-sm-4" style="text-align:center" >
		<a href="<?=base_url()?>index.php/welcome/usuarios"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-danger"><img src="images/ADMIN/user.png" width="200" height="200"><br></br><h3>Administracion De <br/> Usuario </h3></button></a>
  	</div>
  	<div class="col-sm-4" style="text-align:center">
		<a href="<?=base_url()?>index.php/welcome/materiAdm"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-danger"><img src="images/ADMIN/inventario.png" width="200" height="200"><br></br><h3>Administracion De <br/> Material y Producto </h3></button></a>
  	</div>
  	<div class="col-sm-4" style="text-align:center">
		<a href="<?=base_url()?>auth/reporte"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-danger"><img src="images/ADMIN/report1.png" width="200" height="200"><br></br><h3>Reportes</br> General </h3></button></a>
  	</div>
  	
  	
</div>