<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'bloguide_services_section', 
	array(
		'title'             => esc_html__( 'Our Services','bloguide' ),
		'description'       => esc_html__( 'Our Services Section options.', 'bloguide' ),
		'panel'             => 'bloguide_front_page_panel',
	) 
);

// Service content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[services_section_enable]', 
	array(
		'default'			=> 	$options['services_section_enable'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[services_section_enable]', 
		array(
			'label'             => esc_html__( 'Our Services Section Enable', 'bloguide' ),
			'section'           => 'bloguide_services_section',
			'on_off_label' 		=> bloguide_switch_options(),
		) 
	)
);



for($i = 1; $i <= $options['services_posts_count']; $i ++):
		
    $wp_customize->add_setting( 'bloguide_theme_options[services_icon_' . $i . ']', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

	$wp_customize->add_control( new Bloguide_Icon_Picker( $wp_customize,
		'bloguide_theme_options[services_icon_' . $i . ']',
			array(
				'label'             => sprintf( esc_html__( 'Service Icon %d', 'bloguide' ), $i ),
				'section'           => 'bloguide_services_section',
				'active_callback'	=> 'bloguide_is_services_section_enable',
			)
		)
	);

    // service pages drop down chooser control and setting
	$wp_customize->add_setting( 'bloguide_theme_options[services_content_page_'.$i.']',
		array(
			'sanitize_callback' => 'bloguide_sanitize_page',
		) 
	);

	$wp_customize->add_control( new  Bloguide_Dropdown_Chooser( $wp_customize,
		'bloguide_theme_options[services_content_page_'.$i.']',
			array(
				'label'             => sprintf(esc_html__( 'Select Page : %d', 'bloguide'), $i ),
				'section'           => 'bloguide_services_section',
				'choices'			=> bloguide_page_choices(),
				'active_callback'	=> 'bloguide_is_services_section_enable',
			) 
		)
	);

    // Bloguide_Customize_Horizontal_Line
    $wp_customize->add_setting('bloguide_theme_options[services_separator'. $i .']',
		array(
			'sanitize_callback'      => 'bloguide_sanitize_html',
		)
	);

    $wp_customize->add_control(new  Bloguide_Customize_Horizontal_Line($wp_customize,
		'bloguide_theme_options[services_separator'. $i .']',
			array(
				'active_callback'       => 'bloguide_is_services_section_enable',
				'type'                  =>'hr',
				'section'               =>'bloguide_services_section',
			)
		)
	);

endfor;

// Service Excerpt length setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[services_excerpt_length]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_number_range',
		'default'			=> $options['services_excerpt_length'],
	)
);

$wp_customize->add_control( 'bloguide_theme_options[services_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Excerpt Length', 'bloguide' ),
		'description' 		=> esc_html__( 'Total words to be displayed in Service section', 'bloguide' ),
		'section'     		=> 'bloguide_services_section',
		'type'        		=> 'number',
		'active_callback' 	=> 'bloguide_is_services_section_enable',
	)
);
