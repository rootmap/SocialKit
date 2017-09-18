<?php
include('class/auth.php');
if(!isset($_GET['user_id']))
{
	header('location: profile.php');
	exit();
}
else
{
	$new_user_id=$_GET['user_id'];
}
//profile extra heafer file and script script
include('plugin/profile_extra_headfile.php');
//profile extra heafer file and script script
//chat box script
include('plugin/chat_box.php');
//chat box script ?>

<?php //chat user list
include('plugin/chat_box_head_list.php');
//chat user list ?>
<div class="main-container page-container section-padd">
    <div class="container">
        <div class="row">
            <?php
			//profile photo and cover photo
			include('plugin/profile_photo_n_cover.php');
			//profile photo and cover photo
			?>
        </div>

        <div style="clear: both"></div>

        <div class="row profile-content-row">

            <div class="col-sm-3 col-xs-12 aside no-padding">
                <aside class="side-menu">

					<?php
					//profile user detail start
					include('plugin/profile_user_detail.php');
					//profile user detail end
					?>

					<?php
					//Photo list start
					include('plugin/profile_photo_list.php');
					//Photo list end
					?>


					<?php
					//friend list start
					include('plugin/profile_frnd_list.php');
					//friend list end
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


            <div class="col-sm-6 col-xs-12 main-feed">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 ">
                        <?php //status post box
																//if($obj->filename()=="profiles.php" || $new_user_id!=$input_by)
																//{
																	//include('plugin/home_status_post_box_other.php');
																//}
																//else
																//{
																	//include('plugin/home_status_post_box.php');
																//}
						//status post box ?>
                  	</div>
                    <div class="col-xs-12 col-sm-12 ">
                        <?php //Home post status 1 start here
						                //  include ('plugin/home_post_status_1.php')
						                 include ('plugin/home_post_status_for_profiles.php')
						//Home post status 1 end here ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 ">
                        <?php //Home post status 2 start here
						//include('plugin/home_post_status_2.php')
						//Home post status 2 end here ?>
                    </div>
                </div>


            </div>
            <!--/.main-feed-->
            <div class="col-sm-3 col-xs-12 rightCol no-padding">
                <aside>


                    <?php //profile_ time line
					include('plugin/profile_timeline_year_list.php')
					//profile time line ?>

                    <?php //profile_ calender line
					include('plugin/profile_calender_list.php')
					//profile calender line ?>

					<?php //profile_ adds list
					include('plugin/profile_adds_list.php')
					//profile adds list ?>



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
