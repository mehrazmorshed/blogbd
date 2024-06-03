<?php
/**
 * Customizer for BlogBD theme.
 *
 * @package     BlogBD
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogBD 1.0
 */


function blogbd_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'blogbd_link_color' , array(
        'default'   => '#0073aa',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_section( 'blogbd_color_section' , array(
        'title'      => __( 'Colors', 'blogbd' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogbd_link_color_control', array(
        'label'      => __( 'Link Color', 'blogbd' ),
        'section'    => 'blogbd_color_section',
        'settings'   => 'blogbd_link_color',
    ) ) );
}

add_action( 'customize_register', 'blogbd_customize_register' );

function blogbd_customize_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo esc_attr( get_theme_mod( 'blogbd_link_color', '#0073aa' ) ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'blogbd_customize_css' );
?>
