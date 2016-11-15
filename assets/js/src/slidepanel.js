// Slide in mobile menu
(function($) {
    $('#toggle').toggle(
        function() {
            $('#popout').animate({
                left: 0
            }, 'slow', function() {
                $('#toggle').html();
            });
        },
        function() {
            $('#popout').animate({
                left: -250
            }, 'slow', function() {
                $('#toggle').html();
            });
        }
    );
})(jQuery);

// Burger menu animation
var Menu = {

    el: {
        ham: jQuery('.wq-mobile-menu'),
        menuTop: jQuery('.wq-mobile-menu-top'),
        menuMiddle: jQuery('.wq-mobile-menu-middle'),
        menuBottom: jQuery('.wq-mobile-menu-bottom')
    },

    init: function() {
        Menu.bindUIactions();
    },

    bindUIactions: function() {
        Menu.el.ham
            .on(
                'click',
                function(event) {
                    Menu.activateMenu(event);
                    event.preventDefault();
                }
            );
    },

    activateMenu: function() {
        Menu.el.menuTop.toggleClass('wq-mobile-menu-top-click');
        Menu.el.menuMiddle.toggleClass('wq-mobile-menu-middle-click');
        Menu.el.menuBottom.toggleClass('wq-mobile-menu-bottom-click');
    }
};

Menu.init();
