<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

get_header(); 
$options                = bloguide_get_theme_options();

?>

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="archive-blog-wrapper blog-posts <?php echo esc_attr( $options['blog_column'] ); ?> clear list-view">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - bloguide_action_pagination.
			*
			* @hooked bloguide_pagination 
			*/
			do_action( 'bloguide_action_pagination' ); 

			/**
			* Hook - bloguide_infinite_loader_spinner_action.
			*
			* @hooked bloguide_infinite_loader_spinner 
			*/
			do_action( 'bloguide_infinite_loader_spinner_action' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( bloguide_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
