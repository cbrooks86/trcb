<?php

global $wp_customize;

/*** Post Options **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_post',
        'title'         => 'Post Options',
        'priority'      => 4,
        'description'   => ''
    ),
    array(

        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_meta',
            'title'     => 'Hide Post Meta',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_tags',
            'title'     => 'Hide Tags',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_share',
            'title'     => 'Hide Share',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_authorbox',
            'title'     => 'Hide Author Box',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_postnav',
            'title'     => 'Hide Post Navigation (Prev & Next)',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_relatedpost',
            'title'     => 'Hide Related Post',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_hide_comment',
            'title'     => 'Disable Comment',
            'transport' => 'refresh',
            'default'   => 0
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'post_meta_title',
            'title'     => 'Post Meta Options',
            'description' => 'Check post meta that you want to display.'
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_meta_author',
            'title'     => 'Show Author Meta',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_meta_category',
            'title'     => 'Show Category',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_meta_comment',
            'title'     => 'Show Comment Count',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_meta_date',
            'title'     => 'Show Date',
            'transport' => 'refresh',
            'default'   => 1
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'post_share_title',
            'title'     => 'Share Options',
            'description' => 'Check social media sharer that you want to display.'
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_share_facebook',
            'title'     => 'Show Facebook Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_share_twitter',
            'title'     => 'Show Twitter Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_share_googleplus',
            'title'     => 'Show Google Plus Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_share_pinterest',
            'title'     => 'Show Pinterest Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'post_share_linkedin',
            'title'     => 'Show Linkedin Share',
            'transport' => 'refresh',
            'default'   => 1
        ),


        // array(
        //     'type'      => 'color',
        //     'name'      => 'text_color',
        //     'title'     => 'Base Text Color',
        //     'transport' => 'refresh',
        //     'default'   => null,
        // ),
        // array(
        //     'type'      => 'color',
        //     'name'      => 'heading_color',
        //     'title'     => 'Heading Color',
        //     'transport' => 'refresh',
        //     'default'   => null,
        // ),
        // array(
        //     'type'      => 'color',
        //     'name'      => 'link_color',
        //     'title'     => 'Link Color',
        //     'transport' => 'refresh',
        //     'default'   => null,
        // ),
        // array(
        //     'type'      => 'color',
        //     'name'      => 'hover_color',
        //     'title'     => 'Link Hover Color',
        //     'transport' => 'refresh',
        //     'default'   => null,
        // ),

), $wp_customize);