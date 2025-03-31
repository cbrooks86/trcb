<?php
/*
 * @author jegbagus
 */

define('JEG_WIDGET_TEMPLATE_PATH'	, get_template_directory() . '/lib/widget-template/');

/** base class of widget **/
abstract class Jeg_Widget extends WP_Widget
{
    protected $jtemplate;
    protected $fields;

    public function __construct($id_base = false, $name, $widget_options = array(), $control_options = array())
    {
        parent::__construct( $id_base,$name , $widget_options , $control_options );
        $this->jtemplate = new JTemplate(JEG_WIDGET_TEMPLATE_PATH, '.php');
    }

    public function render_form($fields, $instance) {

        foreach ($fields as $key => $field) :

            //** type text widget input **/
            if($field['type'] == 'type-text') {
                $this->jtemplate->render('type-text', array(
                    'title'		=> $field['title'] ,
                    'desc'		=> $field['desc'] ,
                    'fieldid'	=> $this->get_field_id( $key ) ,
                    'fieldname'	=> $this->get_field_name( $key ) ,
                    'value'		=> isset($instance[$key]) ? $instance[$key] : ''
                ), true);
            }

        endforeach;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        foreach ($this->fields as $key => $field) :
            $instance[$key] = strip_tags( $new_instance[$key] );
        endforeach;

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $this->render_form($this->fields, $instance);
    }


    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo jeg_sanitize_output( $before_widget );
        if ( ! empty( $title ) )
            echo jeg_sanitize_output( $before_title ) . esc_html( $title ) . jeg_sanitize_output( $after_title );
        $this->jtemplate->render( $this->get_widget_template() , $instance, true);

        echo jeg_sanitize_output( $after_widget );
    }

    abstract protected function get_widget_template();
}

/** Register widget **/
add_action( 'widgets_init', function(){
	minimy_register_widgets('jeg_facebook_fans_widget');
	minimy_register_widgets('jeg_ads_widget');
} );
/** Register widget **/



/**
 * Adds Facebook Fans Widget.
 */
class Jeg_Facebook_Fans_Widget extends Jeg_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {

        $this->fields = array (
            'title'		=> array(
                'title' 	=>  'Title',
                'desc' 		=> 'Title on Widget header',
                'type'		=> 'type-text'
            ),
            'facebookurl'	=> array(
                'title' 	=>  'Facebook Page URL',
                'desc' 		=> 'Your widget page url like : http://www.facebook.com/jegbagusbarbershop',
                'type'		=> 'type-text'
            )
        );

        parent::__construct(
            'jeg_facebook_fans_widget', // Base ID
            'Facebook Fans Widget (Jegtheme)', // Name
            array( 'description' =>  'Sidebar Facebook fans widget for ' . JEG_THEMENAME , ) // Args
        );
    }

    public function get_widget_template () {
        return 'facebook-widget';
    }

}


/**
 * Adds Facebook Fans Widget.
 */
class Jeg_Ads_Widget extends Jeg_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {

        $this->fields = array (
            'title'		=> array(
                'title' 	=>  'Title',
                'desc' 		=> 'Title on Widget header',
                'type'		=> 'type-text'
            ),
            'adsimage'	=> array(
                'title' 	=>  'Your ads image' ,
                'desc' 		=> 'Your ads image url',
                'type'		=> 'type-text'
            ),
            'adsurl'	=> array(
                'title' 	=>  'URL of your ads',
                'desc' 		=> 'where user will be redirected when they click your ads',
                'type'		=> 'type-text'
            )
        );

        parent::__construct (
            'jeg_ads_widget', // Base ID
            'Jeg Ads Widget (Jegtheme)', // Name
            array( 'description' =>  'Ads widget for ' . JEG_THEMENAME ) // Args
        );
    }

    public function get_widget_template () {
        return 'ads-widget';
    }
}


