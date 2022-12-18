<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function bloguide_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function bloguide_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}
/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function bloguide_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function bloguide_give_choices() {
    $posts = get_posts( array( 'numberposts' => -1 , 'post_type' => 'give_forms' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function bloguide_product_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function bloguide_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function bloguide_product_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'product_cat',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'bloguide' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'bloguide_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function bloguide_site_layout() {
        $bloguide_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'bloguide_site_layout', $bloguide_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'bloguide_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function bloguide_selected_sidebar() {
        $bloguide_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'bloguide' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'bloguide' ),
        );

        $output = apply_filters( 'bloguide_selected_sidebar', $bloguide_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'bloguide_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function bloguide_global_sidebar_position() {
        $bloguide_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'bloguide_global_sidebar_position', $bloguide_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'bloguide_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function bloguide_sidebar_position() {
        $bloguide_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar-content'    => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'bloguide_sidebar_position', $bloguide_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'bloguide_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function bloguide_pagination_options() {
        $bloguide_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'bloguide' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'bloguide' ),
        );

        $output = apply_filters( 'bloguide_pagination_options', $bloguide_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'bloguide_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function bloguide_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'bloguide' ),
            'off'       => esc_html__( 'Disable', 'bloguide' )
        );
        return apply_filters( 'bloguide_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'bloguide_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function bloguide_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'bloguide' ),
            'off'       => esc_html__( 'No', 'bloguide' )
        );
        return apply_filters( 'bloguide_hide_options', $arr );
    }
endif;



if ( ! function_exists( 'bloguide_hero_banner_content_type' ) ) :
    /**
     * Product Options
     * @return array site product options
     */
    function bloguide_hero_banner_content_type() {
        $bloguide_hero_banner_content_type = array(
			'post' 		=> esc_html__( 'Post', 'bloguide' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $bloguide_hero_banner_content_type = array_merge( $bloguide_hero_banner_content_type,
                array(
                    'trip'          => esc_html__( 'Trip', 'bloguide' ),
                )
            );
        }

        $output = apply_filters( 'bloguide_hero_banner_content_type', $bloguide_hero_banner_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'bloguide_wp_travel_content_type' ) ) :
    /**
     * Destination Options
     * @return array site Destination options
     */
    function bloguide_wp_travel_content_type() {
        $bloguide_wp_travel_content_type = array(
           'post'      => esc_html__( 'Post', 'bloguide' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $bloguide_wp_travel_content_type = array_merge( $bloguide_wp_travel_content_type,
                array(
                    'trip'          => esc_html__( 'Trip', 'bloguide' ),
                )
            );
        }

        $output = apply_filters( 'bloguide_wp_travel_content_type', $bloguide_wp_travel_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'bloguide_typography_options' ) ) :
    function bloguide_typography_options(){
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'bloguide' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
     // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '+', $family_str_arr );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return $font_family_arr;
}
endif;