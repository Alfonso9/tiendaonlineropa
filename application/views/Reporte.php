<?php $this->load->view('headers/menuAdm'); ?>
<br></br>
<div  class= "jumbotron"  style=" color:#FFFFFF; background-color:#FF7673; text-align:center"> 
		<h1 style="font-size: 50pt">Reporte</h1>		
</div>
<div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown">
					    	Reporte<span class="caret"></span></a>
					            <ul class="dropdown-menu">
					                <li><a onclick="verReportSel('pedido')">Pedido</a></li>
					                <li><a onclick="verReportSel('material')">Material</a></li>
					            </ul>
					        </div>
<div class="container" id="divfeo">
	
	
</div>

<script type="text/javascript">

        function verReportSel(tipo) 
        {
            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url();?>auth/verReportSelec",           
                data: {'reporte' : tipo},
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