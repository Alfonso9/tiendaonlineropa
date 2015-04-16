<?php $this->load->view('headers/menuMos'); ?>
<br></br>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#6EE768; text-align:center"> 
		<h1 style="font-size: 50pt">Menu Principal</h1>
</div>
<div class="container"  style="text-align:center">
	<br/><br/>
	<div class="col-sm-6" style="text-align:center" >
		<a href="<?=base_url()?>index.php/Welcome/Crp"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-success"><img src="images/ADMIN/NuevoP.png" width="200" height="200"><br></br><h3>Crer Un Nuevo<br/> Pedidos </h3></button></a>
  	</div>
  	<div class="col-sm-6" style="text-align:center">
		<a href="<?=base_url()?>index.php/Welcome/lispmos"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-success"><img src="images/ADMIN/pedido.png" width="200" height="200"><br></br><h3>Lista<br/> Entregas </h3></button></a>
  	</div>
  	
</div>