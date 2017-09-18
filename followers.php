<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: all-friend_list.php?user_id=' . $_GET['user_id']);
        exit();
        //$new_user_id = $input_by;
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
                                        <a href="dostums_ads.php" class="list-group-item no-border"><i
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
                                    <h5><strong>Follower Settings</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info" type="button">
                                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </button>
                                    </div>
                                </div>
                                <!--Follower Settings start-->
                                <div class="ibox-content">
                                    <script>
                                        $('document').ready(function () {
                                            $('#follow_type').change(function () {
                                                var typefolllow = $(this).val();
                                                if (typefolllow == 1)
                                                {
                                                    $('#all_everyone').show('slow');
                                                }
                                                else
                                                {
                                                    $('#all_everyone').hide('slow');
                                                }
                                                //alert('hh');
                                            });
                                        });

                                    </script>
                                    <form class="">
                                        <fieldset>
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:150px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Who Can Follow Me</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-9" style="padding-left:18px;">
                                                                        Followers see your posts in News Feed. Friends follow your posts by default, 
                                                                        but you can also allow people who are not your friends to follow your posts. 
                                                                        Use this setting to choose who can follow you.
                                                                        Each time you post, you choose which audience you want to share with.<a href="#" style="color: #2C99CE;">Learn more.</a>
                                                                    </div>
                                                                    <div class="col-md-3">    


                                                                        <select class="form-control" id="follow_type" style="background-color:#5eb95e;margin-top:5px;">
                                                                            <option value="1">Everyone</option>
                                                                            <option value="2">Friends</option>

                                                                        </select>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a href="#" style="color:#2C99CE; border:2px; padding-left: 235px;"><u>Want to know what followers can see? View your public timeline.</u></a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div id="all_everyone">
                                                <div class="last"> <!--Follower Comments start-->

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="followers_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-3">
                                                                        <label class="control-label" for="textinput"><strong>Follower Comments</strong></label>
                                                                    </div>
                                                                    <div class="col-md-9">

                                                                        <div class="col-md-12 " id="friend_requests_panel">
                                                                            <div class="col-md-10"style="padding-left:14px;">Who can comment on your public posts? Friends</div>

                                                                            <div class="col-md-2">    
                                                                                <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--Follower Comments end-->

                                                    <div class="col-md-12" id="followers_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Follower Comments hidden start-->

                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">
                                                                <strong  style="padding-left:16px;">Follower Comments</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9" style="padding-left:34px;">
                                                            <div class="col-md-10" ><strong style="padding-left:18px;">Who can comment on your public posts?</strong></div>
                                                            <div class="col-md-2">    
                                                                <span class="text-right" style="position: absolute;" id="follow_cmnt_close"><i class="fa fa-close"></i></span>
                                                            </div>
                                                            <div class="col-md-12" style="padding-left:18px;">
                                                                <p>Choose who is allowed to comment on your posts.
                                                                    Remember that in addition to who you choose here,
                                                                    anyone tagged in a post and their friends may be able to comment too.</p>

                                                                <select class="form-control" id="select_city" style="background:#F5F5F5; width: 200px; margin-top:11px;">
                                                                    <option>Everyone</option>
                                                                    <option>Friend to Friend</option>
                                                                    <option>Friends</option>


                                                                </select>
                                                            </div>



                                                        </div>
                                                    </div><!--Follower Comments hidden end-->

                                                </div><!--Follower Comments  2end-->

                                                <style type="text/css">
                                                    #follow_cmnt_close,#followers_from{ cursor: pointer; }
                                                    #follow_cmnt_close:hover{ cursor: pointer; color: #09f; }
                                                </style>
                                                <script>
                                                    $('document').ready(function () {
                                                        $('#followers_from, #follow_cmnt_close').click(function () {
                                                            $('#followers_panel').toggle('slow');

                                                        });
                                                    });

                                                </script>
                                                <div class="total_row">
                                                    <div class="row form-group"> <!--Followers Notifications start-->
                                                        <div class="col-md-12">
                                                            <div class="col-md-12" id="follower_notifiation" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-3">
                                                                        <label class="control-label" for="textinput"><strong>Followers Notifications</strong></label>
                                                                    </div>
                                                                    <div class="col-md-9">

                                                                        <div class="col-md-12 " id="friend_requests_panel">
                                                                            <div class="col-md-10"style="padding-left:14px;">Get notifications From Everybody</div>

                                                                            <div class="col-md-2">    
                                                                                <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12" id="notifiaction_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Followers Notifications hidden start-->

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
                                                    </div><!--Followers Notifications hidden end-->

                                                </div><!--Followers Notifications end-->
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

                                                </script>




                                                <div class="row form-group"> <!--Comment Ranking start-->
                                                    <div class="col-md-12">
                                                        <div class="col-md-12" id="comment_ranking" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                            <div class="control-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="textinput"><strong>Comment Ranking</strong></label>
                                                                </div>
                                                                <div class="col-md-9">

                                                                    <div class="col-md-12 " id="friend_requests_panel">
                                                                        <div class="col-md-10"style="padding-left:10px;">Comment ranking is off</div>

                                                                        <div class="col-md-2">    
                                                                            <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--Comment Ranking end-->

                                                <div class="col-md-12" id="comment_ranking_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Comment Ranking hidden start-->

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

                                                </div><!--Comment Ranking hidden end-->






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

                                                </script>




                                                <div class="row form-group"> <!--Username start-->
                                                    <div class="col-md-12">
                                                        <div class="col-md-12" id="username_first" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                            <div class="control-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="textinput"><strong>Username</strong></label>
                                                                </div>
                                                                <div class="col-md-9">

                                                                    <div class="col-md-12 " id="friend_requests_panel">
                                                                        <div class="col-md-10" href="#" style="padding-left:10px;">http//www.facebook.com</div>

                                                                        <div class="col-md-2">    
                                                                            <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--Username end-->


                                                <div class="col-md-12" id="username_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Username hidden start-->

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

                                                </div><!--Username hidden end-->

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

                                                </script>





                                                <div class="row form-group"> <!--Twitter start-->
                                                    <div class="col-md-12">
                                                        <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                            <div class="control-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="textinput"><strong>Twitter</strong></label>
                                                                </div>
                                                                <div class="col-md-9">

                                                                    <div class="col-md-12 " id="friend_requests_panel">
                                                                        <div class="col-md-10" href="#" style="padding-left:10px;">Connect a Twitter account</div>

                                                                        <div class="col-md-2">    
                                                                            <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--Twitter end-->



                                                <div class="col-md-12" id="twitter_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Twitter hidden start-->

                                                    <div class="col-md-3">
                                                        <label class="control-label" for="textinput">
                                                            <strong  style="padding-left:15px;">Twitter</strong>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-9" >
                                                        <div class="col-md-11"style="padding-left:35px;">
                                                            <strong>
                                                                Have a Twitter account? Connect your Twitter account to reach your
                                                                Dostums and Twitter followers at the same time.</strong></div>
                                                        <div class="col-md-1">    
                                                            <span class="text-right" style="position: absolute;" id="twitter_close"><i class="fa fa-close"></i></span>
                                                        </div>
                                                        <div class="col-md-9"style="padding-left:35px;">
                                                            <button type="submit" class="btn btn-success">Save cheng</button>
                                                            <button type="submit" class="btn btn-danger">cancel</button>

                                                        </div>



                                                    </div>

                                                </div><!--Twitter hidden end-->

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

                                                </script>









                                                <div class="row form-group"> <!--Follow Plugin start-->
                                                    <div class="col-md-12">
                                                        <div class="col-md-12" id="follow_plugin" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                            <div class="control-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label" for="textinput"><strong>Follow Plugin</strong></label>
                                                                </div>
                                                                <div class="col-md-9">

                                                                    <div class="col-md-12 " id="friend_requests_panel">
                                                                        <div class="col-md-10" href="#" style="padding-left:10px;">Add a follow button to your website by copying the code below. Visit our docs for<a style="color:#30AAE1;"> more info and options.</a></div>

                                                                        <div class="col-md-2">    
                                                                            <a href="#" style="color: #2C99CE;"> Edit</a><br>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Follow Plugin end-->

                                            <div class="col-md-12" id="follow_plugin_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Follow Plugin  hidden start-->

                                                <div class="col-md-3">
                                                    <label class="control-label" for="textinput">
                                                        <strong  style="padding-left:15px;">Follow Plugin</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-9" >
                                                    <div class="col-md-11"style="padding-left:31px;">

                                                        Add a follow button to your website by copying the code below. Visit our docs for<a href="#" style="color:#30AAE1;;"> more info and options.</a>
                                                    </div>
                                                    <div class="col-md-1">    
                                                        <span class="text-right" style="position: absolute;" id="follow_plugin_close"><i class="fa fa-close"></i></span>
                                                    </div>
                                                    <div class="col-md-9" style="padding-left:30px;">
                                                        <textarea type="text"style=" height:100px; width:400px; margin-top:6px;" ></textarea>

                                                    </div>



                                                </div>

                                            </div><!--Follow Plugin  hidden end-->

                                            <style>
                                                #follow_plugin,#follow_plugin_close{cursor:pointer;}
                                                #follow_plugin_close:hover{cursor:pointer;color:#09f;}
                                            </style>

                                            <script>
                                                $('document').ready(function () {
                                                    $('#follow_plugin, #follow_plugin_close').click(function () {
                                                        $('#follow_plugin_panel').toggle('slow');

                                                    });
                                                });

                                            </script>


                                            </div> 
                                            </div>
                                            </div>
                                            </div>
                                        </fieldset>
                                    </form>

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
