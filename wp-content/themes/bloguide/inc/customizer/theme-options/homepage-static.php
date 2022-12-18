<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Bloguide
* @since Bloguide 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[enable_frontpage_content]',
	array(
		'sanitize_callback'   => 'bloguide_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'bloguide_theme_options[enable_frontpage_content]',
	array(
		'label'       	=> esc_html__( 'Enable Content', 'bloguide' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'bloguide' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		'active_callback' => 'bloguide_is_static_homepage_enable',
	)
);