<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">T-SHIRT & STAFF</a>      
    </div>

    <div id="acolapsar" class="collapse navbar-collapse navbar-exit-collapse">
      <?php $activa = $this->uri->segment(2); ?>
      <ul class="nav navbar-nav">        
        <li <?php if ($activa == ''){ echo "class='active'"; } ?>>
        	<a href="<?=base_url()?>">
        		<span class="glyphicon glyphicon-home"></span>&nbsp;
        		Inicio Administrador
        	</a>
        </li>     
		<li <?php if ($activa == 'usuarios'){ echo "class='active'"; } ?>>
			<a href="<?=base_url()?>index.php/Welcome/usuarios">
				<span class="glyphicon glyphicon-user"></span>&nbsp;
				Administracion De Usuarios
			</a>
		</li>
		<li <?php if ($activa == 'prodAdm'){ echo "class='active'"; } ?>>
			<a href="<?=base_url()?>index.php/Welcome/prodAdm">
				<span class="glyphicon glyphicon-check"></span>&nbsp;
				Administracion De MyP
			</a>
		</li>
    <li <?php if ($activa == 'reporte'){ echo "class='active'"; } ?>>
      <a href="<?=base_url()?>index.php/Welcome/reporte">
        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
        Reporte General
      </a>
    </li> 		
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?=base_url()?>index.php/auth/logout">
            <span class="glyphicon glyphicon-remove-sign"></span>&nbsp;
            Salir
          </a>
        </li> 
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
