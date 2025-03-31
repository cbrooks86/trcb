    <footer>
    <?php
        // Only show footer widget when it's enabled from theme cuztomizer
        if  ( is_home() && get_theme_mod( 'show_footerwidget_on_home', 1 )  ||
            ( is_single() && get_theme_mod( 'show_footerwidget_on_posts', 1 )) ||
            ( is_page() && get_theme_mod( 'show_footerwidget_on_page', 1 )) ||
            ( is_archive() && get_theme_mod( 'show_footerwidget_on_archive', 1 ))) :
        ?>

            <?php
                if(
                    ( is_home() && !get_theme_mod( 'show_two_footer_on_home', 1 ) ) ||
                    ( is_single() && !get_theme_mod( 'show_two_footer_on_post', 0 ) ) ||
                    ( is_page() && !get_theme_mod( 'show_two_footer_on_page', 0 ) ) ||
                    ( is_archive() && !get_theme_mod( 'show_two_footer_on_archive', 1 ) )

                ) {
            ?>
            <div class="container footerwidget">
                <div class="grid one-third">
                    <?php  /* Footer Widget 1 */  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer1') ) ?>
                </div>
                <div class="grid one-third">
                    <?php  /* Footer Widget 2 */  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer2') ) ?>
                </div>
                <div class="grid one-third last">
                    <?php  /* Footer Widget 3 */  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer3') ) ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="container footerwidget">
                <div class="grid one-half">
                    <?php  /* Footer Widget 1 */  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer1') ) ?>
                </div>
                <div class="grid one-half last">
                    <?php  /* Footer Widget 2 */  if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer2') ) ?>
                </div>
            </div>
        <?php } ?>

    <?php endif; ?>

        <div class="container footersocial">
            <?php do_action( 'minimy_footer_social' ); ?>

            <div class="copyright">
                <?php echo get_theme_mod( 'footer_text', '&copy; TheRealChrisBrooks.com' ); ?>
            </div>
        </div>
    </footer>

    <div class="global-overlay"></div>
</div>
<!-- global viewport end -->


<!-- search overlay -->
<div class="search-overlay">
    <div class="search-context">
        <div class="search-input">
            <?php get_search_form(); ?>
            <span><?php esc_html_e('Type your search keyword, and press enter to search', 'minimy-themes') ?></span>
        </div>
    </div>
</div>
<!-- search overlay end -->


<!-- close search -->
<div class="close-overlay">
    <i class="fa fa-close"></i>
</div>
<!-- close search end -->

<?php wp_footer() ?>
</body>
</html>
