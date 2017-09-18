 <?php

include('../class/auth.php');
extract($_POST);
//mobile pin  start
if ($st == 5) {
    $chk = $obj->exists_multiple("dostums_mobile_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_mobile_settings", array("user_id" => $input_by, "mobile_pin" => $apppin, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $apppin;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_mobile_settings", array("user_id" => $input_by, "mobile_pin" => $apppin, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $apppin;
        } else {
            echo 0;
        }
    }
} //mobile pin end 



//Dostums massage start
if ($st == 6) {
    $chk = $obj->exists_multiple("dostums_mobile_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_mobile_settings", array("user_id" => $input_by, "sms_alert" => $apptxs, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $apptxs;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_mobile_settings", array("user_id" => $input_by, "sms_alert" => $apptxs, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $apptxs;
        } else {
            echo 0;
        }
    }
} //Dostums massage end 



//Daily Text massages start
if ($st == 7) {
    $chk = $obj->exists_multiple("dostums_mobile_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_mobile_settings", array("user_id" => $input_by, "daliy_sms" => $daily, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $daily;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_mobile_settings", array("user_id" => $input_by, "daliy_sms" => $daily, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $daily;
        } else {
            echo 0;
        }
    }
}//Daily Text massages end



//Time of Day start
if ($st == 8) {
    $chk = $obj->exists_multiple("dostums_mobile_settings", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_mobile_settings", array("user_id" => $input_by, "time_date" => $time, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $time;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_mobile_settings", array("user_id" => $input_by, "time_date" => $time, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $time;
        } else {
            echo 0;
        }
    }
}//Time of Day end
?>