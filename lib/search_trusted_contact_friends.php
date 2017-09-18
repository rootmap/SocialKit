<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1)
    {
    $fs = '';
	$fsloop=1;
    $sqlfs = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
	IFNULL(a.city_id,'none') as city_id, 
	a.country_id, IFNULL(dc.country_name,'none') as country_name,
	cdfu.status as ustatus,
	cdf.status as frnd_status,
	dtc.status AS tc_status
	from `dostums_user_view` as a 
	left JOIN dostums_country as dc ON dc.id=a.`country_id` 
	left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
	left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
	LEFT JOIN dostums_friend as cdfu ON cdfu.uid='" . $input_by . "' AND cdfu.to_uid=a.id 
	LEFT JOIN dostums_friend as cdf ON cdf.to_uid='" . $input_by . "' AND cdf.uid=a.id
	LEFT JOIN dostums_trusted_contact as dtc on dtc.trusted_contact_id=a.id
	WHERE a.name like '%" . $search_tc_data . "%' OR a.email like '%" . $search_tc_data . "%' OR a.phone_number like '%" . $search_tc_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sqlfs))
    {
        foreach ($sqlfs as $rowfs):
		
			$fsbtn='';
                if ($rowfs->tc_status==0)
                {
                    $fsbtn='<button onclick="TrstConAdd(' . $rowfs->id . ',' . $rowfs->id . ')" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';  
                } 
                elseif ($rowfs->tc_status==1)
                {
                    $fsbtn='<button onclick="TrstConRemove(' . $rowfs->id . ',' . $rowfs->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
                } 
				 
						
			$fs .='<div id="trst_con_lst_'.$rowfs->id.'" class="friends" style="border:1px dashed #ccc;">
                    
                            <div class="row">
                            <div class="col-sm-3">
                                    <img class="img-circle img-thumbnail" src="profile/' . $rowfs->photo . '" style="height:50px !important; width:50px !important;"/>
                            </div>
                            <div class="col-sm-5" style="padding-left:0px !important; margin-top:5px !important;">
                            <a href="profile.php?user_id=' . $rowfs->id . '">
                                    ' . $rowfs->name . '</a><br><small><i class="fa fa-map-marker margin-right10"></i>' . $rowfs->city_id . '&nbsp,&nbsp ' . $rowfs->country_name . '</small>
                            </div>
                            <div class="col-sm-4 text-left" style="padding-left:0px !important; margin-top:5px !important;">
								' . $fsbtn . '
							</div>
                        </div>
                    
                </div>';
				$fsloop++;
				if($fsloop==4)
				{
					break;	
				}
        endforeach;
    }
	else
	{
		$fs .='<div>
					<a id="load-spin" href="#">
						<div class="row">
							<div class="col-sm-12 text-info" style="overflow: hidden; margin-top:10px;">
								<span class="text-warning" style=" font-weight:400; font-size:16px;">
								Sorry! nothing found for</span> &nbsp; "'. $search_tc_data .'"
							</div>
						</div>
					</a>
				</div>';
	}
    $makearray2 = array("data" => $fs, "status" => 1);
    echo json_encode($makearray2);
}
else
{
    echo 0;
}
?>	