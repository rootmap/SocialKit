$(document).ready(function () {

    if ($("body").is(":has(.section-1)")) {
        var section2 = $('.section-2').offset().top;
        $('.section-2').parallax("right", section2, 0.3, true);
    }
    var section3 = $('#section-3').offset().top;
    $('.swiper-slide').parallax("right", section3 + 200, 0.1, true);
    $('.section-1').parallax("50%", 0, 0.3, true);


    $('.anim1').bind('inview', function (event, visible) {
        if (visible == true) {
            //lert("active");
            $('.anim1 .ani-left').addClass("animationRL");
            $('.anim1 .ani-right').addClass("animationLR");
        } else {
            // alert("here");
            // $('#logo').removeClass("active");
            //$('.anim1 .ani-left').removeClass("animationRL");
        }
    });


})