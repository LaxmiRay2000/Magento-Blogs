<?php
/**
 * Header options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Header Author Section
$wp_customize->add_section( 'section_home_header',
	array(
		'title'      => __( 'Header Options', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[header_layout_options]', array(
	'default'           => $default['header_layout_options'],
	'sanitize_callback' => 'presazine_sanitize_select',
	'type'				=> 'theme_mod',
) );

$wp_customize->add_control( 'theme_options[header_layout_options]', array(
	'label'             => esc_html__( 'Choose Header Layout', 'presazine' ),
	'section'           => 'section_home_header',
	'type'              => 'radio',
	'choices'				=> array( 
		'header-one'     => esc_html__( 'Header One(Premium Feature)', 'presazine' ), 
		'header-two'     => esc_html__( 'Header Two(Premium Feature)', 'presazine' ), 
		'header-three'     => esc_html__( 'Header Three', 'presazine' ),
		)
) );

$wp_customize->add_setting( 'theme_options[disable_header_background_section]',
	array(
		'default'           => $default['disable_header_background_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_header_background_section]',
    array(
		'label' 			=> __('Enable/Disable Header Background Image', 'presazine'),
		'section'    		=> 'section_home_header',
		 'settings'  		=> 'theme_options[disable_header_background_section]',
		'on_off_label' 		=> presazine_switch_options(),
		'active_callback'	=> 'presazine_header_background_image'
    )
) );

// header title setting and control
$wp_customize->add_setting( 'theme_options[header_background_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[header_background_image]', array(
	'label'           	=> esc_html__( 'Select Header Background', 'presazine' ),
	'section'        	=> 'section_home_header',
	'settings'    		=> 'theme_options[header_background_image]',	
	'active_callback' 	=> 'presazine_header_background_image',
) ) );

// header Ads image setting and control
$wp_customize->add_setting( 'theme_options[header_ads_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[header_ads_image]', array(
	'label'           	=> esc_html__( 'Select Header Ads Image', 'presazine' ),
	'section'        	=> 'section_home_header',
	'settings'    		=> 'theme_options[header_ads_image]',
	'active_callback'	=> 'presazine_header_three',
) ) );

// Header Ads Url
$wp_customize->add_setting('theme_options[header_ads_image_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('theme_options[header_ads_image_url]', 
	array(
	'label'       => esc_html__('Header Ads Url', 'presazine'),
	'section'     => 'section_home_header',   
	'settings'    => 'theme_options[header_ads_image_url]',	
	'type'        => 'url',
	'active_callback'	=> 'presazine_header_three',
	)
);
