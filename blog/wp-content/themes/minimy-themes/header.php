<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo bloginfo('rss2_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class( jeg_get_additional_body_class() ); ?>>

<?php
    $logo            = jeg_get_image_src( get_theme_mod('logo') );
    $logo2x          = jeg_get_image_src( get_theme_mod('logo_retina') );
    $sidemenu_logo   = jeg_get_image_src( get_theme_mod('sidemenu_logo') );
    $sidemenu_logo2x = jeg_get_image_src( get_theme_mod('sidemenu_logo_retina') );

    $logo            = !empty($logo) ? $logo : get_template_directory_uri() .'/images/logo.png';
    $logo2x          = !empty($logo2x) ? $logo2x : get_template_directory_uri() .'/images/logo@2x.png';
    $sidemenu_logo   = !empty($sidemenu_logo) ? $sidemenu_logo : get_template_directory_uri() .'/images/logo.png';
    $sidemenu_logo2x = !empty($sidemenu_logo2x) ? $sidemenu_logo2x : get_template_directory_uri() .'/images/logo@2x.png';
?>

<!-- global viewport -->
<div class="global-viewport">
    <header class="title-centered">
        <!-- <div class="container"> -->
        <h1 id="siteheader"><a href="/blog">Christopher Brooks</a></h1>
            <div class="open-menu"><i class="fa fa-bars"></i> <span><?php _e("Menu &amp; Search",'minimy-themes'); ?></span></div>
        <!-- </div> -->
    </header>
<hr id="post-header"/>
    <!-- sidemenu -->
    <div class="sidemenu">
        <a href="#" class="sidelogo" title="side menu logo" style="padding-top: <?php echo get_theme_mod( 'sidemenu_logo_padding_top', 50 ); ?>px; padding-bottom: <?php echo get_theme_mod( 'sidemenu_logo_padding_bottom', 0 ); ?>px">
            <img src="<?php echo esc_url( $sidemenu_logo ); ?>" data-at2x="<?php echo esc_url( $sidemenu_logo2x ); ?>" alt="<?php bloginfo('name'); ?>">
        </a>

        <div class="sidemenu-wrapper">
            <div class="sidenav">

                <?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>

                <div class="searchnav">
                    <i class="fa fa-search"></i>
                    <div class="searchbox">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidefooter">
            <?php do_action( 'minimy_sidefeed_social' ); ?>

            <div class="copyright">
                <?php echo get_theme_mod( 'footer_text', '&copy; TheRealChrisBrooks.com' ); ?>
            </div>
        </div>
    </div>
    <!-- sidemenu end -->
