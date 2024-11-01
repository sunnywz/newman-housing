jQuery(document).ready(function() {

        if (jQuery('#homeAboutCtas').length) {
            // Set the initial container height based on the active card's height
            var containerHeight = jQuery('#homeAboutCtas').height();
            jQuery('#homeAboutCtas').height(containerHeight);
    
            jQuery('.cta-card').hover(function() {
                // Only proceed if the card is not already active
                if (!jQuery(this).hasClass('active')) {
                    // Remove active class from all cards, collapse content, and reset background images
                    jQuery('.cta-card').removeClass('active');
                    jQuery('.cta-card-content').slideUp();
                    jQuery('.cta-card').css('background-image', 'none');
    
                    // Add active class to the hovered card and show its content
                    jQuery(this).addClass('active');
                    jQuery(this).find('.cta-card-content').slideDown();
    
                    // Get and set the background image for the active card
                    var background = jQuery(this).data('background');
                    if (background) {
                        jQuery(this).css('background-image', `url(${background})`);
                    }
    
                    // Adjust the container height to match the active card's height
                    // var activeHeight = jQuery(this).outerHeight();
                    // jQuery('#homeAboutCtas').height(activeHeight);
                }
            });
        }

        
    jQuery('#homeHero').owlCarousel({
        loop: true,
        dots: true,
        nav: false,
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        autoplayTimeout: 5000,
        autoHeight: false,
        animateOut: 'fadeOut', 
        animateIn: 'fadeIn',
        autoplayHoverPause: true,
        margin: 0,
        stagePadding: 0,
        onInitialized: function(event) {
            // Add zoom effect to the first slide on initialization
            jQuery(event.target).find('.owl-item.active .home-hero-image').addClass('zoom-effect');
        },
        onTranslate: function(event) {
            // Remove zoom class from all slides
            jQuery('.home-hero-image').removeClass('zoom-effect');
        },
        onTranslated: function(event) {
            // Add zoom class to the active slide's .home-hero-image
            jQuery(event.target).find('.owl-item.active .home-hero-image').addClass('zoom-effect');
        }
    });
});