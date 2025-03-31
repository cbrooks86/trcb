<?php get_header(); ?>

<?php $archives_layout = jeg_get_archives_layout(); ?>
    <section class="container archive-layout-<?php echo jeg_sanitize_output( $archives_layout ); ?> ">

        <div class="archive-header">
            <span><?php esc_html_e( 'Posted By', 'minimy-themes' ) ?></span>
            <h1><?php echo jeg_get_author_name(); ?></h1>

            <div class="archive-image"><?php echo get_avatar( get_the_author_meta( 'ID' ) ) ?></div>

            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <p class="author-description"><?php the_author_meta( 'description' ); ?></p>
            <?php endif; ?>
        </div><!-- .archive-header -->

        <?php /*** Homepage style (with featured image) ***/
        if ( $archives_layout == 'homepage' ) : ?>

            <div class="content-wrapper">
            <?php
                if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) : the_post();

                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );

                    endwhile;

                    // Pagination
                    get_template_part( 'include/pagination' );

                else :
                    // If no content, include the "No posts found" template.
                    get_template_part( 'content', 'none' );

                endif;
            ?>

            </div><!-- .content-wrapper -->

        <?php /*** Default Layout (clean style) ***/
        else: ?>

            <div class="archive-body">
                <?php
                    if (have_posts()) :
                        // Start the Loop.
                        while (have_posts()) : the_post();

                            // Include the Archive template for the content.
                            get_template_part( 'content', 'archive' );

                        endwhile;

                        // Pagination
                        get_template_part( 'include/pagination' );

                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif;
                ?>
            </div>

        <?php endif; ?>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section>

<?php get_footer(); ?>
