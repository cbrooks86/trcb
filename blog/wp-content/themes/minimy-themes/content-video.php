<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="html5video">
    <?php
        if ( !get_theme_mod( 'post_hide_meta', 0 ) )
            get_template_part( 'include/postmeta' );
    ?>

    <h1 class="content-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h1>

    <?php if ( get_theme_mod( 'show_meta_date', 1 ) && !get_theme_mod( 'post_hide_meta', 0 ) ) : ?>
    <div class="content-time">
        <span><?php echo get_the_date(); ?></span>
    </div>
    <?php endif; ?>

    <div class="feature-holder">

        <?php
            $video_url      = get_post_meta( $post->ID, '_format_video_embed', true );
            $video_format   = strtolower( pathinfo( $video_url, PATHINFO_EXTENSION ) );
            $featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

            $youtube_regexp = "/^http:\/\/(?:www\.)?(?:youtube.com|youtu.be)\/(?:watch\?(?=.*v=([\w\-]+))(?:\S+)?|([\w\-]+))$/";
            $vimeo_regexp   = "/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i";
        ?>

        <?php if ( preg_match($youtube_regexp, $video_url) ) : ?>
            <div data-src="<?php echo esc_url( $video_url ) ?>" data-type="youtube" data-repeat="false" data-autoplay="false" class="youtube-class"><div class="video-container"></div></div>

        <?php elseif ( preg_match($vimeo_regexp, $video_url) ) : ?>
            <div data-src="<?php echo esc_url( $video_url ) ?>" data-repeat="false" data-autoplay="false" data-type="vimeo" class="vimeo-class"><div class="video-container"></div></div>

        <?php elseif ( wp_oembed_get( $video_url ) ) : ?>
            <div class="video-container"><?php echo wp_oembed_get( $video_url ); ?></div>

        <?php elseif ( $video_format == 'mp4' ) : ?>
            <video width="640" height="360" style="width: 100%; height: 100%;" poster="<?php echo esc_attr( $featured_img ) ?>" preload="none">
                <source type="video/mp4" src="<?php echo esc_url( $video_url ) ?>">
            </video>

        <?php endif; ?>

    </div>

    <?php if ( is_single() ) : get_template_part( 'content', 'single' ); else : ?>

        <div class="entry">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Continue Reading', 'minimy-themes') ?></a>
        </div>

    <?php endif; ?>
</article>
