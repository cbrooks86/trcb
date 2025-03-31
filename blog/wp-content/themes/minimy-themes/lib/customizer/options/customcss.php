<?php

global $wp_customize;

/*** Footer Settings **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_customcss',
        'title'         => 'Custom CSS',
        'priority'      => 9,
        'description'   => 'Add your custom css to override default style and make custom styling.'
    ),
    array(

        array(
            'type'      => 'textarea',
            'name'      => 'custom_css',
            'title'     => 'Custom CSS Code',
            'default'   => '',
            'rows'      => 40,
            'transport' => 'refresh',
        ),

), $wp_customize);