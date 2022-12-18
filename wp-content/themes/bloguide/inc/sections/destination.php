<?php
/**
 *  Destination section
 *
 * This is the template for the content of popular Destination section
 *
 * @package Theme Palace
 * @subpackage Bloguide
 * @since Bloguide 1.0.0
 */
if ( ! function_exists( 'bloguide_add_destination_section' ) ) :
	/**
	* Add popular Destination section
	*
	*@since Bloguide 1.0.0
	*/
	function bloguide_add_destination_section() {
		$options = bloguide_get_theme_options();

		// Check if Destination is enabled on frontpage
		$destination_enable = apply_filters( 'bloguide_section_status', true, 'destination_section_enable' );

		if ( true !== $destination_enable ) {
			return false;
		}
		// Get Destination section details
		$section_details = array();
		$section_details = apply_filters( 'bloguide_filter_destination_section_details', $section_details );
		if ( empty( $section_details ) ) {
			return;
		}

		// Render Destination section now.
		bloguide_render_destination_section( $section_details );
	}
endif;

if ( ! function_exists( 'bloguide_get_destination_section_details' ) ) :
	/**
	*  Destination section details.
	*
	* @since Bloguide 1.0.0
	* @param array $input popular destination section details.
	*/
	function bloguide_get_destination_section_details( $input ) {
		$options = bloguide_get_theme_options();

		// Content type.
		$destination_content_type  = $options['destination_content_type'];
		$destination_count  = $options['destination_count'];
		
		$content 		= array();
		$args 			= array();
        $content['cats'] = array();
		switch ( $destination_content_type ) {


            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $destination_count ; $i++ ) {
                    if ( ! empty( $options['destination_content_post_' . $i] ) )
                        $post_ids[] = $options['destination_content_post_' . $i];
                }
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( $destination_count ),
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
		
			case 'trip':
                if ( ! class_exists( 'WP_Travel' ) )
                    return;

                $page_ids = array();

                for ( $i = 1; $i <= $destination_count ; $i++ ) {
                    if ( ! empty( $options['destination_content_trip_' . $i] ) )
                        $page_ids[] = $options['destination_content_trip_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'itineraries',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $destination_count ),
                    'orderby'           => 'post__in',
                    );   

                $content['taxonomy'] = 'travel_locations';

            break;

			default:
			break;
		}

		$content['details'] = array();
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) : $query->the_post();
				$page_post['id']        = get_the_id();
				$page_post['title']     = get_the_title();
				$page_post['url']       = get_the_permalink();
				$page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
				// Push to the main array.
				array_push( $content['details'], $page_post );
			endwhile;
		endif;

		wp_reset_postdata();
		if ( ! empty( $content ) ) {
				$input = $content;
		}
		return $input;
	}
endif;

// Destination section content details.
add_filter( 'bloguide_filter_destination_section_details', 'bloguide_get_destination_section_details' );


if ( ! function_exists( 'bloguide_render_destination_section' ) ) :
	/**
	 * Start Destination section
	 *
	 * @return string Destination content
	 * @since Bloguide 1.0.0
	 *
	 */
	 function bloguide_render_destination_section( $content_details = array() ) {
		$options = bloguide_get_theme_options();

		$destination_content_type  	= $options['destination_content_type'];
		$destination_title 		= !empty($options['destination_title']) ? $options['destination_title'] : '';
		$content_detail = $content_details['details'];
		if ( empty( $content_detail ) ) {
			return;
		} ?>


		<div id="bloguide_destination_section" class="page-section same-background relative">
			<div class="wrapper">
				<div class="section-header">
					<h2 class="section-title"><?php echo esc_html($options['destination_title']); ?></h2>
				</div><!-- .section-header -->

				<div class="section-content">
					<div class="half-width">
						<?php foreach($content_detail as $i=>$content) : if($i==4) break; ?>
						<article>
							<div class="featured-image" style="background-image:url('<?php echo esc_url($content['image']); ?>');"></div>

							<div class="entry-container">
								<span class="cat-links">
									<?php the_category('', '', $content['id']); ?>
								</span>

								<header class="entry-header">
									<h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
								</header>

								<div class="entry-meta">
									<?php bloguide_posted_on($content['id']); ?>
									<?php bloguide_author($content['id']); ?>
								</div><!-- .entry-meta -->
							</div>
						</article>
						<?php endforeach; ?>
					</div>
					<?php if(array_key_exists(4,$content_detail)) : ?>
					<div class="full-width">
						<article>
							<div class="featured-image" style="background-image:url('<?php echo esc_url($content_detail[4]['image']); ?>');">
							<div class="overlay"></div>
								<div class="entry-container">
									<span class="cat-links">
										<?php the_category('', '', $content_detail[4]['id']); ?>
									</span>

									<header class="entry-header">
										<h2 class="entry-title"><a href="<?php echo esc_url( $content_detail[4]['url'] ); ?>"><?php echo esc_html( $content_detail[4]['title'] ); ?></a></h2>
									</header>

									<div class="entry-meta">
										<?php bloguide_posted_on($content_detail[4]['id']); ?>
										<?php bloguide_author($content_detail[4]['id']); ?>
									</div><!-- .entry-meta -->

									<div class="read-more">
										<a href="<?php echo esc_url( $content_detail[4]['url'] ); ?>" class="btn"><?php echo esc_html($options['destination_btn_label']); ?></a>
									</div>
								</div>
							</div>
						</article>
					</div><!-- .full width -->
					<?php endif; 
					$content_detail = array_slice($content_detail, 5);
					if(count($content_detail) != 0): ?>
					<div class="half-width">
						<?php foreach($content_detail as $i=>$content) : ?>
						<article>
							<div class="featured-image" style="background-image:url('<?php echo esc_url($content['image']); ?>');"></div>
							<div class="entry-container">
								<span class="cat-links">
									<?php the_category('', '', $content['id']); ?>
								</span>

								<header class="entry-header">
									<h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
								</header>

								<div class="entry-meta">
									<?php bloguide_posted_on($content['id']); ?>
									<?php bloguide_author($content['id']); ?>
								</div><!-- .entry-meta -->
							</div>
						</article>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
			</div><!-- .wrapper -->
		</div><!-- #bloguide_destination_section -->

<?php }
endif;