<?php
function bloggy_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'bloggy_link_color' , array(
        'default'   => '#0073aa',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_section( 'bloggy_color_section' , array(
        'title'      => __( 'Colors', 'bloggy' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bloggy_link_color_control', array(
        'label'      => __( 'Link Color', 'bloggy' ),
        'section'    => 'bloggy_color_section',
        'settings'   => 'bloggy_link_color',
    ) ) );
}

add_action( 'customize_register', 'bloggy_customize_register' );

function bloggy_customize_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo esc_attr( get_theme_mod( 'bloggy_link_color', '#0073aa' ) ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'bloggy_customize_css' );
?>
