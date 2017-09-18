<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: all-friend_list.php?user_id=' . $_GET['user_id']);
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
        <script type="text/javascript">


      			// function FriendsBlock(buser_id, myid)
      			function FriendsBlock(myid)
      				{
                var blockID = $("#blockID").val();
                // var blockID = buser_id;
                var myID = myid;
                var block_reason = $('#reason').val();
                var blockType = 'myFriendBlock';

      						$.post('lib/block.php', {'st': 1,'blockID':blockID, 'myID':myID, 'block_reason':block_reason, 'blockType':blockType },
                  function (data){
      							if (data == 1)
      							{
                                        swal("", "Successfully Blocked!", "success");
                                        setTimeout(function(){ location.reload(); }, 2000);

      							}

      						});
      				}

        			function FriendsUnfriend(user_id,myid)
        				{
                  var user_id = user_id;
                  // var input_by = myid;
                    $.post('lib/friend.php',{'st':0,'input_by':<?php echo $new_user_id?>,'usrid':user_id,
                           function (response){
                              swal("", "Successfully Unfriend!", "success");
                              setTimeout(function(){ location.reload(); }, 2000);
                          }
                   });

        				}

		     </script>

            <div class="mailbox-content">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="panel ">
                                <div class="panel-heading">
                                    <h4 class="pull-left">
                                        <i class="mdi-social-group"></i>
                                        <strong>Friends
                                            <span class="label label-danger" id="total_friend_profile">
                                                <script>
                                                    jQuery(function () {
                                                        window.setInterval(function () {
                                                            load_frnd_notification = {'st': 3, 'usrid':'<?php echo $new_user_id; ?>'};
                                                            $.post('lib/shout.php', load_frnd_notification, function (data_notification) {
                                                                var frndData = jQuery.parseJSON(data_notification);
                                                                var friend_request = frndData.friend_request;
                                                                $('#total_friend_profile').html(friend_request + " People");

                                                            });
                                                        }, 1000);
                                                    });
                                                </script>
                                                0 people

                                            </span>
                                        </strong>
                                    </h4>


                                    <div class="panel-tools pull-right">


                                        <ul class="panel-actions actions">
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

                                            <li>
                                                <a href="friend-requests.php" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    Friend Requests <span class="label label-danger" id="total_friend_request">
                                                    <script>
                          														jQuery(function () {
                          															window.setInterval(function () {
                          																// load_frnd_notification2 = {'st': 8, 'usrid':<?php echo $new_user_id; ?>};
                          																// $.post('lib/shout.php', load_frnd_notification2, function (data_notification) {
                          																// 	var frndrqst = jQuery.parseJSON(data_notification);
                          																// 	var friend_request = frndrqst.friend_request;
                          																// 	$('#total_friend_request').html(friend_request);
                                                          //
                          																// });
                                                          $.post('lib/shout.php', {'st': 44}, function (data_notification) {
                                                              $('#total_friend_request').html(data_notification);
                                                          });
                          															}, 1000);
                          														});
                          													</script>
                          													0
                                                    </span> </a>
                                            </li>



                                      <!-- [sorted by dropdown list start]  -->
                                            <!--<li class="dropdown">
                                                <a aria-expanded="true" data-toggle="dropdown" href="">
                                                    <i class="mdi-content-sort"></i> Sort by
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a href="">Last Modified</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Last Added</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Name</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Location</a>
                                                    </li>
                                                </ul>
                                            </li>-->
                                         <!-- [sorted by dropdown list end]  -->

                                        </ul>





                                    </div>

                                    <div style="clear: both"></div>
                                </div>
                                <div class="panel-body">


                                <!-- [search and item list start]  -->
                                    <!--<div class="panel-body-action-bar col-lg-12">
                                        <div class="panel-tools pull-left">

                                            <div style="display: block;" class="panel-search hide">
                                                <input id="search_infl" type="text" placeholder="Start typing..." class="search-input">
                                                <i class="search-close">×</i>
                                                <script>
                                                    $('document').ready(function (e) {
                                                        $('#search-result-feed').hide()
                                                        $('#search_infl').keyup(function (e) {
                                                            $('#default-feed').hide();
                                                            var countvalues = $(this).val().length;
                                                            if (countvalues >= 4)
                                                            {
                                                                $.post("./lib/search_in_friendlist.php", {'st': 1, 'search_frl_data': $(this).val()}, function (fetch) {
                                                                    var datacl = jQuery.parseJSON(fetch);
                                                                    var opt3 = datacl.sitedata;
                                                                    $('#default-feed').hide();
                                                                    $('#search-result-feed').show();
                                                                    $('#search-result-feed').html(opt3);
                                                                });

                                                            }
                                                            else if (countvalues == 0)
                                                            {
                                                                $('#search-result-feed').hide();
                                                                $('#default-feed').show();
                                                            }
                                                            else
                                                            {

                                                            }
                                                        });

                                                    });


                                                </script>
                                            </div>

                                            <ul style="padding-left: 0px;" class="panel-actions actions">
                                                <li>
                                                    <a class="active" href="">                                                 All Friends <small class="text-muted">505</small></a>
                                                </li><li>
                                                    <a class="" href="">College </a>
                                                </li><li>
                                                    <a class="" href="">                                                 All Friends </a>
                                                </li><li>
                                                    <a class="" href="">Hometown</a>
                                                </li><li>
                                                    <a class="" href="">Followers</a>
                                                </li>




                                                <li>
                                                    <a href="">
                                                        Following</a>
                                                </li>

                                                <li>
                                                    <a class="panel-search-trigger" href="">
                                                        <i class="mdi-action-search"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>-->
                                  <!-- [search and item list end]  -->


                                    <div class="fiend-list-content">
                                        <div id="search-result-feed" class="row">
                                        </div>
                                        <div id="default-feed" class="row">
                                            <?php
                                            include('lib/friends_list.php');
                                            ?>
                                        </div>

                                    </div>



                                    <div style="clear:both;"></div>

                                </div>

                                <div class="panel-footer">

                                    <!-- <nav>
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
                                    </nav> -->

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
