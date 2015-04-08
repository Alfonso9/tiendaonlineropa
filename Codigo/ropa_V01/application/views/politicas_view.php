<?php $this->load->view('head/librerias_view'); ?>
<?php $this->load->view('header/header_view'); ?>

<div class="row">
    <!--Nav Bar -->
    <nav class="col-xs-3 bs-docs-sidebar">
        <ul id="sidebar" class="nav nav-stacked fixed">
        	<h1>Empresa  /</h1>
            <li>
                <a href="#GroupA">QUIENES SOMOS</a>
                <ul class="nav nav-stacked">
                    <li><a href="#GroupASub1">Concepto</a></li>
                    <li><a href="#GroupASub2">Historia</a></li>
                    <li><a href="#GroupASub3">Colecciones</a></li>
                    <li><a href="#GroupASub4">Cifras</a></li>
                    <li><a href="#GroupASub5">Grupo T-shirt & Staff</a></li>
                </ul>
            </li>
            <li>
                <a href="#GroupB">OFICINAS</a>
            </li>
            <li>
                <a href="#GroupC">TIENDAS</a>
            </li>
            <li>
                <a href="#GroupD">TRABAJA CON NOSOTROS</a>
            </li>
            <li>
                <a href="#GroupE">FRANQUICIAS</a>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
    <div class="col-xs-5">
        <section id="GroupA" class="group">
            <h2>Quienes somos</h2>
            <div id="GroupASub1" class="subgroup">
                <h4>Concepto</h4>
                <p>
                
                </p>
            </div>
            <div id="GroupASub2" class="subgroup">
                <h4>Historia</h4>
                <p>
                
                </p>
            </div>
            <div id="GroupASub3" class="subgroup">
                <h4>Colecciones</h4>
                <p>
                
                </p>
            </div>
            <div id="GroupASub4" class="subgroup">
                <h4>Cifras</h4>
                <p>
                
                </p>
            </div>
            <div id="GroupASub5" class="subgroup">
                <h4>Grupo T-shirt & Staff</h4>
                <p>
                
                </p>
            </div>
        </section>
        <section id="GroupB" class="group">
            <h2>Oficinas</h2>
            <p>

            </p>
        </section>
        <section id="GroupC" class="group">
            <h2>Tiendas</h2>
        
        </section>
        <section id="GroupD" class="group">
            <h2>Trabaja con nosotros</h2>
            <p>
            
            </p>
        </section>
        <section id="GroupE" class="group">
            <h2>Franquicias</h2>
            <p>
            
            </p>
        </section>  
    </div>


	<div class="col-xs-3">
		<div class="imginfo fixed">
			<img src="<?=base_url()?>/images/politicas.jpg">
		</div>
	</div>

</div>

<?php $this->load->view('footer/footer_view'); ?>