jQuery(document).ready(function ($) {

    $('#multizoom1').addimagezoom({// multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
        descArea: '#description', // description selector (optional - but required if descriptions are used) - new
        speed: 1500, // duration of fade in for new zoomable images (in milliseconds, optional) - new
        descpos: true, // if set to true - description position follows image position at a set distance, defaults to false (optional) - new
        imagevertcenter: true, // zoomable image centers vertically in its container (optional) - new
        magvertcenter: true, // magnified area centers vertically in relation to the zoomable image (optional) - new
        zoomrange: [3, 10],
        magnifiersize: [250, 250],
        magnifierpos: 'right',
        cursorshadecolor: '#fdffd5',
        cursorshade: true //<-- No comma after last option!
    });

    $('#multizoom2').addimagezoom({// multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
        descArea: '#description2', // description selector (optional - but required if descriptions are used) - new
        disablewheel: true, // even without variable zoom, mousewheel will not shift image position while mouse is over image (optional)
        zoomrange: [3, 10],
        magnifiersize: [350, 350],
        cursorshadecolor: '#fdffd5',
        //	innerzoommagnifier: true,
        cursorshade: true,
        cursorshadeborder: '1px solid #DDDDDD',
    });

    $('.thumbs a:first-child').addClass('activethm');
    $('.thumbs a').click(
        function (e) {
            // e.preventDefault(); // prevent the default action
            // e.stopPropagation(); // stop the click from bubbling

            $(this).closest('.thumbs').find('.activethm').removeClass('activethm');
            $(this).addClass('activethm');

        });


})
