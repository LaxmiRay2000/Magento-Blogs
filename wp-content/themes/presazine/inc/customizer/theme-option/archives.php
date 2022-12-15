<?php
/**
 * Home Page Options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Latest Latest Posts Section
$wp_customize->add_section( 'section_home_latest_posts',
	array(
		'title'      => __( 'Blog And Archive', 'presazine' ),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
		)
);

// Latest Posts title
$wp_customize->add_setting('theme_options[latest_posts_title]', 
	array(
	'default'           => $default['latest_posts_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_posts_title]', 
	array(
	'label'       => __('Static Blog Page Header Title', 'presazine'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_posts_title]',		
	'type'        => 'text'
	)
);

// Latest Posts title
$wp_customize->add_setting('theme_options[latest_section_posts_title]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_section_posts_title]', 
	array(
	'label'       => __('Blog Page Header Title', 'presazine'),
	'description' => __('This Setting works on the Latest posts option chosen as the Homepage Setting.', 'presazine'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_section_posts_title]',		
	'type'        => 'text'
	)
);

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[archive_content_align]', array(
	'default'           => $default['archive_content_align'],
	'sanitize_callback' => 'presazine_sanitize_select', 
) );

$wp_customize->add_control( 'theme_options[archive_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'presazine' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'radio',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'presazine' ), 
		'content-center'     => esc_html__( 'Center Side', 'presazine' ), 
		'content-left'     => esc_html__( 'Left Side', 'presazine' ), 
		'content-justify'     => esc_html__( 'Justify', 'presazine' ),
		)
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_category_enable]', array(
	'default'           => $default['latest_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'presazine' ),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[latest_read_more_text_enable]', array(
	'default'           => $default['latest_read_more_text_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[latest_read_more_text_enable]', array(
	'label'             => esc_html__( 'Enable Read More Text', 'presazine' ),
	'description' => __('Enable read more text inside content and disable read more button.', 'presazine'),
	'section'           => 'section_home_latest_posts',
	'type'              => 'checkbox',

) );


$wp_customize->add_setting('theme_options[latest_readmore_text]', 
	array(
	'default'           => $default['latest_readmore_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_readmore_text]', 
	array(
	'label'       => __('Button Label', 'presazine'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_readmore_text]',	
	'type'        => 'text'
	)
);
