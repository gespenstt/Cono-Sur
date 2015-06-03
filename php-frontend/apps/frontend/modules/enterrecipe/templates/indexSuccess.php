<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>
<div class="hidden">
    <img id="iconPicture" src="<?=public_path("img/icon-picture.png");?>" />
</div>

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

                            <form id="formRecipe" action="<?=url_for("enterrecipe/guardar");?>" method="post" enctype="multipart/form-data" class="form-horizontal enter-recipe-form" role="form" onsubmit="return validarRecipe();">

							 	<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["recipe_name"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Please complete." name="nombre_receta" id="nombre_receta">
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group form-inline">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["ingredients"];?></label>
									<div class="col-sm-8">
										<!-- <input type="text" class="form-control" data-msg="Please list ingredients." name="ingredientes" id="ingredientes" placeholder="EXAMPLE: Ingredient 1, Ingredient 2"> -->
                                    	<ul id="listado"></ul>

                                    	<input type="text" id="input_ingrediente" class="form-control col-sm-10" placeholder="Ingrediente" />

                                    	<span class="input-group-btn col-sm-2">    
                                      		<button class="btn btn-default btn-insertar" type="button">+</button>
                                    	</span>

                                    	<textarea data-msg="Please list ingredients." class="hidden" name="ingredientes" id="ingredientes"></textarea>

                                    	<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["cooking_instructions"];?></label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" data-msg="Please list cooking instructions." name="intrucciones" id="intrucciones"></textarea>
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["wine_used"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Must name range and variety." id="vino_usado" name="vino_usado" placeholder="EXAMPLE: Cono Sur, Ocio, Pinot Noir">
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group form-group-imagen">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["foto"];?></label>
									<div class="col-sm-10">
                                                                            <div id="canvasImagen" >
                                                                                <canvas id="previewcanvas" width="200" height="200"></canvas>
                                                                            </div>
                                                                            <input type="hidden" id="validaImagen" value="ok" data-imagen="false" data-msg="Your photo does not meet the dimension requirements. Please try again with a photo of 460 x 460 pixels or superior." />
                                                                            <input type="file" name="foto" data-msg="Your photo does not meet the dimension requirements. Please try again with a photo of 460 x 460 pixels or superior." id="foto" onchange="return ShowImagePreview( this.files );" />
										<p class="text-danger hidden text-danger-imagen"></p>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["your_name"];?></label>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" data-msg="Please list complete name." name="nombre" id="nombre">
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group ">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["your_email"];?></label>
									<div class="col-sm-10">
										<input type="email" class="form-control" data-msg="Please follow proper format: xxxx@xxx.xxx" id="email" name="email">
										<p class="text-danger hidden"></p>
									</div> 
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["link_to_your_blog"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Please include link." id="link_blog" name="link_blog">
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group">
							    	<label for="inputEmail3" class="col-sm-2 control-label"><?=$array_diccionario["formulario"]["name_your_blog"];?></label>
									<div class="col-sm-10">
										<input type="text" class="form-control" data-msg="Please include name of your blog." id="name_blog" name="name_blog">
										<p class="text-danger hidden"></p>
									</div>
								</div>

								<div class="form-group">

							    	<div class="checkbox">
										<label>
											<input type="checkbox" name="acepta_pais" data-msg="Please verify age." id="acepta_pais">
									    <?=$array_diccionario["formulario"]["tos1"];?>
										<p class="text-danger hidden"></p>
									  </label>
									</div>

									<div class="checkbox">
										<label>
									    	<input type="checkbox" name="acepta_tos" data-msg="You must read and fully understand the rules and regulations." id="acepta_tos">
									    <?=$array_diccionario["formulario"]["tos2"];?> <a href="<?=public_path("pdf/Rules_and_Regulations_$lang.pdf");?>" class="link-georgia" target="blank_"><?=$array_diccionario["formulario"]["link_tos2"];?></a>
										<p class="text-danger hidden"></p>
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
<script type="text/javascript">
    $(document).ready(function(){
        var ingredientes = [];
        var btn_insertar = $(".btn-insertar"),
            input_ingrediente = $("#input_ingrediente"),
            ul_listado = $("#listado"),
            template = '<li class="">{ING} <i data-id="{ID}" data-ing="{ING}" class="glyphicon glyphicon-remove remove-ing"></i></li>';

        btn_insertar.click(function(){
            if(input_ingrediente.val()){
                var ingrediente = input_ingrediente.val(),
                    temp_template = template;
                temp_template = temp_template.replace(/{ING}/g,ingrediente);
                ingredientes.push(ingrediente);
                var data_id = ingredientes.length - 1;
                temp_template = temp_template.replace("{ID}",data_id);
                ul_listado.append( temp_template);
                input_ingrediente.val("");
                //console.log(ingredientes);
                var txt = "";
                ingredientes.forEach(function(entry) {
                    if(entry!=""){
                       txt = txt + entry + "\n";
                    }
                }); 
                
                $("#ingredientes").val(txt);  
            }
                $(".remove-ing").unbind('click').bind('click',function(){
                        var _this = $(this);
                        var data_id = _this.data("id");
                        ingredientes[data_id] = "";
                        _this.parent("li").remove();
                        
                        var txt = "";
                        ingredientes.forEach(function(entry) {
                            if(entry!=""){
                               txt = txt + entry + "\n";
                            }
                        }); 
                        $("#ingredientes").val(txt); 
                        //console.log(ingredientes);
                });
        });

        input_ingrediente.keydown(function(event){    
            if(event.keyCode==13){
               btn_insertar.trigger('click');
            }
        });
        
    });
</script>