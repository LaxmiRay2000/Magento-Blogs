<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'bloguide_hero_banner_section',
	array(
		'title'             => esc_html__( 'Hero Banner','bloguide' ),
		'description'       => esc_html__( 'Hero Banner Section options.', 'bloguide' ),
		'panel'             => 'bloguide_front_page_panel',
	)
);

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_section_enable]', 
	array(
		'default'			=> 	$options['hero_banner_section_enable'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[hero_banner_section_enable]',
		array(
			'label'             => esc_html__( 'Hero Banner Section Enable', 'bloguide' ),
			'section'           => 'bloguide_hero_banner_section',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);

// hero_banner_sub title setting and control
$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_sub_title]',
	array(
		'default'       		=> $options['hero_banner_sub_title'],
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'bloguide_theme_options[hero_banner_sub_title]',
    array(
		'label'      			=> esc_html__( 'Section Sub Title', 'bloguide' ),
		'section'    			=> 'bloguide_hero_banner_section',
		'type'		 			=> 'text',
		'active_callback'		=> 'bloguide_is_hero_banner_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[hero_banner_sub_title]',
		array(
			'selector'            => '#bloguide_hero_banner_section .section-header span',
			'settings'            => 'bloguide_theme_options[hero_banner_sub_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'bloguide_hero_banner_sub_title_partial',
		)
	);
}

// Hero Banner content type control and setting
$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_content_type]',
	array(
		'default'          	=> $options['hero_banner_content_type'],
		'sanitize_callback' => 'bloguide_sanitize_select',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[hero_banner_content_type]',
	array(
		'label'             => esc_html__( 'Content Type', 'bloguide' ),
		'section'           => 'bloguide_hero_banner_section',
		'type'				=> 'select',
		'active_callback' 	=> 'bloguide_is_hero_banner_section_enable',
		'choices'			=> bloguide_hero_banner_content_type(),
	)
);

// hero_banner posts drop down chooser control and setting
$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_content_post]', 
	array(
		'sanitize_callback' => 'bloguide_sanitize_page',
	)
);

$wp_customize->add_control( new  Bloguide_Dropdown_Chooser( $wp_customize,
	'bloguide_theme_options[hero_banner_content_post]',
		array(
			'label'             => esc_html__( 'Select Post', 'bloguide'),
			'section'           => 'bloguide_hero_banner_section',
			'choices'			=> bloguide_post_choices(),
			'active_callback'	=> 'bloguide_is_hero_banner_section_content_post_enable',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_content_trip]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_page',
	)
);

$wp_customize->add_control( new Bloguide_Dropdown_Chooser( $wp_customize,
	'bloguide_theme_options[hero_banner_content_trip]',
		array(
			'label'             => esc_html__( 'Select Trip', 'bloguide' ),
			'section'           => 'bloguide_hero_banner_section',
			'choices'			=> bloguide_trip_choices(),
			'active_callback'	=> 'bloguide_is_hero_banner_section_content_trip_enable',
		)
	)
);

//hero_banner_btn_txt
$wp_customize->add_setting('bloguide_theme_options[hero_banner_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['hero_banner_btn_txt'],
    )
);

$wp_customize->add_control('bloguide_theme_options[hero_banner_btn_txt]',
    array(
        'section'			=> 'bloguide_hero_banner_section',
        'label'				=> esc_html__( 'Button Text:', 'bloguide' ),
        'type'          	=>'text',
        'active_callback' 	=> 'bloguide_is_hero_banner_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[hero_banner_btn_txt]',
		array(
			'selector'            => '#bloguide_hero_banner_section .featured-wrapper div.read-more a:nth-child(1)',
			'settings'            => 'bloguide_theme_options[hero_banner_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_hero_banner_btn_txt_partial',
		) 
	);
}

//hero_banner_alt_btn_txt
$wp_customize->add_setting('bloguide_theme_options[hero_banner_alt_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['hero_banner_alt_btn_txt'],
    )
);

$wp_customize->add_control('bloguide_theme_options[hero_banner_alt_btn_txt]',
    array(
        'section'			=> 'bloguide_hero_banner_section',
        'label'				=> esc_html__( 'Alternate Button Text:', 'bloguide' ),
        'type'          	=>'text',
        'active_callback' 	=> 'bloguide_is_hero_banner_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[hero_banner_alt_btn_txt]',
		array(
			'selector'            => '#bloguide_hero_banner_section .featured-wrapper div.read-more a:nth-child(2)',
			'settings'            => 'bloguide_theme_options[hero_banner_alt_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_hero_banner_alt_btn_txt_partial',
		) 
	);
}
            
$wp_customize->add_setting( 'bloguide_theme_options[hero_banner_alt_btn_url]',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control( 'bloguide_theme_options[hero_banner_alt_btn_url]',
    array(
        'label'             => esc_html__( 'Alternate Button URL', 'bloguide'),
        'section'        	=> 'bloguide_hero_banner_section',
        'active_callback' 	=> 'bloguide_is_hero_banner_section_enable',
        'type'				=> 'url',
    ) 
);