<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */

// Subscription section
$wp_customize->add_section('bloguide_subscribe_now_section',
    array(
        'title'         => esc_html__( 'Subscription', 'bloguide' ),
        'description'   => sprintf( esc_html__( '%1$sJetpack%2$s should be active and site should be connected to WordPress.com for this section to work.', 'bloguide' ), '<a target="_blank" href="https://wordpress.org/plugins/jetpack">', '</a>' ),
        'panel'         => 'bloguide_front_page_panel',
    )
);

// Subscription enable setting
$wp_customize->add_setting('bloguide_theme_options[subscribe_now_section_enable]',
    array(
        'sanitize_callback' => 'bloguide_sanitize_switch_control',
        'default'           => $options['subscribe_now_section_enable'],
    )
);

$wp_customize->add_control( new Bloguide_Switch_Control($wp_customize,
    'bloguide_theme_options[subscribe_now_section_enable]',
        array(
            'section'		=> 'bloguide_subscribe_now_section',
            'label'			=> esc_html__( 'Enable subscribe_now.', 'bloguide' ),
            'on_off_label'  => bloguide_switch_options(),
        )
    )
);

// Subscribe_now title setting
$wp_customize->add_setting('bloguide_theme_options[subscribe_now_section_subtitle]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_now_section_subtitle'],
        'transport'	        => 'postMessage',
    )
);

$wp_customize->add_control('bloguide_theme_options[subscribe_now_section_subtitle]',
    array(
        'section'		    => 'bloguide_subscribe_now_section',
        'label'			    => esc_html__( 'Section Sub Title:', 'bloguide' ),
        'active_callback'   => 'bloguide_is_subscribe_now_section_enable',
        'type'              =>'text'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[subscribe_now_section_subtitle]',
		array(
			'selector'            => '#bloguide_subscribe_now .section-header p.section-subtitle',
			'settings'            => 'bloguide_theme_options[subscribe_now_section_subtitle]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_subscribe_now_section_subtitle_partial',
		) 
	);
}

// Subscribe_now title setting
$wp_customize->add_setting('bloguide_theme_options[subscribe_now_section_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_now_section_title'],
        'transport'	        => 'postMessage',
    )
);

$wp_customize->add_control('bloguide_theme_options[subscribe_now_section_title]',
    array(
        'section'		    => 'bloguide_subscribe_now_section',
        'label'			    => esc_html__( 'Section Title:', 'bloguide' ),
        'active_callback'   => 'bloguide_is_subscribe_now_section_enable',
        'type'              =>'text'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[subscribe_now_section_title]',
		array(
			'selector'            => '#bloguide_subscribe_now .section-header h2.section-title',
			'settings'            => 'bloguide_theme_options[subscribe_now_section_title]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_subscribe_now_section_title_partial',
		) 
	);
}

// Subscribe_now button text setting
$wp_customize->add_setting('bloguide_theme_options[subscribe_now_section_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['subscribe_now_section_btn_txt'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control('bloguide_theme_options[subscribe_now_section_btn_txt]',
    array(
        'section'		    => 'bloguide_subscribe_now_section',
        'label'			    => esc_html__( 'Button text:', 'bloguide' ),
        'active_callback'   => 'bloguide_is_subscribe_now_section_enable'
    )
);
    
// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[subscribe_now_section_btn_txt]',
        array(
            'selector'            => '#bloguide_subscribe_now #subscribe-submit button',
            'settings'            => 'bloguide_theme_options[subscribe_now_section_btn_txt]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'bloguide_subscribe_now_section_btn_txt_partial',
        ) 
    );
}
