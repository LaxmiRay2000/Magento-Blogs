<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Presazine
 */
/**
* Hook - presazine_action_doctype.
*
* @hooked presazine_doctype -  10
*/
do_action( 'presazine_action_doctype' );
?>
<head>
<?php
/**
* Hook - presazine_action_head.
*
* @hooked presazine_head -  10
*/
do_action( 'presazine_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - presazine_action_before.
*
* @hooked presazine_page_start - 10
*/
do_action( 'presazine_action_before' );

/**
*
* @hooked presazine_header_start - 10
*/
do_action( 'presazine_action_before_header' );

/**
*
*@hooked presazine_site_branding - 10
*@hooked presazine_header_end - 15 
*/
do_action('presazine_action_header');

/**
*
* @hooked presazine_content_start - 10
*/
do_action( 'presazine_action_before_content' );

/**
 * Banner start
 * 
 * @hooked presazine_banner_header - 10
*/
do_action( 'presazine_banner_header' );  
