<?php
    get_header(); 
?>
                <?php 
                    if ( have_posts() ) while ( have_posts() ) : the_post(); 
                    
                    $imagen_post = get_custom_field('imagen_post'); 
                ?>
                    <div class="container-fluid">

                            <div class="row show-grid">

                                    <div class="col-md-12">	

                                            <h1 class="post-title"><?php the_title(); ?></h1>	

                                    </div>

                                    <div class="col-md-12 post-picture">	

                                            <img src="<?php echo $imagen_post; ?>" alt="<?php the_title(); ?>">

                                            <!--<span style="background-image: url(http://conosur.ratamonkey.com/web/blog/wp-content/themes/blogger/img/img-04.jpg);" class="post-picture"></span>-->

                                            <h1><?php the_date("F j, Y"); ?></h1>	

                                            <div class="post-content">

                                                    <?php the_content(); ?>
                                            </div>

                                    </div>

                            </div>

                    </div>
                <?php
                    endwhile;
                ?>
<?php 
    get_footer();
?>