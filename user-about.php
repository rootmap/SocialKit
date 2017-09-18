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

                            <ul class="panel-actions actions" style="margin-left: ">
                                <!--                                <li>
                                                                    <a class="panel-search-trigger" href="">
                                                                        <i class="mdi-action-search"></i>
                                                                    </a>
                                                                </li>-->

                                <li>
                                    <a id="edit-profile-info" href="#">
                                        <i class="mdi-editor-mode-edit"></i> Edit Profile Info
                                    </a>
                                </li>
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
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="list-group text-left">
                                            <a  href="home.php">
                                                <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="worknedu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="glyphicon glyphicon-home">&nbsp;&nbsp;</i>Back To Home</button>
                                            </a>
                                             <a  href="user-about.php">
                                                <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="worknedu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="glyphicon glyphicon-user">&nbsp;&nbsp;</i>Back To About</button>
                                            </a>
<!--                                            <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="overview-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="mdi-action-settings-applications">&nbsp;&nbsp;</i>Profile Overview </button>
                                        <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="worknedu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-graduation-cap">&nbsp;&nbsp;</i>Work and Education</button>
                                        <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="placeulvd-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Places You've Lived</button> 
                                        <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="connbasic-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Contact and Basic Info</button>
                                        <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="familynrel-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-link">&nbsp;&nbsp;</i>Family and Relationships </button>
                                        <button style="padding-top: 5px !important; padding-bottom: 5px !important;" id="detalu-btn" type="button" class="list-group-item btn btn-block btn-info padding-tb10"><i class="fa fa-list-alt">&nbsp;&nbsp;</i>Details About You</button>-->
<!--                                            <a href="#" class="list-group-item no-border"><i class="mdi-social-notifications"></i>Life Events</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid #ccc;">
                                <?php
                                $sql_udt = $obj->FlyQuery("SELECT a.*,concat(a.present_address,' ',a.permanent_address) as address,concat(a.first_name,' ',a.last_name) as name, IFNULL(a.city_id,'none') as city_id, a.country_id, IFNULL(dc.country_name,'none') as country_name, a.blood_group, IFNULL(dbg.name,'none') as blood_group, dua.about_short,dua.about_long,dua.occupation,dua.company, dei.school,dei.college,dei.university1,dei.university2 FROM dostums_user as a left JOIN dostums_country as dc ON dc.id=a.`country_id` left JOIN dostums_blood_group as dbg ON dbg.id=a.`blood_group` LEFT JOIN dostums_user_about as dua on dua.user_id=a.id LEFT JOIN dostums_educational_institutions as dei on dei.user_id=a.id WHERE a.id='" . $input_by . "'");
                                if (!empty($sql_udt)) {
                                    foreach ($sql_udt as $rowsud):
                                        ?>


                                        <form class="">
                                            <fieldset id="overview-panel">
                                                <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:</h5>
                                                <div id="overview-panel-info">
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
                                                            <p><?php echo $rowsud->present_address; ?>&nbsp;,&nbsp;<?php echo $rowsud->permanent_address; ?></p>
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
                                                </div><!--overview-panel-info end-->

                                                <!--profile edit start-->
                                                <div id="overview-panel-edit" style="display: none;">
                                                    <div class="col-sm-12" id="group_about_alert_bar" style="margin-bottom: 10px; display: none; border: 1px #09f dotted;">sdfsdfsdf</div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa  fa-group">&nbsp;&nbsp;</i>Name&nbsp;:</strong></label>
                                                                    </div>

                                                                </div>
                                                                <!--name field start-->
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>First Name   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="Firs_name" name="textinput" value="<?php echo $rowsud->first_name; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="Firs_name_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#Firs_name_edit").click(function () {
                                                                        $("#Firs_name").focus();
                                                                    });
                                                                </script>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Last Name   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="Last_name" name="textinput" value="<?php echo $rowsud->last_name; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="Last_name_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#Last_name_edit").click(function () {
                                                                        $("#Last_name").focus();
                                                                    });
                                                                </script>
                                                                <!--name field end-->
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Address&nbsp;:</strong></label>
                                                                    </div>

                                                                </div>
                                                                <!--address field start-->
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Present Address   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="present_address" name="textinput" value="<?php echo $rowsud->present_address; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="present_address_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#present_address_edit").click(function () {
                                                                        $("#present_address").focus();
                                                                    });
                                                                </script>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Permanent Address   &nbsp;</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="permanent_address" name="textinput" value="<?php echo $rowsud->permanent_address; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="permanent_address_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#permanent_address_edit").click(function () {
                                                                        $("#permanent_address").focus();
                                                                    });
                                                                </script>
                                                                <!--address field end-->
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->



                                                    <!--                                <div id="allname_everyone">
                                                                                        <div class="last"> name start-->
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-phone">&nbsp;&nbsp;</i>Phone/Mobile&nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="phone_number" name="textinput" value="<?php echo $rowsud->phone_number; ?>" class=" form-control" type="text"></div>

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
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-envelope-o">&nbsp;&nbsp;</i>Email&nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="Email" name="textinput" value="<?php echo $rowsud->email; ?>" class=" form-control" type="text"></div>

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
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-birthday-cake">&nbsp;&nbsp;</i>Date of Birth&nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="dob" name="textinput" value="<?php echo $rowsud->dob; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="dob_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->
                                                    <script>
                                                        $("#dob_edit").click(function () {
                                                            $("#dob").focus();
                                                        });
                                                    </script> 
                                                    <!--                                </div>Start Date end-->



                                                    <!--                                <div class="last"> Address start-->

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-flask ">&nbsp;&nbsp;</i>Blood Group&nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
        <!--                                                                            <div class="col-md-10"><input id="blood_group" name="textinput" value="<?php //echo $rowsud->blood_group;    ?>" class=" form-control" type="text"></div>-->
                                                                            <div class="col-sm-12">


                                                                                <select id="blood_group" class="form-control" style="background-color:#fafafa; border: 1px solid #ccc;">
                                                                                    <option class="form-option form-option-empty" value="">Choose a  Blood Group</option>
                                                                                    <?php
                                                                                    $sqlbloodgroup = $obj->SelectAllByID_Multiple("dostums_blood_group", array("status" => 1));
                                                                                    if (!empty($sqlbloodgroup))
                                                                                        foreach ($sqlbloodgroup as $bg):
                                                                                            ?>
                                                                                            <option <?php if ($bg->name == $rowsud->blood_group) { ?> selected="selected" <?php } ?> value="<?php echo $bg->id; ?>"><?php echo $bg->name; ?></option>
                                                                                            <?php
                                                                                        endforeach;
                                                                                    ?>

                                                                                </select>

                                                                            </div>
                                                                            <!--                                                                            <div class="col-md-2">    
                                                                                                                                                            <span type="button" class="btn btn-link btn-xs" id="blood_group_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>  Edit</span><br>
                                                                                                                                                        </div>-->

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->
        <!--                                                    <script>
                                                        $("#blood_group_edit").click(function () {
                                                            $("#blood_group").focus();
                                                        });
                                                    </script>-->
                                                    <!--                                </div>Address end-->






                                                    <!--                                <div id="all_everyone">-->
                                                    <!--                                    <div class="last"> Short description start-->

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-heart-o">&nbsp;&nbsp;</i>Interests &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="interest" name="textinput" value="<?php echo $rowsud->interest; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="interest_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i> Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->
                                                    <script>
                                                        $("#interest_edit").click(function () {
                                                            $("#interest").focus();
                                                        });
                                                    </script>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-briefcase">&nbsp;&nbsp;</i>Current Job  &nbsp;:</strong></label>
                                                                    </div>

                                                                </div>
                                                                <!--address field start-->
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Designation  &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="occupation" name="textinput" value="<?php echo $rowsud->occupation; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="occupation_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#occupation_edit").click(function () {
                                                                        $("#occupation").focus();
                                                                    });
                                                                </script>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Company  &nbsp;</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="company" name="textinput" value="<?php echo $rowsud->company; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="company_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#company_edit").click(function () {
                                                                        $("#company").focus();
                                                                    });
                                                                </script>
                                                                <!--address field end-->
                                                            </div>
                                                        </div>
                                                    </div><!--Category  end-->

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12"  id="category_from" style=" background:#ffffff; border: 1px #0cc solid; padding:15px;">
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-graduation-cap">&nbsp;&nbsp;</i>Education   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"></div>

                                                                            <div class="col-md-2">    
                                                                                <br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <!--educational qualification start-->
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>School   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div  class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div   class="col-md-10"><input id="school" name="textinput" value="<?php echo $rowsud->school; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="school_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <script>
                                                                        $("#school_edit").click(function () {
                                                                            $("#school").focus();
                                                                        });
                                                                    </script>
                                                                </div>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>Collage   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="college" name="textinput" value="<?php echo $rowsud->college; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="college_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#college_edit").click(function () {
                                                                        $("#college").focus();
                                                                    });
                                                                </script>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>University1   &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="university1" name="textinput" value="<?php echo $rowsud->university1; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="university1_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#university1_edit").click(function () {
                                                                        $("#university1").focus();
                                                                    });
                                                                </script>
                                                                <div class="control-group">
                                                                    <div class="col-md-4">
                                                                        <label class="control-label" for="textinput"><strong><i class="fa fa-check">&nbsp;&nbsp;</i>University2  &nbsp;:</strong></label>
                                                                    </div>
                                                                    <div class="col-md-8">

                                                                        <div class="col-md-12 " id="category_panel">
                                                                            <div class="col-md-10"><input id="university2" name="textinput" value="<?php echo $rowsud->university2; ?>" class=" form-control" type="text"></div>

                                                                            <div class="col-md-2">    
                                                                                <span type="button" class="btn btn-link btn-xs" id="university2_edit" style="color: #2C99CE;"><i class="fa fa-pencil">&nbsp;</i>Edit</span><br>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script>
                                                                    $("#university2_edit").click(function () {
                                                                        $("#university2").focus();
                                                                    });
                                                                </script>
                                                                <!--educational qualification end-->
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
                                                <!--profile edit end-->

                                            </fieldset>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#updateGroupInfo').click(function () {
                                                        $('#group_about_alert_bar').show();
                                                        $('#group_about_alert_bar').html("Your About Data is Processing for Update.");
                                                        var emptyflag = false;
                                                        var first_name = $('#Firs_name').val();
                                                        var last_name = $('#Last_name').val();
                                                        var mail = $('#Email').val();
                                                        var phone_number = $('#phone_number').val();
                                                        var present_address = $('#present_address').val();
                                                        var permanent_address = $('#permanent_address').val();
                                                        var dob = $('#dob').val();
                                                        var blood_group = $('#blood_group').val();
                                                        var interest = $('#interest').val();
                                                        var occupation = $('#occupation').val();
                                                        var company = $('#company').val();
                                                        var school = $('#school').val();
                                                        var college = $('#college').val();
                                                        var university1 = $('#university1').val();
                                                        var university2 = $('#university2').val();

                                                        var user_id = '<?php echo $new_user_id ?>';
                                                        if (first_name == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (last_name == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (mail == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (phone_number == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (present_address == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (permanent_address == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (dob == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (blood_group == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (interest == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (occupation == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (company == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (school == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (college == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (university1 == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (university2 == "") {
                                                            emptyflag = true;
                                                        }
                                                        if (emptyflag == true)
                                                        {
                                                            $('#group_about_alert_bar').html("Some Field is Empty");
                                                            $('#group_about_alert_bar').addClass('text-danger');
                                                        }
                                                        else
                                                        {
                                                            $.post('./lib/profile.php', {'st': 1, 'user_id': user_id, 'first_name': first_name, 'last_name': last_name, 'mail': mail, 'dob': dob, 'phone_number': phone_number, 'present_address': present_address, 'permanent_address': permanent_address, 'blood_group': blood_group, 'interest': interest, 'occupation': occupation, 'company': company, 'school': school, 'college': college, 'university1': university1, 'university2': university2}, function (data) {
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

                                                    $("#edit-profile-info").click(function () {
                                                        $("#overview-panel-info").hide();
                                                        $("#overview-panel-edit").show();

                                                    });
                                                    $("#btn-edit-cancel").click(function () {
                                                        $("#overview-panel-info").show();
                                                        $("#overview-panel-edit").hide();
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