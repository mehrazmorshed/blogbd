<?php
/**
 * BlogBD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BlogBD
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'BLOGBD_THEME_VERSION', '1.0' );
define( 'BLOGBD_THEME_SETTINGS', 'blogbd-settings' );
define( 'BLOGBD_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BLOGBD_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Register necessary features
 */
if ( ! function_exists( 'blogbd_setup' ) ) :
    function blogbd_setup() {
        load_theme_textdomain( 'blogbd', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'blogbd' ),
        ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'custom-background', apply_filters( 'blogbd_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Support for default block styles
        add_theme_support( 'wp-block-styles' );

        // Support for responsive embeds
        add_theme_support( 'responsive-embeds' );

        // Support for custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        // Support for custom header
        add_theme_support( 'custom-header', array(
            'default-image'      => '',
            'default-text-color' => '000000',
            'width'              => 1000,
            'height'             => 250,
            'flex-width'         => true,
            'flex-height'        => true,
        ) );

        // Support for wide alignment
        add_theme_support( 'align-wide' );

    }
endif;
add_action( 'after_setup_theme', 'blogbd_setup' );

/**
 * Define content width
 */
function blogbd_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'blogbd_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogbd_content_width', 0 );

/**
 * Register Sidebar  and Initialize Widgets
 */
function blogbd_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'blogbd' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'blogbd' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'blogbd_widgets_init' );

/**
 * Enqueue css and js files
 */
function blogbd_scripts() {
    wp_enqueue_style( 'blogbd-style', get_stylesheet_uri() );
    wp_enqueue_script( 'blogbd-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'blogbd_scripts' );

/**
 * Set default thumbnail size
 */
set_post_thumbnail_size( 1200, 9999 ); // Unlimited height, soft crop

/**
 * Define custom thumbnail sizes
 */
add_image_size( 'blogbd-featured', 800, 400, true ); // 800 pixels wide by 400 pixels tall, hard crop mode

/**
 * Required files
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/sanitize.php';

/**
 * Register custom block styles
 */
function blogbd_register_block_styles() {
    register_block_style(
        'core/quote',
        array(
            'name'  => 'fancy-quote',
            'label' => __( 'Fancy Quote', 'blogbd' ),
        )
    );
}
add_action( 'init', 'blogbd_register_block_styles' );

/**
 * Register custom block patterns
 */
function blogbd_register_block_patterns() {
    register_block_pattern(
        'blogbd/hero-section',
        array(
            'title'       => __( 'Hero Section', 'blogbd' ),
            'description' => _x( 'A custom hero section with a background image and heading.', 'Block pattern description', 'blogbd' ),
            'content'     => "<!-- wp:cover {\"url\":\"" . esc_url( get_template_directory_uri() ) . "/assets/hero.jpg\"} -->\n<div class=\"wp-block-cover\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Welcome to blogbd</h1>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->",
        )
    );
}
add_action( 'init', 'blogbd_register_block_patterns' );

/**
 * Add editor styles
 */
function blogbd_add_editor_styles() {
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'admin_init', 'blogbd_add_editor_styles' );

/**
 * Enqueue the comment-reply script
 */
function blogbd_enqueue_comment_reply_script() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'blogbd_enqueue_comment_reply_script' );