<?php
// Layout
function one_column($atts, $content = null)
{
    return '<div class="bit-1">'.do_shortcode($content).'</div>';
}
add_shortcode('one_column', 'one_column');

function two_columns($atts, $content = null)
{
    return '<div class="bit-2">'.do_shortcode($content).'</div>';
}
add_shortcode('two_columns', 'two_columns');

 function three_columns($atts, $content = null)
 {
     return '<div class="bit-3">'.do_shortcode($content).'</div>';
 }
add_shortcode('three_columns', 'three_columns');

function four_columns($atts, $content = null)
{
    return '<div class="bit-4">'.do_shortcode($content).'</div>';
}
add_shortcode('four_columns', 'four_columns');

function five_columns($atts, $content = null)
{
    return '<div class="bit-5">'.do_shortcode($content).'</div>';
}
add_shortcode('five_columns', 'five_columns');

function six_columns($atts, $content = null)
{
    return '<div class="bit-6">'.do_shortcode($content).'</div>';
}
add_shortcode('six_columns', 'six_columns');

function seven_columns($atts, $content = null)
{
    return '<div class="bit-7">'.do_shortcode($content).'</div>';
}
add_shortcode('seven_columns', 'seven_columns');

function eight_columns($atts, $content = null)
{
    return '<div class="bit-8">'.do_shortcode($content).'</div>';
}
add_shortcode('eight_columns', 'eight_columns');

function nine_columns($atts, $content = null)
{
    return '<div class="bit-9">'.do_shortcode($content).'</div>';
}
add_shortcode('nine_columns', 'nine_columns');

function ten_columns($atts, $content = null)
{
    return '<div class="bit-10">'.do_shortcode($content).'</div>';
}
add_shortcode('ten_columns', 'ten_columns');

function eleven_columns($atts, $content = null)
{
    return '<div class="bit-11">'.do_shortcode($content).'</div>';
}
add_shortcode('eleven_columns', 'eleven_columns');

function twelve_columns($atts, $content = null)
{
    return '<div class="bit-12">'.do_shortcode($content).'</div>';
}
add_shortcode('twelve_columns', 'twelve_columns');

function one_third($atts, $content = null)
{
    return '<div class="bit-40">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'one_third');

function two_thirds($atts, $content = null)
{
    return '<div class="bit-60">'.do_shortcode($content).'</div>';
}
add_shortcode('two_thirds', 'two_thirds');

function three_fourths($atts, $content = null)
{
    return '<div class="bit-75">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourths', 'three_fourths');

function one_fourth($atts, $content = null)
{
    return '<div class="bit-25">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'one_fourth');

// Callout box
function callout_box($atts, $content = null)
{
    extract(shortcode_atts(array(
     'id' => '',
     'title' => '',
     'class' => '',
     'link' => '',
     'name' => '',
    ), $atts));

    $callout_box = '';
    $callout_box .= '<a href="'.$link.'"><section class="callout-box callout-box-'.$name.'" id="'.$id.'"><h4>'.$title.'</h4>';
    $callout_box .= do_shortcode($content);
    $callout_box .= '</section></a>';

    return $callout_box;
}
add_shortcode('callout_box', 'callout_box');

// Blockquote
function blockquote($atts, $content = null)
{
    return '<div class="fa fa-quote-left"></div>';
}
add_shortcode('blockquote', 'blockquote');

// Button
function button($atts, $content = null)
{
    extract(shortcode_atts(array(
        'link' => 'http://',
    ), $atts));

    return '<button type="button" href="'.$link.'" class="button">'.$content.'</button>';
}
add_shortcode('button', 'button');

// Button two
function button_custom($atts, $content = null)
{
    extract(shortcode_atts(array(
        'link' => 'http://',
        'button_color' => '',
        'button_size' => '',
        'button_text_color' => '',
        'button_type' => '',
    ), $atts));

    $button = '';
    $button .= '<button href="'.$link.'" style="color:'.$button_text_color.';';
    if ($button_type === 'button-fill') {
        $button .= 'background-color:';
    } else {
        $button .= 'border-color:';
    }
    $button .= $button_color.'" class="button '.$button_size.' '.$button_type.'">'.$content.'</button>';

    return $button;
}
add_shortcode('button_custom', 'button_custom');

// Icon
function service_icon($atts, $content = null)
{
    extract(shortcode_atts(array(
        'class' => '',
        'icon' => '',
        'background' => '',
        'color' => '',
    ), $atts));

    return '<div class="service-icon wow animated zoomIn" style="background-color:'.$background.'"><span class="center-center fa '.$icon.' fa-service-icon '.$class.'" style="color:'.$color.'"></span></div>';
}
add_shortcode('service_icon', 'service_icon');

// Teaser box
function teaser_box($atts, $content = null)
{
    extract(shortcode_atts(array(
    'class' => '',
    'img' => '',
    'img_alt' => '',
  ), $atts));

    return '<div class="teaser-box bit-4 '.$class.'"><div class="teaser-box-img" style="background-image: url('.$img.')" alt="'.$img_alt.'"></div><div class="teaser-box-content">'.$content.'</div></div>';
}
add_shortcode('teaser_box', 'teaser_box');

// Testimonial slider
function testimonial_slider($atts, $content = null)
{
    return '<div class="testimonial-slider flexslider"><ul class="slides">'.do_shortcode($content).'</ul></div>';
}
add_shortcode('testimonial_slider', 'testimonial_slider');

function testimonial_slide($atts, $content = null)
{
    extract(shortcode_atts(array(
        'img' => '',
        'class' => '',
    ), $atts));

    return '<li class="testimonial-slide"><div class="testimonial-caption '.$class.'">'.do_shortcode($content).'</div></li>';
}
add_shortcode('testimonial_slide', 'testimonial_slide');

// FAQ accordion
function faq_accordion($atts, $content = null)
{
    extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
  ), $atts));

    return '<div id="accordion" class="'.$class.'">'.do_shortcode($content).'</div>';
}
add_shortcode('faq_accordion', 'faq_accordion');

function faq_accordion_content($atts, $content = null)
{
    extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
  ), $atts));

    $faq = '';
    $faq .= '<div class="accordion-content-container '.$class.'">';
    $faq .= '<span class="fa"></span><h4 class="accordion-toggle">'.$title.'</h4>';
    $faq .= '<div class="accordion-content '.$class.'"';
    $faq .= do_shortcode($content);
    $faq .= '</div></div>';

    return $faq;
}
add_shortcode('faq_accordion_content', 'faq_accordion_content');

// Slider
function flexslider_shortcode_slider($atts, $content = null)
{
    return '<div class="flexslider"><ul class="slides">'.do_shortcode($content).'</ul></div>';
}
add_shortcode('featured_slider', 'flexslider_shortcode_slider');

function flexslider_shortcode_slide($atts, $content = null)
{
    extract(shortcode_atts(array(
        'img' => '',
    ), $atts));

    return '<li class="lazy" style="background-image: url('.$img.')"><div class="flexslider-content-container"><div class="flexslider-content meta">'.do_shortcode($content).'</div></div></li>';
}
add_shortcode('featured_slide', 'flexslider_shortcode_slide');

// Content img box
function content_img_box($atts, $content = null)
{
    extract(shortcode_atts(array(
    'class' => '',
    'img' => '',
    'img_alt' => '',
    'title' => '',
    'link' => '',
  ), $atts));

    return '<a href="'.$link.'"><div class="content-img-box-container bit-1 '.$class.'"><div class="content-img-box-content bit-75"><h2>'.$title.'</h2>'.$content.'</div><div class="content-img-box-image bit-25" style="background-image: url('.$img.')" alt="'.$img_alt.'"></div></div></a>
    ';
}
add_shortcode('content_img_box', 'content_img_box');

add_shortcode('section', 'wq_section');
function wq_section($atts, $content = null)
{
    extract(shortcode_atts(array(
  'class' => '',
  'id' => '',
), $atts));

    return '<section id="'.$id.'" class="'.$class.'">'.$content.'</section>
  ';
}
