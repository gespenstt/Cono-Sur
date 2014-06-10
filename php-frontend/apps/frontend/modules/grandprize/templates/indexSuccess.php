<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
    print_r($array_diccionario);
?>
				<div class="container-fluid">

					<div class="row show-grid dark-grey row-no-margin grand-prize">

						<div class="col-md-5 text-center">

							<h1><?=$array_diccionario["panel_a"]["titulo"];?></h1>

							<h2><?=$array_diccionario["panel_a"]["box1"];?></h2>

							<p><?=$array_diccionario["panel_a"]["texto1"];?></p> 

							<h2><?=$array_diccionario["panel_a"]["box2"];?></h2>

							<p><?=$array_diccionario["panel_a"]["texto2"];?></p> 
							
						</div>

					  	<div class="col-md-7 no-padding ">

							<!-- Slider -->
					      	<div class="main-slider cycle-slideshow"
					          data-cycle-fx="scrollHorz"
					          data-cycle-pause-on-hover="true"
					          data-cycle-speed="1000"
					          data-cycle-swipe=true
					          data-cycle-slides="> div"
					          data-cycle-timeout="5000"
					          data-cycle-pager=".pager1"
					          data-cycle-pager-template="<a href=#>&bull;</a>"
					        >
        
								<div>			
									<span class="box-transparent">
										<p class="pull-right">Campo Lindo</p>
									</span>
									<img src="<?=public_path("img/noticia01.jpg");?>" alt="">
								</div>

							    <div>
							    	<span class="box-transparent">
										<p class="pull-right">Casona de la Viña Cono Sur</p>
									</span>
							    	<img src="<?=public_path("img/noticia02.jpg");?>" alt="">
							    </div>

							    <div>
							    	<span class="box-transparent">
										<p class="pull-right">Gansos</p>
									</span>
							    	<img src="<?=public_path("img/noticia03.jpg");?>" alt="">
							    </div>

							</div>
					  		
					  	</div>

					</div>

					<!-- Pager -->
					<nav class="slide-pager pager1"></nav>

				</div>
