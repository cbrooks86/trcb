<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="audio">
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
            $audio_url = get_post_meta( $post->ID, '_format_audio_embed', true );
            $audio_format = strtolower( pathinfo( $audio_url, PATHINFO_EXTENSION ) );

            if ( in_array( $audio_format, array('mp3', 'ogg', 'wav') ) ) : ?>
                <div data-mp3="<?php echo esc_url( $audio_url ) ?>" data-type="audio" class="audio-class"></div>
            <?php endif;
        ?>

    </div>

    <?php if ( is_single() ) : get_template_part( 'content', 'single' ); else : ?>

        <div class="entry">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Continue Reading', 'minimy-themes') ?></a>
        </div>

    <?php endif; ?>
</article>
