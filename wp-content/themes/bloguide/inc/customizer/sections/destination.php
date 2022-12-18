<?php
/**
 * Destination Section options
 *
 * @package Theme Palace
 * @subpackage Next Travel Pro
 * @since Next Travel Pro 1.0.0
 */

// Add Destination section
$wp_customize->add_section( 'bloguide_destination_section',
	array(
		'title'             => esc_html__( 'Destination','bloguide' ),
		'description'       => esc_html__( 'Destination Section options.', 'bloguide' ),
		'panel'             => 'bloguide_front_page_panel',

	)
);

// Destination content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[destination_section_enable]',
	array(
		'default'			=> 	$options['destination_section_enable'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[destination_section_enable]',
		array(
			'label'             => esc_html__( 'Destination Section Enable', 'bloguide' ),
			'section'           => 'bloguide_destination_section',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);


// popular destination sub title setting and control
$wp_customize->add_setting( 'bloguide_theme_options[destination_title]',
	array(
		'default'			=> $options['destination_title'],
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[destination_title]',
	array(
		'label'           	=> esc_html__( 'Section Title', 'bloguide' ),
		'section'        	=> 'bloguide_destination_section',
		'active_callback' 	=> 'bloguide_is_destination_section_enable',
		'type'				=> 'text',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[destination_title]',
		array(
			'selector'            => '#bloguide_destination_section h2.section-title',
			'settings'            => 'bloguide_theme_options[destination_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'bloguide_destination_title_partial',
		)
	);
}

// Destination content type control and setting
$wp_customize->add_setting( 'bloguide_theme_options[destination_content_type]',
	array(
		'default'          	=> $options['destination_content_type'],
		'sanitize_callback' => 'bloguide_sanitize_select',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[destination_content_type]',
	array(
		'label'             => esc_html__( 'Content Type', 'bloguide' ),
		'section'           => 'bloguide_destination_section',
		'type'				=> 'select',
		'active_callback' 	=> 'bloguide_is_destination_section_enable',
		'choices'			=> bloguide_wp_travel_content_type(),
	)
);

for ( $i = 1; $i <= $options['destination_count']; $i++ ) :

	// Destination posts drop down chooser control and setting
	$wp_customize->add_setting( 'bloguide_theme_options[destination_content_post_' . $i . ']',
		array(
			'sanitize_callback' => 'bloguide_sanitize_page',
		)
	);

	$wp_customize->add_control( new Bloguide_Dropdown_Chooser( $wp_customize,
		'bloguide_theme_options[destination_content_post_' . $i . ']',
			array(
				'label'             => sprintf( esc_html__( 'Select Post %d', 'bloguide' ), $i ),
				'section'           => 'bloguide_destination_section',
				'choices'			=> bloguide_post_choices(),
				'active_callback'	=> 'bloguide_is_destination_section_content_post_enable',
			)
		)
	);
	
	// Destination trips drop down chooser control and setting
	$wp_customize->add_setting( 'bloguide_theme_options[destination_content_trip_' . $i . ']',
		array(
			'sanitize_callback' => 'bloguide_sanitize_page',
		)
	);

	$wp_customize->add_control( new Bloguide_Dropdown_Chooser( $wp_customize,
		'bloguide_theme_options[destination_content_trip_' . $i . ']',
			array(
				'label'             => sprintf ( esc_html__( 'Select Trip %d', 'bloguide' ), $i ),
				'section'           => 'bloguide_destination_section',
				'choices'			=> bloguide_trip_choices(),
				'active_callback'	=> 'bloguide_is_destination_section_content_trip_enable',
			)
		)
	);

	//destination separator
	$wp_customize->add_setting('bloguide_theme_options[destination_separator'. $i .']',
        array(
            'sanitize_callback'      => 'bloguide_sanitize_html',
        )
    );

    $wp_customize->add_control(new Bloguide_Customize_Horizontal_Line($wp_customize,
        'bloguide_theme_options[destination_separator'. $i .']',
            array(
                'active_callback'       => 'bloguide_is_destination_section_separator_enable',
                'type'                  =>'hr',
                'section'               =>'bloguide_destination_section',
            )
        )
    );

endfor;

// Popular deatination btn label setting and control
$wp_customize->add_setting( 'bloguide_theme_options[destination_btn_label]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['destination_btn_label'],
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[destination_btn_label]',
	array(
		'label'           	=> esc_html__( 'Section Button Label', 'bloguide' ),
		'section'        	=> 'bloguide_destination_section',
		'active_callback' 	=> 'bloguide_is_destination_section_enable',
		'type'				=> 'text',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[destination_btn_label]',
		array(
			'selector'            => '#bloguide_destination_section div.read-more a',
			'settings'            => 'bloguide_theme_options[destination_btn_label]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'bloguide_destination_btn_label_partial',
		)
	);
}
