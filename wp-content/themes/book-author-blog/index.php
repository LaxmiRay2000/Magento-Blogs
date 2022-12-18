<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Book Author Blog
 */
get_header();

if (class_exists('Rswpbs')) {
	$showHideBookSlider = get_theme_mod('books_slider_on_off', false);
	if (true == $showHideBookSlider) {
		get_template_part('template-parts/books-showcase/books', 'slider');
	}
}
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<?php
		do_action( 'book_author_blog_before_default_page' );
		if ( have_posts() ) :
			echo '<div class="row'.book_author_blog_masonry_layout_control().'">';
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type() );
				endwhile;
			echo '</div>';
				book_author_blog_navigation();
			else :
				get_template_part( 'template-parts/content/content', 'none' );
		endif;
		do_action( 'book_author_blog_after_default_page' );
		?>
	</main><!-- #main -->
</div>
<?php
get_footer();
