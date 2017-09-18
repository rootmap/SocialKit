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


                            <ul class="panel-actions actions" style="margin-left: ">


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
//                                
                            });</script>


                        <div id="photo-content" style="clear:both;" class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body p-0">
                                        <div class="list-group text-left" style="text-align:left;">

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
                                        <div class="last"> <!--Favourites start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="category_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Favourites</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " id="category_panel">
                                                                    <?php
                                                                    $fav = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "favourite");
                                                                    ?>
                                                                    <div class="col-md-10" style="padding-left:45px;">
                                                                        <?php echo $fav; ?>
                                                                    </div>


                                                                    <div class="col-md-2">    
                                                                        <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--Favourites end-->

                                            <div class="col-md-12" id="category_from_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Favourites hidden start-->

                                                <div class="col-md-3">
                                                    <label class="control-label" for="textinput">
                                                        <strong  style="padding-left:16px;">Favourites</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-8" style="padding-left:63px;">

                                                    <div class="checkbox" style="">
                                                        <label>
                                                            <input type="checkbox" id="checkfav" style="margin-top:20px;"> Add Page to your favourites[?]
                                                        </label>
                                                    </div>



                                                </div>
                                                <div class="col-md-12" style="padding-left:198px;">
                                                    <button id="category_btn" type="submit" class="btn btn-success btn-sm">Save Change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="category_close">cancel</button>

                                                </div>
                                            </div><!--Favourites hidden end-->

                                        </div>
                                    </div><!--Favourites 2end-->
                                    <script>

                                    </script>

                                    <style type="text/css">
                                        #category_close,#category_from{ cursor: pointer; }
                                        #category_close:hover{ cursor: pointer; color: #000; }
                                    </style>
                                    <script>
                                        $('document').ready(function () {
                                            $('#category_from, #category_close').click(function () {
                                                $('#category_from_panel').toggle('slow');
                                            });
                                            $("#category_btn").click(function () {
                                                var page_id = '<?php echo $new_page_id; ?>';

                                                var favyesno = 'No';
                                                if (document.getElementById('checkfav').checked == true)
                                                {
                                                    var favyesno = 'Yes';
                                                }
                                                else
                                                {
                                                    var favyesno = 'No';
                                                }

                                                //console.log(favyesno);

                                                $.post("./lib/fanpage.php", {'st': 16, 'fav': favyesno, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#category_panel').html(favyesno);
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








                                    <div class="row form-group"> <!--Page visibility start-->
                                        <div class="col-sm-12">
                                            <div class="col-md-12"  style=" background:#F5F5F5; border: 1px #0cc solid; padding: 5px;">
                                                <div class="control-group" id="page_visibility_from" style="margin-top:10px; padding-left:11px;">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="textinput"><strong> Page visibility</strong></label>
                                                    </div>
                                                    <div class="col-md-9">

                                                        <div class="col-md-12 ">
                                                            <div class="col-md-9" id="page_visibility_show" style="padding-left:37px;" >

                                                                <?php
                                                                $visibility = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "name");
                                                                echo $visibility;
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
                                    <!--Page visibility end -->




                                    <div class="col-md-12" id="page_visibility_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Page visibility hidden start-->

                                        <div class="col-md-4">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:17px;">Page visibility</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-8" style="padding-left:0px;" >
                                            <div class="col-md-11 controls">

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="visibility_value" style="margin-top:20px;">&nbsp;Unpublish Page[?]
                                                    </label>
                                                </div>


<!--                                                <input type="text" id="fanpage_fill" class="form-control" value="<?php // echo $pagename;                           ?>"  >-->
                                            </div>
                                            <!--                                        <div class="col-md-1">  
                                                                                        <span class="text-right" style="position: absolute;" id="dostums_close"><i class="fa fa-close"></i></span>
                                                                                    </div>-->
                                            <div class="col-md-12"style="padding-left:16px;">
                                                <button type="submit" id="page_visibli_save" class="btn btn-success btn-sm">Save change</button>
                                                <button type="submit" id="page_visibility_close" class="btn btn-danger btn-sm">cancel</button>

                                            </div>



                                        </div>

                                    </div><!--Page visibility hidden end-->




                                    <style>
                                        #page_visibility_from,#page_visibility_close{cursor:pointer;}
                                        #page_visibility_close:hover{cursor:pointer; color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#page_visibility_from, #page_visibility_close').click(function () {
                                                $('#page_visibility_panel').toggle('slow');
                                            });
                                            $("#page_visibli_save").click(function () {

                                                var page_id = '<?php echo $new_page_id; ?>';
                                                var unpablish_value = 'No';
                                                if (document.getElementById('visibility_value').checked == true)
                                                {
                                                    var unpablish_value = 'Yes';
                                                }
                                                else
                                                {
                                                    var unpablish_value = 'No';
                                                }



                                                $.post("./lib/fanpage.php", {'st': 17, 'pablish_value': unpablish_value, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#page_visibility_show').html(unpablish_value);
                                                        alert('Congrats!!! Successful.');
                                                        $('#page_visibility_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script> 










                                    <div class="last"> <!--Messages start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="massgae_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:10px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput" style="padding-left:6px;"><strong>Messages</strong></label>
                                                        </div>
                                                        <div class="col-md-8">

                                                            <div class="col-md-12 " >
                                                                <div class="col-md-10"  id="massage_show_panel" style="padding-left:0px;" >
                                                                    <?php
                                                                    $maggase_info = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "messages");
                                                                    echo $maggase_info;
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
                                    </div><!--Messages end-->

                                    <div class="col-md-12" id="massage_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Messages hidden start-->

                                        <div class="col-md-3">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:18px;">Messages</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="col-md-11 controls" style="padding-left:40px;">

                                                <div class="checkbox" style="">
                                                    <label>
                                                        <input type="checkbox" id="inbox_value" style="margin-top:20px;">&nbsp;Allow people to contact my Page privately by showing the Message button
                                                    </label>
                                                </div>


<!--                                                <input type="text" id="web_address"  class="form-control" value="<?php //echo $webpage;                         ?>" >-->
                                            </div>
                                            <!--                                        <div class="col-md-1">    
                                                                                        <span class="text-right" style="position: absolute;" id="dostums_close"><i class="fa fa-close"></i></span>
                                                                                    </div>-->
                                            <div class="col-md-12" style="padding-left:40px;">
                                                <button type="submit" class="btn btn-success btn-sm" id="massage_save">Save change</button>
                                                <button type="submit" class="btn btn-danger btn-sm" id="massage_close">cancel</button>

                                            </div>



                                        </div>

                                    </div><!--Messages end-->




                                    <style>
                                        #massgae_from,#massage_close{cursor:pointer;}
                                        #massage_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#massgae_from, #massage_close').click(function () {
                                                $('#massage_panel').toggle('slow');
                                            });

                                            $("#massage_save").click(function () {

                                                var page_id = '<?php echo $new_page_id; ?>';


                                                var massage_value = 'No';
                                                if (document.getElementById('inbox_value').checked == true)
                                                {
                                                    var massage_value = 'Yes';
                                                }
                                                else
                                                {
                                                    var massage_value = 'No';
                                                }



                                                $.post("./lib/fanpage.php", {'st': 18, 'sms_passing': massage_value, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#massage_show_panel').html(massage_value);
                                                        alert('Congrats!!! Successful.');
                                                        $('#massage_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>



                                    <div class="last"> <!--Country restrictions start-->

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-12"  id="country_restrictions_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                    <div class="control-group">
                                                        <div class="col-md-4">
                                                            <label class="control-label" for="textinput"><strong>Country restrictions</strong></label>
                                                        </div>
                                                        <div class="col-md-8">

                                                            <div class="col-md-12 ">
                                                                <div class="col-md-10" id="country_restrictions_show" style="padding-left:0px;">
                                                                    <?php $country_value = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "country_restrictions"); ?>

                                                                    <?php echo $country_value; ?>
                                                                </div>

                                                                <div class="col-md-2" style="padding-left:8px;">    
                                                                    <span style="color: #2C99CE; cursor: pointer;"> Edit</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Country restrictions end-->




                                    <div class="col-md-12" id="country_restrictions_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Country restrictions hidden start-->

                                        <div class="col-md-4">
                                            <label class="control-label" for="textinput">
                                                <strong  style="padding-left:16px;">Country restrictions</strong>
                                            </label>
                                        </div>
                                        <div class="col-md-8">

                                            <select class="form-control" id="cntry_inbox">
                                                <option value="">Select Country</option>
                                                <?php
                                                $sqlcountry = $obj->SelectAll('dostums_country');
                                                if (!empty($sqlcountry))
                                                    foreach ($sqlcountry as $country):
                                                        ?>
                                                        <option value="<?php echo $country->id; ?>"><?php echo $country->country_name; ?></option>
                                                        <?php
                                                    endforeach;
                                                ?>

                                            </select>

                                            <div class="col-md-9" style="padding-left:20px; padding-top:10px;">                          
                                                <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions1" id="show_value_0" value="option1">Only show this Page to viewers in these countries
                                                </label><br>

                                                <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions1" id="show_value_1" value="option2">Hide this Page from viewers in these countries
                                                </label>
                                            </div>


                                            <div class="col-md-12" style="padding-left:0px;">
                                                <button type="submit" class="btn btn-success btn-sm"  id="country_restrictions_save">Save change</button>
                                                <button type="submit" class="btn btn-danger btn-sm" id="country_restrictions_close">cancel</button>

                                            </div>



                                        </div>
                                    </div><!--Country restrictions hidden end-->

                                    <style>
                                        #country_restrictions_save,#country_restrictions_close{cursor:pointer;}
                                        #country_restrictions_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#country_restrictions_from, #country_restrictions_close').click(function () {
                                                $('#country_restrictions_panel').toggle('slow');
                                            });

                                            $('#country_restrictions_save').click(function () {


                                                var page_id = '<?php echo $new_page_id; ?>';

                                                var country_name = $('#cntry_inbox').val();
                                                //var cry_restrictions_save = 'No';
                                                if (document.getElementById('show_value_0').checked == true)
                                                {
                                                    var cry_restrictions_save = 'Yes';
                                                }
                                                else if (document.getElementById('show_value_1').checked == true)
                                                {
                                                    var cry_restrictions_save = 'No';
                                                }


                                                console.log(cry_restrictions_save);

                                                $.post("./lib/fanpage.php", {'st': 19, 'country_name': country_name, 'cry_restions': cry_restrictions_save, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        var opt = $('#cntry_inbox option[value=' + country_name + ']').html();
                                                        $('#country_restrictions_show').html(opt + ',' + cry_restrictions_save);
                                                        //alert('Congrats!!! Successful.');
                                                        $('#country_restrictions_panel').toggle('slow');
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
                                        <div class="last"> <!--Age restrictions start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="age_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:16px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Age restrictions</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 "> 
                                                                    <div class="col-md-10" id="age_restriction_show" style="padding-left:14px;">
                                                                        <?php
                                                                        $agerestic = $obj->SelectAllByVal("dostums_age_restrictions", "page_id", $new_page_id, "age_iteam");
                                                                        echo $agerestic;
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
                                        </div><!--Age restrictions end-->



                                        <div class="col-md-12" id="age_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Age restrictions  hidden start-->

                                            <div class="col-md-4">
                                                <label class="control-label" for="textinput">
                                                    <strong  style="padding-left:16px;"> Age restrictions </strong>

                                                </label>
                                            </div>
                                            <div class="col-md-8" >
                                                <div class="col-md-11 controls"style="padding-left:2px;">
                                                    <select class="form-control" id="age_restriction_option" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                        <option value="Select Age Restrictions">Select Age Restrictions:</option>
                                                        <option value="Anyone (13+)">Anyone (13+)</option>
                                                        <option value="People 17 and over">People 17 and over</option>
                                                        <option value="People 18 and over">People 18 and over</option>
                                                        <option value="People 19 and over">People 19 and over</option>
                                                        <option value="People 21 and over">People 21 and over</option>
                                                        <option value="Alcohol-related">Alcohol-related</option>


                                                    </select>


                                                </div>

                                                <div class="col-md-12"style="padding-left:2px;">
                                                    <button type="submit"  class="btn btn-success btn-sm" id="age_restiction_save" >Save change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="age_btn_close">cancel</button>

                                                </div>



                                            </div>


                                        </div><!--Age restrictions  hidden end-->
                                    </div><!--Age restrictions last end-->


                                    <style>
                                        #age_from,#age_btn_close{cursor:pointer;}
                                        #age_btn_close:hover{cursor:pointer;color:#000;}
                                    </style>

                                    <script>
                                        $('document').ready(function () {
                                            $('#age_from,#age_btn_close').click(function () {
                                                $('#age_panel').toggle('slow');
                                            });
                                            $("#age_restiction_save").click(function () {
                                                var age_restriction_option = $('#age_restriction_option').val();
                                                var page_id = '<?php echo $new_page_id; ?>';
                                                $.post("./lib/fanpage.php", {'st': 20, 'age_restriction_option': age_restriction_option, 'page_id': page_id}, function (data) {
                                                    if (data == 1)
                                                    {
                                                        $('#age_restriction_show').html(age_restriction_option);
                                                        alert('Congrats!!! Successful.');
                                                        $('#age_panel').toggle('slow');
                                                    }
                                                    else
                                                    {
                                                        alert('Sorry!!! Failed. Please Try Again.');
                                                    }
                                                });
                                            });
                                        });</script>












                                    <div id="all_everyone">
                                        <div class="last"> <!--Profanity filter start-->

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12"  id="profanity_filter_from" style=" background:#F5F5F5; border: 1px #0cc solid; padding:12px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput" style="padding-left:4px;"><strong>Profanity filter </strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12">
                                                                    <div class="col-md-10" id="profantiy_filter_show" style="padding-left:14px;">

                                                                        <?php
                                                                        $profanity = $obj->SelectAllByVal("dostums_profanity_filter", "page_id", $new_page_id, "profanity__filter");
                                                                        echo $profanity;
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
                                            </div><!--Profanity filter end-->

                                            <div class="col-md-12" id="profanity_filter_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Profanity filter hidden start-->

                                                <div class="col-md-3">
                                                    <label class="control-label" for="textinput">
                                                        <strong  style="padding-left:16px;">Profanity filter</strong>
                                                    </label>
                                                </div>
                                                <div class="col-md-9" style="padding-left:30px;">

                                                    <div class="col-md-11 controls"style="padding-left:26px;">
                                                        <select class="form-control" id="profanity_select_option" style="background:#F5F5F5; width: 262px; margin-top:11px;">
                                                            <option value="Off">Off</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Strong">Strong</option>



                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-12" style="padding-left:193px;">
                                                    <button type="submit" class="btn btn-success btn-sm"  id="profanity_filter_save" >Save change</button>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="profanity_filter_close">cancel</button>

                                                </div>

                                            </div><!--Profanity filter hidden end-->

                                        </div><!--Profanity filter 2end-->

                                        <style type="text/css">
                                            #profanity_filter_from,#profanity_filter_close{ cursor: pointer; }
                                            #profanity_filter_close:hover{ cursor: pointer; color: #000; }
                                        </style>
                                        <script>
                                            $('document').ready(function () {
                                                $('#profanity_filter_from, #profanity_filter_close').click(function () {
                                                    $('#profanity_filter_panel').toggle('slow');
                                                });
                                                $("#profanity_filter_save").click(function () {
                                                    // alert('dsdsfds');
                                                    var profanity_select_option = $('#profanity_select_option').val();
                                                    var page_id = '<?php echo $new_page_id; ?>'
                                                    $.post("./lib/fanpage.php", {'st': 21, 'profanity_select_option': profanity_select_option, 'page_id': page_id}, function (data) {
                                                        if (data == 1)
                                                        {
                                                            $('#profantiy_filter_show').html(profanity_select_option);
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



                                        <div class="remove">
                                            <div class="row form-group"> <!--Remove Page start-->
                                                <div class="col-md-12">
                                                    <div class="col-md-12" id="remove_plugin" style=" background:#F5F5F5; border: 1px #0cc solid; padding:15px;">
                                                        <div class="control-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label" for="textinput"><strong>Remove Page</strong></label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <div class="col-md-12 " >
                                                                    <div class="col-md-10" id="remove_show panel" href="#" style="padding-left:10px;">


                                                                    </div>

                                                                    <div class="col-md-2">    
                                                                        <span style="color: #2C99CE;"> <i class="fa fa-close"></i></span><br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--Remove Page end-->

                                        <div class="col-md-12" id="remove_panel" style="margin-bottom: 20px; display: none; border: 1px #69BD45 solid;background-color:#E6E6E6; padding: 10px 0;"> <!--Remove Page  hidden start-->

                                            <div class="col-md-3">
                                                <label class="control-label" for="textinput">
                                                    <strong  style="padding-left:15px;">Remove Page</strong>
                                                </label>
                                            </div>
                                            <div class="col-md-9" >
                                                <div class="col-md-11"style="padding-left:31px;">


                                                </div>

                                                <div class="col-md-9 controls" style="padding-left:30px;">

                                                    Deleting your Page means that nobody will be able to see or find it. Once you click delete, 
                                                    you'll have 14 days to restore it in case you change your mind.
                                                    After that, you'll be asked to confirm whether to delete it permanently.
                                                    If you choose to unpublish instead, only admins will be able to see your Page.<br>
                                                    <?php
                                                    $page_name = $obj->SelectAllByVal("dostums_fanpage", "page_id", $new_page_id, "name");
                                                    ?>
                                                    <button type="button" class="btn btn-link btn-sm" id="remove_page" data-toggle="modal" data-target="#remove_modal" style="padding-left:1px; color:#2CB8E8;">Delete <?php echo $page_name; ?></button>


                                                </div>



                                            </div>



                                            <!--modal start--->
                                            <div class="modal fade" tabindex="-1" role="dialog" id="remove_modal" style="padding-top:80px;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"  style="background-color:#99CA3C;">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" style="font-size:24px;">Delete Page?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>If you delete your Page, you'll still be able to restore it within 14 days. 
                                                                After that, you'll be asked to confirm that you want to permanently delete it. 
                                                                You can also select Unpublish this page below so that only admins can see this page.

                                                                Are you sure you want to begin the process of deleting this page?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" id="delete_btn">Delete Page&nbsp;?</button>

                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <!--modal end--->



                                        </div><!--Remove Page hidden end-->
                                        <style>
                                            #remove_plugin,#remove_plaug_close{cursor:pointer;}
                                            #remove_plaug_close:hover{cursor:pointer;color:#000;}
                                        </style>

                                        <script>
                                            $('document').ready(function () {
                                                $('#remove_plugin, #remove_plaug_close').click(function () {
                                                    $('#remove_panel').toggle('slow');
                                                });

                                                $("#delete_btn").click(function () {

                                                    var page_id = '<?php echo $new_page_id; ?>';
                                                    var c = confirm('Are You Sure To Delete Your All Page Data Including Your Page.');
                                                    if (c == true)
                                                    {
                                                        $.post("./lib/fanpage.php", {'st': 24, 'page_id': page_id}, function (data) {
                                                            if (data == 1)
                                                            {
                                                                // $('#delete_btn').html(delete_btn);
                                                                alert('Congrats!!! Your Page All Data Deleted Successfully.');
                                                                // $('#impressum_panel').toggle('slow');
                                                                window.location.replace('./home.php');
                                                            }
                                                            else
                                                            {
                                                                alert('Sorry!!! Failed. Please Try Again.');
                                                            }
                                                        });
                                                    }
                                                });
                                            });</script>
                                    </div>


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
