<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1) {
    $dlc = '';
    $dlcloop = 1;
    $sqldlc = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
        cdfu.status as ustatus,
	cdf.status as frnd_status,
	dlc.status AS lc_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_legacy_contact as dlc on dlc.legacy_contact_id=a.id
	WHERE a.name like '%" . $search_lc_data . "%' OR a.email like '%" . $search_lc_data . "%' OR a.phone_number like '%" . $search_lc_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqldlc)) {
        foreach ($sqldlc as $rowdlc):

            $dlcbtn = '';
            if ($rowdlc->lc_status == 0) {
                $dlcbtn = '<button onclick="LegConAdd(' . $rowdlc->id . ',' . $rowdlc->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
            } elseif ($rowdlc->lc_status == 1) {
                $dlcbtn = '<button onclick="LegConRemove(' . $rowdlc->id . ',' . $rowdlc->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
            }


            $dlc .='<div id="leg_con_lst_' . $rowdlc->id . '" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowdlc->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowdlc->id . '">
                                    ' . $rowdlc->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowdlc->city_id . '&nbsp,&nbsp ' . $rowdlc->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $dlcbtn . '
							</div>
                        </div>
                    
                </div>';
            $dlcloop++;
            if ($dlcloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dlc .='<div>
                            <a id="load-spin" href="#">
                                    <div class="row">
                                            <div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found for</span> &nbsp; "' . $search_lc_data . '"
                                            </div>
                                    </div>
                            </a>
                    </div>';
    }
    $makearray3 = array("datadlc" => $dlc, "status" => 1);
    echo json_encode($makearray3);
} else {
    echo 0;
}
?>	