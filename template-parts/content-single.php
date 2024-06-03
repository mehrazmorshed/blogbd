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
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <?php
            bloggy_posted_on();
            bloggy_posted_by();
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-content">
        <?php
        the_content();
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
<?php
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
