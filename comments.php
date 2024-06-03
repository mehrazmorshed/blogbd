<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BlogX
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf( 
                esc_html( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'blogx' ) ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>
        <?php the_comments_navigation(); ?>
    <?php endif; ?>
    <?php
    if ( ! comments_open() && get_comments_number() ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blogx' ); ?></p>
    <?php endif; ?>
    <?php comment_form(); ?>
</div><!-- #comments -->
