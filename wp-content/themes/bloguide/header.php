<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Bloguide
	 * @since  Bloguide 1.0.0
	 */

	/**
	 * bloguide_doctype hook
	 *
	 * @hooked bloguide_doctype -  10
	 *
	 */
	do_action( 'bloguide_doctype' );

?>
<head>
<?php
	/**
	 * bloguide_before_wp_head hook
	 *
	 * @hooked bloguide_head -  10
	 *
	 */
	do_action( 'bloguide_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * bloguide_page_start_action hook
	 *
	 * @hooked bloguide_page_start -  10
	 *
	 */
	do_action( 'bloguide_page_start_action' ); 

	/**
	 * bloguide_loader_action hook
	 *
	 * @hooked bloguide_loader -  10
	 *
	 */
	do_action( 'bloguide_before_header' );

	/**
	 * bloguide_header_action hook
	 *
	 * @hooked bloguide_site_branding -  10
	 * @hooked bloguide_header_start -  20
	 * @hooked bloguide_site_navigation -  30
	 * @hooked bloguide_header_end -  50
	 *
	 */
	do_action( 'bloguide_header_action' );

	/**
	 * bloguide_content_start_action hook
	 *
	 * @hooked bloguide_content_start -  10
	 *
	 */
	do_action( 'bloguide_content_start_action' );

    /**
     * bloguide_header_image_action hook
     *
     * @hooked bloguide_header_image -  10
     *
     */
    do_action( 'bloguide_header_image_action' );
	
