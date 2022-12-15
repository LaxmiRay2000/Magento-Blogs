<?php
/**
 * About metabox file.
 *
 * @package Presazine
 * @since Presazine 1.0
 */

if ( ! function_exists( 'presazine_about_meta_callback' ) ) :
    /** 
     * Outputs the content of the About Meta
     */
    function presazine_about_meta_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'presazine_nonce' );
        $about_meta = get_post_meta( $post->ID, 'presazine-about-meta', true );
        ?>
        <p>
         <label for="presazine-about-meta" class="presazine-row-title"><?php esc_html_e( 'About Meta', 'presazine' )?></label>
         <input class="widefat" type="text" name="presazine-about-meta" id="presazine-about-meta" value="<?php echo esc_html( $about_meta ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'presazine_about_meta_save' ) ) :
    /**
     * Saves the About Meta input
     */
    function presazine_about_meta_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'presazine_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'presazine_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'presazine-about-meta' ] ) ) {
            update_post_meta( $post_id, 'presazine-about-meta', sanitize_text_field( wp_unslash( $_POST[ 'presazine-about-meta' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'presazine_about_meta_save' );

