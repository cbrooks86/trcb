<?php

global $wp_customize;

/*** Page Options **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_page',
        'title'         => 'Page Options',
        'priority'      => 5,
        'description'   => ''
    ),
    array(

        array(
            'type'      => 'checkbox',
            'name'      => 'page_hide_share',
            'title'     => 'Hide Share',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_hide_comment',
            'title'     => 'Disable Comment',
            'transport' => 'refresh',
            'default'   => 0
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'page_share_title',
            'title'     => 'Share Options',
            'description' => 'Check social media sharer that you want to display.'
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_share_facebook',
            'title'     => 'Show Facebook Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_share_twitter',
            'title'     => 'Show Twitter Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_share_googleplus',
            'title'     => 'Show Google Plus Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_share_pinterest',
            'title'     => 'Show Pinterest Share',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'page_share_linkedin',
            'title'     => 'Show Linkedin Share',
            'transport' => 'refresh',
            'default'   => 1
        ),

), $wp_customize);