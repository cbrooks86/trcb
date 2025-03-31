<?php $featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

<?php do_action( 'minimy_social_share', $featured_img ); ?>
