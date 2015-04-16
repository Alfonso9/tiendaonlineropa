<?php $this->load->view('headers/menuAdm'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
    <h1 style="font-size: 50pt">Administracion de Grupos</h1>
</div>
<div div class="container">
    <div class="row">
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/usuarios' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-plus'></span>Usuarios</a>";?>
        </div>
        <div class="col-md-6"><br></div>
        <div class="col-md-2" ><br><?php
            echo "<a href='".base_url()."index.php/welcome/insergru' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-plus'></span> Agregar Grupo</a>";?>
        </div>
        <div class="col-md-2" ><br><?php
            echo "<a href='".base_url()."index.php/welcome/asociarug' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-plus'></span> Asignar Grupo-Usuario</a>";?>
        </div>

    </div>
		
		<br></br>
        <table class="table table-striped" style="text-align:center" >
         <thead>
            <tr>
                <th style="text-align:center" >Numero de grupo:</th>
                <th style="text-align:center" >Nombre:</th>
                <th style="text-align:center" >Descripcion:</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
    	     </tr>
         </thead>
         <tbody>
            <?php 
                $query = $this->db->get('groups');
                 if ($query->num_rows() > 0){
                    if( $query != FALSE ){
                        foreach ($query ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->id."</td>"; 
                                echo "<td>".$row->name."</td>"; 
                                echo "<td>".$row->description."</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editargru/".$row->id."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/elimingru/".$row->id."' class='label label-danger'>";
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
                <th style="text-align:center" >Numero de Grupo:</th>
                <th style="text-align:center" >Numero de Usuario:</th>
                <th style="text-align:center" >Editar:</th>
                <th style="text-align:center" >Eliminar::</th>
             </tr>
         </thead>
         <tbody>
            <?php 
              $query1=$this->db->get('users_groups');
                if ($query1->num_rows > 0){
                    if($query1 != FALSE){
                        foreach ($query1 ->result() as $row) {
                             
                                echo "<tr>";
                                echo "<td>".$row->id."</td>"; 
                                echo "<td>".$row->user_id."</td>"; 
                                echo "<td>".$row->group_id."</td>"; 
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/editarug/".$row->id."' class='label label-info'>";
                                    echo "<span class='glyphicon glyphicon-pencil'></a></span>";  
                                echo "</td>";
                                echo "<td>";
                                    echo "<a href='".base_url()."index.php/welcome/eliminug/".$row->id."' class='label label-danger'>";
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
