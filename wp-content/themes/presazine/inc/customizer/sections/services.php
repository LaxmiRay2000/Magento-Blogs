<?php
/**
 * Services options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_services',
	array(
		'title'      => __( 'Services Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_services_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'presazine'),
		'section'    		=> 'section_home_services',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[services_content_align]', array(

	'default'           => $default['services_content_align'],
	'sanitize_callback' => 'presazine_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[services_content_align]', array(
	'label'             => esc_html__( 'Choose Content Align', 'presazine' ),
	'section'           => 'section_home_services',
	'type'              => 'radio',
	'active_callback' => 'presazine_services_active',
	'choices'				=> array( 
		'content-right'     => esc_html__( 'Right Side', 'presazine' ), 
		'content-center'     => esc_html__( 'Center Side', 'presazine' ), 
		'content-left'     => esc_html__( 'Left Side', 'presazine' ),
		)
) );

//Services Section title
$wp_customize->add_setting('theme_options[services_title]', 
	array(
	'default'           => $default['services_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[services_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_services',   
	'settings'    => 'theme_options[services_title]',
	'active_callback' => 'presazine_services_active',		
	'type'        => 'text'
	)
);

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[disable_services_icon]', array(
	'default'           => $default['disable_services_icon'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[disable_services_icon]', array(
	'label' 			=> __('Enable/Disable Service icons', 'presazine'),
	'description' => __('If Services icons is disable then features image is enable', 'presazine'),
	'section'    		=> 'section_home_services',
	'settings'  		=> 'theme_options[disable_services_icon]',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_services_active',
) );


// Number of items
$wp_customize->add_setting('theme_options[services_excerpt_length]', 
	array(
	'default' 			=> $default['services_excerpt_length'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[services_excerpt_length]', 
	array(
	'label'       => __('Number of Category Column', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
	'section'     => 'section_home_services',   
	'settings'    => 'theme_options[services_excerpt_length]',		
	'type'        => 'number',
	'active_callback' => 'presazine_services_active',
	'input_attrs' => array(
			'min'	=> 0,
			'max'	=> 1000,
			'step'	=> 1,
		),
	)
);

$number_of_services_items = presazine_get_option( 'number_of_services_items' );

for( $i=1; $i<=$number_of_services_items; $i++ ){

		//Services Section icon
	$wp_customize->add_setting('theme_options[services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[services_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'presazine'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'presazine'), '<a href="' . esc_url( 'https://fontawesome.com/v4/icons/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_services',   
		'settings'    => 'theme_options[services_icon_'.$i.']',
		'active_callback' => 'presazine_services_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'presazine'), $i),
		'section'     => 'section_home_services',   
		'settings'    => 'theme_options[services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'presazine_services_active',
		)
	);

	

	// services hr setting and control
	$wp_customize->add_setting( 'theme_options[services_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Presazine_Customize_Horizontal_Line( $wp_customize, 'theme_options[services_hr_'. $i .']',
		array(
			'section'         => 'section_home_services',
			'active_callback' => 'presazine_services_active',
			'type'			  => 'hr',
	) ) );
}

