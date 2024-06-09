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

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogbd_link_color_control', array(
        'label'      => __( 'Link Color', 'blogbd' ),
        'section'    => 'colors',
        'settings'   => 'blogbd_link_color',
    ) ) );

    // Add Excerpt Length Setting
    $wp_customize->add_setting( 'excerpt_length', array(
        'default'           => 20,
        'sanitize_callback' => 'absint',
    ) );

    // Add Excerpt Length Control
    $wp_customize->add_control( 'excerpt_length', array(
        'label'       => __( 'Excerpt Length', 'blogbd' ),
        'description' => __( 'Set the number of words for post excerpts.', 'blogbd' ),
        'section'     => 'title_tagline', // You can add a new section or use an existing one
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
        ),
    ) );

    // Add Read More Text Setting
    $wp_customize->add_setting( 'read_more_text', array(
        'default'           => __( 'Read more', 'blogbd' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    // Add Read More Text Control
    $wp_customize->add_control( 'read_more_text', array(
        'label'       => __( 'Read More Text', 'blogbd' ),
        'description' => __( 'Set the text for the "Read more" link in excerpts.', 'blogbd' ),
        'section'     => 'title_tagline', // You can add a new section or use an existing one
        'type'        => 'text',
    ) );

}

add_action( 'customize_register', 'blogbd_customize_register' );

function blogbd_customize_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo esc_attr( get_theme_mod( 'blogbd_link_color', '#0073aa!important' ) ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'blogbd_customize_css' );
?>
