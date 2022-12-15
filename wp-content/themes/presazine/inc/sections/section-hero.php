<?php
    $hero_content_type     = presazine_get_option( 'hero_content_type' );
    $hero_title       = presazine_get_option( 'hero_title' );
    $enable_category     = presazine_get_option( 'hero_category_enable' );
    $enable_content     = presazine_get_option( 'hero_content_enable' );
    $enable_author     = presazine_get_option( 'hero_author_enable' );
    $enable_posted_on     = presazine_get_option( 'hero_posted_on_enable' );
    $hero_dots  = presazine_get_option( 'hero_dots_enable' );
    $hero_arrow  = presazine_get_option( 'hero_arrow_enable' );
    $number_of_hero_items  = presazine_get_option( 'number_of_hero_items' );
    $hero_category = presazine_get_option( 'hero_category' );
    $header_font_size = presazine_get_option( 'hero_font_size');
    $hero_layout = presazine_get_option('hero_layout_option');
    $content_align = presazine_get_option('hero_content_align');
    $excerpt_length =presazine_get_option( 'hero_excerpt_length');
    for( $i=1; $i<=$number_of_hero_items; $i++ ) :
        $hero_page_posts[] = absint(presazine_get_option( 'hero_page_'.$i ) );
        $hero_post_posts[] = absint(presazine_get_option( 'hero_post_'.$i ) );
    endfor;


    $hero_right_content_type     = presazine_get_option( 'hero_right_content_type' );
    $enable_right_category     = presazine_get_option( 'hero_right_category_enable' );
    $enable_right_content     = presazine_get_option( 'hero_right_content_enable' );
    $enable_right_author     = presazine_get_option( 'hero_right_author_enable' );
    $enable_right_posted_on     = presazine_get_option( 'hero_right_posted_on_enable' );
    $number_of_hero_right_items  = presazine_get_option( 'number_of_hero_right_items' );
    $hero_right_category = presazine_get_option( 'hero_right_category' );
    $header_right_font_size = presazine_get_option( 'hero_right_font_size');
    $hero_right_layout = presazine_get_option('hero_right_layout_option');
    $content_right_align = presazine_get_option('hero_right_content_align');
    $right_excerpt_length =presazine_get_option( 'hero_right_excerpt_length');

    for( $i=1; $i<=$number_of_hero_right_items; $i++ ) :
        $hero_right_page_posts[] = absint(presazine_get_option( 'hero_right_page_'.$i ) );
        $hero_right_post_posts[] = absint(presazine_get_option( 'hero_right_post_'.$i ) );
    endfor;

?>
<?php if( !empty($hero_title)):?>
    <div class="section-header">
        <h2 class="section-title"><?php echo esc_html($hero_title);?></h2>
    </div>       
<?php endif;?>  
<div class="section-content clear">
    <div class="hero-left">
        <div class="hero-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php if( true== $hero_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": true }'>
            <?php 
                $args = array (
                    'post_type'     => 'post',
                    'post_per_page' => count( $hero_post_posts ),
                    'post__in'      => $hero_post_posts,
                    'orderby'       =>'post__in', 
                    'ignore_sticky_posts' => true, 
                ); 
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                    $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
                        <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>">
                            <div class="post-item-wrapper">
                                    
                                        <div class="post-featured-image">
                                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'presazine-blog');?>');">
                                                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                                <?php $homepage_video_url = get_post_meta( get_the_ID(), 'presazine-video-url', true ); ?>
                                                <?php if (!empty($homepage_video_url)): ?>
                                                   <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                                <?php endif ?>
                                            </div><!-- .featured-image -->
                                        </div>
                                    

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
                                                    $excerpt = presazine_the_excerpt( $excerpt_length);
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
    </div>
    <div class="hero-right col-2">
        <?php 
            $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $hero_right_post_posts ),
                'post__in'      => $hero_right_post_posts,
                'orderby'       =>'post__in', 
                'ignore_sticky_posts' => true, 
            ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
                    <article>
                        <div class="post-item-wrapper">

                                    <div class="post-featured-image">
                                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'presazine-blog');?>');">
                                            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                            <?php $homepage_video_url = get_post_meta( get_the_ID(), 'presazine-video-url', true ); ?>
                                            <?php if (!empty($homepage_video_url)): ?>
                                               <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                            <?php endif ?>
                                        </div><!-- .featured-image -->
                                    </div>

                                <div class="entry-container <?php echo esc_attr($content_right_align); ?>">
                                    <?php if ( ($enable_right_category==true) ) : ?>
                                        
                                        <?php presazine_entry_meta(); ?>
                                    <?php endif; ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title" style="font-size: <?php echo esc_attr($header_right_font_size); ?>px; " ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    <?php if (($enable_right_posted_on==true) || ($enable_right_author==true)) : ?>
                                        <div class="entry-meta">
                                            <?php 
                                                if (($enable_right_posted_on==true)) {
                                                    presazine_posted_on();
                                                } 
                                                if (($enable_right_author==true)) {
                                                    presazine_author();
                                                }
                                             ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <?php if ( ($enable_right_content==true)): ?>
                                        <div class="entry-content">
                                            <?php 
                                                $excerpt = presazine_the_excerpt( $right_excerpt_length);
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