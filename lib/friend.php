<?php
include('../class/auth.php');
extract($_POST);

// [This is for send friend request]
if($st==1)
{

	if($requestType == 'insert'){
		$obj->insert("dostums_friend",
		              array("uid"=>$input_by,"to_uid"=>$usrid,"date"=>date('Y-m-d'),"status"=>1));
		echo 1;
	} else{
    $obj->updateUsingMultiple("dostums_friend",array("status"=>1,"date"=>date('Y-m-d')),array("uid"=>$input_by,"to_uid"=>$usrid,"status"=>0));
		echo 1;
	}


}

// [This is for accept friend request]
elseif($st==2)
{
	$obj->updateUsingMultiple("dostums_friend",array("status"=>2,"date"=>date('Y-m-d')),array("to_uid"=>$input_by,"uid"=>$usrid,"status"=>'1'));
	$obj->updateUsingMultiple("dostums_friend",array("status"=>2,"date"=>date('Y-m-d')),array("uid"=>$input_by,"to_uid"=>$usrid,"status"=>'1'));
	echo 1;
}

// [This is for cancel friend request / unfriend]
elseif($st==0)
{
	$obj->updateUsingMultiple("dostums_friend",array("status"=>0,"date"=>date('Y-m-d')),array("to_uid"=>$input_by,"uid"=>$usrid, "status" => '2'));
	$obj->updateUsingMultiple("dostums_friend",array("status"=>0,"date"=>date('Y-m-d')),array("uid"=>$input_by,"to_uid"=>$usrid, "status" => '2'));
	echo 1;
}

elseif($st==4)
{
	$obj->updateUsingMultiple("dostums_friend",array("status"=>0,"date"=>date('Y-m-d')),array("to_uid"=>$input_by,"uid"=>$usrid, "status" => '1'));
	$obj->updateUsingMultiple("dostums_friend",array("status"=>0,"date"=>date('Y-m-d')),array("uid"=>$input_by,"to_uid"=>$usrid, "status" => '1'));
	echo 1;
}
// [This is for re send friend request]
elseif($st==3)
{
	$obj->updateUsingMultiple("dostums_friend",array("status"=>1,"date"=>date('Y-m-d')),array("to_uid"=>$input_by,"uid"=>$usrid));
	$obj->updateUsingMultiple("dostums_friend",array("status"=>1,"date"=>date('Y-m-d')),array("uid"=>$input_by,"to_uid"=>$usrid));
	echo 1;
}


// elseif($st==4)
// {
// 	$frnd1=$obj->SelectAllByVal2("dostums_friend","uid",$input_by,"to_uid",$usrid,"id");
// 	$frnd2=$obj->SelectAllByVal2("dostums_friend","uid",$usrid,"to_uid",$input_by,"id");
// 	$obj->delete("dostums_friend",array("id"=>$frnd1));
// 	$obj->delete("dostums_friend",array("id"=>$frnd2));
// 	echo 1;
// }


else
{
	echo 0;
}
?>
