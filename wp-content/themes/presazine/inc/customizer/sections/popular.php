<?php
/**
 * Popular Posts options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Popular Section
$wp_customize->add_section( 'section_home_popular',
	array(
		'title'      => __( 'Popular Posts ', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_popular_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_popular_section]',
	array(
		'default'           => $default['disable_popular_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_popular_section]',
    array(
		'label' 			=> __('Enable/Disable Popular Section', 'presazine'),
		'section'    		=> 'section_home_popular',
		 'settings'  		=> 'theme_options[disable_popular_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

//Popular Section title
$wp_customize->add_setting('theme_options[popular_title]', 
	array(
	'default'           => $default['popular_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[popular_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_popular',   
	'settings'    => 'theme_options[popular_title]',
	'active_callback' => 'presazine_popular_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[popular_excerpt_length]', 
	array(
	'default' 			=> $default['popular_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[popular_excerpt_length]', 
	array(
	'label'       => __('Excerpt Length', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
	'section'     => 'section_home_popular',   
	'settings'    => 'theme_options[popular_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'presazine_popular_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);


// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[popular_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Presazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[popular_category]',
		array(
		'label'    => __( 'Select Category', 'presazine' ),
		'section'  => 'section_home_popular',
		'settings' => 'theme_options[popular_category]',	
		'active_callback' => 'presazine_popular_active',		
		'priority' => 100,
		)
	)
);

