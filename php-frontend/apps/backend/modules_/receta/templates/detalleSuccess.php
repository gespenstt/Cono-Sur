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
                                    <section class="clearfix">

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Ingredientes:</label>
                                            <div class="col-lg-8">
                                                <?=html_entity_decode($receta->getRecIngredientes());?>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="col-lg-4">Instrucciones:</label>
                                            <div class="col-lg-8">
                                                <?=html_entity_decode($receta->getRecInstrucciones());?>
                                            </div>
                                        </div>

                                    </section>
                                    <section class="clearfix">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="col-lg-4">Vino usado:</label>
                                                <div class="col-lg-8">
                                                    <?=$receta->getRecVino();?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4">Estado:</label>
                                                <div class="col-lg-8">
                                                    <?php
                                                switch($receta->getRecEstado()){
                                                    case "0":
                                                        echo "En moderación";
                                                        break;
                                                    case "1":
                                                        echo "Aprobado";
                                                        break;
                                                    case "2":
                                                        echo "Reprobado";
                                                        break;
                                                }
                                                ?>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 ">
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
                                        <img src="http://bloggercompetition.conosur.com/uploads/<?=$receta->getRecImagen();?>?time=<?=$receta->getUpdatedAt("U");?>" />
                                    </section>
                                </div>
                                
                            </div>

                        </div>
            <a href="<?=url_for("receta/crop/?id=".$receta->getRecId());?>" class="btn btn-warning">Crop Imagen</a> 
            <?php if($original){ ?>
            <a href="<?=url_for("receta/restaurar/?id=".$receta->getRecId());?>" class="btn btn-danger">Restaurar Imagen Original</a> 
            <?php } ?>
            <a href="<?=url_for("receta/editar/?id=".$receta->getRecId());?>" class="btn btn-warning">Editar</a>
            <a href="<?=url_for("receta/index");?>" class="btn btn-default">Volver</a>
                    </section>

                </div>      
            </div>   
        </div>
