<div class="entry clearfix">
    <?php the_content(); ?>

    <?php if ( has_tag() && !get_theme_mod( 'post_hide_tags', 0 ) ) : ?>
    <div class="tag-wrapper">
        <div class="meta-article-header">
            <span><?php esc_html_e( 'Article Tags', 'minimy-themes' ); ?></span>
        </div>
        <div class="article-tag">
            <?php the_tags(); ?>
        </div>
    </div>
    <?php endif; ?>

    <?php
        if ( !get_theme_mod( 'post_hide_share',     0 ) )   get_template_part( 'include/socialshare' );
        if ( !get_theme_mod( 'post_hide_authorbox', 0 ) && ! post_password_required() )   get_template_part( 'include/authorbox' );
        if ( !get_theme_mod( 'post_hide_postnav',   0 ) )   get_template_part( 'include/postnavigation' );
    ?>
</div>

<?php
    if ( !get_theme_mod( 'post_hide_relatedpost', 0 ) )
        get_template_part( 'include/relatedpost' );
?>
