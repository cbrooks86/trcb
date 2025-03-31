<?php get_header(); ?>

    <section class="container">
        <div class="content-wrapper">

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'full-content' ); ?> data-article-type="standard">
                <h1 class="content-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h1>

                <div class="content-time">
                    <span><?php the_date(); ?></span>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="feature-holder">
                        <?php the_post_thumbnail('large') ?>
                    </div>
                <?php endif; ?>

                <div class="entry clearfix">
                    <p><?php the_content(); ?></p>
                    <?php wp_link_pages() ?>
                </div>

                <?php if ( !get_theme_mod( 'page_hide_share', 0 ) ) get_template_part( 'include/socialshare' ); ?>
            </article>

        <?php endwhile; ?>

        <?php
            // If comments are open and enabled from theme cutomizer, load up the comment template
            if ( !get_theme_mod( 'page_hide_comment', '0' ) && (comments_open() || '0' != get_comments_number() ) ) :
                comments_template();
            endif;
        ?>

        </div><!-- .content-wrapper -->

        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    </section><!-- .container -->

<?php get_footer(); ?>