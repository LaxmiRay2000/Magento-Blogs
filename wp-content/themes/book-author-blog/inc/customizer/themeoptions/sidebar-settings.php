<?php
/*Blog Page Settings*/

Kirki::add_section( 'sidebar_settings_section', array(
    'title'          => esc_html__( 'Sidebar Settings', 'book-author-blog' ),
    'description'          => esc_html__( 'Control Sidebar Of Your Website', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_sidebar',
	'label'       => esc_html__( 'Blog Page Sidebar', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'both',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'book-author-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'book-author-blog' ),
		'no' => esc_html__( 'No Sidebar', 'book-author-blog' ),
		'both' => esc_html__( 'Left & Right Sidebar', 'book-author-blog' ),
	],
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_post_column',
	'label'       => esc_html__( 'Post Column', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '1',
	'choices' => [
			'4' => __( '4 Colmun', 'book-author-blog' ),
			'3' => __( '3 Column', 'book-author-blog' ),
			'2' => __( '2 Column', 'book-author-blog' ),
			'1' => __( 'Single Column', 'book-author-blog' ),
		],
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_blog_post_column',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_sidebar',
	'label'       => esc_html__( 'Archive Page Sidebar', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'both',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'book-author-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'book-author-blog' ),
		'no' => esc_html__( 'No Sidebar', 'book-author-blog' ),
		'both' => esc_html__( 'Left & Right Sidebar', 'book-author-blog' ),
	],
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_post_column',
	'label'       => esc_html__( 'Post Column', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '1',
	'choices' => [
			'4' => __( '4 Colmun', 'book-author-blog' ),
			'3' => __( '3 Column', 'book-author-blog' ),
			'2' => __( '2 Column', 'book-author-blog' ),
			'1' => __( 'Single Column', 'book-author-blog' ),
		],
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_archive_post_column',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'both',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'book-author-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'book-author-blog' ),
		'no' => esc_html__( 'No Sidebar', 'book-author-blog' ),
		'both' => esc_html__( 'Left & Right Sidebar', 'book-author-blog' ),
	],
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'post_sidebar',
	'label'       => esc_html__( 'Post Sidebar', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'both',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'book-author-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'book-author-blog' ),
		'no' => esc_html__( 'No Sidebar', 'book-author-blog' ),
		'both' => esc_html__( 'Left & Right Sidebar', 'book-author-blog' ),
	],
] );
Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_post_sidebar',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );
Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'search_page_sidebar',
	'label'       => esc_html__( 'Search Page Sidebar', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'both',
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'book-author-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'book-author-blog' ),
		'no' => esc_html__( 'No Sidebar', 'book-author-blog' ),
		'both' => esc_html__( 'Left & Right Sidebar', 'book-author-blog' ),
	],
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'select',
	'settings'    => 'search_page_post_column',
	'label'       => esc_html__( 'Post Column', 'book-author-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '1',
	'choices' => [
			'4' => __( '4 Colmun', 'book-author-blog' ),
			'3' => __( '3 Column', 'book-author-blog' ),
			'2' => __( '2 Column', 'book-author-blog' ),
			'1' => __( 'Single Column', 'book-author-blog' ),
		],
] );