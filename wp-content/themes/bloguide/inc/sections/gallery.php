<?php
/**
 * Gallery section
 *
 * This is the template for the content of Gallery section
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_gallery_section' ) ) :
    /**
    * Add Gallery section
    *
    *@since  Bloguide 1.0.0
    */
    function bloguide_add_gallery_section() {
        $options = bloguide_get_theme_options();
        // Check if Gallery is enabled on frontpage
        $gallery_enable = apply_filters( 'bloguide_section_status', true, 'gallery_section_enable' );

        if ( true !== $gallery_enable ) {
            return false;
        }
        // Get Gallery section details
        $section_details = array();
        $section_details = apply_filters( 'bloguide_filter_gallery_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render Gallery section now.
        bloguide_render_gallery_section( $section_details );
    }
endif;

if ( ! function_exists( 'bloguide_get_gallery_section_details' ) ) :
    /**
    * Gallery section details.
    *
    * @since  Bloguide 1.0.0
    * @param array $input Gallery section details.
    */
    function bloguide_get_gallery_section_details( $input ) {
        $options = bloguide_get_theme_options();

        // Content type.
        $gallery_count = ! empty( $options['gallery_count'] ) ? $options['gallery_count'] : 5;
        
        $content = array();

        $cat_id = ! empty( $options['gallery_content_category'] ) ? $options['gallery_content_category'] : '';
        
        $args = array(
            'post_type'             => 'post',
            'posts_per_page'        => absint( $gallery_count ),
            'cat'                   => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
        );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = !empty(get_the_post_thumbnail_url( get_the_id() )) ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// gallery section content details.
add_filter( 'bloguide_filter_gallery_section_details', 'bloguide_get_gallery_section_details' );


if ( ! function_exists( 'bloguide_render_gallery_section' ) ) :
  /**
   * Start gallery section
   *
   * @return string gallery content
   * @since  Bloguide 1.0.0
   *
   */
   function bloguide_render_gallery_section( $content_details = array() ) {
        $options                = bloguide_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="bloguide_gallery_section" class="page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html($options['gallery_title']); ?></h2>
                </div><!-- .section-header -->

                <div class="section-content">
                    <div class="grid">
                        <?php foreach($content_details as $i => $content) : ?>
                        <article class="grid-item">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <div class="overlay"></div>
                            </div>
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                </header>

                                <div class="entry-meta">
                                    <?php bloguide_posted_on($content['id']); ?>
                                    <?php echo bloguide_author($content['id']); ?>
                                </div>
                            </div><!-- .entry-container -->
                        </article>
                        <?php endforeach; ?>
                    </div><!-- .grid-item -->
                </div>
            </div><!-- .wrapper -->
        </div><!-- #bloguide_gallery_section -->

    <?php }
endif;  ?>
