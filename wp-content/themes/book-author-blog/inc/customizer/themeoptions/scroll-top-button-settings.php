<?php
Kirki::add_section( 'scroll_to_top_button_section', array(
    'title'          => esc_html__( 'Scroll To Top Button Settings', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'     => 'toggle',
	'settings' => 'show_scroll_to_top_button',
	'label'    => esc_html__( 'Show Scroll To Top Button', 'book-author-blog' ),
	'section'  => 'scroll_to_top_button_section',
	'default'  => '1',
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'     => 'toggle',
	'settings' => 'hide_button_on_mobile_device',
	'label'    => esc_html__( 'Hide Button On Mobile Device', 'book-author-blog' ),
	'section'  => 'scroll_to_top_button_section',
	'default'  => '1',
] );