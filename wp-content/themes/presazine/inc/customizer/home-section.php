<?php
/**
 * Home Page Options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();
$homepage_design_layout     = presazine_get_option( 'homepage_design_layout_options' );

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'presazine' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/

if ($homepage_design_layout=='home-magazine') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	require get_template_directory() . '/inc/customizer/sections/headlines.php';
	require get_template_directory() . '/inc/customizer/sections/hero.php';;
	require get_template_directory() . '/inc/customizer/sections/galleryview.php';
	require get_template_directory() . '/inc/customizer/sections/recent.php';
	require get_template_directory() . '/inc/customizer/sections/ads.php';
	require get_template_directory() . '/inc/customizer/sections/trending.php';
	require get_template_directory() . '/inc/customizer/sections/travel.php';
	require get_template_directory() . '/inc/customizer/sections/adssec.php';
	require get_template_directory() . '/inc/customizer/sections/mustread.php';
} elseif ($homepage_design_layout=='home-blog') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	require get_template_directory() . '/inc/customizer/sections/slider.php';
	require get_template_directory() . '/inc/customizer/sections/galleryview.php';
	require get_template_directory() . '/inc/customizer/sections/ads.php';
	require get_template_directory() . '/inc/customizer/sections/popular.php';
	require get_template_directory() . '/inc/customizer/sections/mustread.php';
} elseif ($homepage_design_layout=='home-normal-magazine') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	require get_template_directory() . '/inc/customizer/sections/headlines.php';
	require get_template_directory() . '/inc/customizer/sections/slider.php';
	require get_template_directory() . '/inc/customizer/sections/galleryview.php';
	require get_template_directory() . '/inc/customizer/sections/about.php';
	require get_template_directory() . '/inc/customizer/sections/ads.php';
	require get_template_directory() . '/inc/customizer/sections/travel.php';
	require get_template_directory() . '/inc/customizer/sections/mustread.php';	
} elseif ($homepage_design_layout=='home-normal-blog') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	require get_template_directory() . '/inc/customizer/sections/slider.php';
	require get_template_directory() . '/inc/customizer/sections/message.php';
	require get_template_directory() . '/inc/customizer/sections/galleryview.php';
	require get_template_directory() . '/inc/customizer/sections/travel.php';	
} elseif ($homepage_design_layout=='home-business') {
	require get_template_directory() . '/inc/customizer/sections/header.php';
	require get_template_directory() . '/inc/customizer/sections/home-layout.php';
	require get_template_directory() . '/inc/customizer/sections/slider.php';
	require get_template_directory() . '/inc/customizer/sections/services.php';
	require get_template_directory() . '/inc/customizer/sections/message.php';
	require get_template_directory() . '/inc/customizer/sections/cta.php';
	require get_template_directory() . '/inc/customizer/sections/team.php';
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';
	require get_template_directory() . '/inc/customizer/sections/mustread.php';
}

