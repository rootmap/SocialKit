<?php

include('../class/auth.php');
extract($_POST);


// [ time duration setup start]
function duration($d1) {
    $date1 = strtotime($d1);
    $date2 = time();
    $subTime = $date1 - $date2;
    $y = intval($subTime / (60 * 60 * 24 * 365));
    $d = intval($subTime / (60 * 60 * 24)) % 365;
    $h = intval($subTime / (60 * 60)) % 24;
    $m = intval($subTime / 60) % 60;

    $result = "";
    if ($y != 0) {
        $result = substr($y, 1, 200) . " y ago";
    } elseif ($d != 0) {
        $result = substr($d, 1, 200) . " d ago";
    } elseif ($h != 0) {
        $result = substr($h, 1, 200) . " h ago";
    } elseif ($m != 0) {
        $result = substr($m, 1, 200) . " min ago";
    } else {
        $s = intval($subTime % 60);
        $result = substr($s, 1, 200) . " sec ago";
    }
    return $result;
}
// [ time duration setup  end]


if ($st == 1) {
  // echo $uid;
    $name = $obj->FlyQuery("SELECT first_name from dostums_user WHERE id='" . $uid . "'");
    $username = @$obj->limit_words($name[0]->first_name, 5);
    echo "<a href='./profile.php?user_id=$uid'>" .$username. "</a>";
}

elseif ($st == 2) {
    $current_datetime = date('Y-m-d H:i:s');
    $current_date = date('Y-m-d');
    $obj->insert("dostums_messages", array("to_uid" => $for_uid, "from_uid" => $input_by, "owner" => $for_uid, "message" => $mess, "input_by" => $input_by, "datetime" => $current_datetime, "date" => $current_date, "status" => 1, "message_status" => 0));
    $obj->insert("dostums_messages", array("to_uid" => $input_by, "from_uid" => $for_uid, "owner" => $input_by, "message" => $mess, "input_by" => $input_by, "message_status" => 1, "datetime" => $current_datetime, "date" => $current_date, "status" => 2));

    //for owner
    $sqlimages = $obj->FlyQuery("select
    photo from dostums_photo
    WHERE id=(SELECT photo_id FROM `dostums_profile_photo` WHERE user_id='" . $input_by . "' AND status='2')");
    $photo = $sqlimages[0]->photo;
    if ($photo == "") {
        $new_photo = "generic-man-profile.jpg";
    } else {
        $new_photo = $photo;
    }
    $namu = $_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'];
    //for other chat owner
    $sqlimages2 = $obj->FlyQuery("select A.name,b.photo FROM
(select photo from dostums_photo WHERE id=(SELECT photo_id FROM `dostums_profile_photo` WHERE user_id='" . $for_uid . "' AND status='2')) as b,(select name from dostums_user_view where id='" . $for_uid . "') as a;");
    @$photo2 = $sqlimages2[0]->photo;
    if ($photo2 == "") {
        $new_photo2 = "generic-man-profile.jpg";
    } else {
        $new_photo2 = $photo2;
    }
    @$namu2 = $sqlimages2[0]->name;


    $message_query = $obj->FlyQuery("SELECT
      from_uid,input_by,(select name from dostums_user_view where dostums_user_view.id=dostums_messages.input_by) as name,
      owner,to_uid,
      message,
     datetime FROM (select * from dostums_messages
                    WHERE from_uid='$input_by' and to_uid='$for_uid'
                    ORDER BY id DESC LIMIT 99) dostums_messages
    WHERE from_uid='$input_by' and to_uid='$for_uid'
    ORDER BY dostums_messages.id ASC");

    foreach ($message_query as $mess):
        if ($mess->input_by == $input_by) {
            $show_profile_image = $new_photo;
        } else {
            $show_profile_image = $new_photo2;
        }
        echo '<div class="chat-element">
                                    <a class="pull-left" href="javascript:void(0)">
                                        <img src="profile/' . $show_profile_image . '" class="img-circle" alt="image">
                                    </a>

                                    <div class="media-body ">

                                        <strong>' . $mess->name . '</strong>

                                        <p class="m-b-xs">
                                            ' . $mess->message . '
                                        </p>
                                        <small class="text-muted">' . duration($mess->datetime) . '</small>
                                    </div>
                                </div>';
    endforeach;
}


elseif ($st == 3) {
    //for owner.0
    

    $sqlimages = $obj->FlyQuery("SELECT IFNULL(dp.photo,'') as photo FROM `dostums_profile_photo` as a
        LEFT JOIN dostums_photo as dp ON dp.id=a.photo_id
        WHERE a.`user_id`='" . $input_by . "' AND a.`status`='2' ");

    if (empty($sqlimages[0]->photo)) {
        $new_photo = "generic-man-profile.jpg";
    } else {
        $new_photo = $sqlimages[0]->photo;
    }
    $namu = $_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'];
    //for other chat owner
    
    $sqlimages2 = $obj->FlyQuery(" select
                                   A.name,
                                   IFNULL(b.photo,'generic-man-profile.jpg') as photo
                                   FROM ( select 
                                          photo 
                                          from dostums_photo 
                                          WHERE id= ( SELECT 
                                                      photo_id 
                                                      FROM `dostums_profile_photo` 
                                                      WHERE user_id='" . $for_uid . "' AND status='2')
                                                    ) as b, ( select 
                                                              concat(first_name,' ',last_name) as name
                                                              from dostums_user 
                                                              where id='" . $for_uid . "'
                                                            ) as a
            
                                ");
    
    
    
    @$photo2 = $sqlimages2[0]->photo;
    if (empty($photo2)) {
        $new_photo2 = "generic-man-profile.jpg";
    } else {
        $new_photo2 = $photo2;
    }
    @$namu2 = $sqlimages2[0]->name;

    
    $message_query = $obj->FlyQuery("SELECT from_uid,input_by,
                                     datetime,
                                    (select name from dostums_user_view
                                    where dostums_user_view.id=dostums_messages.input_by) as name,
                                    owner,to_uid,
                                    message,
                                    datetime FROM (select * from dostums_messages
                                                   WHERE from_uid='$input_by' and to_uid='$for_uid' ORDER BY id
                                                   DESC LIMIT 100) dostums_messages
                                                   WHERE from_uid='$input_by'
                                                   and to_uid='$for_uid' ORDER BY dostums_messages.id ASC");
    
    $message = '';
    if (!empty($message_query)) {
        foreach ($message_query as $mess){
            if ($mess->input_by == $input_by) {
                $show_profile_image = $new_photo;
            } else {
                $show_profile_image = $new_photo2;
            }
//              echo $for_uid;
//              echo 'from_uid'.$mess->from_uid;
//              echo 'ooooooooo';
//              echo 'to_uid'.$mess->to_uid;
            if($mess->to_uid == $for_uid && $mess->from_uid == $input_by){
                $message.= '<div class="chat-element">
					<a class="pull-left" href="javascript:void(0)">
						<img src="profile/' . $show_profile_image . '" class="img-circle" alt="image">
					</a>

					<div class="media-body ">

						<strong>' . $mess->name . '</strong>

						<p class="m-b-xs">
							' . $mess->message . '
						</p>
						<small class="text-muted">' . duration($mess->datetime) . '</small>
					</div>
				</div>';
            } else{
                $message.= 'some thing else';
            }

            echo $message;
        }
        exit();
    } else {
//        echo "Please Type & send a meesgae to your friend.";
        exit();
    }


    //echo json_encode($message_query);
}
// [count of message start]


elseif ($st == 4) {
    
//    $uid = $_POST['uid'];
    
    $sqlmessages = $obj->FlyQuery("select
    COUNT(`read`) as message_read
    from dostums_messages
    WHERE to_uid='".$input_by."'
    AND `read`='unread'
    ORDER BY id DESC LIMIT 100");
    
    $count = '';
    
    if (!empty($sqlmessages)) {
        $count .= $sqlmessages[0]->message_read;
        
        $return_array = array("output" => "success", "count" => $count);
        echo json_encode($return_array);
        exit();
    } else {
        $count .= 0;
        $return_array = array("output" => "success", "count" => $count);
        echo json_encode($return_array);
        exit();
    }

}
// [count of message end]


// [show message data in nav bar start]
elseif ($st == 5) {
    //for owner
    $sqlmessages = $obj->FlyQuery("select
    dm.id,
    dm.from_uid,
    dm.to_uid,
    dm.input_by,
    dm.message,
    dm.datetime,
    dm.read,

    CONCAT(du.`first_name`,' ',du.`last_name`) as name,
    IFNULL(dp.photo,'generic-man-profile.jpg') as photo

    from dostums_messages as dm
    LEFT JOIN dostums_user as du ON du.id = dm.from_uid
    LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id = dm.from_uid AND dpp.status='2'
    LEFT JOIN dostums_photo as dp ON dp.id = dpp.photo_id
    WHERE dm.id IN (SELECT
                        max(id)
                        FROM dostums_messages
                        WHERE
                        to_uid='".$input_by."' AND owner='".$input_by."'
                        AND message_status='0' GROUP by from_uid
                    )
   ORDER BY dm.id DESC
          ");

    $html = '';

    if (!empty($sqlmessages)) {

        foreach ($sqlmessages as $messa):

            $uid = $messa->from_uid;
            $read = $messa->read;
            $mesphoto = $messa->photo;

            if($read != 'read'){
              $html .='<li style="background:#eAeAeA;">';
            } else{
              $html .='<li>';
            }
//<a href='javascript:void(0)' onclick='openchat_window(".$userid.",".$input_by.");' class='lv-item' name='".$userid."' datalink='profile.php?user_id=".$userid."'>
//            echo $messa->from_uid;
            $html .='

    				<a href="javascript:void(0)" onclick="openchat_window('.$messa->from_uid.', '.$input_by.');" class="lv-item" id="chat_window" name="' . $messa->from_uid . '" datalink="profile.php?user_id=' . $messa->from_uid . '">
    					        <div class="dropdown-messages-box">
              						<div class="pull-left">
              							<img src="profile/' . $mesphoto . '" class="img-circle" alt="image">
              						</div>

              						<div class="media-body ">
              							<small class="pull-right msg-date text-brand">' . duration($messa->datetime) . '</small>
              							<div class="row" style="display:block; padding-left:20px;">
              								<strong>' . $messa->name . '</strong>
              							</div>
              							<small class="text-muted">' . $messa->message . '</small>
              						</div>
    					       </div>
        					</a>
        				</li>
    				<li class="divider">

				</li>';

        endforeach;
        $html .='<li>
					<div class="dropdown-messages-box">
						<div class="media-body text-center">
							<a href="messages.php">View all messages</a>
						</div>
					</div>
				</li>';
        
        
        $return_array = array("output" => "success", "html" => $html);
        echo json_encode($return_array);
        exit();

    }
    else {
        $html .='<li>
					<div class="dropdown-messages-box">
						<div class="media-body text-center">
							<a href="messages.php">View all messages</a>
						</div>
					</div>
				</li>';
        
        $return_array = array("output" => "success", "html" => $html);
        echo json_encode($return_array);
        exit();
    }


}
// [show message data in nav bar end]



//[ for messengers start]
 elseif ($st == 6) {
    //for owner
    $sqlmessages = $obj->FlyQuery("select
                                   id,
                                   (select name
                                    from dostums_user_view
                                    where dostums_user_view.id=dostums_messages.from_uid) as name,
                                    (select photo
                                     from dostums_photo
                                     WHERE id=(SELECT
                                               photo_id FROM `dostums_profile_photo`
                                               WHERE dostums_profile_photo.user_id=dostums_messages.from_uid
                                               AND dostums_profile_photo.status='2')) as photo,
                                     from_uid,to_uid,input_by,message,datetime
                                    from dostums_messages where id in(select
                                                                      max(id) from dostums_messages
                                                                      WHERE to_uid='" . $input_by . "' AND owner='" . $input_by . "'
                                                                      AND message_status='0' GROUP by from_uid)");
    $html = '';
    if (!empty($sqlmessages)) {

        foreach ($sqlmessages as $messa):

            if ($messa->photo == "") {
                $mesphoto = "generic-man-profile.jpg";
            } else {
                $mesphoto = $messa->photo;
            }

            $html .='<li>
              					<div class="item clearfix" name="' . $messa->from_uid . '">
              						<img class="img" alt="img" src="profile/' . $mesphoto . '">
              						<span class="from">' . $messa->name . '</span>
              						' . $messa->message . '
              						<span class="date">' . duration($messa->datetime) . '</span>
              					</div>
              				</li>';

        endforeach;
    } else {
        $html .='';
    }


    echo $html;
    ?>
    <script>
        $(document).ready(function (e) {
            $('.item').click(function (e) {
                var uid = $(this).attr('name');
                console.log(uid);
                var existing_user = $('#messgenger_user').attr("class");
                //console.log(existing_user);
                if (existing_user == "col-lg-12 col-md-12 no-padding")
                {
                    $('#messgenger_user').attr("class", "col-lg-4 col-md-4 no-padding");
                    $('#messenger_composer').show();
                }

                $('#save').attr("name", uid);

                $.post("lib/chat.php", {'st': 7, 'uid': uid}, function (data)
                {
                    var jsondata = jQuery.parseJSON(data);
                    $('#composer_chat_current_user_name').html(jsondata.name);
                    $('#composer_chat_current_user_email').html(jsondata.email);

                    $('#composerloadscript').html(jsondata.newcontenthtml);
                    var scrolltoh = $('#composerloadscript')[0].scrollHeight;
                    $('#composerloadscript').scrollTop(scrolltoh);

                });





            });

            $('#save').click(function (e) {
                var uid = $(this).attr('name');
                console.log(uid);
                var textarval = $(this).closest('.panel-customs-post-textarea').find('textarea').val();
                if (textarval == "")
                {
                    $(this).closest('.panel-customs-post-textarea').find('textarea').css("border", "1px #f00 solid");
                }
                else
                {
                    $(this).closest('.panel-customs-post-textarea').find('textarea').css("border", "1px #69BD45 solid");

                    $.post("lib/chat.php", {'st': 9, 'for_uid': uid, 'mess': textarval}, function (data)
                    {
                        $('textarea').val("");
                        $('textarea').css("border", "none");



                        $.post("lib/chat.php", {"st": 8, "uid": uid}, function (data_notification) {
                            $("#composerloadscript").html(data_notification);
                            var scrolltoh = $('#composerloadscript')[0].scrollHeight;
                            $('#composerloadscript').scrollTop(scrolltoh);
                        });

                    });

                }
            });



        });
    </script>
    <?php

}
//[ for messengers end]



elseif ($st == 7) {
    //for owner
    $sqlimages = $obj->FlyQuery("select photo from dostums_photo
                                 WHERE id=(SELECT photo_id FROM `dostums_profile_photo`
                                           WHERE user_id='" . $input_by . "' AND status='2')");
    $photo = $sqlimages[0]->photo;
    if ($photo == "") {
        $new_photo = "generic-man-profile.jpg";
    } else {
        $new_photo = $photo;
    }
    $namu = $_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'];
    //for other chat owner
    $sqlimages2 = $obj->FlyQuery("select A.name,b.photo FROM
                                  (select photo from dostums_photo
                                   WHERE id=(SELECT photo_id
                                             FROM `dostums_profile_photo`
                                             WHERE user_id='" . $uid . "' AND status='2')) as b,
                                             (select name from dostums_user_view where id='" . $uid . "') as a");
    $photo2 = $sqlimages2[0]->photo;
    if ($photo2 == "") {
        $new_photo2 = "generic-man-profile.jpg";
    } else {
        $new_photo2 = $photo2;
    }
    $namu2 = $sqlimages2[0]->name;

    $readsms = $obj->FlyQuery("UPDATE dostums_messages SET `read`='read' WHERE from_uid='$input_by' and to_uid='$uid'");
    $message_query = $obj->FlyQuery("SELECT from_uid,input_by,
                                     datetime,
                                     (select name from
                                      dostums_user_view
                                      where dostums_user_view.id=dostums_messages.input_by) as name,
                                      owner,to_uid,
                                      message,
                                      datetime
                                      FROM (select * from
                                            dostums_messages
                                            WHERE from_uid='$input_by' and to_uid='$uid'
                                            ORDER BY id DESC LIMIT 100) dostums_messages
                                      WHERE from_uid='$input_by'
                                      and to_uid='$uid'
                                      ORDER BY dostums_messages.id ASC");
    $extra_html = '';
    foreach ($message_query as $mess):
        if ($mess->input_by == $input_by) {
            $vv = 1;
            $show_profile_image = $new_photo;
        } else {
            $vv = 2;
            $show_profile_image = $new_photo2;
        }

        if ($vv == 1) {
            $extra_html .='<li class="row">
                						   <div class="pull-left">
                						   <img class="img" style="left:0px;" alt="img" title="' . $mess->name . '" src="profile/' . $show_profile_image . '">
                						   <p style="border-bottom-left-radius: 0px; margin-bottom:0px;" class="ballon color1">' . $mess->message . '</p><br>
                						   <p style="border-top-left-radius: 0px;  margin-top:2px;" class="addition"><i class="fa fa-clock-o"></i> ' . duration($mess->datetime) . '</p>
                						   </div>
              						   </li>';
        } else {
            $extra_html .='<li class="row">
                                        <div class="pull-right">

                                            <img style="right:0px; border-radius:999px;height:50px;position:absolute;top:0;width:50px;" alt="img" title="' . $mess->name . '" src="profile/' . $show_profile_image . '">

                                            <p class="pull-right color2" style="border-bottom-left-radius: 20px;
    border-bottom-right-radius: 0px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    display: inline-table;
    margin-right:70px;
    margin-bottom: 14px;
    padding-bottom: 14px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 14px;">' . $mess->message . '</p><br>
                                            <p style="margin-right:70px; margin-top:-12px; border-top-right-radius: 0px;" class="pull-right addition"><i class="fa fa-clock-o"></i> ' . duration($mess->datetime) . '</p>
                                        </div>
                                        </li>';
        }
    endforeach;

    $sqluid = $obj->FlyQuery("SELECT id,name,email from dostums_user_view where id='" . $uid . "'");

    $dd = '<script> window.setInterval(function(){ $.post("lib/chat.php",{"st":8,"uid":' . $uid . '},function(data_notification) { $("#composerloadscript").html(data_notification); var scrolltoh = $("#composerloadscript")[0].scrollHeight;  $("#composerloadscript").scrollTop(scrolltoh);  });  }, 4000); </script>' . $extra_html;



    echo json_encode(array("uid" => $uid, "name" => $sqluid[0]->name, "email" => $sqluid[0]->email, "newcontenthtml" => $dd));
}


elseif ($st == 8) {
    //for owner
    $sqlimages = $obj->FlyQuery("SELECT du.id,concat(first_name,' ',last_name) as name,
                                 IFNULL(dp.photo,'generic-man-profile.jpg') AS photo
                                 FROM dostums_user as du
                                 LEFT JOIN dostums_profile_photo as dpp on dpp.user_id=du.id AND dpp.status='2'
                                 LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
                                 WHERE du.id='" . $input_by . "'");
    $photo = $sqlimages[0]->photo;
    $new_photo = $photo;
    $namu = $_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'];
    //for other chat owner
    $sqlimages2 = $obj->FlyQuery("SELECT du.id,concat(first_name,' ',last_name) as name,
                                  IFNULL(dp.photo,'generic-man-profile.jpg') AS photo
                                  FROM dostums_user as du
                                  LEFT JOIN dostums_profile_photo as dpp on dpp.user_id=du.id AND dpp.status='2'
                                  LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
                                  WHERE du.id='" . $uid . "'");
    $photo2 = $sqlimages2[0]->photo;
    $new_photo2 = $photo2;

    $namu2 = $sqlimages2[0]->name;



    $message_query = $obj->FlyQuery("SELECT from_uid,
                                     input_by,datetime,
                                     (select name
                                      from dostums_user_view
                                      where dostums_user_view.id=dostums_messages.input_by) as name,
                                      owner,to_uid,
                                      message,
                                      datetime FROM (select *
                                                     from dostums_messages
                                                     WHERE from_uid='$input_by' and to_uid='$uid'
                                                     ORDER BY id DESC LIMIT 100) dostums_messages
                                      WHERE from_uid='$input_by'
                                      and to_uid='$uid'
                                      ORDER BY dostums_messages.id ASC");
    $extra_html = '';
    foreach ($message_query as $mess):
        if ($mess->input_by == $input_by) {
            $vv = 1;
            $show_profile_image = $new_photo;
        } else {
            $vv = 2;
            $show_profile_image = $new_photo2;
        }
        if ($vv == 1) {
            $extra_html .='<li class="row">
              						   <div class="pull-left">
              						   <img class="img" style="left:0px;" alt="img" title="' . $mess->name . '" src="profile/' . $show_profile_image . '">
              						   <p style="border-bottom-left-radius: 0px; margin-bottom:0px;" class="ballon color1">' . $mess->message . '</p><br>
              						   <p style="border-top-left-radius: 0px;  margin-top:2px;" class="addition"><i class="fa fa-clock-o"></i> ' . duration($mess->datetime) . '</p>
              						   </div>
            						   </li>';
        } else {
            $extra_html .='<li class="row">
                                        <div class="pull-right">

                                            <img style="right:0px; border-radius:999px;height:50px;position:absolute;top:0;width:50px;" alt="img" title="' . $mess->name . '" src="profile/' . $show_profile_image . '">

                                            <p class="pull-right color2" style="border-bottom-left-radius: 20px;
    border-bottom-right-radius: 0px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    display: inline-table;
    margin-right:70px;
    margin-bottom: 14px;
    padding-bottom: 14px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 14px;">' . $mess->message . '</p><br>
                                            <p style="margin-right:70px; margin-top:-12px; border-top-right-radius: 0px;" class="pull-right addition"><i class="fa fa-clock-o"></i> ' . duration($mess->datetime) . '</p>
                                        </div>
                                        </li>';
        }
    endforeach;

    $obj->FlyQuery("UPDATE dostums_messages
                    SET `read`='read'
                    WHERE to_uid='" . $input_by . "' AND owner='" . $input_by . "'", 1);
    echo $extra_html;
}



elseif ($st == 9) {
    $current_datetime = date('Y-m-d H:i:s');
    $current_date = date('Y-m-d');
    $obj->insert("dostums_messages", array("to_uid" => $for_uid,
                                           "from_uid" => $input_by,
                                           "owner" => $for_uid,
                                           "message" => $mess,
                                           "input_by" => $input_by,
                                           "datetime" => $current_datetime,
                                           "date" => $current_date,
                                           "status" => 1,
                                           "message_status" => 0));
    $obj->insert("dostums_messages", array("to_uid" => $input_by,
                                           "from_uid" => $for_uid,
                                           "owner" => $input_by,
                                           "message" => $mess,
                                           "input_by" => $input_by,
                                           "message_status" => 1,
                                           "datetime" => $current_datetime,
                                           "date" => $current_date,
                                           "status" => 2));

    echo 1;
}



elseif ($st == 10) {
    $sqlmessages = $obj->FlyQuery("SELECT A.*
                                   FROM (select id,
                                               (select name
                                                from dostums_user_view
                                                where dostums_user_view.id=dostums_messages.from_uid) as name,
                                                (select photo
                                                 from dostums_photo
                                                 WHERE id = (SELECT photo_id
                                                             FROM `dostums_profile_photo`
                                                             WHERE dostums_profile_photo.user_id=dostums_messages.from_uid
                                                             AND dostums_profile_photo.status='2')) as photo,
                                                from_uid,
                                                to_uid,
                                                input_by,
                                                message,
                                                datetime
                                                from dostums_messages
                                                where id IN(select max(id)
                                                            from dostums_messages
                                                            WHERE to_uid='$input_by'
                                                            AND owner='$input_by'
                                                            AND message_status='0'
                                                            GROUP by from_uid)) as A
                                    WHERE A.name LIKE '%$search%'");
    $html = '';
    if (!empty($sqlmessages)) {

        foreach ($sqlmessages as $messa):

            if ($messa->photo == "") {
                $mesphoto = "generic-man-profile.jpg";
            } else {
                $mesphoto = $messa->photo;
            }

            $html .='<li>
              					<div class="item clearfix" name="' . $messa->from_uid . '">
              						<img class="img" alt="img" src="profile/' . $mesphoto . '">
              						<span class="from">' . $messa->name . '</span>
              						' . $messa->message . '
              						<span class="date">' . duration($messa->datetime) . '</span>
              					</div>
              				</li>';

        endforeach;
    } else {
        $html .='<li>
          					<div class="item clearfix">
          						<h3 align="center">No Data Found</h3>
          					</div>
          				</li>';
    }


    echo $html;
    ?>


    <script>
        $(document).ready(function (e) {
            $('.item').click(function (e) {
                var uid = $(this).attr('name');
                //console.log(uid);
                var existing_user = $('#messgenger_user').attr("class");
                //console.log(existing_user);
                if (existing_user == "col-lg-12 col-md-12 no-padding")
                {
                    $('#messgenger_user').attr("class", "col-lg-4 col-md-4 no-padding");
                    $('#messenger_composer').show();
                }



                $.post("lib/chat.php", {'st': 7, 'uid': uid}, function (data)
                {
                    var jsondata = jQuery.parseJSON(data);
                    $('#composer_chat_current_user_name').html(jsondata.name);
                    $('#composer_chat_current_user_email').html(jsondata.email);
                    $('#save').attr("name", uid);
                    $('#composerloadscript').html(jsondata.newcontenthtml);
                    var scrolltoh = $('#composerloadscript')[0].scrollHeight;
                    $('#composerloadscript').scrollTop(scrolltoh);

                });

            });



            $('#save').click(function (e) {
                var uid = $(this).attr('name');
                var textarval = $(this).closest('.panel-customs-post-textarea').find('textarea').val();
                if (textarval == "")
                {
                    $(this).closest('.panel-customs-post-textarea').find('textarea').css("border", "1px #f00 solid");
                }
                else
                {
                    $(this).closest('.panel-customs-post-textarea').find('textarea').css("border", "1px #69BD45 solid");

                    $.post("lib/chat.php", {'st': 9, 'for_uid': uid, 'mess': textarval}, function (data)
                    {
                        $('textarea').val("");
                        $('textarea').css("border", "none");



                        $.post("lib/chat.php", {"st": 8, "uid": uid}, function (data_notification) {
                            $("#composerloadscript").html(data_notification);
                            var scrolltoh = $('#composerloadscript')[0].scrollHeight;
                            $('#composerloadscript').scrollTop(scrolltoh);
                        });




                    });

                }
            });



        });
    </script>
    <?php

}


// [on click evelope icon in top nav bar  change status of message start ]
else if($st == 11){
  $readsms = $obj->FlyQuery("UPDATE dostums_messages SET `read`='read' WHERE  to_uid='". $input_by ."' AND `read` = 'unread' ");

}
// [on click evelope icon in top nav bar  change status of message end ]


 else {
    echo 0;
}
?>
