<div class="content-meta">
    <?php if ( get_theme_mod( 'show_meta_author', 1 ) ) : ?>
        <span class="meta-author"><?php esc_html_e( 'By', 'minimy-themes' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo jeg_get_author_name() ?></a></span>
    <?php endif; ?>

    <?php if ( get_theme_mod( 'show_meta_category', 1 ) ) : ?>
        <span class="meta-category"><?php esc_html_e( 'in', 'minimy-themes' ) ?> <?php the_category(', '); ?></span>
    <?php endif; ?>

    <?php if ( (!post_password_required() && ( comments_open() || get_comments_number() )) && get_theme_mod( 'show_meta_comment', 1 ) ) : ?>
        <span class="meta-comment"><?php comments_popup_link( esc_html__( 'No Comments', 'minimy-themes' ), esc_html__( '1 Comment', 'minimy-themes' ), esc_html__( '% Comments', 'minimy-themes' ) ); ?></span>
    <?php endif; ?>

    <?php if ( get_theme_mod( 'show_meta_date', 1 ) && (has_post_format( 'aside' ) || has_post_format( 'quote' )) ) : ?>
        <span class="meta-date"><?php the_date(); ?></span>
    <?php endif; ?>

</div>
