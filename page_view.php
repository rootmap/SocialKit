<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: page.php?page_id=' . $_GET['user_id']);
        exit();
    }
} else {
    $new_user_id = $input_by;
}

$new_page_id = $_GET['page_id'];
$admin_list = array();
$page_adminsql = $obj->FlyQuery("SELECT user_id,Page_id,role_id FROM dostums_page_admin WHERE page_id='" . $new_page_id . "'");
if (!empty($page_adminsql)) {
    foreach ($page_adminsql as $rowadmin):
        array_push($admin_list,$rowadmin->user_id);
    endforeach;
}

//echo var_dump($admin_list);
//exit();
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
<script>

    function likeunlike(user_id, trid)
    {
        var page_id = '<?php echo $_GET['page_id']; ?>';
        load_data_like = {'st': 20, 'user_id': user_id, 'page_id': page_id};
        $.post('lib/status.php', load_data_like, function (data) {
            if (data == 2)
            {
                $('#listpld_' + trid).hide('slow');
            }
            else if (data == 1)
            {
                $('#listpld_' + trid).hide('slow');
            }
            else if (data == 0)
            {
                $('#listpld_' + trid).hide('slow');
            }
            /*else
             {
             window.location.reload();	
             }*/
        });
    }

</script>
<div class="main-container page-container section-padd">
    <div class="container">
        <div class="row">
            <?php
//profile photo and cover photo
            include('plugin/page_profile_photo_n_cover.php');
//profile photo and cover photo
            ?>
        </div>


        <div style="clear: both"></div>

        <div class="row profile-content-row">

            <div class="col-sm-3 col-xs-12 aside no-padding">
                <aside class="side-menu">
                    <?php
//profile user detail start
                    include('plugin/page_profile_user_detail.php');
//profile user detail end
                    ?>


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


                    <?php
                    //Like Pages list start
                    //include('plugin/profile_like_pages_list.php');
                    //Like Pages list end
                    ?>

                    <?php
                    //Groups list start
                    //include('plugin/profile_groups_list.php');
                    //Groups list end
                    ?>
                </aside>
            </div>


            <div class="col-sm-6 col-xs-12 main-feed">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 ">
                        <?php
//status post box
//                       include('plugin/home_page_status_post_box.php');
//status post box 
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 ">
                        <?php
//Home post status 1 start here
                        include ('plugin/home_post_status_page_view.php')
//Home post status 1 end here 
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 ">
                        <?php
                        //Home post status 2 start here
                        //include('plugin/home_post_status_2.php')
                        //Home post status 2 end here 
                        ?>
                    </div>
                </div>


            </div>
            <!--main-feed-->
            <div class="col-sm-3 col-xs-12 rightCol no-padding">
                <aside>


                    <?php
                    //profile_ time line
                    //include('plugin/profile_timeline_year_list.php')
                    //profile time line 
                    ?>

                    <?php
                    //profile_ calender line
                    //include('plugin/profile_calender_list.php')
                    //profile calender line 
                    ?>

                    <?php
//profile_ adds list
                    include('plugin/profile_adds_list.php')
//profile adds list 
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
        // This command is used to initialize some elements and make them work properly
        $.material.init();
        $(".select").dropdown({"autoinit": ".select"});


        var page_id = '<?php echo $_GET['page_id']; ?>';

        $.post('lib/status.php', {'st': 13, 'page_id': page_id}, function (datal) {
            if (datal == 1)
            {
                $('a#page_like').fadeIn('slow');
                $('a#page_like').html('<i class="fa fa-thumbs-o-down"></i> Unlike');
            }
            else if (data == 2)
            {

                $('a#page_like').fadeIn('slow');
                $('a#page_like').html('<i class="fa fa-thumbs-o-down"></i> Request Sent');
            }
            else if (datal == 0)
            {
                $('a#page_like').fadeIn('slow');
                $('a#page_like').html('<i class="fa fa-thumbs-o-up"></i> Like');
            }
            /*else
             {
             window.location.reload();	
             }*/
        });

        $('#page_like').click(function () {


            load_data_like = {'st': 12, 'page_id': page_id};
            $.post('lib/status.php', load_data_like, function (data) {
                if (data == 1)
                {

                    $('a#page_like').fadeIn('slow');
                    $('a#page_like').html('<i class="fa fa-thumbs-o-down"></i> Unlike');
                }
                else if (data == 2)
                {

                    $('a#page_like').fadeIn('slow');
                    $('a#page_like').html('<i class="fa fa-thumbs-o-down"></i> Request Sent');
                }
                else if (data == 0)
                {
                    $('a#page_like').fadeIn('slow');
                    $('a#page_like').html('<i class="fa fa-thumbs-o-up"></i> Like');
                }
                /*else
                 {
                 window.location.reload();	
                 }*/
            });
        });




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