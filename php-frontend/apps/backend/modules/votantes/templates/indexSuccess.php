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
                            <p>Listando <?=$votantes->count();?> registros</p>                  
                            <?php
                                $array_paises["2"] = "Irlanda";
                                $array_paises["3"] = "Suecia";
                                $array_paises["9"] = "Canada";
                                $array_paises["6"] = "Japon";
                                $array_paises["7"] = "Chile";
                                $array_paises["8"] = "USA";                            
                            ?>
                            <div class="clearfix" style="padding-bottom: 10px;">
                                  <form id="formularioBuscar" action="<?=url_for("votantes/index");?>" method="get">
                                <div class="navbar-left navbar-form">
                                      <select name="estado" class="form-control">
                                          <option value="">Todos los estados</option>
                                          <option value="0" <?php if($estado=="0"){echo "selected";}?>>En validacióm</option>
                                          <option value="1" <?php if($estado=="1"){echo "selected";}?>>Validado</option>
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
                                if($votantes->count() > 0){
                            ?>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-2">Nombre</th>
                                        <th class="col-lg-4">Receta</th>
                                        <th class="col-lg-2">Pais</th>
                                        <th class="col-lg-2">Estado</th>
                                        <th class="col-lg-2">Fecha</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($votantes->getResults() as $p){  ?>
                                      <?php $info_receta = $funciones->getRecetaUsuarioInfo($p->getUsuId()); ?>
                                      <tr>
                                        <td><?php echo $p->getUsuNombre();?><br /><?php echo $p->getUsuEmail();?></td>
                                        <td><?php echo $info_receta["nombre"]; ?></td>
                                        <td><?php
                                            echo $array_paises[$info_receta["pais"]];                                            
                                            ?></td>
                                        <td><?php
                                            switch($p->getUsuEstado()){
                                                case "0":
                                                    echo "En validación";
                                                    break;
                                                case "1":
                                                    echo "Validado";
                                                    break;
                                            }
                                            ?></td>
                                        <td><?=$p->getUpdatedAt("d-m-Y h:s");?></td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                if($votantes->haveToPaginate()){
                            ?>
                            <ul class="pagination">
                                <?php if($pagina != $votantes->getPreviousPage() && !empty($pagina)){ ?>
                                <li><a href="<?=url_for("votantes/index/?pais=$pais&estado=$estado&p=".$votantes->getPreviousPage());?>">« anterior</a></li>
                                <?php } ?>
                                
                                <?php
                                foreach($votantes->getLinks() as $link){
                                    if($link != $pagina){
                                ?>
                                <li><a href="<?=url_for("votantes/index/?pais=$pais&estado=$estado&p=".$link);?>"><?=$link;?></a></li>                                                                
                                <?php
                                    }else{
                                ?>
                                <li><a href="#"><?=$link;?></a></li>
                                <?php
                                    }
                                }
                                ?>
                                
                                <?php if($pagina != $votantes->getNextPage()){ ?>
                                <li><a href="<?=url_for("votantes/index/?pais=$pais&estado=$estado&p=".$votantes->getNextPage());?>">siguiente »</a></li>
                                <?php } ?>
                            </ul>   
                            <?php                            
                                }
                            
                                }else{
                                    echo "<center>No se han encontrado votantes</center>";
                                }
                            ?>

                        </section>
                        
                    </div>              
                    
                </div>

            </div>
            
        </div>
