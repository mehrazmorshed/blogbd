<?php
/**
 * Sanitizer for BlogBD theme.
 *
 * @package     BlogBD
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogBD 1.0
 */

function blogbd_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function blogbd_sanitize_checkbox( $input ) {
    return ( isset( $input ) && true == $input ) ? true : false;
}

function blogbd_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
?>
