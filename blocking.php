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

        <script>
         function ResUserAdd(user_id, rowrbid)
            {
                $.post('lib/status.php', {'st': 33, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#rb_con_lst_' + rowrbid).hide('slow');
                    }

                });
            }
            function ResUserRemove(user_id, rowrbid)
            {
                $.post('lib/status.php', {'st': 33, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#rb_con_lst_' + rowrbid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }
            function BlockUserAdd(user_id, rowdublid)
            {
                $.post('lib/status.php', {'st': 34, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#user_block_lst_' + rowdublid).hide('slow');
                    }

                });
            }
            function BlockUserRemove(user_id, rowdublid)
            {
                $.post('lib/status.php', {'st': 34, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#user_block_lst_' + rowdublid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

             function BlockMassegeAdd(user_id, rowdumblid)
            {
                $.post('lib/status.php', {'st': 35, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#user_message_block_lst_' + rowdumblid).hide('slow');
                    }

                });
            }
            function BlockMassegeRemove(user_id, rowdumblid)
            {
                $.post('lib/status.php', {'st': 35, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#user_message_block_lst_' + rowdumblid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

            function AppEventBlockAdd(user_id, rowdbailid)
            {
                $.post('lib/status.php', {'st': 37, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#app_event_block_lst_' + rowdbailid).hide('slow');
                    }

                });
            }
            function AppEventBlockRemove(user_id, rowdbailid)
            {
                $.post('lib/status.php', {'st': 37, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#app_event_block_lst_' + rowdbailid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

            function EventBlockAdd(user_id, rowdeiblid)
            {
                $.post('lib/status.php', {'st': 39, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#event_block_lst_' + rowdeiblid).hide('slow');
                    }

                });
            }
            function EventBlockRemove(user_id, rowdeiblid)
            {
                $.post('lib/status.php', {'st': 39, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#event_block_lst_' + rowdeiblid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }

            function AppBlockAdd(user_id, rowdbalid)
            {
                $.post('lib/status.php', {'st': 40, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#app_block_lst_' + rowdbalid).hide('slow');
                    }

                });
            }
            function AppBlockRemove(user_id, rowdbalid)
            {
                $.post('lib/status.php', {'st': 40, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#app_block_lst_' + rowdbalid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }
            function PageBlockAdd(user_id, rowdbplid)
            {
                $.post('lib/status.php', {'st': 41, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 1}, function (data) {
                    if (data == 1)
                    {
                        $('#page_block_lst_' + rowdbplid).hide('slow');
                    }

                });
            }
            function PageBlockRemove(user_id, rowdbplid)
            {
                $.post('lib/status.php', {'st': 41, 'user_id': user_id, 'input_by': '<?php echo $new_user_id; ?>', 'status': 0}, function (data) {
                    if (data == 0)
                    {
                        $('#page_block_lst_' + rowdbplid).hide('slow');
                    }
                    else
                    {
                        alert('Something Went Wrong!!! Please Try Again.')
                    }

                });
            }
        </script>

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
                                        <a href="#"     class="list-group-item no-border"><i
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
                                    <h5><strong>Manage Blocking</strong></h5>
                                    <div class="ibox-tools">
                                        <button class="def_button" id="basic_info" type="button">
                                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </button>
                                    </div>
                                </div>
                                <!--Restricted Lis start-->
                                <div class="ibox-content">

                                    <form class="">
                                        <fieldset>
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:77px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Restricted List</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-9"style="padding-left:10px;">When you add friends to your Restricted list they can only see the information and posts that you make public.
                                                                        Dostums does not notify your friends when you add them to your Restricted list</div>
                                                                    <div class="col-md-3">

                                                                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal" type="button">Edit List</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                         </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Restricted List end-->



                                            <!-- Modal edit start-->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:60px; ">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header"style="background-color:#99CA3C;">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel" >Edit Restricted</h4>

                                                        </div>

                                                        <div class="modal-body">
                                                            <!-- Single button -->
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <lebel>Search for restricted</lebel>
<!--                                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="padding-left:22px;">
                                                                        Action <span class="caret"></span>
                                                                    </button>-->

                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="#">On This list</a></li>
                                                                        <li><a href="#">Friends</a></li>

                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-6" style="margin-top: 10px;">
                                                                    <input id="restricted_block_input" type="text" class="form-control" id="exampleInputSearch" placeholder="Search">
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                             <div id="rb_suggestion" class="col-md-9"></div>
                                                               <div class="clearfix"></div>
                                                        </div>
<!--                                                        <div class="modal-footer" style="clear: both; margin-top: 10px;">

                                                            <button type="button" class="btn btn-primary">Finish</button>
                                                        </div>-->
                                                        <!--restricted data start-->
                                                        <fieldset id="legacy_contact" style="display:none;">
                                                                    <div class="col-sm-12" style=" border:1px solid #ccc;">
                                                                        <?php
                                                                         $restricted_contact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        rb.status AS rb_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_restricted_list as rb on rb.restricted_list__id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($restricted_contact))
                                                                            foreach ($restricted_contact as $rescon) {
                                                                                if ($rescon->rb_status == 1) {
                                                                                    ?>

                                                                                    <div id="restr_con_lst_<?php echo $rescon->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $rescon->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $rescon->id; ?>"/>
                                                                                            <strong><?php echo $rescon->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="RestConRemove('<?php echo $rescon->id; ?>', '<?php echo $rescon->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
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
                                                        <!--restricted data end-->

                                                    </div>
                                                     <!--restricted search start -->
                                                            <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#restricted_block_input').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvalrb = $(this).val().length;
                                                                    if (countvalrb >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 1, 'search_rb_data': $(this).val()}, function (datarb) {
                                                                            var dataclrb= jQuery.parseJSON(datarb);
                                                                            var optrb = dataclrb.datarb;
                                                                            $('#rb_suggestion').html(optrb);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvalrb == 0)
                                                                    {
                                                                        $('#rb_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                            <!--restricted search end-->
                                                </div>
                                            </div>
                                            <!-- Modal edit end-->







                                            <!--Block Users start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block Users</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-10"style="padding-left:10px;">

                                                                        Once you block someone, that person can no longer see things you post on your timeline,
                                                                        tag you, invite you to events or groups, start a conversation with you, or add you as a friend.
                                                                        Note: Does not include apps, games or groups you both participate in.
                                                                    </div>



                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName2"style="padding-left:13px;">Block users</label>
                                                                            <input id="uder_block" type="text" class="form-control" size="30" placeholder="Add name Or Email" style="background-color:#fff;border:1px solid green;">
                                                                        </div>

                                                                        <div id="user_block_suggestion" class="col-md-9"></div>

<!--                                                                        <a type="submit" class="btn btn-info">Block</a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>



                                                            </div>

                                                        </div>
                                                        <!--block users data from database start-->
                                                        <?php
                                                                         $restricted_contact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dubl.status AS dubl_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_users_block_list as dubl on dubl.user_block_list_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($user_block_list_contact))
                                                                            foreach ($user_block_list_contact as $ublcon) {
                                                                                if ($ublcon->dubl_status == 1) {
                                                                                    ?>

                                                                                    <div id="user_block_lst_<?php echo $ublcon->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $ublcon->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $ublcon->id; ?>"/>
                                                                                            <strong><?php echo $ublcon->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="RestConRemove('<?php echo $ublcon->id; ?>', '<?php echo $ublcon->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                        <!--block users data from database end-->

                                                    </div>
                                                    <!--block user search start -->
                                                            <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#uder_block').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldubl = $(this).val().length;
                                                                    if (countvaldubl >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 2, 'search_dubl_data': $(this).val()}, function (datadubl) {
                                                                            var datacldubl= jQuery.parseJSON(datadubl);
                                                                            var optdubl = datacldubl.datadubl;
                                                                            $('#user_block_suggestion').html(optdubl);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldubl == 0)
                                                                    {
                                                                        $('#user_block_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                            <!--block user search end-->
                                                </div>
                                            </div>

                                            <!--Block Users end-->

                                            <!--Block messages start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block messages</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-10"style="padding-left:10px;">

                                                                        If you block messages and video calls from someone here,
                                                                        they won't be able to contact you in the Messenger app either.
                                                                        Unless you block someone's profile, they may be able to post on your Timeline,
                                                                        tag you, and comment on your posts or comments.<a href="3" style="color:#2C99CE;"> Learn more.</a>
                                                                    </div>


                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName2" style="padding-left:9px;">Block messages from</label>
                                                                            <input type="text" class="form-control" id="user_message_block" placeholder="Type the name of a friend"   size="30" style="border:1px solid green;">
                                                                        </div>
                                                                         <div id="user_message_block_suggestion" class="col-md-9"></div>

<!--                                                                        <a type="submit" class="btn btn-info">Block</a>-->
                                                                    </div>
                                                                </div>
                                                             </div>
                                                            <!--user message block data from database start-->
                                                             <?php
                                                                         $User_message_contact = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dumbl.status AS dumbl_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_users_message_block_list as dumbl on dumbl.user_message_block_list_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($user_message_block_list_contact))
                                                                            foreach ($user_message_block_list_contact as $umblcon) {
                                                                                if ($umblcon->dumbl_status == 1) {
                                                                                    ?>

                                                                                    <div id="user_message_block_lst_<?php echo $umblcon->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $umblcon->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $umblcon->id; ?>"/>
                                                                                            <strong><?php echo $umblcon->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="RestConRemove('<?php echo $umblcon->id; ?>', '<?php echo $umblcon->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                            <!--user message block data from database end-->

                                                        </div>

                                                    </div>
                                                    <!--block user who send you unnecessarily message search start -->
                                                            <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#user_message_block').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldumbl = $(this).val().length;
                                                                    if (countvaldumbl >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 3, 'search_dumbl_data': $(this).val()}, function (datadumbl) {
                                                                            var datacldumbl= jQuery.parseJSON(datadumbl);
                                                                            var optdumbl = datacldumbl.datadumbl;
                                                                            $('#user_message_block_suggestion').html(optdumbl);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldumbl == 0)
                                                                    {
                                                                        $('#user_message_block_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                            <!--block user who send you unnecessarily message search end-->
                                                </div>
                                            </div>

                                            <!--Block messages end-->



                                            <!--Block app invites start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block app invites</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-10"style="padding-left:10px;">

                                                                        Once you block app invites from someone, you'll automatically ignore future app requests from that friend.
                                                                        To block invites from a specific friend, click the "Ignore All Invites From This Friend" link under your latest request.
                                                                    </div>



                                                                </div>
                                                                <div class="col-md-12">

                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName2" style="padding-left:12px;">Block app invites</label>
                                                                            <input type="text" class="form-control" id="app_event_input" placeholder="Type the name of a friend"   size="50" style="background-color:#fff;border:1px solid green;" >
                                                                        </div>
                                                                     </div>
                                                                    <div id="app_event_block_suggestion" class="col-md-9"></div>
                                                                </div>



                                                            </div>

                                                        </div>
                                                         <!--app event block data from database start-->
                                                             <?php
                                                                         $App_Event_block = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dbail.status AS dbail_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_block_app_invites_list as dbail on dbail.app_invites_block_list=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($app_event_block_list))
                                                                            foreach ($app_event_block_list as $aebl) {
                                                                                if ($aebl->dbail_status == 1) {
                                                                                    ?>

                                                                                    <div id="user_message_block_lst_<?php echo $aebl->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $aebl->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $aebl->id; ?>"/>
                                                                                            <strong><?php echo $aebl->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="AppEventBlockRemove('<?php echo $aebl->id; ?>', '<?php echo $aebl->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                            <!--app event block data from database end-->

                                                    </div>
                                                </div>
                                                <!--block app invite script start-->
                                                 <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#app_event_input').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldbail = $(this).val().length;
                                                                    if (countvaldbail >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 4, 'search_dbail_data': $(this).val()}, function (datas) {
                                                                            var datacldbail= jQuery.parseJSON(datas);
                                                                            var optdbail = datacldbail.datadbail;
                                                                            $('#app_event_block_suggestion').html(optdbail);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldbail == 0)
                                                                    {
                                                                        $('#app_event_block_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                <!--block app invite script end-->
                                            </div>


                                            <!--Block app invites end-->



                                            <!--Block event invites start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block event invites</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12">
                                                                    <div class="col-md-10"style="padding-left:10px;">

                                                                        Once you block event invites from someone, you'll automatically ignore future event requests from that friend.
                                                                    </div>



                                                                </div>
                                                                <div class="col-md-12">

                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label style="padding-left:10px;">Block event invites</label>
                                                                            <input type="text" class="form-control"   size="48" id="event_invite_input" placeholder="Type the name of a friend" style="background-color:#fff; border:1px solid green;">
                                                                        </div>

                                                                         <div id="event_invite_block_suggestion" class="col-md-9"></div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                         <!-- event block data from database start-->
                                                         <?php
                                                                         $App_Event_block = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        deibl.status AS deibl_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostums_event_invite_block_list as deibl on deibl.event_block_list_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($event_block_list))
                                                                            foreach ($event_block_list as $deibl) {
                                                                                if ($deibl->deibl_status == 1) {
                                                                                    ?>

                                                                                    <div id="user_event_block_lst_<?php echo $deibl->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $deibl->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $deibl->id; ?>"/>
                                                                                            <strong><?php echo $deibl->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="AppEventBlockRemove('<?php echo $deibl->id; ?>', '<?php echo $deibl->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                            <!-- event block data from database end-->

                                                    </div>
                                                </div>
                                                <!--block event invite script start-->
                                                 <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#event_invite_input').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldeibl = $(this).val().length;
                                                                    if (countvaldeibl >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 5, 'search_deibl_data': $(this).val()}, function (datadeibl) {
                                                                            var datacldeibl= jQuery.parseJSON(datadeibl);
                                                                            var optdeibl = datacldeibl.datadeibl;
                                                                            $('#event_invite_block_suggestion').html(optdeibl);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldeibl == 0)
                                                                    {
                                                                        $('#event_invite_block_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                <!--block event invite script end-->
                                            </div>


                                            <!--Block event invites end-->



                                            <!--Block apps start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block apps</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 ">
                                                                    <div class="col-md-10"style="padding-left:10px;">
                                                                         Once you block an app, it can no longer contact you or get non-public information about you through Facebook.<a style="color:#2C99CE;"> Learn more.</a>
                                                                    </div>
                                                                 </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName2"style="padding-left:10px;">Block apps</label>
                                                                            <input type="text" class="form-control" id="blocked_app_input" placeholder="Type the name of a friend"  size="55" style="background-color:#fff;border:1px solid green; ">
                                                                        </div>
                                                                      </div>
                                                                </div>

                                                            <div id="blocked_app_suggestion" class="col-md-9"></div>

                                                            </div>

                                                        </div>
                                                         <!-- app block data from database start-->
                                                         <?php
                                                                         $App_Event_block = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dbal.status AS dbal_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostumas_blocked_app_list as dbal on dbal.blocked_app_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($blocked_app_list))
                                                                            foreach ($blocked_app_list as $dbal) {
                                                                                if ($dbal->dbal_status == 1) {
                                                                                    ?>

                                                                                    <div id="app_block_lst_<?php echo $dbal->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $dbal->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $dbal->id; ?>"/>
                                                                                            <strong><?php echo $dbal->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="BlockeedAppRemove('<?php echo $dbal->id; ?>', '<?php echo $dbal->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                            <!-- app block data from database end-->
                                                     </div>
                                                </div>
                                                 <!--blocked app  script start-->
                                                 <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#blocked_app_input').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldbal = $(this).val().length;
                                                                    if (countvaldbal >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 6, 'search_dbal_data': $(this).val()}, function (datadbal) {
                                                                            var datacldbal= jQuery.parseJSON(datadbal);
                                                                            var optdbal = datacldbal.datadbal;
                                                                            $('#blocked_app_suggestion').html(optdbal);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldbal == 0)
                                                                    {
                                                                        $('#blocked_app_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                <!--blocked app script end-->
                                            </div>


                                            <!--Block apps end-->




                                            <!--Block page start-->
                                            <div class="row form-group" id="Posts_panel">
                                                <div class="col-sm-12">
                                                    <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px; height:auto;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Block Pages</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 "style="padding-left:22px;">


                                                                    Once you block a Page, that Page can no longer interact with your posts or like or reply to your comments.
                                                                    You'll be unable to post to the Page's Timeline or message the Page.
                                                                    If you currently like the Page, blocking it will also unlike and unfollow it.



                                                                </div>
                                                                <div class="col-md-12">

                                                                    <div class="form-inline">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputName2"style="padding-left:8px;">Block Pages</label>
                                                                            <input type="text" class="form-control" id="blocked_page_input" size="54" placeholder="Type the name of a friend" style="background-color:#fff; margin-top: 10px;border: 1px solid green;">
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div id="blocked_page_suggestion" class="col-md-9"></div>


                                                            </div>

                                                        </div>
                                                         <!-- page block data from database start-->
                                                         <?php
                                                                         $page_block = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
                                                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
                                                                        IFNULL(a.city_id,'none') as city_id,
                                                                        a.country_id, IFNULL(dc.country_name,'none') as country_name,
                                                                        cdfu.status as ustatus,
                                                                        cdf.status as frnd_status,
                                                                        dbpl.status AS dbpl_status
                                                                        from `dostums_user_view` as a
                                                                        left JOIN dostums_country as dc ON dc.id=a.`country_id`
                                                                        left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
                                                                        left JOIN dostums_photo as dp ON dp.id=pf.photo_id
                                                                        LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
                                                                        LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
                                                                        LEFT JOIN dostumas_blocked_page_list as dbpl on dbpl.blocked_page_id=a.id
                                                                        GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
                                                                        if (!empty($blocked_page_list))
                                                                            foreach ($blocked_page_list as $dbpl) {
                                                                                if ($dbpl->dbpl_status == 1) {
                                                                                    ?>

                                                                                    <div id="page_block_lst_<?php echo $dbpl->id; ?>" style="margin-top:5px;">
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <img class="thumb48 img-thumbnail" src="./profile/<?php echo $dbpl->photo; ?>" style="height:40px; width: 40px;">
                                                                                        </div>
                                                                                        <div class="col-sm-6 text-left">
                                                                                            <input id="friend_id" type="hidden" value="<?php echo $dbpl->id; ?>"/>
                                                                                            <strong><?php echo $dbpl->name; ?></strong>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-left">
                                                                                            <button type="button" onclick="BlockedPageRemove('<?php echo $dbpl->id; ?>', '<?php echo $dbpl->id; ?>')" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix" style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #ccc;"></div>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                            <!-- page block data from database end-->

                                                    </div>
                                                </div>
                                                 <!--blocked page  script start-->
                                                 <script type="text/javascript">
                                                            $('document').ready(function () {
                                                                $('#blocked_page_input').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
                                                                    var countvaldbpl = $(this).val().length;
                                                                    if (countvaldbpl >= 4)
                                                                    {
                                                                        $.post("./lib/blocking_search.php", {'st': 7, 'search_dbpl_data': $(this).val()}, function (datadbpl) {
                                                                            var datacldbpl= jQuery.parseJSON(datadbpl);
                                                                            var optdbpl = datacldbpl.datadbpl;
                                                                            $('#blocked_page_suggestion').html(optdbpl);
                                                                            $.ajaxSetup({cache: false});
                                                                        });

                                                                    }
                                                                    else if (countvaldbpl == 0)
                                                                    {
                                                                        $('#blocked_page_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                                                                        location.reload();
                                                                    }
                                                                });

                                                            });
                                                        </script>
                                                <!--blocked page script end-->
                                            </div>

                                             <!--Block page end-->

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
