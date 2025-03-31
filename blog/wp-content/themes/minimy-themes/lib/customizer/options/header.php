<?php

global $wp_customize;

/*** Header & Navigation **/
new Jeg_Customizer_Framework(array(
    'name'          => 'jeg_option_header',
    'title'         => 'Header & Navigation',
    'priority'      => 2,
    'description'   => ''
), array(

    array(
        'type'      => 'newupload',
        'name'      => 'logo',
        'title'     => 'Logo',
        'transport' => 'refresh',
        'default'   => get_template_directory_uri() .'/images/logo.png'
    ),
    array(
        'type'      => 'newupload',
        'name'      => 'logo_retina',
        'title'     => 'Logo Retina',
        'transport' => 'refresh',
        'default'   => get_template_directory_uri() .'/images/logo@2x.png'
    ),

    array(
        'type'      => 'slider',
        'name'      => 'logo_padding_top',
        'title'     => 'Logo Top Padding',
        'transport' => 'refresh',
        'default'   => 0,
        'min'       => 0,
        'max'       => 100,
        'step'      => 5
    ),
    array(
        'type'      => 'slider',
        'name'      => 'logo_padding_bottom',
        'title'     => 'Logo Bottom Padding',
        'transport' => 'refresh',
        'default'   => 0,
        'min'       => 0,
        'max'       => 100,
        'step'      => 5
    ),

    array(
        'type'      => 'radio',
        'name'      => 'menu_position',
        'title'     => 'Menu Position',
        'transport' => 'refresh',
        'default'   => 'side',
        'choices'   => array(
            'top'   => 'Top - Normal Dropdown',
            'side'  => 'Side - Show On Click',
        )
    ),

    array(
        'type'      => 'subtitle',
        'name'      => 'tagline_subtitle',
        'title'     => 'Tagline',
        'description' => 'Show some description bellow logo.'
    ),
    array(
        'type'      => 'checkbox',
        'name'      => 'show_tagline_on_home',
        'title'     => 'Show Tagline on Homepage',
        'transport' => 'refresh',
        'default'   => 1
    ),
    array(
        'type'      => 'checkbox',
        'name'      => 'show_tagline_on_posts',
        'title'     => 'Show Tagline on Posts',
        'transport' => 'refresh',
        'default'   => 1
    ),
    array(
        'type'      => 'checkbox',
        'name'      => 'show_tagline_on_page',
        'title'     => 'Show Tagline on Page',
        'transport' => 'refresh',
        'default'   => 1
    ),
    array(
        'type'      => 'checkbox',
        'name'      => 'show_tagline_on_archive',
        'title'     => 'Show Tagline on Archive',
        'transport' => 'refresh',
        'default'   => 1
    ),

    array(
        'type'      => 'newupload',
        'name'      => 'sidemenu_logo',
        'title'     => 'Side Menu Logo',
        'transport' => 'refresh',
        'default'   => get_template_directory_uri() .'/images/logo.png'
    ),
    array(
        'type'      => 'newupload',
        'name'      => 'sidemenu_logo_retina',
        'title'     => 'Side Menu Logo Retina',
        'transport' => 'refresh',
        'default'   => get_template_directory_uri() .'/images/logo@2x.png'
    ),
    array(
        'type'      => 'slider',
        'name'      => 'sidemenu_logo_padding_top',
        'title'     => 'Side Menu: Logo Top Padding',
        'transport' => 'refresh',
        'default'   => 50,
        'min'       => 0,
        'max'       => 100,
        'step'      => 5
    ),
    array(
        'type'      => 'slider',
        'name'      => 'sidemenu_logo_padding_bottom',
        'title'     => 'Side Menu: Logo Bottom Padding',
        'transport' => 'refresh',
        'default'   => 0,
        'min'       => 0,
        'max'       => 100,
        'step'      => 5
    ),

), $wp_customize);