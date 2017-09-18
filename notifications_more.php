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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dostums - Home </title>
        <?php include('plugin/header_script.php'); ?>

    <body>

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
        <script>
            //on sound start
            function checkboxon()
            {
                var sound = 'no';
                if (document.getElementById("get_notification_sound").checked == true)
                {
                    sound = 'yes';
                }
                else if (document.getElementById("dont_get_notification_sound").checked == true)
                {
                    sound = 'no';
                }
                else
                {
                    sound = 'no';
                }



                $.post("lib/notifications_data.php", {'st': 8, 'src': sound}, function (data) {
                    $('#all_notification').hide('slow');
                    $("#soundplace").show('slow');
                    $("#soundplace").html(sound);
                    alert(data);
                });
            } //on sound end




            //email start
            function checkboxemail()
            {
                var emailchk = 'no';
                if (document.getElementById("email_notificatyes").checked == true)
                {
                    emailchk = 'yes';
                }
                else if (document.getElementById("email_notificatno").checked == true)
                {
                    emailchk = 'no';
                }
                else
                {
                    emailchk = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 9, 'par': emailchk}, function (data) {
                    $('#all_notification1').hide('slow');
                    $('#emailplace').show('slow');
                    $('#emailplace').html(emailchk);
                    alert(data);
                });
            }//email end


            //mobile start
            function checkboxphn()

            {
                var chkphn = 'no';
                if (document.getElementById("notenbryes").checked == true)
                {
                    chkphn = 'yes';
                }
                else if (document.getElementById("notenbrno").checked == true)
                {
                    chkphn = 'no';
                }
                else
                {
                    chkphn = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 10, 'phn': chkphn}, function (data) {
                    $('#all_notification2').hide('slow');
                    $('#mobileplace').show('slow');
                    $('#mobileplace').html(chkphn);
                    alert(data);

                });
            } //mobile end



            //text massage start
            function checkboxtextsms()
            {
                var sms = 'no';
                if (document.getElementById("textsmsyes").checked == true)
                {
                    sms = 'yes';
                }
                else if (document.getElementById("textsmsno").checked == true)
                {
                    sms = 'no';
                }
                else
                {
                    sms = 'no';
                }
                $.post("lib/notifications_data.php", {'st': 11, 'msg': sms}, function (data) {
                    $('#all_notification1s').hide('slow');
                    $('#teleplace').show('slow');
                    $('#teleplace').html(sms);
                    alert(data);
                });
            }   //text massage end

        </script>


<!--        <script>
            $(document).ready(function () {
                $('#all_notification').hide('slow');
                $('#all_notification1').hide('slow');
                $('#all_notification2').hide('slow');
                $('#all_notification1s').hide('slow');

                $('#basic_info').click(function () {

                    $("#soundplace").hide('slow');
                    $("#emailplace").hide('slow');
                    $("#mobileplace").hide('slow');
                    $("#teleplace").hide('slow');

                    $('#all_notification').show('slow');
                    $('#all_notification1').show('slow');
                    $('#all_notification2').show('slow');
                    $('#all_notification1s').show('slow');

                });
            });

        </script>-->


        <div class="main-container page-container section-padd">
            <div class="mailbox-content">
                <div class="container">



                    <div class="col-lg-9 col-md-9">

                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><strong>Notifications</strong></h5>
                                <div class="ibox-tools">
                                    <a href="notifications.php">
                                        <button class="def_button" id="basic_info" type="button">
                                            <i class="fa fa-pencil-square-o"  aria-hidden="true"> Notifications Settings </i>

                                        </button>
                                    </a>
                                </div>


                                <div class="total_row">

                                    <div class="row form-group"> <!--Most notifications-->
                                        <div class="col-md-12">


                                            <?php
                                            include('class/extraClass.php');
                                            $extra = new SiteExtra();
                                            
                                            
                                            

                                            $sqlrequest_detail = $obj->FlyQuery("SELECT
                                                                                dn.id,
                                                                                dn.user_id,
                                                                                dn.date_time,
                                                                                CONCAT(du.first_name,' ',du.last_name) as name,
                                                                                dp.photo,
                                                                                dn.status,
                                                                                dn.notification,
                                                                                df.name as page_name,
                                                                                pdp.photo as page_photo,
                                                                                dg.name as group_name,
                                                                                gdp.photo as group_photo
                                                                               

                                                                                FROM `dostums_notifications` as dn 
                                                                                LEFT JOIN dostums_user as du on du.id=dn.user_id 
                                                                                LEFT JOIN dostums_profile_photo as dpp on dpp.user_id=dn.user_id AND dpp.`status`='2'
                                                                                LEFT JOIN dostums_photo as dp on dp.id=dpp.photo_id


                                                                                LEFT JOIN dostums_fanpage as df on df.page_id = dn.page_id
                                                                                LEFT JOIN dostums_page_profile_photo as dppp on dppp.page_id = df.page_id AND dppp.`status`='2'
                                                                                LEFT JOIN dostums_photo as pdp on pdp.id=dppp.photo_id


                                                                                LEFT JOIN dostums_group as dg on dg.group_id =dn.group_id
                                                                                LEFT JOIN dostums_group_profile_photo as dgpp on dgpp.group_id = dn.group_id AND dgpp.`status`='2'
                                                                                LEFT JOIN dostums_photo as gdp on gdp.id = dgpp.photo_id 

                                                                                WHERE dn.user_id!='" . $input_by . "' AND dn.user_id IN  (SELECT
                                                                                df.uid
                                                                                FROM `dostums_friend` as df 
                                                                                WHERE df.`to_uid`='" . $input_by . "' AND (df.status='2' OR df.status='1' OR df.status='0') 
                                                                                GROUP BY df.uid) ORDER BY dn.id DESC");

                                            if (!empty($sqlrequest_detail)) {
                                                $count = count($sqlrequest_detail);
                                                foreach ($sqlrequest_detail as $detail):
                                                    ?>
                                                    <div class="col-md-12" id="comment_ranking" style=" background:#F5F5F5; border: 1px #0cc solid; padding-top:5px; padding-bottom: 0px; padding-left: 0px;">
                                                        <div class="control-group">
                                                            <div class="col-md-12">
                                                                <div>
                                                                    <div class="dropdown-messages-box">
                                                                        <div class="pull-left">

                                                                            <img class="media-object img-circle img-thumbnail" alt="Image"
                                                                                 src="./profile/<?php echo $detail->photo; ?>" style="height:35px; width:35px;">
                                                                        </div>

                                                                        <div class="media-body " style="padding-top:1px !important;">
                                                                            <strong>
                                                                                <?php echo $detail->notification;
                                                                                ?> 

                                                                            </strong>
                                                                            <p class="mb-sm">
                                                                                <small><?php echo $extra->duration($detail->date_time, date('Y-m-d H:i:s')); ?></small>
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <?php
                                                endforeach;
                                               $insstring="INSERT INTO dostums_notifications_user_data (notification_id,user_id,post_id) 

                                                                (SELECT dn.id,'".$input_by."', dn.post_id 
                                                                 FROM 
                                                                 `dostums_notifications` as dn 
                                                                 WHERE dn.user_id!='".$input_by."' 
                                                                 AND dn.user_id IN (SELECT df.uid FROM `dostums_friend` as df WHERE df.`to_uid`='".$input_by."' AND (df.status='2' OR df.status='1' OR df.status='0') AND dn.id NOT IN (SELECT notification_id FROM dostums_notifications_user_data WHERE user_id='".$input_by."')))";
                                                $obj->FlyQuery($insstring);
                                                
                                                
                                                
                                                
                                            }
                                            ?>
                                            <div class="col-md-12">
                                                <a href="#">
                                                    <div class="dropdown-messages-box">
                                                        <div class="media-body ">
                                                            <strong>No Request Found Please Reload Page Again.</strong> 
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!--Most notifications end-->










                                </div> 
                            </div>
                        </div>
                    </div>
                    </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>








    <?php include('plugin/fotter.php') ?>


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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>

