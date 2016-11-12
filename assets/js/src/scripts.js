//= include jquery.flexslider.js
//= include navigation.js
//= include skip-link-focus-fix.js
//= include customizer.js
//= include sisyphus.min.js
//= include wq-animation.js
//= include modernizer.js

// Adjust body margin based on fixed header heihght
// jQuery(window).resize(function() {
//     jQuery(document.body).css("margin-top", jQuery(".sticky-header").outerHeight(true));
// }).resize();

// Button scroll
jQuery(".button-triangle").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery(".section-1").offset().top
    }, 2000);
});

// Slider
jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
        touch: true,
        slideshow: true,
        controlNav: true,
        slideshowSpeed: 7000,
        animationSpeed: 600,
        initDelay: 0,
        start: function(slider) {
            var slide_count = slider.count - 1;
            jQuery(slider).find('img.lazy:eq(0)').each(function() {
                var src = jQuery(this).attr('data-src');
                jQuery(this).attr('src', src).removeAttr('data-src');
            });
        },
        before: function(slider) {
            var slides = slider.slides,
                index = slider.animatingTo,
                jQueryslide = jQuery(slides[index]),
                jQueryimg = jQueryslide.find('img[data-src]'),
                current = index,
                nxt_slide = current + 1,
                prev_slide = current - 1;
            jQueryslide.parent().find('img.lazy:eq(' + current + '), img.lazy:eq(' + prev_slide + '), img.lazy:eq(' + nxt_slide + ')').each(function() {
                var src = jQuery(this).attr('data-src');
                jQuery(this).attr('src', src).removeAttr('data-src');
            });
        }
    });
});

// Sticky nav
jQuery(document).ready(function() {
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = jQuery('.sticky-header').outerHeight();
    jQuery(window).scroll(function(event) {
        didScroll = true;
    });
    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = jQuery(this).scrollTop();
        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta) return;
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            jQuery('.sticky-header').removeClass('nav-show').addClass('nav-hide');
        } else {
            // Scroll Up
            if (st + jQuery(window).height() < jQuery(document).height()) {
                jQuery('.sticky-header').removeClass('nav-hide').addClass('nav-show');
            }
        }
        lastScrollTop = st;
    }
    // Remove empty p tags
    jQuery('p:empty').remove();

    // FAQ accordion
    jQuery('.accordion-content').first().addClass('default');
    jQuery('#accordion').find('.accordion-toggle').click(function() {
        // Expand or collapse this panel
        jQuery(this).next().slideToggle('fast');
        // Hide the other panels
        jQuery(".accordion-content").not(jQuery(this).next()).slideUp('fast');
    });
    // Add class of active
    var selector = '.accordion-toggle';
    jQuery('.accordion-toggle').first().addClass('active');
    jQuery(selector).on('click', function() {
        jQuery(selector).removeClass('active');
        jQuery(this).addClass('active');
    });
});

// hide or display the mobile menu

/* let's consider we want to toggle the menu displayed at 800 screen width, here's what we need to do (you can accordingly replace 800 with to a screen width you would need)..*/
function toggle() {
    if (jQuery(window).width() >= 800) {
        jQuery('.nav.mobile-menu').hide();
        jQuery('.nav.desktop-menu').show();
    } else {
        jQuery('.nav.desktop-menu').hide();
        jQuery('.nav.mobile-menu').show();
    }
}

// on page load set the menu display initially
toggle();

// toggle the menu display on browser resize
jQuery(window).resize(function() {
    toggle();
});

// Contact form field retention
jQuery('form').sisyphus();

// Auto expand contact form textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight) + "px";
}

// Scroll form into view after submission for errors
jQuery('html, body').animate({
    scrollTop: (jQuery('.wq-error .wq-success').first().offset().top)
}, 500);





//Flex slider full height
// var height = screen.height
