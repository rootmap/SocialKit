<?php
$sqlcurrent_profile_image = $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $new_user_id, "status", 2, "photo_id");
if (!empty($sqlcurrent_profile_image)) {
    $profile_image = "./profile/" . $obj->SelectAllByVal("dostums_photo", "id", $sqlcurrent_profile_image, "photo");
} else {
    $profile_image = "./images/user/generic-man-profile.jpg";
}

$sqlcurrent_cover_image = $obj->SelectAllByVal2("dostums_cover_photo", "user_id", $new_user_id, "status", 2, "photo_id");
if (!empty($sqlcurrent_cover_image)) {
    $cover_image = "./profile/" . $obj->SelectAllByVal("dostums_photo", "id", $sqlcurrent_cover_image, "photo");
} else {
    $cover_image = "./images/user/ocean-beach-generic-cover.jpg";
}
?>










<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="cover-photo" id="cover-photo"
         style="background:url('<?php echo $cover_image; ?>'); background-color: #435e9c; background-repeat: no-repeat;
         background-position: center; background-size: cover;">



        <?php if ($obj->filename() == "profile.php") { ?>
            <div class="fileUpload" style="float:left;">
                <span id="uploadFile"></span>
                <input type="file" id="file_cover" class="upload" />
            </div>

            <a href="#" class="change-cover-photo"> <i class="fa fa-image"></i> change photo</a>
        <?php } ?>


        <!-- [photo upload box start] -->
        <div class="profile-photo-box">
            <?php if ($obj->filename() == "profile.php") { ?>
                <div class="fileUpload" style="float:left;">
                    <span id="uploadFile"></span>
                    <input type="file" id="file" class="upload" />
                </div>

            <?php } ?>

            <img id="profile_photo" class="profile-photo show-in-modal" src="<?php echo $profile_image; ?>">

            <?php if ($obj->filename() == "profile.php") { ?>
                <a href="#" class="change-profile-photo"> <i class="fa fa-image"></i> change photo</a>
            <?php } ?>
        </div>
        <!-- [photo upload box end] -->


        <!-- [user name start] -->
        <div class="cover-name"><?php echo $obj->SelectAllByVal("dostums_user_view", "id", $new_user_id, "name"); ?> <br>
            <span class="user-name-display">@<?php echo $obj->SelectAllByVal("dostums_user", "id", $new_user_id, "first_name") . "-" . $new_user_id; ?></span>
        </div>
        <!-- [user name end] -->


        <!-- [start]  -->
        <div class="profile-photo-user">
            <ul class="list-unstyled list-inline  navbar-global navbar-right">
                <?php
                if ($obj->filename() != "profile.php") {

                    $chk_exit_request = $obj->exists_multiple("dostums_friend", array("uid" => $new_user_id, "to_uid" => $input_by));
                    $chk_ext_request_status = $obj->SelectAllByVal2("dostums_friend", "uid", $new_user_id, "to_uid", $input_by, "status");

                    if ($chk_exit_request != 0 && $chk_ext_request_status == 1) {
                        ?>
                        <li>
                            <a href="friend-requests.php">
                                <button   id="profile_request_status_<?php echo $new_user_id; ?>"
                                          class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                    <i class="fa fa-handshake-o"></i> Accept Friend request
                                </button>
                            </a>
                        </li>
                        <?php
                    } else {

                        $chkfrnd = $obj->exists_multiple("dostums_friend", array("uid" => $input_by, "to_uid" => $new_user_id));
                        if ($chkfrnd == 0) {
                            ?>
                            <li>
                                <button  onclick="frndrequest_Profile('<?php echo $new_user_id; ?>',
                                                'profile_request_status_<?php echo $new_user_id; ?>', '1', 'insert')"
                                         id="profile_request_status_<?php echo $new_user_id; ?>"
                                         class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                    <i class="fa fa-user-plus"></i> ADD FRIEND
                                </button>
                            </li>
                            <?php
                        } else {
                            $chkfrndstatus1 = $obj->SelectAllByVal2("dostums_friend", "uid", $input_by, "to_uid", $new_user_id, "status");
                            if ($chkfrndstatus1 == 0) {

                                @$reChkfrndstatus1 = $obj->SelectAllByVal2("dostums_friend", "uid", $input_by, "to_uid", $new_user_id, "status");
                                @$reChkfrndstatus2 = $obj->SelectAllByVal2("dostums_friend", "uid", $new_user_id, "to_uid", $input_by, "status");

                                if ($reChkfrndstatus1 == 0 && $reChkfrndstatus2 == 0) {
                                    //  echo $reChkfrndstatus2;
                                    ?>
                                    <li>
                                        <button  onclick="frndrequest_Profile('<?php echo $new_user_id; ?>',
                                                        'profile_request_status_<?php echo $new_user_id; ?>', '1', 'update')"
                                                 id="profile_request_status_<?php echo $new_user_id; ?>"
                                                 class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                            <i class="fa fa-user-plus"></i> ADD FRIEND
                                        </button>
                                    </li>
                                    <?php
                                } else if ($reChkfrndstatus1 == 0 && $reChkfrndstatus2 == 2) {
                                    ?>
                                    <li>
                                        <button onclick=""
                                                id="profile_request_status_<?php echo $new_user_id; ?>"
                                                class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                            <i class="fa fa-flag"></i> Friend
                                        </button>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li>
                                        <button onclick=""
                                                id="profile_request_status_<?php echo $new_user_id; ?>"
                                                class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                            <i class="fa fa-user-plus"></i> request Already Sent
                                        </button>
                                    </li>
                                    <?php
                                }
                            } elseif ($chkfrndstatus1 == 1) {
                                ?>
                                <li>
                                    <button  id="profile_request_status_<?php echo $new_user_id; ?>"
                                             onclick=""
                                             class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                        <i class="fa fa-spinner"></i> Request pendding
                                    </button>
                                </li>
                                <?php
                            } elseif ($chkfrndstatus1 == 2) {
                                ?>
                                <li>
                                        <!-- onclick="frndrequest_Profile('<?php //echo $new_user_id;   ?>','profile_request_status_<?php //echo $new_user_id;   ?>','3')"  -->
                                    <button   id="profile_request_status_<?php echo $new_user_id; ?>"
                                              class="user-actions-follow-button btn-stroke btn-primary btn-sm  follow-button btn">
                                        <i class="fa fa-flag"></i> Friend
                                    </button>
                                </li>

                                <!-- <li class="dropdown ">
                                                 <a data-toggle="dropdown"
                                                                class="dropdown-toggle btn-primary btn-stroke btn-sm btn-stroke" href="#"
                                                                aria-expanded="false">
                                                                <span class="fa fa-gear "></span>
                                                        </a>
                                                                         <ul class="dropdown-menu dropdown-sm">
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <span class="fa fa-user-times"></span>
                                                                                                                 Unfriend <?php //echo $obj->SelectAllByVal("dostums_user_view","id",$new_user_id,"name");   ?>
                                                                                                         </a>
                                                                                                 </li>
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <span class="fa fa-user-times"></span>
                                                                                                                 Block <?php //echo $obj->SelectAllByVal("dostums_user_view","id",$new_user_id,"name");   ?>
                                                                                                         </a>
                                                                                                 </li>
                                                                                                 <li>
                                                                                                         <a href="#">
                                                                                                                 <span class="fa fa-user-secret"></span>
                                                                                                                 Report <?php //echo $obj->SelectAllByVal("dostums_user_view","id",$new_user_id,"name");   ?>
                                                                                                         </a>
                                                                                                 </li>
                                                                                </ul>
                                        </li> -->
                                <?php
                            }
                        }
                    }
                } // end if($obj->filename()!="profile.php")
                ?>

                <!-- [Edit profile button start]  -->
                <?php if ($obj->filename() == "profile.php") { ?>
                    <li>
                        <a href="setting.php" class="btn-success btn-stroke btn-sm  follow-button btn "
                           style="font-weight:bold !important;">
                            <i class="fa fa-pencil">&nbsp;</i> edit profile
                        </a>
                    </li>
                <?php } ?>
                <!-- [Edit profile button end]  -->

            </ul>

        </div>
        <!-- [end]  -->



    </div>

    <?php
    //profile time line bar start
    include('profile_timeline_bar.php');
    //profile time line end
    ?>

</div>
