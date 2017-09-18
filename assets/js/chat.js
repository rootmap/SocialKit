

/*
 * 
 * @param {type} name
 * @param {type} value
 * @param {type} days
 * [this function will create cookie in a browser.]
 */
function createCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/sulsocial/";
}


/*
 * 
 * @param {type} name
 * [ this function is for read cookie ]
 */
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

/*
 * 
 * @param {type} name
 * [ this function is for erease or delete cookie]
 */
function eraseCookie(name) {
    createCookie(name, "", -1);
}




/*
 * 
 * this automated function is for mantain chat windows.
 */
(function () {

    setInterval(function () {
        var count0 = readCookie("count");  // show user id
        var count2 = readCookie("count2");
        var count3 = readCookie("count3");

        var windowchat1 = readCookie("windowchat1");
        var windowchat2 = readCookie("windowchat2");
        var windowchat3 = readCookie("windowchat3");
        if (count0 != 0) {
            $('#chat_window_3').show('slow');
            $('#chat_window_1').css("margin-left", "10px");
            $('#chat_window_2').css("margin-left", "290px");
            $('#chat_window_3').css("margin-left", "575px");
        }

        if (count2 != 0) {
            $('#chat_window_2').show('slow');
            $('#chat_window_1').css("margin-left", "10px");
            $('#chat_window_2').css("margin-left", "290px");
            $('#chat_window_3').css("margin-left", "575px");
        }

        if (count3 != 0) {
            $('#chat_window_1').show('slow');
            $('#chat_window_1').css("margin-left", "10px");
            $('#chat_window_2').css("margin-left", "290px");
            $('#chat_window_3').css("margin-left", "575px");
        }

    }, 1000);

})();


/*
 * 
 * @param {type} duration
 * [ function for scroll to bottom ]
 */
function scrollToBottom(duration) {
    var messageWindow = $('#' + current_window + '_scroll');
    var scrollHeight = messageWindow.prop("scrollHeight");
    messageWindow.stop().animate({scrollTop: scrollHeight}, duration || 0);
};



/*
 * 
 * @param {type} user_id
 * @param {type} clicker_id
 * [ core function for open chat window on click a user li ]
 */
// [chat window open start]
function openchat_window(user_id, clicker_id) {
    var uid = user_id;
    var clickerid = clicker_id;
    var current_window = "";

    if (clickerid != '' && clickerid != null) {

        var windowUID1 = readCookie("chat_window_3_user"); //show 0 / 1
        var windowUID2 = readCookie("chat_window_2_user");
        var windowUID3 = readCookie("chat_window_1_user");

        var count0 = readCookie("count");  // show user id
        var count2 = readCookie("count2");
        var count3 = readCookie("count3");


        if (count0 == 0) {
            if (uid != count2 && uid != count3) {
                var newcreat1 = $.cookie("count", uid);

                $.cookie("chat_window_3_user", "1");
                $.cookie("windowchat3", "chat_window_3");
                current_window = "chat_window_3";
            }
        } else {

            if (uid != count0) {
                if (count2 == 0) {
                    if (uid != count0 && uid != count3) {
                        var newcreat2 = $.cookie("count2", uid);
                        $.cookie("chat_window_2_user", "1");
                        $.cookie("windowchat2", "chat_window_2");
                        current_window = "chat_window_2";
                    }
                } else {
                    if (uid != count0 && uid != count2) {
                        if (count3 == 0) {
                            if (uid != count0 && uid != count2) {
                                var newcreat3 = $.cookie("count3", uid);
                                $.cookie("chat_window_1_user", "1");
                                $.cookie("windowchat1", "chat_window_1");
                                current_window = "chat_window_1";
                            }
                        } else {
                            if (uid != count2 && uid != count3) {
                                var newcreat1 = $.cookie("count", uid);
                                $.cookie("chat_window_3_user", "1");
                                $.cookie("windowchat3", "chat_window_3");
                                current_window = "chat_window_3";
                            }
                        }
                    }
                }

            }

        } //[end else] 

    }

    $('#' + current_window + '_submit').attr("name", uid);
    $('#' + current_window + '_submit').attr("onKeydown", "Javascript: if (event.keyCode == 13) sendchatmessage('" + uid + "',this.value,'" + current_window + "_activity','" + current_window + "_scroll','" + current_window + "_submit');");

    var loader = "<img src='./images/spinner/medium.gif' alt='Loading Content Please Wait..' style='margin-left:40%;padding:10px;' />";
    $('#' + current_window + '_activity').html(loader);

    $.post('lib/chat.php', {'st': 1, 'uid': uid}, function (data)
    {
        $('#' + current_window + "_chat_user_name").html(data);
        
        var window1 = readCookie("windowchat1");  // show user id
        var window2 = readCookie("windowchat2");
        var window3 = readCookie("windowchat3");

        if (current_window == window3) {
            window.setInterval(function () {
                var count0 = readCookie("count");
                $.post('lib/chat.php', {'st': 3, 'for_uid': count0},
                        function (chatdata) {
                            $('#' + current_window + '_activity').html(chatdata);
                        });
            }, 5000);
        } else if (current_window == window2) {
             window.setInterval(function () {
                var count2 = readCookie("count2");
                $.post('lib/chat.php', {'st': 3, 'for_uid': count2},
                        function (chatdata) {
                            $('#' + current_window + '_activity').html(chatdata);
                        });
            }, 5000);
        } else if (current_window == window1) {
                window.setInterval(function () {
                var count3 = readCookie("count3");
                $.post('lib/chat.php', {'st': 3, 'for_uid': count3},
                        function (chatdata) {
                            $('#' + current_window + '_activity').html(chatdata);
                        });
            }, 5000);
        } else {

        }
    
                     var interval = window.setInterval(function(){
                         var scrolltoh = $('#'+current_window+'_scroll')[0].scrollHeight;
                         $('#'+current_window+'_scroll').scrollTop(scrolltoh);
                     },1000);
                     setInterval(function() {
                            clearInterval(interval);
                     }, 7000);


    });


}
// [chat window open end]


/*
 * Sidebar
 */
(function () {

    //Toggle
    $('body').on('click', ' #chat-trigger', function (e) {
        e.preventDefault();
        var x = $(this).data('trigger');
        $(this).toggleClass('open');
        $('#chat').toggleClass('toggled');
        $('#chat-trigger .fa').toggleClass('fa-comment fa-times');
    })

})();


// [to close a window start]
$('a.chat_close').click(function (e) {
    var windowcl = $(this).attr("name");
    $('#' + windowcl).hide('slow');
    if (windowcl == 'chat_window_1')
    {
        $.cookie("count3", "0");
        $.cookie("chat_window_1_user", "0");
        $.cookie("windowchat1", "");
    } else if (windowcl == 'chat_window_2')
    {
        $.cookie("count2", "0");
        $.cookie("chat_window_2_user", "0");
        $.cookie("windowchat2", "");
    } else if (windowcl == 'chat_window_3')
    {
        $.cookie("count", "0");
        $.cookie("chat_window_3_user", "0");
        $.cookie("windowchat3", "");
    }

    if ($.cookie("count") == "0" && $.cookie("count2") == 1 && $.cookie("count3") == 0)
    {
        $('#chat_window_2').css("margin-left", "10px");
        $('#chat_window_3').css("margin-left", "575px");
    } else if ($.cookie("count") == "0" && $.cookie("count2") == 1 && $.cookie("count3") == 1)
    {
        $('#chat_window_2').css("margin-left", "10px");
        $('#chat_window_3').css("margin-left", "575px");
    } else if ($.cookie("count2") == "0" && $.cookie("count") == 1 && $.cookie("count3") == 1)
    {
        $('#chat_window_1').css("margin-left", "10px");
        $('#chat_window_2').css("margin-left", "0px");
        $('#chat_window_3').css("margin-left", "290px");
    } else if ($.cookie("count") == 1 && $.cookie("count2") == 1 && $.cookie("count3") == "0")
    {
        $('#chat_window_1').css("margin-left", "10px");
        $('#chat_window_2').css("margin-left", "290px");
        $('#chat_window_3').css("margin-left", "575px");
    } else if ($.cookie("count") == "0" && $.cookie("count2") == "0" && $.cookie("count3") == 1)
    {
        $('#chat_window_1').css("margin-left", "575px");
        $('#chat_window_2').css("margin-left", "290px");
        $('#chat_window_3').css("margin-left", "10px");
    }


});
// [to close a window end]

$('li.lv-item').click(function (e)
{
    var uid = $(this).attr("name");
    //alert('Success');
    var current_window = "";
    var cnt1 = $.cookie("count");
    var cnt2 = $.cookie("count2");
    var cnt3 = $.cookie("count3");
    //alert($.cookie("count")+"-"+$.cookie("count2")+"-"+$.cookie("count3"));

    if (cnt1 == 0 && cnt2 == 0 && cnt3 == 1)
    {
        $.cookie("count", "1");
        $('#chat_window_1').show('slow');
        $('#chat_window_3').css("margin-left", "290px");
        $('#chat_window_1').css("margin-left", "10px");
        current_window = "chat_window_1";
        $.cookie("chat_window_1_user", uid);
        $.cookie("windowchat1", "chat_window_1");
        //$('#chat_window_2').css("margin-left","575px");
    } else if (cnt1 == 1 && cnt2 == 0 && cnt3 == 1)
    {
        $.cookie("count", "1");
        $('#chat_window_2').show('slow');
        $('#chat_window_1').css("margin-left", "10px");
        $('#chat_window_2').css("margin-left", "290px");
        $('#chat_window_3').css("margin-left", "575px");
        current_window = "chat_window_2";
        $.cookie("chat_window_2_user", uid);
        $.cookie("windowchat2", "chat_window_2");

    } else if (cnt1 == 0 && cnt2 == 0 && cnt3 == 0)
    {
        $.cookie("count", "1");
        $('#chat_window_1').show('slow');
        $('#chat_window_1').css("margin-left", "10px");
        $('#chat_window_2').css("margin-left", "290px");
        $('#chat_window_3').css("margin-left", "575px");
        current_window = "chat_window_1";
        $.cookie("chat_window_1_user", uid);
        $.cookie("windowchat1", "chat_window_1");
    } else
    {
        if (cnt2 == 0)
        {
            $.cookie("count2", "1");
            $('#chat_window_2').show('slow');
            $('#chat_window_1').css("margin-left", "10px");
            $('#chat_window_2').css("margin-left", "290px");
            $('#chat_window_3').css("margin-left", "575px");
            current_window = "chat_window_2";
            $.cookie("chat_window_2_user", uid);
            $.cookie("windowchat2", "chat_window_2");
        } else
        {
            if (cnt3 == 0)
            {
                $.cookie("count3", "1");
                $('#chat_window_3').show('slow');
                $('#chat_window_1').css("margin-left", "10px");
                $('#chat_window_2').css("margin-left", "290px");
                $('#chat_window_3').css("margin-left", "575px");
                current_window = "chat_window_3";
                $.cookie("chat_window_3_user", uid);
                $.cookie("windowchat3", "chat_window_3");
            } else
            {
                $.cookie("count3", "1");
                $('#chat_window_3').show('slow');
                $('#chat_window_1').css("margin-left", "10px");
                $('#chat_window_2').css("margin-left", "290px");
                $('#chat_window_3').css("margin-left", "575px");
                current_window = "chat_window_3";
                $.cookie("chat_window_3_user", uid);
                $.cookie("windowchat3", "chat_window_3");
            }
        }
    }

    //alert('#'+current_window+'_activity');

    //var chatwindow=$(this).attr("id");

    $('#' + current_window + '_submit').attr("name", uid);
    $('#' + current_window + '_submit').attr("onKeydown", "Javascript: if (event.keyCode == 13) sendchatmessage('" + uid + "',this.value,'" + current_window + "_activity','" + current_window + "_scroll','" + current_window + "_submit');");
//    $('#' + current_window + '_activity').html("Loading Content Please Wait..");
    var loader = "<img src='./images/spinner/medium.gif' alt='Loading Content Please Wait..' style='margin-left:40%;padding:10px;' />";
    $('#' + current_window + '_activity').html(loader);
    e.preventDefault();
    var param = {'st': 1, 'uid': uid};
    $.post("lib/chat.php", param, function (data)
    {
        $('#' + current_window + "_chat_user_name").html(data);
        //alert(current_window+"_chat_user_name");
        $.post('lib/chat.php', {'st': 3, 'for_uid': uid}, function (chatdata) {
            $('#' + current_window + '_activity').html(chatdata);
            var scrolltoh = $('#' + current_window + '_scroll')[0].scrollHeight;
            $('#' + current_window + '_scroll').scrollTop(scrolltoh);
        });
    });
});


function sendchatmessage(uid, valuemess, showplace, scrtext, emptyplace)
{
    $.post("lib/chat.php", {'for_uid': uid, 'st': 2, 'mess': valuemess}, function (data)
    {
        $('#' + emptyplace).val("");
        var new_html = "<script>window.setInterval(function(){$.post('lib/chat.php',{'st':3,'for_uid':" + uid + "},function(chatdata){ $('#" + showplace + "').html(chatdata); var scrolltoh = $('#" + scrtext + "')[0].scrollHeight;  $('#" + scrtext + "').scrollTop(scrolltoh); }); },5000); </script>" + data;
        $('#' + showplace).html(new_html);
        //$('#'+emptext).val();
    });
}

function loadchathistory(uid, place)
{
    $.post("lib/chat.php", {'for_uid': uid, 'st': 3}, function (data)
    {
        alert("Success");
        //$('#'+place).html(data);
    });
}

/// CHAT

$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $(".chat-window:last-child").css("margin-left");
    size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $("#chat_window_1").clone().appendTo(".container");
    clone.css("margin-left", size_total);
});
