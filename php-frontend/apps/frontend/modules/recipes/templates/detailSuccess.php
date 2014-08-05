<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
				<div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">

									<span class="blogger-name green txt-center">
								
                                                                            <h1><?=$receta->getRecNombreBlogger();?></h1>

                                                                            <a href="<?=$receta->getRecUrlBlogger();?>" target="_blank"><?=$array_diccionario["panel_a"]["view_blog"];?></a>

									</span>
									

							<span style="background-image: url(php-jaime);" class="recipe-picture"></span>

                                                        <span class="picture-info"><?=$receta->getRecVino();?></span>

							<a href="<?=url_for("recipes/index");?>"><p><span class="btn btn-back pull-right"><?=$array_diccionario["panel_a"]["back_to"];?></span></p></a>

						</div>

					  	<div class="col-md-8">

                                                    <h4><?=$receta->getRecNombreReceta();?></h4>

					  		<h3><?=$array_diccionario["panel_b"]["ingredients"];?></h3>

					  		<ul class="list-unstyled">

							 	<?=$receta->getRecIngredientes();?>

							</ul>

							<h3><?=$array_diccionario["panel_b"]["instructions"];?></h3>

                                                        <p class="text-left">
                                                            <?=$receta->getRecInstrucciones();?>
                                                        </p>

					  		

					  	</div>

					</div>

				</div>
				

