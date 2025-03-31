<?php

function jeg_init_variable()
{
    /* Theme Name */
    defined( 'JEG_THEMENAME' ) or define("JEG_THEMENAME", 'Minimy');
    defined( 'JEG_SHORTNAME' ) or define("JEG_SHORTNAME", 'minimy');
    defined( 'JEG_THEME' ) or define("JEG_THEME", 'jegtheme');

    /* url */
    defined( 'JEG_SERVER_URL' ) or define( "JEG_SERVER_URL", "http://jegtheme.com");
    defined( 'JEG_PURCHASE_URL') or define( "JEG_PURCHASE_URL", "http://jegtheme.com/ads/jkreativ.html" );
    defined( 'JEG_VALIDATION_URL' ) or define( "JEG_VALIDATION_URL", "http://jegtheme.com/client/validate/license");
    defined( 'JEG_SUPPORT_FORUM_URL' ) or define( "JEG_SUPPORT_FORUM_URL", "http://support.jegtheme.com");
    defined( 'JEG_LICENSE_NAME' ) or define( "JEG_LICENSE_NAME", "jkreativ_license" );

    /* themes version */
    $themeData          = wp_get_theme();
    $themeVersion       = trim($themeData['Version']);
    if (!$themeVersion)   $themeVersion = "1.0.0";
    define("JEG_VERSION"    , $themeVersion);

    // Register Menu
    register_nav_menus( array('primary' => 'Primary Menu',) );

    // Localization Support
    load_theme_textdomain('minimy-themes', get_template_directory() . '/lang');

    // Support feed link
    add_theme_support( 'automatic-feed-links' );

    // Featured image
    add_theme_support( 'post-thumbnails' );

    // Support Post Types
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'quote', 'video', 'audio' ) );

    // Add Title Tag
    add_theme_support( 'title-tag' );

    // Thumbnail Size
    add_image_size( 'postnav-thumb', 120, 120, true ); // (cropped)
    add_image_size( 'gallery-thumb', 200, 200, true ); // (cropped)

    // Unnecesary add
    if ( ! isset( $content_width ) ) $content_width = 660;
}

jeg_init_variable();

/* ------------------------------------------------------------------------- *
 *  Register Widgets
 * ------------------------------------------------------------------------- */
function jeg_init_sidebar() {

    // Sidebar Widget
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'minimy-themes' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Main sidebar that appears on the right.', 'minimy-themes' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
        'after_widget'  => '</aside>',
    ) );

    // Footer Widget 1
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'minimy-themes' ),
        'id'            => 'footer1',
        'description'   => esc_html__( 'Footer widget that appear on first column.', 'minimy-themes' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
        'after_widget'  => '</aside>',
    ) );

    // Footer Widget 2
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'minimy-themes' ),
        'id'            => 'footer2',
        'description'   => esc_html__( 'Footer widget that appear on second column.', 'minimy-themes' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
        'after_widget'  => '</aside>',
    ) );

    // Footer Widget 3
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'minimy-themes' ),
        'id'            => 'footer3',
        'description'   => esc_html__( 'Footer widget that appear on third column.', 'minimy-themes' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
        'after_widget'  => '</aside>',
    ) );
}
add_action( 'widgets_init', 'jeg_init_sidebar' );

function jeg_add_author_socials( $socials ) {
    $socials = array(
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
    );
    return $socials;
}
add_filter('user_contactmethods','jeg_add_author_socials',10,1);

//Adds SVG Upload Support
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


add_filter( 'upload_mimes', 'upload_allow_types' );
add_filter( 'wp_check_filetype_and_ext', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
	//allow new types
	$mimes['svg']  = 'image/svg+xml';
	$mimes['doc']  = 'application/msword';
	$mimes['woff'] = 'font/woff';
	$mimes['psd']  = 'image/vnd.adobe.photoshop';
	$mimes['webp'] =  'image/webp'; 
	// $mimes['djv']  = 'image/vnd.djvu';
	// $mimes['djvu'] = 'image/vnd.djvu';

	return $mimes;
}

// alter size of post gallery
function jeg_gallery_shortcode($output, $attr){
    $attr['size'] = 'gallery-thumb';
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) ) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( ! $attr['orderby'] ) {
            unset( $attr['orderby'] );
        }
    }

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => $html5 ? 'figure'     : 'dl',
        'icontag'    => $html5 ? 'div'        : 'dt',
        'captiontag' => $html5 ? 'figcaption' : 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery' );

    $id = intval( $atts['id'] );
    if ( 'RAND' == $atts['order'] ) {
        $atts['orderby'] = 'none';
    }

    if ( ! empty( $atts['include'] ) ) {
        $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( ! empty( $atts['exclude'] ) ) {
        $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
        $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }

    if ( empty( $attachments ) ) {
        return '';
    }

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment ) {
            $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
        }
        return $output;
    }

    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
        $itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
        $captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
        $icontag = 'dt';
    }

    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = '';

    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
        $gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>\n\t\t";
    }

    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default gallery shortcode CSS styles.
     * @param string $gallery_div   Opening HTML div container for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
            $image_output = wp_get_attachment_link( $id, $atts['size'], false, false );
        } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
            $image_output = wp_get_attachment_image( $id, $atts['size'], false );
        } else {
            $image_output = wp_get_attachment_link( $id, $atts['size'], true, false );
        }
        $image_meta  = wp_get_attachment_metadata( $id );

        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
        }
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
            $output .= '<br style="clear: both" />';
        }
    }

    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
        $output .= "
			<br style='clear: both' />";
    }

    $output .= "
		</div>\n";

    return $output;

}
add_filter( 'post_gallery', 'jeg_gallery_shortcode', 10, 2 );

// Make oEmbeds Responsive
function jeg_oembed_wrapper($html, $url, $attr, $post_id) {
    return "<div class='video-container'>{$html}</div>";
}
add_filter('embed_oembed_html','jeg_oembed_wrapper',10,4);

if ( ! function_exists( 'jnews_sanitize_output' ) ) {
	function jeg_sanitize_output( $value ) {
		return $value;
	}
}

if ( ! function_exists( 'minimy_register_widgets' ) ) {
	function minimy_register_widgets( $value ) {
		if ( function_exists( 'jeg_register_widgets' ) ) {
			jeg_register_widgets( $value );
		}
	}
}

/**
 * Gutenberg Optimized
 */
add_action( 'after_setup_theme', function() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong magenta', 'minimy-themes' ),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => esc_html__( 'light grayish magenta', 'minimy-themes' ),
            'slug' => 'light-grayish-magenta',
            'color' => '#d0a5db',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'minimy-themes' ),
            'slug' => 'very-light-gray',
            'color' => '#eee',
        ),
        array(
            'name' => esc_html__( 'very dark gray', 'minimy-themes' ),
            'slug' => 'very-dark-gray',
            'color' => '#444',
        ),
    ) );
    
    add_theme_support( 'editor-styles' );

    add_editor_style( 'style-editor.css' );
} );

add_action( 'enqueue_block_editor_assets',  function() {
    add_action( 'admin_enqueue_scripts', 'jeg_init_fonts', 10 );
} );

add_action( 'admin_print_styles', function() {
    ?>
    <style type="text/css">
        <?php
        $fonts = jeg_get_mods_fonts(); ?>

        .wp-block {
            font-family: <?php echo esc_attr( $fonts['body'] ) ?>;
        }

        .wp-block.editor-post-title__block textarea {
            font-family: <?php echo esc_attr( $fonts['heading'] ) ?>;
        }

        /***  CUSTOM CSS  ***/
        <?php if( get_theme_mod('custom_css') ) { echo get_theme_mod('custom_css'); }?>
    </style>
    <?php
}, 99 );


// Include Libraries
locate_template(array('lib/scriptstyle.php'), true, true);
locate_template(array('lib/jeg-functions.php'), true, true);
locate_template(array('lib/jeg-customizer.php'), true, true);
locate_template(array('tgm/plugin-list.php'), true, true);
locate_template(array('lib/additional-widget.php'), true, true);
locate_template(array('lib/jtemplate.php'), true, true);
