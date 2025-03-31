<?php get_header(); ?>

    <section class="container">
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

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section><!-- .container -->

<?php get_footer(); ?>