

				<div class="container-fluid">

					<div class="row show-grid brown row-no-margin text-center">

						<div class="col-md-12 ">


							<h1>ENTER YOUR RECIPE</h1>

							<p class="text-14-uppercase ">
								ARE YOU A FOOD AND WINE AND/OR LIFESTYLE BLOGGER FROM ENGLAND?<br />
								IF YES, CREATE A RECIPE UTILIZING XXXXX AS THE MAIN INGREDIENT THAT PAIRS PERFECTLY WITH OUR<br />
								CONO SUR PINOT NOIR AND YOU COULD WIN A TRIP FOR TWO TO CHILE!<br />
								ALL ENTRIES MUST BE RECEIVED BY 11 AUGUST, 2014.
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
							    	<label for="inputEmail3" class="col-sm-2 control-label">Recipe Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar Recipe name" name="nombre_receta" id="nombre_receta">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Ingredients</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar Ingredients" name="ingredientes" id="ingredientes" placeholder="EXAMPLE: Ingredient 1, Ingredient 2">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Cooking Instructions</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" data-msg="Debe ingresar Cooking instructions" name="intrucciones" id="intrucciones"></textarea>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Wine Used (specify range & variety)</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar wine used" id="vino_usado" name="vino_usado" placeholder="EXAMPLE: Cono Sur, Ocio, Pinot Noir">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Your Name</label>
									<div class="col-sm-10">
                                                                            <input type="text" class="form-control" data-msg="Debe ingresar your name" name="nombre" id="nombre">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Link to your blog</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Debe ingresar link to your blog" id="link_blog" name="link_blog">
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label">Your E-mail</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" data-msg="Debe ingresar un email valido" id="email" name="email">
									</div>
								</div>

								<div class="form-group">

							    	<div class="checkbox">
										<label>
											<input type="checkbox" name="acepta_pais" data-msg="Debe aceptar el tos pais" id="acepta_pais">
									    I hereby verify that I am of legal drinking age in my country of residence
									  </label>
									</div>

									<div class="checkbox">
										<label>
									    	<input type="checkbox" name="acepta_tos" data-msg="Debe aceptar el tos 2 " id="acepta_tos">
									    I hereby verify that I have read and fully understand the <a href="" class="link-georgia">Blogger Competition ́s Rules and Regulations.</a>
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