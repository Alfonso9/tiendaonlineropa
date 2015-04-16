<?php $this->load->view('headers/menuBor'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FFA540; text-align:center"> 
    <h1 style="font-size: 50pt">Inventario Material</h1>
</div>
<div div class="container">
        
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Código:</th>
                <th style="text-align:center" >Descripcion:</th>
                <th style="text-align:center" >Color:</th>
                <th style="text-align:center" >Cantidad de Materia</th>
                <th style="text-align:center" >Editar:</th>
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
                                      if($row->cant_mat <= 50){
                                        echo "<a href='".base_url()."index.php/welcome/editarB/".$row->cod_mat."' class='label label-danger'>";
                                        echo "<span class='glyphicon glyphicon-pencil'></a></span>";
                                      }else if($row->cant_mat <= 100){
                                      echo "<a href='".base_url()."index.php/welcome/editarB/".$row->cod_mat."' class='label label-warning'>";
                                      echo "<span class='glyphicon glyphicon-pencil'></a></span>";
                                      }else{
                                        echo "<a href='".base_url()."index.php/welcome/editarB/".$row->cod_mat."' class='label label-success'>";
                                      echo "<span class='glyphicon glyphicon-pencil'></a></span>";
                                      }
                                      echo "</td>"; ?>
                            </tr>

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