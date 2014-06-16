        <div class="row">

            <div class="col-md-12">
                
                <div class="widget stacked ">
                    
                    <div class="widget-header">
                        <i class="icon-hand-right"></i>
                        <h3>Recetas</h3>
                    </div>                    
                    <div class="widget-content">
                        <section id="tables">
                            <h3>Listado</h3>        
                            

                            <?php
                                $array_paises["1"] = "UK";
                                $array_paises["2"] = "Irlanda";
                                $array_paises["3"] = "Suecia";
                                $array_paises["4"] = "Finlandia";                            
                                if(count($recetas) > 0){
                            ?>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre Receta</th>
                                        <th class="col-lg-2">Pais</th>
                                        <th class="col-lg-2">Estado</th>
                                        <th class="col-lg-2">Fecha</th>
                                        <th class="col-lg-2">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($recetas as $p){  ?>
                                      <tr>
                                        <td><?=$p->getRecNombreReceta();?></td>
                                        <td><?php
                                            echo $array_paises[$p->getRecPais()];                                            
                                            ?></td>
                                        <td><?php
                                            switch($p->getRecEstado()){
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
                                            ?></td>
                                        <td><?=$p->getUpdatedAt("d-m-Y h:s");?></td>
                                        <td>
                                            <a href="<?=public_path("receta/detalle/?id=".$p->getRecId());?>" class="btn btn-default btn-sm">
                                                <i class="icon-list-alt"></i>
                                                Ver detalle
                                            </a>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            
                                }else{
                                    echo "<center>No se han encontrado recetas</center>";
                                }
                            ?>

                        </section>
                        
                    </div>              
                    
                </div>

            </div>
            
        </div>
