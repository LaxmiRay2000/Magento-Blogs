<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'bloguide_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','bloguide' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'bloguide' ),
		'panel'             => 'bloguide_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'bloguide' ),
			'section'           => 'bloguide_single_post_section',
			'on_off_label' 		=> bloguide_hide_options(),
		)
	)
);

// Archive author meta setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[single_post_hide_author]',
	array(
		'default'           => $options['single_post_hide_author'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[single_post_hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'bloguide' ),
			'section'           => 'bloguide_single_post_section',
			'on_off_label' 		=> bloguide_hide_options(),
		)
	)
);
