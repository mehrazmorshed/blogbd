<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bloggy
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>
    </div><!-- #content -->
    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <?php
            printf( esc_html__( 'Proudly powered by %s', 'bloggy' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'bloggy' ) ) . '">WordPress</a>' );
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
