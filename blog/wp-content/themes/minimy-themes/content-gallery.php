<?php
    $gallery_type = get_post_meta( $post->ID, '_format_gallery_type', true );
    $article_type = $gallery_type === 'tile' ? 'gallery' : 'gallery-slider';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?> data-article-type="<?php echo esc_attr( $article_type ) ?>">
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

    <?php
        // query the gallery images meta
        $images = get_post_meta($post->ID, '_format_gallery_images', true);
    ?>
    <div class="feature-holder">
        <?php if ( $gallery_type === 'tile' ) : ?>

            <div class="gallery-thumbnail-4 jeg-gallery-thumbnail">
                <?php if ( $images ) : foreach ( $images as $image_id ) :

                    $image = wp_get_attachment_image_src( $image_id, 'large' );
                    $thumbnail = wp_get_attachment_image_src( $image_id, 'gallery-thumb' );

                    $attachment = get_post( $image_id );
                    $alt = trim(strip_tags( get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true) ));
                    $image_title = $attachment->post_title;

                    ?>
                    <figure class="gallery-item">
                        <div class="gallery-icon">
                            <a href="<?php echo esc_url( $image[0] ) ?>" title="<?php echo esc_attr( $image_title ) ?>">
                                <div class="overlay"><i class="fa fa-plus"></i></div>
                                <img alt="<?php echo (empty($alt) ? sanitize_title($image_title) : $alt) ?>" class="attachment-thumbnail" src="<?php  echo esc_url( $thumbnail[0] ) ?>">
                            </a>
                        </div>
                    </figure>
                <?php endforeach; endif; ?>
            </div>

        <?php else : ?>

            <div class="fotorama" data-arrows="false" data-fit="cover" data-width="100%" data-ratio="100/62" data-max-width="100%">
                <?php if ( $images ) : foreach ( $images as $image_id ) :

                    $image = wp_get_attachment_image_src( $image_id, 'large' );
                    $attachment = get_post( $image_id );
                    $alt = trim(strip_tags( get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true) ));

                    ?>
                    <img src="<?php echo esc_url( $image[0] ) ?>" alt="<?php echo esc_attr( empty($alt) ? sanitize_title($attachment->post_title) : $alt ) ?>" />
                <?php endforeach; endif; ?>
            </div>

        <?php endif; ?>
    </div>

    <?php if ( is_single() ) : get_template_part( 'content', 'single' ); else : ?>

        <div class="entry">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Continue Reading', 'minimy-themes') ?></a>
        </div>

    <?php endif; ?>
</article>
