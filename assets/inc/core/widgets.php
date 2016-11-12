<?php
/*
 * wq register widgets.
 */

 function wq_widgets_init()
 {
     register_sidebar(array(
         'name' => esc_html__('Sidebar', 'wq'),
         'id' => 'sidebar-1',
         'description' => esc_html__('Add widgets here.', 'wq'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget' => '</section>',
         'before_title' => '<h2 class="widget-title">',
         'after_title' => '</h2>',
     ));
 }

 // Declare footer column 1
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Footer Column 1',
            'id' => 'footer-column-1',
            'description' => 'This area displays footer widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

    // Declare footer column 2
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Footer Column 2',
            'id' => 'footer-column-2',
            'description' => 'This area displays footer widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

    // Declare footer column 3
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Footer Column 3',
            'id' => 'footer-column-3',
            'description' => 'This area displays footer widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

    // Declare footer column 4
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Footer Column 4',
            'id' => 'footer-column-4',
            'description' => 'This area displays footer widgets',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }

 add_action('widgets_init', 'wq_widgets_init');
///////////////////////// New custom widget /////////////////////
 // Creating the widget
class wpb_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'),

// Widget description
array('description' => __('Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain'))
);
    }

// Creating widget front-end
// This is where the action happens
public function widget($args, $instance)
{
    $title = apply_filters('widget_title', $instance['title']);
// before and after widget arguments are defined by themes
echo $args['before_widget'];
    if (!empty($title)) {
        echo $args['before_title'].$title.$args['after_title'];
    }

// This is where you run the code and display the output
echo __('Hello, World!', 'wpb_widget_domain');
    echo $args['after_widget'];
}

// Widget Backend
public function form($instance)
{
    if (isset($instance[ 'title' ])) {
        $title = $instance[ 'title' ];
    } else {
        $title = __('New title', 'wpb_widget_domain');
    }
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id('title');
    ?>"><?php _e('Title:');
    ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title');
    ?>" name="<?php echo $this->get_field_name('title');
    ?>" type="text" value="<?php echo esc_attr($title);
    ?>" />
</p>
<?php

}

// Updating widget replacing old instances with new
public function update($new_instance, $old_instance)
{
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

    return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget()
{
    register_widget('wpb_widget');
}
add_action('widgets_init', 'wpb_load_widget');
