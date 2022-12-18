<?php
/**
* Footer options
*
* @package Theme Palace
* @subpackage  Bloguide
* @since  Bloguide 1.0.0
*/

// Footer Section
$wp_customize->add_section( 'bloguide_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'bloguide' ),
		'priority'   			=> 900,
		'panel'      			=> 'bloguide_theme_options_panel',
		)
	);


// Topbar content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[footer_social_menu_enable]',
	array(
		'default'			=> 	$options['footer_social_menu_enable'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);
 
 $wp_customize->add_control( new Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[footer_social_menu_enable]',
		array(
			'label'             => esc_html__( 'Social Menu Enable', 'bloguide' ),
			'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu in footer.', 'bloguide' ), esc_html__( 'Click Here', 'bloguide' ), esc_html__( 'to create menu', 'bloguide' ) ),
			'section'           => 'bloguide_section_footer',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);
// scroll top visible
$wp_customize->add_setting( 'bloguide_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
		)
	);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[scroll_top_visible]',
		array(																																																																																																																																																																																																																																																																																																																																																																																																																																																																																							
			'label'      		=> esc_html__( 'Display Scroll Top Button', 'bloguide' ),
			'section'    		=> 'bloguide_section_footer',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[footer_hr]',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( new Bloguide_Customize_Horizontal_Line( $wp_customize,
	'bloguide_theme_options[footer_hr]',
		array(
			'section'         => 'bloguide_section_footer',
			'type'			  => 'hr',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[footer_bg_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[footer_bg_color]',
		array(
			'label'             => esc_html__( 'Footer Section BG Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);


$wp_customize->add_setting( 'bloguide_theme_options[footer_widgets_title_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[footer_widgets_title_color]',
		array(
			'label'             => esc_html__( 'Widgets Title Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[footer_widgets_content_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[footer_widgets_content_color]',
		array(
			'label'             => esc_html__( 'Widgets Content Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[copyright_text_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[copyright_text_color]',
		array(
			'label'             => esc_html__( 'Copyright Text Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[footer_content_hover_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[footer_content_hover_color]',
		array(
			'label'             => esc_html__( 'Content Hover Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[back_to_top_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[back_to_top_color]',
		array(
			'label'             => esc_html__( 'Back To Top Color', 'bloguide' ),
			'section'  => 'bloguide_section_footer',
		)
	)
);