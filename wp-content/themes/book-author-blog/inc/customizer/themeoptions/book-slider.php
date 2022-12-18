<?php
Kirki::add_section( 'books_slider_settings', array(
    'title'          => esc_html__( 'Books Slider Settings', 'book-author-blog' ),
    'description'          => esc_html__( 'This slider will appear on the blog page below of header.', 'book-author-blog' ),
    'panel'          => 'book_author_blog_book_settings_panel',
) );
Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'switch',
    'settings'    => 'books_slider_on_off',
    'label'       => esc_html__( 'Books Slider Slider Show Hide', 'book-author-blog' ),
    'section'     => 'books_slider_settings',
    'default'     => '0',
    'choices'     => [
        'on'  => esc_html__( 'Show', 'book-author-blog' ),
        'off' => esc_html__( 'Hide', 'book-author-blog' ),
    ],
] );
Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'number',
	'settings'    => 'books_per_page',
	'label'       => esc_html__( 'Post Per Page', 'book-author-blog' ),
	'section'     => 'books_slider_settings',
	'default'    => 5,
] );
Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'number',
	'settings'    => 'slide_to_show',
	'label'       => esc_html__( 'Slide To Show', 'book-author-blog' ),
	'section'     => 'books_slider_settings',
	'default'    => 4,
] );
