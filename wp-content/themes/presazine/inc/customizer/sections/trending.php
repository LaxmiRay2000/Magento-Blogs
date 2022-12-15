<?php
/**
 * Trending options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Trending Author Section
$wp_customize->add_section( 'section_home_trending',
	array(
		'title'      => __( 'Trending Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_trending_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_trending_section]',
	array(
		'default'           => $default['disable_trending_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_trending_section]',
    array(
		'label' 			=> __('Enable/Disable Trending Section', 'presazine'),
		'section'    		=> 'section_home_trending',
		 'settings'  		=> 'theme_options[disable_trending_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[trending_content_align]', array(
	'default'           => $default['trending_content_align'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[trending_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'presazine' ),
	'section'           => 'section_home_trending',
	'type'              => 'radio',
	'active_callback' => 'presazine_trending_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'presazine' ), 
		'content-center'     => esc_html__( 'Center Side', 'presazine' ), 
		'content-left'     => esc_html__( 'Left Side', 'presazine' ),
		)
) );

//Sensational Section title
$wp_customize->add_setting('theme_options[trending_title]', 
	array(
	'default'           => $default['trending_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[trending_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_trending',   
	'settings'    => 'theme_options[trending_title]',
	'active_callback' => 'presazine_trending_active',		
	'type'        => 'text'
	)
);

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[trending_category_enable]', array(
	'default'           => $default['trending_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[trending_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'presazine' ),
	'section'           => 'section_home_trending',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_trending_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[trending_excerpt_length]', 
	array(
	'default' 			=> $default['trending_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[trending_excerpt_length]', 
	array(
	'label'       => __('Excerpt Length', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
	'section'     => 'section_home_trending',   
	'settings'    => 'theme_options[trending_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'presazine_trending_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

$number_of_trending_items = presazine_get_option( 'number_of_trending_items' );

for( $i=1; $i<=$number_of_trending_items; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[trending_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[trending_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_home_trending',   
		'settings'    => 'theme_options[trending_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => presazine_post_choices(),
		'active_callback' => 'presazine_trending_active',
		)
	);
}