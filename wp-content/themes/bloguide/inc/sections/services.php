<?php
/**
 * Services section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_services_section' ) ) :
    /**
    * Add service section
    *
    *@since  Bloguide 1.0.0
    */
    function bloguide_add_services_section() {
    	$options = bloguide_get_theme_options();
        // Check if service is enabled on frontpage
        $services_enable = apply_filters( 'bloguide_section_status', true, 'services_section_enable' );

        if ( true !== $services_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'bloguide_filter_services_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        bloguide_render_services_section( $section_details );
    }
endif;

if ( ! function_exists( 'bloguide_get_services_section_details' ) ) :
    /**
    * service section details.
    *
    * @since  Bloguide 1.0.0
    * @param array $input service section details.
    */
    function bloguide_get_services_section_details( $input ) {
        $options = bloguide_get_theme_options();

        // Content type.
        $services_posts_count = ! empty( $options['services_posts_count'] ) ? $options['services_posts_count'] : 3;
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= $services_posts_count; $i++ ) {
            if ( ! empty( $options['services_content_page_' . $i] ) )
                $page_ids[] = $options['services_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $services_posts_count ),
            'orderby'           => 'post__in',
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['content']   = bloguide_trim_content($options['services_excerpt_length']);
                $page_post['url']       = get_the_permalink();

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
// service section content details.
add_filter( 'bloguide_filter_services_section_details', 'bloguide_get_services_section_details' );


if ( ! function_exists( 'bloguide_render_services_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since  Bloguide 1.0.0
   *
   */
   function bloguide_render_services_section( $content_details = array() ) {
        $options    = bloguide_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
            <div id="bloguide_service_section" class="page-section">
                <div class="wrapper">
                    <div class="section-content col-3">
                        <?php foreach($content_details as $i=>$content) :?>
                        <article>
                            <div class="service-item-wrapper">
                                <div class="icon-container">
                                    <a href="<?php echo esc_url($content['url']); ?>">
                                        <i class="fa <?php echo esc_attr( !empty( $options['services_icon_' . (absint($i)+1)] ) ? $options['services_icon_' . (absint($i)+1)] : 'fa-edit' ); ?>"></i>
                                    </a>
                                </div><!-- .icon-container -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['content']); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- service-item-wrapper -->
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div><!-- .wrapper -->
            </div><!-- #bloguide_gallery_section -->
      
    <?php
    }    
endif; ?>
