<?php
include('class/db_Class.php');
$obj = new db_class();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dostums </title>
        <?php
        include('plugin/header_script.php');
        ?>
        <script>
            $(document).ready(function (e) {
                $.cookie('count', '0');
                $.cookie('count2', '0');
                $.cookie('count3', '0');
            });</script>
        <script src="lib/jquery.cookie.js"></script>
    </head>
    <body class="home">
        <header>
            <div class="header-wrapper">
                <?php include('plugin/non_user_header.php'); ?>
            </div>
        </header>


        <div class="main-container page-container section-padd page-login">

            <div class="container ">

                <div class="row">

                    <div class="signup-container">
                        <div class="login-box">


                            <div class="main multi-form">

                                <div class="text-center front-welcome-text">
                                    <h3 class="text-light">Register with Dostums. </h3>
                                </div>


                                <div class="col-sm-6 col-sm-offset-3 form-box">

                                    <form role="form" action="" method="post" class="registration-form">

                                        <fieldset>
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Step 1 / 3</h3>

                                                    <p>Tell us who you are:</p>
                                                </div>
                                                <div class="form-top-right">

                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-bottom">
                                                <div class="form-group  clearfix">
                                                    <label  class="col-md-4 control-label" for="selectbasic">First name</label>
                                                    <div class="col-md-7">
                                                        <input type="text" id="first_name" placeholder="First name..."
                                                               class="form-first-name form-control" id="form-first-name">
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label  class="col-md-4 control-label" for="selectbasic">Last name</label>
                                                    <div class="col-md-7">
                                                        <input type="text" id="last_name" placeholder="Last name..."
                                                               class="form-last-name form-control" id="form-last-name">
                                                    </div>
                                                </div>

                                                <div class="form-group clearfix">
                                                    <label  class="col-md-4 control-label" for="selectbasic">Email</label>
                                                    <div class="col-md-7">
                                                        <input type="text" id="email" placeholder="Email..."
                                                               class="form-email form-control" id="form-email">
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary btn-next">Next</button>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3>Step 2 / 3</h3>

                                                    <p id="merifyMeDone">Set up your account:</p>
                                                </div>
                                                <div class="form-top-right">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </div>
                                            <div class="form-bottom">

                                                <?php
                                                //$field_array=[];
                                                $sqlrandomquery = $obj->FlyQuery("SELECT * FROM dostums_signup_random_data ORDER BY RAND() LIMIT 3");
                                                if (!empty($sqlrandomquery))
                                                    foreach ($sqlrandomquery as $qf):
                                                        if ($qf->field_name == "dob") {
                                                            $idinfield = "datepicker";
                                                        } else {
                                                            $idinfield = time();
                                                        }

                                                        $field_array[] = $qf->field_name;
                                                        ?>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-4 control-label" for="selectbasic"><?php echo $qf->field_title; ?></label>

                                                            <div class="col-md-7">
                                                                <input type="text" name="<?php echo $qf->field_name; ?>" placeholder="<?php echo $qf->field_title; ?>"
                                                                       class="form-password form-control" id="<?php echo $idinfield; ?>">
                                                            </div>
                                                        </div>

                                                        <?php
                                                    endforeach;
                                                ?>
                                                
                                                <button id="pronext" type="button" style="position: absolute; left: -20000;" class="btn btn-next">Next</button>
                                                <button type="button" class="btn btn-info btn-previous">Previous</button>
                                                <span id="btnnxt">
                                                    <button type="button" id="verifyMe" class="btn btn-warning">Verify Info</button>
                                                </span>
                                                <!---->
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-top">
                                                <div class="form-top-left">
                                                    <h3 id="final_done">Step 3 / 3</h3>
                                                    <p id="message_done" style="display: none;">Question field:</p>
                                                </div>
                                                <div class="form-top-right" id="final_auth">
                                                    <i class="fa fa-question"></i>
                                                </div>
                                            </div>
                                            <div class="form-bottom">    
                                                <div class="form-group clearfix" id="phoneplace">
                                                    <label class="col-md-4 control-label" for="selectbasic">Mobile Number</label>

                                                    <div class="col-md-7">
                                                        <input type="text" name="mobile_number" placeholder="Please Type Your Mobile Number"  class="form-password form-control" id="form-password">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" value="">
                                                <input type="hidden" name="expass" value="">
                                                <div class="form-group clearfix" id="auth_code_place" style="display: none;">
                                                    <label class="col-md-4 control-label" for="selectbasic">Authorization Code</label>

                                                    <div class="col-md-4">

                                                        <input type="password" id="auth_code" placeholder="Verification Code"
                                                               class="form-password form-control" id="form-password">
                                                    </div>
                                                </div> 


                                                <button type="button" id="finalbutton1" class="btn btn-previous btn-info">Previous</button>
                                                <button type="button" id="signup_save" class="btn btn-primary">Verify Your Information!</button>
                                            </div>
                                        </fieldset>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer>
            <div class="footer-bottom">
                <div class="container text-center">
                    <p class="pull-left hide">
                        Copyright © 2015 dostums Inc. All Rights Reserved</p>
                </div>
            </div>
        </footer>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
        <script src="assets/material/js/ripples.min.js"></script>
        <script src="assets/material/js/material.min.js"></script>
        <script>
            $(document).ready(function () {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
                
                $(".select").dropdown({"autoinit": ".select"});
                
                $("#login").click(function () {
                    var log_email = $('#log_email').val();
                    var log_password = $('#log_password').val();
                    //alert(log_password);
                    loginfromsignup(log_email, log_password);
                });
                
                $('#log_email').keypress(function (e) {
                    if (e.which == 13) {
                        var log_email = $('#log_email').val();
                        var log_password = $('#log_password').val();
                        //alert(log_password);
                        loginfromsignup(log_email, log_password);
                    }
                });
                
                $('#log_password').keypress(function (e) {
                    if (e.which == 13) {
                        var log_email = $('#log_email').val();
                        var log_password = $('#log_password').val();
                        //alert(log_password);
                        loginfromsignup(log_email, log_password);
                    }
                });
                
                window.setInterval(function () {

                    $('#processdata').css("font-size", "20px");
                    $('#processdata').addClass('text-info');
                    $('#processdata').css("font-weight", "bolder");
                    var process = $('#processdata').html();
                    if (process == "")
                    {
                        $('#processdata').html(".");
                    }
                    else if (process == ".")
                    {
                        $('#processdata').html("..");
                    }
                    else if (process == "..")
                    {
                        $('#processdata').html("...");
                    }
                    else if (process == "...")
                    {
                        $('#processdata').html("....");
                    }
                    else if (process == "....")
                    {
                        $('#processdata').html(".....");
                    }
                    else if (process == ".....")
                    {
                        $('#processdata').html("......");
                    }
                    else if (process == "......")
                    {
                        $('#processdata').html(".");
                    }
                }, 1000);
                
                
                
                
                $("#verifyMe").click(function () {
//                    alert('success');



                    //step 1 start
                    $('#merifyMeDone').show('slow');
                    $('#merifyMeDone').html('Please wait we are verifying you infomation <span id="processdata"></span>');
                    var first_name = $('#first_name').val();
                    var last_name = $('#last_name').val();
                    var email = $('#email').val();
<?php
foreach ($field_array as $field):
    ?>
                        var <?php echo $field; ?> = $('input[name=<?php echo $field; ?>]').val();
    <?php
endforeach;
?>


                        load_data_delete = {'st': 9, 'first_name': first_name, 'last_name': last_name, 'email': email,
<?php
$i = 1;
foreach ($field_array as $field):
    ?>
                        'field_value_<?php echo $i; ?>':$('input[name=<?php echo $field; ?>]').val(),
                                'field_name_<?php echo $i; ?>':'<?php echo $field; ?>',
    <?php
    $i++;
endforeach;
?>'mobile_number':$('input[name=mobile_number]').val()};
                
                
                
                    $.post('./lib/signup.php', load_data_delete, function (datados) {
                        //alert(datados);
                        var dataclf = jQuery.parseJSON(datados);
                        var get_status = dataclf.status;
                        if (get_status == 1)
                        {
                            //$(this).addClass('');
                            $('#btnnxt').hide('slow');
                            $("#pronext").click();
                            // $(this).html('Proced To Next');
                            $('#merifyMeDone').html('Please Click Next To Proced Next Step');
                        }
                        else
                        {
                            $('#merifyMeDone').show('slow');
                            $('#merifyMeDone').html('Invalid Information, Please try again with valid info.');
                        }
                    });
                    //step one done

                });
                $("#signup_save").click(function () {
                    //alert('success');

                    var useridst = $('input[name=user_id]').val();
                    if (useridst != "" || useridst != 0)
                    {
                    var auth_code = $('#auth_code').val();
                            //step two start
                            var getexpass = $('input[name=expass]').val();
                            $('#message_done').hide('slow');
                            //$('#message_done').html('Please wait we are verifying you infomation <span id="processdata"></span>');
                            var first_name = $('#first_name').val();
                            var last_name = $('#last_name').val();
                            var email = $('#email').val();
<?php
foreach ($field_array as $field):
    ?>
                        var <?php echo $field; ?> = $('input[name=<?php echo $field; ?>]').val();
    <?php
endforeach;
?>




                    load_data_delete = {'st': 11, 'first_name': first_name, 'last_name': last_name, 'email': email,<?php
$i = 1;
foreach ($field_array as $field):
    ?>
                        'field_value_<?php echo $i; ?>':$('input[name=<?php echo $field; ?>]').val(),
                                'field_name_<?php echo $i; ?>':'<?php echo $field; ?>',
    <?php
    $i++;
endforeach;
?>'pass':getexpass, 'mobile_number':$('input[name=mobile_number]').val(), 'user_id':useridst, 'auth_code':auth_code};
                    $.post('./lib/signup.php', load_data_delete, function (datados) {
                        //alert(datados);
                        var dataclf = jQuery.parseJSON(datados);
                        var get_status = dataclf.status;
                        if (get_status == 1)
                        {

                            $('#finalbutton1').hide();
                            $('#signup_save').hide();
                            $('#phoneplace').hide();
                            $('#final_done').html("Done");
                            $('#final_auth').html('<i style="font-color:#00AA9A;" class="fa fa-check-circle"></i>');
                            $('#auth_code_place').html('<h5 class="text-success">Please Wait We Are Processing Your Data To Dostums Home Page. <span id="processdata"></span></h5>');
                            var getuserst = dataclf.user_id;
                            if (getuserst != '')
                            {
                                window.location.replace("./home.php");
                            }
                            else
                            {
                                window.location.replace("./home.php");
                            }
                        }
                        else
                        {
                            $('#message_done').show('slow');
                            $('#message_done').html('Invalid Information & Authorization Code, Please try again with valid info.');
                        }
                    });
                    //step two end
                    }
                    else
                    {
                    //step 1 start
                    $('#message_done').show('slow');
                            $('#message_done').html('Please wait we are verifying you infomation <span id="processdata"></span>');
                            var first_name = $('#first_name').val();
                            var last_name = $('#last_name').val();
                            var email = $('#email').val();
<?php
foreach ($field_array as $field):
    ?>
                        var <?php echo $field; ?> = $('input[name=<?php echo $field; ?>]').val();
    <?php
endforeach;
?>




                    load_data_delete = {'st': 10, 'first_name': first_name, 'last_name': last_name, 'email': email,<?php
$i = 1;
foreach ($field_array as $field):
    ?>
                        'field_value_<?php echo $i; ?>':$('input[name=<?php echo $field; ?>]').val(),
                                'field_name_<?php echo $i; ?>':'<?php echo $field; ?>',
    <?php
    $i++;
endforeach;
?>'mobile_number':$('input[name=mobile_number]').val()};
                    $.post('./lib/signup.php', load_data_delete, function (datados) {
                        //alert(datados);
                        var dataclf = jQuery.parseJSON(datados);
                        var get_status = dataclf.status;
                        var user_id = dataclf.user_id;
                        if (get_status == 1)
                        {
                            var gotpass = dataclf.pass;
                            $('input[name=expass]').val(gotpass);
                            $('#final_auth').html('<i class="fa fa-mobile"></i>');
                            $('#auth_code_place').show('slow');
                            $('input[name=user_id]').val(user_id);
                            $('#message_done').html('Please input your authorization code which is already sent to your phone.');
                        }
                        else
                        {
                            $('#message_done').show('slow');
                            $('#message_done').html('Invalid Information, Please try again with valid info.');
                        }
                    });
                    //step one done
                    }
                });
                });
                
                
             
             
             
             
             
             
             
              function processAfterVerify()
                        {

                            var useridst = $('input[name=user_id]').val();
                            if (useridst != "" || useridst != 0)
                            {
                            var auth_code = $('#auth_code').val();
                                    //step two start
                                    var getexpass = $('input[name=expass]').val();
                                    $('#message_done').hide('slow');
                                    //$('#message_done').html('Please wait we are verifying you infomation <span id="processdata"></span>');
                                    var first_name = $('#first_name').val();
                                    var last_name = $('#last_name').val();
                                    var email = $('#email').val();
<?php
foreach ($field_array as $field):
    ?>
                                var <?php echo $field; ?> = $('input[name=<?php echo $field; ?>]').val();
    <?php
endforeach;
?>




                            load_data_delete = {'st': 11, 'first_name': first_name, 'last_name': last_name, 'email': email,<?php
$i = 1;
foreach ($field_array as $field):
    ?>
                                'field_value_<?php echo $i; ?>':$('input[name=<?php echo $field; ?>]').val(),
                                        'field_name_<?php echo $i; ?>'
                                :'<?php echo $field; ?>',
    <?php
    $i++;
endforeach;
?>
                            'pass'
                            :getexpass, 'mobile_number':$('input[name=mobile_number]').val(), 'user_id':useridst, 'auth_code':auth_code};
                            $.post('./lib/signup.php', load_data_delete, function (datados) {
                                //alert(datados);
                                var dataclf = jQuery.parseJSON(datados);
                                var get_status = dataclf.status;
                                if (get_status == 1)
                                {

                                    $('#finalbutton1').hide();
                                    $('#signup_save').hide();
                                    $('#phoneplace').hide();
                                    $('#final_done').html("Done");
                                    $('#final_auth').html('<i style="font-color:#00AA9A;" class="fa fa-check-circle"></i>');
                                    $('#auth_code_place').html('<h5 class="text-success">Please Wait We Are Processing Your Data To Dostums Home Page. <span id="processdata"></span></h5>');
                                    var getuserst = dataclf.user_id;
                                    if (getuserst != '')
                                    {
                                        window.location.replace("./home.php");
                                    }
                                    else
                                    {
                                        window.location.replace("./home.php");
                                    }
                                }
                                else
                                {
                                    $('#message_done').show('slow');
                                    $('#message_done').html('Invalid Information & Authorization Code, Please try again with valid info.');
                                }
                            });
                            //step two end
                        }
                        else
                        {
                        //step 1 start
                        $('#message_done').show('slow');
                                $('#message_done').html('Please wait we are verifying you infomation <span id="processdata"></span>');
                                var first_name = $('#first_name').val();
                                var last_name = $('#last_name').val();
                                var email = $('#email').val();
                                <?php
                                foreach ($field_array as $field):
                                    ?>
                            var <?php echo $field; ?> = $('input[name=<?php echo $field; ?>]').val();
                                    <?php
                                endforeach;
                                ?>




                        load_data_delete = {'st': 10, 'first_name': first_name, 'last_name': last_name, 'email': email,<?php
                                    $i = 1;
                                    foreach ($field_array as $field):
                                        ?>
                            'field_value_<?php echo $i; ?>':$('input[name=<?php echo $field; ?>]').val(),
                                    'field_name_<?php echo $i; ?>':'<?php echo $field; ?>',
                                                <?php
                                                $i++;
                                            endforeach;
                                            ?>
                        'mobile_number':$('input[name=mobile_number]').val()};
                        $.post('./lib/signup.php', load_data_delete, function (datados) {
                            //alert(datados);
                            var dataclf = jQuery.parseJSON(datados);
                            var get_status = dataclf.status;
                            var user_id = dataclf.user_id;
                            if (get_status == 1)
                            {
                                var gotpass = dataclf.pass;
                                $('input[name=expass]').val(gotpass);
                                $('#final_auth').html('<i class="fa fa-mobile"></i>');
                                $('#auth_code_place').show('slow');
                                $('input[name=user_id]').val(user_id);
                                $('#message_done').html('Please input your authorization code which is already sent to your phone.');
                            }
                            else
                            {
                                $('#message_done').show('slow');
                                $('#message_done').html('Invalid Information, Please try again with valid info.');
                            }
                        });
                        //step one done
                    }
                    }


            function loginfromsignup(log_email, log_password)
            {
                //alert(log_password);
                load_login = {'st': 1, 'email': log_email, 'password': log_password};
                $.post('lib/login.php', load_login, function (data) {
                    if (data == 1)
                    {
                        window.location.replace("./home.php");
                    }
                    else if (data == 2)
                    {
                        window.location.replace("./login.php");
                    }
                    else
                    {
                        alert("Something Went Wrong Please retry Again");
                    }
                });
            }

            function process_data()
            {
                var process = $('#processdata').html();
                if (process == "")
                {
                    $('#processdata').html(".");
                }
                else if (process == ".")
                {
                    $('#processdata').html("..");
                }
                else if (process == "..")
                {
                    $('#processdata').html("...");
                }
                else if (process == "...")
                {
                    $('#processdata').html("");
                }

            }

        </script>
        <script>
        </script>

        <script src="assets/js/script.js"></script>

    </body>
</html>