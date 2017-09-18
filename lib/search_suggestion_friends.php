<?php

include('../class/auth.php');
extract($_POST);
if ($st == 2)
    {
    $fs = '';
	$fsloop=1;
    $sqlfs = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
			IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
			IFNULL(a.city_id,'none') as city_id, 
			a.country_id, IFNULL(dc.country_name,'none') as country_name,
			cdfu.status as ustatus,
			cdf.status as frnd_status from `dostums_user_view` as a 
			left JOIN dostums_country as dc ON dc.id=a.`country_id` 
			left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
			left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
			LEFT JOIN dostums_friend as cdfu ON cdfu.uid='".$input_by."' AND cdfu.to_uid=a.id 
			LEFT JOIN dostums_friend as cdf ON cdf.to_uid='".$input_by."' AND cdf.uid=a.id WHERE a.name like '%" . $search_fr_data . "%' OR a.email like '%" . $search_fr_data . "%' OR a.phone_number like '%" . $search_fr_data . "%' GROUP BY a.id) as ud WHERE ud.id!='".$input_by."'");
    if (!empty($sqlfs))
    {
        foreach ($sqlfs as $rowfs):
		
			$fsbtn='';
                if ($rowfs->ustatus==0 && $rowfs->frnd_status==0)
                {
                    $fsbtn='<button onclick="frndsearch('.$rowfs->id.',1)" id="searchfrnd_'.$rowfs->id.'" class="btn btn-info btn-xs text-center" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add Friend</button>';  
                } 
                elseif ($rowfs->ustatus==0 && $rowfs->frnd_status==1)
                {
                    $fsbtn='<button onclick="frndsearch('.$rowfs->id.',3)" id="searchfrnd_'.$rowfs->id.'" class="btn btn-primary btn-xs text-center" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Request Sent</button>';
                } 
				elseif ($rowfs->ustatus==1 && $rowfs->frnd_status==0)
                {
                    $fsbtn='<button onclick="frndsearch('.$rowfs->id.',2)" id="searchfrnd_'.$rowfs->id.'" class="btn btn-primary btn-xs text-center" style="color: #fff !important;"><span class="glyphicon glyphicon-refresh margin-right10">&nbsp;</span>Confirm</button>';
                } 
                elseif ($rowfs->ustatus==2 && $rowfs->frnd_status==2) 
                {
                    $fsbtn='<button onclick="frndrequest('.$rowfs->id.',3)" id="searchfrnd_'.$rowfs->id.'" class="btn btn-success btn-xs text-center" style="color: #fff !important;"><span class="fa fa-user margin-right10">&nbsp;</span>Friends</button>';
                } 
						
			$fs .='<div class="list-group-item">
					<div class="media">
						<div class="pull-left">
							<img class="img-circle" alt="" src="profile/'.$rowfs->photo.'" style="height:50px !important; width:50px !important;">
						</div>
						<div class="media-body clearfix">
							<a class="media-heading text-primary" href="profiles.php?user_id='.$rowfs->id.'" style="text-transform:capitalize; font-weight:bold;">
								<span class="circle circle-success circle-lg text-left"></span>
								<input type="hidden" value="' . $rowfs->id . '">
								' . $rowfs->name . '
							</a>
			
							<p class="mb-sm">
								<small><i class="fa fa-map-marker margin-right10"></i>' . $rowfs->city_id . '&nbsp,&nbsp ' . $rowfs->country_name . '</small><br>
								<span style="margin-top:50px;">'.$fsbtn.'</span>
							</p>
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
								Sorry! nothing found for</span> &nbsp; "'. $search_fr_data .'"
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