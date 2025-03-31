<!-- GitHub Script -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="link">
    <h1 class="content-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h1>
    <?php
        if ( !get_theme_mod( 'post_hide_meta', 0 ) )
            get_template_part( 'include/postmeta' );
    ?>

    <?php $my_post_meta = get_post_meta($post->ID, 'github', true); ?>
    <?php if ( ! empty ( $my_post_meta ) ) { ?>
    <div class="content-time">
        <a class="github-button" href="
        <?php echo get_post_meta($post->ID, 'github', true); ?>" data-large="large"
            aria-label="Check out on GitHub">Watch
        </a>
    </div>
    <?php } ?>
    <?php if ( is_single() ) : get_template_part( 'content', 'single' ); else : ?>

    <div class="entry">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>"
            class="readmore"><?php esc_html_e( 'Continue Reading', 'minimy-themes') ?></a>
    </div>

    <?php endif; ?>
</article>