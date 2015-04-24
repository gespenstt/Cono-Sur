        <div class="row">

            <div class="col-md-12">
                
                <div class="widget stacked ">
                    
                    <div class="widget-header">
                        <i class="icon-hand-right"></i>
                        <h3>Diccionario</h3>
                    </div>                    
                    <div class="widget-content">
                        <section id="tables">
                            <h3>Páginas</h3>        
                            

                            <?php
                            
                                if(count($paginas) > 0){
                            ?>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre</th>
                                        <th class="col-lg-4">Última actualización</th>
                                        <th class="col-lg-4">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($paginas as $p){  ?>
                                      <tr>
                                        <td><?=$p->getPagNombre();?></td>
                                        <td><?=$p->getUpdatedAt("d-m-Y h:s");?></td>
                                        <td>
                                            <a href="<?=url_for("diccionario/seleccionaridioma/?pag_id=".$p->getPagId());?>" class="btn btn-default btn-sm">
                                                <i class="icon-edit"></i>
                                                Editar diccionario
                                            </a>
                                            <a href="<?=public_path("img/secciones/".$p->getPagIdentificador().".jpg");?>" class="btn btn-default btn-sm lightbox-type">
                                                <i class="icon-list-alt"></i>
                                                Ver secciones
                                            </a>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            
                                }else{
                                    echo "<center>No se han encontrado páginas</center>";
                                }
                            ?>

                        </section>
                        
                    </div>              
                    
                </div>

            </div>
            
        </div>
