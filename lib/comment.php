<?php  
include('../class/auth.php');
include('../class/extraClass.php');
$extra=new SiteExtra();
extract($_POST);
if($st==1)
{
	$post_comment=$obj->SelectAllByVal("dostums_post_view","id",$post_id,"comment");
	if($post_comment>3)
	{
		$commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$post_id),"3");
	}
	else
	{
		$commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$post_id),"100");
		//$commentsql=$obj->FlyQueryWithCond("select id,user_id,post_id,comment,post_time from (SELECT * FROM dostums_comment_view  WHERE id=? ORDER by id DESC LIMIT 3) dostums_comment_view ORDER BY id ASC",array($post_id));
	}
	 
	if(!empty($commentsql))
	foreach($commentsql as $data_comment):
		include('../plugin/status/onlycomment.php');
	endforeach; 
}
elseif($st==2)
{
	$post_comment=$obj->SelectAllByVal("dostums_post_view","id",$post_id,"comment");
	$commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$post_id),"0");
	 
	if(!empty($commentsql))
	foreach($commentsql as $data_comment):
		include('../plugin/status/onlycomment.php');
	endforeach; 
}
elseif($st==3)
{
	$post_comments=$obj->SelectAllByVal("dostums_post_view","id",$post_id,"comment");
	$post_likess=$obj->SelectAllByVal("dostums_post_view","id",$post_id,"likes");
	
	if($post_comments!=0)
	{
		$post_comment=$post_comments;	
	}
	else
	{
		$post_comment=0;
	}
	
	if($post_likess!=0)
	{
		$post_likes=$post_likess;	
	}
	else
	{
		$post_likes=0;
	}
	
	
	$array=array("likes"=>$post_likes,"comment"=>$post_comment);
	
	echo json_encode($array);
		
}
else
{
	echo 0;	
}
?>








