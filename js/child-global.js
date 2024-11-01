jQuery(document).ready(function() {
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
