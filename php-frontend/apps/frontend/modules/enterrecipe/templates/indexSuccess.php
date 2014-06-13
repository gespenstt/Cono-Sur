<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>

				<div class="container-fluid">

					<div class="row show-grid brown row-no-margin text-center">

						<div class="col-md-12 ">


							<h1><?=$array_diccionario["panel_a"]["titulo"];?></h1>

							<p class="text-14-uppercase ">
								<?=$array_diccionario["panel_a"]["texto"];?>
							</p>

						</div>

					</div>

					<div class="row show-grid">

						<div class="col-md-3">

							<span class="bg-enter-recipes">
							</span>

						</div>

					  	<div class="col-md-9 no-padding padding-right">

                                                    <form action="<?=url_for("enterrecipe/guardar");?>" method="post" class="form-horizontal enter-recipe-form" role="form" onsubmit="return validarRecipe();">

							 	<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["recipe_name"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar Recipe name" name="nombre_receta" id="nombre_receta">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["ingredients"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar Ingredients" name="ingredientes" id="ingredientes" placeholder="EXAMPLE: Ingredient 1, Ingredient 2">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["cooking_instructions"];?></label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" data-msg="Debe ingresar Cooking instructions" name="intrucciones" id="intrucciones"></textarea>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["wine_used"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar wine used" id="vino_usado" name="vino_usado" placeholder="EXAMPLE: Cono Sur, Ocio, Pinot Noir">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">FOTO</label>
									<div class="col-sm-10">
                                                                            <canvas id="previewcanvas"></canvas>
                                                                            <input type="file" name="foto" id="foto" onchange="return ShowImagePreview( this.files );" />
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["your_name"];?></label>
									<div class="col-sm-10">
                                                                            <input type="text" class="form-control" data-msg="Debe ingresar your name" name="nombre" id="nombre">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["link_to_your_blog"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar link to your blog" id="link_blog" name="link_blog">
									</div>
								</div>

								<div class="form-group has-error">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["your_email"];?></label>
									<div class="col-sm-10">
										<input type="email" class="form-control" data-msg="Debe ingresar un email valido" id="email" name="email">
									</div>
									<p class="text-danger">Validacion</p>
								</div>

								<div class="form-group">

							    	<div class="checkbox">
										<label>
											<input type="checkbox" name="acepta_pais" data-msg="Debe aceptar el tos pais" id="acepta_pais">
									    <?=$array_diccionario["formulario"]["tos1"];?>
									  </label>
									</div>

									<div class="checkbox">
										<label>
									    	<input type="checkbox" name="acepta_tos" data-msg="Debe aceptar el tos 2 " id="acepta_tos">
									    <?=$array_diccionario["formulario"]["tos2"];?> <a href="" class="link-georgia"><?=$array_diccionario["formulario"]["link_tos2"];?></a>
										</label>
									</div>

								</div>
					
							  	<div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								    	<button type="submit" class="btn btn-submit pull-right">SUBMIT</button>
								    </div>
							  	</div>

							</form>

					  	</div>

					</div>

				</div>