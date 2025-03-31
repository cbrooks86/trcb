<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="quote">
    <?php
        if ( !get_theme_mod( 'post_hide_meta', 0 ) )
            get_template_part( 'include/postmeta' );
    ?>

    <div class="quote">
        <div class="quote-content-wrap">
            <div class="quote-content"><?php the_content() ?></div>
        </div>
        <a href="<?php echo get_post_meta($post->ID, '_format_quote_source_url', true); ?>" class="author">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="author-image">
                    <?php the_post_thumbnail( 'postnav-thumb' ); ?>
                </div>
            <?php endif; ?>
            <span><?php echo esc_attr(get_post_meta($post->ID, '_format_quote_source_name', true)); ?></span>
        </a>
    </div>
</article>