<?php
/*Blog Page Settings*/

Kirki::add_section( 'blog_and_archive_post_section', array(
    'title'          => esc_html__( 'Blog & Archive Post Settings', 'book-author-blog' ),
    'panel'          => 'book_author_blog_global_panel',
) );

Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'switch',
    'settings'    => 'active_masonry_layout',
    'label'       => esc_html__( 'Activate Masonry Layout', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
    'choices' => [
        'on'  => esc_html__( 'Activate', 'book-author-blog' ),
        'off' => esc_html__( 'Deactivate', 'book-author-blog' )
    ]
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_post_column',
    'label'       => '',
    'section'     => 'blog_and_archive_post_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_category',
    'label'       => esc_html__( 'Show Post Category', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_title',
    'label'       => esc_html__( 'Show Post Title', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_author',
    'label'       => esc_html__( 'Show Post Author', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_thumbnail',
    'label'       => esc_html__( 'Thumbnail  On//Off', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );
Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_excerpt',
    'label'       => esc_html__( 'Show Post Excerpt', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );
Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'number',
    'settings'    => 'post_loop_excerpt_limit',
    'label'       => esc_html__( 'Post Excerpt Limit', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => 42,
    'choices'     => [
        'min'  => 0,
        'max'  => 400,
        'step' => 1,
    ],
    'active_callback' => [
        [
            'setting'  => 'show_post_excerpt',
            'operator' => '==',
            'value'    => '1',
        ],
    ],
] );
Kirki::add_field( 'book_author_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_date',
    'label'       => esc_html__( 'Show Post Date', 'book-author-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );
