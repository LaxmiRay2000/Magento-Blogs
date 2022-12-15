<?php
/**
 * Template for displaying search forms
 *
 * @package Presazine
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'presazine' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'presazine' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'presazine' ) ?>" />
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'presazine' ) ?>"><i class="fa fa-search"></i></button>
</form>