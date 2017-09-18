<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        header('location: groups.php?group_id=' . $_GET['user_id']);
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
<script type="text/javascript">
    function grpjoinleaves(user_id, rowid)
    {
        var group_id = '<?php //echo $_GET['group_id'];      ?>';
        load_data_like = {'st': 21, 'user_id': user_id, 'group_id': group_id};
        $.post('lib/status.php', load_data_like, function(data) {
            if (data == 1)
            {
                $('#listpld_' + rowid).hide('slow');
            }
            else if (data == 2)
            {
                $('#listpld_' + rowid).hide('slow');
            }
            else if (data == 3)
            {
                $('#listpld_' + rowid).hide('slow');
            }
            else if (data == 0)
            {
                $('#listpld_' + rowid).hide('slow');
            }

        });
    }

</script>
<div class="main-container page-container section-padd">
    <div class="container">
        <div class="row">

            <?php
//profile photo and cover photo
            include('plugin/group_profile_photo_n_cover.php');
//profile photo and cover photo
            ?>
        </div>


        <div style="clear: both"></div>

        <div class="row profile-content-row">

            <div class="col-sm-3 col-xs-12 aside no-padding">
                <aside class="side-menu">
                    <?php
                    //profile user detail start
                    include('plugin/group_profile_user_detail.php');
                    //profile user detail end
                    //friend list start
                    include('plugin/group_profile_member_list.php');
                    //friend list end
                    ?>


                    <?php
                    //Photo list start
                    include('plugin/group_profile_photo_list.php');
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
                        // include('plugin/home_group_status_post_box.php');
                        include('plugin/home_status_post_box.php');
                        //status post box
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <?php
                        //Home post status 1 start here
                        include ('plugin/home_post_status_group.php')
                        //Home post status 1 end here
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
</div>

<?php include('plugin/fotter.php') ?>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
<script src="assets/material/js/ripples.min.js"></script>
<script src="assets/material/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        $.material.init();
        $(".select").dropdown({"autoinit": ".select"});

        var group_id = '<?php echo $_GET['group_id']; ?>';

        $.post('lib/status.php', {'st': 15, 'group_id': group_id}, function(datal) {
            if (datal == 1)
            {
                $('a#join_group').fadeIn('slow');
                $('a#join_group').html('<i class="fa fa-minus-square"></i> Leave');
            }
            else if (datal == 0)
            {
                $('a#page_like').fadeIn('slow');
                $('a#page_like').html('<i class="fa fa-plus-square"></i> Join');
            }
            else
            {
                $('a#page_like').fadeIn('slow');
                $('a#page_like').html('<i class="fa fa-plus-square"></i> Join');
            }
            /*else
             {
             window.location.reload();
             }*/
        });

        $('#join_group').click(function() {


            load_data_like = {'st': 14, 'group_id': '<?php echo $_GET['group_id']; ?>'};
            $.post('lib/status.php', load_data_like, function(data) {
                if (data == 1)
                {

                    $('a#join_group').fadeIn('slow');
                    $('a#join_group').html('<i class="fa fa-minus-square"></i> Leave');
                }
                else if (data == 0)
                {
                    $('a#join_group').fadeIn('slow');
                    $('a#join_group').html('<i class="fa fa-plus-square"></i> Join');
                }
                /*else
                 {
                 window.location.reload();
                 }*/
            });
        });
    });

    $(document).ready(function() {

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
