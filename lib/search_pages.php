<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1) {
    $dd = '';
    $dloop = 1;
    //$search_pg_data;
    $sql2 = $obj->FlyQuery("SELECT alldata.* FROM (SELECT 
    df.id,
    df.user_id,
    df.page_id,
    df.name,
    dpp.photo_id, 
    IFNULL(dp.photo,'page_default.png') AS `photo` 
    FROM dostums_fanpage as df 
    Left JOIN dostums_page_profile_photo as dpp on df.page_id = dpp.page_id 
    LEFT JOIN dostums_photo as dp on dpp.photo_id = dp.id
     ORDER BY df.page_id DESC) as alldata WHERE alldata.name LIKE '%".$search_pg_data."%'");
    if (!empty($sql2)) {
        foreach ($sql2 as $rows):
			$sqlquerypp=$obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,page_id FROM dostums_page_likes WHERE page_id='".$rows->page_id."' AND user_id='".$user_id."'");
				 if(!empty($sqlquerypp))
					{
					$dplstatus=$sqlquerypp[0]->status;
					}
					else
					{
					$dplstatus=0;
					}
			$dplubtn='';
		
			
			if($dplstatus==1){
			
				$dplubtn='<small onclick="PageLikeFromProfile('.$rows->page_id.','.$rows->id.')" class="pull-right "><span class="btn btn-sm btn-success"><i
						class="fa fa-thumbs-up"></i> Unlike </span></small>';
		   
			}elseif($dplstatus==2){
			
				$dplubtn='<small onclick="PageLikeFromProfile('.$rows->page_id.','.$rows->id.')" class="pull-right "><span class="btn btn-sm btn-success"><i
						class="fa fa-thumbs-up"></i> Confirm Like </span></small>';
			
			}elseif($dplstatus==0){
			
				$dplubtn='<small onclick="PageLikeFromProfile('.$rows->page_id.','.$rows->id.')" class="pull-right "><span class="btn btn-sm btn-success"><i
						class="fa fa-thumbs-up"></i> like </span></small>';
			
			}

            $dd .='<div class="list-group-item" id="listpld_'.$rows->id.'">
						<div class="media">
							<a href="page.php?page_id='. $rows->page_id .'" class="pull-left">
								<img class="media-object  thumb48" alt="d" src="./profile/'.$rows->photo.'" style="height:48px; width:48px;">
							</a>
							<div class="media-body clearfix">
								<a href="page.php?page_id='. $rows->page_id .'" class="media-heading text-primary">
									<span class="circle circle-success circle-lg text-left"></span>
									<strong>' . $rows->name . '</strong>
								</a>
							'.$dplubtn.'
							</div>
						</div>
					</div>';
            $dloop++;
            if ($dloop == 4) {
                break;
            }
        endforeach;
    } else {
        $dd .='<div class="list-group-item">
					<div class="col-sm-9 text-center text-info" style="overflow: hidden; margin-top:10px;">
						<span class="text-warning" style=" font-weight:400; font-size:16px;">
						Sorry! nothing found for</span> &nbsp; "' . $search_pg_data . '"
					</div>
					<div class="col-sm-3 text-left">
						<img class="" src="./images/spinner/search-failed4.png" style=""/>
					</div>
				</div>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
}
elseif($st==2){ 

	$dd = '';
    $dloop = 1;
    $sql2 = $obj->FlyQuery("SELECT 
	du.id as user_id,
	du.name,
	du.date,
	IFNULL(dp.photo,'generic-man-profile.jpg') AS photo
	FROM dostums_user_view as du
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=du.id
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
	WHERE du.name like '%".$search_pgf_data."%' GROUP BY du.id");
	
    if ($sql2!=0){ 
        foreach ($sql2 as $rows):

            $pgflbtn='';
			 $sqlquerypp=$obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,page_id FROM dostums_page_likes WHERE page_id='".$page_id."' AND user_id='".$rows->user_id."'");
			 /*$dplstatus=$sqlquerypp[0]->status;*/
			 if(!empty($sqlquerypp))
					{
					$dplstatus=$sqlquerypp[0]->status;
					}
					else
					{
					$dplstatus=0;
					}
		
			 if($dplstatus==0)
			 {
				 $pgflbtn .='<span  onClick="PageInvite('.$rows->user_id.')" class="btn btn-sm btn-danger">
				 <i class="fa fa-user-plus"></i> Invite </span>';
			 }
			 elseif($dplstatus==2)
			 {
				 $pgflbtn .='<span  onClick="PageInvite('.$rows->user_id.')"  class="btn btn-sm btn-danger"><i
					class="fa fa-user-plus"></i> Invited </span>';
			 }
			 


			$dd .='<div id="listplui_'.$rows->user_id.'" class="list-group-item">
				<div class="media">
					<a href="./profile.php?user_id='.$rows->user_id.'" class="pull-left">
						<img class="media-object img-circle thumb48" alt="Image"
							 src="./profile/'.$rows->photo.'">
					</a>
					<div class="media-body clearfix">
						<small class="pull-right ">
							'.$pgflbtn.'
						</small>
						<a href="./profile.php?user_id='.$rows->user_id.'" class="media-heading">
							<span class="circle circle-success circle-lg text-left"></span>
							<strong class="text-primary">'.$rows->name.'</strong>
						</a>
			
						<p class="mb-sm">
							<small>'.$rows->date.'</small>
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
        $dd .='<div class="list-group-item">
					<div class="col-sm-9 text-center text-info" style="overflow: hidden; margin-top:10px;">
						<span class="text-warning" style=" font-weight:400; font-size:16px;">
						Sorry! nothing found for</span> &nbsp; "' . $search_pgf_data . '"
					</div>
					<div class="col-sm-3 text-left">
						<img class="" src="./images/spinner/search-failed4.png" style=""/>
					</div>
				</div>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
}else {
    echo 0;
}
?>	