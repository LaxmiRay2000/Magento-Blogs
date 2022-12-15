<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'presazine_blog_enqueue_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function presazine_blog_enqueue_styles() {
        wp_enqueue_style( 'presazine-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'presazine-blog-style', get_stylesheet_directory_uri() . '/style.css', array( 'presazine-style-parent' ), '1.0.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'presazine_blog_enqueue_styles', 99 );

/**
 * Register custom fonts.
 */
function presazine_blog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lota, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lota font: on or off', 'presazine-blog' ) ) {
		$fonts[] = 'Lota';
	}


	/* translators: If there are characters in your language that are not supported by Marck Script, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Marck Script font: on or off', 'presazine-blog' ) ) {
		$fonts[] = 'Marck Script';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

if ( ! function_exists( 'presazine_blog_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
function presazine_blog_get_default_theme_options() {

    $theme_data = wp_get_theme();
    $defaults = array();

    $defaults['show_header_contact_info'] 	= false;
		$defaults['disable_homepage_content_section'] 			= true;
	    $defaults['header_email']             	= __( 'info@sensationaltheme.com','presazine-blog' );
	    $defaults['header_phone' ]            	= __( '+1-541-754-3010','presazine-blog' );
	    $defaults['header_location' ]           = __( 'London, UK','presazine-blog' );
	    $defaults['show_header_social_links'] 	= false;
	    $defaults['header_social_links']		= array();
	    $defaults['disable_header_background_section'] = false;
	    $defaults['show_header_search'] 	= false;
	    $defaults['show_current_date'] 	= false;


	    $defaults['menu_text_hover'] 	= 'menu-hover-none';
	    $defaults['header_text_hover'] 	= 'title-hover-none';
	    $defaults['header_text_transform_options'] 	= 'none';
	    $defaults['header_text_decoration_options'] 	= 'none';
	    $defaults['header_font_style_options'] 	= 'none';
	    $defaults['header_text_design'] 	= false;
	    $defaults['homepage_layout_options']			= 'lite-layout';
	    $defaults['header_layout_options']			= 'header-two';
	    $defaults['homepage_design_layout_options']			= 'home-blog';
	    $defaults['homepage_sidebar_position']			= 'home-right-sidebar';
	    
	    // Headlines Section
		$defaults['disable_headlines_section']	= false;
		$defaults['headlines_title']	   	 	= esc_html__( 'Breaking News', 'presazine-blog' );
		$defaults['number_of_headlines_items']			= 4;
		$defaults['headlines_content_type']			= 'headlines_category';


		// Ads Section
		$defaults['number_of_ads']			= 2;
		$defaults['ads_column_option']			= 'col-2';
		$defaults['disable_ads_section']	= false;

		// Ads Section
		$defaults['number_of_adssec']			= 2;
		$defaults['adssec_column_option']			= 'col-2';
		$defaults['disable_adssec_section']	= false;

		// Featured Slider Section
		$defaults['disable_featured-slider_section']	= false;
		$defaults['number_of_sr_items']			= 4;
		$defaults['number_of_sr_column']		= 1;
		$defaults['slider_layout_option']			= 'fullwidth-slider';
		$defaults['slider_content_position_option']			= 'left-position';
		$defaults['sr_content_type']			= 'sr_category';
		$defaults['slider_speed']				= 800;
		$defaults['disable_white_overlay']		= false;
		$defaults['slider_arrow_enable']		= true;
		$defaults['slider_fade_enable']		 	= true;
		$defaults['slider_autoplay_enable']		= true;
		$defaults['slider_infinite_enable']		= true;
		$defaults['slider_title_enable']		= true;
		$defaults['slider_category_enable']		= true;
		$defaults['slider_content_enable']		= true;
		$defaults['slider_posted_on_enable']		= false;
		$defaults['disable_blog_banner_section']		= false;
		$defaults['slider_social_title_text']	   		= esc_html__( 'Follow Me:', 'presazine-blog' );

		// Recent Section
		$defaults['disable_recent_section']	= false;
		$defaults['recent_title']	   	 	= esc_html__( 'Recent Posts', 'presazine-blog' );
		$defaults['number_of_recent_items']			= 6;
		$defaults['number_of_recent_column']			= 2;
		$defaults['recent_excerpt_length']			= 20;
		$defaults['recent_layout_option']			= 'half-width';
		$defaults['recent_content_type']			= 'recent_category';
		$defaults['recent_category_enable']		= true;
		$defaults['recent_posted_on_enable']		= true;
		$defaults['recent_content_enable']		= true;
		$defaults['recent_author_enable']		= true;
		$defaults['recent_see_all_txt']			= esc_html__( 'See All', 'presazine-blog' );

		// Trending Section
		$defaults['disable_trending_section']	= false;
		$defaults['trending_title']	   	 	= esc_html__( 'Trending Posts', 'presazine-blog' );
		$defaults['number_of_trending_items']			= 3;	
		$defaults['number_of_trending_column']			= 1;
		$defaults['trending_excerpt_length']			= 20;
		$defaults['trending_layout_option']			= 'default-trending';
		$defaults['trending_content_align']			= 'content-left';
		$defaults['trending_content_type']			= 'trending_category';
		$defaults['trending_category_enable']		= true;
		$defaults['trending_posted_on_enable']		= true;
		$defaults['trending_arrow_enable']		= true;
		$defaults['trending_dots_enable']		= true;
		$defaults['trending_author_enable']		= true;
		$defaults['trending_content_enable']		= false;

		// Hero Section
		$defaults['disable_hero_section']	= false;
		$defaults['number_of_hero_items']			= 4;	
		$defaults['number_of_hero_column']			= 1;
		$defaults['hero_excerpt_length']			= 20;
		$defaults['hero_layout_option']			= 'default-hero';
		$defaults['hero_content_align']			= 'content-left';
		$defaults['hero_content_type']			= 'hero_category';
		$defaults['hero_category_enable']		= true;
		$defaults['hero_posted_on_enable']		= true;
		$defaults['hero_arrow_enable']		= true;
		$defaults['hero_dots_enable']		= true;
		$defaults['hero_author_enable']		= true;
		$defaults['hero_content_enable']		= false;
		$defaults['number_of_hero_right_items']			= 4;
		$defaults['hero_right_excerpt_length']			= 20;
		$defaults['hero_right_layout_option']			= 'default-hero';
		$defaults['hero_right_content_align']			= 'content-left';
		$defaults['hero_right_content_type']			= 'hero_right_category';
		$defaults['hero_right_category_enable']		= true;
		$defaults['hero_right_posted_on_enable']		= true;
		$defaults['hero_right_arrow_enable']		= true;
		$defaults['hero_right_dots_enable']		= true;
		$defaults['hero_right_author_enable']		= true;
		$defaults['hero_right_content_enable']		= false;

		// Popular Section
		$defaults['disable_popular_section']	= false;
		$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'presazine-blog' );
		$defaults['number_of_popular_items']	= 8;
		$defaults['popular_excerpt_length']			= 20;
		$defaults['popular_content_type']		= 'popular-category';
		$defaults['circle_image']				= true;
		

		//Cta Section	
		$defaults['disable_message_section']	   	= false;
		$defaults['message_title']	   	= esc_html__( 'Hello, I am Nijasi Thitak', 'presazine-blog' );
		$defaults['message_description']	   	= esc_html__( 'I’ve been working with a company this month doing blogger outreach for a project. Part of my job is to vet blogs and determine their audience, their traffic, and whether they’re a good fit for this particular project. Having spent several hours reviewing blogs in several markets, I’ve come to a conclusion: We all need to work on our About pages.', 'presazine-blog' );
		$defaults['message_button_label']	   	 	= esc_html__( 'Know More', 'presazine-blog' );
		$defaults['message_button_url']	   	 		= '#';
		$defaults['message_content_type']			= 'message_custom';
		$defaults['message_content_enable']			= true;
		$defaults['message_excerpt_enable']			= true;
		$defaults['message_excerpt_length']			= 20;

		// Latest Posts Section

		$defaults['latest_posts_title']	   	 	= esc_html__( 'My Latest Stories', 'presazine-blog' );
		$defaults['number_of_latest_posts_column']	= 2;
		$defaults['pagination_type']		= 'default';
		$defaults['latest_category_enable']		= false;
		$defaults['latest_author_enable']		= true;
		$defaults['latest_comment_enable']		= false;
		$defaults['latest_read_more_text_enable']		= true;
		$defaults['latest_posted_on_enable']		= true;
		$defaults['latest_video_enable']		= false;
		$defaults['blog_layout_content_type']		= 'blog-one';
		$defaults['archive_content_align']		= 'content-left';
		$defaults['archive_post_header_title_enable']		= true;
		$defaults['archive_post_header_image_enable']		= true;
		$defaults['blog_post_header_title_enable']		= true;

		// About Section
		$defaults['disable_about_section']	= false;
		$defaults['about_title']	   	 		= esc_html__( 'Recent Posts', 'presazine-blog' );
		$defaults['number_of_about_items']			= 3;
		$defaults['number_of_about_column']			= 3;
		$defaults['about_excerpt_length']			= 10;
		$defaults['about_content_type']			= 'about_post';
		$defaults['about_layout_option']			= 'about-post-view';
		$defaults['about_category_enable']		= true;
		$defaults['about_content_enable']		= true;
		$defaults['about_author_enable']		= true;
		$defaults['about_comment_enable']		= true;
		$defaults['about_posted_on_enable']		= true;

		//Must Read Section
		$defaults['disable_mustread_section']	= false;
		$defaults['mustread_title']	   	 		= esc_html__( 'Must Read Posts', 'presazine-blog' );
		$defaults['number_of_mustread_items']			= 8;
		$defaults['number_of_mustread_column']			= 4;
		$defaults['mustread_excerpt_length']			= 20;
		$defaults['mustread_content_type']			= 'mustread_category';
		$defaults['mustread_content_align']			= 'content-left';
		$defaults['mustread_category_enable']		= true;
		$defaults['mustread_posted_on_enable']		= true;
		$defaults['mustread_author_enable']		= true;
		$defaults['mustread_content_enable']		= true;
		$defaults['mustread_see_all_txt']			= esc_html__( 'See All', 'presazine-blog' );

		//Galleryview Section
		$defaults['disable_galleryview_section']	= false;
		$defaults['galleryview_title']	   	 		= esc_html__( 'Featured Posts', 'presazine-blog' );
		$defaults['number_of_galleryview_items']			= 6;
		$defaults['number_of_galleryview_column']			= 3;
		$defaults['galleryview_excerpt_length']			= 20;
		$defaults['galleryview_content_type']			= 'galleryview_category';
		$defaults['galleryview_layout']			= 'galleryview-two';
		$defaults['galleryview_content_align']			= 'content-left';
		$defaults['galleryview_category_enable']		= true;
		$defaults['galleryview_posted_on_enable']		= true;
		$defaults['galleryview_author_enable']		= true;
		$defaults['galleryview_content_enable']		= false;
		$defaults['galleryview_see_all_txt']			= esc_html__( 'See All', 'presazine-blog' );

		//Travel Section
		$defaults['disable_travel_section']	= false;
		$defaults['travel_title']	   	 		= esc_html__( 'Popular Posts', 'presazine-blog' );
		$defaults['number_of_travel_items']			= 4;
		$defaults['number_of_travel_column']			= 2;
		$defaults['travel_excerpt_length']			= 20;
		$defaults['travel_content_type']			= 'travel_category';
		$defaults['travel_content_align']			= 'content-left';
		$defaults['travel_category_enable']		= true;
		$defaults['travel_posted_on_enable']		= true;
		$defaults['travel_author_enable']		= true;
		$defaults['travel_content_enable']		= true;
		$defaults['travel_see_all_txt']			= esc_html__( 'See All', 'presazine-blog' );

		// Our Service Section
		$defaults['disable_services_section']	= false;
		$defaults['services_title']	   	 		= esc_html__( 'Reasons to Choose My Services', 'presazine-blog' );
		$defaults['services_subtitle']	   		= esc_html__( 'Services', 'presazine-blog' );
		$defaults['number_of_services_column']	= 3;
		$defaults['number_of_services_items']	= 6;
		$defaults['services_content_type']		= 'services_category';
		$defaults['services_content_enable']	= true;
		$defaults['disable_services_icon']		= true;
		$defaults['disable_services_background']		= true;
		$defaults['services_content_align']			= 'content-center';
		$defaults['services_excerpt_length']			= 20;

		// Testimonial Section
		$defaults['disable_testimonial_section']	= false;
		$defaults['number_of_testimonial_items']			= 4;
		$defaults['testimonial_layout_option']			= 'default-testimonial';
		$defaults['testimonial_content_type']			= 'testimonial_category';
		$defaults['testimonial_title']	   	 		= esc_html__( 'Our clients reviews.', 'presazine-blog' );
		$defaults['testimonial_viewall_text']	   	 		= esc_html__( 'View All Projects', 'presazine-blog' );
		$defaults['testimonial_subtitle']	   	 	= esc_html__( 'Testimonials','presazine-blog' );
		$defaults['testimonial_category_enable']		= true;
		$defaults['testimonial_posted_on_enable']		= true;
		$defaults['testimonial_arrow_enable']		= true;
		$defaults['testimonial_dots_enable']		= true;
		$defaults['testimonial_content_enable']		= true;

		//Pricing Section
		$defaults['disable_cta_section']	   	= false;
		$defaults['background_cta_section']		= get_template_directory_uri() .'/assets/images/default-header.jpg';
		$defaults['cta_small_description']	   	= esc_html__( 'Need More Help?', 'presazine-blog' );
		$defaults['cta_description']	   	 	= esc_html__( 'A better way to hire our best help', 'presazine-blog' );
		$defaults['cta_button_label']	   	 	= esc_html__( 'Purchase Now', 'presazine-blog' );
		$defaults['cta_button_url']	   	 		= '#';
		$defaults['cta_alt_button_label']	   	= esc_html__( 'Contact Us', 'presazine-blog' );
		$defaults['cta_alt_button_url']	   	 	= '#';
		$defaults['cta_content_type']			= 'cta_custom';


		// Single Post Option
		$defaults['single_post_category_enable']		= true;
		$defaults['single_post_posted_on_enable']		= true;
		$defaults['single_post_video_enable']		= true;
		$defaults['single_post_comment_enable']		= true;
		$defaults['single_post_author_enable']		= true;
		$defaults['single_post_pagination_enable']		= true;
		$defaults['single_post_image_enable']		= true;
		$defaults['single_post_header_image_enable']		= true;
		$defaults['single_post_header_title_enable']		= true;
		$defaults['single_post_header_image_as_header_image_enable']		= true;

		// Single Post Option
		$defaults['single_page_video_enable']		= true;
		$defaults['single_page_image_enable']		= true;
		$defaults['single_page_header_image_enable']		= true;
		$defaults['single_page_header_title_enable']		= true;
		$defaults['single_page_header_image_as_header_image_enable']		= true;
		
		$defaults['theme_typography']			=  'default';
		$defaults['body_theme_typography']		=  'default';

		//General Section
		$defaults['latest_readmore_text']				= esc_html__('Read More','presazine-blog');
		$defaults['excerpt_length']				= 50;
		$defaults['layout_options_blog']			= 'right-sidebar';
		$defaults['layout_options_archive']			= 'right-sidebar';
		$defaults['layout_options_page']			= 'right-sidebar';	
		$defaults['layout_options_single']			= 'right-sidebar';	

		//Footer section 
		$defaults['scroll_top_visible']		= true;		
		$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'presazine-blog' );
		$defaults['powered_by_text']			= esc_html__( 'Presazine by Sensational Theme', 'presazine-blog' );


    return $defaults;
}
endif;
add_filter( 'presazine_filter_default_theme_options', 'presazine_blog_get_default_theme_options', 99 );
