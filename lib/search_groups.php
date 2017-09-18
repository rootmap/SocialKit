<?php

include('../class/auth.php');
extract($_POST);
if ($st == 1) {
    $dd = '';
    $dloop = 1;
    //$search_gr_data;
    $sql2 = $obj->FlyQuery("SELECT alldata.* FROM 
    (SELECT
	dg.id,
    dg.name,
    dg.group_id,
    dgi.class 
    FROM dostums_group as dg 
    Left JOIN dostums_group_icon as dgi on dg.icon_id = dgi.id 
    ORDER BY dg.group_id DESC) as alldata WHERE alldata.name LIKE '%".$search_gr_data."%'");
    if (!empty($sql2)) {
        foreach ($sql2 as $rows):
			$sqlquerydgms=$obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,group_id FROM dostums_group_members WHERE group_id='".$rows->group_id."' AND user_id='".$user_id."'");
			
								 if(!empty($sqlquerydgms))
								 {
								 $dgmstatus=$sqlquerydgms[0]->status;
								 }
								 else
								 {
									$dgmstatus=0; 
								 }
			$grpjbtn='';
			if($dgmstatus==1){
				$grpjbtn='<span onclick="GroupJoinFromProfile('.$rows->group_id.','.$rows->id.')" class="btn btn-sm btn-success"><i class="fa fa-user-times"></i> Leave</span>';
				}elseif($dgmstatus==2){
				$grpjbtn='<span onclick="GroupJoinFromProfile('.$rows->group_id.','.$rows->id.')" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i> Accept</span>';
				}elseif($dgmstatus==3){
				$grpjbtn='<span onclick="GroupJoinFromProfile('.$rows->group_id.','.$rows->id.')" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i> Request Sent</span>';
				}elseif($dgmstatus==0){
				$grpjbtn='<span onclick="GroupJoinFromProfile('.$rows->group_id.','.$rows->id.')" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Join</span>';
				}
			

            $dd .='<div class="list-group-item" id="listgjd_'.$rows->id.'">
					<a href="group.php?group_id='. $rows->group_id .'">
					<span style="color:#2C99CE; margin-right:15px; font-size:24px;" class="'. $rows->class .'">
					</span><span style="font-size:14px;">' . $rows->name . '</span></a>
					<small class="pull-right ">
						'.$grpjbtn.'
					</small>
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
						Sorry! nothing found for</span> &nbsp; "' . $search_gr_data . '"
					</div>
					<div class="col-sm-3 text-left">
						<img class="" src="./images/spinner/search-failed4.png" style=""/>
					</div>
				</div>';
    }
    $makearray = array("data" => $dd, "status" => 1);
    echo json_encode($makearray);
} 
elseif ($st == 2) {
    $dd = '';
    $sql2 = $obj->FlyQuery("SELECT alldata.* FROM 
								(SELECT 
								 du.id,
								 du.id as user_id,
								 concat(du.first_name,' ',du.last_name) as name,
								 IFNULL(dp.photo,'generic-man-profile.jpg') AS photo,
								 IFNULL(dgm.status,'0') AS `status`
								 FROM dostums_user as du
								LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=du.id
								LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
								LEFT JOIN dostums_group_members as dgm ON dgm.user_id=du.id AND dgm.group_id='".$group_id."'  
								GROUP BY du.id 
								) 
							as alldata WHERE alldata.status!='1' AND alldata.name like '%".$search_grp_members_data."%'");
    if (!empty($sql2)) {
        foreach ($sql2 as $rows):
		
			$sbtn = '';
            if ($rows->status==0) {
                $sbtn = '<span id="invite_member_'.$rows->user_id.'" onClick="grpinvite('.$rows->user_id.')" class="btn btn-sm btn-danger"><i class="fa fa-user-plus"></i> Invite</span>';
            } elseif ($rows->status==2) {
                $sbtn = '<span id="invite_member_'.$rows->user_id.'" onClick="grpinvite('.$rows->user_id.')" class="btn btn-sm btn-danger"><i class="fa fa-user-times"></i> Invited</span>';
            }

            $dd .='<div class="list-group-item">
                        <div class="media">
                            <a href="./profile.php?user_id='.$rows->user_id.'" class="pull-left">
                                <img class="media-object img-circle thumb48" alt="Image"
                                     src="./profile/'.$rows->photo.'">
                            </a>
                            <div class="media-body clearfix">
									<small class="pull-right ">
										'.$sbtn.'
									</small>
                                <strong class="media-heading text-primary">
                                    <span class="circle circle-success circle-lg text-left"></span>
									<a href="./profile.php?user_id='.$rows->user_id.'" class="text-primary">
                                    	'.$rows->name.'
									</a>
                                </strong>
                            </div>
                        </div>
                    </div>';
            
        endforeach;
    } else {
        $dd .='<div class="list-group-item">
					<div class="col-sm-9 text-center text-info" style="overflow: hidden; margin-top:10px;">
						<span class="text-warning" style=" font-weight:400; font-size:16px;">
						Sorry! nothing found for</span> &nbsp; "' . $search_grp_members_data . '"
					</div>
					<div class="col-sm-3 text-left">
						<img class="" src="./images/spinner/search-failed4.png" style=""/>
					</div>
				</div>';
    }
    $makearray = array("datas" => $dd, "status" => 1);
    echo json_encode($makearray);
}
else 
{
    echo 0;
}
?>	