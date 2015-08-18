<?php

    $out_array = $sf_data->getRaw("out_array");
    /*$suecia = $sf_data->getRaw("suecia");
    $finlandia = $sf_data->getRaw("finlandia");
    
    $irlanda = array_reverse($irlanda);
    $suecia = array_reverse($suecia);
    $finlandia = array_reverse($finlandia);*/

?>
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
                    <h3>Top</h3>
                </div>     
                <div class="widget-content">
                <?php foreach($out_array as $id_pais => $val_pais){ ?>
                    <?php
                        if(count($val_pais) == 0){
                            continue;
                        }
                    ?>
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises[$id_pais];?></h4>
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
                                        <?php foreach($val_pais as $oa){ ?>
                                        <tr>
                                            <td><a href="<?=url_for("receta/editar/?id=".$oa["id"]);?>"><?=$oa["nombre"];?></a></td>
                                            <td><?=$oa["blogger"];?></td>
                                            <td><?=$oa["count"];?></td>
                                            <td><?=$oa["flag"];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </section>
                    <?php } ?>
                </div>
            </div>
        </div>