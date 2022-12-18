<?php
/**
 * Getting Started Page.
 *
 * @package Book Author Blog
 */


$book_author_blog_theme = wp_get_theme();
$book_author_blog_version = $book_author_blog_theme->get('Version');
$book_author_blog_name = $book_author_blog_theme->get('Name');

define('BOOK_AUTHOR_BLOG_THEME_VERSION', $book_author_blog_version);
define('BOOK_AUTHOR_BLOG_THEME_NAME', $book_author_blog_name);

if( ! function_exists( 'book_author_blog_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function book_author_blog_getting_started_menu(){
	add_theme_page(
		__( '[Book Author Blog] Getting Started', 'book-author-blog' ),
		__( '[Book Author Blog] Getting Started', 'book-author-blog' ),
		'manage_options',
		'book-author-blog-getting-started',
		'book_author_blog_getting_started_page', $position = 0
	);
}
endif;
add_action( 'admin_menu', 'book_author_blog_getting_started_menu' );

if( ! function_exists( 'book_author_blog_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function book_author_blog_getting_started_admin_scripts( $hook ){
    wp_enqueue_style( 'book-author-blog-focus', get_template_directory_uri() . '/inc/getting-started/css/focus.css', false, BOOK_AUTHOR_BLOG_THEME_VERSION );
	// Load styles only on our page
	if( 'appearance_page_book-author-blog-getting-started' != $hook ) return;

    wp_enqueue_style( 'book-author-blog-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, BOOK_AUTHOR_BLOG_THEME_VERSION );

    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'book-author-blog-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery' ), BOOK_AUTHOR_BLOG_THEME_VERSION, true );
    wp_enqueue_script( 'book-author-blog-recommended-plugin-install', get_template_directory_uri() . '/inc/getting-started/js/recommended-plugin-install.js', array( 'jquery' ), BOOK_AUTHOR_BLOG_THEME_VERSION, true );
    wp_localize_script( 'book-author-blog-recommended-plugin-install', 'book_author_blog_start_page', array( 'activating' => __( 'Activating ', 'book-author-blog' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'book_author_blog_getting_started_admin_scripts' );

if( ! function_exists( 'book_author_blog_call_plugin_api' ) ) :
/**
 * Plugin API
**/
function book_author_blog_call_plugin_api( $plugin ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	$call_api = plugins_api(
        'plugin_information',
            array(
    		'slug'   => $plugin,
    		'fields' => array(
    			'downloaded'        => false,
    			'rating'            => false,
    			'description'       => false,
    			'short_description' => true,
    			'donate_link'       => false,
    			'tags'              => false,
    			'sections'          => true,
    			'homepage'          => true,
    			'added'             => false,
    			'last_updated'      => false,
    			'compatibility'     => false,
    			'tested'            => false,
    			'requires'          => false,
    			'downloadlink'      => false,
    			'icons'             => true
    		)
    	)
    );
	return $call_api;
}
endif;

if( ! function_exists( 'book_author_blog_check_for_icon' ) ) :
/**
 * Check For Icon
**/
function book_author_blog_check_for_icon( $arr ) {
	if( ! empty( $arr['svg'] ) ){
		$plugin_icon_url = $arr['svg'];
	}elseif( ! empty( $arr['2x'] ) ){
		$plugin_icon_url = $arr['2x'];
	}elseif( ! empty( $arr['1x'] ) ){
		$plugin_icon_url = $arr['1x'];
	}else{
		$plugin_icon_url = $arr['default'];
	}
	return $plugin_icon_url;
}
endif;

if( ! function_exists( 'book_author_blog_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function book_author_blog_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3><?php printf( esc_html__( 'Getting started with %1$s v%2$s', 'book-author-blog' ), BOOK_AUTHOR_BLOG_THEME_NAME, BOOK_AUTHOR_BLOG_THEME_VERSION ); ?></h3>
				<h4><?php printf( esc_html__( 'View our video walkthrough and setup guide below.', 'book-author-blog' ), BOOK_AUTHOR_BLOG_THEME_NAME ); ?></h4>
                <p>

                    <a href="<?php echo esc_url( 'https://rswpthemes.com/author-portfolio-pro-wordpress-theme/' ); ?>" class="button button-primary" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'book-author-blog' ); ?></a>

                </p>
			</div>
		</div>

		<div class="panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="plugins" href="javascript:void(0);">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M12,23H11V16.43A5.966,5.966,0,0,1,7,18a6.083,6.083,0,0,1-6-6V11H7.57A5.966,5.966,0,0,1,6,7a6.083,6.083,0,0,1,6-6h1V7.57A5.966,5.966,0,0,1,17,6a6.083,6.083,0,0,1,6,6v1H16.43A5.966,5.966,0,0,1,18,17,6.083,6.083,0,0,1,12,23Zm1-9.87v7.74a4,4,0,0,0,0-7.74ZM3.13,13A4.07,4.07,0,0,0,7,16a4.07,4.07,0,0,0,3.87-3Zm10-2h7.74a4,4,0,0,0-7.74,0ZM11,3.13A4.08,4.08,0,0,0,8,7a4.08,4.08,0,0,0,3,3.87Z" transform="translate(-1 -1)"/>
                        </svg>
                        <?php esc_html_e( 'Getting Started', 'book-author-blog' ); ?>
                    </a>
                </li>

			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/inc/getting-started/tabs/started.php'; ?>
				<?php require get_template_directory() . '/inc/getting-started/tabs/link-panel.php'; ?>
			</div><!-- .panel -->
		</div><!-- .panels -->
	</div><!-- .getting-started -->
	<?php
}
endif;