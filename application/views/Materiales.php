<?php $this->load->view('headers/menuAdm'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
    <h1 style="font-size: 50pt">Administración Material</h1>
</div>
<div div class="container">
    <div class="row">
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/prodAdm' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-arrow-left'></span> Producto</a>";?>
        </div>
        <div class="col-md-8"><br></div>
        <div class="col-md-2" ><br><?php
            echo "<a href='".base_url()."index.php/welcome/inserAdm' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-plus'></span> Agregar</a>";?>
        </div>

    </div>
		
		<br></br>
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Codigo:</th>
                <th style="text-align:center" >Descripcion:</th>
                <th style="text-align:center" >Color:</th>
                <th style="text-align:center" >Cantidad de Materia</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
    	     </tr>
         </thead>
         <tbody>
            <?php 
                $query = $this->db->get('material');
                if ($query->num_rows() > 0){
                    if( $query != FALSE){
                        foreach ($query ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->cod_mat."</td>"; 
                                echo "<td>".$row->desc_mat."</td>"; 
                                echo "<td>".$row->color."</td>";
                                echo "<td>".$row->cant_mat."</td>"; 
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editarAdm/".$row->cod_mat."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/eliminAdm/".$row->cod_mat."' class='label label-danger'>";
                                    echo "<span class='glyphicon glyphicon-remove'></a></span>";  
                                echo "</td>";
                                echo "</tr>"; ?>    
                       <?php } 
                    }else{
                        echo "no hay enlaces";
                    }
                }else{
                    return FALSE;
                }
            ?>
        </tbody>
        </table>
</div>
