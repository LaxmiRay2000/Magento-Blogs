<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Book Author Blog
 */

function book_author_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if (is_page()) {
		$get_page_sidebar_settings = get_theme_mod('page_sidebar', 'no');
		$sidebar_layouts = $get_page_sidebar_settings;
		$classes[] = $get_page_sidebar_settings . '-sidebar';
	}elseif (is_single()) {
		$get_post_sidebar_settings = get_theme_mod('post_sidebar', 'no');
		$sidebar_layouts = $get_post_sidebar_settings;
		$classes[] = $get_post_sidebar_settings . '-sidebar';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'right-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'book_author_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function book_author_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'book_author_blog_pingback_header' );
if ( ! function_exists( 'book_author_blog_comment_list' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Shape 1.0
	 */
	function book_author_blog_comment_list( $comment, $args, $depth ) {
		extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
  <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<?php if ( 'div' == $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID(); ?>" class="comment-body review-list">
	<?php endif; ?>
	<div class="single-comment">
		<div class="commenter-image">
			<?php
			if ( 0 != $args['avatar_size'] ) {
				echo get_avatar( $comment, $args['avatar_size'] );}
			?>
		</div>
		<div class="commnenter-details">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'book-author-blog' ); ?></em>
			<br />
		<?php endif; ?>
			<div class="comment-meta">
				<div class="comment-time">
					<p>
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
								echo esc_html( get_comment_date() . ' ' );
								echo esc_html( get_comment_time() );
							?>
						</time>
					</p>
				</div>
				<h4><?php printf( wp_kses_post( '%s', 'book-author-blog' ), sprintf( '%s', get_comment_author_link() ) ); ?></h4>
			</div>
				<?php comment_text(); ?>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
		</div>
	</div>
		<?php if ( 'div' == $args['style'] ) : ?>
  </div>
			<?php
  endif;
	}
endif; // ends check for book_author_blog_comment_list();

/**
 * Author VCard
 */
function book_author_blog_author_vcard() {
	?>
	<div class="author-vcard">
		<div class="author-vcard__image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', null );
			?>
		</div>
		<div class="author-vcard__about">
			<h4><?php echo esc_html( get_the_author_meta( 'nickname' ) ); ?></h4>
			<?php if(!empty(get_the_author_meta( 'description' ))): ?>
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<?php endif; ?>
			<p>
			<?php
			$userpost_count = count_user_posts( get_the_author_meta( 'ID' ), 'post', false );
			if ( $userpost_count > 1 ) {
				$numberingtext = 'posts';
			} else {
				$numberingtext = 'post';
			}
			$userposts = esc_html__( 'The author has %1$s %2$s', 'book-author-blog' );
			printf( $userposts, $userpost_count, $numberingtext );
			?>
			 </p>
		</div>
	</div>
	<?php
	return;
}

/**
 * Get Current Year
 */

 function book_author_blog_currentYear(){
    return date('Y');
}

/**
 * Get theme Data
 */
function book_author_blog_author_uri(){
	$themeData = wp_get_theme();
	return $authorURI = $themeData->get( 'AuthorURI' );
}

/**
 * Masonry Layout Control
 */
function book_author_blog_masonry_layout_control(){
	$get_masonry_layout = get_theme_mod('active_masonry_layout', true);
	if (true === $get_masonry_layout) {
		return ' masonry_active';
	}
	return '';
}

/**
 * Limit Excerpt length
 */
function book_author_blog_post_excerpt_limit( $length ) {
	$length = get_theme_mod('post_loop_excerpt_limit', 42);
   return $length;
}
add_filter( 'excerpt_length', 'book_author_blog_post_excerpt_limit', 999 );


/**
 * Social Links
 */

function book_author_blog_social_links(){
	$defaults_links = array(
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
			'social_link'  => 'https://medium.com',
		],
	);
	$social_links = get_theme_mod('social_links', $defaults_links);
	foreach( $social_links as $social_link ) :
		?>
		<div class="social-link">
			<a href="<?php echo esc_url($social_link['social_link']);?>" class="<?php echo esc_attr($social_link['social_icon_class']);?>"></a>
		</div>
		<?php
	endforeach;
	wp_reset_query();
}
function book_author_blog_get_books_layout(){
	$getBooksLayout = get_theme_mod('books_layout', 'product');
	return $getBooksLayout;
}

function book_author_blog_template_chooser($template){
	  global $wp_query;
	  $post_type = get_query_var('post_type');
	  if( $wp_query->is_search && $post_type == 'books-gallery' )
	  {
	    return locate_template('search-books.php');  //  redirect to archive-search.php
	  }
	  return $template;
}
add_filter('template_include', 'book_author_blog_template_chooser');

add_action('admin_menu', 'book_author_blog_personalize');
function book_author_blog_personalize(){
	remove_submenu_page( 'sb-instagram-feed', 'sb-instagram-feed-about' );
}

add_action('sbi_before_feed', 'book_author_blog_sbi_before_feed');
function book_author_blog_sbi_before_feed(){
	?>
	<div class="book-author-blog-instagram-section">
	<?php
}

add_action('sbi_after_feed', 'book_author_blog_sbi_after_feed');
function book_author_blog_sbi_after_feed(){
	?>
	</div>
	<?php
}

