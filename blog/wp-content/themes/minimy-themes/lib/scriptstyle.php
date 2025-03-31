<?php

add_action('wp_enqueue_scripts', 'jeg_init_style');
add_action('wp_enqueue_scripts', 'jeg_favicon');
add_action('wp_enqueue_scripts', 'jeg_init_fonts');
add_action('wp_enqueue_scripts', 'jeg_init_script');
add_action('wp_head', 'jeg_html5shim');
add_action('wp_head', 'jeg_customizer_style');


/* ------------------------------------------------------------------------- *
 *  Load CSS
/* ------------------------------------------------------------------------- */
function jeg_init_style() {
    if(!jeg_is_login_page()) {

        $templateurl = get_template_directory_uri();

        wp_enqueue_style('wp-mediaelement',       null, JEG_VERSION);
        wp_enqueue_style('jeg-fontawesome',    $templateurl . '/fonts/fontawesome/css/font-awesome.min.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-fotorama',       $templateurl . '/css/fotorama/fotorama.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-swipebox',       $templateurl . '/css/swipebox/swipebox.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-main',           get_stylesheet_uri() , null, JEG_VERSION);

        if ( get_theme_mod( 'theme_style', 'male' ) == 'female' )
            wp_enqueue_style ('jeg-theme-style',    $templateurl . '/css/female.css' , null, JEG_VERSION );

        wp_enqueue_style('jeg-responsive',     $templateurl . '/css/responsive.css', null, JEG_VERSION );
    }
}


/* ------------------------------------------------------------------------- *
 *  Load Javascripts
/* ------------------------------------------------------------------------- */
function jeg_init_script () {

    jeg_register_script();

    if(!jeg_is_login_page()) {
        wp_enqueue_script( 'jeg-hoverintent' );
        wp_enqueue_script( 'jeg-fotorama' );
        wp_enqueue_script( 'jeg-swipebox' );
        wp_enqueue_script( 'jeg-retina' );
        wp_enqueue_script( 'jeg-main' );
        wp_enqueue_script( 'jeg-mediaelement' );
    }
}

function jeg_register_script() {

    $templateurl = get_template_directory_uri();

    wp_register_script( 'jeg-hoverintent'    , $templateurl . '/js/jquery.hoverIntent.js', array('jquery'), JEG_VERSION, true );
    wp_register_script( 'jeg-fotorama'       , $templateurl . '/js/fotorama.js', null, JEG_VERSION, true );
    wp_register_script( 'jeg-swipebox'       , $templateurl . '/js/jquery.swipebox.js', null, JEG_VERSION, true );
    wp_register_script( 'jeg-retina'         , $templateurl . '/js/retina.js', null, JEG_VERSION, true );
    wp_register_script( 'jeg-html5shiv'      , $templateurl . '/js/html5shiv.min.js', null, JEG_VERSION, true );
    wp_register_script( 'jeg-mediaelement'   , $templateurl . '/js/mediaelement-and-player.min.js', null, JEG_VERSION, true );
    wp_register_script( 'jeg-main'           , $templateurl . '/js/main.js', null, JEG_VERSION, true );
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}


function jeg_html5shim () {
    global $is_IE;

    if ($is_IE) :
        echo "<!--[if lt IE 9]>\n";
        echo '<script src="'. get_template_directory_uri() . "/js/html5shiv.min.js\"></script>\n";
        echo "<![endif]-->";
    endif;
}

/* ------------------------------------------------------------------------- *
 *  Load Favicon
/* ------------------------------------------------------------------------- */
function jeg_favicon() {
    $favicon   = jeg_get_image_src( get_theme_mod('favicon') );
    $favicon2x = jeg_get_image_src( get_theme_mod('favicon_retina') );

    $favicon = !empty($favicon) ? $favicon : get_template_directory_uri() .'/images/favicon-16x16.png';
    $favicon2x = !empty($favicon2x) ? $favicon2x : get_template_directory_uri() .'/images/favicon-32x32.png';

    echo "<link rel=\"icon\" type=\"image/png\" href=\"{$favicon2x}\" sizes=\"32x32\" />\n".
         "<link rel=\"icon\" type=\"image/png\" href=\"{$favicon}\" sizes=\"16x16\" />\n";
}

/* ------------------------------------------------------------------------- *
 *  Fonts Customizer
/* ------------------------------------------------------------------------- */

// url example : https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Playfair+Display:400normal,italic
function jeg_init_fonts() {
    $fonts = jeg_get_mods_fonts();

    foreach ( $fonts as $key => $font ) {
        if ( $fonts[$key] == 'default' ) {
            unset( $fonts[ $key ] );
        }
        $fonts[ $key ] = $fonts[ $key ] . ":400,400italic,700";
    }


    if ( ! empty($fonts) )
        echo '<link id="jeg-font-cuztomizer" href="//fonts.googleapis.com/css?family='. urlencode( implode( "|", array_unique($fonts) ) ) .'&subset=latin,latin-ext" rel="stylesheet" type="text/css">';
}

function jeg_cuztomize_fonts() {
    $fonts = jeg_get_mods_fonts(); ?>

/*** Global Font ***/
body, input, textarea, button, select, label {
    font-family: <?php echo esc_attr( $fonts['body'] ) ?>;
}

/*** Heading ***/
article .content-title, article .content-time, article .content-meta, footer, header .open-menu,
.sidefooter, .sidenav, .paging, .search-input input, .archive-header h1, .archive-header span,
.comment-wrapper h3.heading, .comment-table li, .comment-respond, #commentform label,
.themeform input, .themeform textarea, .themeform button, .commentlist .fn, .commentlist .comment-meta a,
.author-box h5, .related-article-content > h3, .prev-next-article .date, .meta-article-header,
.sidebar-wrapper h1.widget-title, .sidebar-wrapper h1.widget-title
{
    font-family: <?php echo esc_attr( $fonts['heading'] ) ?>;
}

/*** Menu ***/
.sidenav, header .open-menu > span {
    font-family: <?php echo esc_attr( $fonts['menu'] ) ?>;
} <?php

}

function jeg_get_fontweight( $fontweightstyle ) {
    $fontweight = '400';
    $fontstyle  = 'normal';

    if ( $fontweightstyle == 'regular' ) {
        $fontweight = '400';
    } elseif ( $fontweightstyle == 'italic' ) {
        $fontweight = '400';
        $fontstyle  = 'italic';
    } elseif ( strpos( $fontweightstyle, 'italic' ) ) {
        $fontweight = str_replace( 'italic', '', $fontweightstyle );
        $fontstyle  = 'italic';
    } ?>

    font-weight: <?php echo esc_attr( $fontweight ) ?>;
    font-style: <?php echo esc_attr( $fontstyle ) ?>;

    <?php
}

function jeg_get_mods_fonts() {

    $fonts = array(
        'body' => get_theme_mod( 'font_family_body' ),
        'heading' => get_theme_mod( 'font_family_heading' ),
        'menu' => get_theme_mod( 'font_family_menu' ),
    );

    if ( get_theme_mod( 'theme_style', 'male' ) == 'male' ) {
        if( $fonts['body'] === 'default' || empty($fonts['body']) ) $fonts['body'] = 'Merriweather';
        if( $fonts['heading'] === 'default' || empty($fonts['heading'])) $fonts['heading'] = 'Lato';
        if( $fonts['menu'] === 'default' || empty($fonts['menu']))  $fonts['menu'] = 'Open Sans';
    } else {
        if( $fonts['body'] === 'default' || empty($fonts['body']) ) $fonts['body'] = 'Playfair Display';
        if( $fonts['heading'] === 'default' || empty($fonts['heading'])) $fonts['heading'] = 'Playfair Display';
        if( $fonts['menu'] === 'default' || empty($fonts['menu']))  $fonts['menu'] = 'Playfair Display';
    }
     return $fonts;
}

/* ------------------------------------------------------------------------- *
 *  Customizer Style
/* ------------------------------------------------------------------------- */
function jeg_customizer_style() { ?>
    <style type="text/css">

        /***  FONT CUSTOMIZER  ***/
        <?php echo esc_attr( jeg_cuztomize_fonts() ); ?>

        /***  CUSTOM CSS  ***/
        <?php if( get_theme_mod('custom_css') ) { echo get_theme_mod('custom_css'); }?>

    </style>
    <?php
}