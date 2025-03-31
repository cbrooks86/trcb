<?php

global $wp_customize;

/*** Page Options **/
new Jeg_Customizer_Framework(
    array(
        'name'          => 'jeg_option_archives',
        'title'         => 'Archives Options',
        'priority'      => 6,
        'description'   => 'This option affect to Categories, Tags, Author & Search result page.'
    ),
    array(

        array(
            'type'      => 'select',
            'name'      => 'archives_layout',
            'title'     => 'Archive Layout',
            'transport' => 'refresh',
            'default'   => 'default',
            'choices'   => array(
                              'default' => 'Default',
                              'homepage' => 'Homepage Style (with featured image)'
                           ),
        ),

), $wp_customize);