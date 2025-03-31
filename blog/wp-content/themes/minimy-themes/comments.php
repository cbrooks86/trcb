<?php
global $post;

if ( post_password_required() )
    return;

if ( comments_open() ) : ?>
    <div id="comments" class="comment-wrapper themeform">
    <?php
        if ( get_option('comment_registration') && !is_user_logged_in() )
        {
            echo "<i class='comment-login'>" . sprintf(__("Please <a href='%s'>login</a> to join discussion", 'minimy-themes'), wp_login_url(home_url(), false)) . "</i>";
        } else {
            if ( have_comments() ) { ?>
                <h3 class="heading">
                    <?php printf ( _n ( 'Discussion about this %1$s', '%2$s Discussion to this %1$s', get_comments_number(), 'minimy-themes' ) , $post->post_type, number_format_i18n(get_comments_number()) ); ?>
                </h3>

                <ol class="commentlist">
                    <?php
                    wp_list_comments(array( 'avatar_size' => '80' ));
                    ?>
                </ol>

                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                    <div class="comment-navigation navigation" >
                        <div class='alignleft' style="margin-bottom: 20px;">
                            <?php next_comments_link('<span>&laquo;</span> Previous') ?>
                        </div>
                        <div class='alignright' style="margin-bottom: 20px;">
                            <?php previous_comments_link('Next<span>&raquo;</span>') ?>
                        </div>
                    </div>
                <?php endif;  ?>

            <?php
            } else {
                echo "<h3 class='heading'>";
                printf(__('Discussion about this %s','minimy-themes'), $post->post_type);
                echo "</h3>";
            }
            comment_form();
        }
    ?>
    </div>

<?php endif; ?>
