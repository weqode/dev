<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-content">
					 <div class="bit-4">
					 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 1')) : else : ?>
								 <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
					 <?php endif; ?>
					 </div>
					 <div class="bit-4">
					 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 2')) : else : ?>
								 <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
					 <?php endif; ?>
					 </div>
					 <div class="bit-4">
					 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 3')) : else : ?>
								 <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
					 <?php endif; ?>
					 </div>
					 <div class="bit-4">
					 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Column 4')) : else : ?>
								 <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
					 <?php endif; ?>
					 </div>
	</div><!-- .footer-content -->
	<div class="footer-bottom">
		<div class="site-copyright">
			<p>&copy; <a href="<?php echo home_url('/') ?>"  rel="home">
				<?php bloginfo('name'); ?></a> <?php echo date('Y'); ?>
			</p>
		</div><!-- .site-copyright -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
