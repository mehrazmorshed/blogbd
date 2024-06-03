<?php
/**
 * Template Tags for BlogX theme.
 *
 * @package     BlogX
 * @author      Mehraz Morshed
 * @copyright   Copyright (c) 2020, Mehraz Morshed
 * @link        https://mehrazmorshed.com
 * @since       BlogX 1.0
 */


if ( ! function_exists( 'blogx_posted_on' ) ) :
    function blogx_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );
        $posted_on = sprintf(
            esc_html_x( 'Posted on %s', 'post date', 'blogx' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );
        echo '<span class="posted-on">' . $posted_on . '</span>';
    }
endif;

if ( ! function_exists( 'blogx_posted_by' ) ) :
    function blogx_posted_by() {
        $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'blogx' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        echo '<span class="byline"> ' . $byline . '</span>';
    }
endif;

if ( ! function_exists( 'blogx_entry_footer' ) ) :
    function blogx_entry_footer() {
        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( esc_html__( ', ', 'blogx' ) );
            if ( $categories_list && blogx_categorized_blog() ) {
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'blogx' ) . '</span>', $categories_list );
            }
            $tags_list = get_the_tag_list( '', esc_html__( ', ', 'blogx' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blogx' ) . '</span>', $tags_list );
            }
        }
        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link( esc_html__( 'Leave a comment', 'blogx' ), esc_html__( '1 Comment', 'blogx' ), esc_html__( '% Comments', 'blogx' ) );
            echo '</span>';
        }
        edit_post_link(
            sprintf(
                wp_kses(
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'blogx' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

function blogx_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'blogx_categories' ) ) ) {
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            'number'     => 2,
        ) );
        $all_the_cool_cats = count( $all_the_cool_cats );
        set_transient( 'blogx_categories', $all_the_cool_cats );
    }
    return $all_the_cool_cats > 1;
}

function blogx_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    delete_transient( 'blogx_categories' );
}
add_action( 'edit_category', 'blogx_category_transient_flusher' );
add_action( 'save_post', 'blogx_category_transient_flusher' );
?>
