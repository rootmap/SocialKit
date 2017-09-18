<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: blocking.php?user_id=' . $_GET['user_id']);
        exit();
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
            //Most notifications start
            function checkboxpin()
            {
                var pin = 'no';
                if (document.getElementById("phnpinyes").checked == true)
                {
                    pin = 'yes';
                }
                else if (document.getElementById("phnpinno").checked == true)
                {
                    pin = 'no';
                }
                else
                {
                    pin = 'no';
                }



                $.post("lib/mobile_data.php", {'st': 5, 'apppin': pin}, function (data) {
                    $('#phnpins').hide('slow');
                    $("#phnmgsplace").show('slow');
                    $("#phnmgsplace").html(pin);
                    alert(data);
                });
            } //Most notifications end



            //Text massage  start
            function checkboxsms()
            {
                var dostmsg = 'no';
                if (document.getElementById("smsdostyes").checked == true)
                {
                    dostmsg = 'yes';
                }
                else if (document.getElementById("smsdostno").checked == true)
                {
                    dostmsg = 'no';
                }
                else
                {
                    dostmsg = 'no';
                }



                $.post("lib/mobile_data.php", {'st': 6, 'apptxs': dostmsg}, function (data) {
                    $('#dosttext').hide('slow');
                    $("#mgsplace").show('slow');
                    $("#mgsplace").html(dostmsg);
                    alert(data);
                });
            } //Text massage end




            //Daily Text massages start
            function checkboxdtm()
            {
                var dailytxt = 'no';
                if (document.getElementById("dailytxtyes").checked == true)
                {
                    dailytxt = 'yes';
                }
                else if (document.getElementById("dailytxtno").checked == true)
                {
                    dailytxt = 'no';
                }
                else
                {
                    dailytxt = 'no';
                }



                $.post("lib/mobile_data.php", {'st': 7, 'daily': dailytxt}, function (data) {
                    $('#dtmnumber').hide('slow');
                    $("#smsplace").show('slow');
                    $("#smsplace").html(dailytxt);
                    alert(data);
                });
            } //Daily Text massages  end
            
            
            
              //Time of Day start
            function checkboxtime()
            {
                var tymtotym = 'no';
                if (document.getElementById("dosttimeyes").checked == true)
                {
                    tymtotym = 'yes';
                }
                else if (document.getElementById("dosttimeno").checked == true)
                {
                    tymtotym = 'no';
                }
                else
                {
                    tymtotym = 'no';
                }



                $.post("lib/mobile_data.php", {'st': 8, 'time': tymtotym}, function (data) {
                    $('#timetodate').hide('slow');
                    $("#timeplace").show('slow');
                    $("#timeplace").html(tymtotym);
                    alert(data);
                });
            } //Time of Day  end


        </script>

        <script>
            $(document).ready(function () {


                $('#phnmgsplace').show('slow');
                $('#phnpins').hide('slow');

                $('#mgsplace').show('slow');
                $('#dosttext').hide('slow');

                $('#smsplace').show('slow');
                $('#dtmnumber').hide('slow');
                
                $('#timeplace').show('slow');
                $('#timetodate').hide('slow');

                $('#basic_info3').click(function () {

                    $("#phnpins").show('slow');
                    $('#phnmgsplace').hide('slow');

                    $("#dosttext").show('slow');
                    $('#mgsplace').hide('slow');

                    $("#dtmnumber").show('slow');
                    $('#smsplace').hide('slow');
                    
                    $("#timetodate").show('slow');
                    $('#timeplace').hide('slow');
                    //$('#phnpins').hide('slow');


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
                                    <h5><strong>Mobile Settings</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info3" type="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </button>
                                    </div>


                                    <div class="total_row">
           
                                        <div class="row form-group"> <!--Most notifications-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="comment_ranking" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                            <label class="control-label" for="textinput"><strong>Mobile PIN</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <?php $sqlmobilepin = $obj->FlyQuery("SELECT * FROM dostums_mobile_settings");
                                                            if(!empty($sqlmobilepin)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" style="padding-left:10px;">Mobile PIN is turned off</div>
                                                                <span id="phnpins">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="pin" onclick="checkboxpin()" id="phnpinyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="pin" onclick="checkboxpin()" id="phnpinno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="phnmgspin">
                                                                    <div class="col-md-offset-4 text-right" id="phnmgsplace"><?php echo $sqlmobilepin[0]->mobile_pin; ?></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Most notifications end-->
                                       <?php } ?>

                                        <div class="row form-group"> <!--Text massage start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-comment"></span>
                                                            <label class="control-label" for="textinput"><strong>Dostums massage</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqldostsms = $obj->FlyQuery("SELECT * FROM dostums_mobile_settings");
                                                            if(!empty($sqldostsms)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" href="#" style="padding-left:10px;">Text me: when someone sends Me a Massage on Web or mobile</div>
                                                                <span id="dosttext">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="dostmsg" onclick="checkboxsms()" id="smsdostyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="dostmsg" onclick="checkboxsms()" id="smsdostno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="mgspin">
                                                                    <div class="col-md-offset-4 text-right" id="mgsplace"><?php echo $sqlmobilepin[0]->sms_alert; ?></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Text massage end-->
                                       <?php } ?>




                                        <div class="row form-group"> <!--Daily Text massages start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                            <label class="control-label" for="textinput"><strong>Daily Text massages</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqldailytext = $obj->FlyQuery("SELECT * FROM dostums_mobile_settings");
                                                            if(!empty($sqldailytext)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" href="#" style="padding-left:10px;">Maximum number of text: Unlimited</div>
                                                                <span id="dtmnumber">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="dailytxt" onclick="checkboxdtm()" id="dailytxtyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="dailytxt" onclick="checkboxdtm()" id="dailytxtno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                                <span id="smspin">
                                                                    <div class="col-md-offset-4 text-right" id="smsplace"><?php echo $sqlmobilepin[0]->daliy_sms; ?></div>
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Daily Text massages end-->

                                       <?php } ?>


                                        <div class="row form-group"> <!--Time of Day start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="twitter_use" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                            <label class="control-label" for="textinput"><strong>Time of Day</strong></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                              <?php $sqldailytext = $obj->FlyQuery("SELECT * FROM dostums_mobile_settings");
                                                            if(!empty($sqldailytext)){
                                                            ?>
                                                            <div class="col-md-12 " id="friend_requests_panel">
                                                                <div class="col-md-8" href="#" style="padding-left:10px;">You'll only get texts from Dostums between 8.00am And 11.00pm</div>
                                                                <span id="timetodate">
                                                                    <div class="col-md-offset-4">    
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="tymtotym" onclick="checkboxtime()" id="dosttimeyes" value="yes">yes
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="tymtotym" onclick="checkboxtime()" id="dosttimeno" value="no"> No
                                                                        </label>
                                                                    </div>
                                                                </span>

                                                                <span id="optionpin">
                                                                    <div class="col-md-offset-4 text-right" id="timeplace"><?php echo $sqlmobilepin[0]->time_date; ?></div>
                                                                </span>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Time of Day end-->
                                      <?php } ?>
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


