<?php

$default = presazine_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'presazine' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'top_bar_current_date',
    array(
        'title'    => __( 'Current Date', 'presazine' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
        'active_callback' => 'presazine_topbar_current_date_design_enable',
    )
); 


// Header contact enable control and setting
$wp_customize->add_setting( 'theme_options[show_current_date]', array(
    'default'           =>  $default['show_current_date'],
    'sanitize_callback' => 'presazine_sanitize_switch_control',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[show_current_date]', array(
    'label'             => __( 'Show Contact Info', 'presazine' ),
    'section'           => 'top_bar_current_date',
    'settings'         => 'theme_options[show_current_date]',
    'on_off_label'      => presazine_switch_options(),
) ) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'presazine' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
        'active_callback' => 'presazine_topbar_contact_info_design_enable',
    )
);

// Header contact enable control and setting
$wp_customize->add_setting( 'theme_options[show_header_contact_info]', array(
    'default'           =>  $default['show_header_contact_info'],
    'sanitize_callback' => 'presazine_sanitize_switch_control',
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
) );

$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[show_header_contact_info]', array(
    'label'             => __( 'Show Contact Info', 'presazine' ),
    'section'           => 'header_contact_info_section',
    'settings'         => 'theme_options[show_header_contact_info]',
    'on_off_label'      => presazine_switch_options(),
) ) );

/** Location */
$wp_customize->add_setting( 'theme_options[header_location]', array(
    'default'           => $default['header_location'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location]',
    array(
        'label'           => __( 'Location', 'presazine' ),
        'description'     => __( 'Enter Location.', 'presazine' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'presazine_contact_info_ac',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'default'           => $default['header_phone'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'presazine' ),
        'description'     => __( 'Enter phone number.', 'presazine' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'presazine_contact_info_ac',
    )
);

/** Email */
$wp_customize->add_setting( 
    'theme_options[header_email]', 
    array(
        'default'           => $default['header_email'],
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email]',
    array(
        'label'           => __( 'Email', 'presazine' ),
        'description'     => __( 'Enter valid email address.', 'presazine' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'presazine_contact_info_ac',
    )
);


/** Header social links section */
$wp_customize->add_section(
    'header_search_section',
    array(
        'title'    => __( 'Search Form', 'presazine' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_search]',
    array(
        'default'           =>  $default['show_header_search'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'presazine_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[show_header_search]',
    array(
        'label'             => __('Show Search', 'presazine'),
        'section'           => 'header_search_section',
         'settings'         => 'theme_options[show_header_search]',
        'on_off_label'      => presazine_switch_options(),
    )
) );

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'presazine' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_social_links]',
    array(
        'default'           =>  $default['show_header_social_links'],
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'presazine_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Presazine_Switch_Control( $wp_customize, 'theme_options[show_header_social_links]',
    array(
        'label'             => __('Show Social Links', 'presazine'),
        'section'           => 'header_social_links_section',
         'settings'         => 'theme_options[show_header_social_links]',
        'on_off_label'      => presazine_switch_options(),
    )
) );

for( $i=1; $i<=4; $i++ ){

    // Setting social_links.
    $wp_customize->add_setting('theme_options[header_social_link_'.$i.']', array(
            'sanitize_callback' => 'esc_url_raw',
        ) );

    $wp_customize->add_control('theme_options[header_social_link_'.$i.']', array(
        'label'             => esc_html__( 'Social Links', 'presazine' ),
        'section'           => 'header_social_links_section',
        'active_callback'   => 'presazine_social_links_active',
        'type'              => 'url',
    ) );
}