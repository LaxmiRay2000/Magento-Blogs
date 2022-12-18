<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function book_author_blog_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Rigth Sidebar Area', 'book-author-blog' ),
			'id'            => 'right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
        	'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Left Sidebar Area', 'book-author-blog' ),
			'id'            => 'left-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
        	'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar One', 'book-author-blog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-right-sidebar %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Two', 'book-author-blog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-2 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Three', 'book-author-blog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar Four', 'book-author-blog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-sidebar-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Layout Two', 'book-author-blog' ),
			'id'            => 'footer-layout-two',
			'description'   => esc_html__( 'Add widgets here.', 'book-author-blog' ),
			'before_widget' => '<section id="%1$s" class="footer-sidebar widget footer-layout-two %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title footer-title">',
        	'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'book_author_blog_widgets_init' );
