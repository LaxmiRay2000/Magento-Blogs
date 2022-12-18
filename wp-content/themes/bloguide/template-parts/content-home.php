<?php
/**
 * The home Page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */
$options                = bloguide_get_theme_options();

?>

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="archive-blog-wrapper <?php echo esc_attr( $options['blog_column'] ); ?> clear grid-layout">
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
            <?php do_action( 'bloguide_action_pagination' );  ?>
        </main>
    </div>

    <?php  
	if ( bloguide_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
    
</div>
	<?php  
	/**
	* Hook - bloguide_action_pagination.
	*
	* @hooked bloguide_pagination 
	*/

	/**
	* Hook - bloguide_infinite_loader_spinner_action.
	*
	* @hooked bloguide_infinite_loader_spinner 
	*/
	do_action( 'bloguide_infinite_loader_spinner_action' );
	?>
