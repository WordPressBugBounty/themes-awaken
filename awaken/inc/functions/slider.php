<?php

/**
 * Custom slider and the featured posts for the theme.
 */

if ( !function_exists( 'awaken_featured_posts' ) ) :

    function awaken_featured_posts() {

        $category = get_theme_mod( 'slider_category', '' );

        $slider_posts = new WP_Query( array(
                'posts_per_page' => 5,
                'cat'	=>	$category
            )
        ); 
        
        ?>

        <div class="awaken-featured-container">
            <div class="awaken-featured-slider">
                <section class="slider">
                    <div class="awaken-slider awaken-swiper">
                        <div class="awaken-swiper-wrapper">
                        <?php 
                        
                        if ( $slider_posts->have_posts() ) :

                            $awaken_slide_count = 1;

                            while( $slider_posts->have_posts() ) : $slider_posts->the_post();

                            $awaken_lazy_loading = 'lazy';
                            
                            ?>

                            <div class="awaken-swiper-slide">
                                <div class="awaken-slide-holder">
                                    <div class="awaken-slide-image">
                                        <?php
                                            if ( $awaken_slide_count == 1 ) {
                                                $awaken_lazy_loading = false;
                                            }
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'featured-slider', array( 'loading' => $awaken_lazy_loading ) );
                                            } else {
                                                $featured_image_url = get_template_directory_uri() . '/images/slide.jpg'; ?>
                                                    <img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="awaken-slide-content">
                                        <a class="awakenwcsw" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" rel="bookmark"></a>
                                        <div class="awaken-slider-details-container">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark"><h3 class="awaken-slider-title"><?php the_title(); ?></h3></a>
                                        </div>
                                    </div><!-- .awaken-slide-content -->
                                </div><!--.awaken-slide-holder-->
                            </div>

                        <?php 
                            $awaken_slide_count++;
                            endwhile; 
                            endif; 
                        ?>
                        </div>
                        <div class="awaken-swiper-button-next"></div>
                        <div class="awaken-swiper-button-prev"></div>
                    </div>
                </section>
            </div><!-- .awaken-slider -->
            <div class="awaken-featured-posts">
                <?php

                $method = get_theme_mod( 'fposts_display_method', 'category' );

                if ( $method == "sticky" ) {
                    
                    $args = array(
                        'posts_per_page'        => 2,
                        'post__in'              => get_option( 'sticky_posts' ),
                        'ignore_sticky_posts'   => 1
                    );

                } else {
                    
                    $fposts_category = get_theme_mod( 'featured_posts_category', '' );

                    $args = array(
                        'posts_per_page'        => 2,
                        'cat'                   => $fposts_category,
                        'ignore_sticky_posts'   => 1
                    );

                }

                $fposts = new WP_Query( $args );

                while( $fposts->have_posts() ) : $fposts->the_post(); ?>

                    <div class="afp">                  
                        <div class="afpi-holder">
							<div class="afpi-image">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'featured' );
									} else {
										$featured_image_url = get_template_directory_uri() . '/images/featured.jpg'; ?>
											<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
										<?php
									}
								?>  
							</div>
                            <div class="afp-content">
								<a class="awakenwcsw" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" rel="bookmark"></a>
                                <div class="afp-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </div>
                            </div><!-- .afp-content -->
                        </div><!-- .afpi-holder -->
                    </div><!-- .afp -->

                <?php endwhile; ?>

            </div>
        </div>
    <?php
    }

endif;