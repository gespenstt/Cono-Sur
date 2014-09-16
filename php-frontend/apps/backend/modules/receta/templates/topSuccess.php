<?php

    $irlanda = $sf_data->getRaw("irlanda");
    $suecia = $sf_data->getRaw("suecia");
    $finlandia = $sf_data->getRaw("finlandia");
    
    array_reverse($irlanda); print_r($irlanda); exit;

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
                        </div>
                        
                    </section>
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises["3"];?></h4>
                        </div>
                        
                    </section>
                    <section>
                        
                        <div class="col-md-12">
                            <h4><?=$array_paises["4"];?></h4>
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>