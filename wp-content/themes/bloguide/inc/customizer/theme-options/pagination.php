<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'bloguide_pagination',
	array(
		'title'               	=> esc_html__('Pagination','bloguide'),
		'description'         	=> esc_html__( 'Pagination section options.', 'bloguide' ),
		'panel'               	=> 'bloguide_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[pagination_enable]',
	array(
		'sanitize_callback' 	=> 'bloguide_sanitize_switch_control',
		'default'             	=> $options['pagination_enable'],
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[pagination_enable]',
		array(
			'label'               	=> esc_html__( 'Pagination Enable', 'bloguide' ),
			'section'             	=> 'bloguide_pagination',
			'on_off_label' 			=> bloguide_switch_options(),
		)
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[pagination_type]',
	array(
		'sanitize_callback'   	=> 'bloguide_sanitize_select',
		'default'             	=> $options['pagination_type'],
	)
);

$wp_customize->add_control( 'bloguide_theme_options[pagination_type]',
	array(
		'label'               	=> esc_html__( 'Pagination Type', 'bloguide' ),
		'section'             	=> 'bloguide_pagination',
		'type'                	=> 'select',
		'choices'			  	=> bloguide_pagination_options(),
		'active_callback'	  	=> 'bloguide_is_pagination_enable',
	)
);
