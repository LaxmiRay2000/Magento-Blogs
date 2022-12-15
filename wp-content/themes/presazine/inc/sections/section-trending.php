<?php
    $trending_content_type     = presazine_get_option( 'trending_content_type' );
    $trending_title       = presazine_get_option( 'trending_title' );
    $enable_category     = presazine_get_option( 'trending_category_enable' );
    $enable_content     = presazine_get_option( 'trending_content_enable' );
    $enable_author     = presazine_get_option( 'trending_author_enable' );
    $enable_posted_on     = presazine_get_option( 'trending_posted_on_enable' );
    $trending_dots  = presazine_get_option( 'trending_dots_enable' );
    $trending_arrow  = presazine_get_option( 'trending_arrow_enable' );
    $number_of_trending_items  = presazine_get_option( 'number_of_trending_items' );
    $trending_category = presazine_get_option( 'trending_category' );
    $header_font_size = presazine_get_option( 'trending_font_size');
    $trending_layout = presazine_get_option('trending_layout_option');
    $number_of_trending_column = presazine_get_option('number_of_trending_column');
    $content_align = presazine_get_option('trending_content_align');
    $excerpt_length =presazine_get_option( 'trending_excerpt_length');

    for( $i=1; $i<=$number_of_trending_items; $i++ ) :
        $trending_page_posts[] = absint(presazine_get_option( 'trending_page_'.$i ) );
        $trending_post_posts[] = absint(presazine_get_option( 'trending_post_'.$i ) );
    endfor;

?>
<?php if( !empty($trending_title)):?>
    <div class="section-header">
        <h2 class="section-title"><?php echo esc_html($trending_title);?></h2>
    </div>       
<?php endif;?>  
<div class="section-content clear">
    <div class="trending-slider" data-slick='{"slidesToShow": <?php echo esc_attr($number_of_trending_column); ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php if( true== $trending_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": false }'>
        <?php 
            $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $trending_post_posts ),
                'post__in'      => $trending_post_posts,
                'orderby'       =>'post__in', 
                'ignore_sticky_posts' => true, 
            ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
                    <article>
                        <div class="post-item-wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-featured-image">
                                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'presazine-blog');?>');">
                                            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                            <div class="overlay"></div>
                                            <?php $homepage_video_url = get_post_meta( get_the_ID(), 'presazine-video-url', true ); ?>
                                            <?php if (!empty($homepage_video_url)): ?>
                                               <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                            <?php endif ?>
                                        </div><!-- .featured-image -->
                                    </div>
                                <?php endif; ?>

                                <div class="entry-container <?php echo esc_attr($content_align); ?>">
                                    <?php if ( ($enable_category==true) ) : ?>
                                        
                                        <?php presazine_entry_meta(); ?>
                                    <?php endif; ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title" style="font-size: <?php echo esc_attr($header_font_size); ?>px; " ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    <?php if (($enable_posted_on==true) || ($enable_author==true)) : ?>
                                        <div class="entry-meta">
                                            <?php 
                                                if (($enable_posted_on==true)) {
                                                    presazine_posted_on();
                                                } 
                                                if (($enable_author==true)) {
                                                    presazine_author();
                                                }
                                             ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <?php if ( ($enable_content==true)): ?>
                                        <div class="entry-content">
                                            <?php 
                                                $excerpt = presazine_the_excerpt( $excerpt_length );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                    
                                </div><!-- .entry-container -->
                            </div><!-- .post-item-wrapper -->
                    </article>

                <?php endwhile;?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div><!-- .section-content -->