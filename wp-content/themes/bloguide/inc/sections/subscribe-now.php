<?php
/**
 * Subscribe_now section
 *
 * This is the template for the content of subscribe_now section
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_subscribe_now_section' ) ) :
    /**
    * Add subscribe_now section
    *
    *@since Bloguide 1.0.0
    */
    function bloguide_add_subscribe_now_section() {
        $options = bloguide_get_theme_options();
        if ( ! class_exists( 'Jetpack' ) ) {
            return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
                return;
        }

        // Check if subscribe_now is enabled on frontpage
        $subscribe_now_enable = apply_filters( 'bloguide_section_status', true, 'subscribe_now_section_enable' );

        if ( true !== $subscribe_now_enable ) {
            return false;
        }
        // Render subscribe_now section now.
        bloguide_render_subscribe_now_section();
    }
endif;

if ( ! function_exists( 'bloguide_render_subscribe_now_section' ) ) :
  /**
   * Start subscribe_now section
   *
   * @return string subscribe_now content
   * @since Bloguide 1.0.0
   *
   */
   function bloguide_render_subscribe_now_section() {
        $options = bloguide_get_theme_options();
        $subscribe_btn_title   = ! empty( $options['subscribe_now_section_btn_txt'] ) ? $options['subscribe_now_section_btn_txt'] : esc_html__( 'Submit Now', 'bloguide' ); ?>

            <div id="bloguide_subscribe_now" class="relative page-section">
                <div class="wrapper">
                    <div class="section-header">
                        <?php if ( ! empty( $options['subscribe_now_section_subtitle'] ) ) : ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['subscribe_now_section_subtitle'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $options['subscribe_now_section_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['subscribe_now_section_title'] ); ?></h2>
                        <?php endif; ?> 
                    </div><!-- .section-header -->

                    <div class="subscribe-form-wrapper">
                    <?php 
                        $subscribe_now_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $subscribe_btn_title ) . '" show_subscribers_total="0"]';
                        echo do_shortcode( wp_kses_post( $subscribe_now_shortcode ) );
                        ?>
                    </div><!-- .subscribe-form-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- #subscribe-now -->

    <?php
    }
endif; ?>
