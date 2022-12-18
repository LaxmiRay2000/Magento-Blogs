<?php
Kirki::add_section( 'social_links_settings_section', array(
    'title'          => esc_html__( 'Social Links Settings', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Add Social Links', 'book-author-blog' ),
	'section'     => 'social_links_settings_section',
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Social Icon Name', 'book-author-blog' ),
		'field' => 'social_link',
	],
	'button_label' => esc_html__('Add New Social Link ', 'book-author-blog' ),
	'settings'     => 'social_links',
	'default'      => [
		[
			'social_icon_class' => 'fa fa-facebook',
			'social_link'  => 'https://facebook.com',
		],
		[
			'social_icon_class' => 'fa fa-twitter',
			'social_link'  => 'https://twitter.com',
		],
		[
			'social_icon_class' => 'fa fa-pinterest',
			'social_link'  => 'https://pinterest.com',
		],
		[
			'social_icon_class' => 'fa fa-instagram',
			'social_link'  => 'https://instagram.com',
		],
		[
			'social_icon_class' => 'fa fa-medium',
			'social_link'  => 'https://medium.com/',
		],
	],
	'fields' => [
		'social_icon_class' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Social Icon Class', 'book-author-blog' ),
			'description' => esc_html__( 'Example: "fa fa-facebook"', 'book-author-blog' ),
			'default'     => '',
		],
		'social_link'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'book-author-blog' ),
			'description' => esc_html__( 'Social Icon Links', 'book-author-blog' ),
			'default'     => '',
		],
	]
] );