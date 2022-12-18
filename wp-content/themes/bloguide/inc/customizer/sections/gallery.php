<?php
/**
 * gallery Section options
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */

// Add gallery section
$wp_customize->add_section( 'bloguide_gallery_section',
    array(
        'title'             => esc_html__( 'Gallery','bloguide' ),
        'description'       => esc_html__( 'Gallery Section options.', 'bloguide' ),
        'panel'             => 'bloguide_front_page_panel',
    )
);

// gallery content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[gallery_section_enable]',
    array(
        'default'           =>  $options['gallery_section_enable'],
        'sanitize_callback' => 'bloguide_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Bloguide_Switch_Control( $wp_customize,
    'bloguide_theme_options[gallery_section_enable]',
        array(
            'label'             => esc_html__( 'Gallery Section Enable', 'bloguide' ),
            'section'           => 'bloguide_gallery_section',
            'on_off_label'      => bloguide_switch_options(),
        )
    )
);

// gallery title setting and control
$wp_customize->add_setting( 'bloguide_theme_options[gallery_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['gallery_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'bloguide_theme_options[gallery_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'bloguide' ),
        'section'           => 'bloguide_gallery_section',
        'active_callback'   => 'bloguide_is_gallery_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[gallery_title]',
        array(
            'selector'            => '#bloguide_gallery_section .section-header h2',
            'settings'            => 'bloguide_theme_options[gallery_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'bloguide_gallery_title_partial',
        )
    );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'bloguide_theme_options[gallery_content_category]',
    array(
        'sanitize_callback' => 'bloguide_sanitize_single_category',
    )
);

$wp_customize->add_control( new Bloguide_Dropdown_Taxonomies_Control( $wp_customize,
    'bloguide_theme_options[gallery_content_category]',
        array(
            'label'             => esc_html__( 'Select Category', 'bloguide' ),
            'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'bloguide' ),
            'section'           => 'bloguide_gallery_section',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'bloguide_is_gallery_section_enable'
        )
    )
);
