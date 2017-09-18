<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        header('location: user-about.php?user_id=' . $_GET['user_id']);
        exit();
        $new_user_id = $input_by;
    } else {
        $new_user_id = $_GET['user_id'];
    }
} else {
    $new_user_id = $_GET['user_id'];
    header('location: user-about.php?user_id=' . $_GET['user_id']);
    exit();
}

$haveaccess = false;
if ($input_by == $new_user_id) {
    $haveaccess = true;
} else {
    $haveaccess=false;
}

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
        </div>

        <div style="clear: both"></div>

        <div class="row profile-content-row">
            <div class="col-md-9" style="padding-left: 0px;">
                <div class="panel ">
                    <div class="panel-heading">
                        <h4 class="pull-left"> <i class="glyphicon glyphicon-user"></i> About </h4>


                        <div class="panel-tools pull-right">

                            <!--                            <div class="panel-search hide" style="display: block;">
                                                            <input type="text" class="search-input" placeholder="Start typing..." >
                                                            <i class="search-close">×</i>
                                                        </div>-->

                            <ul class="panel-actions actions">
                                <!--                                <li>
                                                                    <a class="panel-search-trigger" href="">
                                                                        <i class="mdi-action-search"></i>
                                                                    </a>
                                                                </li>-->
                                <li>
                                    <a href="profile.php">
                                        <i class="fa fa-undo"></i> Back To Profile
                                    </a>
                                </li>
                                <?php if($haveaccess==true){ ?>
                                <li>
                                    <a href="setting.php">
                                        <i class="mdi-editor-mode-edit"></i> Edit Profile Info
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
                            <?php if($haveaccess==true){ ?>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="list-group text-left">
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="overview-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="mdi-action-settings-applications">&nbsp;&nbsp;</i>Profile Overview </button>
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="worknedu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-graduation-cap">&nbsp;&nbsp;</i>Work and Education</button>
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="placeulvd-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Places You've Lived</button> 
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="connbasic-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Contact and Basic Info</button>
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="familynrel-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-link">&nbsp;&nbsp;</i>Family and Relationships </button>
                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="detalu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-list-alt">&nbsp;&nbsp;</i>Details About You</button>
<!--                                            <a href="#" class="list-group-item no-border"><i class="mdi-social-notifications"></i>Life Events</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid #ccc;">
<?php
$sql_udt = $obj->FlyQuery("SELECT a.*, 
                                IFNULL(a.city_id,'none') as city_id, 
                                a.country_id, 
                                IFNULL(dc.country_name,'none') as country_name, 
                                a.blood_group, 
                                IFNULL(dbg.name,'none') as blood_group, dua.about_short,
                                dua.about_long,
                                dua.occupation,
                                dua.company, 
                                dei.school,
                                dei.college,
                                dei.university1,
                                dei.university2 
                                FROM 
                                dostums_user_view as a 
                                left JOIN dostums_country as dc ON dc.id=a.`country_id` 
                                left JOIN dostums_blood_group as dbg ON dbg.id=a.`blood_group` 
                                LEFT JOIN dostums_user_about as dua on dua.user_id=a.id 
                                LEFT JOIN dostums_educational_institutions as dei on dei.user_id=a.id 
                                WHERE 
                                a.id='" . $new_user_id . "'");
if (!empty($sql_udt)) {
    foreach ($sql_udt as $rowsud):
        ?>


                                        <form class="">
                                            <fieldset id="overview-panel">
                                                <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:</h5>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-user">&nbsp;&nbsp;</i>Name&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->name; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="Address" class="col-sm-4 control-label"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Address&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Address">
                                                        <p><?php echo $rowsud->present_address; ?>&nbsp;,&nbsp;<?php echo $rowsud->country_name; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-phone">&nbsp;&nbsp;</i>Phone/Mobile&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->phone_number; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->email; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-birthday-cake">&nbsp;&nbsp;</i>Date of Birth&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->dob; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-flask">&nbsp;&nbsp;</i>Blood Group&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->blood_group; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-heart-o">&nbsp;&nbsp;</i>Interests&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->interest; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-briefcase">&nbsp;&nbsp;</i>Current Job&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->occupation; ?>&nbsp;at&nbsp;<?php echo $rowsud->company; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-graduation-cap">&nbsp;&nbsp;</i>Education&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p>
        <?php
        if ($rowsud->school != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->school . '</span><br>';
        }
        if ($rowsud->college != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->college . '</span><br>';
        }
        if ($rowsud->university1 != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->university1 . '</span><br>';
        }
        if ($rowsud->university2 != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->university2 . '</span><br>';
        }
        ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>


        <?php
    endforeach;
}
?>
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-12">
                            <?php
$sql_udt = $obj->FlyQuery("SELECT a.*, 
                                IFNULL(a.city_id,'none') as city_id, 
                                a.country_id, 
                                IFNULL(dc.country_name,'none') as country_name, 
                                a.blood_group, 
                                IFNULL(dbg.name,'none') as blood_group, dua.about_short,
                                dua.about_long,
                                dua.occupation,
                                dua.company, 
                                dei.school,
                                dei.college,
                                dei.university1,
                                dei.university2 
                                FROM 
                                dostums_user_view as a 
                                left JOIN dostums_country as dc ON dc.id=a.`country_id` 
                                left JOIN dostums_blood_group as dbg ON dbg.id=a.`blood_group` 
                                LEFT JOIN dostums_user_about as dua on dua.user_id=a.id 
                                LEFT JOIN dostums_educational_institutions as dei on dei.user_id=a.id 
                                WHERE 
                                a.id='" . $new_user_id . "'");
if (!empty($sql_udt)) {
    foreach ($sql_udt as $rowsud):
        ?>


                                        <form class="">
                                            <fieldset id="overview-panel">
                                                <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:</h5>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-user">&nbsp;&nbsp;</i>Name&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->name; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="Address" class="col-sm-4 control-label"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Address&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Address">
                                                        <p><?php echo $rowsud->present_address; ?>&nbsp;,&nbsp;<?php echo $rowsud->country_name; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-phone">&nbsp;&nbsp;</i>Phone/Mobile&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->phone_number; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->email; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-birthday-cake">&nbsp;&nbsp;</i>Date of Birth&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->dob; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-flask">&nbsp;&nbsp;</i>Blood Group&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->blood_group; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-heart-o">&nbsp;&nbsp;</i>Interests&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->interest; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-briefcase">&nbsp;&nbsp;</i>Current Job&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p><?php echo $rowsud->occupation; ?>&nbsp;at&nbsp;<?php echo $rowsud->company; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label for="firstname" class="col-sm-4 control-label"><i class="fa fa-graduation-cap">&nbsp;&nbsp;</i>Education&nbsp;:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                                        <p>
        <?php
        if ($rowsud->school != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->school . '</span><br>';
        }
        if ($rowsud->college != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->college . '</span><br>';
        }
        if ($rowsud->university1 != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->university1 . '</span><br>';
        }
        if ($rowsud->university2 != '') {
            echo '<span><i class="fa fa-check-circle">&nbsp;&nbsp;</i>' . $rowsud->university2 . '</span><br>';
        }
        ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>


        <?php
    endforeach;
}
?>
                            </div>
                            <?php } ?>
                            
                            
                            
                            
                            
                        </div>

                        <div style="clear:both;"></div>


                    </div>

                    <div class="panel-footer">



                    </div>


                </div>
            </div>
            <div class="col-md-3" style="padding-right: 0px;">
                <aside class="side-menu">

<?php
//profile user detail start
//include('plugin/profile_user_detail.php');
//profile user detail end
?>


                    <?php
                    //friend list start
                    include('plugin/profile_frnd_list.php');
                    //friend list end
                    ?>


                    <?php
                    //Photo list start
                    include('plugin/profile_photo_list.php');
                    //Photo list end
                    ?>


                    <?php
                    //Like Pages list start
                    include('plugin/profile_like_pages_list.php');
                    //Like Pages list end
                    ?>

                    <?php
                    //Groups list start
                    include('plugin/profile_groups_list.php');
                    //Groups list end
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