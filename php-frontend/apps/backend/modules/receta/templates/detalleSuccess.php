        <div class="row">

                            <?php
                                $array_paises["1"] = "UK";
                                $array_paises["2"] = "Irlanda";
                                $array_paises["3"] = "Suecia";
                                $array_paises["4"] = "Finlandia"; 
                            ?>                
            <div class="widget stacked ">

                <div class="widget-header">
                    <i class="icon-list-alt"></i>
                    <h3>Receta</h3>
                </div>     
                <div class="widget-content">
                    <section>
                        
                        <div class="col-md-12">

                            <div class="widget stacked ">

                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                    <h3><?=$receta->getRecNombreReceta();?> [<?=$array_paises[$receta->getRecPais()];?>]</h3>
                                </div>     
                                <div class="widget-content">
                                    <section>

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Ingredientes:</label>
                                            <div class="col-lg-8">
                                                <?=$receta->getRecIngredientes();?>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Instrucciones:</label>
                                            <div class="col-lg-8">
                                                <?=$receta->getRecInstrucciones();?>
                                            </div>
                                        </div>

                                    </section>
                                    <section>

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Vino usado:</label>
                                            <div class="col-lg-8">
                                                <?=$receta->getRecVino();?>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Blogger:</label>
                                            <div class="col-lg-8">
                                                Nombre: <?=$receta->getRecNombreBlogger();?><br>
                                                Email: <?=$receta->getRecEmailBlogger();?><br>
                                                Blog: <?=$receta->getRecUrlBlogger();?>
                                            </div>
                                        </div>

                                    </section>

                                </div>      
                            </div>   

                            <div class="widget stacked ">

                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                    <h3>Imagen</h3>
                                </div>     
                                <div class="widget-content" align="center">
                                    <section>
                                        <img src="http://bloggercompetition.conosur.com/uploads/<?=$receta->getRecImagen();?>" />
                                    </section>
                                </div>
                                
                            </div>

                        </div>
            <a href="<?=url_for("receta/crop/?id=".$receta->getRecId());?>" class="btn btn-warning">Crop Imagen</a>
                    </section>

                </div>      
            </div>   
        </div>
