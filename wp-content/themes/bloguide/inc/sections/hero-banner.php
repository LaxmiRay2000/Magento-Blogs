<?php
/**
 * Banner section
 *
 * This is the template for the content of hero hero_banner section
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_hero_banner_section' ) ) :
    /**
    * Add hero_banner section
    *
    *@since  Bloguide 1.0.0
    */
    function bloguide_add_hero_banner_section() {
    	$options = bloguide_get_theme_options();
        // Check if hero_banner is enabled on frontpage
        $hero_banner_enable = apply_filters( 'bloguide_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get hero_banner section details
        $section_details = array();
        $section_details = apply_filters( 'bloguide_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render hero_banner section now.
        bloguide_render_hero_banner_section( $section_details );
}

endif;

if ( ! function_exists( 'bloguide_get_hero_banner_section_details' ) ) :
    /**
    * hero_banner section details.
    *
    * @since  Bloguide 1.0.0
    * @param array $input hero_banner section details.
    */
    function bloguide_get_hero_banner_section_details( $input ) {
        $options = bloguide_get_theme_options();

        // Content type.
        $hero_banner_content_type    = $options['hero_banner_content_type'];
        
        $content = array();
        switch ( $hero_banner_content_type ) {
            
            case 'post':
                $post_id = ! empty( $options['hero_banner_content_post'] ) ? $options['hero_banner_content_post'] : '';
            
                $args = array(
                    'post_type'             => 'post',
                    'p'                     => ( int ) $post_id,
                    'ignore_sticky_posts'   => true,
                );                    
            break;

            case 'trip':
                if ( ! class_exists( 'WP_Travel' ) )
                    return;

                $page_ids = array();
                if ( ! empty( $options['hero_banner_content_trip'] ) )
                    $post_id = $options['hero_banner_content_trip'];
                
                $args = array(
                    'post_type'              => 'itineraries',
                    'p'                      => ( int ) $post_id,
                    'ignore_sticky_posts'    => true,

                );                    
            break;


            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = bloguide_trim_content(15);
                $page_post['url']       = get_the_permalink( );
                $page_post['image']     = !empty(get_the_post_thumbnail_url( )) ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
                // Push to the main array.
                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// hero_banner section content details.
add_filter( 'bloguide_filter_hero_banner_section_details', 'bloguide_get_hero_banner_section_details' );


if ( ! function_exists( 'bloguide_render_hero_banner_section' ) ) :
  /**
   * Start hero_banner section
   *
   * @return string hero_banner content
   * @since  Bloguide 1.0.0
   *
   */
   function bloguide_render_hero_banner_section( $content_details = array() ) {
        $options = bloguide_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }
        $content = $content_details[0]; ?>
        
        <div id="bloguide_hero_banner_section">
            <div class="wrapper">
                <div class="featured-wrapper">
                    <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']); ?>');"></div>
                    <div class="read-more">
                        <?php if( !empty($options['hero_banner_btn_txt']) ): ?>
                            <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html($options['hero_banner_btn_txt']); ?></a>
                        <?php endif; ?>
                        <?php if( !empty($options['hero_banner_alt_btn_txt']) && !empty($options['hero_banner_alt_btn_url'])) : ?>
                            <a href="<?php echo esc_url($options['hero_banner_alt_btn_url']); ?>" class="btn"><?php echo esc_html($options['hero_banner_alt_btn_txt']); ?></a>
                        <?php endif; ?>
                    </div><!-- .read-more -->
                </div><!-- .featured-wrapper -->

                <div class="hero-content-wrapper">
                    <div class="section-header">
                        <span><?php echo esc_html($options['hero_banner_sub_title']); ?></span>
                        <h2 class="section-title"><?php echo esc_html($content['title']); ?></h2>
                    </div><!-- .section-header -->
                    
                    <?php if(class_exists('WP_Travel')) : ?>
                        <div class="travel-search-wrapper">
                            <div class="wp-travel-search">
                                <?php wptravel_search_form(); ?>
                            </div>
                        </div><!-- .travel-search-wrapper -->
                    <?php endif; ?>

                    <div class="entry-content">
                        <p><?php echo esc_html($content['excerpt']); ?></p>
                    </div><!-- .entry-content -->

                </div><!-- .hero-content-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #bloguide_hero_banner_section -->

<?php
    }    
endif;