
<?php
include('class/auth.php');
$new_user_id = $input_by;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Messages </title>
        <?php include('plugin/header_script.php'); ?>
        <script>
            $(document).ready(function (e) {
                $('.mailbox-search').keypress(function (e) {
//                    if (e.which == 13)
//                    {
                        
                        var textboxval = $(this).val();
                        $.post("lib/chat.php", {'st': 10, 'search': textboxval}, function (data)
                        {
                            $('#messenger_user_list').html(data);
                        });
//                    } else {
//                        alert('2');
//                    }
                });
                $('.fa fa-trash').click(function (e) {
                });
            });
        </script>
    </head>
    <body class="home">
        <header>
            <div class="header-wrapper">

                <div class="header-nav">
                    <?php include('plugin/header_nav.php'); ?>
                </div>
            </div>
        </header>


        <?php
        //chat box script
        include('plugin/chat_box.php');
//chat box script 
        ?>

        <?php
        //chat user list
        include('plugin/chat_box_head_list.php');
//chat user list 
        ?>


        <div class="main-container page-container section-padd">
            <div class="mailbox-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12"><h4 class="pull-left page-title"><i class="mdi-communication-email"></i> Inbox <span class="sub-text"> Find all my unread messages  </span> </h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="javascript:void(0);">Profile</a></li>
                                <li><a href="javascript:void(0);">Mail</a></li>
                                <li class="active">Inbox</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 ">
                            
                            <!--<a href="email-compose.html" class="btn btn-danger mt0  btn-block">Compose</a>-->

                            <div class="panel panel-default">
                                <div class="panel-body p-0">
                                    <div class="list-group mail-list">
                                        
                                        <a href="#" class="list-group-item no-border active">
                                            <i class="fa fa-download m-r-5"></i>Inbox <b id="inbox_message">(0)
                                                <script>
                                                    
                                                    setInterval(function() {
                                                            //  5 seconds
                                                            
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "./lib/chat.php",
                                                                dataType: "json",
                                                                data: {
                                                                  st:4
                                                                },
                                                                success: function (response) {
                                                                  var obj = response;
                                                                  if (obj.output == "success") {
                                                                    var returnvalue = obj.count;
                                                                    $('#inbox_message').html("(" + returnvalue + ")");
                                                                  } else {
                                                                      $('#inbox_message').html("0");
                                                                  }
                                                                }
                                                              });
                                                     }, 1000);
                                                    
                                                </script>
                                            </b>
                                        </a>
                                        
                                        <a href="#" class="list-group-item no-border"><i class="fa fa-paper-plane-o m-r-5"></i> Sent Mail</a> 
                                        <a href="#" class="list-group-item no-border"><i class="fa fa-trash-o m-r-5"></i> Trash <b>(354)</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-9 col-md-9">
                            <div class="row well" style="display:block;">
                                <div class="col-lg-12 col-md-12 no-padding" id="messgenger_user">

                                    <div class="chat-user-search">
                                        <div class="search">
                                            <input type="text" placeholder="Search" id="mailboxsearch"
                                                   class="mailbox-search" vk_1a9a3="subscribed">

                                            <span class="searchbutton"><i class="fa fa-search"></i></span>
                                        </div>

                                    </div>
                                    
                                    
                                    <ul class="mailbox-inbox" id="messenger_user_list">
                                        <script>
                                            $.post('lib/chat.php', {'st': 6}, function (data_notification) {
                                                $('#messenger_user_list').html(data_notification);

                                            });
                                        </script>
                                    </ul>
                                    
                                </div>
                                
                                
                                <div class="col-lg-8 col-md-8  no-padding" style="display:none;" id="messenger_composer">
                                    <div class="mail-chat  padding-0">

                                        <!-- Start Title -->
                                        <div class="title">
                                            <h1><span id="composer_chat_current_user_name">Fahad</span><br>
                                                <small id="composer_chat_current_user_email">( mail@dustams.com )</small>
                                            </h1>

                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="button" class="btn btn-icon btn-sm btn-light"><i
                                                        class="fa fa-share"></i>

                                                    <div class="ripple-wrapper"></div>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-sm btn-light"><i
                                                        class="fa fa-star-o"></i>

                                                    <div class="ripple-wrapper"></div>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-sm btn-light"><i
                                                        class="fa fa-trash"></i>

                                                    <div class="ripple-wrapper"></div>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Title -->

                                        <!-- Start Conv -->
                                        <ul class="conv" id="composerloadscript">

                                        </ul>
                                        <!-- End Conv -->

                                        <div class="write">
                                            <form class="write-messege">
                                                <div class="panel-customs-post-textarea">
                                                    <textarea rows="3" placeholder="Write something.."
                                                              class="form-control"></textarea>
                                                    <button id="save" type="button" class="btn btn-success ">Send
                                                        <div class="ripple-wrapper"></div>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
            <?php include('plugin/fotter.php'); ?>

            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
            <script src="assets/material/js/ripples.min.js"></script>
            <script src="assets/material/js/material.min.js"></script>
            <script src="assets/js/jquery.easing.1.3.js"></script>
            <script src="assets/js/jquery.sticky.js"></script>
            <script src="assets/js/wow.min.js"></script>
            <script src="assets/js/script.js"></script>
            <script src="assets/js/chat.js"></script>

    </body>
</html>