<?php
/**
 * wq enqueue scripts.
 */
function wq_scripts()
{
    //Styles
    wp_enqueue_style('wq-style', get_stylesheet_uri());

    wp_enqueue_style('wq-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), '4.6.3');

    wp_enqueue_style('wq-animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), '3.5.2');

    //Scripts
    wp_enqueue_script('jquery');

    wp_enqueue_script('wq-scripts', get_template_directory_uri().'/assets/js/scripts.min.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wq_scripts');
