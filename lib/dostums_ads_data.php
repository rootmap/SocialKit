 <?php

include('../class/auth.php');
extract($_POST);
//condition start
if ($st == 1) {
    $chkuser=$obj->exists_multiple("dostums_notification",array("user_id"=>$input_by)); //mysqli_query("SELECT * FROM table where id='$iid' AND id='$iid'");
    if($chkuser==0)
    {
        $obj->insert("dostums_notification", array("user_id" =>$input_by,"on_dostums" =>$notific,"status"=>1)); 
        echo 1;
    }
    else 
    {
        $obj->update("dostums_notification", array("user_id" =>$input_by,"on_dostums" =>$notific,"status"=>1)); 
        echo 1;
    }
} //condition end



//Ads websites and apps  start
if ($st == 6) {
    $chk = $obj->exists_multiple("dostums_ads_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_ads_settings", array("user_id" => $input_by, "online_ads" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_ads_settings", array("user_id" => $input_by, "online_ads" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
    }
} //Ads websites and apps  start end 


//Social  websites   ads start
if ($st ==7) {
    $chk = $obj->exists_multiple("dostums_ads_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_ads_settings", array("user_id" => $input_by, "social_ads" => $show, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $show;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_ads_settings", array("user_id" => $input_by, "social_ads" => $show, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $show;
        } else {
            echo 0;
        }
    }
} //Social websites ads end 



//preferences   ads start
if ($st ==8) {
    $chk = $obj->exists_multiple("dostums_ads_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_ads_settings", array("user_id" => $input_by, "preferences_show_ads" => $prfads, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $prfads;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_ads_settings", array("user_id" => $input_by, "preferences_show_ads" => $prfads, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $prfads;
        } else {
            echo 0;
        }
    }
} //preferences ads end 
?>