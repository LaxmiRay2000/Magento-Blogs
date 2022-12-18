<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Bloguide
* @since  Bloguide 1.0.0
*/

// blog btn title
if ( ! function_exists( 'bloguide_copyright_text_partial' ) ) :
    function bloguide_copyright_text_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// hero_banner_sub_title
if ( ! function_exists( 'bloguide_hero_banner_sub_title_partial' ) ) :
    function bloguide_hero_banner_sub_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['hero_banner_sub_title'] );
    }
endif;

// hero_banner_btn_txt
if ( ! function_exists( 'bloguide_hero_banner_btn_txt_partial' ) ) :
    function bloguide_hero_banner_btn_txt_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['hero_banner_btn_txt'] );
    }
endif;

// hero_banner_alt_btn_txt
if ( ! function_exists( 'bloguide_hero_banner_alt_btn_txt_partial' ) ) :
    function bloguide_hero_banner_alt_btn_txt_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['hero_banner_alt_btn_txt'] );
    }
endif;

// gallery_title selective refresh
if ( ! function_exists( 'bloguide_gallery_title_partial' ) ) :
    function bloguide_gallery_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['gallery_title'] );
    }
endif;

// fashion_news_title selective refresh
if ( ! function_exists( 'bloguide_fashion_news_title_partial' ) ) :
    function bloguide_fashion_news_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['fashion_news_title'] );
    }
endif;

// shop_btn_title selective refresh
if ( ! function_exists( 'bloguide_shop_btn_title_partial' ) ) :
    function bloguide_shop_btn_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['shop_btn_title'] );
    }
endif;

// shop_title selective refresh
if ( ! function_exists( 'bloguide_shop_title_partial' ) ) :
    function bloguide_shop_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['shop_title'] );
    }
endif;

// shop_view_all_btn_txt selective refresh
if ( ! function_exists( 'bloguide_shop_view_all_btn_txt_partial' ) ) :
    function bloguide_shop_view_all_btn_txt_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['shop_view_all_btn_txt'] );
    }
endif;

// business_news_title selective refresh
if ( ! function_exists( 'bloguide_business_news_title_partial' ) ) :
    function bloguide_business_news_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['business_news_title'] );
    }
endif;

// archive_btn_txt selective refresh
if ( ! function_exists( 'bloguide_archive_btn_txt_partial' ) ) :
    function bloguide_archive_btn_txt_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['archive_btn_txt'] );
    }
endif;

// hero_banner_sidebar_title selective refresh
if ( ! function_exists( 'bloguide_hero_banner_sidebar_title_partial' ) ) :
    function bloguide_hero_banner_sidebar_title_partial() {
        $options = bloguide_get_theme_options();
        return esc_html( $options['hero_banner_sidebar_title'] );
    }
endif;
