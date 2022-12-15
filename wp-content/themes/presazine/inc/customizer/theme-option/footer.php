<?php 
/**
 * Theme Options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Option', 'presazine'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'presazine_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'presazine' ),
	'section'  => 'section_footer',
	'type'     => 'text', 
	'priority' => 10,
	)
);

// scroll top visible
$wp_customize->add_setting( 'theme_options[scroll_top_visible]',
	array(
		'default'           => $default['scroll_top_visible'],
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'presazine' ),
		'section'    			=> 'section_footer',
		'on_off_label' 			=> presazine_switch_options(),
		'priority' 				=>20,
    )
) );
