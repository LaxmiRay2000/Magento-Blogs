<?php
/**
 * Author options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Author section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'Author Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_message_design_enable',
		)
);


$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Disable Author section', 'presazine'),
		'section'    		=> 'section_home_message',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Number of items
$wp_customize->add_setting('theme_options[message_excerpt_length]', 
	array(
	'default' 			=> $default['message_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[message_excerpt_length]', 
	array(
	'label'       => __('Content Excerpt Length', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'presazine_message_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

// Additional Information First Page
$wp_customize->add_setting('theme_options[message_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[message_page]', 
	array(
	'label'       => __('Select Page', 'presazine'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'presazine_message_active',
	)
);
