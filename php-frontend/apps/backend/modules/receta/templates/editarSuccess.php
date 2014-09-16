<form action="<?=url_for("receta/editar");?>" method="post"> 
    <input type="hidden" name="id" value="<?=$receta->getRecId();?>" />
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

                                        <div class="col-lg-6">
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Nombre receta:</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="nombrereceta" value="<?=$receta->getRecNombreReceta();?>" />
                                                </div>                                                
                                            </div>
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Ingredientes:</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="ingredientes"><?=$funciones->br2nl(html_entity_decode($receta->getRecIngredientes()));?></textarea>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6" style="padding-top: 20px;">
                                            <label class="col-lg-4">Instrucciones:</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" name="instrucciones"><?=$funciones->br2nl(html_entity_decode($receta->getRecInstrucciones()));?></textarea>
                                            </div>
                                        </div>

                                    </section>
                                    <section class="clearfix">

                                        <div class="col-lg-6">
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Vino usado:</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" type="text" name="vinousado" value="<?=$receta->getRecVino();?>" />
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Estado:</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="estado">
                                                        <option value="0" <?php if($receta->getRecEstado()=="0"){echo "selected";}?>>En moderación</option>
                                                        <option value="1" <?php if($receta->getRecEstado()=="1"){echo "selected";}?>>Aprobado</option>
                                                        <option value="2" <?php if($receta->getRecEstado()=="2"){echo "selected";}?>>Reprobado</option>
                                                    </select>
                                                </div>                                                
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 " style="padding-top: 20px;">
                                            <label class="col-lg-4">Nombre Blogger:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control"  type="text" name="nombre_blogger" value="<?=$receta->getRecNombreBlogger();?>" />
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 " style="padding-top: 20px;">
                                            <label class="col-lg-4">Email Blogger:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control"  type="text" name="email_blogger" value="<?=$receta->getRecEmailBlogger();?>" />
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 " style="padding-top: 20px;">
                                            <label class="col-lg-4">Blog Blogger:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control"  type="text" name="blog_blogger" value="<?=$receta->getRecUrlBlogger();?>" />
                                            </div>
                                        </div>
                                        
                                    </section>
                                    <section class="clearfix">

                                        <div class="col-lg-6">
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Semi-finalista:</label>
                                                <div class="col-lg-8">
                                                    <input class="" type="checkbox" name="semi" <?php if($receta->getRecSemi()=="1"){ echo "checked"; }?> />
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Finalista:</label>
                                                <div class="col-lg-8">
                                                    <input class="" type="checkbox" name="finalista" <?php if($receta->getRecFinal()=="1"){ echo "checked"; }?> />
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding-top: 20px;">
                                                <label class="col-lg-4">Ganador:</label>
                                                <div class="col-lg-8">
                                                    <input class="" type="checkbox" name="ganador" <?php if($receta->getRecGanador()=="1"){ echo "checked"; }?> />
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>      
                            </div>   

                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button> 
                        <a href="<?=url_for("receta/detalle/?id=".$receta->getRecId());?>" class="btn btn-default">Volver</a>
                    </section>

                </div>      
            </div>   
        </div>
</form>