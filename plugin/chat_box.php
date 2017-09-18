<script>
    $(document).ready(function (e) {

        var wc1 = $.cookie("count3");

        if (wc1 != 0)
        {
            var uid1 = $.cookie("count3");
            $('#chat_window_1').show('slow');
            current_window1 = "chat_window_1";
            $('#' + current_window1 + '_submit').attr("name", uid1);
            $('#' + current_window1 + '_submit').attr("onKeydown", "Javascript: if (event.keyCode == 13) sendchatmessage('" + uid1 + "',this.value,'" + current_window1 + "_activity','" + current_window1 + "_scroll','" + current_window1 + "_submit');");

            var loader = "<img src='./images/spinner/medium.gif' alt='Loading Content Please Wait..' style='margin-left:40%;padding:10px;' />";
            $('#' + current_window1 + '_activity').html(loader);
            /*e.preventDefault();*/
            var param = {'st': 1, 'uid': uid1};
            $.post("lib/chat.php", param, function (data)
            {
                $('#' + current_window1 + "_chat_user_name").html(data);
                //alert(current_window1+"_chat_user_name");
                $.post('lib/chat.php', {'st': 3, 'for_uid': uid1}, function (chatdata) {
                    $('#' + current_window1 + '_activity').html(chatdata);
                    var scrolltoh = $('#' + current_window1 + '_scroll')[0].scrollHeight;
                    $('#' + current_window1 + '_scroll').scrollTop(scrolltoh);
                });
            });
        }


        var wc2 = $.cookie("count2");

        if (wc2 != 0)
        {
            var uid2 = $.cookie("count2");
            $('#chat_window_2').show('slow');
            current_window2 = "chat_window_2";
            $('#' + current_window2 + '_submit').attr("name", uid2);
            $('#' + current_window2 + '_submit').attr("onKeydown", "Javascript: if (event.keyCode == 13) sendchatmessage('" + uid2 + "',this.value,'" + current_window2 + "_activity','" + current_window2 + "_scroll','" + current_window2 + "_submit');");

            var loader = "<img src='./images/spinner/medium.gif' alt='Loading Content Please Wait..' style='margin-left:40%;padding:10px;' />";
            $('#' + current_window2 + '_activity').html(loader);
            /*e.preventDefault();*/
            var param = {'st': 1, 'uid': uid2};
            $.post("lib/chat.php", param, function (data)
            {
                $('#' + current_window2 + "_chat_user_name").html(data);
             
                $.post('lib/chat.php', {'st': 3, 'for_uid': uid2}, function (chatdata) {
                    $('#' + current_window2 + '_activity').html(chatdata);
                    var scrolltoh = $('#' + current_window2 + '_scroll')[0].scrollHeight;
                    $('#' + current_window2 + '_scroll').scrollTop(scrolltoh);
                });
            });
        }

        var wc3 = $.cookie("count");

        if (wc3 != 0)
        {
            
            var uid3 = $.cookie("count");
            $('#chat_window_3').show('slow');
            current_window3 = "chat_window_3";
            $('#' + current_window3 + '_submit').attr("name", uid3);
            $('#' + current_window3 + '_submit').attr("onKeydown", "Javascript: if (event.keyCode == 13) sendchatmessage('" + uid3 + "',this.value,'" + current_window3 + "_activity','" + current_window3 + "_scroll','" + current_window3 + "_submit');");

            var loader = "<img src='./images/spinner/medium.gif' alt='Loading Content Please Wait..' style='margin-left:40%;padding:10px;' />";
            $('#' + current_window3 + '_activity').html(loader);
            /*e.preventDefault();*/
            var param = {'st': 1, 'uid': uid3};
            $.post("lib/chat.php", param, function (data)
            {
                $('#' + current_window3 + "_chat_user_name").html(data);
                
                $.post('lib/chat.php', {'st': 3, 'for_uid': uid3}, function (chatdata) {
                    $('#' + current_window3 + '_activity').html(chatdata);
                    var scrolltoh = $('#' + current_window3 + '_scroll')[0].scrollHeight;
                    $('#' + current_window3 + '_scroll').scrollTop(scrolltoh);
                });
            });
        }



    });
</script>






<div id="chat_bar">


    <div style="margin-left:10px; z-index:9999; max-width: 300px;" id="chat_window_1" class="row chat-window col-xs-5 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading top-bar">
                <div class="col-md-8 col-xs-8">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> <span id="chat_window_1_chat_user_name">    </span></h3>
                </div>
                <div style="text-align: right;" class="col-md-4 col-xs-4">
                    <a href="javascript:void(0);"><span class="glyphicon icon_minim glyphicon-minus" id="minim_chat_window"></span></a>
                    <a href="javascript:void(0);" class="chat_close" name="chat_window_1"><span class="glyphicon glyphicon-remove icon_close"></span></a>
                </div>
            </div>
            <div class="panel-body msg_container_base" style="display: block; height:300px;"  id="chat_window_1_scroll">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <div class="chat-activity-list" id="chat_window_1_activity">
                                <div class="chat-element">
                                    <a class="pull-left" href="javascript:void(0);">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element right">
                                    <a class="pull-right" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body text-right ">
                                        <small class="pull-left"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element ">
                                    <a class="pull-left" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-heading fot-bar">
                <input placeholder="Message" id="chat_window_1_submit" style="width:100%; margin:0;" type="text" class="form-control" />
            </div>
        </div>
    </div>

    
    
    <div style="margin-left:290px; z-index:9999;   max-width: 300px;" id="chat_window_2" class="row chat-window col-xs-5 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading top-bar">
                <div class="col-md-8 col-xs-8">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> <span id="chat_window_2_chat_user_name">    </span></h3>
                </div>
                <div style="text-align: right;" class="col-md-4 col-xs-4">
                    <a href="javascript:void(0);"><span class="glyphicon icon_minim glyphicon-minus" id="minim_chat_window"></span></a>
                    <a href="javascript:void(0);" class="chat_close" name="chat_window_2"><span class="glyphicon glyphicon-remove icon_close"></span></a>
                </div>
            </div>
            <div class="panel-body msg_container_base" style="display: block; height:300px;"  id="chat_window_2_scroll">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                            <div class="chat-activity-list"  id="chat_window_2_activity">
                                
                                <div class="chat-element">
                                    <a class="pull-left" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                            
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element right">
                                    <a class="pull-right" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body text-right ">
                                        <small class="pull-left"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element ">
                                    <a class="pull-left" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-heading fot-bar">
                <input placeholder="Message" id="chat_window_2_submit" style=" width:100%; margin:0;" type="text" class="form-control" />
            </div>
        </div>
    </div>

    
    
    <div style="margin-left:575px; z-index:9999;  max-width: 300px;" id="chat_window_3" class="row chat-window col-xs-5 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading top-bar">
                <div class="col-md-8 col-xs-8">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> <span id="chat_window_3_chat_user_name">      </span></h3>
                </div>
                <div style="text-align: right;" class="col-md-4 col-xs-4">
                    <a href="javascript:void(0);"><span class="glyphicon icon_minim glyphicon-minus" id="minim_chat_window"></span></a>
                    <a href="javascript:void(0);" class="chat_close" name="chat_window_3"><span  class="glyphicon glyphicon-remove icon_close"></span></a>
                </div>
            </div>
            <div class="panel-body msg_container_base" style="display: block; height:300px;"  id="chat_window_3_scroll">
                <div class="ibox float-e-margins" >
                    <div class="ibox-content">
                        <div>
                            <div  class="chat-activity-list" id="chat_window_3_activity" style="overflow:auto;">
                                
                                <div class="chat-element">
                                    <a class="pull-left" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                           
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element right">
                                    <a class="pull-right" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body text-right ">
                                        <small class="pull-left"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                            
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>

                                <div class="chat-element ">
                                    <a class="pull-left" href="">
                                        <img src="images/user/generic-man-profile.jpg" class="img-circle" alt="image">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right"></small>
                                        <strong></strong>

                                        <p class="m-b-xs">
                                            
                                        </p>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-heading fot-bar">
                <input placeholder="Message" id="chat_window_3_submit" style=" width:100%; margin:0;" type="text" class="form-control" />
            </div>
        </div>
    </div>
    
    


</div>
