<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>            
<nav class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                            </button>

                            <a class="navbar-brand" href="<?=url_for("home/index");?>">Conosur Bloggers</a>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                            <ul class="nav navbar-nav navbar-right mayus">
                                    <li><a href="<?=url_for("contestdetails/index");?>"><?=$array_diccionario["menu"]["contest_details"];?></a></li>
                                    <li><a href="<?=url_for("grandprize/index");?>"><?=$array_diccionario["menu"]["grand_prize"];?></a></li>
                                    <?php if(!$esconder){ ?>
                                    <li><a href="<?=url_for("enterrecipe/index");?>"><?=$array_diccionario["menu"]["enter_your_recipe"];?></a></li>
                                    <?php } ?>
                                    <!--<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">RECIPES</a>
                                            <ul class="dropdown-menu">
                                                    <li><a href="recipes.html">FROM SWEEDEN</a></li>
                                                    <li><a href="recipes.html">FROM IRELAND</a></li>
                                                    <li><a href="recipes.html">FROM UK</a></li>
                                                    <li><a href="recipes.html">FROM HOLLAND</a></li>
                                            </ul>
                                    </li>-->
                            </ul>

                    </div><!-- /.navbar-collapse -->

            </nav>