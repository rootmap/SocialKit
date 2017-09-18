<?php
$admin_list = array();
$sqlgetgroupadmin = $obj->FlyQuery("SELECT * FROM dostums_group_admin WHERE group_id='" . $new_group_id . "'");
if (!empty($sqlgetgroupadmin)) {
    foreach ($sqlgetgroupadmin as $adm):
        $admin_list[] = $adm->user_id;
    endforeach;
}