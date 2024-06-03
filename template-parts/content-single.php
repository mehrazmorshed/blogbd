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
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <?php
            blogx_posted_on();
            blogx_posted_by();
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-content">
        <?php
        the_content();
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
<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
