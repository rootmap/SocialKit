 <?php

include('../class/auth.php');
extract($_POST);
//condition start
if ($st == 1) {
    $chkuser=$obj->exists_multiple("dostums_login_alert",array("user_id"=>$input_by)); //mysqli_query("SELECT * FROM table where id='$iid' AND id='$iid'");
    if($chkuser==0)
    {
        $obj->insert("dostums_login_alert", array("user_id" =>$input_by,"notification" =>$notification,"email_notification" =>$email_login,"date"=>date("Y-m-d"),"status"=>1)); 
        echo 1;
    }
    else 
    {
        $obj->update("dostums_login_alert", array("user_id" =>$input_by,"notification" =>$notification,"email_notification" =>$email_login,"date"=>date("Y-m-d"),"status"=>1)); 
        echo 1;
    }
} 
elseif ($st == 2) 
{
    $chkuser=$obj->exists_multiple("dostums_login_alert",array("user_id"=>$input_by)); //mysqli_query("SELECT * FROM table where id='$iid' AND id='$iid'");
    if($chkuser==0)
    {
        $obj->insert("dostums_login_alert", array("user_id" =>$input_by,"login_approval" =>$login_approval,"date"=>date("Y-m-d"),"status"=>1)); 
        echo 1;
    }
    else 
    {
        $obj->update("dostums_login_alert", array("user_id" =>$input_by,"login_approval" =>$login_approval,"date"=>date("Y-m-d"),"status"=>1)); 
        echo 1;
    }
} 
else {
    echo 0;
}
//condition end
?>