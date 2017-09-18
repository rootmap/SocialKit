<?php  
include('../class/auth.php');
extract($_POST);
if($st==1)
{
	$post_like=$obj->SelectAllByVal("dostums_post_view","id",$post_id,"likes");
	echo $post_like;
}
elseif($st==2)
{
	
}
elseif($st==3)
{
	
}
else
{
	echo 0;	
}
?>








