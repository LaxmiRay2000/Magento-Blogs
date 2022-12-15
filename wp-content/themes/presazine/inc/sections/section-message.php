<?php 
/**
 * Template part for displaying Author Section
 *
 *@package Presazine
 */
    $message_content_type     = presazine_get_option( 'message_content_type' );
    $message_content_enable       = presazine_get_option( 'message_content_enable' );
    $message_excerpt_enable       = presazine_get_option( 'message_excerpt_enable' );
    $message_header_font_size = presazine_get_option( 'message_font_size');
    $message_content_font_size = presazine_get_option( 'message_content_font_size');
    $excerpt_length =presazine_get_option( 'message_excerpt_length');
    $author_show_social =presazine_get_option( 'author_social_link');

?>
    <style>
        <?php if ($message_header_font_size != 0): ?>
            #message .entry-title{
                font-size:<?php echo esc_html($message_header_font_size); ?>px;
            }
        <?php endif ?>
        <?php if ($message_content_font_size != 0): ?>
            #message .section-content{
                font-size:<?php echo esc_html($message_content_font_size); ?>px;
            }
        <?php endif ?>
    </style>
    
    <?php 
    $message_id = presazine_get_option( 'message_page' );
        $args = array (
        'post_type'     => 'page',
        'posts_per_page' => 1,
        'p' => $message_id,
        
    ); 
    $the_query = new WP_Query( $args );

    // The Loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
    ?>  
        <div class="section-content">
           <?php if(has_post_thumbnail()) : ?>
                <div class="author-thumbnail">
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                </div><!-- .author-thumbnail -->
            <?php endif; ?>
            <div class="entry-container">

                <div class="entry-header">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                </div><!-- .section-header -->

                <div class="section-content">
                    <?php  
                        $excerpt = presazine_the_excerpt( $excerpt_length );
                        echo wp_kses_post( wpautop( $excerpt ) );
                    ?>
                </div><!-- .entry-content -->
            </div>
        </div><!-- .section-content --> 
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>