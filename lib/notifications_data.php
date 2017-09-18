<?php

include('../class/auth.php');
extract($_POST);


//count data start
if($st == 1){
 $count = '';

 echo $count .= 0;
}
// count data end


// grave notification data from database. start
if($st == 2){

}
//grave notification data from database. end

//sounds  start
if ($st == 8) {
    $chk = $obj->exists_multiple("dostums_notification_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_notification_settings", array("user_id" => $input_by, "sounds_on" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_notification_settings", array("user_id" => $input_by, "sounds_on" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
    }
} //sounds end.
//email start
if ($st == 9) {
    $chk = $obj->exists_multiple("dostums_notification_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_notification_settings", array("user_id" => $input_by, "email" => $par, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $par;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_notification_settings", array("user_id" => $input_by, "email" => $par, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $par;
        } else {
            echo 0;

        }
    }
}

// email End
//phone start
if ($st == 10) {
    $chk = $obj->exists_multiple("dostums_notification_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_notification_settings", array("user_id" => $input_by, "mobile" => $phn, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $phn;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_notification_settings", array("user_id" => $input_by, "mobile" => $phn, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $phn;
        } else {
            echo 0;
        }
    }
}

// phone End





//Text massage start
if ($st == 11) {
    $chk = $obj->exists_multiple("dostums_notification_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_notification_settings", array("user_id" => $input_by, "text_massage" => $msg, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $msg;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_notification_settings", array("user_id" => $input_by, "text_massage" => $msg, "date" => ('Y-m-d'), "status" => 1)) == 1) {
            echo $msg;
        } else {
            echo 0;
        }
    }
}

// Text massage End
?>
