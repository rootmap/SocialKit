<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        $new_user_id = $_GET['user_id'];
    }
} else {
    $new_user_id = $input_by;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Home </title>
        <?php include('plugin/header_script.php'); ?>

    <body>

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
        <script>
            //on sound start
            function checkboxon()
            {
                var sound = 'no';
                if (document.getElementById("get_notification_sound").checked == true)
                {
                    sound = 'yes';
                }
                else if (document.getElementById("dont_get_notification_sound").checked == true)
                {
                    sound = 'no';
                }
                else
                {
                    sound = 'no';
                }



                $.post("lib/notifications_data.php", {'st': 8, 'src': sound}, function (data) {
                    $('#all_notification').hide('slow');
                    $("#soundplace").show('slow');
                    $("#soundplace").html(sound);
                    alert(data);
                });
            } //on sound end




            //email start
            function checkboxemail()
            {
                var emailchk = 'no';
                if (document.getElementById("email_notificatyes").checked == true)
                {
                    emailchk = 'yes';
                }
                else if (document.getElementById("email_notificatno").checked == true)
                {
                    emailchk = 'no';
                }
                else
                {
                    emailchk = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 9, 'par': emailchk}, function (data) {
                    $('#all_notification1').hide('slow');
                    $('#emailplace').show('slow');
                    $('#emailplace').html(emailchk);
                    alert(data);
                });
            }//email end


            //mobile start
            function checkboxphn()

            {
                var chkphn = 'no';
                if (document.getElementById("notenbryes").checked == true)
                {
                    chkphn = 'yes';
                }
                else if (document.getElementById("notenbrno").checked == true)
                {
                    chkphn = 'no';
                }
                else
                {
                    chkphn = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 10, 'phn': chkphn}, function (data) {
                    $('#all_notification2').hide('slow');
                    $('#mobileplace').show('slow');
                    $('#mobileplace').html(chkphn);
                    alert(data);

                });
            } //mobile end



            //text massage start
            function checkboxtextsms()
            {
                var sms = 'no';
                if (document.getElementById("textsmsyes").checked == true)
                {
                    sms = 'yes';
                }
                else if (document.getElementById("textsmsno").checked == true)
                {
                    sms = 'no';
                }
                else
                {
                    sms = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 11, 'msg': sms}, function (data) {
                    $('#all_notification1s').hide('slow');
                    $('#teleplace').show('slow');
                    $('#teleplace').html(sms);
                    alert(data);
                });
            }   //text massage end

        </script>

        <script>
            $(document).ready(function () {
                $('#all_notification').hide('slow');
                $('#all_notification1').hide('slow');
                $('#all_notification2').hide('slow');
                $('#all_notification1s').hide('slow');
                
                $('#basic_info').click(function () {
                    
                    $("#soundplace").hide('slow');
                    $("#emailplace").hide('slow');
                    $("#mobileplace").hide('slow');
                    $("#teleplace").hide('slow');
                    
                    $('#all_notification').show('slow');
                    $('#all_notification1').show('slow');
                    $('#all_notification2').show('slow');
                    $('#all_notification1s').show('slow');

                });
            });

        </script>


        <div class="main-container page-container section-padd">
            <div class="mailbox-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12"><h4 class="pull-left page-title"><i class="mdi-action-settings"></i> settings
                                <span class="sub-text"> Manage My Profile  </span></h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="#">Profile</a></li>
                                <li><a href="setting.php">Setting</a></li>
                                <li class="active">Privacy</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row" style="overflow: hidden;">
                        <div class="col-lg-3 col-md-3 ">

                            <div class="panel panel-default">
                                <div class="panel-body p-0">
                                    <div class="list-group mail-list">
                                        <a href="setting.php" class="list-group-item no-border active"><i
                                                class="mdi-action-settings-applications"></i>General </a>
                                        <a href="security_settings.php" class="list-group-item no-border"><i
                                                class="mdi-hardware-security"></i>Security </a>
                                        <hr class="lihr">
                                        <a href="privacy.php" class="list-group-item no-border active"><i
                                                class="mdi-action-settings-applications"></i>Privacy </a>
                                        <a href="blocking.php" class="list-group-item no-border"><i class="mdi-content-block"></i>Blocking
                                        </a> <a href="notifications.php" class="list-group-item no-border"><i
                                                class="mdi-social-notifications"></i>Notifications </a>
                                        <a href="mobile.php" class="list-group-item no-border"><i
                                                class="mdi-social-notifications"></i>Mobile </a>
                                        <a href="followers.php"     class="list-group-item no-border"><i
                                                class="mdi-social-people"></i>Followers
                                            <b>(354)</b></a>
                                        <hr class="lihr">
                                        <a href="dostums_ads.php"     class="list-group-item no-border"><i
                                                class="mdi-action-assignment"></i>Ads
                                            <b>(354)</b></a>

                                        <a href="#"     class="list-group-item no-border"><i
                                                class="mdi-action-payment"></i>Payments
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9">

                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5><strong>Notifications Settings</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info" type="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                        </button>
                                    </div>


                                    <div class="total_row">
                                        <div class="row form-group"> <!-- Notifications start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="follower_notifiation" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <img src="./images/dostums-logo_favicon.png">
                                                            <label class="control-label" for="textinput"><strong>Sound Setting</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <?php $sqlnotify = $obj->FlyQuery("SELECT * FROM dostums_notification_settings");
                                                            if(!empty($sqlnotify)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8"style="padding-left:10px;">All notifications,all sounds on</div>
                                                                <span id="all_notification">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="sound" onclick="checkboxon()" id="get_notification_sound" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="sound" onclick="checkboxon()"  id="dont_get_notification_sound" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="soundnordis">
                                                                    <div class="col-md-4 text-right" id="soundplace"><?php echo $sqlnotify[0]->sounds_on; ?></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Notifications end-->
                                                            <?php } ?>


                                        <script type="text/javascript">
//                                            $('#follower_notifiation').click(function (e) {
//                                                var notification = '';
//                                                if (document.getElementById('get_notification').checked)
//                                                {
//                                                    var notification = $('input[name="y"]:checked').val();
//                                                }
//                                                else if (document.getElementById('dont_get_notification').checked)
//                                                {
//                                                    var notification = $('input[name="n"]:checked').val();
//                                                }
//
//                                                else
//                                                {
//                                                    var notification = $($notification).val(no);
//
//                                                }
//                                                $.post("./lib/dostums_ads_data.php", {'st': 1, 'notific': $notification}, function (data) {
//                                                    console.log(notification);
//                                                });
//
//
//                                            });

                                        </script>

                                        <!--
                                                                            <div class="col-md-12" id="notifiaction_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> Followers Notifications hidden start
                                        
                                                                                <div class="col-md-3">
                                                                                    <label class="control-label" for="textinput">
                                                                                        <strong  style="padding-left:15px;">Follower Notifications</strong>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-9" style="padding-left:34px;">
                                                                                    <div class="col-md-10" ><strong style="padding-left:18px;">Who can get notifications</strong></div>
                                                                                    <div class="col-md-2">    
                                                                                        <span class="text-right" style="position: absolute;" id="follow_notification_close"><i class="fa fa-close"></i></span>
                                                                                    </div>
                                                                                    <div class="col-md-12" style="padding-left:18px;">
                                                                                        <p>You can get notifications when people who aren't your friends start following you and share,
                                                                                            like or comment on your public posts. Turn these notifications on for</p>
                                        
                                                                                        <select class="form-control" id="select_city" style="background:#F5F5F5; width: 200px; margin-top:11px;">
                                                                                            <option>Everyone</option>
                                                                                            <option>Friend to Friend</option>
                                                                                            <option>Nobody</option>
                                        
                                        
                                                                                        </select>
                                                                                    </div>
                                        
                                        
                                        
                                                                                </div>
                                                                            </div>Followers Notifications hidden end
                                        
                                                                        </div>Followers Notifications end
                                                                        <style>
                                                                            #follow_notification_close,#follower_notifiation{cursor: pointer;}
                                                                            #follow_notification_close:hover{cursor: pointer; color:#09f;}
                                                                        </style>
                                        
                                                                        <script>
                                                                            $('document').ready(function () {
                                                                                $('#follower_notifiation, #follow_notification_close').click(function () {
                                                                                    $('#notifiaction_panel').toggle('slow');
                                        
                                                                                });
                                                                            });
                                        
                                                                        </script>-->




                                        <div class="row form-group"> <!--Most notifications-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="comment_ranking" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                            <label class="control-label" for="textinput"><strong>Email</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqlnotifyemail = $obj->FlyQuery("SELECT * FROM dostums_notification_settings");
                                                            if(!empty($sqlnotifyemail)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8"style="padding-left:10px;">Most notifications</div>
                                                                <span id="all_notification1">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="emailchk" onclick="checkboxemail()" id="email_notificatyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="emailchk" onclick="checkboxemail()" id="email_notificatno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="emailsms">
                                                                    <div class="col-md-4 text-right" id="emailplace"><?php echo $sqlnotifyemail[0]->email; ?></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Most notifications end-->
                                                            <?php } ?>

                                        <!--                                <div class="col-md-12" id="comment_ranking_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> Comment Ranking hidden start
                                        
                                                                            <div class="col-md-3">
                                                                                <label class="control-label" for="textinput">
                                                                                    <strong  style="padding-left:15px;">Comment Ranking</strong>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9" style="padding-left:34px;">
                                                                                <div class="col-md-10" ><strong style="padding-left:18px;">Who can get notifications</strong></div>
                                                                                <div class="col-md-2">    
                                                                                    <span class="text-right" style="position: absolute;" id="comment_ranking_close"><i class="fa fa-close"></i></span>
                                                                                </div>
                                                                                <div class="col-md-12" style="padding-left:18px;">
                                                                                    <p>When comment ranking is turned on, you'll see the most relevant comments on your public posts first.</p>
                                        
                                                                                    <select class="form-control" id="select_city" style="background:#F5F5F5; width: 200px; margin-top:11px;">
                                                                                        <option>on</option>
                                                                                        <option>off</option>
                                        
                                        
                                        
                                                                                    </select>
                                                                                </div>
                                        
                                        
                                        
                                                                            </div>
                                        
                                                                        </div>Comment Ranking hidden end
                                        
                                        
                                        
                                        
                                        
                                        
                                                                        <style>
                                                                            #comment_ranking,#comment_ranking_close{cursor:pointer;}
                                                                            #comment_ranking_close:hover{cursor:pointer;color:#09f;}
                                                                        </style>
                                        
                                                                        <script>
                                                                            $('document').ready(function () {
                                                                                $('#comment_ranking, #comment_ranking_close').click(function () {
                                                                                    $('#comment_ranking_panel').toggle('slow');
                                        
                                                                                });
                                                                            });
                                        
                                                                        </script>-->




                                        <div class="row form-group"> <!--Mobile start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="username_first" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-phone"></span>
                                                            <label class="control-label" for="textinput"><strong>Mobile</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqlnotifymobile = $obj->FlyQuery("SELECT * FROM dostums_notification_settings");
                                                            if(!empty($sqlnotifymobile)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" href="#" style="padding-left:10px;">Some notifications</div>
                                                                <span id="all_notification2">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="chkphn" onclick="checkboxphn()" id="notenbryes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="chkphn" onclick="checkboxphn()" id="notenbrno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="mobiletele">
                                                                    <div class="col-md-4 text-right" id="mobileplace"><?php echo $sqlnotifymobile[0]->mobile; ?></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Mobile end-->
                                                            <?php } ?>

                                        <!--
                                                                        <div class="col-md-12" id="username_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> Username hidden start
                                        
                                                                            <div class="col-md-3">
                                                                                <label class="control-label" for="textinput">
                                                                                    <strong  style="padding-left:15px;">Username</strong>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9" style="padding-left:34px;">
                                                                                <div class="col-md-10" ><strong style="padding-left:18px;">Your public username is the same as your Timeline address:</strong></div>
                                                                                <div class="col-md-2">    
                                                                                    <span class="text-right" style="position: absolute;" id="username_close"><i class="fa fa-close"></i></span>
                                                                                </div>
                                                                                <div class="col-md-9" style="padding-left:18px;">
                                                                                    <p>Note: Your username can only be changed once and should include your authentic name.[?] </p>
                                        
                                                                                    <label for="exampleInputusername">User name</label>
                                                                                    <input type="email" class="form-control" id="exampleInputusername" placeholder="username">
                                        
                                                                                </div>
                                                                                <div class="col-md-9" style="margin-top:5px;">
                                                                                    <strong>To save these settings, please enter your Dostums password.</strong>
                                                                                    <label for="exampleInputusername">Password</label>
                                                                                    <input type="email" class="form-control" id="exampleInputusername" placeholder="Password">
                                                                                </div>
                                                                                <div class="col-md-9"style="padding-left:16px;">
                                                                                    <button type="submit" class="btn btn-success">Save cheng</button>
                                                                                    <button type="submit" class="btn btn-danger">cancel</button>
                                                                                </div>
                                        
                                                                            </div>
                                        
                                                                        </div>Username hidden end
                                        
                                                                        <style>
                                                                            #username_first,#username_close{cursor:pointer;}
                                                                            #username_close:hover{cursor:pointer;color:#09f;}
                                                                        </style>
                                        
                                                                        <script>
                                                                            $('document').ready(function () {
                                                                                $('#username_first, #username_close').click(function () {
                                                                                    $('#username_panel').toggle('slow');
                                        
                                                                                });
                                                                            });
                                        
                                                                        </script>-->
                                        <div class="row form-group"> <!--Text massage start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-comment"></span>
                                                            <label class="control-label" for="textinput"><strong>Text massage</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqlnotifytextsms = $obj->FlyQuery("SELECT * FROM dostums_notification_settings");
                                                            if(!empty($sqlnotifytextsms)){
                                                            ?>

                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" href="#" style="padding-left:10px;">Text notifications are turned on</div>
                                                                <span id="all_notification1s">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="sms" onclick="checkboxtextsms()" id="textsmsyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="sms" onclick="checkboxtextsms()" id="textsmsno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="telesms">
                                                                    <div class="col-md-4 text-right" id="teleplace"><?php echo $sqlnotifytextsms[0]->text_massage; ?></div>
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Text massage end-->
                                                            <?php } ?>



                                        <!--                                <div class="col-md-12" id="twitter_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> Twitter hidden start
                                        
                                                                            <div class="col-md-3">
                                                                                <label class="control-label" for="textinput">
                                                                                    <strong  style="padding-left:15px;">Twitter</strong>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-9" >
                                                                                <div class="col-md-11">
                                                                                    <strong>
                                                                                        Have a Twitter account? Connect your Twitter account to reach your
                                                                                        Dostums and Twitter followers at the same time.</strong></div>
                                                                                <div class="col-md-1">    
                                                                                    <span class="text-right" style="position: absolute;" id="twitter_close"><i class="fa fa-close"></i></span>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <button type="submit" class="btn btn-success">Save cheng</button>
                                                                                    <button type="submit" class="btn btn-danger">cancel</button>
                                        
                                                                                </div>
                                        
                                        
                                        
                                                                            </div>
                                        
                                                                        </div>Twitter hidden end
                                        
                                                                        <style>
                                                                            #twitter_use,#twitter_close{cursor:pointer;}
                                                                            #twitter_close:hover{cursor:pointer;color:#09f;}
                                                                        </style>
                                        
                                                                        <script>
                                                                            $('document').ready(function () {
                                                                                $('#twitter_use, #twitter_close').click(function () {
                                                                                    $('#twitter_panel').toggle('slow');
                                        
                                                                                });
                                                                            });
                                        
                                                                        </script>-->

                                    </div> 
                                </div>
                            </div>
                        </div>
                        </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>








        <?php include('plugin/fotter.php') ?>


        <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
        <script src="assets/material/js/ripples.min.js"></script>
        <script src="assets/material/js/material.min.js"></script>


        <script src="assets/js/jquery.scrollto.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/script.js"></script>

        <script src="assets/js/chat.js"></script>

        <script src="lib/setting.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>

