<?php
if ( ! function_exists( 'bloggy_setup' ) ) :
    function bloggy_setup() {
        load_theme_textdomain( 'bloggy', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'bloggy' ),
        ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'custom-background', apply_filters( 'bloggy_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'bloggy_setup' );

function bloggy_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'bloggy_content_width', 640 );
}
add_action( 'after_setup_theme', 'bloggy_content_width', 0 );

function bloggy_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bloggy' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'bloggy' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'bloggy_widgets_init' );

function bloggy_scripts() {
    wp_enqueue_style( 'bloggy-style', get_stylesheet_uri() );
    wp_enqueue_script( 'bloggy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'bloggy_scripts' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/sanitize.php';





// Enable support for Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Set default thumbnail size
set_post_thumbnail_size( 1200, 9999 ); // Unlimited height, soft crop

// Define custom thumbnail sizes
add_image_size( 'bloggy-featured', 800, 400, true ); // 800 pixels wide by 400 pixels tall, hard crop mode









// Enqueue theme scripts
function bloggy_enqueue_scripts() {
    wp_enqueue_script( 'bloggy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'bloggy_enqueue_scripts' );



?>
