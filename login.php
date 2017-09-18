<?php
include('class/db_Class.php');
$obj = new db_class();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums : <?php
            include('class/login.php');
            $login = new loginClass();
             $signup_ip = $login->GetPcAddress();
             
             echo 'Login';
            ?></title>

        <?php
        include('plugin/header_script.php');
        ?>
        <script>
            $(document).ready(function (e) {
                $.cookie('count', '0');
                $.cookie('count2', '0');
                $.cookie('count3', '0');
            });
        </script>
        <script src="lib/jquery.cookie.js"></script>
    </head>
    <body class="home">
        <header>
            <div class="header-wrapper">
                <?php include('plugin/non_user_header.php'); ?>
            </div>
        </header>


        <div class="main-container page-container section-padd page-login">

            <div class="container front-card">

                <div class="row">

                    <div class="col-sm-6">
                        <div class="front-welcome-text front-welcome-text-login">
                            <h1>Welcome to Dostums.</h1>

                            <p>Connect with your friends &mdash; and other fascinating people. Get in-the-moment updates on the
                                things that interest you. And watch events unfold, in real time, from every angle.</p>

                            <a href="./signup.php" class="btn btn-embossed btn-danger"><strong>Join With Us</strong></a>
                            <p>Please click Join With Us if you don't have a account in dostums.</p>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="logged-container">
                            <div class="login-box from-box-wrapper">

                                <div class="main">


                                    <?php if (isset($_GET['reset'])) { ?>
                                        <form role="form" name="forget-password" id="form-signin" class="active">

                                            <h3>Please Type Your <a  class="signin-toggle active" color="#0099CC">Reset</font> Code Here.</a>

                                                <div class="form-group">
                                                    <label for="email"><br><h5>For Reset Code Please Check Your Email.</h5></label>
                                                    <input type="text" name="reset_code" placeholder="Type Your Reset Code" id="reset_code" class="form-control " tabindex="4">
                                                </div>



                                                <button type="button" id="reset_login" class="btn btn btn-primary">
                                                    Send Reset Link
                                                </button>
                                        </form>
                                    <?php } elseif (isset($_GET['reset-password'])) { ?>
                                        <form role="form" name="forget-password" id="form-signin" class="active">

                                            <h3>Please Type Your <a  class="signin-toggle active" color="#0099CC">New</font> Password</a>

                                                <div class="form-group">
                                                    <label for="inputPassword"><h5>New Password</h5></label>
                                                    <input type="password" class="form-control" id="inputPassword">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputPassword"><h5>Re - Type Password</h5></label>
                                                    <input type="password" class="form-control" id="reinputPassword">
                                                </div>



                                                <button type="button" id="reset_password" class="btn btn btn-primary">
                                                    Reset Password
                                                </button>
                                        </form>
                                    <?php } else { ?>

                                        <form role="form" name="logg" id="form-signin" class="active">
                                            <h3 style="color:#00AA9A;">Please Provide Your Login Info</h3>
                                            <h5 style="display: none;" class='text-danger' id="invalid_login">Invalid Login Info. Please input Valid Info</h5>

                                            <div class="form-group">
                                                <label for="inputUsernameEmail">Username or email</label>
                                                <input type="text" class="form-control" id="inputUsernameEmail">
                                            </div>

                                            <div class="form-group">
                                                <a class="pull-right signup-toggle">Forgot password?</a>
                                                <label for="inputPassword">Password</label>
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                            <div class="checkbox pull-right">
                                                <label>
                                                    <input type="checkbox">
                                                    Remember me </label>
                                            </div>
                                            <button type="button" id="logins" class="btn btn btn-primary">
                                                Log In
                                            </button>
                                        </form>

                                        <form role="form" name="forget-password" id="form-signup" class="">

                                            <h3><font color="#0099CC">Reset</font> Your Password. or <a class="signin-toggle">login</a></h3>

                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" name="email" placeholder="Type Your Email Address" id="reset_email" class="form-control " tabindex="4">
                                            </div>



                                            <button type="button" id="forgetpassword" class="btn btn btn-primary">
                                                Send Reset Link
                                            </button>
                                        </form>
                                    <?php } ?>


                                </div>
                            </div>

                        </div></div>

                </div>


            </div>


        </div>
    </div>

    <?php include('plugin/fotter.php') ?>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
    <script src="assets/material/js/ripples.min.js"></script>
    <script src="assets/material/js/material.min.js"></script>
    <script>
            $(document).ready(function () {

                $('#inputPassword, #inputUsernameEmail').keypress(function (e) {
                    if (e.which == 13) {
                        var log_email = $('#inputUsernameEmail').val();
                        var log_password = $('#inputPassword').val();
                        dostumslogin(log_email, log_password);
                    }
                });

//            $('').keypress(function (e) {
//                if (e.which == 13) {
//                    var log_email = $('#inputUsernameEmail').val();
//                    var log_password = $('#inputPassword').val();
//                    dostumslogin(log_email, log_password);
//                }
//            });

                $("#logins").click(function () {
                    var log_email = $('#inputUsernameEmail').val();
                    var log_password = $('#inputPassword').val();
                    dostumslogin(log_email, log_password);

                });

                function dostumslogin(log_email, log_password)
                {
                    load_login = {'st': 1, 'email': log_email, 'password': log_password};
                    $.post('lib/login.php', load_login, function (data) {
                        if (data == 1)
                        {
                            window.location.replace("./home.php");
                        }
                        else if (data == 2)
                        {
                            //window.location.replace("./login.php");
                            $('#invalid_login').show('slow');
                        }
                        else
                        {
                            $('#invalid_login').show('slow');
                        }
                    });
                }

                $("#forgetpassword").click(function () {
                    var log_email = $('#reset_email').val();
                    //alert(log_email);
                    load_login = {'st': 2, 'email': log_email};
                    $.post('lib/login.php', load_login, function (data) {
                        if (data == 1)
                        {
                            window.location.replace("./login.php?reset");
                        }
                        else if (data == 2)
                        {
                            window.location.replace("./login.php");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                            //window.location.replace("./login.php");
                        }
                    });
                });



                $("#reset_password").click(function () {
                    var log_npassword = $('#inputPassword').val();
                    var log_rpassword = $('#reinputPassword').val();
                    //alert(log_email);
                    load_login = {'st': 3, 'password': log_npassword};
                    if (log_npassword == log_rpassword)
                    {
                        $.post('lib/login.php', load_login, function (data) {
                            if (data == 1)
                            {
                                alert("Your Password Changed Successfully, Please Login Using New Password.");
                                window.location.replace("./login.php");
                            }
                            else if (data == 2)
                            {
                                window.location.replace("./login.php?reset-password");
                            }
                            else
                            {
                                alert("Something Went Wrong Please retry Again");
                                //window.location.replace("./login.php");
                            }
                        });
                    }
                    else
                    {
                        alert("Password Mismatch.");
                    }
                });

                $("#reset_login").click(function () {
                    var reset_code = $('#reset_code').val();
                    //alert(log_email);
                    load_login = {'st': 4, 'reset_code': reset_code};
                    $.post('lib/login.php', load_login, function (data) {
                        if (data == 1)
                        {
                            window.location.replace("./login.php?reset-password");
                        }
                        else if (data == 0)
                        {
                            alert("Empty Reset Code Not Allowed.");
                            $("#reset_code").css("border-color", "#f00");
                        }
                        else if (data == 2)
                        {
                            alert("Invalid Reset Code. Please Check Your Email &amp; Re-Type Your Reset.");
                            window.location.replace("./login.php?reset");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                            //window.location.replace("./login.php");
                        }
                    });
                });

                // This command is used to initialize some elements and make them work properly
                $.material.init();
                $(".select").dropdown({"autoinit": ".select"});



            });
    </script>

    <script src="assets/js/script.js"></script>

</body>
</html>
