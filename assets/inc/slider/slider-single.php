<?php
/**
 * wq slider single.
 */

//Output slider single
// add_action('wq_after_header', 'slider_single');
function slider_single()
{
    $single_slider = get_the_ID();
    $images = get_field('slider_image', $single_slider);

    if ($images): ?>
  <div id="featured" class="flexslider clearfix">
    <ul class="slides">
        <?php foreach ($images as $image): ?>
            <li class="lazy" style="background-image:url(<?php echo $image['url']; ?>);" alt="<?php echo $image['alt']; ?>">
    <div class="flexslider-content-container">
    <div class="flexslider-content meta">
<?php echo $image['caption']; ?>
    </div>
  </div>
            </li>
        <?php endforeach; ?>
    </ul>
  </div>
<?php endif;
}
