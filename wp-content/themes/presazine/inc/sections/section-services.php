<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Dreamy Portfolio
 */

    $services_title       =presazine_get_option( 'services_title' );
    $services_subtitle       =presazine_get_option( 'services_subtitle' );
    $services_background_image       =presazine_get_option( 'services_background_image' );
    $disable_services_background     =presazine_get_option( 'disable_services_background' );
    $services_content_type     =presazine_get_option( 'services_content_type' );
    $number_of_services_column =presazine_get_option( 'number_of_services_column' );
    $number_of_services_items  =presazine_get_option( 'number_of_services_items' );
    $services_category =presazine_get_option( 'services_category' );
    $disable_services_icon =presazine_get_option( 'disable_services_icon' );
    $btn_url =presazine_get_option( 'services_btn_url');
    $btn_text =presazine_get_option( 'services_btn_text');
    $services_content   =presazine_get_option( 'services_content_enable' );
    $services_header_font_size =presazine_get_option( 'services_font_size');
    $services_content_font_size =presazine_get_option( 'services_content_font_size');
    $services_subtitle_font_size =presazine_get_option( 'services_subtitle_font_size');
    $services_section_header_font_size =presazine_get_option( 'services_section_header_font_size');
    $excerpt_length =presazine_get_option( 'services_excerpt_length');
    $services_content_align       =presazine_get_option( 'services_content_align' );
    for( $i=1; $i<=$number_of_services_items; $i++ ) :
        $services_page_posts[] = absint(presazine_get_option( 'services_page_'.$i ) );
        $services_post_posts[] = absint(presazine_get_option( 'services_post_'.$i ) );
        $readmore_text   =presazine_get_option( 'services_custom_text_' . $i );
        $services_icon   =presazine_get_option( 'services_icon_'.$i );
    endfor;
    ?> 
    <style>
        <?php if ($services_subtitle_font_size != 0): ?>
            #services .section-subtitle{
                font-size:<?php echo esc_html($services_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($services_section_header_font_size != 0): ?>
            #services .section-title{
                font-size:<?php echo esc_html($services_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($services_header_font_size != 0): ?>
            #services .entry-title{
                font-size:<?php echo esc_html($services_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($services_content_font_size != 0): ?>
            #services .entry-content p{
                font-size:<?php echo esc_html($services_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
<div class="left-services">
    <?php if( !empty($services_title) ):?>
        <div class="section-header">
            <?php if( !empty($services_title)):?>
                <h2 class="section-title"><?php echo esc_html($services_title);?></h2>
            <?php endif;?>
        </div>  
    <?php endif; ?>
    
    <div class="section-content col-<?php echo esc_attr( $number_of_services_column ); ?>">
        
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $services_page_posts ),
            'post__in'      => $services_page_posts,
            'orderby'       =>'post__in',
            
        ); 

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        <article>
                            <div class="services-item-wrapper">
                            <?php 
                             $cloud_enable =presazine_get_option('disable_homepage_cloud_section');
                             $icon_cloud =presazine_get_option('disable_icon_cloud');
                            $services_icon =presazine_get_option( 'services_icon_'.$i );
                            if ( ( true == $disable_services_icon ) && !empty($services_icon) ) { ?>
                                <div class="icon-container">
                                    <a href="<?php the_permalink();?>">
                                    <i class="fa <?php echo esc_attr( $services_icon)?>"></i>
                                </a>
                                </div>
                            <?php  } ?>
                            <?php if ( ( has_post_thumbnail() ) && ( false == $disable_services_icon )  ) : ?>
                                <div class="featured-image">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                            <div class="services-content <?php echo esc_attr($services_content_align); ?>">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                                <?php if ($services_content == true): ?>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = presazine_the_excerpt( $excerpt_length );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif ?>
                            </div>
                          </div>
                        </article>
                <?php endwhile;?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div> 
</div>
<?php if (!empty($services_background_image) && true==$disable_services_background): ?>  
    <div class="right-services">
        <div class="right-featured-image">
            <img src="<?php echo esc_url($services_background_image); ?>">
        </div>
    </div>
<?php endif ?>