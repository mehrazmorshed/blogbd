<?php
/**
 * Customizer for BlogX theme.
 *
 * @package     BlogX
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogX 1.0
 */


function blogx_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'blogx_link_color' , array(
        'default'   => '#0073aa',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_section( 'blogx_color_section' , array(
        'title'      => __( 'Colors', 'blogx' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogx_link_color_control', array(
        'label'      => __( 'Link Color', 'blogx' ),
        'section'    => 'blogx_color_section',
        'settings'   => 'blogx_link_color',
    ) ) );
}

add_action( 'customize_register', 'blogx_customize_register' );

function blogx_customize_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo esc_attr( get_theme_mod( 'blogx_link_color', '#0073aa' ) ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'blogx_customize_css' );
?>
