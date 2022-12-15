<?php
/**
 * Presazine metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Presazine theme
 *
 * @package Presazine
 * @since Presazine 0.1
 */

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/about-meta.php'; 

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/video-url.php'; 




if ( ! function_exists( 'presazine_custom_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function presazine_custom_meta() {
        $post_type = array( 'post', 'page' );

        // POST Subtitle 
        add_meta_box( 'presazine_video_url', esc_html__( 'Video Links', 'presazine' ), 'presazine_video_url_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'presazine_custom_meta' );


if ( ! function_exists( 'presazine_about_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function presazine_about_meta() {
        $post_type = array( 'post' );

        // POST Subtitle 
        add_meta_box( 'presazine_about_meta', esc_html__( 'About Meta', 'presazine' ), 'presazine_about_meta_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'presazine_about_meta' );


