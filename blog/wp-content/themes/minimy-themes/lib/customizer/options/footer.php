<?php

global $wp_customize;

/*** Footer Settings **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_footer',
        'title'         => 'Footer',
        'priority'      => 8,
        'description'   => ''
    ),
    array(

        array(
            'type'      => 'checkbox',
            'name'      => 'show_footerwidget_on_home',
            'title'     => 'Show Footer Widget on Homepage',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_two_footer_on_home',
            'title'     => 'Show 2 Footer Widget on Homepage',
            'transport' => 'refresh',
            'default'   => 1
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'show_footerwidget_on_posts',
            'title'     => 'Show Footer Widget on Posts',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_two_footer_on_post',
            'title'     => 'Show 2 Footer Widget on Post',
            'transport' => 'refresh',
            'default'   => 0
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'show_footerwidget_on_page',
            'title'     => 'Show Footer Widget on Page',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_two_footer_on_page',
            'title'     => 'Show 2 Footer Widget on Page',
            'transport' => 'refresh',
            'default'   => 0
        ),

        array(
            'type'      => 'checkbox',
            'name'      => 'show_footerwidget_on_archive',
            'title'     => 'Show Footer Widget on Archive',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_two_footer_on_archive',
            'title'     => 'Show 2 Footer Widget on Archive',
            'transport' => 'refresh',
            'default'   => 1
        ),

        array(
            'type'      => 'text',
            'name'      => 'footer_text',
            'title'     => 'Copyright Text',
            'transport' => 'refresh',
            'default'   => '&copy; Jegtheme 2014, All Right Reserved. Developed in Denpasar, Bali'
        ),

), $wp_customize);