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
          <h1>Tiendas   /</h1>
            <li>
                <a href="#GroupA">MÉXICO</a>
                <ul class="nav nav-stacked">
                    <li><a href="#GroupASub1">Veracruz</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!--Main Content -->
    <div class="col-xs-5">
        <section id="GroupA" class="group">
            <h2>México</h2>
            <div id="GroupASub1" class="subgroup">
                <h4>Veracruz</h4>
                -PLAZA LAS AMÉRICAS<br>
                CARRETERA FEDERAL XALAPA-VERACRUZ KM 2 COL. PASTORESA, 680<br>
                91193 XALAPA<br>
                tel.- 522288126059<br>
                (WOMAN,MAN)<br>
                <p>
                
                </p>
            </div>
        </section> 
    </div>


  <div class="col-xs-3">
    <div class="imginfo fixed">
      <img src="<?=base_url()?>/images/tiendas.jpg">
    </div>
  </div>

</div>

<?php $this->load->view('footer/footer_view'); ?>