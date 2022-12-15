<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Presazine
 */

    $about_title    = presazine_get_option( 'about_title' );
    $about_layout     = presazine_get_option( 'about_layout_option' );
    $about_content_enable     = presazine_get_option( 'about_content_enable' );
    $about_category_enable     = presazine_get_option( 'about_category_enable' );
    $enable_comment     = presazine_get_option( 'about_comment_enable' );
    $enable_author    = presazine_get_option( 'about_author_enable' );
    $enable_posted_on     = presazine_get_option( 'about_posted_on_enable' );
    $about_content_type     = presazine_get_option( 'about_content_type' );
    $number_of_about_items  = presazine_get_option( 'number_of_about_items' );
    $about_column  = presazine_get_option( 'number_of_about_column' );
    $about_category = presazine_get_option( 'about_category' );
    $excerpt_length =presazine_get_option( 'about_excerpt_length');

    for( $i=1; $i<=$number_of_about_items; $i++ ) :
        $about_page_posts[] = absint(presazine_get_option( 'about_page_'.$i ) );
        $about_post_posts[] = absint(presazine_get_option( 'about_post_'.$i ) );
    endfor;

    ?>
    <?php if( !empty($about_title) ):?>
        <div class="section-header">
            <?php if( !empty($about_title)):?>
                <h2 class="section-title"><?php echo esc_html($about_title);?></h2>
            <?php endif;?>
        </div>
    <?php endif;?>
<div class="section-content col-<?php echo esc_attr($about_column); ?> <?php echo esc_attr($about_layout); ?>">

    <?php
    $args = array (

        'posts_per_page' =>absint( $number_of_about_items ),              
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => 1,
        );
        if ( absint( $about_category ) > 0 ) {
            $args['cat'] = absint( $about_category );
        }

    $loop = new WP_Query($args);                        
    if ( $loop->have_posts() ) :
        $i=0;  
        while ($loop->have_posts()) : $loop->the_post(); $i++;?>

            <article>
                <?php if ($about_layout=='about-gallery-view'): ?>
                    <div class="about-item-wrapper" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">                    
                        <div class="entry-container">
                            <h4><a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a></h4>
                        </div><!-- .entry-container -->
                    </div><!-- .about-item-wrapper -->
                <?php endif; ?>
                <?php if ($about_layout=='about-post-view'): ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image">
                            <div class="about-item-wrapper featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>                    
                            </div><!-- .about-item-wrapper -->
                        </div>
                    <?php endif; ?>
                    <div class="entry-container">
                        <div class="entry-header">
                            <h4 class="entry-title"><a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a></h4>
                        </div>
                        <?php if (($enable_posted_on ==true || ($enable_comment ==true) || ($enable_author ==true))): ?>
                            <div class="entry-meta posted-on">
                                <?php 
                                    if ($enable_comment ==true):
                                        presazine_comment(); 
                                    endif;
                                ?>
                                <?php 
                                    if ($enable_author ==true):
                                        presazine_author(); 
                                    endif; ?>
                                <?php
                                    if ($enable_posted_on ==true):
                                        presazine_posted_on(); 
                                    endif; 
                                    ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                        <?php if ($about_content_enable == true): ?>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = presazine_the_excerpt( $excerpt_length );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                            <?php if ($about_category_enable == true): ?>
                                <div class="entry-meta">                 
                                    <?php presazine_entry_meta();?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                    </div><!-- .entry-container -->
                <?php endif; ?>
            </article>

        <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>  