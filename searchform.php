<?php
/**
 * Search Form for BlogBD theme.
 *
 * @package     BlogBD
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogBD 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'blogbd' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blogbd' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'blogbd' ); ?></button>
</form>
