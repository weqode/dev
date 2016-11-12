<?php
/**
 * wq theme setup.
 */
function wq_setup()
{

  // Content width
  function wq_content_width()
  {
      $GLOBALS['content_width'] = apply_filters('wq_content_width', 1200);
  }
    add_action('after_setup_theme', 'wq_content_width', 0);

  // Theme supports
  add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
    add_theme_support('custom-background', apply_filters('wq_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
  )));

  //Add image sizes
  add_image_size('wq_function', 1200, 540, true);

  // Pass shortcode through text widget
  add_filter('widget_text', 'do_shortcode');

  // Make theme available for translation
  load_theme_textdomain('wq', get_template_directory().'/assets/languages');
}

add_action('after_setup_theme', 'wq_setup');
