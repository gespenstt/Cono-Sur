        <div class="row">

            <div class="col-md-12">
                
                <div class="widget stacked ">
                    
                    <div class="widget-header">
                        <i class="icon-hand-right"></i>
                        <h3>Diccionario</h3>
                    </div>                    
                    <div class="widget-content">
                        <section id="tables">
                            <h3>Seleccionar idioma</h3> 
                            <form action="<?=url_for("diccionario/editar");?>" class="form-horizontal col-md-12" method="get">
                            <input type="hidden" name="pag_id" value="<?=$pagid;?>" />
                            <div class="form-group">
                                <label class="col-lg-5">Para continuar seleccione el idioma a editar:</label>
                                <div class="col-lg-7">
                                    <select name="idioma" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php 
                                            foreach($idiomas as $i){ 
                                            if($i->getIdiIdentificador()=="en_uk" || $i->getIdiIdentificador()=="sv_fi"){
                                                continue;
                                            }
                                        ?>
                                        <option value="<?=$i->getIdiId();?>"><?=$i->getIdiNombre();?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-5"> </label>
                                <div class="col-lg-7">
                                    <input type="submit" value="Continuar" class="btn-success btn" />
                                </div>
                            </div>
                                
                            </form>

                        </section>
                        
                    </div>              
                    
                </div>

            </div>
            
        </div>
