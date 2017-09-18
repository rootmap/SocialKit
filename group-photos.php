<?php
include('class/auth.php');
if (isset($_GET['user_id'])) {
    if ($_GET['user_id'] == $input_by) {
        $new_user_id = $input_by;
    } else {
        $new_user_id = $_GET['user_id'];
    }
} else {
    $new_user_id = $input_by;
}

$new_group_id = $_GET['group_id'];

include './plugin/group_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Home </title>
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
                function HidePhotoftml(photo_id, rowphid)
                {
                    var user_id = '<?php echo $new_user_id; ?>';
                    $.post('lib/status.php', {'st': 28, 'photo_id': photo_id, 'user_id': user_id}, function (data) {
                        if (data == 1)
                        {
                            $('#single-img-grid_' + rowphid).hide('slow');
                        }
                        else
                        {
                            alert('Something Went Wrong!!! Please Try Again.')
                        }

                    });
                }
                function DeletePhotoftml(photo_id, rowpdid)
                {
                    console.log(photo_id);
                    var user_id = '<?php echo $new_user_id; ?>';
                    $.post('lib/status.php', {'st': 29, 'photo_id': photo_id, 'user_id': user_id}, function (data) {
                        if (data == 1)
                        {
                            $('#single-img-grid_' + rowpdid).hide('slow');
                        }
                        else
                        {
                            alert('Something Went Wrong!!! Please Try Again.')
                        }

                    });
                }

            </script>
            <div class="container-content">
                <div class="container">

                    <?php
                    if ($new_user_id == $input_by) {
                        echo "";//echo "Your All Photos.";
                    } else {
                        echo "See " . $obj->SelectAllByVal("dostums_user_view", "id", $new_user_id, "name") . " Photos.";
                    }
                    ?>  

                    <div class="row">

                        <div class="col-lg-12 col-md-12">

                            <div class="panel ">
                                <div class="panel-heading">
                                    <h4 class="pull-left"> <i class="mdi-action-perm-media"></i> Photos </h4>

                                    <div class="panel-tools pull-right">


                                            <ul class="panel-actions actions">
                                                <li>
                                                    <a id="edit-group-info" href="./group.php?group_id=<?php echo $new_group_id; ?>">
                                                        <i class="fa fa-home"></i> Back To Home
                                                    </a>
                                                </li>
                                            </ul>
                                    </div>

                                    <div style="clear: both"></div>
                                </div>
                                <div class="panel-body">



                                    <div id="photo-content" style="clear:both;" class="row">

                                        <div class="col-lg-12">


                                            <ul id="photo-grid" class="photo-grid list-unstyled no-padding col-lg-12">
                                                <?php
                                                $sqlphoto = $obj->FlyQuery("SELECT allgroup_photo.*,p.photo,p.id FROM 
                                                                            (select A.p_id, A.pp_id, A.cp_id, 
                                                                             case A.p_id
                                                                             when A.pp_id then 'profle'
                                                                             when A.cp_id then 'cover'
                                                                             else 'none'
                                                                             end as type,

                                                                             case A.p_id
                                                                             when A.pp_id then A.pp_id
                                                                             when A.cp_id then A.cp_id
                                                                             else A.p_id
                                                                             end as photo_id,
                                                                             A.post_id
                                                                             from
                                                                             (
                                                                                     SELECT 
                                                                                     dp.id as post_id,dp.photo_id as p_id, 
                                                                                     dgpp.photo_id as pp_id, dgcp.photo_id as cp_id
                                                                                     from  dostums_post as dp 
                                                                                     left join dostums_group_profile_photo  as dgpp on dp.photo_id = dgpp.photo_id
                                                                                     left join dostums_group_cover_photo as dgcp on dp.photo_id = dgcp.photo_id 
                                                                                     where dp.group_id='".$new_group_id."' and (dp.status = 60 or dp.status = 61 or dp.status = 62)  and dp.photo_id != 0 AND dp.page_id='0') A
                                                                            ) as allgroup_photo 
                                                                            LEFT JOIN dostums_photo as p on p.id=allgroup_photo.photo_id 
                                                                            WHERE allgroup_photo.photo_id!=0");

                                                if (!empty($sqlphoto)) {
                                                    foreach ($sqlphoto as $photo):
                                                        $chkstatus = $obj->SelectAllByVal2("dostums_hidden_timeline_photos", "user_id", $new_user_id, "photo_id", $photo->photo_id, "status");
                                                        if ($chkstatus != 1) {
                                                            ?>
                                                            <li id="single-img-grid_<?php echo $photo->id; ?>">
                                                                <?php if (in_array($input_by, $admin_list)) { ?>
                                                                <div class="image-action">


                                                                    <div class="dropdown dropdown-right-alight">
                                                                        <span data-toggle="dropdown" type="button" class="dropdown-toggle mini-btn" aria-expanded="false">
                                                                            <span class="mdi-action-settings"></span>
                                                                        </span>
                                                                        <ul role="menu" class="dropdown-menu">
                                                                            <li role="presentation"><button onclick="HidePhotoftml('<?php echo $photo->photo_id; ?>', '<?php echo $photo->id; ?>')" type="button" class="btn btn-xs" href="#" tabindex="-1" role="menuitem">Hide from
                                                                                    Timeline</button></li>
                                                                            <li role="presentation"><button onclick="DeletePhotoftml('<?php echo $photo->photo_id; ?>', '<?php echo $photo->id; ?>')" type="button" class="btn btn-xs" href="#" tabindex="-1" role="menuitem">Delete This Photo
                                                                                </button></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                                <div class="image-info">
                                                                    <div class="share-panel">
                                                                        <a title="#" href="#" class="sp-like"><i class="fa fa-thumbs-up"></i> 26
                                                                            likes</a>
                                                                        <a title="#" href="#" class="sp-comments"><i class="fa fa-comments"></i> 14
                                                                            comments</a>
                                                                    </div>
                                                                </div>



                                                                <div class="image-box open-demo-modal" id="<?php echo $photo->post_id; ?>">  
                                                                    <img  style="width:204px; height:367px;" src="./profile/<?php echo $photo->photo; ?>" > 
                                                                </div>



                                                            </li>
                                                            <!-- End of grid blocks -->
                                                            <?php
                                                        }
                                                    endforeach;
                                                }
                                                ?>

                                            </ul>


                                        </div>




                                    </div>

                                    <div style="clear:both;"></div>


                                </div>

                                <!--<div class="panel-footer">
    
                                    <nav>
                                        <ul class="pagination">
                                            <li>
                                                <a href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li>
                                                <a href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
    
                                </div>-->


                            </div>




                        </div>
                    </div>
                </div>
            </div>





            <?php include('plugin/fotter.php'); ?>


            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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


            <!-- Include the imagesLoaded plug-in -->
            <script src="assets/plugins/wookmark-jquery-master/imagesloaded.pkgd.min.js"></script>

            <!-- Include the plug-in -->
            <script src="assets/plugins/wookmark-jquery-master/wookmark.min.js"></script>

            <!-- Once the page is loaded, initalize the plug-in. -->
            <script type="text/javascript">

                var gbks = gbks || {};

                gbks.jQueryPlugin = function () {

                    this.init = function () {
                        $(window).resize($.proxy(this.resize, this));
                        this.resize();
                    };

                    this.resize = function () {
                        $('.photo-grid').wookmark({
                            autoResize: true, // This will auto-update the layout when the browser window is resized.
                            offset: 0, // Optional, the distance between grid items
                            // outerOffset: 5, // Optional, the distance to the containers border
                            // itemWidth: 200 // Optional, the width of a grid item
                            //  offset: 2,
                            container: $('#photo-content')
                        });
                    };

                };

                var instance = null;
                $(document).ready(function () {
                    instance = new gbks.jQueryPlugin();
                    instance.init();
                });


            </script>




    </body>
</html>