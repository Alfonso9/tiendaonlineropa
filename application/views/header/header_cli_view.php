<body class="#">
  	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <a href="index" class="navbar-brand">T-SHIRT & STAFF</a>      
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">        
          <li class="dropdown">
          	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          		MUJER
              <span class="caret"></span>
          	</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="mujer_playera"><small>PLAYERA</small></a></li>
              <li class="divider"></li>
              <li><a href="mujer_sudadera"><small>SUDADERA</small></a></li>
              <li class="divider"></li>
              <li><a href="mujer_gorra"><small>GORRA</small></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              HOMBRE
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="hombre_playera"><small>PLAYERA</small></a></li>
              <li class="divider"></li>
              <li><a href="hombre_sudadera"><small>SUDADERA</small></a></li>
              <li class="divider"></li>
              <li><a href="hombre_gorra"><small>GORRA</small></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="text-uppercase dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-expanded="false">
              <?php echo strtok($user->username, " "); ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="dCuenta"><small>Perfil</small></a></li>
              <li class="divider"></li>
              <li><a href="<?=base_url()?>auth/logout"><small>Cerrar Sesión</small></a></li>              
            </ul>
          </li>                 
          
          
  				<li>
  					<a href="<?= base_url()?>auth/compra">
  						<span class="glyphicon glyphicon-lock"></span>&nbsp;
  						<?php echo lang('buy_submit_btn');?>
  					</a>
  				</li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

