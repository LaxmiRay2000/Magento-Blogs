<?php
/**
 * Hero options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Hero Author Section
$wp_customize->add_section( 'section_home_hero',
	array(
		'title'      => __( 'Hero Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_hero_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_hero_section]',
	array(
		'default'           => $default['disable_hero_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_hero_section]',
    array(
		'label' 			=> __('Enable/Disable Hero Section', 'presazine'),
		'section'    		=> 'section_home_hero',
		 'settings'  		=> 'theme_options[disable_hero_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[hero_content_align]', array(
	'default'           => $default['hero_content_align'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[hero_content_align]', array(
	'label'             => esc_html__( 'Choose Slider Content Align', 'presazine' ),
	'section'           => 'section_home_hero',
	'type'              => 'radio',
	'active_callback' => 'presazine_hero_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'presazine' ), 
		'content-center'     => esc_html__( 'Center Side', 'presazine' ), 
		'content-left'     => esc_html__( 'Left Side', 'presazine' ),
		)
) );

//Sensational Section title
$wp_customize->add_setting('theme_options[hero_title]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[hero_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_hero',   
	'settings'    => 'theme_options[hero_title]',
	'active_callback' => 'presazine_hero_active',		
	'type'        => 'text'
	)
);

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[hero_category_enable]', array(
	'default'           => $default['hero_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[hero_category_enable]', array(
	'label'             => esc_html__( 'Enable Slider Category', 'presazine' ),
	'section'           => 'section_home_hero',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_hero_active',
) );

for( $i=1; $i<=3; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[hero_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[hero_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_home_hero',   
		'settings'    => 'theme_options[hero_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => presazine_post_choices(),
		'active_callback' => 'presazine_hero_active',
		)
	);
}


// slider hr setting and control
	$wp_customize->add_setting( 'theme_options[hero_hr]', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Presazine_Customize_Horizontal_Line( $wp_customize, 'theme_options[hero_hr]',
		array(
			'section'         => 'section_home_hero',
			'active_callback' => 'presazine_hero_active',
			'type'			  => 'hr',
	) ) );


// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[hero_right_content_align]', array(
	'default'           => $default['hero_right_content_align'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[hero_right_content_align]', array(
	'label'             => esc_html__( 'Choose Right Content Align', 'presazine' ),
	'section'           => 'section_home_hero',
	'type'              => 'radio',
	'active_callback' => 'presazine_hero_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'presazine' ), 
		'content-center'     => esc_html__( 'Center Side', 'presazine' ), 
		'content-left'     => esc_html__( 'Left Side', 'presazine' ),
		)
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[hero_right_category_enable]', array(
	'default'           => $default['hero_right_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[hero_right_category_enable]', array(
	'label'             => esc_html__( 'Enable Right Post Category', 'presazine' ),
	'section'           => 'section_home_hero',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_hero_active',
) );


for( $i=1; $i<=4; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[hero_right_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[hero_right_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_home_hero',   
		'settings'    => 'theme_options[hero_right_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => presazine_post_choices(),
		'active_callback' => 'presazine_hero_active',
		)
	);
}