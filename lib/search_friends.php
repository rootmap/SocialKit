<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1) {
    $dd = '';
    $sqlns = "(SELECT ud.* FROM (SELECT
            a.id,
            a.name,
            IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
           IFNULL(a.city_id,'none') as city_id,
           a.country_id,
           IFNULL(dc.country_name,'none') as country_name,
           cdfu.status as ustatus,
           cdf.status as frnd_status,
           CONCAT('profile.php?user_id=',a.id) AS link,
           'user_data' as data_from
           from `dostums_user_view` as a
           left JOIN dostums_country as dc ON dc.id=a.`country_id`
           left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
           left JOIN dostums_photo as dp ON dp.id=pf.photo_id
           LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
           LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
           WHERE
           a.name like '%" . $search_data . "%' OR a.email like '%" . $search_data . "%' OR a.phone_number like '%" . $search_data . "%' GROUP BY a.id)
           as ud WHERE ud.id!='" . $input_by . "') UNION (SELECT
           a.group_id as id,
           a.name as name,
           IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
           IFNULL(a.about,'None') as city_id,
           '' AS country_id,
           '' AS country_name,
           '0' as ustatus,
           '0' as frnd_status,
           CONCAT('group.php?group_id=',a.group_id) AS link,
           'group_data' as data_from
           FROM dostums_group as a
           LEFT JOIN dostums_group_profile_photo as dppp ON dppp.group_id=a.group_id
           LEFT JOIN dostums_photo as dp ON dp.id=dppp.photo_id
           WHERE
           a.name like '%" . $search_data . "%' OR a.email like '%" . $search_data . "%' OR a.phone like '%" . $search_data . "%' GROUP BY a.group_id
           ) UNION (SELECT
           a.page_id as id,
           a.name as name,
           IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
           IFNULL(a.about,'None') as city_id,
           '' AS country_id,
           '' AS country_name,
           '0' as ustatus,
           '0' as frnd_status,
           CONCAT('page.php?page_id=',a.page_id) AS link,
           'page_data' as data_from
           FROM dostums_fanpage as a
           LEFT JOIN dostums_page_profile_photo as dppp ON dppp.page_id=a.page_id
           LEFT JOIN dostums_photo as dp ON dp.id=dppp.photo_id
           WHERE
           a.name like '%" . $search_data . "%' OR a.email like '%" . $search_data . "%' OR a.phone like '%" . $search_data . "%' GROUP BY a.page_id)";
    $sql2 = $obj->FlyQuery($sqlns);
    if (!empty($sql2)) {
        $dloop = 1;
        foreach ($sql2 as $rows):

            $sbtn = '';
//            if ($rows->ustatus == 0 && $rows->frnd_status == 0) {
//                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',1)" id="searchfrnd_' . $rows->id . '" href="#" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add Friend</a>';
//            } elseif ($rows->ustatus == 0 && $rows->frnd_status == 1) {
//                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',3)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Request Sent</a>';
//            } elseif ($rows->ustatus == 1 && $rows->frnd_status == 0) {
//                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',2)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Confirm</a>';
//            } elseif ($rows->ustatus == 2 && $rows->frnd_status == 2) {
//                $sbtn = '<a onclick="frndrequest(' . $rows->id . ',3)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-success btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user margin-right10">&nbsp;</span>Friends</a>';
//            }
            //$sbtn = '<a href="'.$rows->link.'" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span> Visit</a>';
            if ($rows->data_from == "user_data") {
                $sbtn = '<small><i class="fa fa-map-marker margin-right10"></i>' . $rows->city_id . '&nbsp,&nbsp ' . $rows->country_name . '</small>';
            } else {
                $sbtn = '<small><i class="fa fa-info-circle margin-right10"></i>' . substr($rows->city_id,0,20) . '</small>';
            }
            $dd .='<li class="friends">
                    <a href="' . $rows->link . '">
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rows->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-9" style="padding-left:0px !important; margin-top:5px !important;">
                                    ' . $rows->name . '<br>
                                    <small><i class="fa fa-map-marker margin-right10"></i>' . $rows->city_id . '&nbsp,&nbsp ' . $rows->country_name . '</small>
                            </div>
                        </div>
                    </a>
                </li>';

            if ($dloop >= 3) {

                $dd .='<li style="padding:0px !important;" id="link_search_result">
					<a id="load-spin" href="./all-frnd-search-results.php?result=' . $search_data . '">
						<div class="row">
							<div class="col-sm-9 text-right text-primary" style="overflow: hidden; margin-top:10px;">
								<span class="text-success" style=" font-weight:400; font-size:16px;">
								View All Results for</span> &nbsp; "' . $search_data . '"
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
        endforeach;
    } else {
        $dd .='<li style="padding:0px !important;">
					<a id="load-spin" href="#">
						<div class="row">
							<div class="col-sm-9 text-right text-info" style="overflow: hidden; margin-top:10px;">
								<span class="text-warning" style=" font-weight:400; font-size:16px;">
								Sorry! nothing found for</span> &nbsp; "' . $search_data . '"
							</div>
							<div class="col-sm-3 text-left">
								<img class="" src="./images/spinner/search-failed4.png" style=""/>
							</div>
						</div>
					</a>
				</li>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
}




elseif ($st == 2) {
    $dd = '';
    $dloop = 1;
    $sql2 = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
			IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
			IFNULL(a.city_id,'none') as city_id,
			a.country_id, IFNULL(dc.country_name,'none') as country_name,
			cdfu.status as ustatus from `dostums_user_view` as a
			left JOIN dostums_country as dc ON dc.id=a.`country_id`
			left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
			left JOIN dostums_photo as dp ON dp.id=pf.photo_id
			LEFT JOIN dostums_group_members as cdfu ON cdfu.user_id=a.id WHERE a.name like '%" . $search_data . "%' OR a.email like '%" . $search_data . "%' OR a.phone_number like '%" . $search_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "' AND ud.id NOT IN (SELECT user_id FROM dostums_group_members WHERE fly_id='" . $unique_id . "')");



    if (!empty($sql2)) {
        foreach ($sql2 as $rows):

            $sbtn = '';


            $sbtn = '<button  onclick="signupaddgroupmem(' . $rows->id . ',1)"  class="pull-right def_button"><span class="btn btn-sm btn-info">
                    <i class="fa fa-user-plus"></i> Add Member</span></button>';


            $dd .='<div class="list-group-item" id="searchgrmem_' . $rows->id . '" ';

            if ($dloop != 3) {
                $dd .='style="margin-bottom:2px; padding-bottom: 2px;border-bottom: 1px #CCC dotted;"';
            } else {
                $dd .='';
            }

            $dd .='>
                                    <div class="media">
                                        <div class="pull-left" id="suggestion_image">
                                            <img class="media-object img-circle thumb48" alt="Loading .." src="profile/' . $rows->photo . '">
                                        </div>
                                        <div class="media-body clearfix">
                                            ' . $sbtn . '
                                            <a class="media-heading text-primary" href="profile.php?user_id=' . $rows->id . '" style="text-transform:capitalize; font-weight:bold;">
                                                ' . $rows->name . '
                                            </a>

                                            <p class="mb-sm">
                                                <small><i class="fa fa-map-marker margin-right10"></i>' . $rows->city_id . '&nbsp,&nbsp ' . $rows->country_name . '</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>';



            $dloop++;
            if ($dloop == 4) {
                break;
            }

        endforeach;
    } else {
        $dd .='<div style="padding:0px !important;">
                        <div class="row">
                            <div class="col-md-9 text-left text-info" style="overflow: hidden; margin-top:10px;">
                                    <span class="text-warning" style="margin-left:60px; font-weight:400; font-size:16px;">
                                    Sorry! nothing found for</span>&nbsp; "' . $search_data . '"
                            </div>
                            <div class="col-md-3 text-center">
                                    <img class="" src="./images/spinner/search-failed4.png" style="margin-right:100px;"/>
                            </div>
                        </div>
                </div>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
} elseif ($st == 3) {
    $dd = '';

    $sql2 = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name,
			IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
			IFNULL(a.city_id,'none') as city_id,
			a.country_id, IFNULL(dc.country_name,'none') as country_name,
			cdfu.status as ustatus,
			cdf.status as frnd_status from `dostums_user_view` as a
			left JOIN dostums_country as dc ON dc.id=a.`country_id`
			left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2'
			left JOIN dostums_photo as dp ON dp.id=pf.photo_id
			LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id
			LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id WHERE a.name like '%" . $search_data . "%' OR a.email like '%" . $search_data . "%' OR a.phone_number like '%" . $search_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");

    $total_record = count($sql2);
    if (!empty($sql2)) {

        foreach ($sql2 as $rows):

            $sbtn = '';
            if ($rows->ustatus == 0 && $rows->frnd_status == 0) {
                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',1)" id="searchfrnd_' . $rows->id . '" href="#" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add Friend</a>';
            } elseif ($rows->ustatus == 0 && $rows->frnd_status == 1) {
                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',3)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Request Sent</a>';
            } elseif ($rows->ustatus == 1 && $rows->frnd_status == 0) {
                $sbtn = '<a onclick="frndsearch(' . $rows->id . ',2)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Confirm</a>';
            } elseif ($rows->ustatus == 2 && $rows->frnd_status == 2) {
                $sbtn = '<a onclick="frndrequest(' . $rows->id . ',3)" id="searchfrnd_' . $rows->id . '"  href="#" class="btn btn-success btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user margin-right10">&nbsp;</span>Friends</a>';
            }

            $dd .='<div class="list-group-item">
                    <a href="profile.php?user_id=' . $rows->id . '">
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rows->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                                    <input type="hidden" value="' . $rows->id . '">
                                    ' . $rows->name . '<br><small><i class="fa fa-map-marker margin-right10"></i>' . $rows->city_id . '&nbsp,&nbsp ' . $rows->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $sbtn . '
							</div>
                        </div>
                    </a>
                </div>';



        endforeach;
    }
    $makearray = array("data" => $dd, "status" => 1, "total_record" => $total_record);
    echo json_encode($makearray);
} elseif ($st == 4) {
    $dd = '';

    $query = "SELECT ss.* FROM (SELECT alldata.* FROM (select a.id,
	a.uid,
	a.status,
	IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
	concat(du.first_name,' ',du.last_name) as name,
    a.date
	FROM
	dostums_friend as a
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.uid AND dpp.status='2' LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	LEFT JOIN dostums_user as du ON du.id=a.uid
	WHERE
	a.to_uid='" . $input_by . "'
	AND a.status='2') as alldata WHERE alldata.uid!='" . $input_by . "') as ss WHERE ss.name like '%" . $search_pfr_data . "%'";
    $sql2 = $obj->FlyQuery($query);

    if (!empty($sql2)) {
        $dloop = 1;
        foreach ($sql2 as $rows):

            /* $dd .='<li class="friends">
              <a href="profile.php?user_id=' . $rows->id . '">
              <div class="row">
              <div class="col-md-4">
              <img class="img-circle img-thumbnail" src="profile/' . $rows->photo . '" style="height:50px !important; width:60px !important;"/>
              </div>
              <div class="col-md-8" style="padding-left:0px !important; margin-top:5px !important;">
              <input type="hidden" value="' . $rows->id . '">
              ' . $rows->name . '<br>
              </div>

              </div>
              </a>
              </li>'; */

            $dd .='<a class="list-group-item" href="profile.php?user_id=' . $rows->id . '">
					<div class="media">
						<div class="pull-left">
							<img class="media-object img-circle thumb48" alt="Image"
								 src="./profile/' . $rows->photo . '">
						</div>
						<div class="media-body clearfix">
							<strong class="media-heading text-primary">
								<span class="circle circle-success circle-lg text-left"></span>
								' . $rows->name . '
							</strong>

							<p class="mb-sm">
								<small>' . $rows->date . '</small>
							</p>
						</div>
					</div>
				</a>';
        endforeach;
    } else {
        $dd .='<a href="#" class="list-group-item" style="padding:0px !important;">
					<div id="load-spin" href="#">
						<div class="row">
							<div class="col-sm-9 text-right text-info" style="overflow: hidden; margin-top:10px;">
								<span class="text-warning" style=" font-weight:400; font-size:16px;">
								Sorry! nothing found for</span> &nbsp; "' . $search_pfr_data . '"
							</div>
							<div class="col-sm-3 text-left">
								<img class="" src="./images/spinner/search-failed4.png" style="margin-top:10px; margin-bottom:10px;"/>
							</div>
						</div>
					</div>
				</a>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
} else {
    echo 0;
}
?>
