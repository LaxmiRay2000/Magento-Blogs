<?php
/**
 * Advertisement options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Advertisement Author Section
$wp_customize->add_section( 'section_home_ads',
	array(
		'title'      => __( 'Advertisement Section 1', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_ads_section]',
	array(
		'default'           => $default['disable_ads_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_ads_section]',
    array(
		'label' 			=> __('Enable/Disable Advertisement Section', 'presazine'),
		'section'    		=> 'section_home_ads',
		 'settings'  		=> 'theme_options[disable_ads_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[ads_column_option]', array(
	'default'           => $default['ads_column_option'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[ads_column_option]', array(
	'label'             => esc_html__( 'Choose Advertisement Column', 'presazine' ),
	'section'           => 'section_home_ads',
	'type'              => 'radio',
	'active_callback' => 'presazine_ads_active',
	'choices'				=> array( 
		'col-1'     => esc_html__( 'Column One', 'presazine' ), 
		'col-2'     => esc_html__( 'Column Two', 'presazine' ),
		)
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_ads]', 
	array(
	'default' 			=> $default['number_of_ads'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ads]', 
	array(
	'label'       => __('Number of Ads', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'presazine'),
	'section'     => 'section_home_ads',   
	'settings'    => 'theme_options[number_of_ads]',		
	'type'        => 'number',
	'active_callback' => 'presazine_ads_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
$number_of_ads = presazine_get_option( 'number_of_ads' );

for( $i=1; $i<=$number_of_ads; $i++ ){

// ads title setting and control
	$wp_customize->add_setting( 'theme_options[ads_img_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[ads_img_' . $i . ']', array(
		'label'       =>sprintf( esc_html__( 'Select Advertisement Image %d', 'presazine' ), $i ),
		'section'        	=> 'section_home_ads',
		'settings'    		=> 'theme_options[ads_img_'.$i.']',	
		'active_callback' 	=> 'presazine_ads_active',
	) ) );

	// ads title setting and control
	$wp_customize->add_setting( 'theme_options[ads_url_' . $i . ']', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'theme_options[ads_url_' . $i . ']', array(
		'label'           	=> sprintf( __( 'Advertisement Url %d', 'presazine' ), $i ),
		'section'        	=> 'section_home_ads',
		'settings'    		=> 'theme_options[ads_url_'.$i.']',	
		'active_callback' 	=> 'presazine_ads_active',
		'type'				=> 'url',
	) );
}