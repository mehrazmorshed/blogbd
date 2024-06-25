<?php
/**
 * The header for BlogBD Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogBD
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogbd' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $blogbd_description = get_bloginfo( 'description', 'display' );
                if ( $blogbd_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $blogbd_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <img width="24" height="24" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home.png'); ?>" alt="Menu">
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'menu',
                ) );
                ?>
            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->

        <div id="content" class="site-content">
