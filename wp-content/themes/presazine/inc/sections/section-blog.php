<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Presazine
 */
?>
<?php 
    $blog_post_title    = presazine_get_option( 'blog_title' );
    $blog_post_subtitle    = presazine_get_option( 'blog_subtitle' );
    $blog_category = presazine_get_option( 'blog_category' );
    $blog_content_type     = presazine_get_option( 'blog_content_type' );
    $blog_number    = presazine_get_option( 'blog_number' );
    $number_of_blog_column = presazine_get_option( 'number_of_blog_column' );
    $blog_content   = presazine_get_option( 'blog_content_enable' );
    $blog_category_enable   = presazine_get_option( 'blog_category_enable' );
    $blog_header_font_size = presazine_get_option( 'blog_font_size');
    $blog_content_font_size = presazine_get_option( 'blog_content_font_size');
    $blog_subtitle_font_size = presazine_get_option( 'blog_subtitle_font_size');
    $blog_section_header_font_size = presazine_get_option( 'blog_section_header_font_size');
    for( $i=1; $i<=$blog_number; $i++ ) :
        $blog_page_posts[] = absint(presazine_get_option( 'blog_page_'.$i ) );
        $blog_post_posts[] = absint(presazine_get_option( 'blog_post_'.$i ) );
    endfor;
?> 

    <style>
        <?php if ($blog_subtitle_font_size != 0): ?>
            #blog .section-subtitle{
                font-size:<?php echo esc_html($blog_subtitle_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($blog_section_header_font_size != 0): ?>
            #blog .section-title{
                font-size:<?php echo esc_html($blog_section_header_font_size); ?>px;
            }
        <?php endif ?>

        <?php if ($blog_header_font_size != 0): ?>
            #blog .entry-title{
                font-size:<?php echo esc_html($blog_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($blog_content_font_size != 0): ?>
            #blog .entry-content p{
                font-size:<?php echo esc_html($blog_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    <?php if( !empty($blog_post_title) || ! empty($blog_post_sub_title ) ):?>
        <div class="section-header">
            <?php if( !empty($blog_post_title)):?>
                <h2 class="section-title"><?php echo esc_html($blog_post_title);?></h2>
            <?php endif;?>
        
        </div>
    
    <?php endif;?>
  <div class="section-content clear col-<?php echo esc_attr( $number_of_blog_column ); ?>">
    <?php if(( $blog_content_type == 'blog_page') || ( $blog_content_type =='blog_post') || ( $blog_content_type =='blog_category') ) { ?>
            <?php if( $blog_content_type == 'blog_page' ) : ?>
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $blog_page_posts ),
                    'post__in'      => $blog_page_posts,
                    'orderby'       =>'post__in', 
                ); 
            endif; 
            if( $blog_content_type == 'blog_post' ) :
                $args = array (
                    'post_type'     => 'post',
                    'post_per_page' => count( $blog_post_posts ),
                    'post__in'      => $blog_post_posts,
                    'orderby'       =>'post__in',  
                ); 
            endif;
            if( $blog_content_type == 'blog_category' ) :
                $args = array (

                    'posts_per_page' =>absint( $blog_number ),              
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                    );
                    if ( absint( $blog_category ) > 0 ) {
                        $args['cat'] = absint( $blog_category );
                    }
            endif;
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <article>
                        <?php $blog_image_buttom    = presazine_get_option( 'image_buttom' );
                        if ( true == $blog_image_buttom ) {
                            $classes = 'image-buttom';
                        } else {
                            $classes = 'image-top';
                        }?>
                        <div class="blog-item-wrapper <?php echo esc_attr( $classes ); ?>">
                            <?php if(has_post_thumbnail()):?>
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                                    <a href="<?php the_permalink();?>"></a>  
                                </div>
                            <?php endif;?>

                            <div class="entry-container">

                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </h2>
                                </header>
                                <?php if ($blog_content == true): ?>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = presazine_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <?php if ($blog_category_enable == true): ?>
                                    <div class="entry-meta">                 
                                        <?php presazine_entry_meta();?>
                                    </div><!-- .entry-meta -->
                                <?php endif; ?>
                                <?php $readmore_text = presazine_get_option( 'readmore_text' );
                                if (!empty ($readmore_text)) { ?>

                                  <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                                <?php } ?>
                            </div><!-- .entry-container -->
                        </div><!-- .post-item -->
                    </article>
        <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_postdata(); 
    }?>
  </div>