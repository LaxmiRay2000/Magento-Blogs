<?php
/**
 * Team options.
 *
 * @package Presazine Pro
 */

$default = presazine_get_default_theme_options();

// Team Section
$wp_customize->add_section( 'section_home_team',
	array(
		'title'      => __( 'Team Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_team_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_team_section]',
	array(
		'default'           => $default['disable_team_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_team_section]',
    array(
		'label' 			=> __('Enable/Disable Team Section', 'presazine'),
		'section'    		=> 'section_home_team',
		 'settings'  		=> 'theme_options[disable_team_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

//Team Section title
$wp_customize->add_setting('theme_options[team_title]', 
	array(
	'default'           => $default['team_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[team_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[team_title]',
	'active_callback' => 'presazine_team_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[team_content_enable]', array(
	'default'           => $default['team_content_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[team_content_enable]', array(
	'label'             => esc_html__( 'Enable Team Content', 'presazine' ),
	'section'           => 'section_home_team',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_team_active',
) );

$number_of_items = presazine_get_option( 'number_of_items' );

for( $i=1; $i<=$number_of_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[team_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[team_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'presazine'), $i),
		'section'     => 'section_home_team',   
		'settings'    => 'theme_options[team_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'presazine_team_active',
		)
	);
}
