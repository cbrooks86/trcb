<?php get_header(); ?>

    <section class="container">
        <div class="content-wrapper">

        <div class="error404 entry clearfix">
            <div class="error-title">
                <h1><?php esc_html_e( 'Error 404', 'minimy-themes' ) ?></h1>
                <h2><?php esc_html_e( 'Page Not Found', 'minimy-themes' ) ?></h2>
            </div>
            <div class="error-description">
                <p><?php esc_html_e( 'Hmmm. Nothing much going on here.', 'minimy-themes' ); ?><br /><a href="/blog">Go Home.</a></p>
                <?php get_search_form(); ?>
            </div>
        </div>

        </div><!-- .content-wrapper -->

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section><!-- .container -->

<?php get_footer(); ?>
