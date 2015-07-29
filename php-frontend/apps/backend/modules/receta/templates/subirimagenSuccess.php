
<form action="<?=url_for("receta/subirimagen/?id=".$receta->getRecId());?>" method="post" enctype="multipart/form-data"> 
    <input type="hidden" name="id" value="<?=$receta->getRecId();?>" />
        <div class="row">

                            <?php
                                /*$array_paises["1"] = "UK";
                                $array_paises["2"] = "Irlanda";
                                $array_paises["3"] = "Suecia";
                                $array_paises["4"] = "Finlandia"; */

                                $array_paises["2"] = "Irlanda";
                                $array_paises["3"] = "Suecia";
                                $array_paises["9"] = "Canada";
                                $array_paises["6"] = "Japon";
                                $array_paises["7"] = "Chile";
                                $array_paises["8"] = "USA";
                            ?>                
            <div class="widget stacked ">

                <div class="widget-header">
                    <i class="icon-list-alt"></i>
                    <h3>Receta - Subir imagen</h3>
                </div>     
                <div class="widget-content">
                    <?php if($msg!=""){ ?>
                    <div class="alert <?php if($error==true){ ?>alert-danger<?php }else{ ?>alert-success <?php } ?> alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $msg; ?>
                    </div>
                    <?php } ?>
                    <section>
                        
                        <div class="col-md-12">
                            <?php if($error == false && $msg != ""){ ?>
                            <div class="widget stacked ">

                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                    <h3>Nueva imagen</h3>
                                </div>     
                                <div class="widget-content" align="center">
                                    <section>
                                        <img src="http://bloggercompetition.conosur.com/uploads/<?=$receta->getRecImagen();?>?time=<?=$receta->getUpdatedAt("U");?>" />
                                    </section>
                                </div>
                                
                            </div>    
                            <?php } ?>

                            <div class="widget stacked ">

                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                    <h3>Receta: <?=$receta->getRecNombreReceta();?> [<?=$array_paises[$receta->getRecPais()];?>]</h3>
                                </div> 
                                <div class="widget-content">

                                    <section class="clearfix">
                                        <p>
                                            <b>Importante</b>
                                            <ul>
                                                <li>Si la receta ya tiene una imagen, este proceso la reemplazará</li>
                                                <li>El tamaño máximo es de 3mb</li>
                                                <li>El ancho y alto mínimo es de 460 x 460 píxeles</li>
                                            </ul>
                                        </p>

                                        <div class="col-lg-6">
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Seleccione imagen</label>
                                                <div class="col-lg-8">
                                                    <input type="file" name="imagen" class="form-control" />
                                                </div>                                                
                                            </div>
                                        </div>

                                    </section>

                                </div>      
                            </div>  
                        <button type="submit" class="btn btn-success">Subir imagen</button> 
                        <a href="<?=url_for("receta/detalle/?id=".$receta->getRecId());?>" class="btn btn-default">Volver</a>
                    </section>

                </div>      
            </div>   
        </div>
</form>