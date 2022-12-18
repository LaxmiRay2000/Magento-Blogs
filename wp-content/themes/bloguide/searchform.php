<?php
/**
 * Template for displaying search forms in Theme Palace
 *
 * @package Theme Palace
 * @subpackage  Bloguide
 * @since  Bloguide 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'bloguide' ); ?></span>
	</label>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bloguide' ); ?>" value="<?php echo get_search_query(); ?>" name="s" aria-label="search Input" />
	<button type="submit" class="search-submit"><?php echo bloguide_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'bloguide' ); ?></span></button>
</form>