<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: user-about-me.php?user_id=' . $_GET['user_id']);
        exit();
    }
} else {
    $new_user_id = $input_by;
}
$new_group_id = $_GET['group_id'];
//profile extra heafer file and script script
include('plugin/profile_extra_headfile.php');
//profile extra heafer file and script script
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
    <div class="container">
        <div class="row">
            <script type="text/javascript">
                function GroupMemBlock(user_id, rowmbid)
                {
                    var group_id = '<?php echo $_GET['group_id'] ?>';
                    $.post('lib/status.php', {'st': 23, 'user_id': user_id, 'group_id': group_id, 'status': 4}, function (data) {
                        if (data == 4)
                        {
                            $('#grp-mem-rbgrid_' + rowmbid).hide('slow');
                        }

                    });
                }

                function GroupMemRemove(user_id, rowmrid)
                {
                    var group_id = '<?php echo $_GET['group_id'] ?>';
                    $.post('lib/status.php', {'st': 23, 'user_id': user_id, 'group_id': group_id, 'status': 0}, function (data) {
                        if (data == 0)
                        {
                            $('#grp-mem-rbgrid_' + rowmrid).hide('slow');
                        }

                    });
                }

                function MakeGroupAdmin(user_id, rowadid)
                {
                    var group_id = '<?php echo $_GET['group_id'] ?>';
                    $.post('lib/status.php', {'st': 24, 'user_id': user_id, 'group_id': group_id}, function (data) {
                        if (data == 1)
                        {
                            $('#grp-mem-rbgrid_' + rowadid).hide('slow');
                        }

                    });
                }

                function GroupBlkdMemUnblock(user_id, rowsid)
                {
                    var group_id = '<?php echo $_GET['group_id'] ?>';
                    $.post('lib/status.php', {'st': 22, 'user_id': user_id, 'group_id': group_id, 'status': 1}, function (data) {
                        if (data == 1)
                        {
                            $('#rqst-grp-mem-bgrid_' + rowsid).hide('slow');
                        }

                    });
                }

                function GroupBlkdMemRemove(user_id, rowtid)
                {
                    var group_id = '<?php echo $_GET['group_id'] ?>';
                    $.post('lib/status.php', {'st': 22, 'user_id': user_id, 'group_id': group_id, 'status': 0}, function (data) {
                        if (data == 0)
                        {
                            $('#rqst-grp-mem-bgrid_' + rowtid).hide('slow');
                        }

                    });
                }



            </script>


            <div style="clear: both"></div>

            <div class="row profile-content-row">
                <div class="col-md-9" style="padding-left: 0px;">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="pull-left"> <i class="fa fa-cog"></i> Group Settings </h4>


                            <div class="panel-tools pull-right">

                                <!--                            <div class="panel-search hide" style="display: block;">
                                                                <input type="text" class="search-input" placeholder="Start typing..." >
                                                                <i class="search-close">×</i>
                                                            </div>-->

                                <ul class="panel-actions actions" style="margin-left: ">
                                    <!--                                <li>
                                                                        <a class="panel-search-trigger" href="">
                                                                            <i class="mdi-action-search"></i>
                                                                        </a>
                                                                    </li>-->
                                </ul>

                            </div>    <div style="clear: both"></div>
                        </div>
                        <div class="panel-body">
                            <div id="photo-content" style="clear:both;" class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body p-0">
                                            <div class="list-group text-left">
                                                <a  href="home.php">
                                                    <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="worknedu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="glyphicon glyphicon-home">&nbsp;&nbsp;</i>Back To Home</button>
                                                </a>
                                                <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="grp-role-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="glyphicon glyphicon-cog">&nbsp;&nbsp;</i>Group Role Setting</button>
                                                <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="grp-sec-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="glyphicon glyphicon-record">&nbsp;&nbsp;</i>Group security </button> 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8" style="border-left: 1px solid #ccc;">
                                    <div id="group-role-settings">
                                        <!--group role setting start-->
                                        <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="glyphicon glyphicon-cog">&nbsp; </i>Group Settings&nbsp;:&nbsp;Group Role Setting</h5>
                                        <!--admin start-->
                                        <div class="control-group" style="margin-bottom: 15px !important;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button id="admins-tab" type="button" class="btn btn-default  "> Admins &nbsp;
                                                        <span class="badge badge-primary" id="total_admin_count">
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
                                                                });</script>
                                                            0
                                                        </span>
                                                    </button>                                                                
                                                </div>
                                                <div class="col-md-4">
                                                    <button id="members-tab" type="button" class="btn btn-default  "> Members &nbsp;
                                                        <span class="badge badge-success" id="total_grpmem_lst">
                                                            <script>
                                                                jQuery(function () {
                                                                    window.setInterval(function () {
                                                                        var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                        load_grpmem_notification = {'st': 9, 'group_id': group_id, 'usrid': '<?php echo $new_user_id; ?>'};
                                                                        $.post('lib/shout.php', load_grpmem_notification, function (data_notification) {
                                                                            var grpmemlst = jQuery.parseJSON(data_notification);
                                                                            var ttl_group_mem = grpmemlst.ttl_group_mem;
                                                                            $('#total_grpmem_lst').html(ttl_group_mem);
                                                                        });
                                                                    }, 1000);
                                                                });</script>
                                                            0
                                                        </span>
                                                    </button>                                                                
                                                </div>
                                                <div class="col-md-4">
                                                    <button id="blocked-tab" type="button" class="btn btn-default  "> Blocked &nbsp;
                                                        <span class="badge badge-danger" id="total_members_blocked">
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
                                                                });</script>
                                                            0
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                $("#admins_list").show('slow');
                                                $("#members_list").hide();
                                                $("#blocked_list").hide();
                                                $("#members-tab").click(function () {
                                                    $("#admins_list").hide('slow');
                                                    $("#members_list").show('slow');
                                                    $("#blocked_list").hide('');
                                                });
                                                $("#blocked-tab").click(function () {
                                                    $("#admins_list").hide();
                                                    $("#members_list").hide('slow');
                                                    $("#blocked_list").show('slow');
                                                });
                                                $("#admins-tab").click(function () {
                                                    $("#admins_list").show('slow');
                                                    $("#members_list").hide();
                                                    $("#blocked_list").hide('slow');
                                                });
                                            });</script>
                                        <!--number1 start-->
                                        <div id="admins_list" style="display: none;">
                                            <div class="col-sm-12" style="margin-bottom: 10px; display: none; border: 1px #09f dotted;"></div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-5">
                                                                <label class="control-label" for="textinput"><strong><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Make Admin by email&nbsp;:</strong></label>
                                                            </div>
                                                            <div class="col-md-7">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <div class="col-md-9"><input   name="textinput" id="input_email" placeholder="Write Email" class=" form-control" type="text"></div>

                                                                    <div class="col-md-3">    
                                                                        <span type="button" class="btn  btn-xs"  id="save_btn"  style="color: #2C99CE;"><i class="fa fa-floppy-o">&nbsp;</i> save</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        $(document).ready(function (e) {
                                                            $('#save_btn').click(function (e) {
                                                                var email_type = $('#input_email').val();
                                                                var group_id = '<?php echo $new_group_id; ?>';
                                                                $.post("./lib/group.php", {'st': 8, 'group_id': group_id, 'email_type': email_type}, function (data) {
                                                                    if (data == 1)
                                                                    {
                                                                        alert('Congrats!!! Successful.');
                                                                    }
                                                                    else
                                                                    {
                                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                                    }

                                                                });
                                                            });
                                                        });</script>
                                                    <div id="group_admins_list">
                                                        <script>
                                                            jQuery(function () {
                                                                var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                load_total_admins = {'st': 21, 'group_id': group_id, 'usrid': '<?php echo $input_by; ?>'};
                                                                $.post('lib/shout.php', load_total_admins, function (data_notificationgadmin) {
                                                                    $('#group_admins_list').html(data_notificationgadmin);
                                                                });
                                                            });</script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--number1 end-->

                                        <!--number2 start-->
                                        <div id="members_list" style="display: none;">

                                            <div class="col-sm-12"   style="margin-bottom: 10px; display: none; border: 1px #09f dotted;">sdfsdfsdf</div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
<!--                                                    <div class="col-md-12"  id="category_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-5">
                                                                <label class="control-label" for="textinput"><strong><i class="fa fa-eye-slash">&nbsp;&nbsp;</i>Add Member by email&nbsp;:</strong></label>
                                                            </div>
                                                            <div class="col-md-7">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <div class="col-md-10"><input id="vision" name="textinput" id="member_email"  value="Write Email" class=" form-control" type="text"></div>

                                                                    <div class="col-md-2">    
                                                                        <span type="button" class="btn btn-xs" id="member_save" style="color: #2C99CE;"><i class="fa fa-envelope-o">&nbsp;</i> Save</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->



                                                    <div id="group_member_list">
                                                        <script>
                                                            jQuery(function () {
                                                                var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                load_total_frnds = {'st': 22, 'group_id': group_id, 'usrid': '<?php echo $input_by; ?>'};
                                                                $.post('lib/shout.php', load_total_frnds, function (data_notification) {
                                                                    $('#group_member_list').html(data_notification);
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--number2 end-->
                                        <!--number3 start-->
                                        <div id="blocked_list" style="display: none;">

                                            <div class="col-sm-12" id="group_about_alert_bar" style="margin-bottom: 10px; display: none; border: 1px #09f dotted;">sdfsdfsdf</div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
<!--                                                    <div class="col-md-12"  id="category_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-4">
                                                                <label class="control-label" for="textinput"><strong><i class="fa fa-eye-slash">&nbsp;&nbsp;</i>Block by email&nbsp;:</strong></label>
                                                            </div>
                                                            <div class="col-md-8">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <div class="col-md-10"><input id="vision" name="textinput"  id="email_block" value="Write Email" class=" form-control" type="text"></div>

                                                                    <div class="col-md-2">    
                                                                        <span type="button" class="btn btn-xs" id="vision_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Save</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->

                                                    <div id="group_mem_blkd_list">
                                                        <script>
                                                            jQuery(function () {
                                                                var group_id = '<?php echo $_GET['group_id']; ?>';
                                                                load_total_mem_rqst = {'st': 23, 'group_id': group_id, 'usrid': '<?php echo $input_by; ?>'};
                                                                $.post('lib/shout.php', load_total_mem_rqst, function (data_notificationgmr) {
                                                                    $('#group_mem_blkd_list').html(data_notificationgmr);
                                                                });
                                                            });</script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--number3 end-->

                                        <!--admin end-->

                                        <!--group role setting end -->
                                    </div>
                                    <div id="group-security-settins">
                                        <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="glyphicon glyphicon-cog">&nbsp; </i>Group Settings&nbsp;:&nbsp;Group Security Setting</h5>
                                        <div class="col-sm-12" id="group_role_alert_bar" style="margin-bottom: 10px; display: none; border: 1px #09f dotted;"></div>
                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                    <div class="col-md-8">
                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-eye-slash">&nbsp;&nbsp;</i>
                                                               <?php
                                                            $getexisting_privacy=$obj->SelectAllByVal("dostums_group","group_id",$new_group_id,"privacy_id");
                                                            $prname=$obj->SelectAllByVal("privacy_setting","id",$getexisting_privacy,"name");
                                                                ?>
                                                                Set your privacy &nbsp;:</strong> 
                                                            <span id="privacy-val"><?php echo $prname; ?></span></label>
                                                    </div>
                                                    <div class="control-group col-md-4">
                                                        <div class="dropdown">
                                                            
                                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span id="prpl"><?php echo $prname; ?></span>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" id="like_iteam" aria-labelledby="dropdownMenu2">
                                                                <?php 
                                                                
                                                                $privacysql=$obj->SelectAll("privacy_setting");
                                                                if(!empty($privacysql))
                                                                    foreach ($privacysql as $privacy):
                                                                        ?>
                                                                <li><a onclick="privacyChange(<?php echo $privacy->id; ?>)" id="privacy_<?php echo $privacy->id; ?>" href="#"><?php echo $privacy->name; ?></a></li>
                                                                        <?php
                                                                    endforeach;
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Category  end-->
                                    </div>
                                    <script>
                                        
                                        function privacyChange(id)
                                        {
                                            var dd=$("#privacy_"+id).html();
                                            $("#privacy-val").html(dd);
                                            $("#prpl").html(dd);
                                            var group_id = '<?php echo $new_group_id; ?>';
                                            $.post("./lib/group.php", {'st': 9, 'group_id': group_id, 'privacy_id': id}, function (data) {
                                                if (data == 1)
                                                {
                                                    alert('Congrats!!! Successful.');
                                                }
                                                else
                                                {
                                                    alert('Sorry!!! Failed. Please Try Again.');
                                                }

                                            });
                                            
                                        }
                                    


                                    </script>



                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#group-security-settins").hide();
                                            $("#grp-sec-btn").click(function () {
                                                $("#group-role-settings").hide('slow');
                                                $("#group-security-settins").show('slow');
                                            });
                                            $("#grp-role-btn").click(function () {
                                                $("#group-role-settings").show('slow');
                                                $("#group-security-settins").hide('slow');
                                            });
                                        });</script>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3" style="padding-right: 0px;">
                    <aside class="side-menu">
                        <?php
                        //friend list start
                        include('plugin/group_profile_member_list.php');
                        //friend list end
                        ?>


                        <?php
                        //Photo list start
                        include('plugin/group_profile_photo_list.php');
                        //Photo list end
                        ?>
                    </aside>
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
                                            $.material.init();
                                            $(".select").dropdown({"autoinit": ".select"});
                                        });
                                        $(document).ready(function () {

                                            $('#calendar-widget').fullCalendar({
                                                contentHeight: 'auto',
                                                theme: true,
                                                header: {
                                                    right: '',
                                                    center: 'prev, title, next',
                                                    left: ''
                                                },
                                                defaultDate: '2014-06-12',
                                                editable: true,
                                                events: [
                                                    {
                                                        title: 'All ',
                                                        start: '2014-06-01',
                                                        className: 'bgm-cyan'
                                                    }

                                                ]
                                            });
                                        });</script>


        <script src="assets/js/jquery.scrollto.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/chat.js"></script>

        </body>
        </html>