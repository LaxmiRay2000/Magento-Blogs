<?php
/**
 * Loader options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

$wp_customize->add_section( 'bloguide_loader',
	array(
		'title'            	=> esc_html__( 'Loader','bloguide' ),
		'description'      	=> esc_html__( 'Loader section options.', 'bloguide' ),
		'panel'            	=> 'bloguide_theme_options_panel',
	)
);

// Loader enable setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[loader_enable]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
		'default'           => $options['loader_enable'],
	)
);

$wp_customize->add_control(  new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[loader_enable]',
		array(
			'label'            	=> esc_html__( 'Enable loader', 'bloguide' ),
			'section'          	=> 'bloguide_loader',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);

// Loader icons setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[loader_icon]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_select',
		'default'			=> $options['loader_icon'],
	)
);

$wp_customize->add_control( 'bloguide_theme_options[loader_icon]',
	array(
		'label'           	=> esc_html__( 'Icon', 'bloguide' ),
		'section'         	=> 'bloguide_loader',
		'type'				=> 'select',
		'choices'			=> bloguide_get_spinner_list(),
		'active_callback' 	=> 'bloguide_is_loader_enable',
	)
);
