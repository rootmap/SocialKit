$(document).ready(function ($) {

    $("#slider").owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        pagination: true,
        //autoPlay: 0,
        singleItem: true

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });

    var owl = $("#featured-slider");

    owl.owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items: 5,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3]
    });

    var hCate = $(".homeCateSlider, .homeCateSlider2");

    hCate.owlCarousel({
        autoPlay: false,

        items: 6,
        itemsDesktop: [1199, 6],
        itemsDesktopSmall: [979, 3]
    });

    var cCaro = $(".commonCarousel");

    cCaro.owlCarousel({
        navigation: false,
        pagination: false,
        autoPlay: false,

        items: 6,
        itemsDesktop: [1199, 6],
        itemsDesktopSmall: [979, 3]
    });

// Custom Navigation Events
    $(".next").click(function () {
        cCaro.trigger('owl.next');
    })
    $(".prev").click(function () {
        cCaro.trigger('owl.prev');
    })


    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        controls: false
    });


});