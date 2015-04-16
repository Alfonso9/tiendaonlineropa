<?php $this->load->view('headers/menuAdm'); ?>
<br/><br/>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
    <h1 style="font-size: 50pt">Asociar Grupos con usuarios</h1>
</div>
<div div class="container">
    <div class="row">
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/usuarios' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-plus'></span>Usuarios</a>";?>
        </div>
        <div class="col-md-8"><br></div>
        <div class="col-md-2"><br><?php
            echo "<a href='".base_url()."index.php/welcome/Grupo' class='btn btn-primary btn-lg'><span class='glyphicon glyphicon-plus'></span>Grupos</a>";?>
          <br/><br/>  
    </div>
        
        <form method="POST" >
            <table class="table table-hover" >
               <tr>
                <select name="usuario">
                    <?php 
                    $query = $this->db->get('users');
                    foreach ($query ->result() as $row) {
                    $combobit .=" <option value='".$row->id."'>".$row->username."</option>";
                }
              echo $combobit; ?>
            </select>
            </tr>

            <tr>
                <select name="grupo">
                    <?php
                    $query1 = $this->db->get('groups');
                    foreach ($query1 ->result() as $row) {
                    $combobit1 .=" <option value='".$row->id."'>".$row->name."</option>";
                }
              echo $combobit1; ?>
            </select>
            </tr>
            <tr>
                    <td><h6>* No podras insertar si no hay usuarios disponibles </h6></br>
                        <input class="btn btn-success btn-lg" type="submit" name="Insertar" id="Insertar" value="Asociar"/></td>
                </tr>
            </table>
        </form>
    </div>
    <?php 
        if (isset($_POST['Insertar'])){
            $iduser=$_POST['usuario'];
            $idgroup= $_POST['grupo'];
                $data=array(
                    'user_id'=>$iduser,
                    'group_id'=>$idgroup,
                    );
            $this->db->where('id',$id);
            $prueba= $this->db->get('users_groups');
            if($prueba->num_rows() > 0){
                redirect('welcome/inserErr');
            }else{
                $this->db->insert('users_groups',$data);
                redirect('welcome/asociarug');
            }
        }
    ?>  