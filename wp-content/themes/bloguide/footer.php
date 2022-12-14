<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

/**
 * bloguide_footer_primary_content hook
 *
 * @hooked bloguide_add_subscribe_section -  10
 *
 */
do_action( 'bloguide_footer_primary_content' );

/**
 * bloguide_content_end_action hook
 *
 * @hooked bloguide_content_end -  10
 *
 */
do_action( 'bloguide_content_end_action' );

/**
 * bloguide_content_end_action hook
 *
 * @hooked bloguide_footer_start -  10
 * @hooked Bloguide_Footer_Widgets->add_footer_widgets -  20
 * @hooked bloguide_footer_site_info -  40
 * @hooked bloguide_footer_end -  100
 *
 */
do_action( 'bloguide_footer' );

/**
 * bloguide_page_end_action hook
 *
 * @hooked bloguide_page_end -  10
 *
 */
do_action( 'bloguide_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
