<?php
/**
 * Headlines News options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Headlines News Section
$wp_customize->add_section( 'section_home_headlines',
	array(
		'title'      => __( 'Headlines News Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_headlines_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_headlines_section]',
	array(
		'default'           => $default['disable_headlines_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_headlines_section]',
    array(
		'label' 			=> __('Enable/Disable Headlines News Section', 'presazine'),
		'section'    		=> 'section_home_headlines',
		 'settings'  		=> 'theme_options[disable_headlines_section]',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );
//Sensational Section title
$wp_customize->add_setting('theme_options[headlines_title]', 
	array(
	'default'           => $default['headlines_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[headlines_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_headlines',   
	'settings'    => 'theme_options[headlines_title]',
	'active_callback' => 'presazine_headlines_active',		
	'type'        => 'text'
	)
);
// Header Font Size
$wp_customize->add_setting('theme_options[headlines_font_size]', 
	array(
	'sanitize_callback' => 'absint',
	'default'			=> 24,
	)
);

$wp_customize->add_control(new Presazine_Range_Value_Control($wp_customize,'theme_options[headlines_font_size]',
	array(
		'type'     => 'range-value',
		'section'  => 'section_home_headlines',
		'active_callback' => 'presazine_headlines_active',
		'label'    => esc_html__( 'Section Header Font Size(px)', 'presazine' ),
		'description' => __(' Default:24px. Max:35px Min:16px .', 'presazine'),
		'input_attrs' => array(
			'min'    => 16,
			'max'    => 35,
			'step'   => 1,
	)
)));


// Number of items
$wp_customize->add_setting('theme_options[number_of_headlines_items]', 
	array(
	'default' 			=> $default['number_of_headlines_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_headlines_items]', 
	array(
	'label'       => __('Number of Items', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 20.', 'presazine'),
	'section'     => 'section_home_headlines',   
	'settings'    => 'theme_options[number_of_headlines_items]',		
	'type'        => 'number',
	'active_callback' => 'presazine_headlines_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 20,
			'step'	=> 1,
		),
	)
);


$wp_customize->add_setting('theme_options[headlines_content_type]', 
	array(
	'default' 			=> $default['headlines_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[headlines_content_type]', 
	array(
	'label'       => __('Content Type', 'presazine'),
	'section'     => 'section_home_headlines',   
	'settings'    => 'theme_options[headlines_content_type]',		
	'type'        => 'select',
	'active_callback' => 'presazine_headlines_active',
	'choices'	  => array(
			'headlines_page'	  => __('Page','presazine'),
			'headlines_post'	  => __('Post','presazine'),
			'headlines_category'	  => __('Category','presazine'),
		),
	)
);

// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[headlines_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Presazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[headlines_category]',
		array(
		'label'    => __( 'Select Category', 'presazine' ),
		'section'  => 'section_home_headlines',
		'settings' => 'theme_options[headlines_category]',	
		'active_callback' => 'presazine_headlines_category',		
		)
	)
);

$number_of_headlines_items = presazine_get_option( 'number_of_headlines_items' );

for( $i=1; $i<=$number_of_headlines_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[headlines_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[headlines_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'presazine'), $i),
		'section'     => 'section_home_headlines',   
		'settings'    => 'theme_options[headlines_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'presazine_headlines_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[headlines_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[headlines_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_home_headlines',   
		'settings'    => 'theme_options[headlines_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => presazine_post_choices(),
		'active_callback' => 'presazine_headlines_post',
		)
	);
}
