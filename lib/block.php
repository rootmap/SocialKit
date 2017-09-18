<?php
include('../class/auth.php');
extract($_POST);

// [my friend block start]
if($st == 1){

  $blockID = $_POST['blockID'];
  $myID = $_POST['myID'];
  $block_reason = $_POST['block_reason'];
  $blockType = $_POST['blockType'];
  $date = date('Y-m-d H:i:s');
  $status = '1';

  $exist = $obj->exists_multiple("block", array("userid" => $myID, "iteam_id" => $blockID, "iteam" => $blockType, "status" => '0'));

  if($exist == 1){
    // echo 'if';
    $obj->updateUsingMultiple("block",array("status"=>1,"reason"=>$block_reason ,"date"=>date('Y-m-d H:i:s')),array("userid" => $myID, "iteam_id" => $blockID, "status"=>'0'));
  	$obj->updateUsingMultiple("block",array("status"=>1,"reason"=>$block_reason ,"date"=>date('Y-m-d H:i:s')),array("iteam_id" => $myID, "userid" => $blockID, "status"=>'0'));
    $obj->updateUsingMultiple("dostums_friend",array("status"=>3,"date"=>$date),array("to_uid" => $myID, "uid" => $blockID,"status"=>'2'));
    $obj->updateUsingMultiple("dostums_friend",array("status"=>3,"date"=>$date),array("uid" => $myID, "to_uid" => $blockID,"status"=>'2'));

  } else{
    // echo 'else';
    $obj->insert("block", array("userid" => $myID, "iteam" => $blockType,
                                "iteam_id" => $blockID, "reason" => $block_reason,
                                "date" => date('Y-m-d H:i:s'), "status" => 1));

    $obj->updateUsingMultiple("dostums_friend",array("status"=>3,"date"=>date('Y-m-d')),array("to_uid" => $myID, "uid" => $blockID,"status"=>'2'));
    $obj->updateUsingMultiple("dostums_friend",array("status"=>3,"date"=>date('Y-m-d')),array("uid" => $myID, "to_uid" => $blockID,"status"=>'2'));
  }
  echo 1;
}
// [my friend block end]

// [my friend unblock start]
else if($st == 2){
   $iteam_id = $_POST['user_id'];
   $myID = $_POST['myID'];
   $iteam = $_POST['iteam'];
  $obj->updateUsingMultiple("block",array("status"=>0,"date"=>date('Y-m-d H:i:s')),array("userid" => $myID, "iteam_id" => $iteam_id, "iteam" => $iteam,"status"=>'1'));
  $obj->updateUsingMultiple("block",array("status"=>0,"date"=>date('Y-m-d H:i:s')),array("userid" => $iteam_id, "iteam_id" => $myID, "iteam" => $iteam,"status"=>'1'));
  $obj->updateUsingMultiple("dostums_friend",array("status"=>2,"date"=>date('Y-m-d')),array("to_uid" => $myID, "uid" => $iteam_id, "status"=>'3'));
  $obj->updateUsingMultiple("dostums_friend",array("status"=>2,"date"=>date('Y-m-d')),array("uid" => $myID, "to_uid" => $iteam_id, "status"=>'3'));
  echo 1;
}
// [my friend unblock end]

else{

}





?>
