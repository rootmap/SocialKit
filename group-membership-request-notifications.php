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
                    function GroupRqstConfirm(user_id,rowsid)
                        {
                                var group_id='<?php echo $_GET['group_id'] ?>';        
                                $.post('lib/status.php', {'st': 22,'user_id':user_id, 'group_id': group_id, 'status':1}, function (data){
                                    if (data == 1)
                                    {
                                            $('#rqst-grp-mem-sgrid_'+rowsid).hide('slow');
                                    }

                                });
                        }
                        
                        function GroupRqstReject(user_id,rowtid)
                        {
                                var group_id='<?php echo $_GET['group_id'] ?>';        
                                $.post('lib/status.php', {'st': 22,'user_id':user_id, 'group_id': group_id, 'status':0}, function (data){
                                    if (data == 0)
                                    {
                                            $('#rqst-grp-mem-sgrid_'+rowtid).hide('slow');
                                    }

                                });
                        }
			
		</script>

        <div class="main-container page-container section-padd">
            <div class="mailbox-content">
                <div class="container">
<!--                    <div class="row">
                        <div class="col-sm-12"><h4 class="pull-left page-title"><i class="mdi-action-settings"></i> settings
                                <span class="sub-text"> Manage My Profile  </span></h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="#">Profile</a></li>
                                <li><a href="setting.php">Setting</a></li>
                                <li class="active">Privacy</li>
                            </ol>
                        </div>
                    </div>-->
                    <div class="row">
<!--                        <div class="col-lg-3 col-md-3 ">

                            <div class="panel panel-default">
                                <div class="panel-body p-0">
                                    <div class="list-group mail-list">
                                        <a href="setting.php" class="list-group-item no-border active"><i
                                                class="mdi-action-settings-applications"></i>General </a>
                                        <a href="security_settings.php" class="list-group-item no-border"><i
                                                class="mdi-hardware-security"></i>Security </a>
                                        <hr class="lihr">
                                        <a href="#" class="list-group-item no-border"><i class="mdi-content-block"></i>Blocking
                                        </a> <a href="#" class="list-group-item no-border"><i
                                                class="mdi-social-notifications"></i>Notifications </a>
                                        <a href="#"     class="list-group-item no-border"><i
                                                class="mdi-social-people"></i>Followers
                                            <b>(354)</b></a>
                                        <hr class="lihr">
                                        <a href="#"     class="list-group-item no-border"><i
                                                class="mdi-action-assignment"></i>Ads
                                            <b>(354)</b></a>

                                        <a href="#"     class="list-group-item no-border"><i
                                                class="mdi-action-payment"></i>Payments
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-lg-12 col-md-12">

                            <div class="panel ">
                                <div class="panel-heading">
                                    <h4 class="pull-left"> 
                                        <i class="mdi-social-group"></i>
                                        <strong>Membership Requests <span class="label label-danger" id="total_membership_request">
                                                    <script>
														jQuery(function () {
															window.setInterval(function () {
																var group_id ='<?php echo $_GET['group_id']; ?>';
																load_group_rqst_notifications = {'st': 12, 'group_id':group_id};
																$.post('lib/shout.php', load_group_rqst_notifications, function (grp_mem_rqst) {
																	var grpmemrqst = jQuery.parseJSON(grp_mem_rqst);
																	var ttl_group_mem_reqst = grpmemrqst.ttl_group_mem_reqst;
																	$('#total_membership_request').html(ttl_group_mem_reqst + "&nbsp;People");
	
																});
															}, 1000);
														});
													</script>
													0
                                                    </span></strong>
                                    </h4>


                                    <div class="panel-tools pull-right">


                                        <ul class="panel-actions actions">
                                            <li>
                                                <a href="./group-admin-list.php?group_id=<?php echo $_GET['group_id']; ?>" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    Group Admins <span class="label label-danger" id="total_admin_count">
                                                        <script>
                                                            jQuery(function () {
                                                                window.setInterval(function () {
                                                                    var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                    load_group_admin_notifications = {'st': 16, 'group_id': group_id};
                                                                    $.post('lib/shout.php', load_group_admin_notifications, function (grp_admin_data) {
                                                                        var grpmemradmin = jQuery.parseJSON(grp_admin_data);
                                                                        var ttl_group_admin = grpmemradmin.ttl_group_admin;
                                                                        $('#total_admin_count').html(ttl_group_admin);

                                                                    });
                                                                }, 1000);
                                                            });
                                                        </script>
                                                        0
                                                    </span> </a>
                                            </li>
                                            <li>
                                                <a href="./group-membership-blocked-notifications.php?group_id=<?php echo $_GET['group_id']; ?>" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    Members Blocked <span class="label label-danger" id="total_members_blocked">
                                                        <script>
                                                            jQuery(function () {
                                                                window.setInterval(function () {
                                                                    var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                    load_group_rqst_notifications = {'st': 14, 'group_id': group_id};
                                                                    $.post('lib/shout.php', load_group_rqst_notifications, function (grp_mem_rqst) {
                                                                        var grpmemrblkd = jQuery.parseJSON(grp_mem_rqst);
                                                                        var ttl_group_mem_blocked = grpmemrblkd.ttl_group_mem_blocked;
                                                                        $('#total_members_blocked').html(ttl_group_mem_blocked);

                                                                    });
                                                                }, 1000);
                                                            });
                                                        </script>
                                                        0
                                                    </span> </a>
                                            </li>


                                            <li>
                                                <a href="./all-group-member-list.php?group_id=<?php echo $_GET['group_id']; ?>" class="  "><i
                                                        class="mdi-social-people"></i>
                                                    	Members
                                                        <span class="label label-danger" id="total_grpmem_lst">
                                                                <script>
                                                                    jQuery(function () {
                                                                        window.setInterval(function () {
                                                                            var group_id ='<?php echo $_GET['group_id']; ?>';
                                                                            load_grpmem_notification = {'st': 9,'group_id':group_id,'usrid':'<?php echo $new_user_id; ?>'};
                                                                            $.post('lib/shout.php', load_grpmem_notification, function (data_notification) {
                                                                                var grpmemlst = jQuery.parseJSON(data_notification);
                                                                                var ttl_group_mem = grpmemlst.ttl_group_mem;
                                                                                $('#total_grpmem_lst').html(ttl_group_mem);
                
                                                                            });
                                                                        }, 1000);
                                                                    });
                                                                </script>
                                                                0
                                                                </span>
                                                    </a>
                                            </li>
                                            <!--<li>
                                                <a href="">
                                                    <i class="mdi-social-plus-one"></i> Add Friend
                                                </a>
                                            </li>



                                            <li class="dropdown">
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


                                        </ul>





                                    </div>    <div style="clear: both"></div>
                                </div>
                                <div class="panel-body">

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

                                    <div class="fiend-list-content">

                                        <div id="search-result-feed" class="row">

                                        </div>


                                        <div id="default-feed" class="row">
                                            <?php
                                            include('lib/group-mem-rqst-notifcations.php');
                                            ?>
                                        </div>

                                    </div><!--fiend-list-content-->



                                    <div style="clear:both;"></div>


                                </div>

                                <div class="panel-footer">

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