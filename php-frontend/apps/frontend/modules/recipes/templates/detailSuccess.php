<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
    //slot('social_title', json_encode($receta->getRecNombreReceta()));
    //slot('social_desc', json_encode($receta->getRecInstrucciones()));
    slot('social_title','"'.$receta->getRecNombreReceta().'"');
    slot('social_desc','"'.$receta->getRecInstrucciones().'"');
    slot('social_img', "http://bloggercompetition.conosur.com/".public_path("uploads/".$receta->getRecImagen()));
?>
				<div class="container-fluid">

					<div class="row show-grid">

						<div class="col-md-4">

									<span class="blogger-name green txt-center">
								
                                                                            <h1><?=$receta->getRecNombreBlogger();?></h1>
                                                                            <?php
                                                                                $url_bloger = $receta->getRecUrlBlogger();
                                                                                if(strpos(strtolower($url_bloger), "http://")===FALSE){
                                                                                    $url_bloger = "http://".$url_bloger;
                                                                                }
                                                                            ?>
                                                                            <a href="<?=$url_bloger;?>" target="_blank"><?=$array_diccionario["panel_a"]["view_blog"];?></a>

									</span>
									

                                                    <span style="background-image: url(<?=public_path("uploads/".$receta->getRecImagen());?>)" class="recipe-picture"></span>

                                                        <span class="picture-info"><?=$receta->getRecVino();?></span>
                                                        
                                                        <!-- share -->
                                                        <?php
                                                            $url_share = "http://conosur.ratamonkey.com/web/index.php/recipes/detail/id/".$receta->getRecId();
                                                        ?>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($url_share);?>" target="_blank" class="share-facebook">FACEBOOK</a> 
                                                        <a href="https://twitter.com/home?status=<?=urlencode($url_share);?>" target="_blank" class="share-twitter">TWITTER</a>
                                                        
                                                        <!-- /share -->

							<a href="<?=$ref;?>"><p><span class="btn btn-back pull-right"><?=$array_diccionario["panel_a"]["back_to"];?></span></p></a>

						</div>

					  	<div class="col-md-8">

                                                    <h4><?=$receta->getRecNombreReceta();?></h4>

					  		<h3><?=$array_diccionario["panel_b"]["ingredients"];?></h3>

					  		<ul class="list-unstyled">

							 	<?=html_entity_decode($receta->getRecIngredientes());?>

							</ul>

							<h3><?=$array_diccionario["panel_b"]["instructions"];?></h3>

                                                        <p class="text-left">
                                                            <?=html_entity_decode($receta->getRecInstrucciones());?>
                                                        </p>

					  		

					  	</div>

					</div>

				</div>
<?php if($modal){ ?>
<script type="text/javascript">

$(document).ready(function(){
    $("#mensajeVotoExito").html('<?=$msg;?>');
    $("#modalVotoexito").modal({
        backdrop: 'static',
        keyboard: false
    });     
})

</script>
<?php } ?>
				

