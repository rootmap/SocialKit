<?php

include('../class/auth.php');
extract($_POST);

if ($st == 1) {
    $fanpage_id = time();
    $obj->insert("dostums_fanpage", array("user_id" => $input_by, "page_id" => $fanpage_id, "page_type_id" => $page_type_id, "page_category" => $page_category, "name" => $fanpage_name, "date" => date('Y-m-d'), "status" => 1));

    $newar = array("page_id" => $fanpage_id, "status" => 1);

    echo json_encode($newar);
} elseif ($st == 2) {
    $obj->update("dostums_fanpage", array("page_id" => $fanpage_id, "about" => $page_des, "website" => $page_web, "dostums_web_addr" => $dp_web));
    echo 1;
} elseif ($st == 3) {//here starts codes for updating page about
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "page_type_id" => $page_type, "page_category" => $page_category));
    echo 1;
} elseif ($st == 4) {//here starts codes for updating page about
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "name" => $fanpage_fill));
    echo 1;
} elseif ($st == 5) {//here starts codes for updating page about
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "website" => $web_address));
    echo 1;
} elseif ($st == 6) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "address" => $easy_address));
    echo 1;
} elseif ($st == 7) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "short_description" => $area_short));
    echo 1;
} elseif ($st == 8) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "impressum" => $impressumd_input));
    echo 1;
} elseif ($st == 9) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "long_description" => $long_description_input));
    echo 1;
} elseif ($st == 10) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "founder" => $founder_input));
    echo 1;
} elseif ($st == 11) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "product_services" => $products_input));
    echo 1;
} elseif ($st == 12) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "email" => $email_address_input));
    echo 1;
} elseif ($st == 13) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "website" => $website_address_input));
    echo 1;
} elseif ($st == 14) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "start_date" => $start_date));
    echo 1;
} elseif ($st == 15) { //here starts codes for updating page about		
    $obj->update("dostums_fanpage", array("page_id" => page_id, "price_range" => $price_fixed));
    echo 1;
} elseif ($st == 16) {
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "favourite" => $fav));
    echo 1;
} elseif ($st == 17) {
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "unpublish" => $pablish_value));
    echo 1;
} elseif ($st == 18) {
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "messages" => $sms_passing));
    echo 1;
} elseif ($st == 19) {
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "country_restrictions" => $cry_restions));
    echo 1;
} elseif ($st == 20) {
    $obj->update("dostums_age_restrictions", array("page_id" => $page_id, "age_iteam" => $age_restriction_option));
    echo 1;
} elseif ($st == 21) {
    $obj->update("dostums_profanity_filter", array("page_id" => $page_id, "profanity__filter" => $profanity_select_option));
    echo 1;
} elseif ($st == 22) {
    $obj->update("dostums_fanpage", array("page_id" => $page_id, "add_page_moderation" => $modaretor_input, "add_page_moderation" => $modaretor_input));
    echo 1;
} elseif ($st == 23) {
    //page admin start
    $user_id = $obj->SelectAllByVal("dostums_user", "email", $email, "id"); //select id from dostums_user where email='$email'
    if ($user_id != 0) {
        $chkadmin = $obj->exists_multiple("dostums_page_admin", array("page_id" => $page_id, "user_id" => $user_id)); //select * from dostums_page_admin WHERE page_id='$page_id' AND user_id='$user_id'
        if ($chkadmin == 1) {
            $obj->updateUsingMultiple("dostums_page_admin", array("role_id" => $role_id, "date" => date('Y-m-d'), "status" => 1), array("page_id" => $page_id, "user_id" => $user_id));
            //update dostums_page_admin SET role_id='$role_id',date='date('Y-m-d')' WHERE  page_id='$page_id' AND user_id='$user_id'         
            echo 3;
        } else {
            $obj->insert("dostums_page_admin", array("page_id" => $page_id, "role_id" => $role_id, "user_id" => $user_id, "date" => date('Y-m-d'), "status" => 2));
            echo 1; //insert into dostums_page_admin SET page_id='$page_id',role_id='$role_id',user_id='user_id'
        }
    } else {
        echo 2;
    }
    //page admin end
    
    
}elseif ($st == 24) {
    $array=array("dostums_fanpage","dostums_page_admin","dostums_page_cover_photo","dostums_page_likes","dostums_page_profile_photo");
    $i=0;
    if(!empty($array))
    {
        $i=0;
        foreach ($array as $page):
            $obj->delete($page,array("page_id"=>$page_id));
            $i++;
        endforeach;
    }
    
    if($i!=0)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    
}//page remove end
else {
    echo "Failed!";
    echo 0;
}
?>








