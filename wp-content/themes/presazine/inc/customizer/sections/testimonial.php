<?php
/**
 * Testimonial options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Testimonial Section
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_testimonial_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_testimonial_section]',
	array(
		'default'           => $default['disable_testimonial_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_testimonial_section]',
    array(
		'label' 			=> __('Enable/Disable Testimonial Section', 'presazine'),
		'section'    		=> 'section_home_testimonial',
		 'settings'  		=> 'theme_options[disable_testimonial_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add dots enable setting and control.
$wp_customize->add_setting( 'theme_options[testimonial_dots_enable]', array(
	'default'           => $default['testimonial_dots_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[testimonial_dots_enable]', array(
	'label'             => esc_html__( 'Enable Post Slider Slider Dots', 'presazine' ),
	'section'           => 'section_home_testimonial',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_testimonial_active',
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[testimonial_arrow_enable]', array(
	'default'           => $default['testimonial_arrow_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[testimonial_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Post Slider Slider Arrow', 'presazine' ),
	'section'           => 'section_home_testimonial',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_testimonial_active',
) );

//About Section title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',
	'active_callback' => 'presazine_testimonial_active',		
	'type'        => 'text'
	)
);

$number_of_testimonial_items = presazine_get_option( 'number_of_testimonial_items' );

for( $i=1; $i<=$number_of_testimonial_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[testimonial_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'presazine'), $i),
		'section'     => 'section_home_testimonial',   
		'settings'    => 'theme_options[testimonial_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'presazine_testimonial_active',
		)
	);

}