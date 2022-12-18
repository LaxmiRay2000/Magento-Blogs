<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'bloguide_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','bloguide' ),
		'description'       => esc_html__( 'Archive section options.', 'bloguide' ),
		'panel'             => 'bloguide_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'bloguide' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'bloguide' ),
		'section'           => 'bloguide_archive_section',
		'type'				=> 'text',
		'active_callback'	=> function( $control ) {
			return !(
				bloguide_is_static_homepage_enable( $control )
			);
		}
	)
);

// features content type control and setting
$wp_customize->add_setting( 'bloguide_theme_options[blog_column]',
	array(
		'default'          	=> $options['blog_column'],
		'sanitize_callback' => 'bloguide_sanitize_select',
	)
);

$wp_customize->add_control( 'bloguide_theme_options[blog_column]',
	array(
		'label'             => esc_html__( 'Column Layout', 'bloguide' ),
		'section'           => 'bloguide_archive_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'col-1'		=> esc_html__( 'One Column', 'bloguide' ),
			'col-2'		=> esc_html__( 'Two Column', 'bloguide' ),
		),
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[hide_category]',
	array(
		'default'           => $options['hide_category'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[hide_category]',
		array(
			'label'             => esc_html__( 'Hide Category', 'bloguide' ),
			'section'           => 'bloguide_archive_section',
			'on_off_label' 		=> bloguide_hide_options(),
		)
	)
);

// Archive tag category setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[hide_date]',
	array(
		'default'           => $options['hide_date'],
		'sanitize_callback' => 'bloguide_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Bloguide_Switch_Control( $wp_customize,
	'bloguide_theme_options[hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'bloguide' ),
			'section'           => 'bloguide_archive_section',
			'on_off_label' 		=> bloguide_hide_options(),
		)
	)
);

//archive_btn_txt
$wp_customize->add_setting('bloguide_theme_options[archive_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['archive_btn_txt'],
    )
);

$wp_customize->add_control('bloguide_theme_options[archive_btn_txt]',
    array(
        'section'			=> 'bloguide_archive_section',
        'label'				=> esc_html__( 'Button Text:', 'bloguide' ),
        'type'          	=>'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[archive_btn_txt]',
		array(
			'selector'            => '#inner-content-wrapper .archive-blog-wrapper div.read-more a',
			'settings'            => 'bloguide_theme_options[archive_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_archive_btn_txt_partial',
		) 
	);
}
