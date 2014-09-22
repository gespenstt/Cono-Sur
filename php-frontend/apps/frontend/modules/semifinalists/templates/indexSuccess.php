<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
				<div class="container-fluid">


					<div class="row show-grid">

						<div class="col-md-12">
						
							<div class="bubble bubble-especial"><span class="flag-finland"></span>Finland</div>
							
						</div>
							
					</div>
                                    <div style="clear: both;">
                                    <?php 
                                    $count = 0;
                                    $count_color = 0;
                                    $array_color = array(
                                      "green","green","green","green"
                                    );
                                    
                                    foreach($finlandia as $re){ 
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
                                                                        if(strlen($nreceta) > 60){
                                                                            $nreceta = substr($nreceta, 0, 60)."...";
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
                                    </div>
                                    
                                    



					<div class="row show-grid">

						<div class="col-md-12">
						
							<div class="bubble bubble-especial"><span class="flag-ireland"></span>Ireland</div>
							
						</div>
							
					</div>
                                    <div style="clear: both;">
                                    
                                    <?php 
                                    $count = 0;
                                    $count_color = 0;
                                    $array_color = array(
                                      "green","dark-grey","yellow","red"
                                    );
                                    
                                    foreach($irlanda as $re){ 
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
                                                                        if(strlen($nreceta) > 60){
                                                                            $nreceta = substr($nreceta, 0, 60)."...";
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
                                    
                                    </div>
                                    



					<div class="row show-grid">

						<div class="col-md-12">
						
							<div class="bubble bubble-especial"><span class="flag-sweden"></span>Sweden</div>
							
						</div>
							
					</div>
                                    
                                    <div style="clear: both;">
                                    <?php 
                                    $count = 0;
                                    $count_color = 0;
                                    $array_color = array(
                                      "green","dark-grey","yellow","red"
                                    );
                                    
                                    foreach($suecia as $re){ 
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
                                                                        if(strlen($nreceta) > 60){
                                                                            $nreceta = substr($nreceta, 0, 60)."...";
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
                                    </div>

				</div>