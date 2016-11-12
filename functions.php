<?php
/**
 * wq functions and definitions.
 */

 // Register menus
 register_nav_menus(array(
   'primary' => __('Primary Menu', 'wq'),
   'mega-menu' => __('Mega Menu', 'wq'),
   'mobile-menu' => __('Mobile Menu', 'wq'),
 ));

// Pass shortcode through widget
 add_filter('widget_text', 'do_shortcode');

// Enqueue Scripts and Styles
require get_template_directory().'/assets/inc/core/enqueue.php';

// Security script
require get_template_directory().'/assets/inc/core/security.php';

// Hooks Actions Filters
require get_template_directory().'/assets/inc/core/hooks-actions-filters.php';

// Duplicate posts and pages
require get_template_directory().'/assets/inc/core/duplicate.php';

// Scripts to footer
require get_template_directory().'/assets/inc/core/scripts-to-footer.php';

// Register widgets
require get_template_directory().'/assets/inc/core/widgets.php';

// Google analytics
require get_template_directory().'/assets/inc/core/google-analytics.php';

// Implement the Custom Header feature.
require get_template_directory().'/assets/inc/core/custom-header.php';

// Custom template tags for this theme.
require get_template_directory().'/assets/inc/core/template-tags.php';

// Bycrypt.
// require get_template_directory().'/assets/inc/core/wp-password-bycrypt.php';

// Breadcrumbs.
require get_template_directory().'/assets/inc/core/breadcrumbs.php';

// Custom functions that act independently of the theme templates.
require get_template_directory().'/assets/inc/core/extras.php';

// Customizer additions.
require get_template_directory().'/assets/inc/core/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory().'/assets/inc/core/jetpack.php';

// Shortcodes
require get_template_directory().'/assets/inc/core/shortcodes.php';

// Contact form
require get_template_directory().'/assets/inc/core/contact-form.php';

// Slider
require get_template_directory().'/assets/inc/slider/slider.php';

// Slider single
require get_template_directory().'/assets/inc/slider/slider-single.php';
