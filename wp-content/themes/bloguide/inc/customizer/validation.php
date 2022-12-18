<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage  Bloguide
* @since  Bloguide 1.0.0
*/

if ( ! function_exists( 'bloguide_validate_long_excerpt' ) ) :
    function bloguide_validate_long_excerpt( $validity, $value ){
        $value = intval( $value );
        if ( empty( $value ) || ! is_numeric( $value ) ) {
            $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'bloguide' ) );
        } elseif ( $value < 5 ) {
            $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'bloguide' ) );
        } elseif ( $value > 100 ) {
            $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'bloguide' ) );
        }
        return $validity;
    }
endif;


