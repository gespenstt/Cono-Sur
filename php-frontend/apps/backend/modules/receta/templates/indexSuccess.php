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

            <div class="col-md-12">
                
                <div class="widget stacked ">
                    
                    <div class="widget-header">
                        <i class="icon-hand-right"></i>
                        <h3>Recetas</h3>
                    </div>                    
                    <div class="widget-content">
                        <section id="resumen">
                            <h3>Resumen</h3> 
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-4">Pais</th>
                                            <th class="col-lg-2">En moderación</th>
                                            <th class="col-lg-2">Aprobado</th>
                                            <th class="col-lg-2">Reprobado</th>
                                            <th class="col-lg-2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $c_moderacion = 0;
                                        $c_aprobado = 0;
                                        $c_reprobado = 0;
                                        $c_total = 0;
                                    ?>
                                    <?php foreach($array_paises as $key => $val){ ?>
                                    <?php
                                        $moderacion = $funciones->getRecetaPaisEstado($key,0);
                                        $c_moderacion = $c_moderacion + $moderacion;
                                        $aprobado = $funciones->getRecetaPaisEstado($key,1);
                                        $c_aprobado = $c_aprobado + $aprobado;
                                        $reprobado = $funciones->getRecetaPaisEstado($key,2);
                                        $c_reprobado = $c_reprobado + $reprobado;
                                        $total = $moderacion+$aprobado+$reprobado;
                                        $c_total = $c_total + $total;
                                    ?>
                                        <tr>
                                            <td><?php echo $val; ?></td>
                                            <td><?php echo $moderacion; ?></td>
                                            <td><?php echo $aprobado; ?></td>
                                            <td><?php echo $reprobado; ?></td>
                                            <td><?php echo $total; ?></td>
                                        </tr>
                                    <?php } ?>
                                        <tr>
                                            <td><b>Totales</b></td>
                                            <td><?php echo $c_moderacion; ?></td>
                                            <td><?php echo $c_aprobado; ?></td>
                                            <td><?php echo $c_reprobado; ?></td>
                                            <td><?php echo $c_total; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <section id="tables">
                            <h3>Listado</h3>    
                            <div class="clearfix" style="padding-bottom: 10px;">
                                  <form id="formularioBuscar" action="<?=url_for("receta/index");?>" method="get">

                                <div class="navbar-left navbar-form">
                                      <input name="nombre" placeholder="Nombre receta" class="form-control">
                                </div>
                                <div class="navbar-left navbar-form">
                                      <select name="estado" class="form-control">
                                          <option value="">Todos los estados</option>
                                          <option value="0" <?php if($estado=="0"){echo "selected";}?>>En moderación</option>
                                          <option value="1" <?php if($estado=="1"){echo "selected";}?>>Aprobado</option>
                                          <option value="2" <?php if($estado=="2"){echo "selected";}?>>Reprobado</option>
                                      </select>
                                </div>
                                <div class="navbar-left navbar-form">
                                      <select name="pais" class="form-control">
                                          <option value="">Todos los paises</option>
                                      <?php foreach($array_paises as $key => $val){ ?>
                                          <option value="<?=$key;?>" <?php if($pais==$key){echo "selected";}?>><?=$val;?></option>
                                      <?php } ?>
                                      </select>
                                </div>
                                <div class="navbar-left navbar-form">
                                      <button type="submit" class="btn btn-default">Filtrar</button>
                                </div>
                                  </form>
                            </div>   
                            

                            <?php                          
                                if($recetas->count() > 0){
                            ?>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre Receta</th>
                                        <th class="col-lg-2">Pais</th>
                                        <th class="col-lg-2">Estado</th>
                                        <th class="col-lg-2">Fecha</th>
                                        <th class="col-lg-1">Votos</th>
                                        <th class="col-lg-2">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($recetas->getResults() as $p){  ?>
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
                                        <td><?=$funciones->countVotos($p->getRecId());?></td>
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
                                if($recetas->haveToPaginate()){
                            ?>
                            <ul class="pagination">
                                <?php if($pagina != $recetas->getPreviousPage() && !empty($pagina)){ ?>
                                <li><a href="<?=url_for("receta/index/?pais=$pais&estado=$estado&p=".$recetas->getPreviousPage());?>">« anterior</a></li>
                                <?php } ?>
                                
                                <?php
                                foreach($recetas->getLinks() as $link){
                                    if($link != $pagina){
                                ?>
                                <li><a href="<?=url_for("receta/index/?pais=$pais&estado=$estado&p=".$link);?>"><?=$link;?></a></li>                                                                
                                <?php
                                    }else{
                                ?>
                                <li><a href="#"><?=$link;?></a></li>
                                <?php
                                    }
                                }
                                ?>
                                
                                <?php if($pagina != $recetas->getNextPage()){ ?>
                                <li><a href="<?=url_for("receta/index/?pais=$pais&estado=$estado&p=".$recetas->getNextPage());?>">siguiente »</a></li>
                                <?php } ?>
                            </ul>   
                            <?php                            
                                }
                            
                                }else{
                                    echo "<center>No se han encontrado recetas</center>";
                                }
                            ?>

                        </section>
                        
                    </div>              
                    
                </div>

            </div>
            
        </div>
