<?php
/**
 * Recent options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Recent Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'Recent Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable Recent Section', 'presazine'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

//Recent Section title
$wp_customize->add_setting('theme_options[about_title]', 
	array(
	'default'           => $default['about_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_title]',
	'active_callback' => 'presazine_about_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[about_category_enable]', array(
	'default'           => $default['about_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[about_category_enable]', array(
	'label'             => esc_html__( 'Enable Recent Category', 'presazine' ),
	'section'           => 'section_home_about',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_about_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[about_excerpt_length]', 
    array(
    'default'           => $default['about_excerpt_length'],
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',    
    'sanitize_callback' => 'presazine_sanitize_number_range'
    )
);

$wp_customize->add_control('theme_options[about_excerpt_length]', 
    array(
    'label'       => __('Excerpt Length', 'presazine'),
    'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
    'section'     => 'section_home_about',   
    'settings'    => 'theme_options[about_excerpt_length]',      
    'type'        => 'number',
    'active_callback' => 'presazine_about_active',
    'input_attrs' => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 1,
        ),
    )
);


// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[about_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Presazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[about_category]',
		array(
		'label'    => __( 'Select Category', 'presazine' ),
		'section'  => 'section_home_about',
		'settings' => 'theme_options[about_category]',	
		'active_callback' => 'presazine_about_active',		
		)
	)
);
