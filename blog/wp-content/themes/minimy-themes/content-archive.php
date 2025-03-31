<div id="post-<?php the_ID(); ?>" <?php post_class( jeg_post_class() ); ?>>
    <span class="archive-time"><?php the_time( get_option( 'date_format' ) ); ?></span>
    <span class="archive-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></span>
</div>