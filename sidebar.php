<?php
/**
 * The sidebar containing the main widget area.
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
<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
