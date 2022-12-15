<?php
/**
 * Active callback functions.
 *
 * @package Presazine
 */

function presazine_header_background_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_header_background_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_ads_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_ads_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function presazine_adssec_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_adssec_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function presazine_pricing_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_pricing_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function presazine_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_about_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( presazine_about_active( $control ) && ( 'about_custom' == $content_type ) );
} 

function presazine_about_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( presazine_about_active( $control ) && ( 'about_page' == $content_type ) );
}

function presazine_about_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( presazine_about_active( $control ) && ( 'about_post' == $content_type ) );
}

function presazine_about_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( presazine_about_active( $control ) && ( 'about_category' == $content_type ) );
}


//========================Slider Section=====================//

function presazine_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured-slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( presazine_slider_active( $control ) && ( 'sr_page' == $content_type ) );
}

function presazine_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( presazine_slider_active( $control ) && ( 'sr_post' == $content_type ) );
}

function presazine_slider_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return  presazine_slider_seperator( $control ) && ( in_array( $content_type, array( 'sr_page', 'sr_post', 'sr_custom' ) ) ) ;
}

function presazine_slider_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( presazine_slider_active( $control ) && ( 'sr_custom' == $content_type ) );
}

function presazine_slider_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( presazine_slider_active( $control ) && ( 'sr_category' == $content_type ) );
}



//========================Services Section=====================//

function presazine_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function presazine_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( presazine_services_active( $control ) && ( 'services_page' == $content_type ) );
}

function presazine_services_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( presazine_services_active( $control ) && ( 'services_post' == $content_type ) );
}

function presazine_services_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[services_content_type]' )->value();
    return ( presazine_services_active( $control ) && ( 'services_category' == $content_type ) );
}
//===================End Services Section==============//


//========================Information Section=====================//

function presazine_information_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_information_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_information_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( presazine_information_active( $control ) && ( 'information_custom' == $content_type ) );
} 

function presazine_information_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( presazine_information_active( $control ) && ( 'information_page' == $content_type ) );
}

function presazine_information_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[information_content_type]' )->value();
    return ( presazine_information_active( $control ) && ( 'information_post' == $content_type ) );
}


//========================detail Section=====================//

function presazine_details_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_details_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_details_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( presazine_details_active( $control ) && ( 'details_custom' == $content_type ) );
} 

function presazine_details_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( presazine_details_active( $control ) && ( 'details_page' == $content_type ) );
}

function presazine_details_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[details_content_type]' )->value();
    return ( presazine_details_active( $control ) && ( 'details_post' == $content_type ) );
}


//========================Recent Section=====================//

function presazine_recent_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_recent_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_recent_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( presazine_recent_active( $control ) && ( 'recent_page' == $content_type ) );
}

function presazine_recent_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( presazine_recent_active( $control ) && ( 'recent_post' == $content_type ) );
}

function presazine_recent_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[recent_content_type]' )->value();
    return ( presazine_recent_active( $control ) && ( 'recent_category' == $content_type ) );
}

//========================Trending Section=====================//
function presazine_trending_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_trending_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_trending_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( presazine_trending_active( $control ) && ( 'trending_custom' == $content_type ) );
} 

function presazine_trending_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( presazine_trending_active( $control ) && ( 'trending_page' == $content_type ) );
}

function presazine_trending_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( presazine_trending_active( $control ) && ( 'trending_post' == $content_type ) );
}

function presazine_trending_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[trending_content_type]' )->value();
    return ( presazine_trending_active( $control ) && ( 'trending_category' == $content_type ) );
}
//===================End Trending Section==============//

//========================Hero Section=====================//
function presazine_hero_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_hero_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_hero_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_custom' == $content_type ) );
} 

function presazine_hero_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_page' == $content_type ) );
}

function presazine_hero_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_post' == $content_type ) );
}

function presazine_hero_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_category' == $content_type ) );
} 

function presazine_hero_right_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_right_page' == $content_type ) );
}

function presazine_hero_right_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_right_post' == $content_type ) );
}

function presazine_hero_right_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[hero_right_content_type]' )->value();
    return ( presazine_hero_active( $control ) && ( 'hero_right_category' == $content_type ) );
}
//===================End Hero Section==============//

//========================Headlines Section=====================//
function presazine_headlines_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_headlines_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
function presazine_headlines_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( presazine_headlines_active( $control ) && ( 'headlines_page' == $content_type ) );
}

function presazine_headlines_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( presazine_headlines_active( $control ) && ( 'headlines_post' == $content_type ) );
}

function presazine_headlines_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[headlines_content_type]' )->value();
    return ( presazine_headlines_active( $control ) && ( 'headlines_category' == $content_type ) );
}
//===================End Headlines Section==============//
//========================NewsFeatured Section=====================//

function presazine_newsfeatured_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_newsfeatured_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_newsfeatured_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( presazine_newsfeatured_active( $control ) && ( 'newsfeatured_page' == $content_type ) );
}

function presazine_newsfeatured_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( presazine_newsfeatured_active( $control ) && ( 'newsfeatured_post' == $content_type ) );
}

function presazine_newsfeatured_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[newsfeatured_content_type]' )->value();
    return ( presazine_newsfeatured_active( $control ) && ( 'newsfeatured_category' == $content_type ) );
}

//========================CategryNews Section=====================//
function presazine_categorynews_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_categorynews_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Project Section=====================//

function presazine_popular_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_popular_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_popular_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( presazine_popular_active( $control ) && ( 'popular_page' == $content_type ) );
}

function presazine_popular_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( presazine_popular_active( $control ) && ( 'popular_post' == $content_type ) );
}

function presazine_popular_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( presazine_popular_active( $control ) && ( 'popular_category' == $content_type ) );
}

function presazine_popular_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return ( presazine_popular_active( $control ) && ( 'popular_custom' == $content_type ) );
}

function presazine_popular_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[popular_content_type]' )->value();
    return  presazine_popular_seperator( $control ) && ( in_array( $content_type, array( 'popular_page', 'popular_post', 'popular_custom' ) ) ) ;
}

//========================Cta Section=====================//

function presazine_cta_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_cta_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_cta_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( presazine_cta_active( $control ) && ( 'cta_custom' == $content_type ) );
} 

function presazine_cta_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( presazine_cta_active( $control ) && ( 'cta_page' == $content_type ) );
}

function presazine_cta_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[cta_content_type]' )->value();
    return ( presazine_cta_active( $control ) && ( 'cta_post' == $content_type ) );
}


//========================Team Section=====================//

function presazine_team_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_team_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_team_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( presazine_team_active( $control ) && ( 'team_custom' == $content_type ) );
} 

function presazine_team_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( presazine_team_active( $control ) && ( 'team_page' == $content_type ) );
}

function presazine_team_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( presazine_team_active( $control ) && ( 'team_post' == $content_type ) );
}

function presazine_team_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[team_content_type]' )->value();
    return ( presazine_team_active( $control ) && ( 'team_category' == $content_type ) );
}

//========================Team Section=====================//

function presazine_features_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_features_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_features_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( presazine_features_active( $control ) && ( 'features_custom' == $content_type ) );
} 

function presazine_features_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( presazine_features_active( $control ) && ( 'features_page' == $content_type ) );
}

function presazine_features_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( presazine_features_active( $control ) && ( 'features_post' == $content_type ) );
}

function presazine_features_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return ( presazine_features_active( $control ) && ( 'features_category' == $content_type ) );
}

//========================Conatct Section=====================//

function presazine_contact_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_contact_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Testimonial Section=====================//

function presazine_testimonial_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_testimonial_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_testimonial_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( presazine_testimonial_active( $control ) && ( 'testimonial_custom' == $content_type ) );
} 

function presazine_testimonial_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( presazine_testimonial_active( $control ) && ( 'testimonial_page' == $content_type ) );
}

function presazine_testimonial_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( presazine_testimonial_active( $control ) && ( 'testimonial_post' == $content_type ) );
}

function presazine_testimonial_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[testimonial_content_type]' )->value();
    return ( presazine_testimonial_active( $control ) && ( 'testimonial_category' == $content_type ) );
}

//========================Counter Section=====================//
function presazine_counter_section( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_counter_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Instagram Section=====================//

function presazine_instagram_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_instagram_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

//========================Porfolio Section=====================//

function presazine_portfolio_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_portfolio_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}




//========================Must Read Section=====================//


function presazine_mustread_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_mustread_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_mustread_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( presazine_mustread_active( $control ) && ( 'mustread_page' == $content_type ) );
}

function presazine_mustread_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( presazine_mustread_active( $control ) && ( 'mustread_post' == $content_type ) );
}

function presazine_mustread_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( presazine_mustread_active( $control ) && ( 'mustread_category' == $content_type ) );
}

//========================GalleryView Section=====================//


function presazine_galleryview_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_galleryview_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_galleryview_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( presazine_galleryview_active( $control ) && ( 'galleryview_page' == $content_type ) );
}

function presazine_galleryview_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( presazine_galleryview_active( $control ) && ( 'galleryview_post' == $content_type ) );
}

function presazine_galleryview_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[galleryview_content_type]' )->value();
    return ( presazine_galleryview_active( $control ) && ( 'galleryview_category' == $content_type ) );
}

//========================Travel Section=====================//


function presazine_travel_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_travel_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_travel_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[travel_content_type]' )->value();
    return ( presazine_travel_active( $control ) && ( 'travel_page' == $content_type ) );
}

function presazine_travel_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[travel_content_type]' )->value();
    return ( presazine_travel_active( $control ) && ( 'travel_post' == $content_type ) );
}

function presazine_travel_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[travel_content_type]' )->value();
    return ( presazine_travel_active( $control ) && ( 'travel_category' == $content_type ) );
}



function presazine_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_blog_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( presazine_blog_active( $control ) && ( 'blog_page' == $content_type ) );
}

function presazine_blog_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( presazine_blog_active( $control ) && ( 'blog_post' == $content_type ) );
}

function presazine_blog_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( presazine_blog_active( $control ) && ( 'blog_category' == $content_type ) );
}

//========================Message Section=====================//

function presazine_message_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_message_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_message_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( presazine_message_active( $control ) && ( 'message_custom' == $content_type ) );
} 

function presazine_message_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( presazine_message_active( $control ) && ( 'message_page' == $content_type ) );
}

function presazine_message_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[message_content_type]' )->value();
    return ( presazine_message_active( $control ) && ( 'message_post' == $content_type ) );
}

//========================Video Section=====================//

function presazine_video_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_video_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_sensational_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_sensational_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_sensational_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( presazine_sensational_active( $control ) && ( 'sensational_page' == $content_type ) );
}

function presazine_sensational_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( presazine_sensational_active( $control ) && ( 'sensational_post' == $content_type ) );
}

function presazine_sensational_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sensational_content_type]' )->value();
    return ( presazine_sensational_active( $control ) && ( 'sensational_category' == $content_type ) );
}


function presazine_tips_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_tips_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_tips_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( presazine_tips_active( $control ) && ( 'tips_page' == $content_type ) );
}

function presazine_tips_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( presazine_tips_active( $control ) && ( 'tips_post' == $content_type ) );
}

function presazine_tips_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tips_content_type]' )->value();
    return ( presazine_tips_active( $control ) && ( 'tips_category' == $content_type ) );
}

function presazine_client_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_client_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_featured_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function presazine_featured_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( presazine_featured_active( $control ) && ( 'featured_page' == $content_type ) );
}

function presazine_featured_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( presazine_featured_active( $control ) && ( 'featured_post' == $content_type ) );
}

function presazine_featured_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_content_type]' )->value();
    return ( presazine_featured_active( $control ) && ( 'featured_category' == $content_type ) );
}
/*
function presazine_is_slider_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'presazine_theme_options[homepage_design_layout_options]' )->value();
    return ( $control->manager->get_setting( 'presazine_theme_options[slider_section_enable]' )->value() &&  in_array($home_layout,array('third-design','second-design','fourth-design','fifth-design')));
}*/
function presazine_header_three( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[header_layout_options]' )->value();
    return ( ( 'header-three' == $content_type ) );
}

function presazine_header_background_image( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[header_layout_options]' )->value();
    return in_array($home_layout,array('header-two','header-three'));
}
function presazine_headlines_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-normal-magazine'));
}

function presazine_categorynews_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-normal-magazine'));
}

function presazine_portfolio_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-business'));
}

function presazine_instagram_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog'));
}

function presazine_popular_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog'));
}

function presazine_hero_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}

function presazine_recent_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}

function presazine_slider_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog','home-normal-magazine','home-business'));
}

function presazine_services_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_information_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_team_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_testimonial_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_pricing_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_cta_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_client_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-business'));
}

function presazine_galleryview_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-magazine','home-magazine','home-normal-blog'));
}

function presazine_newsfeatured_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-normal-magazine'));
}

function presazine_mustread_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-normal-magazine','home-normal-blog', 'home-business'));
}

function presazine_travel_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-normal-magazine','home-normal-blog'));
}

function presazine_trending_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine','home-blog','home-normal-magazine'));
}

function presazine_message_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-normal-blog','home-business')); 
}
function presazine_topbar_current_date_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-normal-magazine','home-magazine'));
}

function presazine_topbar_contact_info_design_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-blog','home-normal-blog', 'home-business'));
}
function presazine_home_magazine_enable( $control ) {
    $home_layout = $control->manager->get_setting( 'theme_options[homepage_design_layout_options]' )->value();
    return in_array($home_layout,array('home-magazine'));
}

/**
 * Active Callback for top bar section
 */
function presazine_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function presazine_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

