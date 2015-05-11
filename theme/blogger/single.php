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
                                
                                <div class="col-md-12">
                                    <div id="disqus_thread"></div>
                                    <script type="text/javascript">
                                        /* * * CONFIGURATION VARIABLES * * */
                                        var disqus_shortname = 'bloggercompetitionconosur';

                                        /* * * DON'T EDIT BELOW THIS LINE * * */
                                        (function() {
                                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                                </div>

                            </div>

                    </div>
                <?php
                    endwhile;
                ?>
<?php 
    get_footer();
?>