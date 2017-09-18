<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1) {
    $fl = '';
    $dloop = 1;
    $sql2 = $obj->FlyQuery("SELECT ud.* FROM (SELECT a.id, a.name, 
			IFNULL(dp.photo,'generic-man-profile.jpg') AS photo, 
			IFNULL(a.city_id,'none') as city_id, 
			a.country_id, IFNULL(dc.country_name,'none') as country_name,
            IFNULL(dua.about_short,'none') as about_short,
			cdfu.status as ustatus,
			cdf.status as frnd_status from `dostums_user_view` as a 
			left JOIN dostums_country as dc ON dc.id=a.`country_id`
            left JOIN dostums_profile_photo as pf ON pf.user_id=a.id AND pf.status='2' 
			left JOIN dostums_photo as dp ON dp.id=pf.photo_id 
			LEFT JOIN dostums_friend as cdfu ON cdfu.uid='13' AND cdfu.to_uid=a.id 
			LEFT JOIN dostums_friend as cdf ON cdf.to_uid='13' AND cdf.uid=a.id 
            LEFT JOIN dostums_user_about as dua on dua.user_id=a.id WHERE a.name like '%" . $search_frl_data . "%' OR a.email like '%" . $search_frl_data . "%' OR a.phone_number like '%" . $search_frl_data . "%' GROUP BY a.id) as ud WHERE ud.id!='" . $input_by . "'");
    if (!empty($sql2)) {
        foreach ($sql2 as $rows):

            $fl .='<div class="list-group-item friend-list-item col-md-6" style="background-color:#B3E5FC; width:48%; margin:1%;"><!--width:48%; margin-right:1%;-->
					<div class="media clearfix">
						<div class="pull-left">
							<img class="media-object thumb48 img-thumbnail" alt="Image"
								 src="./profile/'.$rows->photo.'">
						</div>
						<div class="media-body clearfix">
								<div class="pull-right"><div class="dropdown">
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
							 </div>
				
				
				
				
							<a class="link" href="profile.php?user_id='.$rows->id.'">
								<strong class="media-heading text-primary">
									'.$rows->name.'
								</strong>
							</a>
				
							<div class="frined-info">
				
								<p class="mb-sm"  data-placement="bottom" data-toggle="tooltip" data-original-title="Mutual friends include Rj Naim  and 34 more...">
									<small>53 mutual friends</small>
								</p>
								<p><br></p>
								<p>About&nbsp;:  <a class="link" href="">'.$rows->about_short.'</a></p>
								<p>Lives in&nbsp;:   <a class="link" href=""><i class="fa fa-map-marker">&nbsp;</i>'.$rows->city_id.', '.$rows->country_name.'</a></p>
							</div>
				
						</div>
					</div>
				</div>';
            $dloop++;
            if ($dloop == 8) {
                break;
            }
        endforeach;
    } else {
        $fl .='<div class="list-group-item">
					<div class="col-sm-9 text-center text-info" style="overflow: hidden; margin-top:10px;">
						<span class="text-warning" style=" font-weight:400; font-size:16px;">
						Sorry! nothing found for</span> &nbsp; "' . $search_frl_data . '"
					</div>
					<div class="col-sm-3 text-left">
						<img class="" src="./images/spinner/search-failed4.png" style=""/>
					</div>
				</div>';
    }
    $makearray = array("sitedata" => $fl, "status" => 1);
    echo json_encode($makearray);
} else {
    echo 0;
}
?>


<!-- START list group item-->

<!-- END list group item-->