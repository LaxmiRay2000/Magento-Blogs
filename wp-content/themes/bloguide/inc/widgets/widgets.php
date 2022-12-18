<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Bloguide
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */

/*

/*
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/editors-choice.php';
require get_template_directory() . '/inc/widgets/popular-post-widget.php';
/*

/**
 * Register widgets
 */
function bloguide_register_widgets() {

	register_widget( 'Bloguide_Editors_Choice' );
	register_widget( 'Bloguide_Popular_Post' );

}
add_action( 'widgets_init', 'bloguide_register_widgets' );