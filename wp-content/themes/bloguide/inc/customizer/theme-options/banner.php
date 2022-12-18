<?php
/**
 * Banner Image options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

$wp_customize->add_section( 'bloguide_banner_image',
	array(
		'title'             => esc_html__( 'Banner ( Header ) Image Enable','bloguide' ),
		'description'       => esc_html__( 'Banner Image section options.', 'bloguide' ),
		'panel'             => 'bloguide_theme_options_panel',
	)
);

// Banner Image enable setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[banner_image_enable]',
	array(
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
		'default'          	=> $options['banner_image_enable'],
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[banner_image_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Banner Image', 'bloguide' ),
			'section'          	=> 'bloguide_banner_image',
			'on_off_label' 		=> bloguide_switch_options(),
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[banner_image_overlay_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[banner_image_overlay_color]',
		array(
			'label'             => esc_html__( 'Banner Image Overlay Color', 'bloguide' ),
			'section'     		=> 'bloguide_banner_image',
			'active_callback'   => 'bloguide_is_banner_image_section_enable',
		)
	)
);

$wp_customize->add_setting( 'bloguide_theme_options[banner_bg_color]',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
	'bloguide_theme_options[banner_bg_color]',
		array(
			'label'             => esc_html__( 'Background Color', 'bloguide' ),
			'section'     		=> 'bloguide_banner_image',
			'active_callback'   => 'bloguide_is_banner_image_section_disable',
		)
	)
);

