<?php
/**
 * Advertisement options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Advertisement Author Section
$wp_customize->add_section( 'section_home_adssec',
	array(
		'title'      => __( 'Advertisement Section 2', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_adssec_section]',
	array(
		'default'           => $default['disable_adssec_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_adssec_section]',
    array(
		'label' 			=> __('Enable/Disable Advertisement Section', 'presazine'),
		'section'    		=> 'section_home_adssec',
		 'settings'  		=> 'theme_options[disable_adssec_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[adssec_column_option]', array(
	'default'           => $default['adssec_column_option'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[adssec_column_option]', array(
	'label'             => esc_html__( 'Choose Advertisement Column', 'presazine' ),
	'section'           => 'section_home_adssec',
	'type'              => 'radio',
	'active_callback' => 'presazine_adssec_active',
	'choices'				=> array( 
		'col-1'     => esc_html__( 'Column One', 'presazine' ), 
		'col-2'     => esc_html__( 'Column Two', 'presazine' ),
		)
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_adssec]', 
	array(
	'default' 			=> $default['number_of_adssec'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_adssec]', 
	array(
	'label'       => __('Number of Ads', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'presazine'),
	'section'     => 'section_home_adssec',   
	'settings'    => 'theme_options[number_of_adssec]',		
	'type'        => 'number',
	'active_callback' => 'presazine_adssec_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
$number_of_adssec = presazine_get_option( 'number_of_adssec' );

for( $i=1; $i<=$number_of_adssec; $i++ ){

// adssec title setting and control
	$wp_customize->add_setting( 'theme_options[adssec_img_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[adssec_img_' . $i . ']', array(
		'label'       =>sprintf( esc_html__( 'Select Advertisement Image %d', 'presazine' ), $i ),
		'section'        	=> 'section_home_adssec',
		'settings'    		=> 'theme_options[adssec_img_'.$i.']',	
		'active_callback' 	=> 'presazine_adssec_active',
	) ) );

	// adssec title setting and control
	$wp_customize->add_setting( 'theme_options[adssec_url_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'theme_options[adssec_url_' . $i . ']', array(
		'label'           	=> sprintf( __( 'Advertisement Url %d', 'presazine' ), $i ),
		'section'        	=> 'section_home_adssec',
		'settings'    		=> 'theme_options[adssec_url_'.$i.']',	
		'active_callback' 	=> 'presazine_adssec_active',
		'type'				=> 'url',
	) );
}