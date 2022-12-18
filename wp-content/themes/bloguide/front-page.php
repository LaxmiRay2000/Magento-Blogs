<?php
/**
 * The template for displaying al pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

get_header(); 
		// Call home if Homepage setting is set to latest posts.

	if ( bloguide_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( bloguide_is_frontpage() ) {
		
		$options = bloguide_get_theme_options();

		$sorted = explode( ',' , $options['default_sortable'] );
		
		foreach ( $sorted as $section ) {
			add_action( 'bloguide_primary_content', 'bloguide_add_'. $section .'_section' );
		}
		do_action( 'bloguide_primary_content' );

		if (true === apply_filters( 'bloguide_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();