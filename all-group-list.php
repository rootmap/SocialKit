<?php
include('class/auth.php');
$new_user_id = $input_by;
include('class/extraClass.php');
$extra = new SiteExtra();

//http://ticketchai.com/donation-payment/MTAw/a2tqb3E1c2FoczN1Z21sdmtsaG42MHQ2ZDA=
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Pages </title>
        <?php include('plugin/header_script.php'); ?>
    </head>
    <body class="home">
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
            <script type="text/javascript">
                function GroupJoinFromProfile(group_id, rowid)
                {
                    var user_id = '<?php echo $new_user_id; ?>';
                    load_data_like = {'st': 21, 'user_id': user_id, 'group_id': group_id};
                    $.post('lib/status.php', load_data_like, function (data) {
                        if (data == 1)
                        {
                            $('#listgjd_' + rowid).hide('slow');
                        }
                        else if (data == 2)
                        {
                            $('#listgjd_' + rowid).hide('slow');
                        }
                        else if (data == 3)
                        {
                            $('#listgjd_' + rowid).hide('slow');
                        }
                        else if (data == 0)
                        {
                            $('#listgjd_' + rowid).hide('slow');
                        }

                    });
                }
            </script>

            <div class="container">

                <div class="row">
                    <?php
//left side bar for home page 
                    include('plugin/home_left_sidebar_script.php');
//left side bar for home page 
                    ?>

                    <div class="col-sm-6 col-xs-12 main-feed">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 ">
                                <?php
                                //All Groups List Box
                                include('plugin/all-groups.php');
                                //All Groups List Box 
                                ?>
                            </div>
                            <div class="col-xs-12 col-sm-12 ">
                                <?php
//Home post status 1 start here
//include('plugin/home_post_status_1.php')
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
                    <!--/.main-feed-->
                    <?php
//Home right sidebar start here
                    include ('plugin/home_right_sidebar.php')
//Home right sidebar end here 
                    ?>
                </div>


            </div>
        </div>

        <?php include('plugin/fotter.php'); ?>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
        <script src="assets/material/js/ripples.min.js"></script>
        <script src="assets/material/js/material.min.js"></script>
        <script src="assets/js/jquery.scrollto.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script type="text/javascript">
                $(function () {

                    $(".livefeed-slider").bootstrapNews({
                        newsPerPage: 4,
                        autoplay: true,
                        navigation: false,
                        pauseOnHover: true,
                        direction: 'up',
                        newsTickerInterval: 2500,
                        onToDo: function () {
                            //console.log(this);
                        }


                    });
                    $(".news-slider").bootstrapNews({
                        newsPerPage: 4,
                        autoplay: false,
                        navigation: true,
                        pauseOnHover: true,
                        direction: 'down',
                        newsTickerInterval: 4000,
                        onToDo: function () {
                            //console.log(this);
                        }
                    });


                });


        </script>

        <script src="assets/js/script.js"></script>
        <script src="assets/js/chat.js"></script>

    </body>
</html>