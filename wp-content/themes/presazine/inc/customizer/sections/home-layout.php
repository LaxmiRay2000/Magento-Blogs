<?php
/**
 * Category options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Category Author Section
$wp_customize->add_section( 'section_home_layout',
	array(
		'title'      => __( 'Homepage Layout', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[homepage_layout_options]', array(
	'default'           => $default['homepage_layout_options'],
	'sanitize_callback' => 'presazine_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[homepage_layout_options]', array(
	'label'             => esc_html__( 'Choose HomePage Color Layout', 'presazine' ),
	'section'           => 'section_home_layout',
	'type'              => 'radio',
	'choices'				=> array( 
		'lite-layout'     => esc_html__( 'Lite HomePage', 'presazine' ), 
		'dark-layout'     => esc_html__( 'Dark HomePage (Premium Feature)', 'presazine' ),
		)
) );



$wp_customize->add_setting('theme_options[homepage_design_layout_options]', 
	array(
	'default' 			=> $default['homepage_design_layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[homepage_design_layout_options]', 
	array(
	'label'             => esc_html__( 'Choose HomePage Layout', 'presazine' ),
	'description' => __('Save & Refresh the customizer to see its effect.', 'presazine'),
	'section'     => 'section_home_layout',   
	'settings'    => 'theme_options[homepage_design_layout_options]',		
	'type'        => 'select',
	'choices'	  => array(
		'home-magazine'     => esc_html__( 'Magazine HomePage', 'presazine' ),
		'home-blog'     => esc_html__( 'Blog HomePage(Premium Feature)', 'presazine' ),
		'home-business'     => esc_html__( 'Business HomePage(Premium Feature)', 'presazine' ),
		'home-normal-magazine'     => esc_html__( 'Normal Magazine HomePage(Premium Feature)', 'presazine' ), 
		'home-normal-blog'     => esc_html__( 'Normal Blog HomePage(Premium Feature)', 'presazine' ),
		),
	)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[homepage_sidebar_position]', array(
	'default'           => $default['homepage_sidebar_position'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[homepage_sidebar_position]', array(
	'label'             => esc_html__( 'Choose HomePage sidebar Layout', 'presazine' ),
	'section'           => 'section_home_layout',
	'type'              => 'radio',
	'active_callback'	=> 'presazine_home_magazine_enable',
	'choices'				=> array( 
		'home-no-sidebar'     => esc_html__( 'No Sidebar', 'presazine' ), 
		'home-right-sidebar'     => esc_html__( 'Right Sidebar', 'presazine' ),
		)
) );

