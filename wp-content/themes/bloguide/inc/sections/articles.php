<?php
/**
 * Top Stories section
 *
 * This is the template for the content of Top Stories section
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_articles_section' ) ) :
    /**
    * Add Top Stories section
    *
    *@since  Bloguide 1.0.0
    */
    function bloguide_add_articles_section() {
        $options = bloguide_get_theme_options();
        // Check if Top Stories is enabled on frontpage
        $articles_enable = apply_filters( 'bloguide_section_status', true, 'articles_section_enable' );

        if ( true !== $articles_enable ) {
            return false;
        }
        // Get Top Stories section details
        $section_details = array();
        $section_details = apply_filters( 'bloguide_filter_articles_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        // Render Top Stories section now.
        bloguide_render_articles_section( $section_details );
    }
endif;

if ( ! function_exists( 'bloguide_get_articles_section_details' ) ) :
    /**
    * Top Stories section details.
    *
    * @since  Bloguide 1.0.0
    * @param array $input articles section details.
    */
    function bloguide_get_articles_section_details( $input ) {
        $options = bloguide_get_theme_options();

        // Content type.
        $articles_content_type  = $options['articles_content_type'];
        $articles_count = ! empty( $options['articles_count'] ) ? $options['articles_count'] : 6;
        
        
        $content = array();
        switch ( $articles_content_type ) {
 
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $articles_count; $i++ ) {
                    if ( ! empty( $options['articles_content_post_' . $i] ) )
                        $post_ids[] = $options['articles_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( $articles_count ),
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['articles_category_exclude'] ) ? $options['articles_category_exclude'] : array();
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => absint( $articles_count ),
                    'category__not_in'      => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
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
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = bloguide_trim_content( $options['articles_excerpt_length']);
                $page_post['image']     = !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
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
// Top Stories section content details.
add_filter( 'bloguide_filter_articles_section_details', 'bloguide_get_articles_section_details' );


if ( ! function_exists( 'bloguide_render_articles_section' ) ) :
  /**
   * Start Top Stories section
   *
   * @return string Top Stories content
   * @since  Bloguide 1.0.0
   *
   */
   function bloguide_render_articles_section( $content_details = array() ) {
        $options                = bloguide_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>
        
            <div id="bloguide_blog_sections" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html($options['articles_title']); ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content clear archive-blog-wrapper list-view">
                    <?php foreach($content_details as $i=>$content) : ?>
                        <article class="has-post-thumbnail">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url($content['image']);?>');">
                                <a href="<?php echo esc_url($content['url']);?>" class="post-thumbnail-link" title="<?php echo esc_attr($content['title']);?>"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <?php the_category('', '', $content['id']); ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']);?>" tabindex="0"><?php echo esc_html($content['title']) ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->

                                <div class="entry-meta">
                                    <?php bloguide_posted_on($content['id']); ?>
                                    <?php bloguide_author($content['id']); ?>
                                </div><!-- .entry-meta --> 

                                <div class="read-more">
                                    <a href="<?php echo esc_url($content['url']);?>" class="btn"><?php echo esc_html( $options['articles_btn_txt'] ); ?></a>
                                </div>

                            </div><!-- .entry-container -->
                        </article>
                        <?php endforeach; ?>

                    </div><!-- .section-content -->

                </div><!-- .wrapper -->
            </div><!-- #bloguide_blog_sections -->

            
    <?php }
endif;  ?>
