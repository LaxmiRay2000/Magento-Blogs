<?php
/**
 * Articles Section options
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */

// Add Articles section
$wp_customize->add_section( 'bloguide_articles_section',
    array(
        'title'             => esc_html__( 'Articles','bloguide' ),
        'description'       => esc_html__( 'Articles Section options.', 'bloguide' ),
        'panel'             => 'bloguide_front_page_panel',
    )
);

// Articles content enable control and setting
$wp_customize->add_setting( 'bloguide_theme_options[articles_section_enable]',
    array(
        'default'           =>  $options['articles_section_enable'],
        'sanitize_callback' => 'bloguide_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Bloguide_Switch_Control( $wp_customize,
    'bloguide_theme_options[articles_section_enable]',
        array(
            'label'             => esc_html__( 'Articles Section Enable', 'bloguide' ),
            'section'           => 'bloguide_articles_section',
            'on_off_label'      => bloguide_switch_options(),
        ) 
    )
);

// latest_post title setting and control
$wp_customize->add_setting( 'bloguide_theme_options[articles_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['articles_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'bloguide_theme_options[articles_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'bloguide' ),
        'section'           => 'bloguide_articles_section',
        'active_callback'   => 'bloguide_is_articles_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[articles_title]',
        array(
            'selector'            => '#bloguide_blog_sections .section-header h2',
            'settings'            => 'bloguide_theme_options[articles_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'bloguide_articles_title_partial',
        )
    );
}

// Event social icons number control and setting
$wp_customize->add_setting( 'bloguide_theme_options[articles_count]',
    array(
        'default'           => $options['articles_count'],
        'sanitize_callback' => 'bloguide_sanitize_number_range',
        'validate_callback' => 'bloguide_validate_articles_count',
    )
);

$wp_customize->add_control( 'bloguide_theme_options[articles_count]',
    array(
        'label'             => esc_html__( 'Number of Posts', 'bloguide' ),
        'description'       => esc_html__( 'Note: Min 2 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'bloguide' ),
        'section'           => 'bloguide_articles_section',
        'active_callback'   => 'bloguide_is_articles_section_enable',
        'type'              => 'number',
        'input_attrs'       => array(
            'min'   => 2,
            'max'   => 12,
            'style' => 'width: 100px;'
        ),
    )
);

// Articles content type control and setting
$wp_customize->add_setting( 'bloguide_theme_options[articles_content_type]',
    array(
        'default'           => $options['articles_content_type'],
        'sanitize_callback' => 'bloguide_sanitize_select',
    )
);

$wp_customize->add_control( 'bloguide_theme_options[articles_content_type]',
    array(
        'label'             => esc_html__( 'Content Type', 'bloguide' ),
        'section'           => 'bloguide_articles_section',
        'type'              => 'select',
        'active_callback'   => 'bloguide_is_articles_section_enable',
        'choices'           => array( 
            'post'      => esc_html__( 'Post', 'bloguide' ),
            'recent'    => esc_html__( 'Recent', 'bloguide' ),
        ),
    ) 
);

for ( $i = 1; $i <= $options['articles_count']; $i++ ) :

    // latest_post posts drop down chooser control and setting
    $wp_customize->add_setting( 'bloguide_theme_options[articles_content_post_' . $i . ']',
        array(
            'sanitize_callback' => 'bloguide_sanitize_page',
        )
    );

    $wp_customize->add_control( new Bloguide_Dropdown_Chooser( $wp_customize,
        'bloguide_theme_options[articles_content_post_' . $i . ']',
            array(
                'label'             => sprintf( esc_html__( 'Select Post %d', 'bloguide' ), $i ),
                'section'           => 'bloguide_articles_section',
                'choices'           => bloguide_post_choices(),
                'active_callback'   => 'bloguide_is_articles_section_content_post_enable',
            ) 
        )
    );

    //latest_post separator
    $wp_customize->add_setting('bloguide_theme_options[articles_separator'. $i .']',
        array(
            'sanitize_callback'      => 'bloguide_sanitize_html',
        )
    );

    $wp_customize->add_control(new Bloguide_Customize_Horizontal_Line($wp_customize,
        'bloguide_theme_options[articles_separator'. $i .']',
            array(
                'active_callback'       => 'bloguide_is_articles_section_separator_enable',
                'type'                  =>'hr',
                'section'               =>'bloguide_articles_section',
            )
        )
    );
    
endfor;

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'bloguide_theme_options[articles_category_exclude]',
    array(
        'sanitize_callback' => 'bloguide_sanitize_category_list',
    )
);

$wp_customize->add_control( new Bloguide_Dropdown_Multiple_Chooser( $wp_customize,
    'bloguide_theme_options[articles_category_exclude]',
        array(
            'label'             => esc_html__( 'Select Excluding Categories', 'bloguide' ),
            'section'           => 'bloguide_articles_section',
            'type'              => 'dropdown_multiple_chooser',
            'choices'           =>  bloguide_category_choices(),
            'active_callback'   => 'bloguide_is_articles_section_content_recent_enable'
        )
    )
);

//articles_btn_txt
$wp_customize->add_setting('bloguide_theme_options[articles_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['articles_btn_txt'],
    )
);

$wp_customize->add_control('bloguide_theme_options[articles_btn_txt]',
    array(
        'section'			=> 'bloguide_articles_section',
        'label'				=> esc_html__( 'Read More Button Label:', 'bloguide' ),
        'type'          	=>'text',
        'active_callback' 	=> 'bloguide_is_articles_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'bloguide_theme_options[articles_btn_txt]',
		array(
			'selector'            => '#bloguide_blog_sections div.entry-content div.read-more a',
			'settings'            => 'bloguide_theme_options[articles_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'bloguide_articles_btn_txt_partial',
		)
	);
}
