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
    </head>
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
        <?php
        $sqlprivacypage = $obj->FlyQuery("SELECT 
dpo.name as post_permission_name,
dpp.name as friend_request_permission_name,
dpeo.name as email_lookup_name,
dppo.name as phone_number_show,
a.search_engine_permission
FROM 
dostums_user_privacy as a
LEFT JOIN dostums_privacy_option as dpo on dpo.id=a.post_permission
LEFT JOIN dostums_privacy_policy as dpp on dpp.id=a.friend_request_permission
LEFT JOIN dostums_privacy_email_option  as dpeo on dpeo.id=a.email_lookup 
LEFT JOIN dostums_privacy_phone_option as dppo on dppo.id=a.phone_number

WHERE a.user_id='" . $input_by . "'");
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
                                    <h5><strong>Privacy Settings and Tools</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info" type="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </button>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <form class="">
                                        <fieldset>
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 10px; height:auto;">

                                                        <div class="col-md-3">
                                                            <strong>Posts</strong>
                                                        </div>
                                                        <div class="col-md-9" style="margin-bottom: 10px;">

                                                            <div class="col-md-7 post_fut"> <strong > Who can see your future posts?</strong></div>
                                                            <div class="col-md-4" id="frndck"><?php echo $sqlprivacypage[0]->post_permission_name; ?></div>
                                                            
                                                            <button type="button" class="col-md-1 post_fut" style="color: #2C99CE; background: none; border: none;">Edit</button><br>


                                                        </div>

                                                        <div class="col-md-9 col-md-offset-3" id="right_frnd" style="margin-top:11px;">
                                                            <div class="col-md-12">
                                                                You can manage the privacy of things you share by using the audience selector <a href="#" style="color: #2C99CE;">right where you post.</a>
                                                                This control remembers your selection so future posts will be shared with the same audience unless you change it.

                                                            </div>    
                                                            <div class="col-md-5">
                                                                <?php
                                                                $sqlprivacyoption = $obj->FlyQuery("Select * From dostums_privacy_option");
                                                                if (!empty($sqlprivacyoption)) {
                                                                    ?>

                                                                    <select  class="form-control" id="privacy_setting" style=" background-color:#FFFFFF; margin:10px 0px;">
                                                                        <option value="0">Who should see this?</option>
                                                                        <?php foreach ($sqlprivacyoption as $sqldpp):
                                                                            ?>

                                                                            <option value="<?php echo $sqldpp->id; ?>"><?php echo $sqldpp->name; ?></option>

                                                                        <?php endforeach; ?>
                                                                    </select>

                                                                <?php } ?>

                                                            </div>

                                                            <!--<div class="_tpp" style="border:1px solid #ccc; margin-top:10px 0;"></div>-->
                                                        </div>

                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#privacy_setting").change(function () {
                                                                    // alert("working");
                                                                    var pric = $(this).val();
                                                                    var getvaluetext = $("#privacy_setting option[value=" + pric + "]").html();
                                                                    $("#frndck").html(getvaluetext);
                                                                    $.post("lib/privacy.php", {'st': 1, 'pric': pric}, function (data) {

                                                                        alert(data);

                                                                    });
                                                                });
                                                            });

                                                        </script>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#right_frnd').toggle('hide');
                                                                $('.post_fut').click(function () {
                                                                    $('#right_frnd').toggle('show');

                                                                    var getboxat = $('button.post_fut').html();
                                                                    if (getboxat == "Close")
                                                                    {
                                                                        $('button.post_fut').html("Edit");
                                                                    }
                                                                    else if (getboxat == "Edit")
                                                                    {
                                                                        $('button.post_fut').html("Close");
                                                                    }
                                                                });
                                                            });

                                                        </script>

                                                        <div class="col-md-offset-3 col-md-9" style="margin-bottom: 10px;">
                                                            <a class="col-md-7" href="#" style="margin-bottom: 10px;">Review all your posts and things your's tagged in</a>
                                                            <a class="col-md-5" style="color:#2C99CE;" href="#">Use Activity log</a>
                                                            <div class="col-md-12" id="limit_post"><strong>Limit the audience for posts you've shared with friends of friends or Public?  </strong></div>
                                                            <div class="col-md-12" id="see_post">
                                                                <span class="glyphicon glyphicon-alert text-warning"></span> 
                                                                If you use this tool, content on your timeline you've shared with friends of friends or Public will change to Friends. 
                                                                Remember: people who are tagged and their friends may see those posts as well.
                                                                You also have the option to individually change the audience of your posts. 
                                                                Just go to the post you want to change and choose a different audience.
                                                                <div class="clearfix"></div>
                                                                <a style="color:#2C99CE;" href="#"> Learn about changing old posts</a><br>
                                                                <a href="#"> <button>Limit Old Posts</button></a>
                                                            </div>

                                                        </div>


                                                    </div>




                                                </div>





                                            </div>

                                            <script>
                                                $(document).ready(function () {
                                                    $('#post_frnd,#close_option').click(function () {
                                                        $('#right_frnd').toggle('show');

                                                    });
                                                });

                                            </script>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#see_post').toggle('hide');
                                                    $('#limit_post').click(function () {
                                                        $('#see_post').toggle('show');

                                                    });
                                                });

                                            </script>
                                            <!--Friend Requests start-->
                                            <div class="row form-group">
                                                <div class=" col-md-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 10px; height:auto;">

                                                        <div class="col-md-3">
                                                            <strong>Friend Requests</strong>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-7 friend_requests_panel"><strong>Who can send you friend requests?</strong></div>
                                                            <div class="col-md-4 friend_requests_panel" id="frplace"><?php echo $sqlprivacypage[0]->friend_request_permission_name; ?></div>
                                                            <button type="button" class="col-md-1 friend_requests_panel" style="color: #2C99CE; background:none; border: none;">Edit</button>  





                                                            <!--Friend Requests start hidden-->


                                                            <div class="col-md-4" id="friend_requests_panel2" style="margin-top:8px; display: none;" >
                                                                <?php
                                                                $sqlprivacy = $obj->FlyQuery("Select * From dostums_privacy_policy");
                                                                if (!empty($sqlprivacy)) {
                                                                    ?>
                                                                    <select class="form-control" id="frnd_request" style=" background-color:#FFFFFF; margin:10px 0px;">
                                                                        <option value="0">Select option </option>
                                                                        <?php foreach ($sqlprivacy as $dostpp): ?>

                                                                            <option value="<?php echo $dostpp->id; ?>"><?php echo $dostpp->name; ?></option>

                                                                        <?php endforeach; ?>
                                                                    </select>

                                                                <?php } ?>
                                                            </div>


                                                        </div>

                                                        <!--Friend Requests hidden end-->


                                                    </div>

                                                </div>
                                            </div>

                                            <script>
                                                $(document).ready(function () {
                                                    $("#frnd_request").change(function () {
                                                        var frnd = $(this).val();
                                                        var getvaluetext = $("#frnd_request option[value=" + frnd + "]").html();
                                                        $("#frplace").html(getvaluetext);
                                                        $.post("lib/privacy.php", {'st': 2, 'frnd': frnd}, function (data) {
                                                            alert(data);
                                                        });
                                                    });

                                                });
                                            </script>

                                            <script>
                                                $(document).ready(function () {
                                                    //$('#friend_requests_panel2').toggle('hide');
                                                    $('.friend_requests_panel').click(function () {
                                                        $('#friend_requests_panel2').toggle('show');
                                                        var reqcl = $("button.friend_requests_panel").html();
                                                        if (reqcl == "Edit")
                                                        {
                                                            $("button.friend_requests_panel").html("Close");
                                                        }
                                                        else if (reqcl == "Close")
                                                        {
                                                            $("button.friend_requests_panel").html("Edit");
                                                        }
                                                    });
                                                });

                                            </script>
                                            <!--Friend Requests end-->


                                            <!--Contact Info start -->
                                            <div class="row form-group">
                                                <div class=" col-md-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 10px; height:auto;">

                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Contact Info</strong></label>
                                                        </div>


                                                        <div class="col-md-9">
                                                            <div class="col-md-7 contact_info_panel"><strong>Who can look you up using the email address you provided?</strong></div>
                                                            <div class="col-md-4 contact_info_panel"><?php echo $sqlprivacypage[0]->email_lookup_name; ?></div>
                                                            <button type="button" class="col-md-1 contact_info_panel" style="color: #2C99CE; background:none; border: none;">Edit</button>  
                                                        </div>

                                                        <!--Contact Info start hidden-->


                                                        <div class="col-md-9 col-md-offset-3" id="contact_info_panel2" style="display: none;" >
                                                            <?php
                                                            $sqlprivacyemail = $obj->FlyQuery("Select * From dostums_privacy_email_option");
                                                            if (!empty($sqlprivacyemail)) {
                                                                ?>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" id="email_info" style=" background-color:#FFFFFF; margin:10px 0px;">
                                                                        <option value="0">Select option</option>
                                                                        <?php foreach ($sqlprivacyemail as $shearemail): ?>
                                                                            <option value="<?php echo $shearemail->id; ?>"><?php echo $shearemail->name; ?></option>

                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            <?php } ?>
                                                        </div>




                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#contact_info_panel2').hide('slow');
                                                                $('.contact_info_panel').click(function () {
                                                                    $('#contact_info_panel2').toggle('show');
                                                                    var reqcl = $("button.contact_info_panel").html();
                                                                    if (reqcl == "Edit")
                                                                    {
                                                                        $("button.contact_info_panel").html("Close");
                                                                    }
                                                                    else if (reqcl == "Close")
                                                                    {
                                                                        $("button.contact_info_panel").html("Edit");
                                                                    }

                                                                });
                                                            });

                                                        </script>


                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#email_info").change(function () {
                                                                    var email = $(this).val();
                                                                    var getvalutext = $("#email_info option[value=" + email + "]").html();
                                                                    $("#frndemail").html(getvalutext);
                                                                    $.post("lib/privacy.php", {'st': 3, 'email': email}, function (data) {
                                                                        alert(data);
                                                                    });
                                                                });

                                                            });
                                                        </script>


                                                        <!--Contact Info hidden end-->

                                                        <!--Contact Info phone start-->

                                                        <div class="col-md-9 col-md-offset-3" style="margin-top: 10px;">
                                                            <div class="col-md-7 contact_info_phone"><strong>Who can look you up using the phone number you provided? </strong></div>
                                                            <div class="col-md-4 contact_info_phone" id="mobile"><?php echo $sqlprivacypage[0]->phone_number_show; ?></div>
                                                            <button type="button" class="col-md-1 contact_info_phone" style="color: #2C99CE; background:none; border: none;">Edit</button>  
                                                        </div>

                                                        <!--Contact Info 2 start hidden-->

                                                        <div class="col-md-9 col-md-offset-3" id="contact_info_phone_panel" style="display: none; margin-top:8px;" >
                                                            <?php
                                                            $sqlprivacyphone = $obj->FlyQuery("Select * From dostums_privacy_phone_option");
                                                            if (!empty($sqlprivacyphone)) {
                                                                ?>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" id="phone_number"  style="background-color:#FFFFFF; margin:10px 0px;">
                                                                        <option value="0">Select option</option>
                                                                        <?php foreach ($sqlprivacyphone as $number): ?>
                                                                            <option value="<?php echo $number->id; ?>"><?php echo $number->name; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            <?php } ?>

                                                        </div>

                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#contact_info_phone_panel').hide('slow');
                                                                $('.contact_info_phone').click(function () {
                                                                    $('#contact_info_phone_panel').toggle('show');
                                                                    var reqcl = $("button.contact_info_phone").html();
                                                                    if (reqcl == "Edit")
                                                                    {
                                                                        $("button.contact_info_phone").html("Close");
                                                                    }
                                                                    else if (reqcl == "Close")
                                                                    {
                                                                        $("button.contact_info_phone").html("Edit");
                                                                    }
                                                                });
                                                            });

                                                        </script>




                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#phone_number").change(function () {
                                                                    var phn = $(this).val();
                                                                    var frndphn = $("#phone_number option[value=" + phn + "]").html();
                                                                    $("#mobile").html(frndphn);
                                                                    $.post("lib/privacy.php", {'st': 4, 'phn': phn}, function (data) {
                                                                        alert(data);
                                                                    });
                                                                });

                                                            });
                                                        </script>

                                                        <!--Contact Info 2 hidden end-->
                                                        <!--Contact Info phone end-->





                                                        <!--  Contact Info last start-->
                                                        <div class="col-md-9 col-md-offset-3" style="margin-top: 10px;">
                                                            <div class="col-md-7 contact_last_panel"><strong> Do you want search engines outside of Dostums to link to your profile?</strong>
                                                            </div>
                                                            <div class="col-md-4 contact_last_panel" id="check"><?php echo $sqlprivacypage[0]->search_engine_permission; ?></div>
                                                            <button type="button" class="col-md-1 contact_last_panel" style="color: #2C99CE; background:none; border: none;">Edit</button>  
                                                        </div>
                                                        <!--  Contact Info last 2 hidden start-->

                                                        <div class="col-md-9 col-md-offset-3" id="contact_last_part3" style="margin-top: 8px;">

                                                      

                                                             

                                                                    
                                                            <div class="col-md-12">
                                                                            <div class="form-group" style=" background:#fff; padding: 10px 0px;">

                                                                                <ul style="margin-top: 10px;">
                                                                                    <li>When this setting is on, search engines may link to your profile in their results.</li>
                                                                                    <li>When this setting is off, search engines will stop linking to your profile, but this may take some time. 
                                                                                        Your profile can still be found on Facebook if people search for your name.</li>
                                                                                </ul>

                                                                            </div>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    <input onclick="checkboxon()" type="checkbox" id="search"> Allow search engines outside of Dostums to link to your profile
                                                                                </label>
                                                                            </div>

                                                                        </div>


                                                                  
                                                               

                                                            





                                                            <!--  Contact Info last 2 hidden end-->




                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('#contact_last_part3').toggle('hide');
                                                                    $('.contact_last_panel').click(function () {
                                                                        $('#contact_last_part3').toggle('show');
                                                                        var reqcl = $("button.contact_last_panel").html();
                                                                        if (reqcl == "Edit")
                                                                        {
                                                                            $("button.contact_last_panel").html("Close");
                                                                        }
                                                                        else if (reqcl == "Close")
                                                                        {
                                                                            $("button.contact_last_panel").html("Edit");
                                                                        }
                                                                    });
                                                                });

                                                            </script>

                                                            <script>
                                                                function checkboxon()
                                                                {
                                                                    if (document.getElementById("search").checked == true)
                                                                    {
                                                                        $.post("lib/privacy.php", {'st': 5, 'src': 'on'}, function (data) {
                                                                            //alert(data);
                                                                            $("#check").html('on');
                                                                        });
                                                                    }
                                                                    else
                                                                    {
                                                                        $.post("lib/privacy.php", {'st': 5, 'src': 'off'}, function (data) {
                                                                            //alert(data);
                                                                            $("#check").html('off');
                                                                        });
                                                                    }


                                                                }

                                                            </script>


                                                        </div>
                                                        <!--                                                            </div>-->

                                                    </div>
                                                </div>
                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>                                        












                        <?php include('plugin/fotter.php') ?>

                        <script src="assets/js/bootstrap.min.js"></script> 
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

                        </body>
                        </html>
