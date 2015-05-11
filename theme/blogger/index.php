<?php
    get_header(); 
?>
    <div class="container-fluid">

            <div class="row show-grid">
                
                <?php 
                    if ( have_posts() ) while ( have_posts() ) : the_post(); 
                    
                    $imagen_home = get_custom_field('imagen_home'); 
                ?>

                    <div class="col-md-4">
                            <figure class="effect-lily">
                                    <img src="<?php echo $imagen_home; ?>" alt="<?php the_title(); ?>"/>
                                    <figcaption>
                                            <div>
                                                    <h2><?php the_title(); ?></h2>
                                            </div>
                                            <a href="<?php the_permalink();?>">View more</a>
                                    </figcaption>			
                            </figure>
                    </div>
                <?php
                    endwhile;
                ?>
                
            </div>					

    </div>

</div><!-- /End Container -->
<?php 
    get_footer();
?>