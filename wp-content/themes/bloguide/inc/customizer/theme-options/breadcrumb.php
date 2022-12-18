<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

$wp_customize->add_section( 'bloguide_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','bloguide' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'bloguide' ),
		'panel'             => 'bloguide_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'bloguide' ),
			'section'          	=> 'bloguide_breadcrumb',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'bloguide_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'bloguide' ),
		'active_callback' 	=> 'bloguide_is_breadcrumb_enable',
		'section'          	=> 'bloguide_breadcrumb',
	)
);
