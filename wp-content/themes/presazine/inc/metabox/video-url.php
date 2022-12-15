<?php
/**
 * Subtitle metabox file.
 *
 * @package BlogMelody
 * @since Presazine 1.0
 */

if ( ! function_exists( 'presazine_video_url_callback' ) ) :
    /** 
     * Outputs the content of the Video Url
     */
    function presazine_video_url_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'presazine_nonce' );
        $video_url = get_post_meta( $post->ID, 'presazine-video-url', true );
        ?>
        <p>
         <label for="presazine-video-url" class="presazine-row-title"><?php esc_html_e( 'Video Url', 'presazine' )?></label>
         <input class="widefat" type="url" name="presazine-video-url" id="presazine-video-url" value="<?php echo esc_url( $video_url ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'presazine_video_url_save' ) ) :
    /**
     * Saves the Video Url input
     */
    function presazine_video_url_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'presazine_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'presazine_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'presazine-video-url' ] ) ) {
            update_post_meta( $post_id, 'presazine-video-url', sanitize_text_field( wp_unslash( $_POST[ 'presazine-video-url' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'presazine_video_url_save' );

