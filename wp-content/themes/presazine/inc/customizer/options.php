<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function presazine_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'presazine' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'presazine_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function presazine_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'presazine' ),
            'off'       => esc_html__( 'Disable', 'presazine' )
        );
        return apply_filters( 'presazine_switch_options', $arr );
    }
endif;

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function presazine_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'presazine' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}


 /**
 * Get an array of google fonts.
 * 
 */
function presazine_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'presazine' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'presazine_font_choices', $font_family_arr );
}

if ( ! function_exists( 'presazine_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function presazine_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'presazine' ),
            'header-font-1'   => esc_html__( 'Raleway', 'presazine' ),
            'header-font-2'   => esc_html__( 'Poppins', 'presazine' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'presazine' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'presazine' ),
            'header-font-5'   => esc_html__( 'Lato', 'presazine' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'presazine' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'presazine' ),
            'header-font-8'   => esc_html__( 'Lora', 'presazine' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'presazine' ),
            'header-font-10'   => esc_html__( 'Muli', 'presazine' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'presazine' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'presazine' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'presazine' ),
            'header-font-14'   => esc_html__( 'Cairo', 'presazine' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'presazine' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'presazine' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'presazine' ),
            'header-font-18'   => esc_html__( 'Fredericka', 'presazine' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'presazine' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'presazine' ),
        );

        $output = apply_filters( 'presazine_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'presazine_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function presazine_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'presazine' ),
            'body-font-1'     => esc_html__( 'Raleway', 'presazine' ),
            'body-font-2'     => esc_html__( 'Poppins', 'presazine' ),
            'body-font-3'     => esc_html__( 'Roboto', 'presazine' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'presazine' ),
            'body-font-5'     => esc_html__( 'Lato', 'presazine' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'presazine' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'presazine' ),
            'body-font-8'   => esc_html__( 'Lora', 'presazine' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'presazine' ),
            'body-font-10'   => esc_html__( 'Muli', 'presazine' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'presazine' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'presazine' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'presazine' ),
            'body-font-14'   => esc_html__( 'Cairo', 'presazine' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'presazine' ),
        );

        $output = apply_filters( 'presazine_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>