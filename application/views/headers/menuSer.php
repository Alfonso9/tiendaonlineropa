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
        		<span class="glyphicon glyphicon-th"></span>&nbsp;
        		Inicio Serigrafista
        	</a>
        </li>     
		<li <?php if ($activa == 'inventario'){ echo "class='active'"; } ?>>
			<a href="<?=base_url()?>index.php/Welcome/inventario">
				<span class="glyphicon glyphicon-th-list"></span>&nbsp;
				Actualizacion Del Material
			</a>
		</li>
		<li <?php if ($activa == 'lispser'){ echo "class='active'"; } ?>>
			<a href="<?=base_url()?>index.php/Welcome/lispser">
				<span class="glyphicon glyphicon-check"></span>&nbsp;
				Lista pedidos
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
