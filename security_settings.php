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
        <script type="text/javascript">
            function TrstConAdd(user_id, rowtcid)
            {
                $.post('lib/status.php', {'st': 30, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#trst_con_lst_' + rowtcid).hide('slow');
                    }

                });
            }
            function TrstConRemove(user_id, rowtcrid)
            {
                $.post('lib/status.php', {'st': 30, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#trst_con_lst_' + rowtcrid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

            function TrstConRemoveAll(input_by)
            {
                $.post('lib/status.php', {'st': 31, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 0)
                    {
                        alert('You Have Successfully Deleted All Trusted Contacts!!!')
                        location.reload();
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }
            
            
            function LegConAdd(user_id, rowtcid)
            {
                $.post('lib/status.php', {'st': 32, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#leg_con_lst_' + rowtcid).hide('slow');
                    }

                });
            }
            function LegConRemove(user_id, rowtcrid)
            {
                $.post('lib/status.php', {'st': 32, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#leg_con_lst_' + rowtcrid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

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
                    <div class="row">
                        <div class="col-lg-3 col-md-3 ">

                            <div class="panel panel-default">
                                <div class="panel-body p-0">
                                    <div class="list-group mail-list">
                                        <a href="setting.php" class="list-group-item no-border"><i
                                                class="mdi-action-settings-applications"></i>General </a>
                                        <a href="security_settings.php" class="list-group-item no-border active"><i
                                                class="mdi-hardware-security"></i>Security </a>
                                        <hr class="lihr">
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
                                    <h5>Security Settings<small>You won't be able to change your name within the next 60 days</small></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info" type="button">
                                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </button>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <form class="">
                                        <fieldset>

                                            <script type="text/javascript">

                                                $(document).ready(function () {

                                                    load_notification = {'st': 1};
                                                    $.post('lib/setting.php', load_notification, function (data) {
                                                        if (data != 0)
                                                        {
                                                            var datacl = jQuery.parseJSON(data);
                                                            var firstname = datacl[0].first_name;
                                                            var last_name = datacl[0].last_name;
                                                            var email = datacl[0].email;
                                                            var dob = datacl[0].dob;
                                                            var occupation = datacl[0].occupation;
                                                            var company = datacl[0].company;
                                                            //var country_id=datacl[0].country_id;
                                                            var city_id = datacl[0].city_id;
                                                            var website_url = datacl[0].website_url;
                                                            $('#first_name').val(firstname);
                                                            $('#last_name').val(last_name);
                                                            $('#occupation').val(occupation);
                                                            $('#company').val(company);
                                                            //$('#country_id').val(country_id).selected;
                                                            $('#city_id').val(city_id);
                                                            $('#website_url').val(website_url);
                                                            $('#basic_info_edit').css("display", "none");
                                                            //console.log(city_id);
                                                        }
                                                        else
                                                        {
                                                            alert("Something Went Wrong Please retry Again");
                                                        }
                                                    });
                                                });</script>

                                            <div class="row form-group">
                                                <div class="col-sm-12">

                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Login Alerts</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="login_alert" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">
                                                                    Get an alert when anyone logs into your account from a new device or browser

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Notifications part start-->
                                            <div class="row form-group" id="login_alert_panel" style="display: none;">
                                                <div class="col-sm-12">

                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto">
                                                        <div class="col-md-3" style="height: 40px; line-height:40px; text-align:left;">
                                                            <strong>Login Alert</strong>
                                                        </div>
                                                        <div class="col-md-9" style="padding-left: 0px;">
                                                            Get an alert when anyone logs into your account from a new device or browser.
                                                            <div class="col-md-12" style="padding-left: 0px;">
                                                                <img src="images/dostums-logo_favicon.png">
                                                                <strong> Notifications</strong>
                                                            </div>

                                                            <div class="col-md-12" style="padding-left: 0px;">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="optionsRadios" id="get_notifications" value="yes" >
                                                                        Get notifications
                                                                    </label>
                                                                </div>

                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="optionsRadios" id="dont_get_notification" value="no" >
                                                                        Don't get notifications
                                                                    </label>
                                                                </div>


                                                            </div>
                                                            <div class="col-md-9" style="padding-left: 0px;"><div class="_tpp" style="border:1px solid #ccc; margin:10px 0;"></div>

                                                            </div>
                                                            <!--Notifications part end-->
                                                            <div class="col-md-9"  style="padding-left: 0px;">
                                                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                                                <strong>Email</strong>

                                                            </div>
                                                            <div class="col-md-9"  style="padding-left: 0px;">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="email_notification" id="get_email_alerts" value="option3" >
                                                                        Email login alerts to***@gmail.com
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="email_notification" id="dont_get_email_alerts" value="option4" >
                                                                        Don't get email alerts
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-12"  style="padding-left: 0px;">
                                                                    <button type="button" id="save_login_alert" class="btn btn-primary btn-sm active">Save Change</button>
                                                                    <button type="reset" class="btn btn-default btn-sm active">cancel</button>

                                                                </div>

                                                            </div>


                                                        </div>
                                                        <!-- Email part end-->
                                                    </div>



                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#login_alert').click(function () {
                                                        $('#login_alert_panel').toggle('slow');
                                                    });

                                                    $("#save_login_alert").click(function ()
                                                    {
                                                        var notification = '';
                                                        if (document.getElementById('get_notifications').checked)
                                                        {
                                                            var notification = 'yes';
                                                        }
                                                        else if (document.getElementById('dont_get_notification').checked)
                                                        {
                                                            var notification = 'no';
                                                        }
                                                        else
                                                        {
                                                            var notification = 'no';
                                                        }

                                                        var email_login = '';
                                                        if (document.getElementById('get_email_alerts').checked)
                                                        {
                                                            var email_login = 'yes';
                                                        }
                                                        else if (document.getElementById('dont_get_email_alerts').checked)
                                                        {
                                                            var email_login = 'no';
                                                        }
                                                        else
                                                        {
                                                            var email_login = 'no';
                                                        }
                                                        //alert(notification);

                                                        $.post("./lib/security_settings_data.php", {'st': 1, 'notification': notification, 'email_login': email_login}, function (data) {
                                                            alert(data);
                                                        });
                                                    });
                                                });</script>
                                            <!--Login Approvals start-->

                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Login Approvals</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="login_approval" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">
                                                                    Use your phone as an extra layer of security to keep other pepole from logging into your account

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--hidenn approval start-->


                                            <div class="row form-group" id="login_approval_panel"style="display: none;">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput">Login Approvals</label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="checkbox ">

                                                                    <label>
                                                                        <input type="checkbox" value="yes" id="login_approvals"> Require a security code to access my account from unknown browsers[?]
                                                                    </label>

                                                                </div>


                                                                <div class="col-md-9"  style="padding-left: 0px;"><div class="_tpp" style="border:1px solid #ccc; margin:10px 0;"></div>
                                                                    <button type="submit" id="save_change_alert" class="btn btn-primary btn-sm active">Save Change</button>
                                                                    <button type="submit" class="btn btn-default btn-sm active">cancel</button>
                                                                    <!--<div class="_tpp" style="border:1px solid #ccc; margin-top:10px 0;"></div>-->
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#login_approval').click(function () {
                                                        $('#login_approval_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });

                                                    $('#save_change_alert').click(function ()
                                                    {
                                                        var login_approval = '';
                                                        if (document.getElementById('login_approvals').checked)
                                                        {
                                                            var login_approval = 'yes';
                                                        }
                                                        else
                                                        {
                                                            var login_approval = 'no';
                                                        }

                                                        alert(login_approval);
                                                        $.post("./lib/security_settings_data.php", {'st': 2, 'login_approval': login_approval}, function (data) {
                                                            alert(data);
                                                        });
                                                    });
                                                });</script>


                                            <!--Login Approvals end-->

                                            <!--Code Generator  start-->
                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">

                                                        <label class="control-label"  for="textinput">Code Generator</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="code_generator"style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">
                                                                    <!--Code Generator is enabled[?]-->
                                                                    Use your Dostums app to get security codes when you need them.
                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Code Generator  start-->


                                            <!--Code Generator hidden start-->


                                            <div class="row form-group" id="code_generator_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:7px 0px; height:auto">

                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Code Generator</label>
                                                        </div>

                                                        <div class="col-md-9"style="margin-top:5px;">


                                                            Code Generator is enabled.[?]<br>
                                                            <a href="#qw" data-toggle="modal" data-target="#set_up" style="color: #2C99CE;">Set up</a> another way to get security codes.<br>
                                                            <a href="#" data-toggle="modal" data-target="#enable" style="color: #2C99CE;">Enable</a> Code Generator.<br>






                                                            <!--  Modal start Code Generator hidden -->
                                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:100px;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"style="background-color:#99CA3C;">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Please Re-enter Your Password </h4>

                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="col-md-9" style="clear: both; padding-left: 0px;">
                                                                                <h5>Tuntuni:</h5><img class="img-responsive pull-left" src="images/index.jpg"> 
                                                                                <div class="text pull-left" style="padding-left: 5px;">For your security, you must re-enter your password to continue</div>

                                                                            </div>


                                                                            <div class="col-md-4" style="padding-left:0px; margin-top: 10px; clear: both;">
                                                                                <label>Password</label>
                                                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"style="border-color:#808080;">
                                                                                <div class="col-md-12" style="padding-left: 0px;">Forgot your password? </div> 
                                                                            </div>

                                                                        </div>


                                                                        <div class="modal-footer" style="clear: both;">

                                                                            <button type="button"  class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal start  Code Generator hidden --> 




                                                            <!--  Modal start Code Generator setup hidden start -->
                                                            <div class="modal fade" id="set_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:100px;">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"style="background-color:#99CA3C;">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel"><strong>Please Re-enter Your Password</strong> </h4>

                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="col-md-9" style="clear: both; padding-left: 0px;">
                                                                                <h5>Tuntuni:</h5><img class="img-responsive pull-left" src="images/index.jpg"> 
                                                                                <div class="text pull-left" style="padding-left: 5px;">For your security, you must re-enter your password to continue</div>

                                                                            </div>


                                                                            <div class="col-md-4" style="padding-left:0px; margin-top: 10px; clear: both;">
                                                                                <label>Password</label>
                                                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"style="border-color:#808080;">
                                                                                <div class="col-md-12" style="padding-left: 0px;">Forgot your password? </div> 
                                                                            </div>

                                                                        </div>


                                                                        <div class="modal-footer" style="clear: both;">


                                                                            <button type="button" class="btn btn-success">Save changes</button>
                                                                            <button type="button"  class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-9" style="padding-left:0px;">
                                                                <div class="_tpp" style="border:1px solid #ccc; margin:10px;width:350px; margin-left:2px;"></div>
                                                                <button type="submit" class="btn btn-default btn-sm active">Colse</button> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--  Modal start Code Generator setup hidden end -->
                                            <!--Code Generator hidden modal-content  start-->

                                            <!--Code Generator hidden modal-content enable start-->

                                            <div class="modal fade" id="enable" tabindex="-1" role="dialog"style="margin-top:100px;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"style="background-color:#99CA3C;">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title"><strong>Turn on Security Codes</strong></h4>
                                                        </div>
                                                        <div class="modal-body">


                                                            <p>   Activate Code Generator to get security codes on your phone.[?]</p>
                                                            1. Open the Dostums app on your phone<br>
                                                            2. Tap the menu button<br>
                                                            3. Scroll down and tap <strong>Code Generator</strong><br>
                                                            4. Tap<strong> Activate</strong><br><br>
                                                            <p>  When Code Generator is activated, click <strong>Continue.</strong><p>


                                                        </div>
                                                        <!--                                                         <div class="_tpp" style="margin:10px;width:350px; margin-left:2px;"></div>-->
                                                        <div class="modal-footer" style="padding-left:0px; padding-top: 5px; border:1px solid #ccc; ">


                                                            <button type="button" class="btn btn-success">Continue</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">cencel</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <!--Code Generator hidden modal-content end-->
                                            <!--  Code Generator hidden modal-content enable end-->









                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#code_generator').click(function () {
                                                        $('#code_generator_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Code Generator hidden end-->

                                            <!--App Password  start-->
                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">App Passwords</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="app_passwords" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">

                                                                    Use special passwords to log into your apps instead of using your Dostums passwords or login Approvals codes  

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--App Password hidden start-->
                                            <div class="row form-group" id="app_passwords_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:7px 0px; height:auto">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">App Passwords</label>
                                                        </div>

                                                        <div class="col-md-9" style="margin-top:5px;">


                                                            <div class="col-md-4"style="padding-left:3px;">25556484</div>
                                                            <div class="col-md-5">    
                                                                December 20, 2015 · <a href="#" style="color: #2C99CE;">Remove</a><br>
                                                                <a href="#" style="color: #2C99CE;">Generate app passwords</a>[?]</div>


                                                            <div class="col-md-9"  style="padding-left: 0px;"><div class="_tpp" style="border:1px solid #ccc; margin:10px 0;width:386px;"></div>
                                                                <button type="submit" class="btn btn-primary btn-sm active">Save Change</button>
                                                                <button type="submit" class="btn btn-default btn-sm active">cancel</button>
                                                            </div>
                                                        </div>

                                                    </div>




                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#app_passwords').click(function () {
                                                        $('#app_passwords_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--App Password hidden end-->



                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Trusted Contacts</label>

                                                        <div class="controls">


                                                            <a class="col-sm-12" href="#" id="trusted_contacts" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">

                                                                    Pick friends you can call to help you get back into your account if you get locked out

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Trusted Contacts hidden start-->

                                            <div class="row form-group" id="trusted_contacts_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:7px 0px;">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Trusted Contacts</label>
                                                        </div>

                                                        <div class="col-md-9" style="margin-top:5px;">
                                                            <div class="col-md-12"style="clear: both;padding-left:2px; margin-left: 0px;">
                                                                <div class="col-md-4" style="padding-left:0px; margin-left: 0px;">
                                                                    <input type="text" class="form-control" id="search_trstcon"  placeholder="Search" style="border-color:#808080; margin-top: 10px;">

                                                                </div>
                                                                <div class="col-md-3"  style="margin-top: 0px;">  <button id="browse-all-tc-btn" type="button" class="btn btn-success" style="clear:both;padding-right:20px;">Browse All</button></div>
                                                                <div class="col-md-3" style="margin-top: 0px;">  <button onclick="TrstConRemoveAll('<?php echo $new_user_id; ?>')" id="remove-all-tc-btn" type="button" class="btn btn-info" style="clear:both;padding-right:20px;">Remove All</button></div>
                                                                <div class="col-md-2" style="margin-top:0px;">  <button type="button" class="btn btn-primary">Edit</button></div>

                                                            </div>


                                                            <p>Trusted contacts are friends that can securely help you if you ever have trouble accessing your account.</p>

                                                            <fieldset id="default-tc-panel">
                                                                <div id="tc_suggestion" style="border:1px solid #ccc; margin:10px 0;width:428px;"></div>
                                                                <!--                                                                <div class="_tpp" style="border:1px solid #ccc; margin:10px 0;width:428px;"></div>-->

                                                                <a class="col-md-6"> 
                                                                    <img src="images/index.jpg" style="">
                                                                    <strong>Your trusted contacts</strong>
                                                                </a>
                                                                <div class="col-md-3">    
                                                                    <a href="#" style="color: #2C99CE; ">Edit</a><br>
                                                                    <a href="#" style="color: #2C99CE;">Remove All</a>
                                                                </div>
                                                            </fieldset>
                                                            <div class="col-md-9"  style="padding-left: 0px;"><div class="_tpp" style="border:1px solid #ccc; margin:10px 0;width:428px;"></div>
                                                                <fieldset id="all-trusted-contacts" style="display:none;">
                                                                    <div class="col-sm-12" style=" border:1px solid #ccc;">
                                                                        <?php
//                                                                        $trustedcontact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
//                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
//                                                                        cdfu.status as ustatus,
//                                                                        cdf.status as frnd_status,
//                                                                        dtc.status AS tc_status
//                                                                        from `dostums_user_view` as a 
//                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
//                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
//                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
//                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id 
//                                                                        LEFT JOIN dostums_trusted_contact as dtc on dtc.trusted_contact_id=a.id                 
//                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "' AND ud.tc_status='1'");
                                                                        //$chkstatus=$obj->SelectAllByVal2("dostums_friends_blocklist","uid",$input_by,"to_uid",$usrid,"status");
                                                                        $trustedcontact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
                                                                        IFNULL(a.city_id,'none') as city_id, 
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dtc.status AS tc_status
                                                                        from `dostums_user_view` as a 
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id` 
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_trusted_contact as dtc on dtc.trusted_contact_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($trustedcontact))
                                                                            foreach ($trustedcontact as $trstcon) {
                                                                                if ($trstcon->tc_status == 1) {
                                                                                    ?>

                                                                                    <div id="trst_con_lst_<?php echo $trstcon->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $trstcon->photo; ?>" style="height:auto; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $trstcon->id; ?>"/>
                                                                                            <strong><?php echo $trstcon->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="TrstConRemove('<?php echo $trstcon->id; ?>', '<?php echo $trstcon->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <div class="clearfix"></div>
                                                                        <button id="close-all-tc-btn" type="button" class="btn btn-warning btn-xs">close</button>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $('document').ready(function () {
                                                        $('#search_trstcon').keyup(function () {
                                                            $('#all-trusted-contacts').hide('slow');
                                                            $('#tc_suggestion').show();
                                                            var countvals = $(this).val().length;
                                                            if (countvals >= 4)
                                                            {
                                                                $.post("./lib/search_trusted_contact_friends.php", {'st': 1, 'search_tc_data': $(this).val()}, function (fetch) {
                                                                    var dataclss = jQuery.parseJSON(fetch);
                                                                    var optss = dataclss.data;
                                                                    $('#tc_suggestion').html(optss);
                                                                    $.ajaxSetup({cache: false});
                                                                });

                                                            }
                                                            else if (countvals == 0)
                                                            {
                                                                $('#tc_suggestion').hide();
                                                                location.reload();
                                                            }
                                                        });

//                                                        $('#search_trstcon').keyup(function () {
//                                                            var countvaltc = $(this).val().length;
//                                                            if (countvaltc >= 4)
//                                                            {
//                                                                $.post("./lib/search_trusted_contact_friends.php", {'st': 1, 'search_tc_data': $(this).val()}, function (data) {
//                                                                    var trstcons = jQuery.parseJSON(data);
//                                                                    var tclist = trstcons.data;
//                                                                    $('#tc_suggestion').html(tclist);
//                                                                });
//                                                            }
//                                                            else if (countvaltc == 0)
//                                                            {
//                                                                $('#tc_suggestion').hide();
//                                                                //window.location.reload();
//
//                                                            }
//                                                        });
                                                        $('#browse-all-tc-btn').click(function () {
                                                            $('#all-trusted-contacts').toggle('slow');
                                                            $('#default-tc-panel').hide('slow');
                                                        });
                                                        $('#close-all-tc-btn').click(function () {
                                                            $('#all-trusted-contacts').hide('slow');
                                                            $('#default-tc-panel').show('slow');
                                                        });

                                                    });
                                                </script>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#trusted_contacts').click(function () {
                                                        $('#trusted_contacts_panel').toggle('slow');
                                                        $('#search_trstcon').focus();
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Trusted Contacts hidden end-->




                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Your Browsers and Apps</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="your_browsers_and_apps" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">

                                                                    Review which browsers you saved as ones you often use 
                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Your Browsers and Apps hidden start-->

                                            <div class="row form-group" id="your_browsers_and_apps_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:7px 0px; height:auto">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Your Browsers and Apps</label>
                                                        </div>

                                                        <div class="col-md-9" style="margin-top:5px;">


                                                            You won't get notified or have to confirm your identity when logging in from these devices:

                                                            <div class="_tpp" style="border:1px solid #ccc; margin:10px 0; width: auto"></div>




                                                            <div class="col-md-12"> 
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>
                                                                <div class="col-md-6">
                                                                    Dostums for Android
                                                                </div>
                                                                <div>September 30, 2016  <a href="#" style="color: #2C99CE; ">Remove</a></div>

                                                            </div>

                                                            <div class="col-md-9"  style="padding-left: 0px;"><div class="_tpp" style="border:1px solid #ccc; margin:10px 0; width: auto"></div>

                                                                <button type="submit" class="btn btn-primary btn-sm active">Save Change</button>
                                                                <button type="submit" class="btn btn-default btn-sm active">cancel</button>
                                                            </div>
                                                        </div>

                                                    </div>




                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#your_browsers_and_apps').click(function () {
                                                        $('#your_browsers_and_apps_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Your Browsers and Apps hidden end-->




                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Where You're Logged In</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="where_your_logged_in" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">

                                                                    Review manage where you're currently logged into Dostums

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!--Trusted Contacts hidden start-->

                                            <div class="row form-group" id="where_your_logged_in_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:7px 0px; height:auto">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Where You're Logged In</label>
                                                        </div>

                                                        <div class="col-md-9" style="margin-top:5px;">

                                                            <div class="col-md-6">
                                                                <h5>Current Session</h5>
                                                            </div>
                                                            <div class="col-md-3"> <a style="color:#2C99CE;">End All Activity</a>
                                                            </div>


                                                            <div class="col-md-9" style="margin-top:10px;">
                                                                <strong>  Location Dhaka,</strong> Bangladesh(Approximate)<br>
                                                                <strong> Device Type</strong> Firefox on Windows 7

                                                            </div>


                                                            <div class="col-md-9">
                                                                <div class="_tpp col-md-9" style="border:1px solid #ccc; margin-top:10px;"></div>
                                                                <div class="col-md-9" style="padding-left: 0px; margin-left: 0px; margin-top:10px;">
                                                                    If you notice any unfamiliar devices or locations, click 'End Activity' to end the session.
                                                                </div>
                                                                <!--line div-->
                                                                <div class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                    <!--button 1-->
                                                                    <div class="col-md-12" style="padding-left: 0px;">
                                                                        <button class="btn btn-success" id="dataclick" type="button">
                                                                            Desktop
                                                                        </button>
                                                                        <!--hidden table list start-->
                                                                        <div id="openbutton1" class="col-md-12" style="display: none; padding-left: 0px; margin-left: 0px;">
                                                                            <div class="col-md-12" style="background: #fff; border-radius:4px; padding-left: 9px; margin-left: 2px;">
                                                                                <!--list one--->
                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px; margin-top:8px;">
                                                                                    <tr>
                                                                                        <th style="padding-left:8px;">Last Accessed </th>
                                                                                        <td style="padding-left:21px;" ><?php echo date('M d') . " at " . date('i:s a'); ?></td>
                                                                                        <td> <a href="#" style="color: #2C99CE;">End Activity</a></td>
                                                                                    </tr>
                                                                                </table>
                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                    <th style="padding-left:8px;">Location</th>
                                                                                    <td style="padding-left:67px;">Dhaka, Bangladesh (Approximate)</td> 
                                                                                </table>

                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                    <th style="padding-left:8px;">Device Type</th>
                                                                                    <td style="padding-left:2px;">Chrome on Windows 7</td> 
                                                                                </table>
                                                                                <!--list end-->


                                                                                <!--                                                                                <div class="_tpp col-md-9" style="border:1px solid #ccc; margin-top:10px;"></div>-->
                                                                                <!--list 2--->
                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px; margin-top:8px;">
                                                                                    <tr>
                                                                                        <th style="padding-left:8px;">Last Accessed </th>
                                                                                        <td style="padding-left:23px;" ><?php echo date('M d') . " at " . date('i:s a'); ?></td>
                                                                                        <td> <a href="#" style="color: #2C99CE;">End Activity</a></td>
                                                                                    </tr>
                                                                                </table>
                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                    <th style="padding-left:8px;">Location</th>
                                                                                    <td style="padding-left:67px;">Dhaka, Bangladesh (Approximate)</td> 
                                                                                </table>

                                                                                <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                    <th style="padding-left:8px;">Device Type</th>
                                                                                    <td style="padding-left:1px;">Chrome on Windows 7</td> 
                                                                                </table>
                                                                                <!--list2 end-->


                                                                                <!--hidden table list end-->


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function () {
                                                                        $('#dataclick').click(function () {
                                                                            $('#openbutton1').toggle();
                                                                        });
                                                                    });</script>
                                                                <!--button 1 end-->

                                                                <div class="col-md-12" style="padding-left: 0px; margin-left: 0px;">


                                                                    <button class="btn btn-success" id="dataclick2" type="button">
                                                                        Messenger
                                                                    </button>
                                                                    <div id="openbutton2" class="col-sm-12" style="display: none; padding-left: 0px; margin-left: 0px;">


                                                                        <div class="col-md-12" style="background: #fff; border-radius:4px; padding-left: 4px; margin-left: 2px;">
                                                                            <!--list one--->
                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px; margin-top:8px;">
                                                                                <tr>
                                                                                    <th style="padding-left:8px;">Last Accessed </th>
                                                                                    <td style="padding-left:21px;" ><?php echo date('M d') . " at " . date('i:s a'); ?></td>
                                                                                    <td> <a href="#" style="color: #2C99CE;">End Activity</a></td>
                                                                                </tr>
                                                                            </table>
                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                <th style="padding-left:8px;">Location</th>
                                                                                <td style="padding-left:71px;">Dhaka, Bangladesh (Approximate)</td> 
                                                                            </table>

                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                <th style="padding-left:8px;">Device Type</th>
                                                                                <td style="padding-left:0px;">Chrome on Windows 7</td> 
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function () {
                                                                        $('#dataclick2').click(function () {
                                                                            $('#openbutton2').toggle();
                                                                        });
                                                                    });</script>

                                                                <div class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                    <button class="btn btn-success" id="dataclick3" type="button">
                                                                        Dostums for Android 
                                                                    </button>
                                                                    <div id="openbutton3" class="col-sm-12" style="display: none; padding-left: 0px; margin-left: 0px;">
                                                                        <div class="col-md-12" style="background: #fff; border-radius:4px; padding-left: 9px; margin-left: 2px;">
                                                                            <!--list one--->
                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px; margin-top:8px;">
                                                                                <tr>
                                                                                    <th style="padding-left:8px;">Last Accessed </th>
                                                                                    <td style="padding-left:20px;" ><?php echo date('M d') . " at " . date('i:s a'); ?></td>
                                                                                    <td> <a href="#" style="color: #2C99CE;">End Activity</a></td>
                                                                                </tr>
                                                                            </table>
                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                <th style="padding-left:8px;">Location</th>
                                                                                <td style="padding-left:68px;">Dhaka, Bangladesh (Approximate)</td> 
                                                                            </table>

                                                                            <table align="left" class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                                <th style="padding-left:8px;">Device Type</th>
                                                                                <td style="padding-left:00px;">Chrome on Windows 7</td> 
                                                                            </table>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function () {
                                                                        $('#dataclick3').click(function () {
                                                                            $('#openbutton3').toggle();
                                                                        });
                                                                    });</script>
                                                                <div class="col-md-9">
                                                                    <button type="submit" class="btn btn-default btn-sm active">close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#where_your_logged_in').click(function () {
                                                        $('#where_your_logged_in_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Trusted Contacts hidden end-->
                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Legacy Contact</label>
                                                        <div class="controls">
                                                            <a class="col-sm-12" href="#" id="legacy_contact" style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">
                                                                    Choose a family member or closed friend to care for your account if something happens to you
                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Legacy Contact Your Account hidden start-->

                                            <div class="row form-group" id="legacy_contact_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:22px 1px; height:auto">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Legacy Contact</label>
                                                        </div>

                                                        <div class="col-md-9"style="margin-top:5px;">
                                                            <h5><strong>My Legacy Contact</strong></h5>

                                                            A legacy contact is someone you choose to manage your account after you pass away. 
                                                            They'll be able to do things like pin a post on your Timeline,
                                                            respond to new friend requests, and update your profile picture. 
                                                            They won't post as you or see your messages. 
                                                            <a href="#" style="color: #2C99CE;">Learn more.</a><br>
                                                            <div class="_tpp" style="border:1px solid #ccc; margin:10px; width:auto; padding-left:2px;margin-left:2px;"></div>
                                                            <div class="col-md-9">
                                                                <div class="col-md-12" style="padding-left: 0px; margin-left: 0px;">
                                                                    <div class="col-md-6" style="padding-left: 0px; margin-left: 0px;">
                                                                        <input id="legacy_contact_add" type="text"  style="margin-left: -5px; background: #fff;border:1px solid green;" class="form-control" id="ChooseAFriend" placeholder="Choose a friend">
                                                                    </div>
<!--                                                                    <div col-md-3>
                                                                        <button type="submit" style="margin-top: -2px;" class="btn btn-info"></button>  
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                            <fieldset id="legacy_contact_defult">
                                                            <div class="col-md-9">
                                                                Your legacy contact won't be notified until your account is memorialized,
                                                                but you'll have the option to send them a message right away.
                                                            </div>
                                                                <div class="_tpp col-md-9" style="border:1px solid #ccc; margin:10px; width:440px;padding-left:2px;margin-left:2px;"></div>

                                                            <div class="col-md-9">
                                                                <h5><strong> Account Deletion</strong></h5>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox"> If you don't want a Dostums account after you pass away,
                                                                        you can request to have your account permanently deleted.
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-9" style="padding-left:0px;">
                                                                <div class="_tpp" style="border:1px solid #ccc; margin:10px; width:440px;padding-left:2px;margin-left:2px;"></div>

                                                                <button type="submit" class="btn btn-default btn-sm active">Colse</button> 
                                                            </div>
                                                            </fieldset>
                                                            <fieldset id="legacy_contact" style="display:none;">
                                                                    <div class="col-sm-12" style=" border:1px solid #ccc;">
                                                                        <?php
                                                                         $legacycontact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
                                                                        IFNULL(a.city_id,'none') as city_id, 
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dlc.status AS lc_status
                                                                        from `dostums_user_view` as a 
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id` 
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_legacy_contact as dlc on dlc.legacy_contact_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($legacycontact))
                                                                            foreach ($legacycontact as $legcon) {
                                                                                if ($legcon->lc_status == 1) {
                                                                                    ?>

                                                                                    <div id="trst_con_lst_<?php echo $legcon->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $legcon->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $legcon->id; ?>"/>
                                                                                            <strong><?php echo $legcon->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="TrstConRemove('<?php echo $legcon->id; ?>', '<?php echo $legcon->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <div class="clearfix"></div>
                                                                        <button id="close-all-tc-btn" type="button" class="btn btn-warning btn-xs">close</button>
                                                                    </div>
                                                                </fieldset>
                                                            <div id="lc_suggestion" class="col-md-9"></div>
                                                        </div>

                                                        <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#legacy_contact_add').keyup(function () {
                                                                    $('#legacy_contact').hide();
                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldlc = $(this).val().length;
                                                                    if (countvaldlc >= 4)
                                                                    {
                                                                        $.post("./lib/search_security_settings.php", {'st': 1, 'search_lc_data': $(this).val()}, function (datadlc) {
                                                                            var datacldlc= jQuery.parseJSON(datadlc);
                                                                            var optdlc = datacldlc.datadlc;
                                                                            $('#lc_suggestion').html(optdlc);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldlc == 0)
                                                                    {
                                                                        $('#lc_suggestion').hide();
                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                     
//                                                                $('#browse-all-tc-btn').click(function () {
//                                                                    $('#all-trusted-contacts').toggle('slow');
//                                                                    $('#default-tc-panel').hide('slow');
//                                                                });
//                                                                $('#close-all-tc-btn').click(function () {
//                                                                    $('#all-trusted-contacts').hide('slow');
//                                                                    $('#default-tc-panel').show('slow');
//                                                                });

                                                            });
                                                        </script>

                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#legacy_contact').click(function () {
                                                        $('#legacy_contact_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Legacy Contact Your Account hidden end-->


                                            <div class="row form-group">
                                                <div class="col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Deactivate Your Account</label>

                                                        <div class="controls">

                                                            <a class="col-sm-12" href="#" id="deactivate_your_account"style=" background:#F5F5F5; padding:7px 0px; border: 1px #ccc solid;">
                                                                <div class="col-sm-11" style="padding-left: 7px;">

                                                                    Choose whether you want to keep your account active or deactivate it

                                                                </div>
                                                                <div class="col-sm-1" style="color: #2C99CE; text-align: right;">
                                                                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!--Deactivate Your Account hidden start-->


                                            <div class="row form-group" id="deactivate_your_account_panel" style="display:none; margin:2px;">
                                                <div class="col-sm-12" style=" background:#F5F5F5; border: 1px #0cc solid; padding:22px 1px; height:175px;">
                                                    <!-- Text input-->
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput">Deactivate Your Account</label>
                                                        </div>

                                                        <div class="col-md-9"style="margin-top:5px;">

                                                            Deactivating your account will disable your profile and remove your
                                                            name and photo from most things you've shared on Dostums.
                                                            Some information may still be visible to others, 
                                                            such as your name in their friends list and messages you sent. 
                                                            <a href="#" style="color: #2C99CE;">Learn more.</a><br>
                                                            <a href="#" style="color: #2C99CE; padding-left:2px;">Deactivate your account.</a> 


                                                            <div class="col-md-9" style="padding-left:0px;">
                                                                <div class="_tpp" style="border:1px solid #ccc; margin:10px; width:440px;padding-left:2px; margin-left: 0px;"></div>

                                                                <button type="submit" class="btn btn-default btn-sm active">Colse</button> 
                                                            </div>
                                                        </div>

                                                    </div>




                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $('document').ready(function () {
                                                    $('#deactivate_your_account').click(function () {
                                                        $('#deactivate_your_account_panel').toggle('slow');
                                                        //alert('Succeess');
                                                    });
                                                });</script>
                                            <!--Deactivate Your Account hidden end-->

                                            <!--                                        <div class="row form-group">
                                                                                        <div class="col-sm-6">
                                                                                             Text input
                                                                                            <div class="control-group ">
                                                                                                <label class="control-label" for="textinput">Location</label>
                                                                                                <div class="controls">
                                                                                                    <select  class="form-control " name="country" id="country_id" >  
                                                                                                        <option value="" class="form-option form-option-empty">All Countries</option> 
                                            <?php
                                            $ucountry = $obj->SelectAllByVal("dostums_user", "id", $input_by, "country_id");
                                            $sqlcountry = $obj->SelectAll("dostums_country");
                                            if (!empty($sqlcountry))
                                                foreach ($sqlcountry as $country):
                                                    ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option <?php if ($ucountry == $country->id) { ?> selected <?php } ?> value="<?php echo $country->country_name; ?>" data-code="<?php echo $country->country_code; ?>" class="form-option"><?php echo $country->country_name; ?></option>    
                                                    <?php
                                                endforeach;
                                            ?>
                                                                                                    </select>
                                                                                                    <p class="help-block hide">help</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                             Text input
                                                                                            <div class="control-group">
                                                                                                <label class="control-label" for="textinput"> &nbsp; </label>
                                                                                                <div class="controls">
                                                                                                    <input id="city_id" name="location-sub" value="Dhaka" class=" form-control" type="text">
                                                                                                    <p class="help-block hide">help</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div>-->

                                            <!--                                        <div class="form-group">
                                                                                        <label class="control-label" for="textinput">Website URL</label>
                                                                                        <div class="controls">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon">http://</div>
                                                                                                <input type="text"  class="form-control" id="website_url" value="tanimdesign.net">
                                                                                            </div>                                                <p class="help-block hide">help</p>
                                                                                        </div>
                                                                                    </div>
                                            
                                                                                    <div id="basic_info_edit" class="form-group">
                                                                                        <label class="control-label" for="textinput"></label>
                                                                                        <div class="controls">
                                                                                            <div class="input-group">
                                                                                                <button type="button" class="btn btn-success" id="basicsave">Save Change</button>
                                                                                            </div>                                                
                                                                                        </div>
                                                                                    </div>-->




                                        </fieldset>
                                    </form>

                                </div>
                            </div>
   </div>
                            <!--                    <div class="ibox ">
                                                    <div class="ibox-title">
                                                        <h5>About <small></small></h5>
                                                        <div class="ibox-tools">
                            
                                                            <div class="ibox-tools">
                                                                <button class="def_button" id="about_info" type="button">
                                                                    <i class="fa fa-wrench"></i>
                                                                </button>
                                                            </div>
                            
                                                        </div>
                                                    </div>-->
                            <!--                        <div class="ibox-content">
                            
                            
                                                        <script type="text/javascript">
                            
                                                                $(document).ready(function() {
                            
                                                                    load_notificationabout = {'st':2};
                                                                         $.post('lib/setting.php', load_notificationabout,  function(datad) {
                                                                            if(datad!=0)
                                                                            {
                                                                                var datacl=jQuery.parseJSON(datad);
                                                                                var about_short=datacl[0].about_short;
                                                                                var about_long=datacl[0].about_long;
                                                                                
                                                                                
                                                                                $('#about_short').val(about_short);
                                                                                $('#about_long').val(about_long);
                                                                                
                                                                                $('#about_info_edit').css("display","none");
                                                                                //console.log(city_id);
                                                                            }
                                                                            else
                                                                            {
                                                                                alert("Something Went Wrong Please retry Again");
                                                                            }
                                                                         });                                                 
                                                                    
                                                                });
                                                            </script>
                            
                                                        <form class="">
                                                            <fieldset>
                            
                                                                <div class="form-group">
                                                                    <label class="control-label" for="textinput">About You</label>
                                                                    <div class="controls">
                                                                        <input id="about_short" name="textinput" value="About" class=" form-control" type="text">
                                                                        <p class="help-block hide">help</p>
                                                                    </div>
                                                                </div>
                            
                            
                                                                <div class="form-group">
                                                                    <label class="control-label" for="textinput">Passion/Vission</label>
                                                                    <div class="controls">
                            
                                                                        <textarea class="form-control" id="about_long" name="textarea">default text</textarea>
                            
                                                                        <p class="help-block hide">help</p>
                                                                    </div>
                                                                </div>
                            
                                                                <div id="about_info_edit" class="form-group">
                                                                    <label class="control-label" for="textinput"></label>
                                                                    <div class="controls">
                                                                        <div class="input-group">
                                                                            <button type="button" class="btn btn-success" id="aboutsave">Save Change</button>
                                                                        </div>                                                
                                                                    </div>
                                                                </div>
                            
                                                            </fieldset>
                                                        </form>
                            
                                                    </div>
                                                </div>
                            
                                                <div class="ibox ">
                                                    <div class="ibox-title">
                                                        <h5>Password <small></small></h5>
                                                        <div class="ibox-tools">
                            
                                                            <div class="ibox-tools">
                                                                <button class="def_button" id="password_info" type="button">
                                                                    <i class="fa fa-wrench"></i>
                                                                </button>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                    <div class="ibox-content">
                            
                                                        <form class="">
                                                            <fieldset>
                            
                                                                <div class="form-group">
                                                                    <label class="control-label" id="currentpassword_label" for="textinput">Current Password</label>
                                                                    <div class="controls">
                                                                        <input id="password" name="textinput" value="**********" class=" form-control" type="password">
                                                                        <p class="help-block hide">To Change Password Type Your Current Password</p>
                                                                    </div>
                                                                </div>
                            
                                                                <div id="retypebox" class="form-group" style="display:none;">
                                                                    <label class="control-label" for="textinput">New Password</label>
                                                                    <div class="controls">
                                                                        <input id="newpassword" name="textinput" placeholder="New Password" class=" form-control" type="text">
                                                                        <p class="help-block hide">help</p>
                                                                    </div>
                                                                </div>
                            
                                                                <div id="retypebox2" class="form-group" style="display:none;">
                                                                    <label class="control-label" for="textinput">Re-Type Password</label>
                                                                    <div class="controls">
                                                                        <input id="rnewpassword" name="textinput" placeholder="Re-Type New Password" class=" form-control" type="text">
                                                                        <p class="help-block hide">help</p>
                                                                    </div>
                                                                </div>
                            
                                                                <div id="password_info_edit" class="form-group" style="display:none;">
                                                                    <label class="control-label" for="textinput"></label>
                                                                    <div class="controls">
                                                                        <div class="input-group">
                                                                            <button type="button" style="margin-top:3px;" class="btn btn-success" id="passwordsave">Change Password</button>
                                                                        </div>                                                
                                                                    </div>
                                                                </div>
                            
                                                            </fieldset>
                                                        </form>
                            
                                                    </div>
                                                </div>-->


                            <!--<div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Education <small></small></h5>
                                    <div class="ibox-tools">
        
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
        
                                    </div>
                                </div>
                                <div class="ibox-content">
        
                                    <form class="">
                                        <fieldset>
        
                                            <div class="form-group">
                                                <label class="control-label" for="textinput">Section Title</label>
                                                <div class="controls">
                                                    <input id="section_title" name="textinput" value="Education " class=" form-control" type="text">
                                                    <p class="help-block hide">help</p>
                                                </div>
                                            </div>
        
        
                                            <div class="form-group">
                                                <label class="control-label" for="textinput">Description</label>
                                                <div class="controls">
        
                                                    <textarea class="form-control" id="description" name="textarea">BSc in Electrical & Electronics Engineering from Stamford University  </textarea>
                                                    <p class="help-block hide">help</p>
                                                </div>
                                            </div>
        
                                        </fieldset>
                                    </form>
        
                                </div>
                            </div>-->
                            <!--                    <div class="ibox ">
                                                    <div class="ibox-title">
                                                        <h5>Social Link <small></small></h5>
                                                        <div class="ibox-tools">
                            
                                                            <div class="ibox-tools">
                                                                <button class="def_button" id="social_info" type="button">
                                                                    <i class="fa fa-wrench"></i>
                                                                </button>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                    <div class="ibox-content">
                            
                                                        <form class="">
                                                            <fieldset>
                                                                                                    
                                                                <div class="form-group">
                                                                    <table class="table  table-social">
                                                                        <thead>
                                                                        <tr>
                                                                            <th><i class="fa fa-2x fa-twitter-square"></i> </th>
                                                                            <th> Twitter  </th>
                                                                            <th style="width:40%;"><span id="social11" class="1"><span  onclick="social('1')"><?php
                            $s1 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "1", "social_name");
                            if ($s1 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s1;
                            }
                            ?></span></span> <button id="social1" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td><i class="fa fa-2x fa-linkedin-square"></i> </td>
                                                                            <td> linkedin  </td>
                                                                            <td>
                            
                            
                                                                                <span  id="social12" class="2"><span  onclick="social('2')"><?php
                            $s2 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "2", "social_name");
                            if ($s2 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s2;
                            }
                            ?></span></span>
                                                                                <button  id="social2"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                            
                                                                        </tr>
                            
                                                                        <tr>
                                                                            <td><i class="fa fa-2x fa-facebook"></i> </td>
                                                                            <td> Facebook  </td>
                                                                            <td style="widtd: 100px">
                            
                            
                                                                                <span  id="social13"  class="3"><span  onclick="social('3')"><?php
                            $s3 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "3", "social_name");
                            if ($s3 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s3;
                            }
                            ?></span></span>
                            
                            
                                                                                <button  id="social3"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                            
                                                                        </tr>
                            
                            
                                                                        <tr>
                                                                            <td><i class="fa fa-2x fa-google-plus-square"></i> </td>
                                                                            <td>  Google+
                                                                            </td>
                                                                            <td >
                            
                                                                                <span  id="social14"  class="4"><span  onclick="social('4')"><?php
                            $s4 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "4", "social_name");
                            if ($s4 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s4;
                            }
                            ?></span></span>
                            
                            
                            
                                                                                <button  id="social4"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                                                        </tr>
                            
                            
                                                                        <tr>
                                                                            <td><i class="fa fa-2x fa-youtube-square"></i> </td>
                                                                            <td>  YouTube
                                                                            </td>
                                                                            <td>    <span  id="social15"  class="5"><span  onclick="social('5')"><?php
                            $s5 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "5", "social_name");
                            if ($s5 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s5;
                            }
                            ?></span></span>
                                                                                <button  id="social5"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                                                        </tr>
                            
                                                                        <tr>
                                                                            <td><i class="fa fa-2x fa-youtube-square"></i> </td>
                                                                            <td>  Viber
                                                                            </td>
                                                                            <td>   <span  id="social16" class="6"><span  onclick="social('6')"><?php
                            $s6 = $obj->SelectAllByVal2("dostums_user_social_info", "user_id", $input_by, "social_id", "6", "social_name");
                            if ($s6 == "") {
                                echo "Add Your ID/Name";
                            } else {
                                echo $s6;
                            }
                            ?></span></span>
                                                                                <button  id="social6"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                                                        </tr>
                            
                            
                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                            
                            
                            
                                                            </fieldset>
                                                        </form>
                            
                                                    </div>
                                                </div>
                                            </div>-->
                        </div>
                    </div>
                </div>

                <?php include('plugin/fotter.php') ?>


                <!-- Latest compiled and minified JavaScript -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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