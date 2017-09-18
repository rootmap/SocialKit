<?php

include('../class/auth.php');
extract($_POST);
//Post start
if ($st == 1) {
    $chk = $obj->exists_multiple("dostums_user_privacy", array("user_id" => $input_by));
    if ($chk == 1) {
        if ($obj->update("dostums_user_privacy", array("user_id" => $input_by, "post_permission" => $pric, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $pric;
        } else {
            echo 0;
        }
    } else {
        if ($obj->insert("dostums_user_privacy", array("user_id" => $input_by, "post_permission" => $pric, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $pric;
        } else {
            echo 0;
        }
    }
   //Post end 
   
 //Friend Request start  
} elseif ($st == 2) {
    $chk = $obj->exists_multiple("dostums_user_privacy", array("user_id" => $input_by));
    if ($st == 2) {
        if ($obj->update("dostums_user_privacy", array("user_id" => $input_by, "friend_request_permission" => $frnd, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $frnd;
        } else {
            echo 0;
        }
    }else {
        if ($obj->insert("dostums_user_privacy", array("user_id" => $input_by, "friend_request_permission" => $frnd, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $frnd;
        } else {
            echo 0;
        }
    }
   //Friend Request End   
    
 //Email start   
} elseif ($st == 3) {
      $chk = $obj->exists_multiple("dostums_user_privacy", array("user_id" => $input_by));
    if ($st == 3) {
        if ($obj->update("dostums_user_privacy", array("user_id" => $input_by, "email_lookup" => $email, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $email;
        } else {
            echo 0;
        }
    }else {
    if ($obj->insert("dostums_user_privacy", array("user_id" => $input_by, "email_lookup" => $email, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $email;
        } else {
            echo 0;
        }
  //Email End   
    }
 //phone Number End          
}elseif ($st == 4) {
    $chk = $obj->exists_multiple("dostums_user_privacy", array("user_id" => $input_by));
    if ($st == 4) {
        if ($obj->update("dostums_user_privacy", array("user_id" => $input_by, "phone_number" => $phn, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $phn;
        } else {
            echo 0;
        }
}else {
        if ($obj->insert("dostums_user_privacy", array("user_id" => $input_by, "phone_number" => $phn, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $phn;
        } else {
            echo 0;
        }
    }
   //phone Number End   
    
    
    
    //search_engine_permission start   
}elseif ($st == 5) {
    $chk = $obj->exists_multiple("dostums_user_privacy", array("user_id" => $input_by));
    if ($st == 5) {
        if ($obj->update("dostums_user_privacy", array("user_id" => $input_by, "search_engine_permission" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
}else {
        if ($obj->insert("dostums_user_privacy", array("user_id" => $input_by, "search_engine_permission" => $src, "date" => date('Y-m-d'), "status" => 1)) == 1) {
            echo $src;
        } else {
            echo 0;
        }
    }
    
}
   //search engine permission End 
    
    





?>








