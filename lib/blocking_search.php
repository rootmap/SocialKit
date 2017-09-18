<?php

include('../class/auth.php');
extract($_POST);
if($st == 0)
    {
    echo 'ha ha';
    }
elseif ($st == 1) {
    $rb = '';
    $rbloop = 1;
    $sqlrb = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	rb.status AS rb_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_restricted_list as rb on rb.restricted_list__id=a.id
	WHERE a.name like '%" . $search_rb_data . "%' OR a.email like '%" . $search_rb_data . "%' OR a.phone_number like '%" . $search_rb_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqlrb)) {
        foreach ($sqlrb as $rowrb):

            $rbbtn = '';
            if ($rowrb->rb_status == 0) {
                $rbbtn = '<button onclick="ResUserAdd(' . $rowrb->id . ',' . $rowrb->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowrb->rb_status == 1) {
                $rbbtn = '<button onclick="ResUserRemove(' . $rowrb->id . ',' . $rowrb->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


            $rb .='<div id="rb_con_lst_' . $rowrb->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowrb->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowrb->id . '">
                                    ' . $rowrb->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowrb->city_id . '&nbsp,&nbsp ' . $rowrb->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $rbbtn . '
							</div>
                        </div>
                    
                </div>';
            $rbloop++;
            if ($rbloop == 4) {
                break;
            }
        endforeach;
    } else {
        $rb .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_rb_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray4 = array("datarb" => $rb, "status" => 1);
    echo json_encode($makearray4);
} 
elseif ($st == 2) {
    $dubl = '';
    $dublloop = 1;
    $sqldubl = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dubl.status AS dubl_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_users_block_list as dubl on dubl.user_block_list_id=a.id
	WHERE a.name like '%" . $search_dubl_data . "%' OR a.email like '%" . $search_dubl_data . "%' OR a.phone_number like '%" . $search_dubl_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldubl)) {
        foreach ($sqldubl as $rowdubl):

            $dublbtn = '';
            if ($rowdubl->dubl_status == 0) {
                $dublbtn = '<button onclick="BlockUserAdd(' . $rowdubl->id . ',' . $rowdubl->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdubl->dubl_status == 1) {
                $dublbtn = '<button onclick="BlockUserRemove(' . $rowdubl->id . ',' . $rowdubl->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


            $dubl .='<div id="user_block_lst_' . $rowdubl->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdubl->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdubl->id . '">
                                    ' . $rowdubl->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdubl->city_id . '&nbsp,&nbsp ' . $rowdubl->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dublbtn . '
							</div>
                        </div>
                    
                </div>';
            $dublloop++;
            if ($dublloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dubl .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_dubl_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray5 = array("datadubl" => $dubl, "status" => 1);
    echo json_encode($makearray5);
}

elseif ($st == 3) {
    $dumbl = '';
    $dumblloop = 1;
    $sqldumbl = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dumbl.status AS dumbl_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_users_message_block_list as dumbl on dumbl.user_message_block_list_id=a.id
	WHERE a.name like '%" . $search_dumbl_data . "%' OR a.email like '%" . $search_dumbl_data . "%' OR a.phone_number like '%" . $search_dumbl_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldumbl)) {
        foreach ($sqldumbl as $rowdumbl):

            $dumblbtn = '';
            if ($rowdumbl->dumbl_status == 0) {
                $dumblbtn = '<button onclick="BlockMassegeAdd(' . $rowdumbl->id . ',' . $rowdumbl->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdumbl->dumbl_status == 1) {
                $dumblbtn = '<button onclick="BlockMassegeRemove(' . $rowdumbl->id . ',' . $rowdumbl->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


            $dumbl .='<div id="user_message_block_lst_' . $rowdumbl->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdumbl->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdumbl->id . '">
                                    ' . $rowdumbl->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdumbl->city_id . '&nbsp,&nbsp ' . $rowdumbl->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dumblbtn . '
							</div>
                        </div>
                    
                </div>';
            $dumblloop++;
            if ($dumblloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dumbl .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_dumbl_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray6 = array("datadumbl" => $dumbl, "status" => 1);
    echo json_encode($makearray6);
}

elseif ($st == 4) {
    $dbail = '';
    $dbailloop = 1;
    $sqldbail = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dbail.status AS dbail_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_block_app_invites_list as dbail on dbail.app_invites_block_list=a.id
	WHERE a.name like '%".$search_dbail_data."%' OR a.email like '%".$search_dbail_data."%' OR a.phone_number like '%".$search_dbail_data."%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldbail)) {
        foreach ($sqldbail as $rowdbail):

            $dbailbtn = '';
            if ($rowdbail->dbail_status == 0) {
                $dbailbtn = '<button onclick="AppEventBlockAdd(' . $rowdbail->id . ',' . $rowdbail->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdbail->dbail_status == 1) {
                $dbailbtn = '<button onclick="AppEventBlockRemove(' . $rowdbail->id . ',' . $rowdbail->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


           $dbail .='<div id="app_event_block_lst_' . $rowdbail->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdbail->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdbail->id . '">
                                    ' . $rowdbail->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdbail->city_id . '&nbsp,&nbsp ' . $rowdbail->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dbailbtn . '
							</div>
                        </div>
                    
                </div>';
            $dbailloop++;
            if ($dbailloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dbail .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_dbail_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray7 = array("datadbail" => $dbail, "status" => 1);
    echo json_encode($makearray7);
}

elseif ($st == 5) {
    $deibl = '';
    $deiblloop = 1;
    $sqldeibl = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	deibl.status AS deibl_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_event_invite_block_list as deibl on deibl.event_block_list_id=a.id
	WHERE a.name like '%".$search_deibl_data."%' OR a.email like '%".$search_deibl_data."%' OR a.phone_number like '%".$search_deibl_data."%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldeibl)) {
        foreach ($sqldeibl as $rowdeibl):

            $deiblbtn = '';
            if ($rowdeibl->deibl_status == 0) {
                $deiblbtn = '<button onclick="EventBlockAdd(' . $rowdeibl->id . ',' . $rowdeibl->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdeibl->deibl_status == 1) {
                $deiblbtn = '<button onclick="EventBlockRemove(' . $rowdeibl->id . ',' . $rowdeibl->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


           $deibl .='<div id="event_block_lst_' . $rowdeibl->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdeibl->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdeibl->id . '">
                                    ' . $rowdeibl->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdeibl->city_id . '&nbsp,&nbsp ' . $rowdeibl->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $deiblbtn . '
							</div>
                        </div>
                    
                </div>';
            $deiblloop++;
            if ($deiblloop == 4) {
                break;
            }
        endforeach;
    } else {
        $deibl .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_deibl_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray8 = array("datadeibl" => $deibl, "status" => 1);
    echo json_encode($makearray8);
}

elseif ($st == 6) {
    $dbal = '';
    $dballoop = 1;
    $sqldbal = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dbal.status AS dbal_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostumas_blocked_app_list as dbal on dbal.blocked_app_id=a.id
	WHERE a.name like '%".$search_dbal_data."%' OR a.email like '%".$search_dbal_data."%' OR a.phone_number like '%".$search_dbal_data."%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldbal)) {
        foreach ($sqldbal as $rowdbal):

            $dbalbtn = '';
            if ($rowdbal->dbal_status == 0) {
                $dbalbtn = '<button onclick="AppBlockAdd(' . $rowdbal->id . ',' . $rowdbal->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdbal->dbal_status == 1) {
                $dbalbtn = '<button onclick="AppBlockRemove(' . $rowdbal->id . ',' . $rowdbal->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


           $dbal .='<div id="app_block_lst_' . $rowdbal->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdbal->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdbal->id . '">
                                    ' . $rowdbal->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdbal->city_id . '&nbsp,&nbsp ' . $rowdbal->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dbalbtn . '
							</div>
                        </div>
                    
                </div>';
            $dballoop++;
            if ($dballoop == 4) {
                break;
            }
        endforeach;
    } else {
        $dbal .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_dbal_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray9 = array("datadbal" => $dbal, "status" => 1);
    echo json_encode($makearray9);
}

elseif ($st == 7) {
    $dbpl = '';
    $dbplloop = 1;
    $sqldbpl = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dbpl.status AS dbpl_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostumas_blocked_page_list as dbpl on dbpl.blocked_page_id=a.id
	WHERE a.name like '%".$search_dbpl_data."%' OR a.email like '%".$search_dbpl_data."%' OR a.phone_number like '%".$search_dbpl_data."%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldbpl)) {
        foreach ($sqldbpl as $rowdbpl):

            $dbplbtn = '';
            if ($rowdbpl->dbpl_status == 0) {
                $dbplbtn = '<button onclick="PageBlockAdd(' . $rowdbpl->id . ',' . $rowdbpl->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdbpl->dbpl_status == 1) {
                $dbplbtn = '<button onclick="PageBlockRemove(' . $rowdbpl->id . ',' . $rowdbpl->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


           $dbpl .='<div id="page_block_lst_' . $rowdbpl->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdbpl->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdbpl->id . '">
                                    ' . $rowdbpl->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdbpl->city_id . '&nbsp,&nbsp ' . $rowdbpl->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dbplbtn . '
							</div>
                        </div>
                    
                </div>';
            $dbplloop++;
            if ($dbplloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dbpl .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_dbpl_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray10 = array("datadbpl" => $dbpl, "status" => 1);
    echo json_encode($makearray10);
}
else {
    echo 0;
}
?>	