<?php

global $wp_customize;

/*** General Settings **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_general',
        'title'         => 'General Options',
        'priority'      => 1,
        'description'   => ''
    ),
    array(
        array(
            'type'      => 'select',
            'name'      => 'theme_style',
            'title'     => 'Switch Style',
            'transport' => 'refresh',
            'default'   => 'male',
            'choices'   => array( 'male' => 'Personal', 'female' => 'Female' )
        ),
        array(
            'type'      => 'newupload',
            'name'      => 'favicon',
            'title'     => 'Favicon (16x16)',
            'transport' => 'refresh',
            'default'   => get_template_directory_uri() .'/images/favicon-16x16.png'
        ),
        array(
            'type'      => 'newupload',
            'name'      => 'favicon_retina',
            'title'     => 'Favicon Retina (32x32)',
            'transport' => 'refresh',
            'default'   => get_template_directory_uri() .'/images/favicon-32x32.png'
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'sidebar_options',
            'title'     => 'Sidebar Option',
            'description' => 'Show or hide sidebar on certain page.'
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_sidebar_on_home',
            'title'     => 'Show Sidebar on Homepage',
            'transport' => 'refresh',
            'default'   => 0
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_sidebar_on_posts',
            'title'     => 'Show Sidebar on Posts',
            'transport' => 'refresh',
            'default'   => 1
        ),
        array(
            'type'      => 'checkbox',
            'name'      => 'show_sidebar_on_pages',
            'title'     => 'Show Sidebar on Pages',
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