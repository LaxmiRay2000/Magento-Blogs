<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Presazine
 */

    $popular_title       = presazine_get_option( 'popular_title' );
    $popular_subtitle       = presazine_get_option( 'popular_subtitle' );
    $img_url = presazine_get_option( 'popular_custom_img');
    $popular_content_type     = presazine_get_option( 'popular_content_type' );
    $number_of_popular_items  = presazine_get_option( 'number_of_popular_items' );
    $popular_category = presazine_get_option( 'popular_category' );
    $excerpt_length =presazine_get_option( 'popular_excerpt_length');
    for( $i=1; $i<=$number_of_popular_items; $i++ ) :
        $popular_page_posts[] = absint(presazine_get_option( 'popular_page_'.$i ) );
        $popular_post_posts[] = absint(presazine_get_option( 'popular_post_'.$i ) );
    endfor;
    ?>
    <?php if( !empty($popular_title)):?>
        <div class="section-header">
            <?php if( !empty($popular_title)):?>
                <h2 class="section-title"><?php echo esc_html($popular_title);?></h2>
            <?php endif;?>
        </div>       
    <?php endif;?>       
    <div class="section-content clear">
        <?php 
            $args = array (

                'posts_per_page' =>absint( $number_of_popular_items ),              
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => 1,
                );
                if ( absint( $popular_category ) > 0 ) {
                    $args['cat'] = absint( $popular_category );
                }
            $circle_image = presazine_get_option( 'circle_image');
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); ?>  
                    <article class="<?php echo (has_post_thumbnail() ? 'has' : 'no'); ?>-post-thumbnail <?php echo ( ( 0 == $i ) || ( $i%4 == 0 ) ) ? 'full-width' : ''; ?>">
                        <div class="post-item-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-featured-image">
                                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'blog-thumbnails');?>');">
                                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->
                                </div>
                            <?php endif; ?>

                            <div class="entry-container">
                                    <span class="entry-meta">
                                        <?php presazine_entry_meta(); ?>
                                    </span><!-- .cat-links -->
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php 
                                        $excerpt = presazine_the_excerpt( $excerpt_length );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                                    <div class="entry-meta posted-on">
                                        <?php  
                                           presazine_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </div><!-- .post-item-wrapper -->
                    </article>
                <?php $i++; ?>
            
                <?php endwhile;?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>  
