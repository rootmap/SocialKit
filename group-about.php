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

include './plugin/group_admin.php';
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
            <?php
//profile photo and cover photo
            //include('plugin/profile_photo_n_cover.php');
//profile photo and cover photo
            ?>


            <div style="clear: both"></div>

            <div class="row profile-content-row">
                <div class="col-md-9" style="padding-left: 0px;">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="pull-left"> <i class="fa fa-users"></i> About Group </h4>


                            <div class="panel-tools pull-right">

                                <!--                            <div class="panel-search hide" style="display: block;">
                                                                <input type="text" class="search-input" placeholder="Start typing..." >
                                                                <i class="search-close">×</i>
                                                            </div>-->
                                
                                <ul class="panel-actions actions">
                                    <li>
                                        <a id="edit-group-info" href="./group.php?group_id=<?php echo $new_group_id; ?>">
                                            <i class="fa fa-home"></i> Back To Home
                                        </a>
                                    </li>
                                    <?php if(in_array($input_by,$admin_list)){ ?>
                                    
                                    <li>
                                        <a id="edit-group-info" href="javascript:void(0);">
                                            <i class="mdi-editor-mode-edit"></i> Edit Group Info
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                
                            </div>    <div style="clear: both"></div>
                        </div>
                        <div class="panel-body">
                            <script>
                                $(document).ready(function () {
                                    $("#overview-btn").click(function () {
                                        $("#overview-panel").show('slow');
                                    });
                                    //                                $("worknedu-btn").click(function () {
                                    //                                    $("p").slideToggle();
                                    //                                });
                                    //                                $("placeulvd-btn").click(function () {
                                    //                                    $("p").slideToggle();
                                    //                                });
                                    //                                $("connbasic-btn").click(function () {
                                    //                                    $("p").slideToggle();
                                    //                                });
                                    //                                $("familynrel-btn").click(function () {
                                    //                                    $("p").slideToggle();
                                    //                                });
                                    //                                $("detalu-btn").click(function () {
                                    //                                    $("p").slideToggle();
                                    //                                });
                                });
                            </script>


                            <div id="photo-content" style="clear:both;" class="row">
                                <div class="col-sm-10">
                                    <?php
                                    $sql_gdt = $obj->FlyQuery("SELECT * FROM `dostums_group` WHERE `group_id`='" . $new_group_id . "'");
                                    if (!empty($sql_gdt)) {
                                        foreach ($sql_gdt as $rowsgd):
                                            ?>
                                            <form class="">
                                                <fieldset id="overview-panel">
                                                    <h5 id="group-overview1" class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px; "><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Group Overview&nbsp;:</h5>
                                                    <h5 id="group-getting1" class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;display: none;"><i class="glyphicon glyphicon-cog">&nbsp;&nbsp;</i>Group Role Setting &nbsp;:</h5>
                                                    <div id="overview-panel-info">
                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa  fa-group">&nbsp;&nbsp;</i>Group Name&nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->name; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email&nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->email; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-phone">&nbsp;&nbsp;</i>Phone/Mobile&nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->phone; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label for="Address" class="col-sm-4 control-label"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Address&nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Address">
                                                                <p><?php echo $rowsgd->address; ?>&nbsp;,&nbsp;</p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-dot-circle-o ">&nbsp;&nbsp;</i>Mission&nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->mission; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-eye-slash">&nbsp;&nbsp;</i>Vision &nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->vission; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-rocket">&nbsp;&nbsp;</i>Moto &nbsp;:</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                                <p><?php echo $rowsgd->moto; ?>&nbsp;at&nbsp; </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="overview-panel-edit" style="display: none;">
                                                        <div class="col-sm-12" id="group_about_alert_bar" style="margin-bottom: 10px; display: none; border: 1px #09f dotted;">sdfsdfsdf</div>
                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa  fa-group">&nbsp;&nbsp;</i>Group Name&nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="group_name" name="textinput" value="<?php echo $rowsgd->name; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="group_name_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#group_name_edit").click(function () {
                                                                $("#group_name").focus();
                                                            });


                                                        </script>


                                                        <!--                                <div id="allname_everyone">
                                                                                            <div class="last"> name start-->

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email&nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="Email" name="textinput" value="<?php echo $rowsgd->email; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="email_edit"   style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->

                                                        <script>
                                                            $("#email_edit").click(function () {
                                                                $("#Email").focus();
                                                            });


                                                        </script>




                                                        <!--                                <div class="last"> Dostums web address start-->

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-phone">&nbsp;&nbsp;</i>Phone/Mobile&nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="phone_number" name="textinput" value="<?php echo $rowsgd->phone; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="phone_numbet_edit" style="color: #2C99CE;"> <i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#phone_numbet_edit").click(function () {
                                                                $("#phone_number").focus();
                                                            });
                                                        </script>                        

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Address&nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="address" name="textinput" value="<?php echo $rowsgd->address; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="address_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#address_edit").click(function () {
                                                                $("#address").focus();
                                                            });
                                                        </script> 
                                                        <!--                                </div>Start Date end-->



                                                        <!--                                <div class="last"> Address start-->

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-dot-circle-o ">&nbsp;&nbsp;</i>Mission&nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="mission" name="textinput" value="<?php echo $rowsgd->mission; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="mission_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>  Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#mission_edit").click(function () {
                                                                $("#mission").focus();
                                                            });
                                                        </script>
                                                        <!--                                </div>Address end-->






                                                        <!--                                <div id="all_everyone">-->
                                                        <!--                                    <div class="last"> Short description start-->

                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-eye-slash">&nbsp;&nbsp;</i>Vision &nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="vision" name="textinput" value="<?php echo $rowsgd->mission; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="vision_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#vision_edit").click(function () {
                                                                $("#vision").focus();
                                                            });
                                                        </script>
                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                    <div class="control-group">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label" for="textinput"><strong><i class="fa fa-rocket">&nbsp;&nbsp;</i>Moto &nbsp;:</strong></label>
                                                                        </div>
                                                                        <div class="col-md-8">

                                                                            <div class="col-md-12 " id="category_panel">
                                                                                <div class="col-md-10"><input id="moto" name="textinput" value="<?php echo $rowsgd->moto; ?>" class=" form-control" type="text"></div>

                                                                                <div class="col-md-2">    
                                                                                    <span type="button" class="btn btn-link btn-xs" id="moto_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end-->
                                                        <script>
                                                            $("#moto_edit").click(function () {
                                                                $("#moto").focus();
                                                            });
                                                        </script>
                                                        <div class="row form-group">
                                                            <div class="col-md-12">
                                                                <div class="control-group pull-right">
                                                                    <button class="btn btn-success btn-sm" type="button" id="updateGroupInfo"> <span class="glyphicon glyphicon-saved"> </span>&nbsp;Save</button>
                                                                    <button type="button" id="btn-edit-cancel" class="btn btn-warning btn-sm"><i class=" fa fa-arrows-alt">&nbsp;</i>Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div><!--Category  end--> 
                                                    </div>
                                                    <!--group role setting start-->

                                                    <div id="group-role-setting" style="display: none;">
                                                        <!--admin start-->

                                                        <!--number1 start-->


                                                        <!--number1 end-->

                                                        <!--number2 start-->

                                                        <!--number2 end-->
                                                        <!--number3 start-->

                                                        <!--number3 end-->

                                                        <!--admin end-->
                                                        <!--antother grid start-->

                                                        <!--another grid end-->

                                                    </div>
                                                    <!--group role setting end -->
                                                    <!--group setting start-->



                                                    <!--group setting end-->

                                                </fieldset>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('#updateGroupInfo').click(function () {
                                                            $('#group_about_alert_bar').show();
                                                            $('#group_about_alert_bar').html("Your About Data is Processing for Update.");
                                                            var emptyflag = false;
                                                            var group_name = $('#group_name').val();
                                                            var group_mail = $('#Email').val();
                                                            var phone_number = $('#phone_number').val();
                                                            var address = $('#address').val();
                                                            var mission = $('#mission').val();
                                                            var vission = $('#vision').val();
                                                            var moto = $('#moto').val();
                                                            var group_id = '<?php echo $new_group_id; ?>';
                                                            if (group_name == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (group_mail == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (phone_number == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (address == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (mission == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (vission == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (moto == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (group_id == "") {
                                                                emptyflag = true;
                                                            }
                                                            if (emptyflag == true)
                                                            {
                                                                $('#group_about_alert_bar').html("Some Field is Empty");
                                                                $('#group_about_alert_bar').addClass('text-danger');
                                                            }
                                                            else
                                                            {
                                                                $.post('./lib/group.php', {'st': 7, 'group_id': group_id, 'group_name': group_name, 'group_mail': group_mail, 'phone_number': phone_number, 'address': address, 'mission': mission, 'vission': vission, 'moto': moto}, function (data) {
                                                                    if (data == 1)
                                                                    {
                                                                        $('#group_about_alert_bar').html("Your Information Succesfully Updated");
                                                                        $('#group_about_alert_bar').addClass('text-success');
                                                                        $('#group_about_alert_bar').focus();
                                                                    }
                                                                    else
                                                                    {
                                                                        $('#group_about_alert_bar').html("Your Information Failed To Updated");
                                                                        $('#group_about_alert_bar').addClass('text-danger');
                                                                    }
                                                                });
                                                            }
                                                        });
                                                        $("#edit-group-info").click(function () {
                                                            $("#overview-panel-info").hide();
                                                            $("#overview-panel-edit").show();
                                                            $("#group-setting-r").hide();
                                                            $("#group-role-setting").hide();
                                                        });
                                                        $("#btn-edit-cancel").click(function () {
                                                            $("#overview-panel-info").show();
                                                            $("#overview-panel-edit").hide();
                                                            $("#group-setting-r").hide();
                                                            $("#group-role-setting").hide();
                                                        });
                                                        $("#overview-btn").click(function () {
                                                            $("#overview-panel-info").hide();
                                                            $("#overview-panel-edit").hide();
                                                            $("#group-setting-r").hide();
                                                            $("#group-role-setting").show();
                                                        });
                                                        $("#group-setting").click(function () {
                                                            $("#overview-panel-info").hide();
                                                            $("#overview-panel-edit").hide();
                                                            $("#group-role-setting").hide();
                                                            $("#group-setting-r").show();
                                                        });

                                                        //overview-btn

                                                        $("#admins").click(function () {
                                                            $("#admins_list").show();
                                                            $("#members_list").hide();
                                                            $("#blocked_list").hide();
                                                            $("#make-me-admin").hide();

                                                        });
                                                        $("#members").click(function () {
                                                            $("#members_list").show();
                                                            $("#admins_list").hide();
                                                            $("#blocked_list").hide();
                                                            $("#make-me-admin").hide();

                                                        });
                                                        $("#blocked").click(function () {
                                                            $("#blocked_list").show();
                                                            $("#members_list").hide();
                                                            $("#admins_list").hide();
                                                            $("#make-me-admin").hide();

                                                        });
                                                    });
                                                </script>



                                            </form>


                                            <?php
                                        endforeach;
                                    }
                                    ?>
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


                                                    });
        </script>


        <script src="assets/js/jquery.scrollto.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/chat.js"></script>

        </body>
        </html>