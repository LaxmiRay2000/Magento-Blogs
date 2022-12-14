<?php
/**
 *  Bloguide Customizer.
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bloguide_customize_register( $wp_customize ) {
	$options = bloguide_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'bloguide_theme_options[header_title_color]',
		array(
			'default'           => $options['header_title_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'bloguide_theme_options[header_title_color]',
			array(
				'priority'			=> 5,
				'label'             => esc_html__( 'Site Title Color', 'bloguide' ),
				'section'           => 'colors',
			)
		)
	);

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'bloguide_theme_options[header_tagline_color]',
		array(
			'default'           => $options['header_tagline_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'			=> 'postMessage'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'bloguide_theme_options[header_tagline_color]',
			array(
				'priority'			=> 6,
				'label'             => esc_html__( 'Site Tagline Color', 'bloguide' ),
				'section'           => 'colors',
			)
		)
	);

	// Site identity extra options.
	$wp_customize->add_setting( 'bloguide_theme_options[header_txt_logo_extra]',
		array(
			'default'           => $options['header_txt_logo_extra'],
			'sanitize_callback' => 'bloguide_sanitize_select',
			'transport'			=> 'refresh'
		)
	);

	$wp_customize->add_control( 'bloguide_theme_options[header_txt_logo_extra]',
		array(
			'priority'			=> 50,
			'type'				=> 'radio',
			'label'             => esc_html__( 'Site Identity Extra Options', 'bloguide' ),
			'section'           => 'title_tagline',
			'choices'			=> array( 
				'hide-all'     => esc_html__( 'Hide All', 'bloguide' ),
				'show-all'     => esc_html__( 'Show All', 'bloguide' ),
				'title-only'   => esc_html__( 'Title Only', 'bloguide' ),
				'tagline-only' => esc_html__( 'Tagline Only', 'bloguide' ),
				'logo-title'   => esc_html__( 'Logo + Title', 'bloguide' ),
				'logo-tagline' => esc_html__( 'Logo + Tagline', 'bloguide' ),
			)
		)
	);


	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';
	
	// excerpt
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'bloguide_front_page_panel',
		array(
			'title'      => esc_html__( 'Front Page','bloguide' ),
			'description'=> esc_html__( 'Front Page Theme Options.', 'bloguide' ),
			'priority'   => 140,
		)
	);

		// Add panel for common theme options
	$wp_customize->add_panel( 'bloguide_theme_options_panel',
		array(
			'title'      => esc_html__( 'Theme Options','bloguide' ),
			'description'=> esc_html__( ' Bloguide Theme Options.', 'bloguide' ),
			'priority'   => 150,
		)
	);


	foreach ( explode( ',', $options['default_sortable'] ) as $list ) {
		require get_template_directory() . '/inc/customizer/sections/'.str_replace( '_', '-', $list).'.php';
	}

}
add_action( 'customize_register', 'bloguide_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloguide_customize_preview_js() {
	wp_enqueue_script( 'bloguide-customizer', get_template_directory_uri() . '/assets/js/customizer' . bloguide_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bloguide_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function bloguide_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . bloguide_min() . '.css' );

	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . bloguide_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// simple icon picker
	wp_enqueue_style( 'simple-iconpicker-css', get_template_directory_uri() . '/assets/css/simple-iconpicker' . bloguide_min() . '.css' );

	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . bloguide_min() . '.css' );

	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . bloguide_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_style( 'bloguide-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . bloguide_min() . '.css' );

	wp_enqueue_script( 'bloguide-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . bloguide_min() . '.js', array(), '1.0', true );

	$bloguide_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'bloguide' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'bloguide-customize-controls', 'bloguide_reset_data', $bloguide_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'bloguide_customize_control_js' );

if ( !function_exists( 'bloguide_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since  Bloguide 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function bloguide_reset_options() {
		$options = bloguide_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'bloguide_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'bloguide_reset_options' );
