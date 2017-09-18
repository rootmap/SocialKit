<?php
include('../class/auth.php');
extract($_POST);
if($st==1)
{

	$sqlpost=$obj->FlyQuery("select
        dp.user_id,
	dp.page_id,
        dp.group_id,
        concat(du.first_name,' ',du.last_name) as name,
        dp.to_user_id,
        concat(dut.first_name,' ',dut.last_name) as to_name,
        IFNULL(dpho.photo,'generic-man-profile.jpg') as photo,
        IFNULL(dpho.photo2,'generic-man-profile.jpg') as photo2,
        IFNULL(dphot.photo,'generic-man-profile.jpg') as photos,
        IFNULL(dphot.photo2,'generic-man-profile.jpg') as photos2,
	dp.photo_id,
	dt.to_uid AS tid
        from dostums_post as dp
        LEFT JOIN dostums_user as du on du.id=dp.user_id
        LEFT JOIN dostums_user as dut on dut.id=dp.to_user_id
        LEFT JOIN dostums_profile_photo as dppu on dppu.user_id=dp.user_id AND dppu.status='2'
        LEFT JOIN dostums_photo as dpho ON dpho.id=dppu.photo_id
        LEFT JOIN dostums_profile_photo as dpput on dpput.user_id=dp.to_user_id AND dpput.status='2'
        LEFT JOIN dostums_photo as dphot ON dphot.id=dpput.photo_id
				LEFT JOIN dostums_tags as dt ON dt.post_id = '".$post_id."'
        WHERE dp.id='".$post_id."'");

	$uuser_id=$sqlpost[0]->user_id;
	$to_uuser_id=$sqlpost[0]->to_user_id;

	$name=$sqlpost[0]->name;
	$to_name=substr($sqlpost[0]->to_name,0,10)."...";


	$photo=$sqlpost[0]->photo;
	$photo2=$sqlpost[0]->photo2;

	$photos=$sqlpost[0]->photos;
	$photos2=$sqlpost[0]->photos2;



  @$sqltagedname=$obj->FlyQuery("SELECT
															dt.to_uid,
															dt.post_id,
															du.first_name AS fname,
															du.last_name AS lname

															FROM dostums_tags AS dt
															LEFT JOIN dostums_user AS du ON du.id = dt.to_uid
															WHERE dt.post_id = '$post_id' AND dt.status = '1' ");
															// print_r($sqltagedname);
// $firstname = '';
// $lastname = '';
$fullname = '';

if(!empty($sqltagedname)){
   foreach($sqltagedname as $tagvalue) {
		 $firstname = $tagvalue->fname;
		 $lastname = $tagvalue->lname;
		 $fullname .= $firstname.' '.$lastname.',';
	 }
} else{

}

// foreach($sqltagedname as $tagvalue) {
// 	$firstname .= $tagvalue->fname;
// 	$lastname .= $tagvalue->lname;
// // 	$fullname .= $firstname.' '.$lastname.',';
// // 	// $fullname .= $firstname.' '.$lastname.','.;
// }


// echo json_encode(array("user_id"=>$uuser_id,"name"=>$name,"to_user_id"=>$to_uuser_id,"to_name"=>$to_name,"thumb"=>$photo,"thumbbig"=>$photo2,"thumb2"=>$photos,"thumbbig2"=>$photos2));

if(!empty($fullname)){
	// echo json_encode(array("user_id"=>$uuser_id,"name"=>$name,"to_user_id"=>$to_uuser_id,"to_name"=>$to_name,"thumb"=>$photo,"thumbbig"=>$photo2,"thumb2"=>$photos,"thumbbig2"=>$photos2));
	echo json_encode(array("tagName"=>$fullname, "user_id"=>$uuser_id,"name"=>$name,"to_user_id"=>$to_uuser_id,"to_name"=>$to_name,"thumb"=>$photo,"thumbbig"=>$photo2,"thumb2"=>$photos,"thumbbig2"=>$photos2));
}else{
	echo json_encode(array("user_id"=>$uuser_id,"name"=>$name,"to_user_id"=>$to_uuser_id,"to_name"=>$to_name,"thumb"=>$photo,"thumbbig"=>$photo2,"thumb2"=>$photos,"thumbbig2"=>$photos2));
}

}
elseif($st==2)
{
	$sqlpostdata=$obj->SelectAllByVal("dostums_post","id",$post_id,"photo_id");
	$photo_thumb=$obj->SelectAllByVal("dostums_photo","id",$sqlpostdata,"photo");
	$photo_thumb_big=$obj->SelectAllByVal("dostums_photo","id",$sqlpostdata,"photo2");
	if($photo_thumb=="")
	{
		$new_photo="generic-man-profile.jpg";
	}
	else
	{
		$new_photo=$photo_thumb;
	}
	echo json_encode(array("thumb"=>$new_photo,"bigphoto"=>$photo_thumb_big));
}
elseif($st==3)
{
	$photo_id=$obj->SelectAllByVal2("dostums_profile_photo","user_id",$usrid,"status",2,"photo_id");
	$photo=$obj->SelectAllByVal("dostums_photo","id",$photo_id,"photo");

	if($photo=="")
	{
		$new_photo="generic-man-profile.jpg";
	}
	else
	{
		$new_photo=$photo;
	}

	echo json_encode(array("thumb"=>$new_photo));
}
elseif($st==4)
{
	include('../class/extraClass.php');
	$extra=new SiteExtra();
	$sqlpostdata=$obj->SelectAllByID_Multiple("dostums_post_view",array("id"=>$image_post));
	$get_photo_id=$sqlpostdata[0]->photo_id;
	$get_post_time=$sqlpostdata[0]->post_time;
	$get_user_id=$sqlpostdata[0]->user_id;
	$get_post_like=$sqlpostdata[0]->likes;
	$get_post=$sqlpostdata[0]->post;
	$get_post_comment=$sqlpostdata[0]->comment;


	$sqlphoto_thumb=$obj->SelectAllByID_Multiple("dostums_photo",array("id"=>$get_photo_id));
	@$photo_thumb=$sqlphoto_thumb[0]->photo;
	@$photo_thumb_big=$sqlphoto_thumb[0]->photo2;

	$userphoto_id=$obj->SelectAllByVal2("dostums_profile_photo","user_id",$get_user_id,"status",2,"photo_id");

	$sqlphoto_thumb2=$obj->SelectAllByID_Multiple("dostums_photo",array("id"=>$userphoto_id));
	$photo_thumb2=$sqlphoto_thumb2[0]->photo;
	$photo_thumb_big2=$sqlphoto_thumb2[0]->photo2;

	$get_user_name=$obj->SelectAllByVal("dostums_user_view","id",$get_user_id,"name");

	 $chkpermission=$obj->SelectAllByID_multiple("dostums_post_permission_record",array("user_id"=>$get_user_id,"post_id"=>$image_post));
	 if(!empty($chkpermission))
	 {
		 if($chkpermission[0]->permission_id==1){ $modal_permission="Public"; }
		 elseif($chkpermission[0]->permission_id==2){ $modal_permission="Friends"; }
		 elseif($chkpermission[0]->permission_id==3){ $modal_permission="Private"; }
		 else{ $modal_permission="Public"; }
     }
	 else
	 {
		$modal_permission="Public";
	 }

	 $posttimestring=$extra->duration($get_post_time,date('Y-m-d H:i:s'));

	echo json_encode(array("thumb"=>$photo_thumb,"bigphoto"=>$photo_thumb_big,"user_id"=>$get_user_id,"user_name"=>$get_user_name,"user_photo"=>$photo_thumb2,"user_bigphoto"=>$photo_thumb_big2,"like"=>$get_post_like,"comment"=>$get_post_comment,"post_content"=>$get_post,"permission"=>$modal_permission,"post_time"=>$posttimestring,"post_id"=>$image_post,"photo_id"=>$get_photo_id));
}
else
{
	echo 2;
}

?>
