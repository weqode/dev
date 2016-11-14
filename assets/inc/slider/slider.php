<?php
/**
 * wq slider.
 */
// Replace 'Featured Image' with 'Set Slide Image'
 function replace_featured_image_box()
 {
     remove_meta_box('postimagediv', 'slider-image', 'side');
     add_meta_box('postimagediv', __('Set Slide Image', 'wq'), 'post_thumbnail_meta_box', 'slider-image', 'side', 'low');
 } add_action('do_meta_boxes', 'replace_featured_image_box');

//Register post type
 function wq_slider_register()
 {
     $args = array('label' => __('Slider', 'wq'), 'singular_label' => __('Slider Image', 'wq'), 'taxonomies' => array('category'), 'public' => false, 'show_ui' => true, 'capability_type' => 'post', 'hierarchical' => false, 'exclude_from_search' => true, 'has_archive' => false, 'rewrite' => true, 'supports' => array('title', 'editor', 'thumbnail'));
     register_post_type('slider-image', $args);
 } add_action('init', 'wq_slider_register');
 add_image_size('wq_function', 1200, 540, true);
 add_theme_support('post-thumbnails');

//Create slider caption
 function caption_content($more_link_text = '(more...)', $stripteaser = 0, $more_file = '')
 {
     $content = get_the_content($more_link_text, $stripteaser, $more_file);
     $content = apply_filters('the_content', $content);
     $content = str_replace(']]>', ']]&gt;', $content);

     return $content;
 }

//Output slider
 function wq_get_slider()
 {
     ?>
	<div class="flexslider"><ul class="slides">
	<?php
 $the_query = new WP_Query(array('post_type' => 'slider-image', 'posts_per_page' => 10000));
     if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
     $img = get_the_post_thumbnail(get_the_ID());
     $caption = caption_content(); ?>
	<li class="lazy" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" alt="<?php echo $image['alt']; ?>">
	  <div class="flexslider-content-container">
      <section class="cd-intro">
  		<h1 class="cd-headline letters scale">
  			<span class="wq-slider-title">We<br /></span>
  			<span class="cd-words-wrapper">
  				<b class="is-visible wq-headline-center">Design</b>
  				<b class="wq-headline-center">Develop</b>
          <b class="wq-headline-center">Brand</b>
          <b class="wq-headline-center">Host</b>
  				<b class="wq-headline-center">Search&nbsp;Engine&nbsp;Optimise</b>
          <b class="wq-headline-center">Pay&nbsp;Per&nbsp;Click</b>
  			</span>
  		</h1>
  	</section> <!-- cd-intro -->
  	  </div>
  </li>
		<?php
 endwhile;
     endif;
     wp_reset_postdata(); ?>
  </ul>
  <div class="button-triangle-container">
    <div class="fa fa-chevron-down button-triangle"></div>
  </div>
</div>

	<?php

 }

//Create slider shortcode
 function wq_slider_shortcode()
 {
     $wq_slider = wq_get_slider();

     return $wq_slider;
 } add_shortcode('slider', 'wq_slider_shortcode');
