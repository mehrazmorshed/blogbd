<?php
/**
 * Template Parts for Bloggy theme.
 *
 * @package     Bloggy
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       Bloggy 1.0
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
            the_post_thumbnail( 'bloggy-featured', array( 'class' => 'featured-image' ) );
        }
        ?>
        <div class="entry-meta">
            <?php bloggy_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content( sprintf(
            wp_kses(
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloggy' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloggy' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php bloggy_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
