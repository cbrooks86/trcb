<?php get_header(); ?>

    <section class="container">
        <div class="content-wrapper">

        <?php
            // Start the Loop.
            while (have_posts()) : the_post();

                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );

            endwhile;

            // If comments are open and enabled from theme cutomizer, load up the comment template
            if ( !get_theme_mod( 'post_hide_comment', '0' ) && (comments_open() || '0' != get_comments_number() ) ) :
                comments_template();
            endif;
        ?>

        </div><!-- .content-wrapper -->

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section><!-- .container -->

<?php get_footer(); ?>