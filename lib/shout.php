<?php
include('../class/auth.php');
extract($_POST);


if ($st == 1) {

    $chknotification = $obj->FlyQuery("
SELECT COUNT(`id`) as friend_request
from dostums_friend
WHERE to_uid='" . $input_by . "'
AND status='1'
ORDER BY id DESC LIMIT 100
 ");

    $count = '';

    if (!empty($chknotification)) {
        // echo $chknotification[0]->user_rerquest;
        $count .= $chknotification[0]->friend_request;

        $user_rec_online = $obj->exists_multiple("dostums_user_online_track", array("user_id" => $input_by));
        if ($user_rec_online == 0) {
            $obj->insert("dostums_user_online_track", array("user_id" => $input_by, "log_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 1));
        } else {
            $sqlgoner = $obj->FlyQuery("SELECT TIMESTAMPDIFF(SECOND,a.log_time,NOW()) as gonetime FROM dostums_user_online_track as a WHERE a.user_id='" . $input_by . "'");
            if ($sqlgoner[0]->gonetime > 30) {
                $obj->update("dostums_user_online_track", array("user_id" => $input_by, "log_time" => date('Y-m-d H:i:s')));
            }
        }

        $return_array = array("output" => "success", "count" => $count);
        echo json_encode($return_array);
        exit();
    } else {
        $count .= 0;
        $return_array = array("output" => "success", "count" => $count);
        echo json_encode($return_array);
        exit();
    }



    // echo json_encode(array("friend_request" => $chknotification[0]->total, "user_request" => $chknotification[0]->user_rerquest));
    //
    // $user_rec_online = $obj->exists_multiple("dostums_user_online_track", array("user_id" => $input_by));
    // if ($user_rec_online == 0) {
    //     $obj->insert("dostums_user_online_track", array("user_id" => $input_by, "log_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 1));
    // } else {
    //     $sqlgoner = $obj->FlyQuery("SELECT TIMESTAMPDIFF(SECOND,a.log_time,NOW()) as gonetime FROM dostums_user_online_track as a WHERE a.user_id='" . $input_by . "'");
    //     if ($sqlgoner[0]->gonetime > 30) {
    //         $obj->update("dostums_user_online_track", array("user_id" => $input_by, "log_time" => date('Y-m-d H:i:s')));
    //     }
    //     //$obj->update("dostums_user_online_track",array("user_id"=>$input_by,"log_time"=>date('Y-m-d H:i:s')));
    // }
} elseif ($st == 2) {

    if (isset($_POST['user_request'])) {


        $sqlrequest_detail = $obj->FlyQuery("
        SELECT
        df.id,
        df.uid ,
        df.to_uid,
        df.date_time,
        concat(du.first_name,' ',du.last_name) as full_name,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo
        FROM `dostums_friend` as df
        LEFT JOIN dostums_user as du on du.id=df.uid
        LEFT JOIN dostums_profile_photo as dpp on dpp.user_id=du.id AND dpp.status='2'
        LEFT JOIN dostums_photo as dp on dp.id=dpp.photo_id
        WHERE df.`to_uid`='" . $input_by . "' AND (df.status='1') GROUP BY df.uid ORDER BY df.id DESC");


        include('../class/extraClass.php');
        $extra = new SiteExtra();


        $html = '';

        if (!empty($sqlrequest_detail)) {

            $count = count($sqlrequest_detail);

            foreach ($sqlrequest_detail as $detail) {
                $fullname = $detail->full_name;
                // $userID = $detail->userID;

                $html .= '<li id="ff_' . $detail->uid . '"><div>
                                <div class="dropdown-messages-box">
                                       <div class="pull-left">

                                            <a href="./profiles.php?user_id=' . $detail->uid . '"><img class="media-object img-circle img-thumbnail" alt="Image"
                                                 src="./profile/' . $detail->photo . '" style="height:40px; width:40px;"></a>
                                        </div>

                                        <div class="media-body" style="padding-top:2px;">
                                                <div class="col-sm-12">
                                                    <a href="./profiles.php?user_id=' . $detail->uid . '"><strong>' . $fullname . '</strong></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-sm">
                                                        <small>' . $extra->duration($detail->date_time) . '</small>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" style="border:none; background:none; float:left;" onclick="frndconfirm(' . $detail->uid . ', 2)"><i class="fa fa-check-circle-o fa-2x text-success" aria-hidden="true"></i></button>
                                                    <button type="button" style="border:none;  background:none;  float:right;" onclick="frndconfirm(' . $detail->uid . ', 4)"><i class="fa fa-times-circle-o fa-2x text-danger" aria-hidden="true"></i></button>
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </li>';

                $html .= '<li class="divider"></li>';
            }

            $html .= '<li>
                        <div class="dropdown-messages-box">
                            <div class="media-body text-center">
                                    <a href="friend-requests.php">Browse All</a>
                            </div>
			                  </div>
		                  </li>';

            $return_array = array("output" => "success", "html" => $html);
            echo json_encode($return_array);
            exit();
        } else {
            
            $html .= '<li><div class="dropdown-messages-box">
                            <div class="media-body" style="text-align:center;">
                                <strong>No Friend Request Available.</strong>
                            </div>
                        </div>
                      </li>';

            $return_array = array("output" => "success", "html" => $html);
            echo json_encode($return_array);
            exit();
        }

       
    } else {


            $html .= '<li><div class="dropdown-messages-box">
                            <div class="media-body" style="text-align:center;">
                                <strong>No response.</strong>
                            </div>
                        </div>
                      </li>';

            $return_array = array("output" => "success", "html" => $html);
            echo json_encode($return_array);
            exit();
        
        
    }

    $insstring = "INSERT INTO dostums_notifications_user_data (notification_id,user_id,post_id)

                                                                (SELECT dn.id,'" . $input_by . "', dn.post_id
                                                                 FROM
                                                                 `dostums_notifications` as dn
                                                                 WHERE dn.user_id!='" . $input_by . "'
                                                                 AND dn.user_id IN (SELECT df.uid FROM `dostums_friend` as df WHERE df.`to_uid`='" . $input_by . "' AND (df.status='2' OR df.status='1' OR df.status='0') AND dn.id NOT IN (SELECT notification_id FROM dostums_notifications_user_data WHERE user_id='" . $input_by . "')))";
    $obj->FlyQuery($insstring);
}
// end


elseif ($st == 3) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_frnd` FROM `dostums_friend` WHERE (`to_uid`='" . $usrid . "' OR `uid`='" . $usrid . "') AND status=2");
    echo json_encode(array("friend_request" => $chknotification[0]->total_frnd));
} elseif ($st == 4) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->SelectAllByID_Multiple("dostums_friend", array("to_uid" => $usrid, "status" => 2));
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <a class="list-group-item" href="profile.php?user_id=<?php echo $noti->uid; ?>">
                <div class="media">
                    <div class="pull-left">
            <?php
            $photo_id = $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $noti->uid, "status", 2, "photo_id");
            $photo = $obj->SelectAllByVal("dostums_photo", "id", $photo_id, "photo");

            if ($photo == "") {
                $new_photo = "generic-man-profile.jpg";
            } else {
                $new_photo = $photo;
            }
            ?>
                        <img class="media-object img-circle thumb48" alt="Image"
                             src="./profile/<?php echo $new_photo; ?>">
                    </div>
                    <div class="media-body clearfix">
                        <strong class="media-heading text-primary">
                            <span class="circle circle-success circle-lg text-left"></span>
                        <?php echo $obj->SelectAllByVal("dostums_user_view", "id", $noti->uid, "name"); ?>
                        </strong>

                        <p class="mb-sm">
                            <small><?php echo $extra->duration(($noti->date) . " 00:00:00", date('Y-m-d H:i:s')); ?></small>
                        </p>
                    </div>
                </div>
            </a>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 5) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->SelectAllByID_Multiple("dostums_friend", array("to_uid" => $usrid, "status" => 2));
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <a class="list-group-item" href="profile.php?user_id=<?php echo $noti->uid; ?>">
                <div class="media">
                    <div class="pull-left">

                        <img class="media-object img-circle thumb48" alt="Image"
                             src="./profile/<?php echo $new_photo; ?>">
                    </div>
                    <div class="media-body clearfix">
                        <strong class="media-heading text-primary">
                            <span class="circle circle-success circle-lg text-left"></span>
            <?php echo $obj->SelectAllByVal("dostums_user_view", "id", $noti->uid, "name"); ?>
                        </strong>

                        <p class="mb-sm">
                            <small><?php echo $extra->duration(($noti->date) . " 00:00:00", date('Y-m-d H:i:s')); ?></small>
                        </p>
                    </div>
                </div>
            </a>
            <!-- END list group item-->
            <li>
                <a class="item clearfix" name="1" href="#">
            <?php
            $photo = $obj->SelectAllByVal("dostums_photo", "id", $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $noti->uid, "status", 2, "photo_id"), "photo");

            if ($photo == "") {
                $new_photo = "generic-man-profile.jpg";
            } else {
                $new_photo = $photo;
            }
            ?>
                    <img class="img" alt="img" src="./profile/<?php echo $new_photo; ?>">
                    <span class="from"><?php echo $obj->SelectAllByVal("dostums_user_view", "id", $noti->uid, "name"); ?></span>
                    Hello, m8 how is goin ?
                    <span class="date">22 May</span>
                </a>
            </li>

                    <?php
                }
        }


// [all friend list page data load start]
        elseif ($st == 6) {
            include('../class/extraClass.php');
            $extra = new SiteExtra();

            $chk = $obj->FlyQuery(" SELECT
                      df.id,
                      df.uid,
                      df.to_uid,
                      df.status,
                      case when df.uid <> '" . $usrid . "'  then df.uid else df.to_uid END AS friendID
                      FROM dostums_friend AS df
                      WHERE (df.uid = '" . $usrid . "' OR df.to_uid = '" . $usrid . "') AND df.status = '2' ORDER BY df.id DESC");

            if (!empty($chk)) {
                foreach ($chk as $chkvalue) {
                    $id = $chkvalue->id;
                    $uval = $chkvalue->friendID;

                    $chknotification = $obj->FlyQuery(" SELECT
        concat(du.first_name,' ',du.last_name) as name,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2,
        b.status as blockStatus

        FROM
        dostums_user AS du
        LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id='" . $uval . "' AND dpp.status='2'
        LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
        LEFT JOIN dostums_country as dc ON dc.id=du.country_id
        LEFT JOIN dostums_user_about as dua ON dua.user_id='" . $uval . "'
        LEFT JOIN dostums_educational_institutions as dei ON dei.user_id='" . $uval . "'
        LEFT JOIN block as b ON b.userid='" . $usrid . "' AND b.iteam_id='" . $uval . "' AND b.iteam='myFriendBlock' AND b.status='1'
        WHERE du.id = '" . $uval . "' ");

// $chknotification = $obj->FlyQuery("SELECT alldata.* FROM (
// select a.id,
// 	a.uid,
// 	a.status,
// 	IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
// 	concat(du.first_name,' ',du.last_name) as name,
// 	dc.country_name,
// 	du.city_id,
// 	dua.about_short,
// 	dua.occupation,
// 	dua.company,
// 	dei.school,
// 	dei.college,
// 	dei.university1,
// 	dei.university2,
//   b.status as blockStatus
//         #dfbl.to_uid,
//         #dfbl.status as block_status
//
// 	FROM
// 	dostums_friend as a
//
// 	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.uid AND dpp.status='2'
//   LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
// 	LEFT JOIN dostums_user as du ON du.id=a.uid
// 	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
// 	LEFT JOIN dostums_user_about as dua ON dua.user_id=a.uid
// 	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=a.uid
//   #LEFT JOIN dostums_friends_blocklist as dfbl on dfbl.to_uid=a.uid
//   LEFT JOIN block as b ON b.userid=a.to_uid AND b.iteam_id=a.uid AND b.iteam='myFriendBlock' AND b.status='1'
// 	WHERE
// 	a.to_uid='" . $usrid . "'
// 	AND a.status='2') as alldata WHERE alldata.uid!='" . $usrid . "'
//   ");



                    if (!empty($chknotification))
                        foreach ($chknotification as $noti) {

                            if ($noti->blockStatus != 1) {
                                ?>
                        <!-- START list group item-->
                        <div id="friendslistsingle_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                            <div class="media clearfix">
                                <div class="pull-left">

                                    <img class="media-object thumb48 img-thumbnail" alt="Image"
                                         src="./profile/<?php echo $noti->photo; ?>">
                                </div>
                                <div class="media-body clearfix">
                                    <div class="pull-right"><div class="dropdown">
                                            <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                                <i class="fa fa-star"></i> Friend <i class="fa fa-caret-down"></i>
                                            </span>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <!-- <button onclick="FriendsBlock('<?php //echo $noti->uid;  ?>', '<?php //echo $noti->id;  ?>')" type="button" class="btn btn-default btn-sm">
                                                        block
                                                    </button> -->
                                                    <button id="blockButton" type="button" class="btn btn-default btn-sm" data-id="<?php echo $uval; ?>"  data-toggle="modal" data-target="#block" type="button">Block</button>
                                                </li>
                                                <li class="divider" role="presentation"></li>
                                                <li>
                                                    <button onclick="FriendsUnfriend('<?php echo $uval; ?>', '<?php echo $usrid; ?>')" type="button" class="btn btn-default btn-sm">
                                                        <!-- <button onclick="javascript:FriendsUnfriend();" type="button" class="btn btn-default btn-sm"> -->
                                                        Unfriend
                                                    </button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                    <a class="link" href="profile.php?user_id=<?php echo $uval ?>">
                                        <strong class="media-heading text-primary">
                        <?php echo $noti->name; ?>
                                        </strong>
                                    </a>

                                    <div class="frined-info">

                                        <p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                            <!-- <small>53 mutual friends</small> -->
                                        </p>
                                        <p><br></p>
                                        <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                                        <p>Lives in&nbsp;:   <a class="link" href=""><i class="fa fa-map-marker">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END list group item-->
                        <?php
                    }
                }
        }
    }
}
// [all friend list page data load end]
// [this is for friend request page data start]
elseif ($st == 7) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("
  SELECT alldata.* FROM (select a.id,
	a.uid,
	a.status,
	IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
	concat(du.first_name,' ',du.last_name) as name,
	dc.country_name,
	du.city_id,
	dua.about_short,
	dua.occupation,
	dua.company,
	dei.school,
	dei.college,
	dei.university1,
	dei.university2
	FROM
	dostums_friend as a
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.uid AND dpp.status='2' LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_user as du ON du.id=a.uid
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=a.uid
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=a.uid
	WHERE
	a.to_uid='" . $usrid . "'
	AND a.status='1') as alldata WHERE alldata.uid!='" . $usrid . "' ORDER BY alldata.id DESC");




    if (!empty($chknotification))
        foreach ($chknotification as $noti) {

            if ($noti->name != '') {
                ?>
                <div class="col-sm-12" id="ff_<?php echo $noti->uid; ?>">
                    <div class="list-group-item friend-list-item">
                        <div class="media clearfix">
                            <div class="pull-left">

                                <img class="media-object thumb48 img-thumbnail" alt="Image" src="./profile/<?php echo $noti->photo; ?>">
                            </div>
                            <div class="media-body clearfix">

                                <div class="pull-right"><div class="">
                                        <span onclick="frndconfirm(<?php echo $noti->uid; ?>, 2)" id="searchfrnd_<?php echo $noti->uid; ?>"  class="frqst-btn btn btn-sm btn-success">
                                            Confirm
                                        </span>

                                        <span onclick="frndconfirm(<?php echo $noti->uid; ?>, 4)" id="searchfrnd_<?php echo $noti->uid; ?>"  class="frqst-btn btn btn-sm btn-danger">
                                            Delete Request
                                        </span>


                                    </div>
                                </div>




                                <a class="link" href="profile.php?user_id=<?php echo $noti->uid; ?>">
                                    <strong class="media-heading text-primary">
                <?php echo $noti->name; ?>
                                    </strong>
                                </a>


                                <div class="frined-info">

                                                                                                                                                            <!--<p class="mb-sm"  >
                                                                                                                                                                Ismail Shah and <span class="link" data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim Maisha Quorishi Ranjit Roy It'z Sumon Saiful Islam Sudhir Halder Ferdous Alam Perbes Shekh Raisha Jahan Rupa Shamim Kazi Shakhawat  and 34 more...">9 other mutual friends</span>   <small></small>
                                                                                                                                                            </p>-->
                                    <p><br></p>
                                    <p>
                <?php
                if ($noti->company != '') {
                    echo '<i class="mdi-action-work"></i> Works  at<a class="link" href="">' . $noti->company . '</a>';
                }
                ?>


                                    </p>
                                    <p>
                <?php
                if ($noti->university2 != '') {
                    echo '<i class="mdi-social-school"></i><a class="link" href="">' . $noti->university2 . '</a>';
                } elseif ($noti->university1 != '') {
                    echo '<i class="mdi-social-school"></i><a class="link" href="">' . $noti->university1 . '</a>';
                } elseif ($noti->college != '') {
                    echo '<i class="mdi-social-school"></i><a class="link" href="">' . $noti->college . '</a>';
                } elseif ($noti->school != '') {
                    echo '<i class="mdi-social-school"></i><a class="link" href="">' . $noti->school . '</a>';
                }
                ?>
                                    </p>
                                    <p>
                                        <?php
                                        if ($noti->city_id != '' && $noti->country_name != '') {
                                            echo '<i class="mdi-communication-location-on"></i>Lives in<a class="link" href="">' . $noti->city_id . '&nbsp;,&nbsp;' . $noti->country_name . '</a>';
                                        } elseif ($noti->country_name != '') {
                                            echo '<i class="mdi-communication-location-on"></i>Lives in<a class="link" href="">' . $noti->country_name . '</a>';
                                        } elseif ($noti->city_id != '') {
                                            echo '<i class="mdi-communication-location-on"></i>Lives in<a class="link" href="">' . $noti->city_id . '</a>';
                                        }
                                        ?>
                                    </p>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                                        <?php
                                    }
                                }
                        }
// [this is for friend request page data end]
                        elseif ($st == 8) {
                            $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_frnd_reqst` FROM `dostums_friend` WHERE `to_uid`='" . $usrid . "' AND status=0");
                            echo json_encode(array("friend_request" => $chknotification[0]->total_frnd_reqst));
                        } elseif ($st == 9) {
                            $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_group_member` FROM `dostums_group_members` WHERE `group_id`='" . $group_id . "' AND status='1'");
                            echo json_encode(array("ttl_group_mem" => $chknotification[0]->total_group_member));
                        } elseif ($st == 10) {
                            $sqlrequest_detail = $obj->FlyQuery("
	SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status,
	IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
	concat(du.first_name,' ',du.last_name) as name
	FROM dostums_group_members AS a
	LEFT JOIN dostums_user as du ON du.id=a.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.user_id
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	WHERE a.`group_id`='group_id'
	AND a.status=1");
                            if (!empty($sqlrequest_detail)) {
                                $count = count($sqlrequest_detail);
                                foreach ($sqlrequest_detail as $detail):
                                    echo '<a class="list-group-item" href="./profile.php?user_id=' . $detail->user_id . '">
            <div class="media">
                <div class="pull-left">
                    <img class="media-object img-circle thumb48" alt="Image"
                         src="./profile/' . $detail->photo . '">
                </div>
                <div class="media-body clearfix">
                    <small class="pull-right "><span class="btn btn-sm btn-danger"><i
                            class="fa fa-user-plus"></i> Add </span></small>
                    <strong class="media-heading text-primary">
                        <span class="circle circle-success circle-lg text-left"></span>
						' . $detail->name . '
					</strong>

                    <p class="mb-sm">
                        <small>' . $detail->date_time . '</small>
                    </p>
                </div>
            </div>
        </a>';




                                endforeach;
                            }
                        }
                        elseif ($st == 11) {
                            include('../class/extraClass.php');
                            $extra = new SiteExtra();

                            $admin_list = array();
                            $sqlgetgroupadmin = $obj->FlyQuery("SELECT * FROM dostums_group_admin WHERE group_id='" . $group_id . "'");
                            if (!empty($sqlgetgroupadmin)) {
                                foreach ($sqlgetgroupadmin as $adm):
                                    $admin_list[] = $adm->user_id;
                                endforeach;
                            }

                            $chknotification = $obj->FlyQuery("SELECT
alldata.*,
IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
concat(du.first_name,' ',du.last_name) as name,
dc.country_name,
du.city_id,
dua.about_short,
dua.occupation,
dua.company,
dei.school,
dei.college,
dei.university1,
dei.university2
FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status
	FROM dostums_group_members AS a
	WHERE a.status='1') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
                            if (!empty($chknotification))
                                foreach ($chknotification as $noti) {
                                    ?>
            <!-- START list group item-->
            <div id="grp-mem-rbgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
            <?php if (in_array($input_by, $admin_list)) { ?>
                        <div class="media-body clearfix">
                            <div class="pull-right"><div class="dropdown">
                                    <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                        <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                    </span>

                                    <ul class="dropdown-menu dropdown-menu-right text-center">
                                        <!--<li>
                                            <a href="">    Get Notifications

                                            </a>
                                        </li>
                                        <li>
                                            <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">  Acquaintances

                                            </a>
                                        </li>
                                        <li class="divider" role="presentation"></li>-->
                                        <li>
                                            <button onclick="GroupMemRemove('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                                Remove From Group
                                            </button>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <button onclick="GroupMemBlock('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                                Block From Group
                                            </button>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <button onclick="MakeGroupAdmin('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                                Make Group Admin
                                            </button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
            <?php } ?>



                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 12) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_group_member_request` FROM `dostums_group_members` WHERE `group_id`='" . $group_id . "' AND status='3'");
    echo json_encode(array("ttl_group_mem_reqst" => $chknotification[0]->total_group_member_request));
} elseif ($st == 13) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        alldata.*,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        concat(du.first_name,' ',du.last_name) as name,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2
        FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status
	FROM dostums_group_members AS a
	WHERE a.status='3') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="rqst-grp-mem-sgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupRqstConfirm('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                            Confirm Request
                                        </button>
                                    </li>
                                    <li class="divider" role="presentation"></li>
                                    <li>
                                        <button onclick="GroupRqstReject('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                            Reject Request
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 14) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_group_member_blocked` FROM `dostums_group_members` WHERE `group_id`='" . $group_id . "' AND status='4'");
    echo json_encode(array("ttl_group_mem_blocked" => $chknotification[0]->total_group_member_blocked));
} elseif ($st == 15) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        alldata.*,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        concat(du.first_name,' ',du.last_name) as name,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2
        FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status
	FROM dostums_group_members AS a
	WHERE a.status='4') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="rqst-grp-mem-bgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupBlkdMemUnblock('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                            Unblock Member
                                        </button>
                                    </li>
                                    <li class="divider" role="presentation"></li>
                                    <li>
                                        <button onclick="GroupBlkdMemRemove('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-default btn-sm">
                                            Remove Member from Group
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 16) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `ttl_group_admin` FROM `dostums_group_admin` WHERE `group_id`='" . $group_id . "' AND status='1'");
    echo json_encode(array("ttl_group_admin" => $chknotification[0]->ttl_group_admin));
} elseif ($st == 17) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        alldata.*,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        concat(du.first_name,' ',du.last_name) as name,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2
        FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.date,
	a.status
	FROM dostums_group_admin AS a
	WHERE a.status='1') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="rqst-grp-mem-bgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupBlkdMemUnblock('<?php //echo $noti->user_id;        ?>', '<?php //echo $noti->id;        ?>')" type="button" class="btn btn-default btn-sm">
                                            Leave Group
                                        </button>
                                    </li>
                                    <li class="divider" role="presentation"></li>
                                    <li>
                                        <button onclick="GroupBlkdMemRemove('<?php //echo $noti->user_id;        ?>', '<?php //echo $noti->id;        ?>')" type="button" class="btn btn-default btn-sm">
                                            Remove Member from Group
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 18) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        a.user_id,
        a.page_id,
        a.status,
        concat(du.first_name,' ',du.last_name) as name,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        a.date
        FROM dostums_page_likes as a
        LEFT JOIN dostums_user as du ON du.id=a.user_id
        LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.user_id AND dpp.status='2'
        LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
        WHERE a.page_id='" . $page_id . "' AND a.status='1'");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <div class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </div>
                    <div class="media-body clearfix">
                        <!--        				<div class="pull-right"><div class="dropdown">
                                                    <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-star"></i> Friend <i class="fa fa-caret-down"></i>
                                                    </span>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="">    Get Notifications

                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="">  Acquaintances

                                                            </a>
                                                        </li>
                                                        <li class="divider" role="presentation"></li>
                                                        <li>
                                                            <a href="">
                                                                Unfriend

                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                             </div>-->




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                            <p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                <small>53 mutual friends</small>
                            </p>
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php //echo $noti->about_short;        ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href=""><i class="fa fa-map-marker">&nbsp;</i><?php //echo $noti->city_id;        ?>, <?php //echo $noti->country_name;        ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 19) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_followers` FROM `dostums_page_likes` WHERE `page_id`='" . $page_id . "' AND status=1");
    echo json_encode(array("total_followers_list" => $chknotification[0]->total_followers));
} elseif ($st == 20) {
    $query = "SELECT count(`id`) AS `total_invitations` FROM `dostums_page_likes` WHERE `user_id`='" . $usrid . "' AND status=2";
    $chknotification = $obj->FlyQuery($query);
    $varnew = array("total_invitations_list" => $chknotification[0]->total_invitations);
    echo json_encode($varnew);
    //echo $chknotification[0]->total_invitations;
} elseif ($st == 21) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        alldata.*,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        concat(du.first_name,' ',du.last_name) as name,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2
        FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.date,
	a.status
	FROM dostums_group_admin AS a
	WHERE a.status='1') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="rqst-grp-mem-bgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-sm-12" style="background-color:#B3E5FC; margin-top: 10px;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupBlkdMemUnblock('<?php //echo $noti->user_id;        ?>', '<?php //echo $noti->id;        ?>')" type="button" class="btn btn-sm">
                                            Leave Group
                                        </button>
                                    </li>
                                    <li class="divider" role="presentation"></li>
                                    <li>
                                        <button onclick="GroupBlkdMemRemove('<?php //echo $noti->user_id;        ?>', '<?php //echo $noti->id;        ?>')" type="button" class="btn btn-sm">
                                            Remove Member from Group
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 22) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
alldata.*,
IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
concat(du.first_name,' ',du.last_name) as name,
dc.country_name,
du.city_id,
dua.about_short,
dua.occupation,
dua.company,
dei.school,
dei.college,
dei.university1,
dei.university2
FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status
	FROM dostums_group_members AS a
	WHERE a.status='1') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="grp-mem-rbgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-sm-12" style="background-color:#B3E5FC; margin-top: 10px;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupMemRemove('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-sm">
                                            Remove From Group
                                        </button>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <button onclick="GroupMemBlock('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-sm">
                                            Block From Group
                                        </button>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <button onclick="MakeGroupAdmin('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-sm">
                                            Make Group Admin
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
} elseif ($st == 23) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chknotification = $obj->FlyQuery("SELECT
        alldata.*,
        IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
        concat(du.first_name,' ',du.last_name) as name,
        dc.country_name,
        du.city_id,
        dua.about_short,
        dua.occupation,
        dua.company,
        dei.school,
        dei.college,
        dei.university1,
        dei.university2
        FROM
	(SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status
	FROM dostums_group_members AS a
	WHERE a.status='4') as alldata
	LEFT JOIN dostums_user as du ON du.id=alldata.user_id
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=alldata.user_id AND dpp.status='2'
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_country as dc ON dc.id=du.country_id
	LEFT JOIN dostums_user_about as dua ON dua.user_id=alldata.user_id
	LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=alldata.user_id
	WHERE alldata.group_id='" . $group_id . "' GROUP BY alldata.user_id");
    if (!empty($chknotification))
        foreach ($chknotification as $noti) {
            ?>
            <!-- START list group item-->
            <div id="rqst-grp-mem-bgrid_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-sm-12" style="background-color:#B3E5FC; margin-top: 10px;"><!--width:48%; margin-right:1%;-->
                <div class="media clearfix">
                    <a href="profile.php?user_id=<?php echo $noti->user_id; ?>" class="pull-left">

                        <img class="media-object thumb48 img-thumbnail" alt="Image"
                             src="./profile/<?php echo $noti->photo; ?>">
                    </a>
                    <div class="media-body clearfix">
                        <div class="pull-right"><div class="dropdown">
                                <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                    <i class="fa fa-star"></i><!-- Member -->&nbsp;<i class="fa fa-caret-down"></i>
                                </span>

                                <ul class="dropdown-menu dropdown-menu-right text-center">
                                    <!--<li>
                                        <a href="">    Get Notifications

                                        </a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa close-friend-icon color-success fa-check"></i> Close Friends
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">  Acquaintances

                                        </a>
                                    </li>
                                    <li class="divider" role="presentation"></li>-->
                                    <li>
                                        <button onclick="GroupBlkdMemUnblock('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-sm">
                                            Unblock Member
                                        </button>
                                    </li>
                                    <li class="divider" role="presentation"></li>
                                    <li>
                                        <button onclick="GroupBlkdMemRemove('<?php echo $noti->user_id; ?>', '<?php echo $noti->id; ?>')" type="button" class="btn btn-sm">
                                            Remove Member from Group
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>




                        <a class="link" href="profile.php?user_id=<?php echo $noti->user_id; ?>">
                            <strong class="media-heading text-primary">
            <?php echo $noti->name; ?>
                            </strong>
                        </a>

                        <div class="frined-info">

                                                                                                                <!--<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                                                                                                    <small>53 mutual friends</small>
                                                                                                                </p>-->
                            <p><br></p>
                            <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                            <p>Lives in&nbsp;:   <a class="link" href="">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END list group item-->
            <?php
        }
}

// [for unblock a friend start]
elseif ($st == 24) {
    $iteam = $_POST['iteam'];
    //$chknotification=$obj->FlyQuery("SELECT count(`id`) AS `ttl_friends_blocked` FROM `dostums_friends_blocklist` WHERE `user_id`='".$usrid."' AND status='1'");
    //echo json_encode(array("ttl_friends_blocked"=>$chknotification[0]->ttl_friends_blocked));
    // $query = "SELECT count(`id`) AS `ttl_friends_blocked` FROM `dostums_friends_blocklist` WHERE `uid`='" . $input_by . "' AND status=1";
    $query = "SELECT count(`id`) AS `ttl_friends_blocked` FROM `block` WHERE `userid`='" . $input_by . "' AND `iteam` ='" . $iteam . "'  AND status=1";
    $chknotification = $obj->FlyQuery($query);

    //echo "Block FOund ".$chknotification[0]->ttl_friends_blocked;

    $varnews = array("ttl_friends_blocked" => $chknotification[0]->ttl_friends_blocked);
    echo json_encode($varnews);
}
// [for unblock a friend end]
// [load data of block friend page start]
elseif ($st == 25) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();

    $myID = $_POST['usrid'];
    $iteam = $_POST['iteam'];

    $chk = $obj->FlyQuery("SELECT b.* FROM `block` AS b WHERE b.`userid` = '" . $myID . "' AND b.`status` = '1'");

    if (!empty($chk)) {
        foreach ($chk as $chkvalue) {
            $blockedID = $chkvalue->iteam_id;

            $chknotification = $obj->FlyQuery("SELECT

               concat(du.first_name,' ',du.last_name) as name,
               IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
               dc.country_name,
             	 du.city_id,
               dua.about_short,
               dua.occupation,
             	 dua.company,
             	 dei.school,
             	 dei.college,
             	 dei.university1,
             	 dei.university2

               FROM dostums_user as du
               LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id= '" . $blockedID . "' AND dpp.status='2'
               LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
               LEFT JOIN dostums_country as dc ON dc.id=du.country_id
               LEFT JOIN dostums_user_about as dua ON dua.user_id='" . $blockedID . "'
               LEFT JOIN dostums_educational_institutions as dei ON dei.user_id='" . $blockedID . "'

               WHERE du.id = '" . $blockedID . "' AND du.user_permission = '1'
           ");



            //   $chknotification = $obj->FlyQuery("SELECT
            // alldata.* FROM (select
            //   a.id,
            //   a.uid,
            //   a.to_uid,
            //   a.status,
            //
	// IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
            // concat(du.first_name,' ',du.last_name) as name,
            //
	// dc.country_name,
            //
	// du.city_id,
            //
	// dua.about_short,
            // dua.occupation,
            // dua.company,
            //
	// dei.school,
            // dei.college,
            // dei.university1,
            // dei.university2
            //
  // #dfbl.to_uid,
            // #dfbl.status as block_status
            //
	// FROM dostums_friend as a
            // LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.uid AND dpp.status='2'
            //   LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
            // LEFT JOIN dostums_user as du ON du.id=a.uid
            // LEFT JOIN dostums_country as dc ON dc.id=du.country_id
            // LEFT JOIN dostums_user_about as dua ON dua.user_id=a.uid
            // LEFT JOIN dostums_educational_institutions as dei ON dei.user_id=a.uid
            // #LEFT JOIN dostums_friends_blocklist as dfbl on dfbl.to_uid=a.uid
            // WHERE
            // a.uid IN (SELECT b.iteam_id FROM block AS b
            //             WHERE b.userid = '" .$userID. "' AND b.status = '1')
            // AND a.status='3'  ) as alldata
            //   WHERE alldata.uid!='" .$userID. "'    ");
            //$chkstatus=$obj->SelectAllByVal2("dostums_friends_blocklist","uid",$input_by,"to_uid",$usrid,"status");

            if (!empty($chknotification))
                foreach ($chknotification as $noti) {

                    //if ($noti->block_status != 1) {
                    ?>
                    <!-- START list group item-->
                    <div id="friendslistsingle_<?php echo $noti->id; ?>" class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
                        <div class="media clearfix">
                            <div class="pull-left">

                                <img class="media-object thumb48 img-thumbnail" alt="Image"
                                     src="./profile/<?php echo $noti->photo; ?>">
                            </div>
                            <div class="media-body clearfix">
                                <div class="pull-right"><div class="dropdown">
                                        <span href="" data-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-danger">
                                            <i class="fa fa-star"></i> Friend <i class="fa fa-caret-down"></i>
                                        </span>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <!-- <button onclick="FriendsUnblock('<?php //echo $blockedID; ?>','<?php //echo $input_by;?>','myFriendBlock')" type="button" class="btn btn-default btn-sm"> -->
                                                <button onclick="javascript:unblock('<?php echo $blockedID; ?>', '<?php echo $input_by; ?>', 'myFriendBlock');" type="button" class="btn btn-default btn-sm">
                                                    Unblock
                                                </button>
                                            </li>
                                            <!-- <li class="divider" role="presentation"></li> -->
                                            <!-- <li>
                                                <button onclick="FriendsUnfriend('<?php //echo $blockedID;  ?>', '<?php //echo $input_by;  ?>')" type="button" class="btn btn-default btn-sm">
                                                    Unfriend
                                                </button>
                                            </li> -->

                                        </ul>
                                    </div>
                                </div>




                                <a class="link" href="profile.php?user_id=<?php echo $noti->uid; ?>">
                                    <strong class="media-heading text-primary">
                    <?php echo $noti->name; ?>
                                    </strong>
                                </a>

                                <div class="frined-info">

                                    <p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
                                        <!-- <small>53 mutual friends</small> -->
                                    </p>
                                    <p><br></p>
                                    <p>About&nbsp;:  <a class="link" href=""><?php echo $noti->about_short; ?></a></p>
                                    <p>Lives in&nbsp;:   <a class="link" href=""><i class="fa fa-map-marker">&nbsp;</i><?php echo $noti->city_id; ?>, <?php echo $noti->country_name; ?></a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END list group item-->
                    <?php
                    //}
                }
        }
    }
}
// [load data of block friend page end]
elseif ($st == 26) {
    $chknotification = $obj->FlyQuery("SELECT count(`id`) AS `total_group_invitations` FROM `dostums_group_members` WHERE `user_id`='" . $user_id . "' AND status='2'");
    echo json_encode(array("ttl_group_mem_inv" => $chknotification[0]->total_group_invitations));
} elseif ($st == 27) {
    $chknotificationsall = $obj->update("dostums_notifications", array("user_id" => $input_by, "`read`" => 1));
    echo json_encode(array("read" => 1));
}



// [tag friend list data load start]
elseif ($st == 28) {
    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chk = $obj->FlyQuery(" SELECT
                          df.id,
                          df.uid,
                          df.to_uid,
                          df.status,
                          case when df.uid <> '" . $usrid . "'  then df.uid else df.to_uid END AS friendID
                          FROM dostums_friend AS df
                          WHERE (df.uid = '" . $usrid . "' OR df.to_uid = '" . $usrid . "') AND df.status = '2' ORDER BY df.id DESC");

    if (!empty($chk)) {
        foreach ($chk as $chkvalue) {
            $id = $chkvalue->id;
            $uval = $chkvalue->friendID;

            $chknotification = $obj->FlyQuery(" SELECT
                                concat(du.first_name,' ',du.last_name) as name,
                                IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
                                dc.country_name,
                                du.city_id,
                                dua.about_short,
                                dua.occupation,
                                dua.company,
                                dei.school,
                                dei.college,
                                dei.university1,
                                dei.university2,
                                b.status as blockStatus

                                FROM
                                dostums_user AS du
                                LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id='" . $uval . "' AND dpp.status='2'
                                LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
                                LEFT JOIN dostums_country as dc ON dc.id=du.country_id
                                LEFT JOIN dostums_user_about as dua ON dua.user_id='" . $uval . "'
                                LEFT JOIN dostums_educational_institutions as dei ON dei.user_id='" . $uval . "'
                                LEFT JOIN block as b ON b.userid='" . $usrid . "' AND b.iteam_id='" . $uval . "' AND b.iteam='myFriendBlock' AND b.status='1'
                                WHERE du.id = '" . $uval . "' ");

            if (!empty($chknotification))
                foreach ($chknotification as $noti) {

                    if ($noti->block_status != 1) {
                        ?>
                        <option value="<?php echo $uval; ?>"><span><?php echo $noti->name; ?></span></option>
                        <?php
                    }
                }
        }
    }
}
// [tag friend list data load end]
// [this is for user profile post]
elseif ($st == 29) {
    $new_user_id = $_POST['usrid'];



    // if (in_array($obj->filename(), array("profiles.php", "profile.php"))) {
    //  $var = '1';
    // } else {
    //  $var = '2';
    // }
    // echo json_encode(array("read" => $new_user_id));
    echo json_encode(array("read" => $pageName));
}



// [this is for other pages post]
elseif ($st == 30) {
    $new_user_id = $_POST['usrid'];

    $sqlquery = $obj->FlyQuery("

    SELECT

    dp.id,
    dp.group_id,
    dp.user_id,
    dp.from_user_id,
    dp.photo_id,
    count(dc.id) AS `comment`,
    count(dl.id) AS `likes`,
    dp.share_id,
    dp.post,
    dp.post_time,
    dp.post_status,
    dp.status,

    IF(dp.id = dt.post_id,dt.to_uid,NULL) AS tagID,
    IF(dp.id = dt.post_id,dt.status,0) AS tagStatus,
    dt.to_uid AS tagedID,

    CASE dp.share_id WHEN 0 THEN
    (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=dp.id)
      ELSE
    (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=dp.share_id)
    END AS share_count

    FROM dostums_post AS dp
    LEFT JOIN dostums_comment as dc on dc.post_id=dp.id
    LEFT JOIN dostums_likes as dl ON dl.post_id=dp.id

    LEFT JOIN dostums_tags AS dt ON dt.to_uid = '" . $new_user_id . "'

    WHERE

    ( dp.user_id='" . $new_user_id . "'
        OR dp.user_id IN
      (
        SELECT dostums_friend.uid FROM dostums_friend WHERE
        dostums_friend.uid = '" . $new_user_id . "' OR
        dostums_friend.to_uid='" . $new_user_id . "'
      )

      AND dp.group_id IN
      (
        SELECT dostums_group_members.group_id FROM dostums_group_members WHERE
        dostums_group_members.user_id = '" . $new_user_id . "' OR
        dostums_group_members.input_by = '" . $new_user_id . "'
      )
      AND dp.page_id IN
      (
        SELECT dostums_page_likes_view.page_id FROM dostums_page_likes_view WHERE
        dostums_page_likes_view.user_id = '" . $new_user_id . "'
      )
      AND dp.id IN
      (
        SELECT dostums_likes.post_id FROM dostums_likes WHERE
        dostums_likes.user_id IN
        (
           SELECT dostums_friend.uid FROM dostums_friend WHERE
           dostums_friend.uid = '" . $new_user_id . "' OR
           dostums_friend.to_uid='" . $new_user_id . "'
        )
      )
      AND dp.id IN
      (
        SELECT dostums_comment.post_id FROM dostums_comment WHERE
        dostums_comment.user_id IN
        (
           SELECT dostums_friend.uid FROM dostums_friend WHERE
           dostums_friend.uid = '" . $new_user_id . "' OR
           dostums_friend.to_uid='" . $new_user_id . "'
        )
      )
    )  AND dp.status <> 0


    GROUP BY dp.id
    ORDER BY rand() DESC LIMIT 20
    # ORDER BY dp.id DESC LIMIT 10

    ");

// print_r($sqlquery);

    $postbreak = 1;

    if (!empty($sqlquery)) {
        foreach ($sqlquery as $post) {
            $post_id = $post->id;
            // echo $post_status = $post->post_status;
            // echo $tag_id = $post->tagID;
            // echo $tag_status = $post->tagStatus;

            $test = '';
            $test .= "<p style='color:red;'>$post_id</p>";
            ?>

            <?php
        }
    }

    echo json_encode(array("read" => $test));
}
// [this is for other pages post end]
// [this is for action on a post start]
elseif ($st == 31) {
    $postid = $_POST['postid'];
    $buttonType = $_POST['buttonType'];

    if ($buttonType == 'del') {
        $insert_post = array("id" => $postid);
        $obj->updateUsingMultiple("dostums_post", array("status" => 0), $insert_post);
        echo json_encode(array("data" => 1));
    } else if ($buttonType == 'hide') {
        $insert_post = array("id" => $postid);
        $obj->updateUsingMultiple("dostums_post", array("status" => 5), $insert_post);
        echo json_encode(array("data" => 1));
    }
} elseif ($st == 32) {
    $postID = $_POST['postID'];
    $userid = $_POST['userid'];

    if ($obj->exists_multiple("dostums_tags", array("post_id" => $postID, "to_uid" => $userid))) {
        $insert_post = array("post_id" => $postID, "to_uid" => $userid);
        $update = $obj->updateUsingMultiple("dostums_tags", array("status" => 0), $insert_post);

        if ($update == 1) {

            $return_array = array("output" => "success", "msg" => "Succefully removed tag.");
            echo json_encode($return_array);
            exit();
        } else {
            $return_array = array("output" => "error", "msg" => "Something is going wrong.");
            echo json_encode($return_array);
            exit();
        }
    }
}
// [this is for action on a post end]
// [for load post share data start]
else if ($st == 33) {
    $postID = $_POST['postID'];
    $userID = $obj->SelectAllByVal("dostums_post", "id", $postID, "user_id");


    $chkpost = $obj->FlyQuery(" SELECT
   dp.id,
   dp.user_id,
   dp.group_id,
   dp.page_id,
   dp.post,
   dp.photo_id AS postphoto,
   dp.post_permission,
   dp.share_id,
   dp.post_status,
   dp.date,
   date_format(dp.post_time, '%l:%i %p %b %e, %Y') AS fdate,

   dpp.photo_id,
   IFNULL(dpo.photo,'generic-man-profile.jpg') as photo,
   concat(du.first_name,' ',du.last_name) as name

from dostums_post AS dp

LEFT join dostums_profile_photo AS dpp ON dpp.user_id = dp.user_id
LEFT join dostums_photo AS dpo ON dpo.id = dpp.photo_id
LEFT Join dostums_user AS du ON du.id = dp.user_id


WHERE dp.id = '" . $postID . "' and dp.status <> 0 ");

    $userimage = '';
    $username = '';
    $postper = '';
    $postText = '';
    $postContent = '';
    $postPhotos = '';
    $pn = '';
    if (!empty($chkpost)) {
        foreach ($chkpost as $pval) {
            $user_id = $pval->user_id;
            $photo = $pval->photo;
            $name = $pval->name;
            $date = $pval->fdate;
            $post_permission = $pval->post_permission;
            $shareID = $pval->share_id;
            $post_status = $pval->post_status;
            $postWriting = $pval->post;
            $postphoto = $pval->postphoto;
        }

// [start]
        if ($post_permission == '1') {
            $postper .= '<i class="fa fa-globe" aria-hidden="true"></i>';
        } else if ($post_permission == '2') {
            $postper .= '<i class="fa fa-users" aria-hidden="true"></i>';
        } else if ($post_permission == '3') {
            $postper .= '<i class="fa fa-lock" aria-hidden="true"></i>';
        } else if ($post_permission == '0') {
            $postper .= '<i class="fa fa-globe" aria-hidden="true"></i>';
        }
// [end]
// [start]
        if ($shareID != '0') {
            $postText.= '<span style="color:#777;">Shared Something</span>';
        } else {
            if ($post_status == '5') {
                $postText .= '<span class="text-muted ">with </span>';
                $tags = $obj->FlyQuery("SELECT to_uid FROM dostums_tags WHERE post_id = '$postID' AND status = '1' ");
                if (!empty($tags)) {
                    foreach ($tags AS $tagToIdValue) {
                        $tagIDES = $tagToIdValue->to_uid;
                        $usernames = $obj->FlyQuery("SELECT id,CONCAT(first_name,' ',last_name ) AS fullname FROM dostums_user WHERE id = '$tagIDES' ");
                        if (!empty($usernames)) {

                            foreach ($usernames as $uName) {
                                $tagNames = $uName->fullname;
                                $id = $uName->id;
                                $postText.= "<a class='_3rdUser' href='./profiles.php?user_id= $id'> $tagNames, </a>";
                            }
                        }
                    }
                }
            } else {
                $postText .= '<span style="color:#777;">Posted Something</span>';
            }
        }
// [end]
// [start]
        if (!empty($postphoto)) {
            $postPhotos .= $postphoto;
            $pn .= $obj->SelectAllByVal('dostums_photo', 'id', $postPhotos, 'photo');
        } else {
            $postPhotos .= '';
            $pn .= '';
        }
// [end]
    }


    $userimage .= "
<a href='#'>
  <img class='img-circle pull-left  img-responsive'
       src='./profile/$photo' alt='user_photo' style='width: 40px;margin-left:12px;margin-right:12px;margin-top:12px;'>
</a>
";

    $username .= "
<p style='margin-top:5px;'><a href='./profiles.php?user_id=$user_id'>$name</a>
  <span style='color:#ccc;font-size:13px;'> $postText</span>
  <br>
  <span style='color:#ccc;font-size:12px;'>$date - $postper</span>
</p>
";

    $postContent .= "
<p> $postWriting </p><br/>

";

    if (!empty($pn)) {
        $postContent .= "<img src='./profile/$pn ' class='img-responsive' alt=''>";
    }

    $return_array = array("output" => "success", "userimage" => $userimage, "username" => $username, "postContent" => $postContent);
    echo json_encode($return_array);
    exit();
}
// [for load post share data end]
// [for load friend, group, page data in share start]
else if ($st == 34) {
    $keyFriendName = $_POST['keyFriendName'];
    $input_by;

    $fdatas = $obj->FlyQuery("SELECT
    ud.*
    FROM (  SELECT
            a.id,
            a.name,
            IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
            IFNULL(a.city_id,'none') as city_id,
            a.country_id,
            IFNULL(dc.country_name,'none') as country_name,
            cdfu.status as ustatus,
            cdf.status as frnd_status,
            CONCAT('profile.php?user_id=',a.id) AS link,
            'user_data' as data_from,
            case when cdfu.uid <> '" . $input_by . "'  then cdfu.uid else cdfu.to_uid END AS friendID

           FROM `dostums_user_view` as a
           left JOIN dostums_country as dc ON dc.id=a.`country_id`
           left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
           left JOIN dostums_photo as dp ON dp.id=pf.photo_id
           LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
           LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id

           WHERE
           (a.name like '%" . $keyFriendName . "%'
           OR a.email like '%" . $keyFriendName . "%'
           OR a.phone_number like '%" . $keyFriendName . "%') AND (cdfu.status = '2' OR cdf.status = '2')
           GROUP BY a.id

         ) as ud WHERE ud.id!='" . $input_by . "'

");
// print_r($fdatas);

    $dd = '';
    if (!empty($fdatas)) {
        $dloop = 1;
        foreach ($fdatas as $fvalue) {
            $sbtn = '';
            if ($fvalue->data_from == "user_data") {
                $sbtn = '<small><i class="fa fa-map-marker margin-right10"></i>' . $fvalue->city_id . '&nbsp,&nbsp ' . $fvalue->country_name . '</small>';
            } else {
                $sbtn = '<small><i class="fa fa-info-circle margin-right10"></i>' . substr($fvalue->city_id, 0, 20) . '</small>';
            }

            $dd .='<li class="friends">
                <a href="JavaScript:void(0);" onclick="shareElementClick(' . $fvalue->id . ')">
                        <div class="row">
                        <div class="col-sm-3">
                                <img class="img-circle img-thumbnail" src="profile/' . $fvalue->photo . '" style="height:50px !important; width:50px !important;"/>
                        </div>
                        <div class="col-sm-9" style="padding-left:0px !important; margin-top:5px !important;">
                                ' . $fvalue->name . '<br>
                                <small><i class="fa fa-map-marker margin-right10"></i>' . $fvalue->city_id . '&nbsp,&nbsp ' . $fvalue->country_name . '</small>
                        </div>
                    </div>
                </a>
            </li>';

            if ($dloop >= 8) {

                $dd .='<li style="padding:0px !important;" id="link_search_result">
                					<a id="load-spin" href="./all-frnd-search-results.php?result=' . $keyFriendName . '">
                						<div class="row">
                							<div class="col-sm-9 text-right text-primary" style="overflow: hidden; margin-top:10px;">
                								<span class="text-success" style=" font-weight:400; font-size:16px;">
                								View All Results for</span> &nbsp; "' . $keyFriendName . '"
                							</div>
                							<div class="col-sm-3 text-left">
                								<img class="" src="./images/spinner/search-failed4.png" style=""/>
                							</div>
                						</div>
                					</a>
                				</li>';

                break;
            }
            $dloop++;
        }
    } else {
        $dd .='<li style="padding:0px !important;">
        <a id="load-spin" href="#">
          <div class="row">
            <div class="col-sm-9 text-right text-info" style="overflow: hidden; margin-top:10px;">
              <span class="text-warning" style=" font-weight:400; font-size:16px;">
              Sorry! nothing found for</span> &nbsp; "' . $keyFriendName . '"
            </div>
            <div class="col-sm-3 text-left">
              <img class="" src="./images/spinner/search-failed4.png" style=""/>
            </div>
          </div>
        </a>
      </li>';
    }

    $return_array = array("output" => "success", "return" => $dd);
    echo json_encode($return_array);
    exit();
} else if ($st == 35) {
    $keyGroupName = $_POST['keyGroupName'];
    $input_by;


    $fdatas = $obj->FlyQuery("SELECT
       dgm.group_id,
       dgm.user_id,
       dgm.input_by,
       dgm.status,
       dg.name,
       dg.icon_id,
       dgi.class

       FROM dostums_group_members as dgm
       left JOIN dostums_group AS dg on dg.group_id = dgm.group_id
       LEFT JOIN dostums_group_icon as dgi on dgi.id = dg.icon_id

       WHERE
       (dgm.user_id = '" . $input_by . "' OR dgm.input_by = '" . $input_by . "') AND dgm.status <> '3' AND
       (dg.name like '%" . $keyGroupName . "%'
       OR dg.email like '%" . $keyGroupName . "%'
       OR dg.phone like '%" . $keyGroupName . "%')

       #GROUP BY dg.group_id

 ");



    $dg = '';
    if (!empty($fdatas)) {
        $dloop = 1;
        $identity = 'group';
        foreach ($fdatas as $fvalue) {
            // $sbtn = '';
            // if ($fvalue->data_from == "user_data") {
            //     $sbtn = '<small><i class="fa fa-map-marker margin-right10"></i>' . $fvalue->city_id . '&nbsp,&nbsp </small>';
            // } else {
            //     $sbtn = '<small><i class="fa fa-info-circle margin-right10"></i>' . substr($fvalue->city_id,0,20) . '</small>';
            // }

            $dg .='<li class="groups_' . $fvalue->group_id . '" onclick="shareElementgroupClick();">
              <a href="javascript:void(0);" >
                      <div class="row">
                      <div class="col-sm-3">
                              <i class="' . $fvalue->class . '"></i>
                      </div>
                      <div class="col-sm-9" style="padding-left:0px !important; margin-top:5px !important;">
                              ' . $fvalue->name . '<br>
                      </div>
                  </div>
              </a>
          </li>';

            if ($dloop >= 8) {

                $dg .='<li style="padding:0px !important;" id="link_search_result">
                        <a id="load-spin" href="./all-frnd-search-results.php?result=' . $keyGroupName . '">
                          <div class="row">
                            <div class="col-sm-9 text-right text-primary" style="overflow: hidden; margin-top:10px;">
                              <span class="text-success" style=" font-weight:400; font-size:16px;">
                              View All Results for</span> &nbsp; "' . $keyGroupName . '"
                            </div>
                            <div class="col-sm-3 text-left">
                              <img class="" src="./images/spinner/search-failed4.png" style=""/>
                            </div>
                          </div>
                        </a>
                      </li>';

                break;
            }
            $dloop++;
        }
    } else {
        $dg .='<li style="padding:0px !important;">
      <a id="load-spin" href="#">
        <div class="row">
          <div class="col-sm-9 text-right text-info" style="overflow: hidden; margin-top:10px;">
            <span class="text-warning" style=" font-weight:400; font-size:16px;">
            Sorry! nothing found for</span> &nbsp; "' . $keyGroupName . '"
          </div>
          <div class="col-sm-3 text-left">
            <img class="" src="./images/spinner/search-failed4.png" style=""/>
          </div>
        </div>
      </a>
    </li>';
    }

    $return_array = array("output" => "success", "return" => $dg);
    echo json_encode($return_array);
    exit();
} else if ($st == 36) {
    $keyPageName = $_POST['keyPageName'];
    $input_by;

    $datas = $obj->FlyQuery("");
} else if ($st == 37) {
    $element_id = $_POST['element_id'];
    $fdatas = $obj->FlyQuery("SELECT `id`, `first_name`, `last_name`, concat(`first_name`, ' ', `last_name`) as usename FROM `dostums_user` WHERE id ='" . $element_id . "' AND status <> 0");

    $text = '';
    if (!empty($fdatas)) {
        foreach ($fdatas as $value) {
            $userId = $value->id;
            $userName = $value->usename;

            $text .= "
          <ul class='list-group'>
             <li class='list-group-item' style='background:#ccc;padding:10px;border-radius:2px;'>
               <a href='JavaScript:void(0);' class='pull-right' onclick='shareElementClick(0)'><span class='badge'><i class='fa fa-close'></i></span></a>
                " . $userName . "
             </li>
           </ul>
           <span id='user_id' style='background:#ccc;padding:10px;border-radius:2px;display:none;'>" . $element_id . "</span>
          ";
        }
    }

    $return_array = array("output" => "success", "return" => $text);
    echo json_encode($return_array);
    exit();
}
// [for load friend, group, page data in share end]
// [ share a post start]
else if ($st == 38) {
    $sharetext = '';
    $friendID = '';
    $post_status = '';

    $text = $_POST['sharetext'];
    $user_id = $_POST['user_id'];
    $permission = $_POST['permission'];
    $postID = $_POST['postID'];
    // echo $postID;
    // exit();
    if (!empty($text)) {
        $sharetext .= $text;
    } else {
        $sharetext;
    }

    if (!empty($user_id) OR $user_id != '') {
        $friendID .= $user_id;
    } else {
        $friendID .= '0';
    }

    if ($friendID == '0') {
        $post_status .= '1';
    } else {
        $post_status .= '2';
    }


    $shareinsert = $obj->insert("dostums_post", array("user_id" => $input_by,
        "from_user_id" => $input_by,
        "to_user_id" => $friendID,
        "post" => $sharetext,
        "post_status" => $post_status,
        "post_permission" => $permission,
        "post_time" => date('Y-m-d H:i:s'),
        "share_id" => $postID,
        "date" => date('Y-m-d'),
        "status" => 2));

    if ($shareinsert) {
        $return_array = array("output" => "success", "msg" => "Succefully shared.");
        echo json_encode($return_array);
        exit();
    } else {
        $return_array = array("output" => "error", "msg" => "Something is going wrong.");
        echo json_encode($return_array);
        exit();
    }
}
// [ share a post end]
// [tag friend list data load for edit a post start]
elseif ($st == 39) {

    $status = $_POST['status'];
    $usrid = $_POST['usrid'];
    $postID = $_POST['postID'];

    if ($status == '5') {
        $tagedIDquery = $obj->FlyQuery("SELECT
                                      dt.id,
                                      dt.uid,
                                      dt.to_uid,
                                      CASE WHEN dt.uid <> '" . $usrid . "' then dt.uid ELSE dt.to_uid END As tagid

                                      FROM dostums_tags AS dt WHERE dt.post_id = '" . $postID . "' AND dt.status = '1' ");
        if (!empty($tagedIDquery)) {
            foreach ($tagedIDquery as $tegedID) {
                $tids = $tegedID->tagid;
                @$fname = $obj->SelectAllByVal("dostums_user", 'id', $tids, 'first_name');
                @$lname = $obj->SelectAllByVal("dostums_user", 'id', $tids, 'last_name');
                ?>
                             <!-- <option value="<?php //echo $tegedID->id;?>" selected> -->
                <option value="<?php echo $tids; ?>" selected>
                <span><?php echo $fname; ?> <?php echo $lname; ?></span>
                </option>
                <?php
            }
        }
    }




    include('../class/extraClass.php');
    $extra = new SiteExtra();
    $chk = $obj->FlyQuery(" SELECT
                          df.id,
                          df.uid,
                          df.to_uid,
                          df.status,
                          case when df.uid <> '" . $usrid . "'  then df.uid else df.to_uid END AS friendID
                          FROM dostums_friend AS df
                          WHERE (df.uid = '" . $usrid . "' OR df.to_uid = '" . $usrid . "') AND df.status = '2' ORDER BY df.id DESC");

    if (!empty($chk)) {
        foreach ($chk as $chkvalue) {
            $id = $chkvalue->id;
            $uval = $chkvalue->friendID;

            $chknotification = $obj->FlyQuery(" SELECT
                                concat(du.first_name,' ',du.last_name) as name,
                                IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
                                dc.country_name,
                                du.city_id,
                                dua.about_short,
                                dua.occupation,
                                dua.company,
                                dei.school,
                                dei.college,
                                dei.university1,
                                dei.university2,
                                b.status as blockStatus

                                FROM
                                dostums_user AS du
                                LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id='" . $uval . "' AND dpp.status='2'
                                LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
                                LEFT JOIN dostums_country as dc ON dc.id=du.country_id
                                LEFT JOIN dostums_user_about as dua ON dua.user_id='" . $uval . "'
                                LEFT JOIN dostums_educational_institutions as dei ON dei.user_id='" . $uval . "'
                                LEFT JOIN block as b ON b.userid='" . $usrid . "' AND b.iteam_id='" . $uval . "' AND b.iteam='myFriendBlock' AND b.status='1'
                                WHERE du.id = '" . $uval . "' ");

            if (!empty($chknotification))
                foreach ($chknotification as $noti) {

                    if ($noti->block_status != 1) {
                        ?>
                        <option value="<?php echo $uval; ?>"><span><?php echo $noti->name; ?></span></option>
                        <?php
                    }
                }
        }
    }
}
// [tag friend list data load for edit a post end]
//[ for see friend in online start]
elseif ($st == 40) {
    $currentTimeString = $_POST['currentTimeString'];
    $update_post = array("user_id" => $dostums_user_id);
    $update = $obj->updateUsingMultiple("online_user_track", array("last_time" => $currentTimeString, "status" => 1), $update_post);
    //  $update = $obj->updateUsingMultiple("online_user_track", array("last_time" => $currentTimeString), $update_post);
    //  echo '1';

    $return_array = array("output" => "success", "return" => '1');
    echo json_encode($return_array);
    exit();
} elseif ($st == 41) {

    $lastgapmin = $obj->FlyQuery("SELECT onut.* FROM online_user_track AS onut WHERE MINUTE(TIMEDIFF(CURRENT_TIMESTAMP, onut.last_time)) > 0 AND onut.status = '1'");

    if (!empty($lastgapmin)) {
        foreach ($lastgapmin as $lvalue) {
            $update_post = array("user_id" => $lvalue->user_id, "status" => 2);
            $obj->update("online_user_track", $update_post);
            //  exit();
        }
    }
    // $updatestatus = $obj->FlyQuery(" UPDATE
    //                                  online_user_track as onut
    //                                  SET
    //                                  onut.status = 2
    //                                  WHERE
    //                                  #onut.status = '1' and
    //                                  MINUTE(TIMEDIFF(CURRENT_TIMESTAMP, onut.last_time)) > 0
    //                               ");
    // echo $uid = $_POST['uid'];
    //  $ar = array('status' => 1);
    //  $selectall = $obj->SelectAllByID_Multiple("online_user_track", $ar);
    // $selectall = $obj->FlyQuery("SELECT * FROM online_user_track as onut WHERE onut.status = '1' ");
    //  foreach ($selectall as $value) {
    //  $user_id = $value->user_id;
    //  $selectLastTime = $value->last_time;
    //  $dateTime = new DateTime($selectLastTime);
    //  $d = $dateTime->format("Y-m-d H:i:s");
    //  $current = date("Y:m:d H:i:s");
    //  echo "<pre/> database time ";
    //  print_r($d);
    //  echo "<br/> current ";
    //  print_r($current);
    //  echo "<br/>";
    //  echo $user_id;
    //  echo "<br/>";
    //  $intervalyear = $dateTime->diff(new DateTime)->format('%y');
    //  $intervalmonth = $dateTime->diff(new DateTime)->format('%m');
    //  $intervalday = $dateTime->diff(new DateTime)->format('%d');
    //  $intervalhour = $dateTime->diff(new DateTime)->format('%h');
    //  $intervalmin = $dateTime->diff(new DateTime)->format('%i');
    //  $intervalsec = $dateTime->diff(new DateTime)->format('%s');
    //  echo "<br/>";
    //  echo "min ".$intervalmin;
    //  echo "<br/>";
    //  echo "sec ".$intervalsec;
    //  echo "<br/>";
    //  echo "user id ".$user_id;
    // $updatestatus = $obj->FlyQuery(" UPDATE
    //                                  online_user_track as onut
    //                                  SET
    //                                  onut.status = 2
    //                                  WHERE
    //                                  onut.status = '1' and MINUTE(TIMEDIFF(CURRENT_TIMESTAMP, onut.last_time)) > 0
    //                               ");
    // echo $updatestatus;
    // exit();
    // $inactive = $obj->FlyQuery("SELECT onut.id, onut.user_id as uid, MINUTE(TIMEDIFF(CURRENT_TIMESTAMP, onut.last_time)) as timediff  FROM online_user_track as onut WHERE onut.status = '1'");
    // foreach ($inactive as $invalue) {
    // $useridforinactive = $invalue->uid;
    // echo "<br/>";
    //  $timediffforinactive = $invalue->timediff;
    // echo "<br/>";
    // if($timediffforinactive >= 1){
    // $update_post = array("user_id" => $useridforinactive, "status" => 2);
    // $obj->update("online_user_track", $update_post);
    //   echo $update;
    // exit();
    // } else{
    // $update_post = array("user_id" => $useridforinactive, "status" => 1);
    // $obj->update("online_user_track", $update_post);
    //   echo $update;
    // exit();
    // }
    // }
    // if ($intervalmin >= 1) {
    //  echo "inactive";
    //  echo $user_id;
    //$update_post = array("user_id" => $user_id, "status" => 2);
    //$obj->update("online_user_track", $update_post);
    // $return_array = array("output" => "success","return" => 'inactive' );
    // echo json_encode($return_array);
    // exit();
    // } else {
    //  echo 'active';
    // $update_post = array("user_id" => $user_id);
    // $obj->updateUsingMultiple("online_user_track", array("status" => 1), $update_post);
    // $update_post = array("user_id" => $dostums_user_id, "status" => 1);
    // $obj->update("online_user_track", $update_post);
    // $return_array = array("output" => "success","return" => '1' );
    // echo json_encode($return_array);
    // exit();
    // }
    //  } [end foreach loop]
} elseif ($st == 42) {
    //  echo $input_by;

    $text = '';
    $qe1 = $obj->FlyQuery("SELECT
                        onut.user_id as uidm
                        FROM online_user_track AS onut
                        WHERE onut.status = '1' AND onut.user_id IN ( SELECT
                                                                      CASE WHEN df.uid <> '" . $input_by . "' THEN df.uid ELSE                                                      df.to_uid END AS friend_id
                                                                      FROM dostums_friend AS df
                                                                      WHERE
                                                                      (df.uid = '" . $input_by . "' OR df.to_uid = '" . $input_by . "')
                                                                      AND
                                                                      df.status = '2'
                                                                    )");

    if (!empty($qe1)) {
        foreach ($qe1 as $qvalk) {
            $active_userid = $qvalk->uidm;

            $q2 = $obj->FlyQuery("SELECT
                             du.id as uid,
                             concat(du.first_name,' ',du.last_name) as name,
                             IFNULL(dp.photo,'generic-man-profile.jpg') AS photo
                             FROM dostums_user AS du
                             LEFT JOIN dostums_profile_photo AS dpp
                             on dpp.user_id = du.id AND dpp.status = '2'
                             LEFT JOIN dostums_photo AS dp
                             ON dp.id = dpp.photo_id
                             WHERE du.id = '" . $active_userid . "' AND du.status = '1' AND du.user_permission = '1'

       ");

            if (!empty($q2)) {

                foreach ($q2 as $qvalu2) {
                    $userid = $qvalu2->uid;
                    $username = $qvalu2->name;
                    $userphoto = $qvalu2->photo;
                    
                    $text .= "
                    <a href='javascript:void(0)' onclick='openchat_window(" . $userid . "," . $input_by . ");' class='lv-item' name='" . $userid . "' datalink='profile.php?user_id=" . $userid . "'>
                        <div class='media'>
                           <div class='pull-left p-relative'>
                               <img alt='' src='./profile/" . $userphoto . "' class='lv-img-sm'>
                               <i class='chat-status-online'></i>
                           </div>
                           <div class='media-body'>
                               <div class='lv-title'>" . $username . "</div>
                               <small class='lv-small'>Available</small>
                           </div>
                       </div>
                   </a>
           ";
                }
            } else {
                $text .= " ";
            }
        }
    } // [end if]

    $qe2 = $obj->FlyQuery("SELECT
                            onut.user_id as uidm,
                            onut.last_time as lt,
                            onut.status
                           FROM online_user_track AS onut
                           WHERE onut.status = '2' AND onut.user_id IN ( SELECT
                                                                         CASE WHEN df.uid <> '" . $input_by . "' THEN df.uid ELSE  df.to_uid END AS friend_id
                                                                         FROM dostums_friend AS df
                                                                         WHERE (df.uid = '" . $input_by . "' OR df.to_uid = '" . $input_by . "') AND df.status = '2'
                                                                       )");


    if (!empty($qe2)) {
        foreach ($qe2 as $qe2value) {
            $userltid = $qe2value->uidm;
            $selectLastTime = $qe2value->lt;

            $date1 = strtotime($selectLastTime);
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

            //  echo $userltid;

            $qeeee2 = $obj->FlyQuery("SELECT
                                        du.id as uid,
                                        concat(du.first_name,' ',du.last_name) as name,
                                        IFNULL(dp.photo,'generic-man-profile.jpg') AS photo
                                        FROM dostums_user AS du
                                        LEFT JOIN dostums_profile_photo AS dpp
                                        on dpp.user_id = du.id AND dpp.status = '2'
                                        LEFT JOIN dostums_photo AS dp
                                        ON dp.id = dpp.photo_id
                                        WHERE du.id = '" . $userltid . "' AND du.status = '1' AND du.user_permission = '1'

                  ");

            

            if (!empty($qeeee2)) {
                foreach ($qeeee2 as $q2value) {
                    $userid = $q2value->uid;
                    $username = $q2value->name;
                    $userphoto = $q2value->photo;
                    
                    
                    $user_li_a = '';
                     $user_li_a .= " <a href='javascript:void(0)' onclick='openchat_window(" . $userid . "," . $input_by . ");' class='lv-item' name='" . $userid . "' datalink='profile.php?user_id=" . $userid . "'> ";
                    
//                    if($d < 0){
//                        $user_li_a .= " <a href='javascript:void(0)' onclick='openchat_window(" . $userid . "," . $input_by . ");' class='lv-item' style='display:none;' name='" . $userid . "' datalink='profile.php?user_id=" . $userid . "'> ";
//                    } else{
//                        $user_li_a .= " <a href='javascript:void(0)' onclick='openchat_window(" . $userid . "," . $input_by . ");' class='lv-item' name='" . $userid . "' datalink='profile.php?user_id=" . $userid . "'> ";
//                    }
                    
                    
                    $text .= "
                            $user_li_a
                                 <div class='media'>
                                     <div class='pull-left p-relative'>
                                         <img alt='' src='./profile/" . $userphoto . "' class='lv-img-sm'>
                                         <i class='chat-status-busy'></i>
                                     </div>
                                     <div class='media-body'>
                                         <div class='lv-title'>" . $username . "</div>
                                         <small class='lv-small'>" . $result . "</small>
                                     </div>
                                 </div>
                             </a>
                     ";
                    
                    
                }
            } else {
                $text .= " ";
            }
        }
    }

//            if($text == " "){
//                $text .= "<p>No Friend Available</p>";
//            }

    $return_array = array("output" => "success", "content" => $text);
    echo json_encode($return_array);
    exit();
}
//[ for see friend in online start]
elseif ($st == 43) {
    $uid = $_POST['userID'];

    $up = $obj->FlyQuery("UPDATE `dostums_messages` SET `read`= 'read' WHERE `to_uid` = '$uid'");

//      UPDATE `dostums_messages` SET `read`= 'read' WHERE `to_uid` = '4'
    exit();
} elseif ($st == 44){
    $chknotification = $obj->FlyQuery("
SELECT COUNT(`id`) as friend_request
from dostums_friend
WHERE to_uid='" . $input_by . "'
AND status='1'
ORDER BY id DESC LIMIT 100
 ");

    $count = '';
    
    if(!empty($chknotification)){
        foreach ($chknotification as $uvalue) {
            $count .= $uvalue->friend_request;
        } 
    }
    
    echo $count;
    exit();
}
else {
    echo 0;
}
?>
