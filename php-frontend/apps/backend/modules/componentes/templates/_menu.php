<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="<?=url_for("home/index");?>">Backend Cono Sur</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">

		<li class="dropdown">
						
			<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i> 
				Bienvenido <?=$nombre;?>
				<b class="caret"></b>
			</a>
			
			<ul class="dropdown-menu">
				<li><a href="<?=url_for("login/salir");?>">Salir</a></li>
			</ul>
			
		</li>
    </ul>
    
    <!-- <form class="navbar-form navbar-right" role="search">
      <div class="form-group">
        <input type="text" class="form-control input-sm search-query" placeholder="Search">
      </div>
    </form> -->
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <i class="icon-reorder"></i>
		      
		    </a>

			<div class="collapse subnav-collapse">
				<ul class="mainnav">
				
					<li class="active">
						<a href="<?=url_for("diccionario/index");?>">
							<i class="icon-book"></i>
							<span>Diccionario</span>
						</a>	    				
					</li>
				
					<li class="active">
						<a href="<?=url_for("receta/index");?>">
							<i class="icon-food"></i>
							<span>Recetas</span>
						</a>	    				
					</li>
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->