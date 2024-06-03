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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'blogx-featured', array( 'class' => 'featured-image' ) );
        }
        ?>
        <div class="entry-meta">
            <?php blogx_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content( sprintf(
            wp_kses(
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blogx' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blogx' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php blogx_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
