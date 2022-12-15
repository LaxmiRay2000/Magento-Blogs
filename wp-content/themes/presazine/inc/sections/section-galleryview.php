<?php
    $galleryview_title       = presazine_get_option( 'galleryview_title' );
    $galleryview_content_type     = presazine_get_option( 'galleryview_content_type' );
    $enable_category     = presazine_get_option( 'galleryview_category_enable' );
    $enable_content     = presazine_get_option( 'galleryview_content_enable' );
    $enable_author     = presazine_get_option( 'galleryview_author_enable' );
    $enable_posted_on     = presazine_get_option( 'galleryview_posted_on_enable' );
    $number_of_galleryview_items  = presazine_get_option( 'number_of_galleryview_items' );
    $galleryview_category = presazine_get_option( 'galleryview_category' );
    $header_font_size = presazine_get_option( 'galleryview_font_size');
    $number_of_galleryview_column = presazine_get_option('number_of_galleryview_column');
    $content_align = presazine_get_option('galleryview_content_align');
    $excerpt_length =presazine_get_option( 'galleryview_excerpt_length');

    $see_more_txt     = presazine_get_option( 'galleryview_see_all_txt' );
    $see_more_url     = presazine_get_option( 'galleryview_see_all_url' );

    for( $i=1; $i<=$number_of_galleryview_items; $i++ ) :
        $galleryview_page_posts[] = absint(presazine_get_option( 'galleryview_page_'.$i ) );
        $galleryview_post_posts[] = absint(presazine_get_option( 'galleryview_post_'.$i ) );
    endfor;

?>
        <?php if( !empty($galleryview_title) && !empty($see_more_txt)):?>
            <div class="section-header">
                <?php if (!empty($galleryview_title)): ?>
                    <h2 class="section-title"><?php echo esc_html($galleryview_title);?></h2>
                <?php endif; ?>
            </div>       
        <?php endif;?>   

        <div class="galleryview-main-wrapper col-<?php echo esc_attr($number_of_galleryview_column); ?> ">
            <?php 
                $args = array (

                    'posts_per_page' =>absint( $number_of_galleryview_items ),              
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                    'ignore_sticky_posts' => true, 
                    );
                    if ( absint( $galleryview_category ) > 0 ) {
                        $args['cat'] = absint( $galleryview_category );
                    }
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                    $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>        
                        <article>
                            <div class="galleryview-wrapper">

                                    <div class="post-featured-image">
                                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'blog-thumbnails');?>');">
                                            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                            <?php $homepage_video_url = get_post_meta( get_the_ID(), 'presazine-video-url', true ); ?>
                                            <?php if (!empty($homepage_video_url)): ?>
                                               <a href="<?php the_permalink();?>"> <div class="homepage-video-icon"><i class="fa fa-play"></i></div></a>
                                            <?php endif ?>
                                        </div><!-- .featured-image -->
                                    </div>
                                <div class="entry-container <?php echo esc_attr($content_align); ?>">
                                    <?php if ( ($enable_category==true) ) : ?>
                                        <div class="entry-meta">
                                            <?php presazine_entry_meta(); ?>
                                        </div><!-- .entry-meta -->
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
                                    <?php if (($enable_content==true)) : ?>
                                        <div class="entry-content">
                                            <?php 
                                                $excerpt = presazine_the_excerpt( $excerpt_length );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                    
                                </div><!-- .entry-container -->
                            </div>
                        </article>

                    <?php endwhile;?>
                <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>