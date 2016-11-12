<?php
/**
 * wq security script.
 */
function wq_no_generator()
{
    return '';
}
add_filter('the_generator', 'wq_no_generator');

/*
Clean up wp_head() from unused or unsecure stuff
*/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
/*
Show less info to users on failed login for security.
(Will not let a valid username be known.)
*/
function wq_show_less_login_info()
{
    return '<strong>ERROR</strong>: Stop guessing!';
}
add_filter('login_errors', 'wq_show_less_login_info');
