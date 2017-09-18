


$(document).ready(function () {
    // This command is used to initialize some elements and make them work properly
    $.material.init();
    $(".select").dropdown({"autoinit": ".select"});
});


$('.keep-open .dropdown-menu').on('click', function (event) {
    //The event won't be propagated to the document NODE and
    // therefore events delegated to document won't be fired
    event.stopPropagation();
});
$('.dropdown.keep-open').on({
    //"shown.bs.dropdown": function() { this.closable = false; },
    //"click":             function() { this.closable = true; },
    //"hide.bs.dropdown":  function() { return this.closable; }
});

/*
 Form
 */
$('.registration-form fieldset:first-child').fadeIn('slow');

$('.registration-form input[type="text"], .registration-form input[type="password"], .registration-form textarea').on('focus', function () {
    $(this).removeClass('input-error');
});

// next step
$('.registration-form .btn-next').on('click', function () {
    var parent_fieldset = $(this).parents('fieldset');
    var next_step = true;

    parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function () {
        if ($(this).val() == "") {
            $(this).addClass('input-error');
            next_step = false;
        }
        else {
            $(this).removeClass('input-error');
        }
    });

    if (next_step) {
        parent_fieldset.fadeOut(400, function () {
            $(this).next().fadeIn();
        });
    }

});

// previous step
$('.registration-form .btn-previous').on('click', function () {
    $(this).parents('fieldset').fadeOut(400, function () {
        $(this).prev().fadeIn();
    });
});

// submit
$('.registration-form').on('submit', function (e) {

    $(this).find('input[type="text"], input[type="password"], textarea').each(function () {
        if ($(this).val() == "") {
            e.preventDefault();
            $(this).addClass('input-error');
        }
        else {
            $(this).removeClass('input-error');
        }
    });

});


// GLOBAL


////////////////

$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }

        init();
    });
});


$(function () {
    $('.panel-customs-post > .panel-footer > .input-placeholder, .sp-comments, .input-placeholder, .panel-customs-post  .has-comments  .input-placeholder,  .panel-customs-post  .panel-customs-post-comment .panel-customs-post-textarea button[type="reset"]').on('click', function (event) {
        var $panel = $(this).closest('.panel-customs-post');
        $comment = $panel.find('.panel-customs-post-comment');
        $comment.find('.btn:first-child').addClass('disabled');
        $comment.find('textarea').val('');

        $panel.toggleClass('panel-customs-post-show-comment');

        if ($panel.hasClass('panel-customs-post-show-comment')) {
            $comment.find('textarea').focus();
        }
    });
    $('.panel-customs-post-comment .panel-customs-post-textarea > textarea').on('keyup', function (event) {
        var $comment = $(this).closest('.panel-customs-post-comment');

        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 1) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
    });
});


$(function () {
    $('.signin-toggle').click(function () {
        $(this).addClass('active');
        $('.signup-toggle').removeClass('active');
        $('#form-signup').removeClass('active');
        $('#form-signin').addClass('active');

    });

    $('.signup-toggle').click(function () {
        $(this).addClass('active');
        $('.signin-toggle').removeClass('active');
        $('#form-signin').removeClass('active');
        $('#form-signup').addClass('active');

    });

});



(function($){
    $(window).load(function(){
        $(".scrollbar").mCustomScrollbar();
        $(".mikes-modal .description").mCustomScrollbar({
            theme:"dark"
        });
    });
})(jQuery);

$(document).ready(function () {



    $('.panel-search-trigger, .search-close').click(function (e) {

        $(".panel-search").toggleClass('hide');
        e.preventDefault();
    });


    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })


    $('a.scrollto').click(function (e) {
        $('html,body').scrollTo(this.hash, this.hash);
        e.preventDefault();
    });

});


//Toggle

$('.signin-toggle').click(function () {
    $(this).addClass('active');
    $('.signup-toggle').removeClass('active');
    $('#form-signup').removeClass('active');
    $('#form-signin').addClass('active');

});

if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
    $('.ifios').addClass("isios");
} else {
    //alert('non ios');

}

$(window).on('load', function () {
});


// top navbar IE & Mobile Device fix
var isMobile = function () {
    //console.log("Navigator: " + navigator.userAgent);
    return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);
};


if (isMobile()) {
    // For  mobile , ipad, tab

} else {


    $(function () {

        //Keep track of last scroll
        var teventScroll = 0;
        $(window).scroll(function (event) {
            //Sets the current scroll position
            var ts = $(this).scrollTop();
            //Determines up-or-down scrolling
            if (ts > teventScroll) {
                // downward-scrolling
                $('.header-wrapper').addClass('stuck');

            } else {
                // upward-scrolling
                $('.header-wrapper').removeClass('stuck');
            }

            if (ts < 600) {
                // downward-scrolling
                $('.navbar').removeClass('stuck');
                //alert()
            }


            teventScroll = ts;

            //Updates scroll position

        });
    });


} // end Desktop else





