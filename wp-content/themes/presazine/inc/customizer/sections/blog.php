<?php
/**
 * Home Page Options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => __( 'Blog Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_blog_section]',
	array(
		'default'           => $default['disable_blog_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_blog_section]',
    array(
		'label' 	=> __('Disable Blog Section', 'presazine'),
		'section'    			=> 'section_home_blog',
		
		'on_off_label' 		=> presazine_switch_options(),
    )
) );


// Blog title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => __('Section Title', 'presazine'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',	
	'active_callback' => 'presazine_blog_active',		
	'type'        => 'text'
	)
);

// Blog title
$wp_customize->add_setting('theme_options[blog_subtitle]', 
	array(
	'default'           => $default['blog_subtitle'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_subtitle]', 
	array(
	'label'       => __('Section Sub Title', 'presazine'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_subtitle]',	
	'active_callback' => 'presazine_blog_active',		
	'type'        => 'text'
	)
);
$wp_customize->add_setting( 'theme_options[blog_background_color]', array(
    'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
    'default'           => '#efefef',
    
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[blog_background_color]', array(
    'label'    => esc_html__( 'Background Color', 'presazine' ),
    'section'  => 'section_home_blog',
    'active_callback' => 'presazine_blog_active',
) ) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[blog_content_enable]', array(
	'default'           => $default['blog_content_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[blog_content_enable]', array(
	'label'             => esc_html__( 'Enable Blog Content', 'presazine' ),
	'section'           => 'section_home_blog',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_blog_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[blog_category_enable]', array(
	'default'           => $default['blog_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[blog_category_enable]', array(
	'label'             => esc_html__( 'Enable Blog Category', 'presazine' ),
	'section'           => 'section_home_blog',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_blog_active',
) );

// Header Font Size
$wp_customize->add_setting('theme_options[blog_section_header_font_size]', 
	array(
	'sanitize_callback' => 'absint',
	'default'			=> 42,
	)
);

$wp_customize->add_control(new Presazine_Range_Value_Control($wp_customize,'theme_options[blog_section_header_font_size]',
	array(
		'type'     => 'range-value',
		'section'  => 'section_home_blog',
		'active_callback' => 'presazine_blog_active',
		'label'    => esc_html__( ' Section Header Font Size(px)', 'presazine' ),
		'description' => __(' Default:42px. Max:68px Min:0px. If you want Default value then set Zero(0).', 'presazine'),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 68,
			'step'   => 1,
	)
)));

//  Font Size
$wp_customize->add_setting('theme_options[blog_subtitle_font_size]', 
	array(
	'sanitize_callback' => 'absint',
	'default'			=> 90,
	)
);

$wp_customize->add_control(new Presazine_Range_Value_Control($wp_customize,'theme_options[blog_subtitle_font_size]',
	array(
		'type'     => 'range-value',
		'section'  => 'section_home_blog',
		'active_callback' => 'presazine_blog_active',
		'label'    => esc_html__( ' Sub Title Font Size(px)', 'presazine' ),
		'description' => __(' Default:90px. Max:110px Min:0px. If you want Default value then set Zero(0).', 'presazine'),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 110,
			'step'   => 1,
	)
)));

// Header Font Size
$wp_customize->add_setting('theme_options[blog_font_size]', 
	array(
	'sanitize_callback' => 'absint',
	'default'			=> 32,
	)
);

$wp_customize->add_control(new Presazine_Range_Value_Control($wp_customize,'theme_options[blog_font_size]',
	array(
		'type'     => 'range-value',
		'section'  => 'section_home_blog',
		'active_callback' => 'presazine_blog_active',
		'label'    => esc_html__( 'Post Header Font Size(px)', 'presazine' ),
		'description' => __(' Default:32px. Max:58px Min:0px. If you want Default value then set Zero(0).', 'presazine'),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 58,
			'step'   => 1,
	)
)));
// Header Font Size
$wp_customize->add_setting('theme_options[blog_content_font_size]', 
	array(
	'sanitize_callback' => 'absint',
	'default'			=> 16,
	)
);

$wp_customize->add_control(new Presazine_Range_Value_Control($wp_customize,'theme_options[blog_content_font_size]',
	array(
		'type'     => 'range-value',
		'section'  => 'section_home_blog',
		'active_callback' => 'presazine_blog_active',
		'label'    => esc_html__( ' Content Font Size(px)', 'presazine' ),
		'description' => __(' Default:16px. Max:38px Min:0px. If you want Default value then set Zero(0).', 'presazine'),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 38,
			'step'   => 1,
	)
)));

// Number of Services
$wp_customize->add_setting('theme_options[number_of_blog_column]', 
	array(
	'default' 			=> $default['number_of_blog_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_blog_column]', 
	array(
	'label'       => __('Column Per Row', 'presazine'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4', 'presazine'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[number_of_blog_column]',		
	'type'        => 'number',
	'active_callback' => 'presazine_blog_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

// Blog Number.
$wp_customize->add_setting( 'theme_options[blog_number]',
	array(
		'default'           => $default['blog_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[blog_number]',
	array(
		'label'       => __( 'Number of Posts', 'presazine' ),
		'description' => __('Maximum number of post to show is 12.', 'presazine'),
		'section'     => 'section_home_blog',
		'active_callback' => 'presazine_blog_active',		
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 12, 'step' => 1, 'style' => 'width: 115px;' ),
		
	)
);

$wp_customize->add_setting('theme_options[blog_content_type]', 
	array(
	'default' 			=> $default['blog_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[blog_content_type]', 
	array(
	'label'       => __('Content Type', 'presazine'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_content_type]',		
	'type'        => 'select',
	'active_callback' => 'presazine_blog_active',
	'choices'	  => array(
			'blog_page'	  => __('Page','presazine'),
			'blog_post'	  => __('Post','presazine'),
			'blog_category'  => __('Category', 'presazine'),
		),
	)
);

$blog_number = presazine_get_option( 'blog_number' );

for( $i=1; $i<=$blog_number; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[blog_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[blog_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'presazine'), $i),
		'section'     => 'section_home_blog',   
		'settings'    => 'theme_options[blog_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'presazine_blog_page',
		)
	);

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[blog_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Presazine_Dropdown_Chooser( $wp_customize,'theme_options[blog_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_home_blog',  
		'settings'    => 'theme_options[blog_post_'.$i.']',	
		'choices'			=> presazine_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'presazine_blog_post',
		)
	));
}

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Presazine_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => __( 'Select Category', 'presazine' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',	
		'active_callback' => 'presazine_blog_category',		
		'priority' => 100,
		)
	)
);

