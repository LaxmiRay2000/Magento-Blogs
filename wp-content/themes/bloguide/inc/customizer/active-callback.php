<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */


if ( ! function_exists( 'bloguide_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Bloguide 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function bloguide_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'bloguide_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Bloguide 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function bloguide_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'bloguide_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'bloguide_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Bloguide 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function bloguide_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'bloguide_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Check if hero slider section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[hero_banner_section_enable]' )->value() );
}

/**
 * Check if hero slider section content type is post.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_hero_banner_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[hero_banner_content_type]' )->value();
	return bloguide_is_hero_banner_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if hero slider section content type is trip.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_hero_banner_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[hero_banner_content_type]' )->value();
	return bloguide_is_hero_banner_section_enable( $control ) && ( 'trip' == $content_type );
}

/**
 * Check if Subscribe Us section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_subscribe_now_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[subscribe_now_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_services_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[services_section_enable]' )->value() );
}

/**
 * Check if destination section is enabled.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[destination_section_enable]' )->value() );
}


/**
 * Check if destination section content type is post.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
	return bloguide_is_destination_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if destination section content type is trip.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
	return bloguide_is_destination_section_enable( $control ) && ( 'trip' == $content_type );
}


/**
 * Check if destination section content type is activity.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_content_activity_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
	return bloguide_is_destination_section_enable( $control ) && ( 'activity' == $content_type );
}

/**
 * Check if destination section content type is destination.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_content_destination_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
	return bloguide_is_destination_section_enable( $control ) && ( 'destination' == $content_type );
}

/**
 * Check if destination section content type is trip types.
 *
 * @since Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_content_trip_types_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
	return bloguide_is_destination_section_enable( $control ) && ( 'trip-types' == $content_type );
}

/**
 * Check if destination separator section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_destination_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'bloguide_theme_options[destination_content_type]' )->value();
    return bloguide_is_destination_section_enable( $control ) && !( 'category' == $content_type || 'destination' == $content_type || 'trip-types' == $content_type || 'activity' == $content_type ) ;
}

/**
 * Check if gallery section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[gallery_section_enable]' )->value() );
}

/**
 * Check if gallery section content type is post.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[gallery_content_type]' )->value();
	return bloguide_is_gallery_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if gallery section content type is page.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[gallery_content_type]' )->value();
	return bloguide_is_gallery_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if gallery section content type is category.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[gallery_content_type]' )->value();
	return bloguide_is_gallery_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if gallery section content type is recent.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[gallery_content_type]' )->value();
	return bloguide_is_gallery_section_enable( $control ) && ( 'recent' == $content_type );
}
/**
 * Check if gallery separator section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_gallery_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'bloguide_theme_options[gallery_content_type]' )->value();
    return bloguide_is_gallery_section_enable( $control ) && !( 'recent' == $content_type || 'category' == $content_type ) ;
}

/**
 * Check if articles section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_enable( $control ) {
	return ( $control->manager->get_setting( 'bloguide_theme_options[articles_section_enable]' )->value() );
}

/**
 * Check if articles section content type is post.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[articles_content_type]' )->value();
	return bloguide_is_articles_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if articles section content type is page.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[articles_content_type]' )->value();
	return bloguide_is_articles_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if articles section content type is category.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[articles_content_type]' )->value();
	return bloguide_is_articles_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if articles section content type is recent.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'bloguide_theme_options[articles_content_type]' )->value();
	return bloguide_is_articles_section_enable( $control ) && ( 'recent' == $content_type );
}
/**
 * Check if articles separator section is enabled.
 *
 * @since  Bloguide 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control.
 * @return bool Whether the control is active to the current preview.
 */
function bloguide_is_articles_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'bloguide_theme_options[articles_content_type]' )->value();
    return bloguide_is_articles_section_enable( $control ) && !( 'recent' == $content_type || 'category' == $content_type ) ;
}


function bloguide_is_banner_image_section_enable( $control ) {
	return ( true === ( $control->manager->get_setting( 'bloguide_theme_options[banner_image_enable]' )->value() ));
}

function bloguide_is_banner_image_section_disable( $control ) {
	return ( false === ( $control->manager->get_setting( 'bloguide_theme_options[banner_image_enable]' )->value() ));
}