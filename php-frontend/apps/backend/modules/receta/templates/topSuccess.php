<?php

    $irlanda = $sf_data->getRaw("irlanda");
    $suecia = $sf_data->getRaw("suecia");
    $finlandia = $sf_data->getRaw("finlandia");
    
    $irlanda = array_reverse($irlanda);
    $suecia = array_reverse($suecia);
    $finlandia = array_reverse($finlandia);

?>
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
                    <h3>Top</h3>
                </div>     
                <div class="widget-content">
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises["2"];?></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre receta</th>
                                        <th class="col-lg-2">Blogger</th>
                                        <th class="col-lg-2">Votos</th>
                                        <th class="col-lg-2">Flag</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($irlanda as $ir){ ?>
                                        <tr>
                                            <td><a href="<?=url_for("receta/editar/?id=".$ir["id"]);?>"><?=$ir["nombre"];?></a></td>
                                            <td><?=$ir["blogger"];?></td>
                                            <td><?=$ir["count"];?></td>
                                            <td><?=$ir["flag"];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </section>
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises["3"];?></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre receta</th>
                                        <th class="col-lg-2">Blogger</th>
                                        <th class="col-lg-2">Votos</th>
                                        <th class="col-lg-2">Flag</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($suecia as $ir){ ?>
                                        <tr>
                                            <td><a href="<?=url_for("receta/editar/?id=".$ir["id"]);?>"><?=$ir["nombre"];?></a></td>
                                            <td><?=$ir["blogger"];?></td>
                                            <td><?=$ir["count"];?></td>
                                            <td><?=$ir["flag"];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </section>
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises["4"];?></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                      <tr>
                                        <th class="col-lg-4">Nombre receta</th>
                                        <th class="col-lg-2">Blogger</th>
                                        <th class="col-lg-2">Votos</th>
                                        <th class="col-lg-2">Flag</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($finlandia as $ir){ ?>
                                        <tr>
                                            <td><a href="<?=url_for("receta/editar/?id=".$ir["id"]);?>"><?=$ir["nombre"];?></a></td>
                                            <td><?=$ir["blogger"];?></td>
                                            <td><?=$ir["count"];?></td>
                                            <td><?=$ir["flag"];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>