<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'bloguide_menu',
	array(
		'title'             => esc_html__('Header Menu','bloguide'),
		'description'       => esc_html__( 'Header Menu options.', 'bloguide' ),
		'panel'             => 'nav_menus',
	)
);

// Menu sticky setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[menu_sticky]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
		'default'           => $options['menu_sticky'],
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[menu_sticky]',
		array(
			'label'             => esc_html__( 'Make Menu Sticky', 'bloguide' ),
			'section'           => 'bloguide_menu',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);
