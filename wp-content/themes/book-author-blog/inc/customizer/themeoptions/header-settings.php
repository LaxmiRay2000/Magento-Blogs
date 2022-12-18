<?php
Kirki::add_section( 'book_author_blog_theme_header_settings', array(
    'title'          => esc_html__( 'Header Settings', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
) );

Kirki::add_field( 'book_author_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'unlock_header_style_field',
    'label'       => '',
    'section'     => 'book_author_blog_theme_header_settings',
    'default'     => '<a target="_blank" href="'.esc_url( 'https://rswpthemes.com/author-portfolio-pro-wordpress-theme/' ).'">'.esc_html__('Upgrade To Pro To Unlock All Features', 'book-author-blog').'</a>',
) );
