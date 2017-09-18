<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">

<!-- Fav and touch icons -->
<link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
<link rel="manifest" href="images/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<!-- [ css file link start ] -->
<link href="assets/css/select2.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-select.min.css" rel="stylesheet">
<link href="test_plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href="assets/material/css/roboto.min.css" rel="stylesheet">
<link href="assets/material/css/material.min.css" rel="stylesheet">
<link href="assets/material/css/ripples.min.css" rel="stylesheet">
<link href="assets/material/dropdownjs/jquery.dropdown.css" rel="stylesheet">
<link rel="stylesheet" href="assets/plugins/bootstrap-sweetalert-master/dist/sweetalert.css">
<link href="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="assets/plugins/modal-library/mikes-modal.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="./assets/foundation-icons/foundation-icons.css" rel="stylesheet">
<!-- [ css file link end ] -->

<!-- [ custom css start ] -->
<style type="text/css">
    .def_button{ border:0px; background:none; color:#2C99CE; }
    .def_button2{border-radius: 5px !important; background:none; color:#2C99CE; min-width: 30px !important;
                 padding-left: 0px !important; padding-right: 0px !important; }
    .def_button2:hover{background-color: #ff5722 !important; color: #ffffff !important;}
    @media (max-width: 435px) {
        .panel-customs-post.panel-status .panel-heading .post-types li.active::before{
            bottom: -43px !important;
        }
        .panel-customs-post.panel-status .panel-heading .post-types li.active::after{
            bottom: -41px !important;
        }
        .panel-customs-post .panel-footer .btn{
            float:left !important;
        }
    }
</style>
<!-- [ custom css end ] -->


<!-- [ js file link start ] -->
<script src="./lib/js/jquery-1.10.2.min.js"></script>
<script src="test_plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-sweetalert-master/dist/sweetalert.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/plugins/modal-library/mikes-modal.min.js" type="text/javascript"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="assets/js/custom.modernizr.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="lib/script.js"></script>
<script src="lib/mycustomscript.js"></script>
<script>
    paceOptions = {
        elements: true
    };
</script>
<!-- [ js file link end ] -->



<?php
if ($obj->filename() != "photos.php") {
?>
    <script src="assets/plugins/newsbox/jquery.bootstrap.newsbox.min.js"></script>
<?php
 }
if (in_array($obj->filename(), array("profile.php", "profiles.php"))) {
?>
     <script src="assets/js/moment.js"></script>
     <script src="assets/js/fullcalendar.min.js"></script>
     <link href="assets/css/fullcalendar.print.min.css" rel="stylesheet">
     <link href="assets/css/fullcalendar.min.css" rel="stylesheet">
<!-- <script src="http://fullcalendar.io/js/fullcalendar-2.4.0/lib/moment.min.js"></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.print.css" rel="stylesheet">-->
<?php
 }
 ?>

    

 
    

 <?php
 if ($obj->filename() == "signup.php") {
 ?>
     <link rel="stylesheet" href="lib/js/jquery-ui.css">
     <script src="lib/js/jquery-1.10.2.js"></script>
     <script src="lib/js/jquery-ui.js"></script>
     <script>
         $(function() {
             $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
         });
     </script>
 <?php
 }

 if (in_array($obj->filename(), array("profile.php", "profiles.php", "home.php","homeliveFeed.php", "group.php", "page.php", "home_edit.php"))) {
 ?>

     <style type="text/css">
         .fileUpload {
             position: relative !important;
             overflow: hidden !important;
             margin: 0px !important;
         }
         .fileUpload input.upload {
             position: absolute !important;
             top: 0 !important;
             right: 0 !important;
             margin: 0 !important;
             padding: 0 !important;
             font-size: 20px !important;
             cursor: pointer !important;
             opacity: 0 !important;
             filter: alpha(opacity=0) !important;
         }
     </style>
     <link rel="stylesheet" href="assets/css/crop/style.css" type="text/css" />
     <script src="lib/cropbox.js"></script>
<?php
}
?>

    
     
<?php
$array=array("home_view.php","page_view.php","group_view.php");
if(in_array($obj->filename(),$array)){
?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>  
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#mcc<?php echo $_GET['view']; ?>").click();
        }, 2000);
    });
</script>
<style>
.commentList{ height: auto; overflow: visible; }
</style>
<?php
 }
 ?>





<!-- [custom script for all page start] -->
<?php
if (!in_array($obj->filename(), array("signup.php", "login.php"))) {
?>
<script>
        $(document).ready(function(e) {
            $.cookie("windowchat1", "");
            $.cookie("windowchat2", "");
            $.cookie("windowchat3", "");
            $.cookie("chat_window_1_user", "0");
            $.cookie("chat_window_2_user", "0");
            $.cookie("chat_window_3_user", "0");
            // alert('636');
        });



// [jquery function start]
       (function ( $ ) {
            $('#totalfriendrequest').html("..");
            
            load_frnd_notification = {'st': 1};
            $.post('lib/shout.php', load_frnd_notification, function(data_notification) {
                var frndData = jQuery.parseJSON(data_notification);
                var friend_request = frndData.friend_request;
                $('#totalfriendrequest').html(friend_request);
                $('#user_request').html(frndData.user_request);

            });
            

            $("#totalfriendrequest_bell,#totalfriendrequest").click(function(e) {
                load_frnd_request_detail = {'st': 2};
                var def_html = "<li><a href='notification_more.php'><div class='dropdown-messages-box'><div class='media-body '><strong>Loading Please Wait...</strong></div></div></a></li>";
                $('#totalfriendrequestbox').html(def_html);

                $.post('lib/shout.php', load_frnd_request_detail, function(data_notification) {
                    $('#totalfriendrequestbox').html(data_notification);
                });
            });


            

        function loadcommentprofile(post_id)
        {
            load_new_comment = {'st': 1, 'post_id': post_id};
            $.post('lib/comment.php', load_new_comment, function(comment) {
                if (comment)
                {
                    $('#modal_comment_list_instant_load_' + post_id).fadeIn('slow');
                    $('#modal_comment_list_instant_load_' + post_id).html(comment);
                }
                else
                {
                    window.location.refresh();
                }
            });
        }

        }( jQuery ));


</script>
<?php
}
?>
<!-- [custome script for all page end] -->




<!-- [Engine for check that registed user logedin OR not start] -->
<?php

// [ update last time of a perticular user loged in time start]
   $exituser = $obj->exists_multiple("online_user_track", array("user_id" => @$dostums_user_id));

   if($exituser == 0 OR $exituser == NULL){
     $insertUser = array(
         "user_id" => @$dostums_user_id,
         "login_time" => date('Y-m-d H:i:s'),
         "last_time" => date('Y-m-d H:i:s'),
         "date" => date('Y-m-d H:i:s'),
         "status" => 1);
       $post_id = $obj->insertAndReturnID("online_user_track", $insertUser);
   } else{
?>

    <script>
    setInterval(function() {
          //  5 seconds

           var currentTime = new Date ( );
           var currentyear = currentTime.getFullYear();
           var currentMonth = currentTime.getMonth();

           currentMonth = (currentMonth < 10 ? "0" : "") + currentMonth;
              if(currentMonth == '00'){
                currentMonth = '01';
              } else if (currentMonth == '01') {
                currentMonth = '02';
              }  else if (currentMonth == '02') {
                currentMonth = '03';
              }  else if (currentMonth == '03') {
                currentMonth = '04';
              }  else if (currentMonth == '04') {
                currentMonth = '05';
              }  else if (currentMonth == '05') {
                currentMonth = '06';
              }  else if (currentMonth == '06') {
                currentMonth = '07';
              }  else if (currentMonth == '07') {
                currentMonth = '08';
              }  else if (currentMonth == '08') {
                currentMonth = '09';
              }  else if (currentMonth == '09') {
                currentMonth = '10';
              } else if (currentMonth == '10') {
                currentMonth = '11';
              }  else if (currentMonth == '11') {
                currentMonth = '12';
              }

           var currentDate = currentTime.getDate();
           currentDate = (currentDate < 10 ? "0" : "") + currentDate;

           var currentHours = currentTime.getHours ( );
           var currentMinutes = currentTime.getMinutes ( );
           currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
           var currentSeconds = currentTime.getSeconds ( );
           currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
          var currentTimeString = currentyear + "-" + currentMonth + "-" + currentDate + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds ;
          

      // 5 second
    $.ajax({
            type: "POST",
            url: "./lib/shout.php",
            dataType: "json",
            data: {
              st:40,
              currentTimeString:currentTimeString
            },
            success: function (response) {
              var obj = response;
              if (obj.output == "success") {
                  // [update status start]
                   $.ajax({
                        type: "POST",
                        url: "./lib/shout.php",
                        dataType: "json",
                        data: {
                          st:41
                          // uid:uid
                        },
                        success: function (response) {
                          var obj = response;
                          if (obj.output == "success") {
                            // success(obj.return);
                          } else {
                            // error(obj.msg);
                          }
                        }
                      });
                      // [update status end]
              } else {
                // error(obj.msg);
              }
            }
          });

    }, 5000);
    </script>

<?php
   }
// [ update last time of a perticular user loged in time end]
?>
