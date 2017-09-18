<?php
session_start();
include('../class/db_Class.php');
$obj = new db_class();
include('../plugin/gateway/sslFunction.php');
extract($_POST);
if ($st == 9) {

    // SELECT * FROM dostums_hidden_verify WHERE '".$field_name_1."'='".$field_value_1."' AND '".$field_name_2."'='".$field_value_2."' AND '".$field_name_3."'='".$field_value_3."' 
    $query="SELECT IFNULL(count(member_id),0) as total FROM dostums_hidden_verify WHERE " . $field_name_1 . "='" . $field_value_1 . "' AND " . $field_name_2 . "='" . $field_value_2 . "' AND " . $field_name_3 . "='" . $field_value_3 . "'";
    $getcurrentquantity=$obj->FlyQuery($query);
    $chkverify_step_two = $getcurrentquantity[0]->total;
    //echo count($chkverify_step_two);
    //echo "Found ".$chkverify_step_two;
    if ($chkverify_step_two == 1) 
    {
        if ($obj->exists_multiple("dostums_user", array("email" => $email)) == 0) {
            $newarray = array("status" => 1);
        } else {
            $newarray = array("status" => 3);
        }
    } else {
        
        $newarray = array("status" => 4);
    }
    
    echo json_encode($newarray);
    
}elseif ($st == 10) {

    // SELECT * FROM dostums_hidden_verify WHERE '".$field_name_1."'='".$field_value_1."' AND '".$field_name_2."'='".$field_value_2."' AND '".$field_name_3."'='".$field_value_3."' 
    $query="SELECT IFNULL(count(member_id),0) as total FROM dostums_hidden_verify WHERE " . $field_name_1 . "='" . $field_value_1 . "' AND " . $field_name_2 . "='" . $field_value_2 . "' AND " . $field_name_3 . "='" . $field_value_3 . "' AND mobile_number='" . $mobile_number . "'";
    $getcurrentquantity=$obj->FlyQuery($query);
    $chkverify_step_two = $getcurrentquantity[0]->total;
    //echo count($chkverify_step_two);
    //echo "Found ".$chkverify_step_two;
    if ($chkverify_step_two == 1) 
    {
        if ($obj->exists_multiple("dostums_user", array("email" => $email)) == 0) {
            @$dobs = $dob;
            include('../class/login.php');
            $login = new loginClass();
            $signup_ip = $login->GetPcAddress();
            $expass=substr(time(),6,10);
            $passes = $login->MakePassword($expass);
            $newauth = substr($login->MakePassword(time()), 4, 8);
            $user_id = $obj->insertAndReturnID("dostums_user", array("first_name" => $first_name, "last_name" => $last_name, "email" => $email, "password" => $passes, "auth_code" => $newauth, "phone_number" => $mobile_number, "signup_ip" => $signup_ip, "date" => date('Y-m-d'), "status" => 0));

            if ($user_id != '' || $user_id != 0) {
                $newarray = array("status" => 1, "auth_code" => $newauth, "user_id" => $user_id,"pass"=>$expass);
                $full_name = $first_name . " " . $last_name;
                $sms = "Dear " . $full_name . ", Your authorization code is : " . $newauth;
                $sslResponse = SSLBulkSMS($mobile_number, $sms);
            } else {
                $newarray = array("status" => 0);
            }

            

//			session_regenerate_id();
//			$_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID'] = $user_id;
//			$_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'] = $first_name." ".$last_name;
//			session_write_close();
            //echo 1;
        } else {
            $newarray = array("status" => 3);
        }
    } else {
        
        $newarray = array("status" => 4);
    }
    
    echo json_encode($newarray);
} elseif ($st == 11) {

    //step 11 start
    $query="SELECT * FROM dostums_hidden_verify WHERE " . $field_name_1 . "='" . $field_value_1 . "' AND " . $field_name_2 . "='" . $field_value_2 . "' AND " . $field_name_3 . "='" . $field_value_3 . "' AND mobile_number='" . $mobile_number . "'";
    $chkverify_step_three =count($obj->FlyQuery($query));
    //echo count($chkverify_step_two);
    if ($chkverify_step_three == 1) {
        if ($obj->exists_multiple("dostums_user", array("email" => $email,"id"=>$user_id,"auth_code"=>$auth_code)) == 1) {
            
            $sdt = $obj->update("dostums_user", array("id" => $user_id,"auth_code"=>"", "status" => 1,"user_permission" => 1));

            if ($sdt != '' || $sdt != 0) {
                $full_name = $first_name . " " . $last_name;
                $passwor=$pass;
                $sms = "Dear " . $full_name . ", Your account is active now, Your Email : ".$email." your Password : ".$passwor;
                
                $sslResponse = SSLBulkSMS($mobile_number, $sms);
                
                session_regenerate_id();
                $_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID'] = $user_id;
                $_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'] = $first_name." ".$last_name;
                session_write_close();
                
                $newarray = array("status" => 1,"pass"=>$passwor,"user_id"=>$_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID']);
            } else {
                $newarray = array("status" => 2);
            }

            

//			
            //echo 1;
        } else {
            $newarray = array("status" => 3);
        }
    }
    else
    {
         $newarray = array("status" => 4);
    }
    echo json_encode($newarray);
    //step 11 end
} else {
    echo 0;
}
?>








