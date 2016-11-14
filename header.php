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
			<nav class="wq-main-nav main-navigation" id="site-navigation" role="navigation">
							<?php wp_nav_menu(array('main_nav' => 'Main Navigation Menu')); ?>
			</nav>	<!-- #site-navigation -->
	</div><!-- .header-content-container -->
	</header><!-- #masthead -->

<?php do_action('wq_after_header'); ?>

<?php echo wq_get_slider(); ?>

	  <div id="content" class="site-content">
<?php custom_breadcrumbs(); ?>
