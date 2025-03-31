<?php

if ( has_category( '', $post->ID ) ) :
    $categories = get_the_category( $post->ID );
    $category_ids = array();
    foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;

    $args = array(
        'category__in'        => $category_ids,
        'post__not_in'        => array($post->ID),
        'showposts'           => 3,
        'ignore_sticky_posts' => 1
    );

    // The Query
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) : ?>

    <div class="relative-article clearfix">
        <div class="meta-article-header">
            <span><?php esc_html_e( 'Related article', 'minimy-themes' ); ?></span>
        </div>

        <div class="related-article-wrapper clearfix">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <a href="<?php the_permalink() ?>" class="related-article-single">
                <div class="related-article-content">
                    <?php
                        $postformat = get_post_format();
                        if(!has_post_thumbnail()) {
                            switch($postformat) {
                                case "aside" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-newspaper-o'></i></div></div>";
                                    break;
                                case "audio" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-music'></i></div></div>";
                                    break;
                                case "gallery" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-camera-retro'></i></div></div>";
                                    break;
                                case "link" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-external-link'></i></div></div>";
                                    break;
                                case "quote" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-quote-left'></i></div></div>";
                                    break;
                                case "video" :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-play'></i></div></div>";
                                    break;
                                default :
                                    echo "<div class='no-thumbnail-wrapper'><div class='no-thumbnail-inner'><i class='fa fa-image'></i></div></div>";
                                    break;
                            }
                        } else {
                            $thumbnail_id = get_post_thumbnail_id();
                            $imagesrc = wp_get_attachment_image_src($thumbnail_id, "gallery-thumb");
                            echo "<img src='{$imagesrc[0]}' alt='" . get_the_title() ."'>";
                        }

                    ?>
                    <h3><?php the_title() ?></h3>
                    <p><?php jeg_custom_excerpt_length( 10 ) ?></p>
                </div>
            </a>
        <?php endwhile; ?>
        </div>
    </div>

    <?php else :
        // no posts found
    endif;
    /* Restore original Post Data */
    wp_reset_postdata();
endif;

?>
