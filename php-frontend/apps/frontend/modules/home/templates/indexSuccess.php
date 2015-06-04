<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
                                <div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">
							<span class="square blue">
								<p><?=$array_diccionario["panel_a"]["texto"];?></p> 

								<a href="<?=url_for("grandprize/index");?>" class="link-georgia"><?=$array_diccionario["panel_a"]["link"];?></a>

							</span>
						</div>

					  	<div class="col-md-4 no-padding">
					  		<span class="square grey img-07"> 
							</span>
					  	</div>

					  	<div class="col-md-4">
					  		<span class="square mustard" style="padding-top:30%;">
					  			<h3 class="mayus"><?=$array_diccionario["panel_b"]["texto"];?></h3>
                                                                <?php if($votohabilitado){ ?>
								<a href="<?=url_for("enterrecipe/index");?>" class="link-georgia"><?=$array_diccionario["panel_b"]["link"];?></a>
                                                                <?php } ?>
							</span>
					  	</div>

					</div>

				</div>
				<div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">
							<span class="square img-01">
							</span>
						</div>

					  	<div class="col-md-4 no-padding">
					  		<span class="square img-02">
							</span>
					  	</div>

					  	<div class="col-md-4">

					  		<!-- Slider -->
					      	<div class="grid-slider cycle-slideshow"
					          data-cycle-fx="fade"
					          data-cycle-pause-on-hover="true"
					          data-cycle-speed="1000"
					          data-cycle-swipe=true
					          data-cycle-timeout="3000"
					          data-cycle-slides="> div"
					        >
                                                            <?php
                                                                if($lang=="se"){
                                                            ?>
        
								<div class="wine-01-se"></div>

								<div class="wine-02-se"></div>

								<div class="wine-03-se"></div>
                                                            <?php
                                                                }else{
                                                            ?>
        
								<div class="wine-01"></div>

								<div class="wine-02"></div>

								<div class="wine-03"></div>
                                                            <?php
                                                                }
                                                            ?>

							</div><!--/slider-->

					  	</div>

					</div>

				</div>

				<div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">
							<span class="square img-04">
							</span>
						</div>

					  	<div class="col-md-4 no-padding">
					  		<span class="square img-05">
							</span>
					  	</div>

					  	<div class="col-md-4">
					  		<span class="square img-06">
							</span>
					  	</div>

					</div>

				</div>