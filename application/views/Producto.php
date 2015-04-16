<?php $this->load->view('headers/menuAdm'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
    <h1 style="font-size: 50pt">Administracion Producto</h1>
</div>
<div div class="container">
    <div class="row">
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/materiAdm' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-arrow-left'></span> Material</a>";?>
        </div>
        <div class="col-md-8"><br></div>
        <div class="col-md-2" ><br><?php
            echo "<a href='".base_url()."index.php/welcome/inserAdp' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-plus'></span> Agregar</a>";?>
        </div>

    </div>
		
		<br></br>
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Codigo:</th>
                <th style="text-align:center" >Descripcion:</th>
                <th style="text-align:center" >Color:</th>
                <th style="text-align:center" >Tipo</th>
                <th style="text-align:center" >Modelo</th>
                <th style="text-align:center" >Talla</th>
                <th style="text-align:center" >Precio</th>
                <th style="text-align:center" >Genero</th>
                <th style="text-align:center" >Cantidad de Producto</th>
                <th style="text-align:center" >Imagen</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
    	     </tr>
         </thead>
         <tbody>
            <?php 
                $query = $this->db->get('producto');
                if ($query->num_rows() > 0){
                    if( $query != FALSE){
                        foreach ($query ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->cod_prod."</td>"; 
                                echo "<td>".$row->descrip."</td>"; 
                                echo "<td>".$row->color."</td>";
                                echo "<td>".$row->tipo."</td>";
                                echo "<td>".$row->modelo."</td>";
                                echo "<td>".$row->talla."</td>";
                                echo "<td>".$row->precio."</td>";
                                echo "<td>".$row->genero."</td>";
                                echo "<td>".$row->cant_p."</td>";
                                echo "<td><img src='".base_url()."".$row->img_p."' height='100'></td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editarAdmp/".$row->cod_prod."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/eliminAdp/".$row->cod_prod."' class='label label-danger'>";
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
