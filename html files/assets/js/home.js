$('.banner-slider').cycle({
    //Specify options
    fx: 'fade', //Name of transition effect
    slides: '.slider-item',
    timeout: 0,
    speed: 1200,
    next: '.nextControl',
    prev: '.prevControl',
    easeIn: 'easeInOutExpo',
    easeOut: 'easeInOutExpo',
});

$(document).ready(function () {


    $(".row-featuderd-in").owlCarousel({

        items: 6, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option

    });

    $(".row-partners").owlCarousel({

        items: 6, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option

    });


    // BRAND  carousel
    var owl = $(".testimonial-slider");

    owl.owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    // Custom Navigation Events
    $("#next").click(function () {
        owl.trigger('owl.next');
    })
    $("#prev").click(function () {
        owl.trigger('owl.prev');
    })

});
