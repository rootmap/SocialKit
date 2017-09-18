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


include './plugin/page_admin.php';
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
                        <h4 class="pull-left"> <i class="glyphicon glyphicon-user"></i> 
                            About Page 
                            <?php if(in_array($input_by,$admin_list)){ ?>
                             / Setting
                            <?php } ?>
                        </h4>


                        <div class="panel-tools pull-right">

                            <ul class="panel-actions actions">
                                <li>
                                    <a id="edit-group-info" href="./page.php?page_id=<?php echo $new_page_id; ?>">
                                        <i class="fa fa-home"></i> Back To Home
                                    </a>
                                </li>
                            </ul>





                        </div>    
                        <div style="clear: both"></div>
                    </div>
                    <div class="panel-body">
                        <script>
                            $(document).ready(function () {
                                $("#overview-btn").click(function () {
                                    $("#overview-panel").show('slow');
                                });
                            });</script>

                        <!-- Modal edit start-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:60px; ">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header"style="background-color:#99CA3C;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"> Request new Page name</h4>

                                    </div>

                                    <div class="modal-body">
                                        <p>Your Page name should accurately reflect what the Page is about.
                                            We review name changes to protect the identity of the businesses,
                                            brands and organisations that Dostums Pages represent.</p>
                                        <?php
                                        //$pagename = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "name");
                                        ?>
                                        <!-- Single button -->
                                        <div class="col-md-12">
                                            <!--                                                    <div class="form-group">
                                                                                                    <label for="inputPassword3" class="col-sm-3 control-label">Current Page name</label>
                                                                                                    <div class="col-sm-9">
                                                                                                        <input type="text" value="<?php //echo $pagename;                                             ?>" class="form-control" id="inputPassword3" placeholder="Current Page name"><br>
                                                                                                    </div>
                                                                                                </div>-->
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">New Page name</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="inputPassword3" placeholder="New Page name"><br>
                                                </div>
                                            </div>
                                        </div> 

                                        <h5 style="padding-left:15px;">Dostums Page Naming Tips:</h5>
                                        <div class="col-md-12">
                                            <div class="col-md-6 pull-left">
                                                <div style="color:#52BB5D; font-size:15px; letter-spacing: 1px; padding-left: 26px; font-weight: bold;"><i class="glyphicon glyphicon-ok"></i> Do</div>
                                                <ul>
                                                    <li>Use a name that accurately represents what this Page is about.</li>
                                                    <li>Match the name of your business, brand or organisation.</li>
                                                </ul>

                                            </div>
                                            <div class="col-md-6 pull-right">
                                                <div  style="color:#DF4653; padding-left:26px; font-size:15px; font-weight: bold;"><i class="glyphicon glyphicon-remove"></i> DON'T</div>
                                                <ul>
                                                    <li>Mislead people by representing a person, business or organisation other than your own.</li>
                                                    <li>Include any variation of the word "Dostums" or include the word "official"</li>
                                                    <li>Use terms or phrases that may be abusive or violate someone's rights.</li>
                                                </ul>

                                            </div>


                                        </div>
                                        <h5 style="padding-left:20px;">For more info, see <a href="#" style="color:#5890FF;">our guidelines for Page names.</a></h5>
                                    </div>
                                    <div class="modal-footer" style="clear: both; margin-top: 10px;">
                                        <button type="button" class="btn btn-danger btn-sm">cancel</button>

                                        <button type="button" class="btn btn-primary btn-sm">continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php if(in_array($input_by,$admin_list)){ ?>
                        <!-- Modal edit end-->
                        <div id="photo-content" style="clear:both;" class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="list-group text-left">
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="overview-btn" href="page_about.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="mdi-action-settings-applications">&nbsp;&nbsp;&nbsp;</i>About Page Setting </a>
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="milestons-btn" href="page_settings.php?page_id=<?php echo $_GET['page_id']; ?>"  class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-cogs">&nbsp;&nbsp;&nbsp;&nbsp;</i> General Setting</a>
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;" id="pgowners-btn" href="page_roles.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-cog">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Page Roles</a> 
                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important; text-align:left !important;"  id="pgowners-btn" href="page_moderation.php?page_id=<?php echo $_GET['page_id']; ?>" class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-lock">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Page Moderation</a> 



<!--                                            <a style="padding-top: 5px !important; padding-bottom: 5px !important;"  data-toggle="modal" data-target="#myModal" type="button" class="list-group-item btn btn-block btn-success padding-tb10"><i class="fa fa-map-marker">&nbsp;&nbsp;</i>Page Moderation</a> -->

<!--                                            <a href="#" class="list-group-item no-border"><i class="mdi-social-notifications"></i>Life Events</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid #ccc;">


                                <fieldset id="profile-overview-1"><!--field set for profile overview starts here-->
                                    <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:&nbsp;All Basic Page Information</h5>

                                    <div id="all_everyone">
                                        <div class="last"> <!--Category start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="category_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Category</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <?php
                                                                    $sql_pdt = $obj->FlyQuery("select 
                                                                    a.page_id,
                                                                    concat(ft.name,' / ',fc.name) as category
                                                                    from dostums_fanpage as a 
                                                                    LEFT JOIN dostums_fanpage_type as ft ON ft.id=a.page_type_id 
                                                                    LEFT JOIN dostums_fanpage_category as fc ON fc.id=a.page_category 
                                                                    WHERE a.page_id='" . $new_page_id . "'");
                                                                    ?>
                                                                    <div class="col-md-10" style="padding-left:14px;">
                                                                        <?php echo @$sql_pdt[0]->category; ?>
                                                                    </div>


                                                                    <div class="col-md-2">    
                                                                        <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Category  end-->

                                            <div class="col-md-12" id="category_from_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Follower Comments hidden start-->

                                                <div class="col-md-3">
                                                    <label class="control-label" for="textinput">
                                                        <strong  style="padding-left:16px;">Category</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-9" style="padding-left:34px;">
                                                    <div class="col-md-10" ><strong style="padding-left:18px;">Select Brands & Products: </strong></div>
                                                    <div class="col-md-2">    
    <!--                                                    <span class="text-right" style="position: absolute;" id="category_close"><i class="fa fa-close"></i></span>-->
                                                    </div>
                                                    <div class="col-md-12" style="padding-left:18px;">


                                                        <select class="form-control" id="page_type" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                            <?php
                                                            $sqlcategory = $obj->SelectAll("dostums_fanpage_type");
                                                            if (!empty($sqlcategory))
                                                                foreach ($sqlcategory as $category):
                                                                    ?>
                                                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            ?>



                                                        </select>
                                                    </div>


                                                    <div class="col-md-12" style="padding-left:18px;">


                                                        <select class="form-control" id="page_cat" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                            <?php
                                                            $sqlcategory1 = $obj->SelectAll("dostums_fanpage_category");
                                                            if (!empty($sqlcategory1))
                                                                foreach ($sqlcategory1 as $cat):
                                                                    ?>
                                                                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            ?>

                                                        </select>
                                                    </div>



                                                </div>
                                                <div class="col-md-12" style="padding-left:186px;">
                                                    <button id="category_btn" type="submit" class="btn btn-success btn-sm">Save Change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="category_close">cancel</button>

                                                </div>
                                            </div><!--Category hidden end-->

                                        </div>
                                    </div><!--Category 2end-->
                                    <script>

                                    </script>

                                    <style type="text/css">
                                        #category_close,#category_from{ cursor: pointer; }
                                        #category_close:hover{ cursor: pointer; color: #000; }
                                    </style>
                                    <script>
                                        $(document).ready(function () {
                                            $('#category_from, #category_close').click(function () {
                                                $('#category_from_panel').toggle('slow');
                                            });

                                            $("#category_btn").click(function () {
                                                var page_type = $('#page_type').val();
                                                var page_category = $('#page_cat').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 3, 'page_type': page_type, 'page_category': page_category, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        var page_type_html = $('#page_type option[value=' + page_type + ']').html();
                                                        var page_category_html = $('#page_cat option[value=' + page_category + ']').html();
                                                        $('#category_panel').html(page_type_html + '/' + page_category_html);
                                                        $('#category_from_panel').toggle('slow');
                                                        //alert('Congrats!!! Successful.');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>








                                    <div class="row form-group"> <!--Fan Page Name List start-->
                                        <div class="col-sm-12">
                                            <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px;">
                                                <div class="control-group" id="fanpage_from" style="margin-top:10px; padding-left:11px;">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="textinput"><strong> Fan Page Name</strong></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <div class="col-md-12 ">
                                                            <div class="col-md-9" id="name_place" style="padding-left:10px;" >

                                                                <?php
                                                                $pagename = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "name");
                                                                echo $pagename;
                                                                ?>  
                                                            </div>
                                                            <div class="col-md-2">    
                                                                <span style="color: #2C99CE; padding-left:20px; cursor: pointer;"> Edit</span><br>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Fan Page Name -->




                                    <div class="col-md-12" id="fanpage_name" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Fan Page Name hidden start-->

                                        <div class="col-md-4">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:17px;"> Fan Page Name</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-8" >
                                            <div class="col-md-11 controls" style="padding-left:18px;">

                                                <input type="text" id="fanpage_fill" class="form-control" value="<?php echo $pagename; ?>"  >
                                            </div>
                                            <!--                                        <div class="col-md-1">  
                                                                                        <span class="text-right" style="position: absolute;" id="dostums_close"><i class="fa fa-close"></i></span>
                                                                                    </div>-->
                                            <div class="col-md-12"style="padding-left:16px;">
                                                <button type="submit" id="fan_save" class="btn btn-success btn-sm">Save change</button>
                                                <button type="submit" id="Posts_panel_close" class="btn btn-danger btn-sm">cancel</button>

                                            </div>



                                        </div>

                                    </div><!--Fan Page Name  hidden end-->




                                    <style>
                                        #web_dostums_from,#Posts_panel_close{cursor:pointer;}
                                        #Posts_panel_close:hover{cursor:pointer; color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#fanpage_from, #Posts_panel_close').click(function () {
                                                $('#fanpage_name').toggle('slow');
                                            });
                                            $("#fan_save").click(function () {
                                                var fanpage_fill = $('#fanpage_fill').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 4, 'fanpage_fill': fanpage_fill, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#name_place').html(fanpage_fill);
                                                        alert('Congrats!!! Successful.');
                                                        $('#fanpage_name').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script> 










                                    <div class="last"> <!--Dostums web address start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="web_dostums_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:10px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput" style="padding-left:4px;"><strong>Dostums web address</strong></label>
                                                        </div>
                                                        <div class="col-md-8">

                                                            <div class="col-md-12 " >
                                                                <div class="col-md-10"  id="web_panel" style="padding-left:0px;" >
                                                                    <?php
                                                                    $webpage = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "dostums_web_address");
                                                                    echo $webpage;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2" style="padding-left:6px;">    
                                                                    <span style="color: #2C99CE;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Dostums web address end-->

                                    <div class="col-md-12" id="dostums_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Dostums web address  hidden start-->

                                        <div class="col-md-4">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:12px;">Dostums web address</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-8" >
                                            <div class="col-md-11 controls"style="padding-left:18px;">

                                                <input type="text" id="web_address"  class="form-control" value="<?php echo $webpage; ?>" >
                                            </div>
                                            <!--                                        <div class="col-md-1">    
                                                                                        <span class="text-right" style="position: absolute;" id="dostums_close"><i class="fa fa-close"></i></span>
                                                                                    </div>-->
                                            <div class="col-md-12"style="padding-left:16px;">
                                                <button type="submit" class="btn btn-success btn-sm" id="web_save">Save change</button>
                                                <button type="submit" class="btn btn-danger btn-sm" id="web_close">cancel</button>

                                            </div>



                                        </div>

                                    </div><!--Dostums web address  hidden end-->




                                    <style>
                                        #web_dostums_from,#web_close{cursor:pointer;}
                                        #web_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#web_dostums_from, #web_close').click(function () {
                                                $('#dostums_panel').toggle('slow');
                                            });

                                            $("#web_save").click(function () {
                                                var web_address = $('#web_address').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 5, 'web_address': web_address, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#web_panel').html(web_address);
                                                        alert('Congrats!!! Successful.');
                                                        $('#dostums_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>



                                    <div class="last"> <!--Start Date start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="date_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Start Date</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 ">
                                                                <div class="col-md-10" id="Date_panel" style="padding-left:14px;">
                                                                    <?php $start_date = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "start_date"); ?>

                                                                    <?php echo $start_date; ?>
                                                                </div>

                                                                <div class="col-md-2" style="padding-left:18px;">    
                                                                    <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Start Date end-->




                                    <div class="col-md-12" id="start_date_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Start Date hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:16px;">Start Date</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9" style="padding-left:34px;">
                                            <div class="col-md-10" ><strong style="padding-left:18px;">Select options</strong></div>
                                            <div class="col-md-2">    
    <!--                                            <span class="text-right" style="position: absolute;" id="start_date_close"><i class="fa fa-close"></i></span>-->
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-control" id="select_started_option" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                    <option value="Unspecified">Unspecified</option>
                                                    <option value="Born">Born</option>
                                                    <option value="Opened">Opened</option>
                                                    <option value="Created">Created</option>
                                                    <option value="Launched">Launched</option>


                                                </select>


                                                <select class="form-control" id="select_started_year" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                    <?php
                                                    for ($i = date('Y'); $i >= date('Y') - 1000; $i--):
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    endfor;
                                                    ?>


                                                </select>
                                                <select class="form-control" id="select_started_month" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                    <?php

                                                    function get_month_name($inp) {
                                                        return date("F", strtotime(date("d-$inp-y")));
                                                    }

                                                    for ($i = 1; $i <= 12; $i++):
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo get_month_name($i); ?></option>
                                                        <?php
                                                    endfor;
                                                    ?>
                                                </select>
                                                <select class="form-control" id="select_started_day" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                    <?php
                                                    for ($i = 31; $i >= 1; $i--):
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php
                                                    endfor;
                                                    ?>


                                                </select>
                                            </div>
                                            <div class="col-md-12"style="padding-left:16px;">
                                                <button type="submit" id="save_started_option" class="btn btn-success btn-sm">Save change</button>
                                                <button type="submit" class="btn btn-danger btn-sm" id="start_date_close">cancel</button>

                                            </div>



                                        </div>
                                    </div><!--Start Date hidden end-->

                                    <style>
                                        #Date_from,#start_date_close{cursor:pointer;}
                                        #start_date_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $(document).ready(function () {
                                            $('#date_from, #start_date_close').click(function () {
                                                $('#start_date_panel').toggle('slow');
                                            });

                                            $('#save_started_option').click(function () {

                                                var select_started_option = $('#select_started_option').val();
                                                var select_started_year = $('#select_started_year').val();
                                                var select_started_month = $('#select_started_month').val();
                                                var select_started_day = $('#select_started_day').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                //alert(select_started_option + ' ' + select_started_year + ' ' + select_started_month + ' ' + select_started_day);
                                                var start_date = select_started_option + ' : ' + select_started_day + '/' + select_started_month + '/' + select_started_year;
                                                $.post("./lib/fanpage.php", {'st': 14, 'start_date': start_date, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#Date_panel').html(start_date);
                                                        alert('Congrats!!! Successful.');
                                                        $('#start_date_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });

                                    </script>



                                    <div class="address2">
                                        <div class="last"> <!--Address start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="address_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Address</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 "> 
                                                                    <div class="col-md-10" id="show_address" style="padding-left:14px;">
                                                                        <?php
                                                                        $thikana = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "address");
                                                                        echo $thikana;
                                                                        ?>


                                                                    </div>

                                                                    <div class="col-md-2">    
                                                                        <span style="color: #2C99CE;"> Edit</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Address end-->



                                        <div class="col-md-12" id="address_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Address  hidden start-->

                                            <div class="col-md-4">
                                                <label class="control-label" for="textinput">
                                                    <strong  style="padding-left:12px;">Address</strong>
                                                </label>
                                            </div>
                                            <div class="col-md-8" >
                                                <div class="col-md-11 controls"style="padding-left:18px;">

                                                    <input type="text" id="easy_address" value="<?php echo $thikana; ?>"  class="form-control" >
                                                </div>

                                                <div class="col-md-12"style="padding-left:16px;">
                                                    <button type="submit" id="search_save" class="btn btn-success btn-sm">Save change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="address_close">cancel</button>

                                                </div>



                                            </div>


                                        </div><!--Address  hidden end-->
                                    </div><!--Address last end-->


                                    <style>
                                        #address_from,#address_close{cursor:pointer;}
                                        #address_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#address_from,#address_close').click(function () {
                                                $('#address_panel').toggle('slow');
                                            });
                                            $("#search_save").click(function () {
                                                var easy_address = $('#easy_address').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 6, 'easy_address': easy_address, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#show_address').html(easy_address);
                                                        alert('Congrats!!! Successful.');
                                                        $('#address_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>












                                    <div id="all_everyone">
                                        <div class="last"> <!--Short description start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="short_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:8px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Short description</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " id="friend_requests_panel">
                                                                    <div class="col-md-10" id="short_decrip_value" style="padding-left:14px;">

                                                                        <?php
                                                                        $sortdecrib = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "short_description");
                                                                        echo $sortdecrib;
                                                                        ?>
                                                                    </div>

                                                                    <div class="col-md-2" style="padding-left:10px;">    
                                                                        <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Short description end-->

                                            <div class="col-md-12" id="short_discrp_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Short description hidden start-->

                                                <div class="col-md-3">
                                                    <label class="control-label" for="textinput">
                                                        <strong  style="padding-left:4px;">Short description</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-9" style="padding-left:30px;">
                                                    <div class="col-md-10" ><strong style="padding-left:18px;"></strong></div>
                                                    <div class="col-md-2">    
    <!--                                                    <span class="text-right" style="position: absolute;" id="follow_cmnt_close"><i class="fa fa-close"></i></span>-->
                                                    </div>
                                                    <div class="col-md-12"  style="padding-left:18px;">
                                                        <textarea class="form-control" rows="5" id="area_short"><?php echo $sortdecrib; ?></textarea>
                                                    </div>



                                                </div>
                                                <div class="col-md-12" style="padding-left:183px;">
                                                    <button type="submit"  id="save_short_description" class="btn btn-success btn-sm">Save change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="sort_close">cancel</button>

                                                </div>

                                            </div><!--Short description hidden end-->

                                        </div><!--Short description  2end-->

                                        <style type="text/css">
                                            #follow_cmnt_close,#sort_close{ cursor: pointer; }
                                            #sort_close:hover{ cursor: pointer; color: #000; }
                                        </style>
                                        <script>
                                            $('document').ready(function () {
                                                $('#short_from, #sort_close').click(function () {
                                                    $('#short_discrp_panel').toggle('slow');
                                                });
                                                $("#save_short_description").click(function () {
                                                    // alert('dsdsfds');
                                                    var area_short = $('#area_short').val();
                                                    var page_id = '<?php echo $new_page_id; ?>';
                                                    $.post("./lib/fanpage.php", {'st': 7, 'area_short': area_short, 'page_id': page_id}, function (data) {
                                                        if (data == 1)
                                                        {
                                                            $('#short_decrip_value').html(area_short);
                                                            alert('Congrats!!! Successful.');
                                                            $('#short_discrp_panel').toggle('slow');
                                                        }
                                                        else
                                                        {
                                                            alert('Sorry!!! Failed. Please Try Again.');
                                                        }
                                                    });
                                                });
                                            });</script>


                                        <script>

                                        </script>



                                        <div class="impressum">
                                            <div class="row form-group"> <!--Impressum start-->
                                                <div class="col-md-12">
                                                    <div class="col-md-12" id="impressum_plugin" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Impressum</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " >
                                                                    <div class="col-md-10" id="impressumdb_panel" href="#" style="padding-left:10px;">

                                                                        <?php
                                                                        $pressum = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "impressum");
                                                                        echo $pressum;
                                                                        ?>
                                                                    </div>

                                                                    <div class="col-md-2">    
                                                                        <span style="color: #2C99CE;"> Edit</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Impressum end-->

                                        <div class="col-md-12" id="impressum_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Follow Plugin  hidden start-->

                                            <div class="col-md-3">
                                                <label class="control-label" for="textinput">
                                                    <strong  style="padding-left:15px;">Impressum</strong>
                                                </label>
                                            </div>
                                            <div class="col-md-9" >
                                                <div class="col-md-11"style="padding-left:31px;">


                                                </div>

                                                <div class="col-md-9 controls" style="padding-left:30px;">
<!--                                                    <input type="text"   style=" height:112px; width:340px; margin-top:6px;"  class="from-control" >-->
                                                    <textarea class="form-control" rows="5" id="impressumd_input" value="<?php echo $pressum; ?>"></textarea>
                                                </div>



                                            </div>
                                            <div class="col-md-12"style="padding-left:180px;">
                                                <button type="submit" class="btn btn-success btn-sm" id="impressum_save">Save change</button>
                                                <button type="submit" class="btn btn-danger btn-sm" id="impressum_close">cancel</button>

                                            </div>

                                        </div><!--Impressum  hidden end-->
                                        <style>
                                            #impressum_plugin,#impressum_close{cursor:pointer;}
                                            #impressum_close:hover{cursor:pointer;color:#000;}
                                        </style>

                                        <script>
                                            $('document').ready(function () {
                                                $('#impressum_plugin, #impressum_close').click(function () {
                                                    $('#impressum_panel').toggle('slow');
                                                });
                                                $("#impressum_save").click(function () {
                                                    var impressumd_input = $('#impressumd_input').val();
                                                    var page_id = '<?php echo $new_page_id; ?>';
                                                    $.post("./lib/fanpage.php", {'st': 8, 'impressumd_input': impressumd_input, 'page_id': page_id}, function (data) {
                                                        if (data == 1)
                                                        {
                                                            $('#impressumdb_panel').html(impressumd_input);
                                                            alert('Congrats!!! Successful.');
                                                            $('#impressum_panel').toggle('slow');
                                                        }
                                                        else
                                                        {
                                                            alert('Sorry!!! Failed. Please Try Again.');
                                                        }
                                                    });
                                                });
                                            });</script>
                                    </div>









                                    <div class="long_descrip">

                                        <div class="row form-group"> <!--Long description start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="long_description" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Long description</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="long_description2_panel">
                                                                <div class="col-md-10" id="long_description_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $long = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "long_description");
                                                                    echo $long;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Long description end-->

                                    <div class="col-md-12" id="long_description_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Follow Plugin  hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:7px;">Long description</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9" >
                                            <div class="col-md-11"style="padding-left:31px;">


                                            </div>

                                            <div class="col-md-9 controls"  style="padding-left:30px;">
                                                <input type="text" id="long_description_input" value="<?php echo $long; ?>" style=" height:112px; width:340px; margin-top:6px;" class=" form-control">


                                            </div>



                                        </div>
                                        <div class="col-md-12 "style="padding-left:180px;">
                                            <button type="submit" id="long_description_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="long_description_close">cancel</button>

                                        </div>


                                    </div>

                                    <style>
                                        #long_description,#long_description_close{cursor:pointer;}
                                        #long_description_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#long_description, #long_description_close').click(function () {
                                                $('#long_description_panel').toggle('slow');
                                            });
                                            $("#long_description_save").click(function () {
                                                var long_description_input = $('#long_description_input').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 9, 'long_description_input': long_description_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#long_description_show').html(long_description_input);
                                                        alert('Congrats!!! Successful.');
                                                        $('#long_description_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>





                                    <div class="founder_data">

                                        <div class="row form-group"> <!--Founder start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="founder_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Founder</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="founder2_panel">
                                                                <div class="col-md-10" id="founder_show" href="#" style="padding-left:10px;"> 

                                                                    <?php
                                                                    $search = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "founder");
                                                                    echo $search;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Founded end-->


                                    <div class="col-md-12" id="founder_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Founded  hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:7px;">Founder</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9" >


                                            <div class="col-md-9 controls" style="padding-left:30px;">
                                                <input type="text" id="founder_input" style=" height:112px; width:340px; margin-top:6px;" value="<?php echo $search; ?>"  class=" form-control">

                                            </div>



                                        </div>
                                        <div class="col-md-12" style="padding-left:180px;">
                                            <button type="submit" id="founder_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="founder_close">cancel</button>

                                        </div>

                                    </div><!--Founded hidden end-->

                                    <style>
                                        #founder_from,#founder_close{cursor:pointer;}
                                        #founder_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#founder_from, #founder_close').click(function () {
                                                $('#founder_panel').toggle('slow');
                                            });
                                            $("#founder_save").click(function () {
                                                var founder_input = $('#founder_input').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 10, 'founder_input': founder_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#founder_show').html(founder_input);
                                                        alert('Congrats!!! Successful.');
                                                        $('#founder_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>
                                    <div class="price_range">

                                        <div class="row form-group"> <!--Price range start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="price_range_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Price range</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="price_range2_panel">
                                                                <div class="col-md-10" id="range_fixed" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $range = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "price_range");
                                                                    //echo $range;
                                                                    for ($d = 1; $d <= $range; $d++):
                                                                        echo "$";
                                                                    endfor;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Price range end-->

                                    <div class="col-md-12" id="price_range_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Price range hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:4px;">Price range</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9">


                                            <div class="col-md-12" style="padding-left:18px;">

                                                <select class="form-control" id="price_fixed" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                    <?php
                                                    for ($i = 1; $i <= 4; $i++):
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php
                                                            for ($a = 1; $a <= $i; $a++) {
                                                                echo "$";
                                                            }
                                                            ?></option>
                                                        <?php
                                                    endfor;
                                                    ?>



                                                </select>
                                            </div>



                                        </div>
                                        <div class="col-md-12" style="padding-left:171px;">
                                            <button type="button" id="range_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="price_range_close">cancel</button>

                                        </div>
                                    </div><!--Price range hidden end-->


                                    <style>
                                        #price_range_from,#price_range_close{cursor:pointer;}
                                        #price_range_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#price_range_from, #price_range_close').click(function () {
                                                $('#price_range_panel').toggle('slow');
                                            });



                                            $('#range_save').click(function () {

                                                var price_fixed = $('#price_fixed').val();

                                                var page_id = '<?php echo $new_page_id; ?>';
                                                // alert('success');

                                                $.post("./lib/fanpage.php", {'st': 15, 'price_fixed': price_fixed, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        var price_fixed_html = $('#price_fixed option[value=' + price_fixed + ']').html();
                                                        $('#range_fixed').html(price_fixed_html);
                                                        $('#price_range_panel').toggle('slow');
                                                        // alert('Congrats!!! Successful.');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>







                                    <div class="products_data">

                                        <div class="row form-group"> <!--Products start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="products_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Products</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="products2_panel">
                                                                <div class="col-md-10" id="products_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $iteam = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "product_services");
                                                                    echo $iteam;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Products end-->

                                    <div class="col-md-12" id="Products_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Products hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:7px;">Products</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9" >
                                            <div class="col-md-11"style="padding-left:31px;">


                                            </div>
                                            <div class="col-md-1">    
    <!--                                            <span class="text-right" style="position: absolute;" id="Products_close"><i class="fa fa-close"></i></span>-->
                                            </div>
                                            <div class="col-md-9 controls" style="padding-left:30px;">
                                                <textarea  class=" form-control" id="products_input" type="text"style=" height:112px; width:340px; margin-top:6px;" ><?php echo $iteam; ?></textarea>

                                            </div>



                                        </div>
                                        <div class="col-md-12"style="padding-left:177px;">
                                            <button type="submit"  id="products_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="Products_close">cancel</button>

                                        </div>

                                    </div><!--Products hidden end-->
                                    <style>
                                        #products_from,#Products_close{cursor:pointer;}
                                        #Products_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#products_from, #Products_close').click(function () {
                                                $('#Products_panel').toggle('slow');
                                            });
                                            $("#products_save").click(function () {
                                                var products_input = $('#products_input').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 11, 'products_input': products_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#products_show').html(products_input);
                                                        alert('Congrats!!! Successful.');
                                                        $('#Products_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>


                                    <div class="products_data">

                                        <div class="row form-group"> <!--Email address start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="email_address_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Email address</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="email_address2_panel">
                                                                <div class="col-md-10" id="email_address_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $vartual = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "email");
                                                                    echo $vartual;
                                                                    ?>
                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE;cursor: pointer;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Email address end-->


                                    <div class="col-md-12" id="email_address_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Email address  hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:4px;">Email address</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9">


                                            <div class="col-md-12 controls" style="padding-left:18px;">

                                                <input type="text" id="email_address_input" class="form-control" value="<?php echo $vartual; ?>">
                                            </div>



                                        </div>
                                        <div class="col-md-12"style="padding-left:171px;">
                                            <button type="submit" id="email_address_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="no_save_close">cancel</button>

                                        </div>
                                    </div><!--Email address  hidden end-->


                                    <style>
                                        #price_range_from,#right_path{cursor:pointer;}
                                        #no_save_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#email_address_from, #no_save_close').click(function () {
                                                $('#email_address_panel').toggle('slow');
                                            });
                                            $("#email_address_save").click(function () {
                                                var email_address_input = $('#email_address_input').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 12, 'email_address_input': email_address_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#email_address_show').html(email_address_input);
                                                        alert('Congrats!!! Successful.');
                                                        $('#email_address_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>









                                    <div class="website_data">

                                        <div class="row form-group"> <!--Website start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="website_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Website</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="website2_panel">
                                                                <div class="col-md-10" id="website_address_show"  href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $dynamic = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "website");
                                                                    echo $dynamic;
                                                                    ?>

                                                                </div>

                                                                <div class="col-md-2">    
                                                                    <span style="color: #2C99CE;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Website end-->


                                    <div class="col-md-12" id="website_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Website hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:4px;">Website</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9">


                                            <div class="col-md-12 control" style="padding-left:18px; ">

                                                <input type="text" id="website_address_input" class="form-control" value="<?php echo $dynamic; ?>">
                                            </div>



                                        </div>
                                        <div class="col-md-12"style="padding-left:171px;">
                                            <button type="submit" id="website_address_save" class="btn btn-success btn-sm">Save change</button>
                                            <button type="submit" class="btn btn-danger btn-sm" id="show_close">cancel</button>

                                        </div>
                                    </div><!--Website  hidden end-->


                                    <style>
                                        #website_from,#show_close{cursor:pointer;}
                                        #show_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#website_from, #show_close').click(function () {
                                                $('#website_panel').toggle('slow');
                                            });
                                            $("#website_address_save").click(function () {
                                                var website_address_input = $('#website_address_input').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 13, 'website_address_input': website_address_input, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#website_address_show').html(website_address_input);
                                                        alert('Congrats!!! Successful.');
                                                        $('#website_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>





                                    <!--Official Page end-->
                                    <div class="dostums_id">

                                        <div class="row form-group"> <!--Dostums Page ID start-->

                                            <div class="col-md-12">
                                                <div class="col-md-12" id="dostums_page_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput"><strong>Dostums Page ID</strong></label>
                                                        </div>
                                                        <div class="col-md-5" style="padding-left:5px;">
                                                            <?php echo $_GET['page_id']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Dostums Page ID end-->
                                </fieldset><!--field set for profile overview-01 ends here-->
                                <fieldset id="profile-overview-2"><!--field set for profile overview-02 starts here-->
                                    <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:&nbsp;Milestones Information</h5>   
                                </fieldset><!--field set for profile overview-02 ends here-->
                                <fieldset id="profile-overview-3"><!--field set for profile overview-03 starts here-->
                                    <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Profile Overview&nbsp;:&nbsp;Page Owners Information</h5>   
                                </fieldset><!--field set for profile overview-03 ends here-->

                            </div><!--main div close-->

                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#profile-overview-2").hide();
                                    $("#profile-overview-3").hide();
                                    $("#milestons-btn").click(function () {
                                        $("#profile-overview-1").hide();
                                        $("#profile-overview-3").hide();
                                        $("#profile-overview-2").show();
                                    });
                                    $("#pgowners-btn").click(function () {
                                        $("#profile-overview-1").hide();
                                        $("#profile-overview-2").hide();
                                        $("#profile-overview-3").show();
                                    });
                                    $("#overview-btn").click(function () {
                                        $("#profile-overview-2").hide();
                                        $("#profile-overview-3").hide();
                                        $("#profile-overview-1").show();
                                    });

                                });
                            </script>

























                        </div>
                        
                        <?php 
                        }else{
                        ?>
                        <fieldset id="profile-overview-1"><!--field set for profile overview starts here-->
                                    <h5 class="bold" style="border-bottom: 1px dashed #ccc; padding-bottom: 10px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i>Page Overview&nbsp;:&nbsp;All Basic Page Information</h5>

                                    <div id="all_everyone">
                                        <div class="last"> <!--Category start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="category_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Category</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <?php
                                                                    $sql_pdt = $obj->FlyQuery("select 
                                                                    a.page_id,
                                                                    concat(ft.name,' / ',fc.name) as category
                                                                    from dostums_fanpage as a 
                                                                    LEFT JOIN dostums_fanpage_type as ft ON ft.id=a.page_type_id 
                                                                    LEFT JOIN dostums_fanpage_category as fc ON fc.id=a.page_category 
                                                                    WHERE a.page_id='" . $new_page_id . "'");
                                                                    ?>
                                                                    <div class="col-md-10" style="padding-left:14px;">
                                                                        <?php echo @$sql_pdt[0]->category; ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Category  end-->
<!--Category hidden end-->

                                        </div>
                                    </div><!--Category 2end-->
                                    <script>

                                    </script>

                                    <style type="text/css">
                                        #category_close,#category_from{ cursor: pointer; }
                                        #category_close:hover{ cursor: pointer; color: #000; }
                                    </style>
                                    








                                    <div class="row form-group"> <!--Fan Page Name List start-->
                                        <div class="col-sm-12">
                                            <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px;">
                                                <div class="control-group" id="fanpage_from" style="margin-top:10px; padding-left:11px;">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="textinput"><strong> Fan Page Name</strong></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <div class="col-md-12 ">
                                                            <div class="col-md-9" id="name_place" style="padding-left:10px;" >

                                                                <?php
                                                                $pagename = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "name");
                                                                echo $pagename;
                                                                ?>  
                                                            </div>


                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Fan Page Name -->



<!--Fan Page Name  hidden end-->




                                    <style>
                                        #web_dostums_from,#Posts_panel_close{cursor:pointer;}
                                        #Posts_panel_close:hover{cursor:pointer; color:#000;}
                                    </style>

                                    







                                    <div class="last"> <!--Dostums web address start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="web_dostums_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:10px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput" style="padding-left:4px;"><strong>Dostums web address</strong></label>
                                                        </div>
                                                        <div class="col-md-8">

                                                            <div class="col-md-12 " >
                                                                <div class="col-md-10"  id="web_panel" style="padding-left:0px;" >
                                                                    <?php
                                                                    $webpage = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "dostums_web_address");
                                                                    echo $webpage;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Dostums web address end-->

                                    <!--Dostums web address  hidden end-->




                                    <style>
                                        #web_dostums_from,#web_close{cursor:pointer;}
                                        #web_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    


                                    <div class="last"> <!--Start Date start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="date_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Start Date</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 ">
                                                                <div class="col-md-10" id="Date_panel" style="padding-left:14px;">
                                                                    <?php $start_date = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "start_date"); ?>

                                                                    <?php echo $start_date; ?>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Start Date end-->



<!--Start Date hidden end-->

                                    <style>
                                        #Date_from,#start_date_close{cursor:pointer;}
                                        #start_date_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    
                                    


                                    <div class="address2">
                                        <div class="last"> <!--Address start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="address_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Address</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 "> 
                                                                    <div class="col-md-10" id="show_address" style="padding-left:14px;">
                                                                        <?php
                                                                        $thikana = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "address");
                                                                        echo $thikana;
                                                                        ?>


                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Address end-->


<!--Address  hidden end-->
                                    </div><!--Address last end-->


                                    <style>
                                        #address_from,#address_close{cursor:pointer;}
                                        #address_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    




                                    <div id="all_everyone">
                                        <div class="last"> <!--Short description start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="short_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:8px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Short description</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " id="friend_requests_panel">
                                                                    <div class="col-md-10" id="short_decrip_value" style="padding-left:14px;">

                                                                        <?php
                                                                        $sortdecrib = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "short_description");
                                                                        echo $sortdecrib;
                                                                        ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Short description end-->

                                            <!--Short description hidden end-->

                                        </div><!--Short description  2end-->

                                        <style type="text/css">
                                            #follow_cmnt_close,#sort_close{ cursor: pointer; }
                                            #sort_close:hover{ cursor: pointer; color: #000; }
                                        </style>
                                        

                                        <script>

                                        </script>



                                        <div class="impressum">
                                            <div class="row form-group"> <!--Impressum start-->
                                                <div class="col-md-12">
                                                    <div class="col-md-12" id="impressum_plugin" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Impressum</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " >
                                                                    <div class="col-md-10" id="impressumdb_panel" href="#" style="padding-left:10px;">

                                                                        <?php
                                                                        $pressum = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "impressum");
                                                                        echo $pressum;
                                                                        ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Impressum end-->

                                        <!--Impressum  hidden end-->
                                        <style>
                                            #impressum_plugin,#impressum_close{cursor:pointer;}
                                            #impressum_close:hover{cursor:pointer;color:#000;}
                                        </style>

                                      
                                    </div>









                                    <div class="long_descrip">

                                        <div class="row form-group"> <!--Long description start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="long_description" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Long description</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="long_description2_panel">
                                                                <div class="col-md-10" id="long_description_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $long = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "long_description");
                                                                    echo $long;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Long description end-->


                                    <style>
                                        #long_description,#long_description_close{cursor:pointer;}
                                        #long_description_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    

                                    <div class="founder_data">

                                        <div class="row form-group"> <!--Founder start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="founder_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Founder</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="founder2_panel">
                                                                <div class="col-md-10" id="founder_show" href="#" style="padding-left:10px;"> 

                                                                    <?php
                                                                    $search = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "founder");
                                                                    echo $search;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Founded end-->


                                    <!--Founded hidden end-->

                                    <style>
                                        #founder_from,#founder_close{cursor:pointer;}
                                        #founder_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    
                                    <div class="price_range">

                                        <div class="row form-group"> <!--Price range start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="price_range_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Price range</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="price_range2_panel">
                                                                <div class="col-md-10" id="range_fixed" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $range = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "price_range");
                                                                    //echo $range;
                                                                    for ($d = 1; $d <= $range; $d++):
                                                                        echo "$";
                                                                    endfor;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Price range end-->

                                    <!--Price range hidden end-->


                                    <style>
                                        #price_range_from,#price_range_close{cursor:pointer;}
                                        #price_range_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    






                                    <div class="products_data">

                                        <div class="row form-group"> <!--Products start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="products_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Products</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="products2_panel">
                                                                <div class="col-md-10" id="products_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $iteam = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "product_services");
                                                                    echo $iteam;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Products end-->
<!--Products hidden end-->
                                    <style>
                                        #products_from,#Products_close{cursor:pointer;}
                                        #Products_close:hover{cursor:pointer;color:#000;}
                                    </style>



                                    <div class="products_data">

                                        <div class="row form-group"> <!--Email address start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="email_address_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Email address</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="email_address2_panel">
                                                                <div class="col-md-10" id="email_address_show" href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $vartual = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "email");
                                                                    echo $vartual;
                                                                    ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Email address end-->
<!--Email address  hidden end-->


                                    <style>
                                        #price_range_from,#right_path{cursor:pointer;}
                                        #no_save_close:hover{cursor:pointer;color:#000;}
                                    </style>



                                    <div class="website_data">

                                        <div class="row form-group"> <!--Website start-->
                                            <div class="col-md-12">
                                                <div class="col-md-12" id="website_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="textinput"><strong>Website</strong></label>
                                                        </div>
                                                        <div class="col-md-9">

                                                            <div class="col-md-12 " id="website2_panel">
                                                                <div class="col-md-10" id="website_address_show"  href="#" style="padding-left:10px;">
                                                                    <?php
                                                                    $dynamic = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "website");
                                                                    echo $dynamic;
                                                                    ?>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Website end-->


                                    <!--Website  hidden end-->


                                    <style>
                                        #website_from,#show_close{cursor:pointer;}
                                        #show_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <!--Official Page end-->
                                    <div class="dostums_id">

                                        <div class="row form-group"> <!--Dostums Page ID start-->

                                            <div class="col-md-12">
                                                <div class="col-md-12" id="dostums_page_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:14px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput"><strong>Dostums Page ID</strong></label>
                                                        </div>
                                                        <div class="col-md-5" style="padding-left:5px;">
                                                            <?php echo $_GET['page_id']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Dostums Page ID end-->
                                </fieldset>
                        <?php
                        }
                        ?>

                        <div style="clear:both;"></div>


                    </div>

                    <div class="panel-footer">



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