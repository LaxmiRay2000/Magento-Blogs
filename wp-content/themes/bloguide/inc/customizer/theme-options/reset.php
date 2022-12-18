<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'bloguide_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','bloguide'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'bloguide' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'bloguide_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'bloguide' ),
		'section'           => 'bloguide_reset_section',
		'type'              => 'checkbox',
	)
);
