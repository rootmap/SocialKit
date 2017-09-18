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
$new_page_id = $_GET['page_id'];
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
                        <h4 class="pull-left"> <i class="glyphicon glyphicon-user"></i> Page settings </h4>


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

                                <!--                                <li>
                                                                    <a href="setting.php">
                                                                        <i class="mdi-editor-mode-edit"></i> Edit Profile Info
                                                                    </a>
                                                                </li>-->
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
                            });</script>


                        <div id="photo-content" style="clear:both;" class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="list-group text-left">

                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="overview-btn" href="page_about.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="mdi-action-settings-applications">&nbsp;&nbsp;&nbsp;</i>About Page Setting </a>
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="milestons-btn" href="page_settings.php?page_id=<?php echo $_GET['page_id']; ?>"  class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-cogs">&nbsp;&nbsp;&nbsp;&nbsp;</i> General Setting</a>
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="pgowners-btn" href="page_roles.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-cog">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Page Roles</a> 
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;"  id="pgowners-btn" href="page_moderation.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-lock">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Page Moderation</a> 



<!--                                            <a href="#" class="list-group-item no-border"><i class="mdi-social-notifications"></i>Life Events</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid #ccc;">


                                <fieldset id="profile-overview-1"><!--field set for profile overview starts here-->
                                    <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:&nbsp;All Basic Page Information</h5>

                                    <div id="all_everyone">
                                        <div class="last"> <!--modaretor start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="modaretor_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3 glyphicon glyphicon-plus">

                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="control-label" for="textinput" id="modaretor_show"><strong>Add page moderation</strong></label>
                                                                <?php
                                                                $modaretro = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "add_page_moderation");
                                                                echo $modaretro;
                                                                ?>

                                                            </div>
                                                            <div class="col-md-2">    
                                                                <span style="color: #2C99CE; cursor: pointer; padding-left:160px;"> Edit</span><br>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--modaretor end-->

                                            <div class="col-md-12" id="modaretor_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0; "> <!---modaretor hidden start-->

                                                <div class="col-md-9 controls" style="padding-left:23px;">

                                                    <strong> Please add page moreration by giving comma separrated</strong><br><br>
                                                    <textarea class="form-control" rows="5" id="modaretor_input" value=""><?php echo $modaretro; ?></textarea>

                                                </div>


                                                <div class="col-md-12 pull-left" style="padding-left:22px;">
                                                    <button  type="submit" class="btn btn-success btn-sm"  id="modaretor_svae">Save Change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="modaretor_close">cancel</button>

                                                </div>
                                            </div><!-- -modaretorhidden end-->

                                        </div>
                                    </div><!---modaretor 2end-->
                                    <script>

                                    </script>

                                    <style type="text/css">
                                        #modaretor_from,#modaretor_close{ cursor: pointer; }
                                        #modaretor_close:hover{ cursor: pointer; color: #000; }
                                    </style>
                                    <script>
                                        $('document').ready(function () {
                                            $('#modaretor_from, #modaretor_close').click(function () {
                                                $('#modaretor_panel').toggle('slow');
                                            });
                                            $("#modaretor_svae").click(function () {
                                                var modaretor_input = $('#modaretor_input').val();

                                                var page_id = '<?php echo $new_page_id; ?>'
                                                $.post("./lib/fanpage.php", {'st': 22, 'modaretor_input': modaretor_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                        if (data == 1)
                                                        {
                                                            $('#modaretor_show').html(modaretor_input);
                                                            alert('Congrats!!! Successful.');
                                                            $('#modaretor_panel').toggle('slow');
                                                        }
                                                        else
                                                        {
                                                            alert('Sorry!!! Failed. Please Try Again.');
                                                        }
                                                });
                                            });
                                        });</script>













































































                            </div>

                            <div style="clear:both;"></div>


                        </div>

                        <div class="panel-footer">



                        </div>


                    </div>
                </div>

            </div>

            <div class="col-md-3" style="padding-right: 0px;">
                <aside class="side-menu">
                    <?php
                    //friend list start
                    include('plugin/page_follower_list.php');
                    //friend list end
                    ?>


                    <?php
                    //Photo list start
                    include('plugin/page_profile_photo_list.php');
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
