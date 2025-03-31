<?php
    $next_post = get_next_post();
    $prev_post = get_previous_post();
?>
<!-- next prev article -->
<div class="navigator-wrapper">
    <div class="prev-next-article-wrapper">
        <?php if ( !empty($prev_post) ) : ?>
        <div class="prev-article prev-next-article">
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <article>
                    <?php $prev_thumb =  get_the_post_thumbnail( $prev_post->ID, 'postnav-thumb' ); ?>
                    <?php if ( !empty($prev_thumb) ) : ?>
                        <div class="thumb"><?php echo get_the_post_thumbnail( $prev_post->ID, 'postnav-thumb' ) ?></div>
                    <?php endif; ?>

                    <div class="summary" style="">
                        <h3 class="date"><?php esc_html_e( 'Previous Story', 'minimy-themes' ); ?></h3>
                        <h2 class="heading" title="<?php echo esc_attr( $prev_post->post_title ) ?>"><?php echo esc_html( $prev_post->post_title ) ?></h2>
                    </div>
                </article>
                <div class="arrow arrow-left">
                    <div class="arrow-inner"></div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if ( !empty($next_post) ) : ?>
        <div class="next-article prev-next-article">
            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                <article>
                    <?php $next_thumb =  get_the_post_thumbnail( $next_post->ID, 'postnav-thumb' ); ?>
                    <?php if ( !empty($next_thumb) ) : ?>
                        <div class="thumb"><?php echo get_the_post_thumbnail( $next_post->ID, 'postnav-thumb' ) ?></div>
                    <?php endif; ?>

                    <div class="summary" style="">
                        <h3 class="date"><?php esc_html_e( 'Next Story', 'minimy-themes' ); ?></h3>
                        <h2 class="heading" title="<?php echo esc_attr( $next_post->post_title ) ?>"><?php echo esc_html( $next_post->post_title ) ?></h2>
                    </div>
                </article>

                <div class="arrow arrow-right">
                    <div class="arrow-inner"></div>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- next prev article -->
