<?php
/**
 * Presazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Presazine
 */

if ( ! function_exists( 'presazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function presazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BlogMelody, use a find and replace
	 * to change 'presazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'presazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'presazine' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'presazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	add_editor_style( array( '/assets/css/editor-style' . $min . '.css', presazine_fonts_url() ) );

	// Gutenberg support
	add_theme_support( 'editor-color-palette', array(
       	array(
			'name' => esc_html__( 'Tan', 'presazine' ),
			'slug' => 'tan',
			'color' => '#E6DBAD',
       	),
       	array(
           	'name' => esc_html__( 'Yellow', 'presazine' ),
           	'slug' => 'yellow',
           	'color' => '#FDE64B',
       	),
       	array(
           	'name' => esc_html__( 'Orange', 'presazine' ),
           	'slug' => 'orange',
           	'color' => '#ED7014',
       	),
       	array(
           	'name' => esc_html__( 'Red', 'presazine' ),
           	'slug' => 'red',
           	'color' => '#D0312D',
       	),
       	array(
           	'name' => esc_html__( 'Pink', 'presazine' ),
           	'slug' => 'pink',
           	'color' => '#b565a7',
       	),
       	array(
           	'name' => esc_html__( 'Purple', 'presazine' ),
           	'slug' => 'purple',
           	'color' => '#A32CC4',
       	),
       	array(
           	'name' => esc_html__( 'Blue', 'presazine' ),
           	'slug' => 'blue',
           	'color' => '#3A43BA',
       	),
       	array(
           	'name' => esc_html__( 'Green', 'presazine' ),
           	'slug' => 'green',
           	'color' => '#3BB143',
       	),
       	array(
           	'name' => esc_html__( 'Brown', 'presazine' ),
           	'slug' => 'brown',
           	'color' => '#231709',
       	),
       	array(
           	'name' => esc_html__( 'Grey', 'presazine' ),
           	'slug' => 'grey',
           	'color' => '#6C626D',
       	),
       	array(
           	'name' => esc_html__( 'Black', 'presazine' ),
           	'slug' => 'black',
           	'color' => '#000000',
       	),
   	));

	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-font-sizes', array(
	   	array(
	       	'name' => esc_html__( 'small', 'presazine' ),
	       	'shortName' => esc_html__( 'S', 'presazine' ),
	       	'size' => 12,
	       	'slug' => 'small'
	   	),
	   	array(
	       	'name' => esc_html__( 'regular', 'presazine' ),
	       	'shortName' => esc_html__( 'M', 'presazine' ),
	       	'size' => 16,
	       	'slug' => 'regular'
	   	),
	   	array(
	       	'name' => esc_html__( 'larger', 'presazine' ),
	       	'shortName' => esc_html__( 'L', 'presazine' ),
	       	'size' => 36,
	       	'slug' => 'larger'
	   	),
	   	array(
	       	'name' => esc_html__( 'huge', 'presazine' ),
	       	'shortName' => esc_html__( 'XL', 'presazine' ),
	       	'size' => 48,
	       	'slug' => 'huge'
	   	)
	));
	add_theme_support('editor-styles');
	add_theme_support( 'wp-block-styles' );
}
endif;
add_action( 'after_setup_theme', 'presazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function presazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'presazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'presazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function presazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'presazine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'presazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'HomePage Sidebar', 'presazine' ),
		'id'            => 'homepage-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'presazine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'presazine' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'presazine' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'presazine' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'presazine' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'presazine_widgets_init' );

/**
 * Register custom fonts.
 */
function presazine_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Rajdhani, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Rajdhani font: on or off', 'presazine' ) ) {
		$fonts[] = 'Rajdhani';
	}
	
	/* translators: If there are characters in your language that are not supported by Cinzel Decorative, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cinzel Decorative font: on or off', 'presazine' ) ) {
		$fonts[] = 'Cinzel Decorative';
	}

	/* translators: If there are characters in your language that are not supported by Courgette, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Courgette font: on or off', 'presazine' ) ) {
		$fonts[] = 'Courgette';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Fredericka the Great font: on or off', 'presazine' ) ) {
		$fonts[] = 'Fredericka the Great';

	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Tangerine font: on or off', 'presazine' ) ) {
		$fonts[] = 'Tangerine';

	}
	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'presazine' ) ) {
		$fonts[] = 'Montserrat:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'presazine' ) ) {
		$fonts[] = 'Lato:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Muli, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Muli font: on or off', 'presazine' ) ) {
		$fonts[] = 'Muli';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}



/**
 * Enqueue scripts and styles.
 */
function presazine_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$fonts_url = presazine_fonts_url();
	$primary_color = presazine_get_option( 'primary_color' );
	
		wp_enqueue_style( 'presazine-google-fonts', $fonts_url, array(), null );
		

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', '', '4.7.0' );

	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() .'/assets/css/slick-theme' . $min . '.css', '', 'v2.2.0');

	wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/assets/css/slick' . $min . '.css', '', 'v1.8.0');

	wp_enqueue_style( 'presazine-blocks', get_template_directory_uri() . '/assets/css/blocks' . $min . '.css' );

	wp_enqueue_style( 'presazine-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'imagesloaded' );
	
	wp_enqueue_script( 'jquery-packery', get_template_directory_uri() . '/assets/js/packery.pkgd' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'presazine-navigation', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'presazine-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'presazine-custom-js', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array('jquery'), '20151215', true );  
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'presazine_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Safar Lite 1.0.0
 */
function presazine_block_editor_styles() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Block styles.
	wp_enqueue_style( 'presazine-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . $min . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'presazine-fonts', presazine_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'presazine_block_editor_styles' );

/**
 * Webfont Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

require get_template_directory() . '/inc/customizer/widgets/widgets.php';
