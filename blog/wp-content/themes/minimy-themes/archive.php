<?php get_header(); ?>

<?php $archives_layout = jeg_get_archives_layout(); ?>
    <section class="container archive-layout-<?php echo jeg_sanitize_output( $archives_layout ); ?> ">

            <div class="archive-header">
                <?php
                    if ( is_day() ) :
                        echo _e( '<span>Daily Archives</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), get_the_date() );

                    elseif ( is_month() ) :
                        echo _e( '<span>Monthly Archives</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'minimy-themes' ) ) );

                    elseif ( is_year() ) :
                        echo _e( '<span>Yearly Archives</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), get_the_date( _x( 'Y', 'yearly archives date format', 'minimy-themes' ) ) );

                    elseif ( is_category() ) :
                        echo _e( '<span>Posts in Category</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), single_cat_title( '', false ) );

                    elseif ( is_tag() ) :
                        echo _e( '<span>Posts in Tag</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), single_tag_title( '', false ) );

                    elseif ( is_search() ) :
                        echo _e( '<span>Search Result For</span>', 'minimy-themes' );
                        printf( __( '<h1 class="page-title">%s</h1>', 'minimy-themes' ), get_search_query() );

                    else :
                        _e( '<h1 class="page-title">Archives</h1>', 'minimy-themes' );

                    endif;

                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<h2 class="taxonomy-description">%s</h2>', $term_description );
                    endif;
                ?>
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
                    ?>
                </div>

                <?php
                    // Pagination
                    get_template_part( 'include/pagination' );

                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );
                    endif;
                ?>

            <?php endif; ?>


        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section>

<?php get_footer(); ?>
