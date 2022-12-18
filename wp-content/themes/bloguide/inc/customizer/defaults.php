<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 * @return array An array of default values
 */

function bloguide_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$bloguide_default_options = array(

		// Color Options
		'header_title_color'			    => '#fff',
		'header_tagline_color'			    => '#fff',
		'header_txt_logo_extra'			    => 'show-all',
		'colorscheme_hue'				    => '#d87b4d',
		'colorscheme'					    => 'default',
		'theme_version'						=> 'lite-version',
		'home_layout'						=> 'default-design',

		// typography Options
		'theme_typography' 				    => 'default',
		'body_theme_typography' 		    => 'default',
		
		// loader
		'loader_enable'         		    => (bool) false,
		'loader_icon'         			    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',
		'menu_sticky'					    => (bool) false,
		'search_enable'					    => (bool) true,

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => esc_html__( 'Copyright © 2022 ', 'bloguide' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'bloguide' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	    => (bool) true,
		'footer_social_menu_enable'      	=> (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable

		'default_sortable' 			    	=> 'hero_banner,destination,gallery,services,articles,subscribe_now',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'bloguide' ), 
		'archive_btn_txt' 		    		=> esc_html__( 'Read More', 'bloguide' ),
		'blog_column'						=> 'col-1',

		'banner_image_enable'				=> (bool) true,


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,
		'single_post_hide_pagination'		=> (bool) false,
		'hide_category'			   			=> (bool) false,
		'hide_date'			   				=> (bool) false,

		/* Front Page */

		// top bar
		'social_menu_enable'					=> (bool) false,

		// hero slider
		'hero_banner_section_enable'			=> (bool) false,
		'hero_banner_content_type'				=> 'post',
		'hero_banner_sub_title'            	    => esc_html__('100+ Activities','bloguide'),
		'hero_banner_btn_txt'            	    => esc_html__('Discover  More','bloguide'),
		'hero_banner_alt_btn_txt'            	=> esc_html__('About  Bloguide','bloguide'),

		//subscribe
		'subscribe_now_section_enable' 			=> (bool) false,
		'subscribe_now_section_title'			=>	esc_html__('Join Our Weekly Free Newsletter', 'bloguide'),
		'subscribe_now_section_subtitle'		=>	esc_html__('Subscribe Now!', 'bloguide'),
		'subscribe_now_section_btn_txt'		    =>	esc_html__('Subscribe', 'bloguide'),

		// destination
		'destination_section_enable'	=> false,
		'destination_content_type'		=> 'post',
		'destination_count'				=> 9,
		'destination_title'				=> esc_html__('WEEKLY TOP DESTINATIONS','bloguide'),
		'destination_btn_label'			=> esc_html__( 'VIEW ALL HOTELS', 'bloguide' ),

		
		//articles 
		'articles_section_enable'		  	 => (bool) false,
		'articles_content_type'			 	 => 'recent',
		'articles_excerpt_length'		  	 => 30,
		'articles_title'    			 	 => esc_html__('Latest Articles','bloguide'),
		'articles_btn_txt'    			 	 => esc_html__('Read More','bloguide'),
		'articles_count'				 	 => 4,

		//our service
		'services_section_enable'		    => (bool) false,
		'services_content_type'			    =>'page',
		'services_posts_count'			    => 3,
		'services_column'			 		=> 'col-3',
		'services_excerpt_length'			=> 10,
		
		// gallery
		'gallery_section_enable'				=> (bool) false,
		'gallery_content_type'					=> 'category',
		'gallery_count'							=> 4,
		'gallery_title'							=> esc_html__( 'Travel Anywhere', 'bloguide' ),

		//sponsor
		'sponsor_section_enable'			=> (bool) false,
		'sponsor_content_type'				=> 'custom',
		'sponsor_count'						=> 6,


	);

	$output = apply_filters( 'bloguide_default_theme_options', $bloguide_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}