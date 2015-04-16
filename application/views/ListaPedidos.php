<?php $this->load->view('headers/menuSer'); ?>
<br><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#95C1D0; text-align:center"> 
		<h1 style="font-size: 50pt">Lista Pedidos</h1>
</div>
<div class="container">
	
	  <?php  
	  	$servicio = 'Serigrafia';
	  	$estado_ped = 'Pendiente';
	  	$this->db->where('servicio',$servicio);
	  	$this->db->where('estado_ped',$estado_ped);
	  	$query = $this->db->get('pedido');
	    if ($query->num_rows() > 0){
	    	if( $query != FALSE){
	            foreach ($query ->result() as $row){
	            	echo "<div style='background-color:lavender'>";
	            	echo "<div class='row'>";
						echo "<div class='col-md-12' ><br></div>";
					echo "</div>";
			    	echo "<div class='row'>";
			   			echo "<div class='col-md-1' style='text-align:center'><br><b><p>FOLIO :</p></b></div>";
			    		echo "<div class='col-md-1' ><br><p>".$row->folio."</p></div>";
			    		echo "<div class='col-md-1' ><br><b><p>FECHA :</p></b></div>";
			    		echo "<div class='col-md-2' ><br><p>".$row->fecha."</p></div>";
			    		echo "<div class='col-md-2' ><br><b><p>SERVICIO:</p></b></div>";
			    		echo "<div class='col-md-2' ><br><p>".$row->servicio."</p></div>";
			    		echo "<form method='POST'>";
			    		echo "<div class='col-md-3' style='text-align:center'><a href='".base_url()."index.php/welcome/listoTodoS/".$row->folio."' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-ok'></a></span></div>";
			  			echo "</form>";
			  		echo "</div>";
			  		echo "<div class='row'>";
			   			echo "<div class='col-md-1' style='text-align:center'><br><b><p>CÓDIGO:</p></b></div>";
			    		echo "<div class='col-md-1' ><br><p>".$row->cod_prod."</p></div>";
			    		echo "<div class='col-md-1' ><br><b><p>PRODUCTO:</p></b></div>";
			    		$this->db->where('cod_prod',$row->cod_prod);
			    		$this->db->select('tipo');
			    		$queryp = $this->db->get('producto');
			    		foreach ($queryp ->result() as $rowp){
			    			echo "<div class='col-md-2' ><br><p>".$rowp->tipo."</p></div>";
			    		}	
			    		echo "<div class='col-md-1' ><br><b><p>CANTIDAD:</p></b></div>";
			    		echo "<div class='col-md-2' ><br><p>".$row->cantidad."</p></div>";
			    		echo "<div class='col-md-1' ><br><b><p>ARCHIVO:</p></b></div>";
			    		echo "<div class='col-md-3' ><br><p>".$row->archivo."</p></div>";
			  		echo "</div>";
			  		echo "<div class='row'>";
			   			echo "<div class='col-md-2' style='text-align:center'><br><b><p>DESCRIPCION:</p></b></div>";
			   			$this->db->where('cod_prod',$row->cod_prod);
			    		$queryp2 = $this->db->get('producto');
			    		foreach ($queryp2 ->result() as $rowp2){
			    			echo "<div class='col-md-8'style='background-color:#95C1D0' ><br><p>".$rowp2->descrip." <b>Color :</b>".$rowp2->color." <b>Talla</b> :".$rowp2->talla." <b>Modelo :</b>".$rowp2->modelo." <b>Genero :</b>".$rowp2->genero."</p></div>";
			    		}
			    		echo "<div class='col-md-2' style='text-align:center'><br></div>";
			  		echo "</div>"; 
			  		echo "<div class='row'>";
						echo "<div class='col-md-12' ><br></div>";
					echo "</div>";
			  	echo "</div>"; 
			  	echo "<br></br>";      
	            } 	
	       	}      	
	    }	    
	  ?>
</div>
<?php 
	if (isset($_POST['Listo'])){
			$folio=$row->folio;
			$data=array(
				'estado_ped'=> 'Listo'
				);
			$this->db->where('iduser',$iduser);
			$this->db->where('folio',$folio);
			$this->db->update('pedido',$data);
			redirect('welcome/lispser');
		}	
?>	