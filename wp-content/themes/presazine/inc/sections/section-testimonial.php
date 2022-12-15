<?php
    $testimonial_title       =presazine_get_option( 'testimonial_title' );
    $testimonial_subtitle       =presazine_get_option( 'testimonial_subtitle' );
    $testimonial_side_image       =presazine_get_option( 'testimonial_side_image' );
    $testimonial_viewall_text       =presazine_get_option( 'testimonial_viewall_text' );
    $testimonial_btn_url       =presazine_get_option( 'testimonial_btn_url' );
    $testimonial_content_type     = presazine_get_option( 'testimonial_content_type' );
    $enable_category     = presazine_get_option( 'testimonial_category_enable' );
    $enable_content     = presazine_get_option( 'testimonial_content_enable' );
    $enable_posted_on     = presazine_get_option( 'testimonial_posted_on_enable' );
    $testimonial_dots  = presazine_get_option( 'testimonial_dots_enable' );
    $testimonial_arrow  = presazine_get_option( 'testimonial_arrow_enable' );
    $number_of_testimonial_items  = presazine_get_option( 'number_of_testimonial_items' );
    $testimonial_category = presazine_get_option( 'testimonial_category' );
    $testimonial_layout = presazine_get_option('testimonial_layout_option');
    $testimonial_header_font_size =presazine_get_option( 'testimonial_title_font_size');
    $testimonial_content_font_size =presazine_get_option( 'testimonial_content_font_size');
    $testimonial_subtitle_font_size =presazine_get_option( 'testimonial_subtitle_font_size');
    $testimonial_section_header_font_size =presazine_get_option( 'testimonial_section_header_font_size');

    for( $i=1; $i<=$number_of_testimonial_items; $i++ ) :
        $testimonial_page_posts[] = absint(presazine_get_option( 'testimonial_page_'.$i ) );
        $testimonial_post_posts[] = absint(presazine_get_option( 'testimonial_post_'.$i ) );
    endfor;
?>
    <style>
        <?php if ($testimonial_subtitle_font_size != 0): ?>
            #testimonial .section-subtitle{
                font-size:<?php echo esc_html($testimonial_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($testimonial_section_header_font_size != 0): ?>
            #testimonial .section-title{
                font-size:<?php echo esc_html($testimonial_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($testimonial_header_font_size != 0): ?>
            #testimonial .entry-title{
                font-size:<?php echo esc_html($testimonial_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($testimonial_content_font_size != 0): ?>
            #testimonial .entry-content p{
                font-size:<?php echo esc_html($testimonial_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
<div class="section-header-wrapper clear">
    <div class="section-header">
        <?php if( !empty($testimonial_title)):?>
            <h2 class="section-title"><?php echo esc_html($testimonial_title);?></h2>
        <?php endif;?>
    </div>
</div><!-- .section-header-wrapper -->
<div class="testimonial-slider <?php if(!empty($testimonial_side_image)){ ?> modern-testimonial <?php } else{ ?> default-testimonial <?php } ?> " data-slick='{"slidesToShow": <?php echo ( !empty($testimonial_side_image) ) ? '1': '3'; ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": <?php if( true== $testimonial_dots){ echo 'true'; } else{ echo 'false'; } ?>, "arrows":<?php if( true== $testimonial_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": false }'>
    
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $testimonial_page_posts ),
            'post__in'      => $testimonial_page_posts,
            'orderby'       =>'post__in', 
        ); 
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>  
                <article>
                    <div class="entry-container">
                        <?php if ( ($enable_content==true)): ?>
                            <div class="entry-content">
                                <?php 
                                    $excerpt = presazine_the_excerpt( 35 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                    </div><!-- .entry-container -->
                    <div class="featured-image">
                        <img src="<?php the_post_thumbnail_url( 'full');?>">
                    </div><!-- .featured-image -->
                </article>         
            <?php endwhile;?>
        <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>
