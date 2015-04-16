<?php $this->load->view('headers/menuSer'); ?>
<br></br>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#95C1D0; text-align:center"> 
		<h1 style="font-size: 50pt">Menu Principal</h1>
</div>
<div class="container"  style="text-align:center">
	
	
	<br/><br/>
	<div class="col-sm-6" style="text-align:center" >
		<a href="<?=base_url()?>index.php/Welcome/inventario"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-primary"><img src="images/ADMIN/lista.png" width="200" height="200"><br></br><h3>Actualizacion del <br/> Material</h3></button></a>
  	</div>
  	<div class="col-sm-6" style="text-align:center">
		<a href="<?=base_url()?>index.php/Welcome/lispser"><button type="button" style="box-shadow: 3px 3px 5px #999" class="btn btn-primary"><img src="images/ADMIN/pedido.png" width="200" height="200"><br></br><h3>Lista <br/> Pedido</h3></button></a>
  	</div>
  	
</div>