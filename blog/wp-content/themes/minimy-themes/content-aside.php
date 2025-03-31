<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="aside">
    <?php
        if ( !get_theme_mod( 'post_hide_meta', 0 ) )
            get_template_part( 'include/postmeta' );
    ?>

    <div class="entry notebook">
        <?php if ( is_single() ) :  ?>
            <?php the_content(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Continue Reading', 'minimy-themes') ?></a>
        <?php endif; ?>
    </div>
</article>
