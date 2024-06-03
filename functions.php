<?php
/**
 * BlogX functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BlogX
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'BLOGX_THEME_VERSION', '1.0' );
define( 'BLOGX_THEME_SETTINGS', 'blogx-settings' );
define( 'BLOGX_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BLOGX_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Register necessary features
 */
if ( ! function_exists( 'blogx_setup' ) ) :
    function blogx_setup() {
        load_theme_textdomain( 'blogx', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'blogx' ),
        ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'custom-background', apply_filters( 'blogx_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'blogx_setup' );

/**
 * Define content width
 */
function blogx_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'blogx_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogx_content_width', 0 );

/**
 * Register Sidebar  and Initialize Widgets
 */
function blogx_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'blogx' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'blogx' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'blogx_widgets_init' );

/**
 * Enqueue css and js files
 */
function blogx_scripts() {
    wp_enqueue_style( 'blogx-style', get_stylesheet_uri() );
    wp_enqueue_script( 'blogx-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'blogx_scripts' );

/**
 * Set default thumbnail size
 */
set_post_thumbnail_size( 1200, 9999 ); // Unlimited height, soft crop

/**
 * Define custom thumbnail sizes
 */
add_image_size( 'blogx-featured', 800, 400, true ); // 800 pixels wide by 400 pixels tall, hard crop mode

/**
 * Required files
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/sanitize.php';
