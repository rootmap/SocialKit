
<?php

include('../class/auth.php');
extract($_POST);

if ($st == 1) {
    $group_id = time();
    $obj->insert("dostums_group", array("user_id" => $input_by, "group_id" => $group_id, "name" => $group_name, "privacy_id" => $privacy, "date" => date('Y-m-d'), "status" => 1));

    $newar = array("group_id" => $group_id, "status" => 1);
    $obj->updateUsingMultiple("dostums_group_members", array("group_id" => $group_id), array("fly_id" => $fly_id));
    unset($_SESSION['SESS_FLY_GENMEM']);
    echo json_encode($newar);
} elseif ($st == 2) {
    $obj->update("dostums_group", array("group_id" => $group_id, "icon_id" => $icon_id));
    echo 1;
} elseif ($st == 3) {
    $obj->update("dostums_group", array("group_id" => $group_id, "about" => $group_des, "address" => $group_addr, "phone" => $group_phn, "website" => $web_addr, "email" => $con_email));
    echo 1;
    //'group_des':group_des,'web_addr':web_addr,'con_email':con_email
} elseif ($st == 4) {
    $chk = $obj->exists_multiple("dostums_group_members", array("fly_id" => $unique_id, "user_id" => $usrid));
    if ($chk == 0) {
        $obj->insert("dostums_group_members", array("fly_id" => $unique_id, "user_id" => $usrid, "input_by" => $input_by, "date" => date('Y-m-d'), "status" => 1));
    }
    $nerarry = array("status" => 1, "fly" => $unique_id);
    echo json_encode($nerarry);
} elseif ($st == 5) {
    $ddquery = $obj->FlyQuery("SELECT a.id,a.user_id,a.fly_id,b.name FROM dostums_group_members as a
LEFT JOIN dostums_user_view as b ON b.id=a.user_id WHERE a.fly_id='" . $unique_id . "'");
    $df = 1;
    $dd = '';
    if (!empty($ddquery))
        foreach ($ddquery as $sd):
            $dd .='<div class="label label-default text-center" id="groupflymem_' . $sd->id . '" style=" padding-right: 20px; margin-bottom: 5px; margin-right: 3px;"> ' . $sd->name . '
                            <i class="fa fa-close pull-right" onClick="closeflygrmem(' . $sd->id . ')" style="position: absolute; cursor: pointer; margin-left: 5px; margin-top: 5px;"></i>
                        </div>';
            if ($df == 4) {
                $dd .='<br /><div class="clearfix" style="height:3px;"></div>';
                $df = 0;
            }
            $df++;
        endforeach;
    $nar = array('status' => 1, 'alldata' => $dd);
    echo json_encode($nar);
} elseif ($st == 6) {
    $chk = $obj->exists_multiple("dostums_group_members", array("fly_id" => $unique_id, "id" => $id));
    if ($chk != 0) {
        $obj->delete("dostums_group_members", array("id" => $id));
    }
    $nerarry = array("status" => 1, "fly" => $unique_id);
    echo json_encode($nerarry);
} elseif ($st == 7) {
    $obj->update('dostums_group', array('group_id' => $group_id, 'name' => $group_name, 'email' => $group_mail, 'phone' => $phone_number, 'address' => $address, 'mission' => $mission, 'vission' => $vission, 'moto' => $moto));
    echo 1;
} elseif ($st == 8) {
    $user_id = $obj->SelectAllByVal("dostums_user","email",$email_type, "id");
    if ($user_id != 0) {
        $chkmember = $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
        $chekadmin = $obj->exists_multiple("dostums_group_admin", array("group_id" => $group_id, "user_id" => $user_id));
        if ($chekadmin == 1 and $chkmember == 1) {
            $obj->updateUsingMultiple("dostums_group_admin", array("date" => date('Y-m-d'), "status" => 1), array("group_id" => $group_id, "user_id" => $user_id));
            echo 3;
        } elseif($chekadmin == 0 and $chkmember == 0) {
            $insert_post = array("user_id" => $user_id,
            "group_id" => $group_id,
            "input_by" => $input_by,
            "date" => date('Y-m-d'),
            "status" => 1); 
            $obj->insert("dostums_group_members", $insert_post);
            $obj->insert("dostums_group_admin", array("group_id" => $group_id, "user_id" => $user_id, "date" => date('Y-m-d'), "status" => 1));
                 
            echo 1;
        }
    }
} //dostums group_id email status genaret.
elseif ($st == 9) {
    $obj->update('dostums_group', array("group_id"=>$group_id,"privacy_id"=>$privacy_id));
    echo 1;
}
else {
    echo "Failed!";
    echo 0;
}
?>








