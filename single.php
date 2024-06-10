<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BlogBD
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );

            //the_post_navigation();

            if ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                echo '<div class="navigation-post">';
                echo '<table class="post-navigation-table"><tr>';

                echo '<td class="previous-post">';
                previous_post_link('%link', '<span class="">' . __( '<< Previous post', 'blogbd' ) . '</span> <span class="post-title">%title</span>');
                echo '</td>';

                echo '<td class="next-post">';
                next_post_link('%link', '<span class="">' . __( 'Next post >>', 'blogbd' ) . '</span> <span class="post-title">%title</span>');
                echo '</td>';
                
                echo '</tr></table>';
                echo '</div>';
            }

            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile;
        ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
