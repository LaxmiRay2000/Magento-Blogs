<?php
/**
 * Recent Posts options.
 *
 * @package Presazine
 */

$default = presazine_get_default_theme_options();

// Recent Posts Author Section
$wp_customize->add_section( 'section_home_recent',
    array(
        'title'      => __( 'Recent Posts Section', 'presazine' ),
        'capability' => 'edit_theme_options',
        'panel'      => 'home_page_panel',
        'active_callback' => 'presazine_recent_design_enable',
        )
);

$wp_customize->add_setting( 'theme_options[disable_recent_section]',
    array(
        'default'           => $default['disable_recent_section'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'presazine_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[disable_recent_section]',
    array(
        'label'             => __('Enable/Disable Recent Posts Section', 'presazine'),
        'section'           => 'section_home_recent',
         'settings'         => 'theme_options[disable_recent_section]',
        'on_off_label'      => presazine_switch_options(),
    )
) );


//Sensational Section title
$wp_customize->add_setting('theme_options[recent_title]', 
    array(
    'default'           => $default['recent_title'],
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',    
    'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('theme_options[recent_title]', 
    array(
    'label'       => __('Section Title', 'presazine'),
    'section'     => 'section_home_recent',   
    'settings'    => 'theme_options[recent_title]',
    'active_callback' => 'presazine_recent_active',        
    'type'        => 'text'
    )
);
// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[recent_category_enable]', array(
    'default'           => $default['recent_category_enable'],
    'sanitize_callback' => 'presazine_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[recent_category_enable]', array(
    'label'             => esc_html__( 'Enable Category', 'presazine' ),
    'section'           => 'section_home_recent',
    'type'              => 'checkbox',
    'active_callback' => 'presazine_recent_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[recent_excerpt_length]', 
    array(
    'default'           => $default['recent_excerpt_length'],
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',    
    'sanitize_callback' => 'presazine_sanitize_number_range'
    )
);

$wp_customize->add_control('theme_options[recent_excerpt_length]', 
    array(
    'label'       => __('Excerpt Length', 'presazine'),
    'description' => __('Save & Refresh the customizer to see its effect. Maximum is 1000.', 'presazine'),
    'section'     => 'section_home_recent',   
    'settings'    => 'theme_options[recent_excerpt_length]',      
    'type'        => 'number',
    'active_callback' => 'presazine_recent_active',
    'input_attrs' => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 1,
        ),
    )
);

$number_of_recent_items = presazine_get_option( 'number_of_recent_items' );

for( $i=1; $i<=$number_of_recent_items; $i++ ){

    // Posts
    $wp_customize->add_setting('theme_options[recent_post_'.$i.']', 
        array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',    
        'sanitize_callback' => 'presazine_dropdown_pages'
        )
    );

    $wp_customize->add_control('theme_options[recent_post_'.$i.']', 
        array(
        'label'       => sprintf( __('Select Post #%1$s', 'presazine'), $i),
        'section'     => 'section_home_recent',   
        'settings'    => 'theme_options[recent_post_'.$i.']',     
        'type'        => 'select',
        'choices'     => presazine_post_choices(),
        'active_callback' => 'presazine_recent_active',
        )
    );
}
