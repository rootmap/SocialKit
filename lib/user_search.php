<?php
include('../class/auth.php');
extract($_POST);
$donation_id=$obj->GenerateUniqueTransaction(@$_SESSION['SESS_DONATION'],"DONATION",0);
if ($st == 0) {
    echo 'ha ha';
} elseif ($st == 2) {
    

    $dubl = '<script type="text/javascript">function DonateMultiUserAdd(donation_id, user_id)
        {
            $.post("./lib/user_search.php",{"st":3,"donation_id":donation_id,"user_id":user_id},function(data){
               $("#user_block_lst_"+user_id).html("Added In Donation List");
               $("#user_block_lst_"+user_id).css("color","#09f");
               $("#user_block_lst_"+user_id).css("font-size","24px");
               $("#user_block_lst_"+user_id).css("text-align","center");
               $.post("./lib/user_search.php",{"st":5},function(datas){
                    $("#donatemu").show();
                    var datacldubl = jQuery.parseJSON(datas);
                    var optdubl = datacldubl.datadubl;
                    $("#donatemu").html(optdubl);
                    $.ajaxSetup({cache: false});
               });
               setTimeout(function(){
                    $("#user_block_lst_"+user_id).hide("slow");
               },1500);
               
            });
            //alert(donation_id);
        }</script>';
    $dublloop = 1;
    $sqlqst = "SELECT S.* FROM (SELECT 
a.id,
a.name, 
IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
IFNULL(dcv.country_name,'none')as country_name,
IFNULL(a.city_id,'none') as city_id, 
IFNULL(a.country_id,'0') as country_id 
from 
`dostums_user_view` as a 

LEFT JOIN dostums_profile_photo as dpp on dpp.user_id = a.id
LEFT JOIN dostums_photo as dp on dp.id = dpp.photo_id
LEFT JOIN dostums_country_view as dcv on dcv.id = a.country_id


GROUP BY a.id) AS S WHERE name like '%" . $search_dubl_data . "%' OR country_name like '%" . $search_dubl_data . "%' OR city_id like '%" . $search_dubl_data . "%'";
    //exit();
    $sqldubl = $obj->FlyQuery($sqlqst);
    if (!empty($sqldubl)) {
        foreach ($sqldubl as $rowdubl):

            $dublbtn = '';
            //if ($rowdubl->dubl_status == 0) {
            $dublbtn = '<button onclick="DonateMultiUserAdd(&#39;' . $donation_id . '&#39;,&#39;' . $rowdubl->id . '&#39;)" type="button" class="btn btn-info btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-user-plus margin-right10">&nbsp;</span>Add</button>';
//            } elseif ($rowdubl->dubl_status == 1) {
//                $dublbtn = '<button onclick="BlockUserRemove(' . $rowdubl->id . ',' . $rowdubl->id . ')" type="button" class="btn btn-primary btn-xs text-center add-f-btn" style="color: #fff !important;"><span class="fa fa-times margin-right10">&nbsp;</span>Remove</button>';
//            }


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
} elseif ($st == 3) {
    
   $obj->insert("dostums_donate_multiple_person",array("user_id"=>$user_id,"donation_id"=>$donation_id,"date"=>date('Y-m-d'),"status"=>0));	
} elseif ($st == 4) {
    
   $obj->delete("dostums_donate_multiple_person",array("user_id"=>$user_id,"donation_id"=>$donation_id));
} elseif ($st == 5) {
    
   $sqldonateuser = $obj->FlyQuery("SELECT a.id,a.user_id,u.name,a.donation_id FROM `dostums_donate_multiple_person` as a 
                            LEFT JOIN (SELECT id,name FROM dostums_user_view) as u on u.id=a.user_id
                            WHERE a.`donation_id`='".$donation_id."'");
   $dst=''; 
   if (!empty($sqldonateuser)) {
       
        
            foreach ($sqldonateuser as $user):
            $dst .='<label id="dmud_'.$user->id.'" style="border: 1px #CCC solid; margin: 3px; padding: 3px 15px 3px 3px; border-radius:2px;"> '.$user->name.'<i class="fa fa-close" onclick="DonateMultiUserDelete(&#39;'.$user->donation_id.'&#39;,&#39;'.$user->user_id.'&#39;,&#39;'.$user->id.'&#39;)" style="position: absolute; cursor: pointer; margin-top: -3px; margin-left:3px; color: #F00;"></i></label>';
            endforeach;
            
            
        
     }
     
     $makearray5 = array("datadubl" => $dst, "status" => 1);
     echo json_encode($makearray5);
}
?>	