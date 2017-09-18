<?php

include('../class/auth.php');
include('../class/uploadImage_Class.php');
$imagelib = new image_class();
extract($_POST);
define('UPLOAD_DIR', '../profile/');
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace('data:image/gif;base64,', '', $img);
$img = str_replace('data:image/bmp;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);

$new_data = explode(";", $_POST['img']);
$type = substr($new_data[0], 11, 100);

$image_name = uniqid() . '.' . $type;
$file = UPLOAD_DIR . $image_name;
$success = file_put_contents($file, $data);
//print $success ? $file : 'Unable to save the file.';



if ($success) {
    if ($st == 1) {
        $profile_photo = $imagelib->upload_imageFromString("135", "135", UPLOAD_DIR, $file, "profile", $data);
        $obj->insert("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $photo_ids = $obj->SelectAllByVal2("dostums_photo", "photo", $profile_photo, "photo2", $image_name, "id");
        $obj->insert("dostums_post", array("user_id" => $input_by, "post" => "  Changed Profile Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 2));
        $post_id = $obj->SelectAllByVal("dostums_post", "photo_id", $photo_ids, "id");
        $obj->update("dostums_profile_photo", array("user_id" => $input_by, "status" => 1));
        $obj->insert("dostums_profile_photo", array("user_id" => $input_by, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));

        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));

        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo 1;
        //$obj->insert("notification", array("uid" =>$input_by,"message" =>" Change Profile Photo ","link_id" =>$post_id,"date" =>date('Y-m-d'),"status" =>24));
    } elseif ($st == 2) {
        $profile_photo = $imagelib->upload_imageFromString("960", "315", UPLOAD_DIR, $file, "cover", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "post" => "  Changed Cover Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 2));

        $obj->update("dostums_cover_photo", array("user_id" => $input_by, "status" => 1));
        $obj->insert("dostums_cover_photo", array("user_id" => $input_by, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));


        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

        echo $profile_photo;
    }


// [post a status with photo and tags name start]
    elseif ($st == 3) {

        $msg = $_POST['msg'];
        @$tagFriend = $_POST['names'];
        $permission = $_POST['permission'];

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }


         $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);

        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));

        $post_id = $obj->insertAndReturnID("dostums_post",
                                     array("user_id" => $input_by,
                                           "from_user_id" => $input_by,
                                          //  "post" => $post,
                                           "post" => $msg,
                                           "photo_id" => $photo_ids,
                                           "post_status" => 5,
                                           "post_permission" => $new_permission,
                                           "post_time" => date('Y-m-d H:i:s'),
                                           "date" => date('Y-m-d'), "status" => 3));

                                           if(!empty($tagFriend)){
                                             $count = count($tagFriend);
                                             foreach ($tagFriend as $value) {
                                               $inputTagStatus = $obj->insert("dostums_tags",
                                                                     array("post_id" => $post_id,
                                                                           "uid" => $input_by, "to_uid" => $value,
                                                                           "date" => date('Y-m-d'), "status" => 1));
                                             }
                                           } else{

                                           }


        $image = $dostums_user_name . " post a image";
        $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));


        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

        echo $profile_photo;

    }
// [post a status with photo and tags name end]

// [post a status with photo and without tags name start]
    elseif ($st == 12) {

        $msg = $_POST['msg'];
        $permission = $_POST['permission'];

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }


         $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);

        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));

        $post_id = $obj->insertAndReturnID("dostums_post",
                                     array("user_id" => $input_by,
                                           "from_user_id" => $input_by,
                                          //  "post" => $post,
                                           "post" => $msg,
                                           "photo_id" => $photo_ids,
                                           "post_status" => 0,
                                           "post_permission" => $new_permission,
                                           "post_time" => date('Y-m-d H:i:s'),
                                           "date" => date('Y-m-d'), "status" => 3));




        $image = $dostums_user_name . " post a image";
        $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));


        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

        echo $profile_photo;

    }
// [post a status with photo and without tags name end]

// [Edit post a status with photo and with tags name start]
    elseif ($st == 13) {

      $post_id = $_POST['post_id'];
      $msg = $_POST['msg'];
      @$tagFriend = $_POST['names'];
      $permission = $_POST['permission'];
      $img = $_POST['img'];


      if ($permission == "") {
          $new_permission = 1;
      } else {
          $new_permission = $permission;
      }


      $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);

      $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));

      $update_post = array("post" => $msg,
                           "photo_id" => $photo_ids,
                           "post_status" => 5,
                           "post_permission" => $new_permission,
                           "post_time" => date('Y-m-d H:i:s'),
                           "date" => date('Y-m-d'), "status" => 3);
                          //  print_r($update_post);
       $update_id = $obj->updateUsingMultiple("dostums_post", $update_post, array("id" => $post_id));

                                         if(!empty($tagFriend)){
                                           $count = count($tagFriend);
                                           foreach ($tagFriend as $value) {

                                            $delete_tags = array( "post_id" => $post_id);
                                            $deleted = $obj->delete("dostums_tags", $delete_tags);


                                            $inputTagStatus = $obj->insert("dostums_tags",
                                                                  array("post_id" => $post_id,
                                                                        "uid" => $input_by, "to_uid" => $value,
                                                                        "date" => date('Y-m-d'), "status" => 1));

                                           }
                                         } else{

                                         }


      $image = $dostums_user_name . " post a image";
      // $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));
      //
      //
      $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
      $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
      $get_country_id = $get_country_ids[0]->country_id;

      $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

      echo $profile_photo;

    }
// [Edit post a status with photo and with tags name end]

// [Edit post a status with photo and without tags name start]
    elseif ($st == 14) {

      $post_id = $_POST['post_id'];
      $msg = $_POST['msg'];
      $permission = $_POST['permission'];
      $img = $_POST['img'];


      if ($permission == "") {
          $new_permission = 1;
      } else {
          $new_permission = $permission;
      }


      $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);

      $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));

      $update_post = array("post" => $msg,
                           "photo_id" => $photo_ids,
                           "post_status" => 1,
                           "post_permission" => $new_permission,
                           "post_time" => date('Y-m-d H:i:s'),
                           "date" => date('Y-m-d'), "status" => 1);
                          //  print_r($update_post);
       $update_id = $obj->updateUsingMultiple("dostums_post", $update_post, array("id" => $post_id));

       $delete_tags = array( "post_id" => $post_id);
       $deleted = $obj->delete("dostums_tags", $delete_tags);

      $image = $dostums_user_name . " post a image";
      // $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));
      //
      //
      $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
      $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
      $get_country_id = $get_country_ids[0]->country_id;

      $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

      echo $profile_photo;

    }
// [Edit post a status with photo and without tags name end]


    elseif ($st == 4) {
        $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "to_user_id" => $to_user, "post" => $post, "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 4));
        echo $profile_photo;
    } elseif ($st == 5) {
        $profile_photo = $imagelib->upload_imageFromString("135", "135", UPLOAD_DIR, $file, "group_profile", $data);
        $obj->insert("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $photo_ids = $obj->SelectAllByVal2("dostums_photo", "photo", $profile_photo, "photo2", $image_name, "id");
        $obj->insert("dostums_post", array("user_id" => $input_by, "group_id" => $group_id, "post" => "  Changed Profile Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 60));
        $post_id = $obj->SelectAllByVal("dostums_post", "photo_id", $photo_ids, "id");
        $obj->updateUsingMultiple("dostums_group_profile_photo", array("status" => 1), array("user_id" => $input_by, "group_id" => $group_id));
        $obj->insert("dostums_group_profile_photo", array("user_id" => $input_by, "group_id" => $group_id, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));

        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo 1;
        //$obj->insert("notification", array("uid" =>$input_by,"message" =>" Change Profile Photo ","link_id" =>$post_id,"date" =>date('Y-m-d'),"status" =>24));
    } elseif ($st == 6) {
        $profile_photo = $imagelib->upload_imageFromString("960", "315", UPLOAD_DIR, $file, "group_cover", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "group_id" => $group_id, "post" => "  Changed Cover Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 61));
        $obj->updateUsingMultiple("dostums_group_cover_photo", array("status" => 1), array("user_id" => $input_by, "group_id" => $group_id));
        $obj->insert("dostums_group_cover_photo", array("user_id" => $input_by, "group_id" => $group_id, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));



        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

        echo $profile_photo;
    } elseif ($st == 7) {
        $profile_photo = $imagelib->upload_imageFromString("135", "135", UPLOAD_DIR, $file, "page_profile", $data);
        $obj->insert("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $photo_ids = $obj->SelectAllByVal2("dostums_photo", "photo", $profile_photo, "photo2", $image_name, "id");
        $obj->insert("dostums_post", array("user_id" => $input_by, "page_id" => $page_id, "post" => "  Changed Profile Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 120));
        $post_id = $obj->SelectAllByVal("dostums_post", "photo_id", $photo_ids, "id");
        $obj->updateUsingMultiple("dostums_page_profile_photo", array("status" => 1), array("user_id" => $input_by, "page_id" => $page_id));
        $obj->insert("dostums_page_profile_photo", array("user_id" => $input_by, "page_id" => $page_id, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));

        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo 1;
        //$obj->insert("notification", array("uid" =>$input_by,"message" =>" Change Profile Photo ","link_id" =>$post_id,"date" =>date('Y-m-d'),"status" =>24));
    } elseif ($st == 8) {
        $profile_photo = $imagelib->upload_imageFromString("960", "315", UPLOAD_DIR, $file, "page_cover", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "page_id" => $page_id, "post" => "  Changed Cover Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 121));
        $obj->updateUsingMultiple("dostums_page_cover_photo", array("status" => 1), array("user_id" => $input_by, "page_id" => $page_id));
        $obj->insert("dostums_page_cover_photo", array("user_id" => $input_by, "page_id" => $page_id, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));



        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

        echo $profile_photo;
    } elseif ($st == 9) {
        $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "group_id" => $group_id, "post" => $post, "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 62));
        //notification start
        $groupimage = $dostums_user_name . " post a group image";

        $notifigrouppostimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id,"group_id" =>$group_id, "notification" => $groupimage, "notification_type" => 8, "date" => date('Y-m-d'), "status" =>8));
        //notification end
        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo $profile_photo;
    } elseif ($st == 10) {


        $profile_photo = $imagelib->uploadFiximageFromString(UPLOAD_DIR, $file, "status", $data);
        $photo_ids = $obj->insertAndReturnID("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $post_id = $obj->insertAndReturnID("dostums_post", array("user_id" => $input_by, "page_id" => $page_id, "post" => $post, "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 122));

        //notification start from here
        //$fanpage=$obj->FlyQuery("SELECT IFNULL(name,'Not Mention') as name FROM dostums_fanpage WHERE page_id='".$page_id."'");
        //$pageimage = $dostums_user_name . " post a image on <a href='page.php?page_id=".$page_id."'>".$fanpage[0]->name."</a>";

        $fanpage=$obj->SelectAllByVal("dostums_fanpage","page_id",$page_id,"name");

        $pageimage ="<a href='profiles.php?user_id=".$input_by."'>".$dostums_user_name."</a> posted a photo on <a href='page.php?page_id=".$page_id."'>".$fanpage."</a>";

        $notifipageimagepost = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "page_id" =>$page_id, "notification" => $pageimage, "notification_type" =>9, "date" => date('Y-m-d'), "status" => 9));
        //notification save end here

        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo $profile_photo;
        } elseif ($st == 11) {
        $profile_photo = $imagelib->upload_imageFromString("135", "135", UPLOAD_DIR, $file, "page_profile", $data);
        $obj->insert("dostums_photo", array("photo" => $profile_photo, "photo2" => $image_name, "status" => 1));
        $photo_ids = $obj->SelectAllByVal2("dostums_photo", "photo", $profile_photo, "photo2", $image_name, "id");
        $obj->insert("dostums_post", array("user_id" => $input_by, "group_id" => $page_id, "post" => "  Changed Profile Photo ", "photo_id" => $photo_ids, "post_time" => date('Y-m-d H:i:s'), "date" => date('Y-m-d'), "status" => 120));
        $post_id = $obj->SelectAllByVal("dostums_post", "photo_id", $photo_ids, "id");
        $obj->updateUsingMultiple("dostums_group_profile_photo", array("status" => 1), array("user_id" => $input_by, "group_id" => $page_id));
        $obj->insert("dostums_group_profile_photo", array("user_id" => $input_by, "group_id" => $page_id, "photo_id" => $photo_ids, "date" => date('Y-m-d'), "status" => 2));

        $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

        if ($permission == "") {
            $new_permission = 1;
        } else {
            $new_permission = $permission;
        }

        $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
        $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
        $get_country_id = $get_country_ids[0]->country_id;

        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));


        echo 1;
    } else {
        unlink($file);
    }
} else {
    echo 0;
}
?>
