<?php
Kirki::add_section( 'book_author_blog_theme_color', array(
    'title'          => esc_html__( 'Color Settings', 'book-author-blog' ),
    'description'    => esc_html__( 'Customize the colors of your website.', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
) );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => __( 'Primary Background Color', 'book-author-blog' ),
	'section'     => 'book_author_blog_theme_color',
	'default'     => '#fb4747',
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.book-author-blog-standard-post__overlay-category span.cat-links a, .widget .tagcloud a, blockquote.wp-block-quote.is-style-red-qoute, .scrooltotop a:hover, .discover-me-button a, .woocommerce .woocommerce-pagination .page-numbers li a, .woocommerce .woocommerce-pagination .page-numbers li span, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce table.shop_table tr td.product-remove a, .woocommerce-info, .woocommerce-noreviews, p.no-comments, .book-author-blog-single-page .entry-footer a,nav.woocommerce-MyAccount-navigation ul li a, .rs-wp-themes-cookies-banner-area .cookies_accept_button, .widget_search button, aside.widget-area .widget .widget-title:before, .pagination li.page-item a, .pagination li.page-item span',
			'property' => 'background-color',
		),
		array(
			'element'  => '#cssmenu ul ul li:first-child',
			'property' => 'border-top-color',
		),
		array(
			'element'  => '.widget_search button ',
			'property' => 'border-color',
		),
	),
] );

Kirki::add_field( 'book_author_blog_config', [
	'type'        => 'color',
	'settings'    => 'primary_text_color',
	'label'       => __( 'Primary Text Color', 'book-author-blog' ),
	'section'     => 'book_author_blog_theme_color',
	'transport'   => 'auto',
	'default'     => '#fb4747',
	'output' => array(
		array(
			'element'  => '.widget-area .widget.widget_rss a.rsswidget, .widget ul li a:hover, .widget ul li a:visited, .widget ul li a:focus, .widget ul li a:active, .widget ol li a:hover, .widget ol li a:visited, .widget ol li a:focus, .widget ol li a:active, a:hover, a:focus, a:active, span.opacity-none:before, header.archive-page-header span, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .product_meta > * a, .woocommerce-account .woocommerce-MyAccount-content a, .book-author-blog-standard-post_post-meta .tags-links a:hover, .post-details-page .book-author-blog-standard-post__blog-meta .fa',
			'property' => 'color',
		),
		array(
			'element'  => '.book-author-blog-standard-post__blog-meta>span.posted-on i.line',
			'property' => 'background-color',
		),
	),
] );
