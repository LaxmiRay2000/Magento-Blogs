<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Presazine

 */

    $team_title       = presazine_get_option( 'team_title' );
    $team_subtitle       = presazine_get_option( 'team_subtitle' );
    $number_of_column = presazine_get_option( 'number_of_column' );
    $number_of_items  = presazine_get_option( 'number_of_items' );
    $team_content_type     = presazine_get_option( 'team_content_type' );
    $team_category = presazine_get_option( 'team_category' );
    $team_content   = presazine_get_option( 'team_content_enable' );
    $team_header_font_size = presazine_get_option( 'team_font_size');
    $team_content_font_size = presazine_get_option( 'team_content_font_size');
    $team_subtitle_font_size = presazine_get_option( 'team_subtitle_font_size');
    $team_section_header_font_size = presazine_get_option( 'team_section_header_font_size');

    for( $i=1; $i<=$number_of_items; $i++ ) :
        $team_page_posts[] = absint(presazine_get_option( 'team_page_'.$i ) );
        $team_post_posts[] = absint(presazine_get_option( 'team_post_'.$i ) );
    endfor;
    ?>
    <style>
        <?php if ($team_subtitle_font_size != 0): ?>
            #team .section-subtitle{
                font-size:<?php echo esc_html($team_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($team_section_header_font_size != 0): ?>
            #team .section-title{
                font-size:<?php echo esc_html($team_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($team_header_font_size != 0): ?>
            #team .entry-title{
                font-size:<?php echo esc_html($team_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($team_content_font_size != 0): ?>
            #team .entry-content p{
                font-size:<?php echo esc_html($team_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    <div class=" team-section relative">
       	<div class="wrapper">
            <?php if (!empty($team_title)) : ?>
                <div class="section-header">
                    <?php if(!empty($team_title)):?>
                        <h2 class="section-title"><?php echo esc_html($team_title); ?></h2>
                    <?php endif;  ?>
                </div><!-- .section-header -->
            <?php endif;       
            ?>
                            
            <div class="section-content col-<?php echo esc_attr( $number_of_column); ?>">
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $team_page_posts ),
                    'post__in'      => $team_page_posts,
                    'orderby'       =>'post__in', 
                ); 
                $loop = new WP_Query($args);                         
                if ( $loop->have_posts() ) :
                    $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        <article class="hentry ">
                            <div class="post-wrapper">
                                <div class="team-image" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-link" ></a>
                                    <div class="overlay"></div>
                                </div><!-- .team-image -->             
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </header>
                                    <?php if ($team_content == true): ?>
                                        <div class="entry-content">
                                            <?php
                                                $excerpt = presazine_the_excerpt( 20 );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            ?>
                                        </div><!-- .entry-content -->
                                    <?php endif ?>
                                </div><!-- .entry-container --> 
                            </div><!-- .post-wrapper -->
                        </article>
                        <?php endwhile;
                    endif;
                wp_reset_postdata(); ?>
            </div><!-- .section-content -->
        </div><!-- .wrapper -->
    </div><!-- #team-posts -->
