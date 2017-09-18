<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: profiles.php?user_id=' . $_GET['user_id']);
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

        <div class="main-container page-container section-padd">
            <div class="container-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="panel ">
                                <div class="panel-heading">
                                    <h4 class="pull-left"> <i class="mdi-social-group"></i> <strong> Friend Requests

                                            <span class="label label-danger" id="total_friend_request">
                                                <script>
                                                    jQuery(function () {
                                                        window.setInterval(function () {

                                                            // load_frnd_notification2 = {'st': 8, 'usrid':<?php echo $new_user_id; ?>};
                                                            // $.post('lib/shout.php', load_frnd_notification2, function (data_notification) {
                                                            //     var frndrqst = jQuery.parseJSON(data_notification);
                                                            //     var friend_request = frndrqst.friend_request;
                                                            //     $('#total_friend_request').html(friend_request + "&nbsp;People");
                                                            // });
                                                            $.post('lib/shout.php', {'st': 44}, function (data_notification) {
                                                                $('#total_friend_request').html(data_notification + "&nbsp;People");
                                                            });
                                                        }, 1000);
                                                    });
                                                </script>
                                                0 People
                                            </span>
                                        </strong>
                                      </h4>


                                    <div class="panel-tools pull-right">
                                        <ul class="panel-actions actions">
                                            <!-- [blocklist friend] -->
                                            <li>
                                                <a href="friend-blocklist.php" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    Friends Blocked <span class="label label-danger" id="total_friends_blocked">
                                                        <script>
                                                            jQuery(function () {
                                                                window.setInterval(function () {
                                                                    load_frnd_blocked_notification = {'st': 24, 'iteam':'myFriendBlock'};
                                                                    $.post('lib/shout.php', load_frnd_blocked_notification, function (data_notificationss) {
                                                                        var friends_blocked = jQuery.parseJSON(data_notificationss);
                                                                        var friends_blocked_total = friends_blocked.ttl_friends_blocked;
                                                                        $('#total_friends_blocked').html(friends_blocked_total);

                                                                    });
                                                                }, 1000);
                                                            });
                                                        </script>
                                                        0
                                                    </span> </a>
                                            </li>
                                            <!-- [blocklist friend end] -->

                                            <!-- [connected friend start] -->
                                            <li>
                                                <a href="all-friend-list.php" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    Friends
                                                    <span class="label label-danger" id="total_friend_profile">
                                                        <script>
                                                            jQuery(function () {
                                                                window.setInterval(function () {
                                                                    load_frnd_notification = {'st': 3, 'usrid': '<?php echo $new_user_id; ?>'};
                                                                    $.post('lib/shout.php', load_frnd_notification, function (data_notification) {
                                                                        var frndData = jQuery.parseJSON(data_notification);
                                                                        var friend_request = frndData.friend_request;
                                                                        $('#total_friend_profile').html(friend_request);

                                                                    });
                                                                }, 1000);
                                                            });
                                                        </script>
                                                        0
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- [connected friend end] -->

                                        </ul>
                                    </div>

                                     <div style="clear: both"></div>
                                </div>


                                <div class="panel-body">
                                    <div class="fiend-list-content">
                                        <div class="row">
                                            <?php
                                            include('lib/friends_request_list.php');
                                            ?>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>



                                <!-- <div class="panel-footer">
                                    <nav>
                                        <ul class="pagination">
                                            <li>
                                                <a href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li>
                                                <a href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> -->




                            </div>

                        </div>
                    </div>
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
