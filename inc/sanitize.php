<?php
/**
 * Sanitizer for BlogX theme.
 *
 * @package     BlogX
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogX 1.0
 */

function blogx_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function blogx_sanitize_checkbox( $input ) {
    return ( isset( $input ) && true == $input ) ? true : false;
}

function blogx_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
?>
