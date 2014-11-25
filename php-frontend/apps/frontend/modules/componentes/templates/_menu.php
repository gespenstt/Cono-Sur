<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>            
<nav class="navbar navbar-default" role="navigation">
                    <input type="hidden" name="legal" id="legal" value="<?=$legal;?>" />
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
                                    <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$array_diccionario["menu"]["recipes"];?></a>
                                            <ul class="dropdown-menu">
                                                    <li><a href="<?=url_for("recipes/index/?from=se");?>">FROM SWEDEN</a></li>
                                                    <li><a href="<?=url_for("recipes/index/?from=ie");?>">FROM IRELAND</a></li>
                                                    <li><a href="<?=url_for("recipes/index/?from=fi");?>">FROM FINLAND</a></li>
                                            </ul>
                                    </li>
                                    <?php /*if(!$esconder){ ?>
                                    <li><a href="<?=url_for("vote/index");?>"><?=$array_diccionario["menu"]["vote"];?></a></li>
                                    <?php } 
                                    <li><a href="<?=url_for("semifinalists/index");?>"><?=$array_diccionario["menu"]["semifinalists"];?></a></li>*/ ?>
                                    <li><a href="<?=url_for("finalists/index");?>"><?=$array_diccionario["menu"]["finalists"];?></a></li>
                                    <li><a href="<?=url_for("winner/index");?>"><?=$array_diccionario["menu"]["winner"];?></a></li>
                            </ul>

                    </div><!-- /.navbar-collapse -->

            </nav>