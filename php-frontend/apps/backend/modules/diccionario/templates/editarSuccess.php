        <div class="row">
                
            <div class="widget stacked ">

                <div class="widget-header">
                    <i class="icon-list-alt"></i>
                    <h3>Editando: <?=$pagina->getPagNombre()?> [<?=$idioma->getIdiNombre();?>]</h3>
                </div>     
                <div class="widget-content">
                    <section>
                            
                        <form action="<?=url_for("diccionario/guardar");?>" class="form-horizontal col-md-12" method="post">
                            <input type="hidden" name="pag_id" value="<?=$pagina->getPagId();?>" />
                            <input type="hidden" name="idioma" value="<?=$idioma->getIdiId();?>" />
                        <div class="col-md-12">
                        <?php foreach($secciones as $sec){ ?>

                            <div class="widget stacked ">

                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                    <h3><?=$sec->getSecNombre();?></h3>
                                </div>     
                                <div class="widget-content">
                                    <section>

                                        <?php foreach($sec->getParametros() as $par){ ?>

                                        <div class="form-group">
                                            <label class="col-lg-3"><?=$par->getParIdentificador();?></label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control" name="<?=$par->getParId();?>"><?php
                                                    echo $funciones->getLangText($idioma->getIdiId(), $par->getParId());
                                                ?></textarea>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </section>

                                </div>      
                            </div>   

                        <?php } ?>

                            <div>
                                <input type="submit" value="Guardar cambios" class="btn btn-success" />
                                <a href="<?=url_for("diccionario/index");?>" class="btn btn-default">Volver</a>
                                <a href="<?=public_path("img/secciones/".$pagina->getPagIdentificador().".jpg");?>" class="btn btn-default lightbox-type">Ver secciones</a>
                            </div>

                        </div>
                        </form>

                    </section>

                </div>      
            </div>   
            
        </div>
