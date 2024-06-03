<?php
/**
 * Template Parts for BlogX theme.
 *
 * @package     BlogX
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogX 1.0
 */
?>
<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'blogx' ); ?></h1>
    </header><!-- .page-header -->
    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'blogx' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blogx' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'blogx' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
