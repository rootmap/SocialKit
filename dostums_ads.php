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

        <script>

            //websites and apps start
            function checkboxon()
            {
                var add_apps = 'no';
                if (document.getElementById("webaddsyes").checked == true)
                {
                    add_apps = 'yes';
                }
                else if (document.getElementById("webaddsno").checked == true)
                {
                    add_apps = 'no';
                }
                else
                {
                    add_apps = 'no';
                }

                $.post("lib/dostums_ads_data.php", {'st': 6, 'src': add_apps}, function (data) {
                    $('#show_ads').hide('slow');
                    $("#adsplace").show('slow');
                    $("#adsplace").html(add_apps);
                    alert(data);
                });
            } //websites and apps end


            //social ads start
            function checksocialadds()
            {
                var webs = 'no';
                if (document.getElementById("socila_addsyes").checked == true)
                {
                    webs = 'yes';
                }
                else if (document.getElementById("socila_addsno").checked == true)
                {
                    webs = 'no';
                }
                else
                {
                    webs = 'no';
                }

                $.post("lib/dostums_ads_data.php", {'st': 7, 'show': webs}, function (data) {
                    $('#show_ads2').hide('slow');
                    $("#webadsplace").show('slow');
                    $("#webadsplace").html(webs);
                    alert(data);
                });
            } //social ads  end



            //preferences ads start
            function checkprefnsads()
            {
                var prefadd = 'no';
                if (document.getElementById("prefnsadsyes").checked == true)
                {
                    prefadd = 'yes';
                }
                else if (document.getElementById("prefnsadsno").checked == true)
                {
                    prefadd = 'no';
                }
                else
                {
                    prefadd = 'no';
                }

                $.post("lib/dostums_ads_data.php", {'st': 8, 'prfads': prefadd}, function (data) {
                    $('#show_ads3').hide('slow');
                    $("#prefplace").show('slow');
                    $("#prefplace").html(prefadd);
                    alert(data);
                });
            } //preferences ads  end




        </script>   


        <script>
            $(document).ready(function () {
                $('#show_ads').hide('slow');
                $('#show_ads2').hide('slow');
                $('#show_ads3').hide('slow');

                $('#basic_info2').click(function () {
                    $('#adsplace').hide('slow');
                    $('#webadsplace').hide('slow');
                    $('#prefplace').hide('slow');

                    $('#show_ads').show('slow');
                    $('#show_ads2').show('slow');
                    $('#show_ads3').show('slow');


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
                                    <h5><strong>Dostums Ads</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info2" type="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                        </button>
                                    </div>


                                    <div class="total_row">
                                        <div class="row form-group"> <!-- Ads based  start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="ads_based" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">

                                                            <label class="control-label" for="textinput"><strong>Ads based on my use of websites and apps</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <?php
                                                            $sqlads = $obj->FlyQuery("SELECT * FROM dostums_ads_settings");
                                                            if (!empty($sqlads)) {
                                                                ?>
                                                                <div class="col-md-12 " id="ads_based_panel">
                                                                    <div class="col-md-8"style="padding-left:10px;">Can you see online interest-based ads from Dostums?<br><br>
                                                                        Your status is based on your device setting and any choices you have made with the digital Advertising Alliance. 
                                                                    </div>
                                                                    <span id="show_ads">
                                                                        <div class="col-md-offset-4">    
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="add_apps" onclick="checkboxon()" id="webaddsyes" value="yes">yes
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="add_apps"  onclick="checkboxon()" id="webaddsno" value="no"> No
                                                                            </label>
                                                                        </div>
                                                                    </span>

                                                                    <span id="soundads">
                                                                        <div class="col-md-4 text-right" id="adsplace"><?php echo $sqlads[0]->online_ads; ?></div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- Ads based  end-->
<?php } ?>

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




                                        <div class="row form-group"> <!--Ads Social start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="ads_social" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">

                                                            <label class="control-label" for="textinput"><strong>Ads with my social actions</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <?php
                                                            $sqlsocialads = $obj->FlyQuery("SELECT * FROM dostums_ads_settings");
                                                            if (!empty($sqlsocialads)) {
                                                                ?>
                                                                <div class="col-md-12 " id="ads_social_panel">
                                                                    <div class="col-md-8"style="padding-left:10px;">Who can see your social action paired with ads</div>
                                                                    <span id="show_ads2">
                                                                        <div class="col-md-offset-4">    
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="webs" onclick="checksocialadds()" id="socila_addsyes" value="option1">yes
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="webs" onclick="checksocialadds()" id="socila_addsno" value="option2"> No
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                    <span id="webshowads">
                                                                        <div class="col-md-4 text-right" id="webadsplace"><?php echo $sqlsocialads[0]->social_ads; ?></div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Ads Social end-->
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




                                        <div class="row form-group"> <!--Ads preferences start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="ads_preferences" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">

                                                            <label class="control-label" for="textinput"><strong>Ads based on my preferences</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <?php
                                                            $sqlpreferads = $obj->FlyQuery("SELECT * FROM dostums_ads_settings");
                                                            if (!empty($sqlpreferads)) {
                                                                ?>
                                                                <div class="col-md-12 " id="ads_preferences_panel">
                                                                    <div class="col-md-8" href="#" style="padding-left:10px;">Manage the perferences we use to show you ads</div>
                                                                    <span id="show_ads3">
                                                                        <div class="col-md-offset-4">    
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="prefadd" onclick="checkprefnsads()" id="prefnsadsyes" value="yes">yes
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="prefadd" onclick="checkprefnsads()"  id="prefnsadsno" value="no"> No
                                                                            </label>
                                                                        </div>
                                                                    </span>    
                                                                    <span id="prefmanads">
                                                                        <div class="col-md-4 text-right" id="prefplace"><?php echo $sqlpreferads[0]->preferences_show_ads; ?></div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Ads preferences  end-->
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




                                            <!--
                                                                                <div class="row form-group"> Text massage start
                                                                                    <div class="col-md-12">
                                                                                        <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                                                            <div class="control-group">
                                                                                                <div class="col-md-3">
                                                                                                    <span class="glyphicon glyphicon-comment"></span>
                                                                                                    <label class="control-label" for="textinput"><strong>Text massage</strong></label>
                                                                                                </div>
                                                                                                <div class="col-md-9">
                                            
                                                                                                    <div class="col-md-12 " id="friend_requests_panel">
                                                                                                        <div class="col-md-8" href="#" style="padding-left:10px;">Text notifications are turned on</div>
                                            
                                                                                                        <div class="col-md-4">    
                                                                                                            <label class="radio-inline">
                                                                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">yes
                                                                                                            </label>
                                                                                                            <label class="radio-inline">
                                                                                                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
                                                                                                            </label>
                                                                                                        </div>
                                            
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>Text massage end-->



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

