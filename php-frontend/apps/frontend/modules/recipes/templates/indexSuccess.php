<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
				<div class="container-fluid">


					<div class="row show-grid">

						<div class="col-md-12">
						
						<a href="<?=url_for("recipes/index/?order=az&from=$from");?>" class="btn btn-filter"><?=$array_diccionario["panel_a"]["bloggers_az"];?></a> 
						<a href="<?=url_for("recipes/index/?order=date&from=$from");?>" class="btn btn-filter"><?=$array_diccionario["panel_a"]["date_of"];?></a>
							
						</div>
							
					</div>
                                                    
                                    <?php 
                                    $count = 0;
                                    $count_color = 0;
                                    $array_color = array(
                                      "green","dark-grey","yellow","red"
                                    );
                                    
                                    foreach($recetas as $re){ 
                                        $resto = $count % 2;
                                    ?>
                                        <?php if($resto==0){ ?>
					<div class="row show-grid">
                                        <?php } ?>

						<div class="col-md-6">

							<ul class="recipe-item <?=$array_color[$count_color];?>">
								<li class="recipe-img" style="background-image: url(<?=public_path("uploads/".$re->getRecImagen());?>)"></li>
								<li class="recipe-name txt-center">
									<h1><?=$re->getRecNombreBlogger();?></h1> 
									<p><?php
                                                                        $nreceta = $re->getRecNombreReceta();
                                                                        if(strlen($nreceta) > 65){
                                                                            $nreceta = substr($nreceta, 0, 65)."...";
                                                                        }
                                                                        echo $nreceta;
                                                                        ?></p>
									<a href="<?=url_for("recipes/detail/?id=".$re->getRecId());?>" class="link-view-recipe"><?=$array_diccionario["panel_b"]["view_recipe"];?></a> 
								</li>
								<li class="recipe-wine txt-center light">
									<span class="icon-glass"></span>
									<h2><?=$re->getRecVino();?></h2>
								</li>
							</ul>
							
						</div>

                                        <?php if($resto==1){ ?>
                                        </div>
                                        <?php 
                                              $count_color++;
                                              if($count_color>3){
                                                  $count_color=0;
                                              }
                                        } 
                                        ?>
                                                    
                                    <?php 
                                    $count++;
                                    } 
                                    ?>

					<!-- <div class="row show-grid">

						<div class="col-md-6">

							<ul class="recipe-item dark-grey">
								<li class="recipe-img" style="background-image: url(<?=public_path("img/recipe01.jpg");?>)"></li>
								<li class="recipe-name txt-center">
									<h1>Paula Troncoso</h1> 
									<p>CORDERO CON FRITAS EN SALSA FRAMBUESA</p>
									<a href="" class="link-view-recipe">View Recipe</a> 
								</li>
								<li class="recipe-wine txt-center light">
									<span class="icon-glass"></span>
									<h2>Cono Sur riestling</h2>
								</li>
							</ul>
							
						</div>

						<div class="col-md-6">

							<ul class="recipe-item dark-grey">
								<li class="recipe-img" style="background-image: url(<?=public_path("img/recipe02.jpg");?>)"></li>
								<li class="recipe-name txt-center">
									<h1>Paula Troncoso</h1> 
									<p>CORDERO CON FRITAS EN SALSA FRAMBUESA</p>
									<a href="" class="link-view-recipe">View Recipe</a> 
								</li>
								<li class="recipe-wine txt-center light">
									<span class="icon-glass"></span>
									<h2>Cono Sur riestling</h2>
								</li>
							</ul>
							
						</div>

					</div>

					<div class="row show-grid">

						<div class="col-md-6">

							<ul class="recipe-item violet">
								<li class="recipe-img" style="background-image: url(<?=public_path("img/recipe01.jpg");?>)"></li>
								<li class="recipe-name txt-center">
									<h1>Paula Troncoso</h1> 
									<p>CORDERO CON FRITAS EN SALSA FRAMBUESA</p>
									<a href="" class="link-view-recipe">View Recipe</a> 
								</li>
								<li class="recipe-wine txt-center light">
									<span class="icon-glass"></span>
									<h2>Cono Sur riestling</h2>
								</li>
							</ul>
						</div>

						<div class="col-md-6">

							<ul class="recipe-item violet">
								<li class="recipe-img" style="background-image: url(<?=public_path("img/recipe02.jpg");?>)"></li>
								<li class="recipe-name txt-center">
									<h1>Paula Troncoso</h1> 
									<p>CORDERO CON FRITAS EN SALSA FRAMBUESA</p>
									<a href="" class="link-view-recipe">View Recipe</a> 
								</li>
								<li class="recipe-wine txt-center light">
									<span class="icon-glass"></span>
									<h2>Cono Sur riestling</h2>
								</li>
							</ul>
							
						</div>

					</div> -->

				</div>