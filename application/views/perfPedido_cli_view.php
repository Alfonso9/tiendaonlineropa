<?php $this->load->view('head/librerias_view'); ?>
<?php 
  if ($this->ion_auth->in_group('cliente')) {
    $this->load->view('header/header_cli_view');  
  }else
  {
    $this->load->view('header/header_view');
  }  
 ?>

<div class="row">
    <!--Nav Bar -->
    <nav class="col-xs-3 bs-docs-sidebar">
        <ul id="sidebar" class="nav nav-stacked fixed">
        	<h1>Perfil /</h1>
            <li>
                <a href="dCuenta">0. MI CUENTA</a>
            </li>
            <li>
                <a href="dAcceso">1. DATOS DE ACCESO</a>
            </li>
            <li>
                <a href="dPersonal">2. DATOS PERSONALES</a>
            </li>
            <li>
                <a href="dPedido">3. PEDIDOS REALIZADOS</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
        <!--Main Content -->
    <div class="col-xs-5 vistaPedido" id="divfeo">          
        <h2><?php echo $query->nombre.' '.$query->aPaterno.' '.$query->aMaterno; ?></h2>
        <h4>PEDIDOS REALIZADOS</h4>
        <p>Mantente informado sobre el estado de los pedidos que hayas realizado. Puedes consultar el detalle
        de cualquier pedido o realizar el seguimiento un del envio.</p>
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Número</th>
                <th>Estado</th>                
                <th>Acciones</th>                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ped as $items): ?>
                <tr>
                    <td><?php echo $items->fecha; ?></td>
                    <td><?php echo $items->folio; ?></td>
                    <td><?php echo $items->estado_ped; ?></td>                                        
                    <td><a onclick="verPedidoSel(<?php echo htmlspecialchars(json_encode($items->folio)); ?>)">Ver detalle</a></td>                    
                </tr>                 
              <?php endforeach; ?>                
            </tbody>        
          </table>          
        </div>
    </div>    
</div>

<script type="text/javascript">
        function verPedidoSel(folio) 
        {
            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url();?>auth/verPedidoSelec",           
                data: {'folio' : folio},
                success: function(jso)
                        {
                            try
                            {     
                                $("#divfeo").html(jso);
                                /*var wrapper = $(".vistaPedido");
                                $(wrapper).load(jso);*/
                            }catch(e)
                            {
                                alert('Exception while resquest...');
                            }                       
                        },
                error:  function()
                        {
                            alert('Error while resquest..');
                        }
            });
        }
    </script>

<?php $this->load->view('footer/footer_view'); ?>