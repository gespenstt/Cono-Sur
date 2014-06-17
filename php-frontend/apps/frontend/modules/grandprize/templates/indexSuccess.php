<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
				<div class="container-fluid">

					<div class="row show-grid row-no-margin">

						<div class="col-md-5 text-center">

							<div class="dark-grey grand-prize no-padding">

								<h1><?=$array_diccionario["panel_a"]["titulo"];?></h1>

								<h2 class="mayus"><?=$array_diccionario["panel_a"]["box1"];?></h2>

								<p><?=$array_diccionario["panel_a"]["texto1"];?></p> 

								<h2 class="mayus"><?=$array_diccionario["panel_a"]["box2"];?></h2>

								<p><?=$array_diccionario["panel_a"]["texto2"];?></p>

							</div> 
							
						</div>

					  	<div class="col-md-7 no-padding">

							<!-- Slider -->
					      	<div class="content-slider cycle-slideshow"
					          data-cycle-fx="scrollHorz"
					          data-cycle-pause-on-hover="true"
					          data-cycle-speed="1000"
					          data-cycle-swipe=true
					          data-cycle-slides="> div"
					          data-cycle-timeout="5000"
					          data-cycle-pager=".pager1"
					          data-cycle-pager-template="<a href=#>&bull;</a>"
					        >
        
								<!--<div>			
									<span class="box-transparent">
										<p class="pull-right">Our Campo Lindo Estate in the San Antonio Valley.</p>
									</span>
									<img src="<?=public_path("img/noticia01.jpg");?>" alt="">
								</div>

							    <div>
							    	<span class="box-transparent">
										<p class="pull-right">Where the winner will be staying in Chimbarongo, Cono Sur´s Casona.</p>
									</span>
							    	<img src="<?=public_path("img/noticia02.jpg");?>" alt="">
							    </div>

							    <div>
							    	<span class="box-transparent">
										<p class="pull-right">Our Santa Elisa Estate in the Colchagua Valley.</p>
									</span>
							    	<img src="<?=public_path("img/noticia03.jpg");?>" alt="">
							    </div>-->

							    <div class="picture-01">
							    	<span class="box-transparent">
										<p class="pull-right">Our Campo Lindo Estate in the San Antonio Valley.</p>
									</span>
							    </div>

								<div class="picture-02">
									<span class="box-transparent">
										<p class="pull-right">Where the winner will be staying in Chimbarongo, Cono Sur´s Casona.</p>
									</span>
								</div>

								<div class="picture-03">
									<span class="box-transparent">
										<p class="pull-right">Our Santa Elisa Estate in the Colchagua Valley.</p>
									</span>
								</div>

							</div>
					  		
					  	</div>

					</div>

					<!-- Pager -->
					<nav class="slide-pager pager1"></nav>

				</div>
