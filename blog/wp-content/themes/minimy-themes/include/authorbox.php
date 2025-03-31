<div class="author-box">
    <?php echo get_avatar( get_the_author_meta( 'ID' ) ) ?>
    <div class="author-box-wrap">
        <h5><?php echo jeg_get_author_name(); ?></h5>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <p><?php the_author_meta( 'description' ); ?></p>
        <?php endif; ?>
        <?php do_action( 'minimy_author_social' ); ?>
    </div>
</div>
