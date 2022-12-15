<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Presazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function presazine_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$homepage_layout_options = presazine_get_option('homepage_layout_options');
	$classes[] = esc_attr( $homepage_layout_options );

	$header_layout_options = presazine_get_option('header_layout_options');
	$classes[] = esc_attr( $header_layout_options );

	$homepage_design_layout_options = presazine_get_option('homepage_design_layout_options');
	$classes[] = esc_attr( $homepage_design_layout_options );

	$header_text_hover = presazine_get_option('header_text_hover');
	$classes[] = esc_attr( $header_text_hover );

	$menu_text_hover = presazine_get_option('menu_text_hover');
	$classes[] = esc_attr( $menu_text_hover );

	if (true == presazine_get_option('menu_sticky')) {
		$classes[] = 'menu-sticky';
	}

	if (is_front_page() && (false == presazine_get_option('disable_blog_banner_section')  || true == presazine_get_option('disable_featured-slider_section'))){
		$classes[] = 'blog-banner-disable';
	}
	if (false == presazine_get_option( 'disable_about_section' )){
		$classes[] = 'disable-about-section';
	}
	if ( is_front_page() || is_home() ) {
		$slider_content_position_option = presazine_get_option('slider_content_position_option');
		$classes[] = esc_attr( $slider_content_position_option );
	}
	if ( is_front_page() || is_home() ) {
		$newsfeatured_layout = presazine_get_option('newsfeatured_layout_option');
		$classes[] = esc_attr( $newsfeatured_layout );
	}
	if ( is_front_page() || is_home() ) {
		$featured_layout = presazine_get_option('featured_layout_option');
		$classes[] = esc_attr( $featured_layout );
	}
	if ( is_front_page() || is_home() ) {
		$about_layout = presazine_get_option('about_layout_option');
		$classes[] = esc_attr( $about_layout );
	}
	if ( is_front_page() || is_home() ) {
		$homepage_sidebar_position = presazine_get_option('homepage_sidebar_position');
		$classes[] = esc_attr( $homepage_sidebar_position );
	}
	if ( is_front_page() || is_home() ) {
		$trending_layout = presazine_get_option('trending_layout_option');
		$classes[] = esc_attr( $trending_layout );
	}
	if ( is_front_page() || is_home() ) {
		$slider_layout = presazine_get_option('slider_layout_option');
		$classes[] = esc_attr( $slider_layout );
	} 
	if (is_single() && false == presazine_get_option( 'single_post_header_image_enable' )){
		$classes[] = 'disable-single-post-header';
	}
	if (is_page() && false == presazine_get_option( 'single_page_header_image_enable' )){
		$classes[] = 'disable-single-page-header';
	}
	if ( is_home() ) {
		$sidebar_layout_blog = presazine_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $sidebar_layout_blog );
		if (false == presazine_get_option( 'blog_post_header_title_enable' )) {
			$classes[] = 'disable-blog-post-header-title';
		}
	}

	if( is_archive() ) {
		$sidebar_layout_archive = presazine_get_option('layout_options_archive'); 
		$classes[] = esc_attr( $sidebar_layout_archive );
		if (false == presazine_get_option( 'archive_post_header_title_enable' )) {
			$classes[] = 'disable-archive-post-header-title';
		}
	}

	if( is_search() ) {
		$sidebar_layout_archive = presazine_get_option('layout_options_archive'); 
		$classes[] = esc_attr( $sidebar_layout_archive );
	}

	if( is_page() ) {
		$sidebar_layout_page = presazine_get_option('layout_options_page'); 
		$classes[] = esc_attr( $sidebar_layout_page );
		if (false == presazine_get_option( 'single_page_header_title_enable' )) {
			$classes[] = 'disable-single-page-header-title';
		}
	}

	if( is_single() ) {
		$sidebar_layout_single = presazine_get_option('layout_options_single'); 
		$classes[] = esc_attr( $sidebar_layout_single );
		if (false == presazine_get_option( 'single_post_header_title_enable' )) {
			$classes[] = 'disable-single-post-header-title';
		}
	}

	if( is_archive() || is_search() || is_home() ) {
		$blog_layout_content_type = presazine_get_option('blog_layout_content_type'); 
		$classes[] = esc_attr( $blog_layout_content_type );
	}

	if( is_archive() || is_home() ) {
		$archive_header_image_condition = presazine_get_option( 'archive_post_header_image_enable' );
		if ($archive_header_image_condition==false) {
			$classes[] = 'disable-archive-header-image';
		}
	}



		// Add a class for typography
	$typography = (  presazine_get_option('theme_typography') == 'default' ) ? '' :  presazine_get_option('theme_typography');
	$classes[] = esc_attr( $typography );

	$body_typography = (  presazine_get_option('body_theme_typography') == 'default' ) ? '' :  presazine_get_option('body_theme_typography');
	$classes[] = esc_attr( $body_typography );


	return $classes;
}
add_filter( 'body_class', 'presazine_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function presazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'presazine_pingback_header' );

/**
 * Function to get Sections 
 */
function presazine_get_sections() {
	$homepage_design_layout     = presazine_get_option( 'homepage_design_layout_options' );

	if ($homepage_design_layout=='home-magazine') {
    	$sections = array(  'headlines','hero', 'galleryview', 'recent', 'ads', 'trending', 'travel','adssec', 'mustread');
    }

    if ($homepage_design_layout=='home-blog') {
	    $sections = array(  'featured-slider', 'galleryview', 'ads', 'popular', 'mustread');
	}

    if ($homepage_design_layout=='home-normal-magazine') {
	    $sections = array( 'headlines', 'featured-slider', 'galleryview','about', 'ads','travel', 'mustread');
	}
    if ($homepage_design_layout=='home-normal-blog') {
	    $sections = array( 'featured-slider','message', 'galleryview', 'travel');
	}
    if ($homepage_design_layout=='home-business') {
	    $sections = array( 'featured-slider','services','message','cta','team','testimonial','mustread');
	}


	    $enabled_section = array();
	    foreach ( $sections as $section ){
	    	
	        if (true == presazine_get_option('disable_'.$section.'_section')){
	            $enabled_section[] = array(
	                'id' => $section,
	                'menu_text' => esc_html( presazine_get_option('' . $section . '_menu_title','') ),
	            );
	        }
	    }
	    return $enabled_section;
	
    
}

if ( ! function_exists( 'presazine_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function presazine_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'Presazine_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class Presazine_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='presazine-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'presazine-radio-img-selected presazine-radio-img-img' : 'presazine-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
								$this->link();
								checked($this->value(), $value);
								?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	
