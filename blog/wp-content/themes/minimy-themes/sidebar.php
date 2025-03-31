<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Minimy
 */

$enable_sidebar = array(
    'home' => get_theme_mod( 'show_sidebar_on_home', 0 ),
    'posts' => get_theme_mod( 'show_sidebar_on_posts', 1 ),
    'archive' => get_theme_mod( 'show_sidebar_on_archive', 1 ),
);

if ( ! is_active_sidebar( 'sidebar' )
    || ( is_home() && ! $enable_sidebar['home'] )
    || ( is_archive() && ! $enable_sidebar['archive'] )
    || ( is_single()  && ! $enable_sidebar['posts'] ) ) :

    return;
endif;
?>

<div class="sidebar-wrapper" role="complementary">
    <?php dynamic_sidebar( 'sidebar' ); ?>
</div>