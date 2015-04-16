<?php $this->load->view('headers/menuAdm'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
    <h1 style="font-size: 50pt">Administracion de usuarios</h1>
</div>
<div div class="container">
    <div class="row">
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/grupo' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-plus'></span>grupo</a>";?>
        </div>
        <div class="col-md-8"><br></div>
        <div class="col-md-2" ><br><?php
            echo "<a href='".base_url()."index.php/welcome/inseremp' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-plus'></span> Agregar Empleado</a>";?>
        </div>

    </div>
		
		<br></br>
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Numero de Usuario:</th>
                <th style="text-align:center" >Usuario:</th>
                <th style="text-align:center" >Contraseña:</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
    	     </tr>
         </thead>
         <tbody>
            <?php 
                $query = $this->db->get('users');
                 $query1 = $this->db->get('empleado');
                if ($query->num_rows() > 0 or $query1->num_rows > 0){
                    if( $query != FALSE and $query1 != FALSE){
                        foreach ($query ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->id."</td>"; 
                                echo "<td>".$row->username."</td>"; 
                                echo "<td>".$row->password."</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editarusu/".$row->id."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/eliminusu/".$row->id."' class='label label-danger'>";
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



<br></br>
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Numero de Empleado:</th>
                <th style="text-align:center" >Nombre:</th>
                <th style="text-align:center" >Apellido Paterno:</th>
                <th style="text-align:center" >Apellido Materno:</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
             </tr>
         </thead>
         <tbody>
            <?php 
                 $query1 = $this->db->get('empleado');
                if ($query1->num_rows > 0){
                    if($query1 != FALSE){
                        foreach ($query1 ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->iduser."</td>"; 
                                echo "<td>".$row->nombre."</td>"; 
                                echo "<td>".$row->aPaterno."</td>";
                                echo "<td>".$row->aMaterno."</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editaremp/".$row->iduser."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/eliminemp/".$row->iduser."' class='label label-danger'>";
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
