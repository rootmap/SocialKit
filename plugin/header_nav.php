<!-- [header nav css start] -->
<style type="text/css">
    .main {
        width: 310px;
        margin-left: auto;
        margin-right: auto;
    }

    input {
        font-family: 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 13px;
        color: #555860;
    }

    .search {
        position: relative;
        margin-left: 0px;
        width: 295px;
    }

    .search input {
        height: 35px;
        width: 100%;
        padding: 0 30px 0 5px;
        background: white url("http://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 270px 11px no-repeat;

        border-width: 1px;
        border-style: solid;
        border-color: #a8acbc #babdcc #c0c3d2;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        -moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        -ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        -o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
    }

    .search input:focus {
        outline: none;
        border-color: #66b1ee;
        -webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        -moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        -ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        -o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
    }

    .search input:focus + .results { display: block }

    .search .results {
        width:120%;
        display: block;
        position: absolute;
        top: 40px;
        left: 0;
        right: 0;
        z-index: 10;
        padding: 0;
        margin: 0;
        border-width: 1px;
        border-style: solid;
        border-color: #cbcfe2 #c8cee7 #c4c7d7;
        background-color: #fdfdfd;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
        background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
        background-image: linear-gradient(top, #fdfdfd, #eceef4);
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .search .results li { display: block;
                          border:1px solid #ccc !important;
    }

    .search .results li:first-child { margin-top: -1px }

    .search .results li:first-child:before, .search .results li:first-child:after {
        display: block;
        content: '';
        width: 0;
        height: 0;
        position: absolute;
        left: 50%;
        margin-left: -5px;
        border: 5px outset transparent;
    }

    .search .results li:first-child:before {
        border-bottom: 5px solid #c4c7d7;
        top: -11px;
    }

    .search .results li:first-child:after {
        border-bottom: 5px solid #fdfdfd;
        top: -10px;
    }

    .search .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }

    .search .results li:last-child { margin-bottom: -1px }

    .search .results a {
        display: block;
        position: relative;
        margin: 0 -1px;
        padding: 6px 40px 6px 10px;
        color: #000 !important;
        font-weight: 500;
        text-shadow: 0 1px #fff;
        border: 0px solid transparent;
    }

    .search .results a span { font-weight: 200 }

    .search .results li:hover{
        border-color: #2380dd #2179d5 #1a60aa;
        background-color: #338cdf;
        color: #fff !important;
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
        background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
        background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
        background-image: linear-gradient(top, #59aaf4, #338cdf);
        transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    }

    .search .results li:hover a{ color: #fff !important;	}

    .search .results li:hover .btn{ background-color: #ff5722 !important; color: #fff !important;	}

    :-moz-placeholder {
        color: #a7aabc;
        font-weight: 200;
    }

    ::-webkit-input-placeholder {
        color: #a7aabc;
        font-weight: 200;
    }

    .add-f-btn{
        position:absolute !important;
        top:-5px !important;
        color: #fff !important;
        padding-right:10px !important;
    }

    .frnd-img{height:50px !important; width:50px !important;}

    #load-spin:hover{background-color: #fafafa !important; color:#000 !important;}

    @media only screen and (max-width : 767px){
        #custom-search-input{display:none !important;}
    }

</style>
<!-- [header nav cssend] -->


<!-- [main nav panel start] -->
<div class="navbar navbar-default navbar-site  navbar-static-top">
    <div class="container">

        <!-- [nav header start] -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"><img src="images/dostums-logo.png" alt="dostums ">
            </a>
        </div>
        <!-- [nav header ends] -->

        <!-- [navbar starts] -->
        <div class="navbar-collapse collapse">


            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <div id="custom-search-input" class="row">
                        <section class="main">
                            <!-- [search bar panel start] -->
                            <form class="search" method="get"  >
                                <input id="searchMe" type="text" name="q" placeholder="Search Dostums Friends..." />

                                <ul class="results" id="suggestions" data-mcs-theme="dark">
                                    <li id="loading" style="padding:0px !important; display:none;">
                                        <a id="load-spin" href="#">
                                            <div class="row">
                                                <div class="col-sm-6 text-right" style="margin-top:5px;">
                                                    Please Wait...
                                                </div>
                                                <div class="col-sm-6 text-left">
                                                    <img class="" src="./images/spinner/rolling.gif" style=""/>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                               	</ul>
                            </form>
                            <!-- [search bar panel ends] -->
                        </section>
                    </div>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">

                <!-- [home start] -->
                <li class="dropdown">
                    <a href="./home.php" style="border-left:1px solid #e5e5e5 !important;"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                </li>
                <!-- [home ends] -->

                <!-- [dostums user name start] -->
                <li>
                    <a href="profile.php">
                        <span class="gylphycon">
                            <?php
                            $photo_id = $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $dostums_user_id, "status", 2, "photo_id");
                            $photo = $obj->SelectAllByVal("dostums_photo", "id", $photo_id, "photo");

                            if ($photo == "") {
                                $new_photo = "generic-man-profile.jpg";
                            } else {
                                $new_photo = $photo;
                            }
                            ?>
                            <img alt="user" class="img-circle" src="./profile/<?php echo $new_photo; ?>" style="height:15px; width:15px; border:1px solid #2C99CE;"/>

                        </span>
                        <?php echo substr($dostums_user_name, 0, 10) . ".."; ?>
                    </a>
                </li>
                <!-- [dostums user name ends] -->

                <!-- [dostums friend request start] -->
                <li class="dropdown">
                    <a id="fdrop" href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle count-info">
                        <i class="fa fa-user-plus" id="user_request_plus" aria-hidden="true"></i>
                        <span class="badge badge-default" id="user_requests">0
                            <script>
                                //  [setInterval for show friend request start]
                                window.setInterval(function () {
                                    $.ajax({
                                        type: "POST",
                                        url: "lib/shout.php",
                                        dataType: "json",
                                        data: {
                                            'st': 1
                                        },
                                        success: function (responsed) {
                                            var obj = responsed;
                                            var count = obj.count;
                                            if (obj.output == "success") {
                                                $('#user_requests').html(count);
                                                if (count == 0) {
                                                    $("#user_requests").removeClass("badge-danger");
                                                    $("#user_requests").addClass("badge-default");
                                                } else {
                                                    $("#user_requests").addClass("badge-danger");
                                                }
                                            } else {
//                                                                                            error(obj.msg);
                                            }
                                        }
                                    });
                                }, 1000);
                                //  [setInterval for show friend request ends]
                            </script>
                        </span>
                    </a>

                    <ul id="totaluser_requestbox" class="dropdown-menu">
                        <script>
                            window.setInterval(function () {

                                $.ajax({
                                    type: "POST",
                                    url: "lib/shout.php",
                                    dataType: "json",
                                    data: {
                                        'st': 2,
                                        'user_request': 'dostums'
                                    },
                                    success: function (responsed) {
                                        var obj = responsed;
                                        var html = obj.html;
                                        if (obj.output == "success") {
                                            $('#totaluser_requestbox').html(html);
                                        } else {
//                                         error(obj.msg);
                                        }
                                    }
                                });

                            }, 1000);
                        </script>
                    </ul>
                </li>
                <!-- [dostums friend request ends] -->

                <!-- [dostums message starts] -->
                <li class="dropdown">
                    <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle count-info" 
                       id="messageBUTTON" onclick="seenMsg(<?php echo $dostums_user_id; ?>);">
                        
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span class="badge badge-danger" id="message_notification">0
                        </span>
                        <script>
                            //  [setInterval for dostums message start]
                            window.setInterval(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "lib/chat.php",
                                    dataType: "json",
                                    data: {
                                        'st': 4
                                    },
                                    success: function (responsed) {
                                        var obj = responsed;
                                        var count = obj.count;
                                        if (obj.output == "success") {
                                            $('#message_notification').html(count);
                                            
                                            if (count == 0) {
                                                $("#message_notification").removeClass("badge-danger");
                                                $("#message_notification").addClass("badge-default");

                                            } else {
                                                $("#message_notification").addClass("badge-danger");
                                            }

                                        } else {
//                                         error(obj.msg);
                                        }
                                    }
                                });

                            }, 1000);
                            //  [setInterval for show dostums message ends]
                        </script>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-messages" id="message_new_history">
                        <script>
                            window.setInterval(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "lib/chat.php",
                                    dataType: "json",
                                    data: {
                                        'st': 5
                                    },
                                    success: function (responsed) {
                                        var obj = responsed;
                                        var html = obj.html;
                                        if (obj.output == "success") {
                                            $('#message_new_history').html(html);
                                        } else {
//                                         error(obj.msg);
                                        }
                                    }
                                });

                            }, 1000);
                        </script>
                    </ul>
                </li>
                <!-- [dostums message ends] -->

                <!-- [dostums notification starts] -->
                <li class="dropdown ">
                    <a href="notification_more.php" data-toggle="dropdown" class="dropdown-toggle count-info">
                        <i class="fa fa-bell" id="totalfriendrequest_bell"></i>
                        <span id="notifi" class="badge badge-danger">0
                            <script>
                                $.post('lib/notifications_data.php', {'st': 1, 'userId':<?php echo $new_user_id; ?>}, function (data_notification) {
                                    $('#notifi').html(data_notification);
                                });
                            </script>

                        </span>
                    </a>
                    <ul id="notifi_data" class="dropdown-menu">
                        <script>
                            $.post('lib/notifications_data.php', {'st': 2, 'userId':<?php echo $new_user_id; ?>}, function (data_notification) {
                                $('#notifi_data').html(data_notification);
                            });
                        </script>
                    </ul>
                </li>
                <!-- [dostums notification ends] -->

                <!-- [hidden ] -->
                <li class="dropdown" style="display:none !important;">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-bell"></i>
                        <span id="totalnotifications" class="label label-info">1</span>
                    </a>
                    <ul id="totalfriendrequestbox" class="dropdown-menu dropdown-alerts dropdown-messages">

                    </ul>
                </li>
                <!-- [hidden ] -->

                <!-- [Setting part start] -->
                <li class="dropdown">
                    <a href="./profile.php" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="setting.php">General Settings <span class="fa fa-cog pull-right"></span></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="security_settings.php">Account Settings <span class="fa fa-cogs pull-right"></span></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="privacy.php">Privacy Settings <span class="fa fa-user-secret pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="./logout.php">Sign Out <span class="fa fa-sign-out pull-right"></span></a></li>
                    </ul>
                </li>
                <!-- [Setting part ends] -->

                <!-- [chat button start] -->
                <li >
                    <a id="chat-trigger" href="javascript:void(0);" style="border-right:1px solid #e5e5e5 !important;"> <i class="fa fa-comment"></i> CHAT </a>
                </li>
                <!-- [chat button end] -->
            </ul>

        </div>
        <!-- [navbar end] -->

    </div>
</div>
<!-- [main nav panel end] -->



<script>
    $('document').ready(function (e) {

        $('.friends').hide('slow');
        $('#loading').hide();
        $('#not-found').hide();
        $('#suggestions').hide();



        $('#searchMe').keyup(function (e) {
            $('#loading').show('slow');
            $('#suggestions').show();
            var countval = $(this).val().length;
            if (countval >= 4)
            {
                $.post("./lib/search_friends.php", {'st': 1, 'search_data': $(this).val()}, function (fetch) {
                    var datacl = jQuery.parseJSON(fetch);
                    var opt = datacl.data;
                    $('#suggestions').html(opt);
                    //$('#suggestions').show();
                    $('#loading').hide();
                    $.ajaxSetup({cache: false});
                });

            } else if (countval == 0)
            {
                $('#suggestions').hide();
                $('#loading').hide();
            } else
            {
                $('.friends').hide();
            }
        });



        $('.friends').click(function (e) {
            var getlink = $(this).find('a').attr('href');
            alert('success');
        });

    });


</script>
