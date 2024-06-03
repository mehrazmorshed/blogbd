<?php
/**
 * Sanitizer for Bloggy theme.
 *
 * @package     Bloggy
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       Bloggy 1.0
 */

function bloggy_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function bloggy_sanitize_checkbox( $input ) {
    return ( isset( $input ) && true == $input ) ? true : false;
}

function bloggy_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
?>
