<?php
$admin_list = array();
$sqlgetgroupadmin = $obj->FlyQuery("SELECT * FROM dostums_page_admin WHERE page_id='" . $new_page_id . "'");
if (!empty($sqlgetgroupadmin)) {
    foreach ($sqlgetgroupadmin as $adm):
        $admin_list[] = $adm->user_id;
    endforeach;
}