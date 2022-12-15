<?php
/**
 * Slider options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Slider Section', 'presazine' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		'active_callback' => 'presazine_slider_design_enable',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable Slider Section', 'presazine'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );


// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_arrow_enable]', array(
	'default'           => $default['slider_arrow_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Slider Arrow', 'presazine' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_slider_active',
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_category_enable]', array(
	'default'           => $default['slider_category_enable'],
	'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'presazine' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'presazine_slider_active',
) );


// Number of items
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'presazine_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'presazine'),
	'description' => __('Slider Speed Default speed 800', 'presazine'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'presazine_slider_active',
	)
);

$wp_customize->add_setting( 'theme_options[slider_dot]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[slider_dot]',
    array(
		'label' 	=> __('Disable Slider Dots', 'presazine'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> presazine_switch_options(),
		'active_callback' => 'presazine_slider_active',
    )
) );


$number_of_sr_items = presazine_get_option( 'number_of_sr_items' );

for( $i=1; $i<=$number_of_sr_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_title_meta_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_title_meta_'.$i.']', 
		array(
		'label'       => sprintf( __('Before Title #%1$s', 'presazine'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_title_meta_'.$i.']',		
		'type'        => 'text',
		'active_callback' => 'presazine_slider_active',
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_after_title_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_after_title_'.$i.']', 
		array(
		'label'       => sprintf( __('After Title #%1$s', 'presazine'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_after_title_'.$i.']',		
		'type'        => 'text',
		'active_callback' => 'presazine_slider_active',
		)
	);


	// Additional Information First Post
	$wp_customize->add_setting('theme_options[slider_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'presazine_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Presazine_Dropdown_Chooser( $wp_customize,'theme_options[slider_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
		'section'     => 'section_featured_slider',  
		'settings'    => 'theme_options[slider_post_'.$i.']',	
		'choices'	=> presazine_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'presazine_slider_active',
		)
	));

	// Cta Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'presazine'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'presazine_slider_active',	
		'type'        => 'text',
		)
	);

	// slider hr setting and control
	$wp_customize->add_setting( 'theme_options[slider_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Presazine_Customize_Horizontal_Line( $wp_customize, 'theme_options[slider_hr_'. $i .']',
		array(
			'section'         => 'section_featured_slider',
			'active_callback' => 'presazine_slider_active',
			'type'			  => 'hr',
	) ) );
}
// Slider Button Text
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_text]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_text]', 
	array(
	'label'       => __('Alternative Button Label', 'presazine'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_text]',	
	'active_callback' => 'presazine_slider_active',	
	'type'        => 'text',
	)
);

	// Slider Button Url
$wp_customize->add_setting('theme_options[slider_alt_custom_btn_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control('theme_options[slider_alt_custom_btn_url]', 
	array(
	'label'       => __('Alternative Button Url', 'presazine'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_alt_custom_btn_url]',	
	'active_callback' => 'presazine_slider_active',	
	'type'        => 'url',
	)
);

$wp_customize->add_setting( 'theme_options[disable_blog_banner_section]',
	array(
		'default'           => $default['disable_blog_banner_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'presazine_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_blog_banner_section]',
    array(
		'label' 			=> __('Disable Blog Header Section', 'presazine'),
		'description' 		=> __('If you want only header image then disable featured slider and actiove this option.', 'presazine'),
		'section'    		=> 'section_featured_slider',
		'on_off_label' 		=> presazine_switch_options(),
    )
) );