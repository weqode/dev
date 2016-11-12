<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link href="https://fonts.googleapis.com/css?family=Lato|Work+Sans:400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Roboto+Condensed:300,400,700" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site frame">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'wq'); ?></a>
	<!-- // Header container -->
	<header id="masthead" class="site-header sticky-header nav-down" role="banner">
		<div class="header-content-container">
			<!-- //logo -->
			<div class="wq-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/assets/img/weqode-logo.png" alt="logo" id="logo" width="160" height="160"></a>
			</div>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'wq'); ?></button>
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu desktop-menu')); ?>
<?php
            /* The below code checks if a mobile-menu is set from the backend in the menu settings. If a menu has been set it will be displayed in the header. Or else, a menu has not been set then display a message.*/
            if (function_exists('has_nav_menu') && has_nav_menu('mobile-menu')) {
                wp_nav_menu(array(
                  'depth' => 6,
                  'sort_column' => 'menu_order',
                  'container' => 'ul',
                  'menu_id' => 'main-nav',
                  'menu_class' => 'nav mobile-menu',
                  'theme_location' => 'mobile-menu',
                ));
            } else {
                echo "<ul class='nav mobile-menu'> <font style='color:red'>Mobile Menu has not been set</font> </ul>";
            }
            ?>


		</nav><!-- #site-navigation -->
	</div><!-- .header-content-container -->
	</header><!-- #masthead -->

<?php do_action('wq_after_header'); ?>

<?php echo wq_get_slider(); ?>

	  <div id="content" class="site-content">
<?php custom_breadcrumbs(); ?>
