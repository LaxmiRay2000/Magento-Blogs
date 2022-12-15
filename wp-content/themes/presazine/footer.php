<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Presazine
 */
    $homepage_design_layout     = presazine_get_option( 'homepage_design_layout_options' );
/**
 * Hooked - presazine_instagram_section -10
 */
if ((is_home() || is_front_page()) && $homepage_design_layout=='home-normal-blog') {
	do_action( 'presazine_action_instagram' );
}

/**
 *
 * @hooked presazine_footer_start
 */
do_action( 'presazine_action_before_footer' );

/**
 * Hooked - presazine_footer_top_section -10
 * Hooked - presazine_footer_section -20
 */
do_action( 'presazine_action_footer' );

/**
 * Hooked - presazine_footer_end. 
 */
do_action( 'presazine_action_after_footer' );

wp_footer(); ?>

</body>  
</html>