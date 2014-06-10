<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
                                <div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">
							<span class="square blue">
								<p><?=$array_diccionario["panel_a"]["texto"];?></p> 

								<a href="" class="link-georgia"><?=$array_diccionario["panel_a"]["link"];?></a>

							</span>
						</div>

					  	<div class="col-md-4 no-padding">
					  		<span class="square grey img-07">
							</span>
					  	</div>

					  	<div class="col-md-4">
					  		<span class="square mustard" style="padding-top:30%;">
					  			<h3><?=$array_diccionario["panel_b"]["texto"];?></h3>
								<a href="<?=url_for("enterrecipe/index");?>" class="link-georgia"><?=$array_diccionario["panel_b"]["link"];?></a>
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
					      	<div class="main-slider cycle-slideshow"
					          data-cycle-fx="fade"
					          data-cycle-pause-on-hover="true"
					          data-cycle-speed="1000"
					          data-cycle-swipe=true
					          data-cycle-slides="> div"
					          data-cycle-timeout="5000"
					          data-cycle-pager=".pager1"
					          data-cycle-pager-template="<a href=#>&bull;</a>"
					        >
        
								<div>			
									<span class="wine-01"></span>
								</div>

							    <div>
							    	<span class="wine-02"></span>
							    </div>

							    <div>
							    	<span class="wine-03"></span>
							    </div>

							</div>
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