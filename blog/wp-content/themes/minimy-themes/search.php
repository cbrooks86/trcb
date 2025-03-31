<?php get_header(); ?>

    <section class="container">
        <div class="archive-header">
            <span><?php esc_html_e( 'Search Result For', 'minimy-themes' ); ?></span>
            <h1 class="page-title"><?php echo '"'. get_search_query() .'"' ?></h1>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="archive-body">
                <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();

                        // Include the Archive template for the content.
                        get_template_part( 'content', 'archive' );

                    endwhile;
                ?>
            </div>

            <?php
                // Pagination
                get_template_part( 'include/pagination' );

                else :
            ?>

            <!-- No Content Found -->
            <article class="no-content short-content">
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'minimy-themes' ); ?></p>
            </article>

        <?php endif; ?>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section>

<?php get_footer(); ?>
