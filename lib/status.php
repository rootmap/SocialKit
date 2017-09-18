<?php

include('../class/auth.php');
extract($_POST);


// [post something on wall start]
if ($st == 1) {

  $msg = $_POST['msg'];
  @$tagFriend = $_POST['names'];
  @$permission = $_POST['permission'];

  $pageName = $_POST['pageName'];
  @$pageIdNumber = $_POST['pageIdNumber'];
  @$groupIdNumber = $_POST['groupIdNumber'];

  $pageID = '';
  $groupID = '';

  if(!empty($pageIdNumber)){
    $pageID .= $pageIdNumber;
  } else{
    $pageID .= '0';
  }


  if(!empty($groupIdNumber)){
    $groupID .= $groupIdNumber;
  } else{
    $groupID .= '0';
  }


  if ($permission == "") {
      $new_permission = 1;
  } else {
      $new_permission = $permission;
  }

if(!empty($tagFriend)){
  $insert_post = array(
      "user_id" => $input_by,
      "from_user_id" => $input_by,
      "group_id" => $groupID,
      "page_id" => $pageID,
      "post" => $msg,
      "photo_id" => 0,
      "post_status" => 5,
      "post_permission" => $new_permission,
      "post_time" => date('Y-m-d H:i:s'),
      "date" => date('Y-m-d'),
      "status" => 1);
}else{
  $insert_post = array(
      "user_id" => $input_by,
      "from_user_id" => $input_by,
      "group_id" => $groupID,
      "page_id" => $pageID,
      "post" => $msg,
      "photo_id" => 0,
      "post_status" => 0,
      "post_permission" => $new_permission,
      "post_time" => date('Y-m-d H:i:s'),
      "date" => date('Y-m-d'),
      "status" => 1);
}


$post_id = $obj->insertAndReturnID("dostums_post", $insert_post);

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

    $notification_sms = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a>  post something on his wall.";
    $notifistatus = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $notification_sms, "notification_type" => 1, "source" => "status.php - st:1", "date" => date('Y-m-d'), "status" => 1));


    $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));

    $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
    $get_country_id = $get_country_ids[0]->country_id;

    $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

    echo 1;
}
// [post something on wall end]


elseif ($st == 2) {
    $exlike = $obj->exists_multiple("dostums_likes", array("user_id" => $input_by, "post_id" => $post_id));
    
    if($exlike == 0 || $exlike == NULL){
        
        $insert_post = array("user_id" => $input_by,
            "post_id" => $post_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_likes", $insert_post);
        
        
                    $button =  "   
                        <button type='button' id='$post_id' class='sp-unlike def_button' onclick='un_like($post_id);'>
                            <span id='placeicon'>
                               <i class='fa fa-thumbs-down'></i>
                            </span>
                            <span id='post'> Unlike</span>
                        </button>
                       ";
        
            $totalLikes = '';   
            $totalLikesTextContent = '';
            $totalLikesdropdown = '';
            $totalLikesText = '';
            
            $countTotalLike = $obj->FlyQuery("SELECT count(id) AS totalLike FROM dostums_likes Where post_id = '$post_id' AND  status = '1'");
            if(!empty($countTotalLike)){
                foreach ($countTotalLike as $value) {
                    $totalLikes .= $value->totalLike;
               }
            } else {
                $totalLikes .= 0;
            }
            
            
            if($totalLikes != 0){
                
                $totalLikesTextContent .= "    
                                       <i class='fa fa-thumbs-up'></i>
                                       $totalLikes people liked this post
                                      ";
                
                $lis = '';
                $likesIDs2 = $obj->FlyQuery("SELECT user_id from dostums_likes WHERE post_id = '$post_id' ORDER BY id DESC");
               
                if(!empty($likesIDs2)){
                    foreach ($likesIDs2 as $lvalue) {
                                    $ides = $lvalue->user_id;
                                    $likesnames2 = $obj->FlyQuery("SELECT id, first_name, last_name from dostums_user WHERE id = '$ides' ");
                                    if(!empty($likesnames2)){
                                        foreach ($likesnames2 as $value) {
                                            $userid = $value->id;
                                            $full_name = $value->first_name . ' ' .  $value->last_name;
                                            $lis .= " <li><a href='profiles.php?user_id=".$userid." '>". $full_name ."</a></li><li style='margin:0px;' class='divider'></li> ";
                                        }
                                    }
                    }
                    if($totalLikes >= 10){
                        $lis .=  "<li><a href='home_view.php?view=".$post_id."'>See All</a></li>";
                    }
                }
                
                $totalLikesdropdown .= "<span class='dropdown'>
                                                        <a href='' class='dropdown-toggle' data-toggle='dropdown'>
                                                            & See who liked this post</i>
                                                            <span class='caret'></span>
                                                        </a>
                                                        <ul class='dropdown-menu'>
                                                          $lis
                                                        </ul>
                                    </span>
                                    ";
                
                $totalLikesText .= "
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <div class='share-panel'>
                                                  $totalLikesTextContent
                                                      $totalLikesdropdown
                                                </div>
                                           </div>
                                        </div>
                                   ";
                 
            }
        
        $return_array = array("output" => "success", "msg" => 'thanks', "button" => $button, "response" => $totalLikesText, "totalLikes" => $totalLikes);
        echo json_encode($return_array);
        exit();
    } else{
        $return_array = array("output" => "error", "msg" => 'you already liked!');
        echo json_encode($return_array);
        exit();
    }
    
}

elseif ($st == 3) {

    $insert_post = array("user_id" => $input_by,
        "post_id" => $post_id,
        "comment" => $msg,
        "date" => date('Y-m-d'),
        "status" => 1);
    $obj->insert("dostums_comment", $insert_post);
    //notification cmnt start
    //notification start
    //$obj->SelectAllByVal($table,$field,$val,$fetch);


    $cmnt_type = $obj->FlyQuery("SELECT a.id,a.page_id,df.name as page_name,a.group_id,dg.name as group_name,a.photo_id FROM dostums_post as a
                                   LEFT JOIN dostums_group as dg on dg.group_id=a.group_id
                                   LEFT JOIN dostums_fanpage as df on df.page_id=a.page_id WHERE a.id='" . $post_id . "'");
    if ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id == 0) {
        //post from profile
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = "on a <a href='view_post.php?post_id=" . $post_id . "'>post.</a>";
        } else {
            $cmntstring = "on a <a href='view_post.php?post_id=" . $post_id . "'>photo.</a>";
        }
    } elseif ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id != 0) {

        //post from group
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = "on a <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . "</a> Post.";
        } else {
            $cmntstring = "on a <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . "</a> photo.";
        }
    } elseif ($cmnt_type[0]->page_id != 0 && $cmnt_type[0]->group_id == 0) {

        //post from group
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = "on a <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> Post.";
        } else {
            $cmntstring = "on a <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> photo.";
        }
    }
    $comment = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> post a comment " . $cmntstring;

    $notificmnt = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $comment, "notification_type" => 4, "source" => "status.php - st:4", "date" => date('Y-m-d'), "status" => 4));
    //notification end
    //notification cmnt end
//    $post_cmnt=$obj->SelectAllbyVal("dostums_post","id",$post_id,"photo_id");
//    if ($post_cmnt==0)
//    {
//      $cmntstring="on a <a href='view_post.php?post_id=".$post_id."'>post.</a>";
//    }
// else
//     {
//      $cmntstring="on a <a href='view_post.php?post_id=".$post_id."'>photo.</a>";
//    }
//    $comment = "<a href='profile.php?user_id=".$input_by."'>".$dostums_user_name."</a> comment ".$cmntstring;
//    $notificomment = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $comment, "notification_type" => 4, "date" => date('Y-m-d'), "status" => 4));

    echo 1;
}

elseif ($st == 4) {

//    $insert_post = array("user_id" => $input_by,
//        "from_user_id" => $input_by,
//        "post_id" => $post_id,
//        "date" => date('Y-m-d'),
//        "status" => 1);
//
//    $obj->insert("dostums_post_share", $insert_post);
    //$obj->SelectAllByVal("dostums_post","id",$post_id,"user_id")
    $xpostdata = $obj->FlyQuery("SELECT id,user_id,group_id,page_id,from_user_id,to_user_id,post,photo_id,post_status,post_permission,post_time,share_id,date,status FROM dostums_post WHERE id='" . $post_id . "'");

    if ($xpostdata[0]->share_id != 0) {
        $share_post_id = $xpostdata[0]->share_id;
    } else {
        $share_post_id = $xpostdata[0]->id;
    }

    $insert_post_copy = array("user_id" => $input_by,
        "from_user_id" => $xpostdata[0]->user_id,
        "group_id" => $xpostdata[0]->group_id,
        "page_id" => $xpostdata[0]->page_id,
        "post" => $xpostdata[0]->post,
        "photo_id" => $xpostdata[0]->photo_id,
        "share_id" => $share_post_id,
        "post_status" => 1,
        "date" => date('Y-m-d'),
        "status" => $xpostdata[0]->status);

    $new_post_id=$obj->insertAndReturnID("dostums_post", $insert_post_copy);


    $cmnt_type = $obj->FlyQuery("SELECT a.id,a.page_id,df.name as page_name,a.group_id,dg.name as group_name,a.photo_id FROM dostums_post as a
                                   LEFT JOIN dostums_group as dg on dg.group_id=a.group_id
                                   LEFT JOIN dostums_fanpage as df on df.page_id=a.page_id WHERE a.id='" . $new_post_id . "'");
    if ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id == 0) {
        //post from profile
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = " a <a href='view_post.php?post_id=" . $post_id . "'>post.</a>";
        } else {
            $cmntstring = " a <a href='view_post.php?post_id=" . $post_id . "'>photo.</a>";
        }
    } elseif ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id != 0) {

        //post from group
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = " a post in <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . " Group</a>";
        } else {
            $cmntstring = " a photo in <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . " Group</a>";
        }
    } elseif ($cmnt_type[0]->page_id != 0 && $cmnt_type[0]->group_id == 0) {

        //post from group
        if ($cmnt_type[0]->photo_id == 0) {

            $cmntstring = " a post in <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> Page.";
        } else {
            $cmntstring = " a photo in <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> Page.";
        }
    }
    $comment = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> shared " . $cmntstring;

    $notificmnt = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $comment, "notification_type" => 4, "source" => "status.php - st:4", "date" => date('Y-m-d'), "status" => 4));




    echo 1;
}

elseif ($st == 5) {
    $exlike = $obj->exists_multiple("dostums_comment_likes", array("user_id" => $input_by, "post_id" => $post_id, "comment_id" => $comment_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "post_id" => $post_id,
            "comment_id" => $comment_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_comment_likes", $insert_post);

        //notification start
        //$obj->SelectAllByVal($table,$field,$val,$fetch);
        $cmnt_type = $obj->FlyQuery("SELECT a.id,a.page_id,df.name as page_name,a.group_id,dg.name as group_name,a.photo_id FROM dostums_post as a
                                   LEFT JOIN dostums_group as dg on dg.group_id=a.group_id
                                   LEFT JOIN dostums_fanpage as df on df.page_id=a.page_id WHERE a.id='" . $post_id . "'");
        if ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id == 0) {
            //post from profile
            if ($cmnt_type[0]->photo_id == 0) {

                $cmntstring = "on a <a href='view_post.php?post_id=" . $post_id . "'>post.</a>";
            } else {
                $cmntstring = "on a <a href='view_post.php?post_id=" . $post_id . "'>photo.</a>";
            }
        } elseif ($cmnt_type[0]->page_id == 0 && $cmnt_type[0]->group_id != 0) {

            //post from group
            if ($cmnt_type[0]->photo_id == 0) {

                $cmntstring = "on a <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . "</a> Post.";
            } else {
                $cmntstring = "on a <a href='group.php?group_id=" . $cmnt_type[0]->group_id . "'>" . $cmnt_type[0]->group_name . "</a> photo.";
            }
        } elseif ($cmnt_type[0]->page_id != 0 && $cmnt_type[0]->group_id == 0) {

            //post from group
            if ($cmnt_type[0]->photo_id == 0) {

                $cmntstring = "on a <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> Post.";
            } else {
                $cmntstring = "on a <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> photo.";
            }
        }
        $comment = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> post a comment like " . $cmntstring;

        $notificmnt = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $comment, "notification_type" => 3, "source" => "status.php - st:5", "date" => date('Y-m-d'), "status" => 5));
        //notification end
        $st = 1;
    } else {
        $insert_post = array("user_id" => $input_by,
            "post_id" => $post_id,
            "comment_id" => $comment_id);
        $obj->delete("dostums_comment_likes", $insert_post);
        $st = 0;
    }

    $countlikes = $obj->SelectAllByVal("dostums_comment_view", "id", $comment_id, "likes");

    if ($countlikes != 0) {
        $lk = $countlikes;
    } else {
        $lk = "";
    }

    $newcomlikearray = array("status" => $st, "like" => $lk);

    echo json_encode($newcomlikearray);
}

elseif ($st == 6) {

    $insert_post = array("user_id" => $input_by, "id" => $post_id);
    $obj->delete("dostums_post", $insert_post);

    $insert_post_comment = array("user_id" => $input_by, "post_id" => $post_id);
    $obj->delete("dostums_comment", $insert_post_comment);

    $insert_post_like = array("user_id" => $input_by, "post_id" => $post_id);
    $obj->delete("dostums_likes", $insert_post_like);

    $insert_post_share = array("user_id" => $input_by, "post_id" => $post_id);
    $obj->delete("dostums_post_share", $insert_post_share);

    $insert_comment_like = array("user_id" => $input_by, "post_id" => $post_id);
    $obj->delete("dostums_comment_likes", $insert_comment_like);

    echo 1;
}

 elseif ($st == 7) {

    $insert_post = array("user_id" => $input_by, "id" => $comment_id);
    if ($obj->delete("dostums_comment", $insert_post)) {
        echo 1;
    } else {
        echo 0;
    }
}

 elseif ($st == 8) {
    $chkpermission = $obj->exists_multiple("dostums_post_permission", array("user_id" => $input_by));
    if ($chkpermission == 0) {
        $insert_post = array("user_id" => $input_by, "post_permission" => $post_permission, "date" => date('Y-m-d'), "status" => 1);
        $obj->insert("dostums_post_permission", $insert_post);
        echo 1;
    } else {
        $insert_post = array("user_id" => $input_by, "post_permission" => $post_permission, "date" => date('Y-m-d'));
        echo $obj->update("dostums_post_permission", $insert_post);
    }
}

elseif ($st == 9) {
    $chkcountry = $obj->exists_multiple("dostums_country", array("country_code" => $country_code));
    if ($chkcountry == 0) {
        $get_country_id = $obj->insertAndReturnID("dostums_country", array("country_code" => $country_code));
        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));
    } else {
        $get_country_id = $obj->SelectAllByVal("dostums_country", "country_code", $country_code, "id");
        $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "country_id" => $get_country_id, "post_id" => 0, "date" => date('Y-m-d'), "status" => 1));
    }
    echo 1;
}

elseif ($st == 10) {



    echo 1;
}

 elseif ($st == 11) {
    $insert_post = array("user_id" => $input_by,
        "to_user_id" => $to_user,
        "post" => $msg,
        "photo_id" => 0,
        "post_status" => 0,
        "date" => date('Y-m-d'),
        "status" => 1);
    $post_id = $obj->insertAndReturnID("dostums_post", $insert_post);
    echo 1;
}

elseif ($st == 12) {
    $exlike = $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $input_by, "page_id" => $page_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "page_id" => $page_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_page_likes_view", $insert_post);
        //notification like start
        $page_name=$obj->SelectAllByVal("dostums_fanpage","page_id",$page_id,"name");
        $pagelike ="<a href='profile.php?user_id=".$input_by."'>".$dostums_user_name."</a> Likes <a href='page.php?page_id=".$page_id."'>".$page_name."</a>";
        $notifipagelike = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" =>0, "notification" => $pagelike, "notification_type" => 10, "date" => date('Y-m-d'), "status" => 10));
        //notification like end
        echo 1;
    } else {
        $insert_post = array("user_id" => $input_by, "page_id" => $page_id);
        $obj->delete("dostums_page_likes_view", $insert_post);
        echo 0;
    }
}

elseif ($st == 13) {
    echo $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $input_by, "page_id" => $page_id));
}

 elseif ($st == 14) {
    $exlike = $obj->exists_multiple("dostums_group_members", array("user_id" => $input_by, "group_id" => $group_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "group_id" => $group_id,
            "input_by" => $input_by,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_group_members", $insert_post);
        // notification start
        $group_name=$obj->SelectAllByVal("dostums_group","group_id",$group_id,"name");
        $groupjoin = "<a href='profiles.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> join <a href='group.php?group_id=" . $group_id . "'>" . $group_name . "</a> group.";
        $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" =>0, "notification" => $groupjoin, "notification_type" => 11, "date" => date('Y-m-d'), "status" => 11));
        //notification end
        echo 1;
    } else {
        $insert_post = array("user_id" => $input_by, "group_id" => $group_id);
        $obj->delete("dostums_group_members", $insert_post);
        echo 0;
    }
}

elseif ($st == 15) {
    echo $obj->exists_multiple("dostums_group_members", array("user_id" => $input_by, "group_id" => $group_id));
}

elseif ($st == 16) {
    $exlike = $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "group_id" => $group_id,
            "input_by" => $input_by,
            "date" => date('Y-m-d'),
            "status" => 2);
        $obj->insert("dostums_group_members", $insert_post);
        echo 2;
    } else {
        $insert_post = array("user_id" => $user_id, "group_id" => $group_id);
        $obj->delete("dostums_group_members", $insert_post);
        echo 0;
    }
}

elseif ($st == 17) {
    echo $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
}

elseif ($st == 18) {
    $exlike = $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $user_id, "page_id" => $page_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "page_id" => $page_id,
            "date" => date('Y-m-d'),
            "status" => 0);
        $obj->insert("dostums_page_likes_view", $insert_post);
        echo 1;
    } else {
        $insert_post = array("user_id" => $user_id, "page_id" => $page_id);
        $obj->delete("dostums_page_likes_view", $insert_post);
        echo 0;
    }
}

elseif ($st == 19) {
    echo $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $user_id, "page_id" => $page_id, "status" => 1));
}

elseif ($st == 20) {
    $exlike = $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $user_id, "page_id" => $page_id));

    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "page_id" => $page_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_page_likes_view", $insert_post);

        echo 1;
    } else {
        $sqllikep = $obj->FlyQuery("SELECT status,user_id,page_id FROM dostums_page_likes_view WHERE user_id='" . $user_id . "' AND page_id='" . $page_id . "'");
        $sqlfindst = $sqllikep[0]->status;
        if ($sqlfindst == 2) {
            $insert_post = array("user_id" => $user_id, "page_id" => $page_id);
            $obj->updateUsingMultiple("dostums_page_likes_view", array("status" => 1), $insert_post);
            echo 1;
        } else {
            $insert_post = array("user_id" => $user_id, "page_id" => $page_id);
            $obj->delete("dostums_page_likes_view", $insert_post);
            echo 0;
        }
    }
}

elseif ($st == 21) {
    $exlike = $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "group_id" => $group_id,
            "input_by" => $input_by,
            "date" => date('Y-m-d'),
            "status" => 3);
        $obj->insert("dostums_group_members", $insert_post);

        echo 3;
    } elseif ($exlike == 1) {
        $chkstatus = $obj->SelectAllByVal2("dostums_group_members", "user_id", $user_id, "group_id", $group_id, "status");

        if ($chkstatus == 2) {
            $update_post = array("user_id" => $user_id,
                "group_id" => $group_id);
            $obj->updateUsingMultiple("dostums_group_members", array("status" => 1), $update_post);
            echo 1;
        } elseif ($chkstatus == 1) {
            $insert_post = array("user_id" => $user_id, "group_id" => $group_id);
            $obj->delete("dostums_group_members", $insert_post);
            echo 0;
        }
    } else {
        $insert_post = array("user_id" => $user_id, "group_id" => $group_id);
        $obj->delete("dostums_group_members", $insert_post);
        echo 0;
    }
}

elseif ($st == 22) {

    $exlike = $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
    if ($exlike == 1) {
        if ($status == 1) {
            $update_post = array("user_id" => $user_id, "group_id" => $group_id);
            $obj->updateUsingMultiple("dostums_group_members", array("status" => 1), $update_post);
            echo 1;
        } else {
            $insert_post = array("user_id" => $user_id, "group_id" => $group_id);
            $obj->delete("dostums_group_members", $insert_post);
            echo 0;
        }
    }
}

elseif ($st == 23) {

    $exlike = $obj->exists_multiple("dostums_group_members", array("user_id" => $user_id, "group_id" => $group_id));
    if ($exlike == 1) {
        if ($status == 4) {

            $update_post = array("user_id" => $user_id, "group_id" => $group_id);
            $obj->updateUsingMultiple("dostums_group_members", array("status" => 4), $update_post);
            echo 4;
        } else {
            $insert_post = array("user_id" => $user_id, "group_id" => $group_id);
            $obj->delete("dostums_group_members", $insert_post);
            echo 0;
        }
    }
}

elseif ($st == 24) {
    $exlike = $obj->exists_multiple("dostums_group_admin", array("user_id" => $user_id, "group_id" => $group_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "group_id" => $group_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_group_admin", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $chkstatus = $obj->SelectAllByVal2("dostums_group_admin", "user_id", $user_id, "group_id", $group_id, "status");

        if ($chkstatus == 1) {
            echo 2;
        }
    } else {
        //$insert_post=array("user_id"=>$input_by,"group_id"=>$group_id);
        //$obj->delete("dostums_group_members",$insert_post);
        echo 0;
    }
}

elseif ($st == 25) {
    $exlike = $obj->exists_multiple("dostums_page_likes_view", array("user_id" => $user_id, "page_id" => $page_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "page_id" => $page_id,
            "date" => date('Y-m-d'),
            "status" => 2);
        $obj->insert("dostums_page_likes_view", $insert_post);

        echo 2;
    } else {
        $insert_post = array("user_id" => $user_id, "page_id" => $page_id);
        $obj->delete("dostums_page_likes_view", $insert_post);
        echo 0;
    }
}

elseif ($st == 26) {
    $exlike = $obj->exists_multiple("dostums_friends_blocklist", array("uid" => $input_by, "to_uid" => $user_id, "status"));
    if ($exlike == 0) {
        $insert_post = array("uid" => $input_by,
            "to_uid" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_friends_blocklist", $insert_post);
        echo 1;
    } else {
        $insert_post = array("uid" => $input_by, "to_uid" => $user_id);
        $obj->delete("dostums_friends_blocklist", $insert_post);
        echo 0;
    }
}

elseif ($st == 27) {

    //echo "SELECT id FROM dostums_friend WHERE uid='$input_by' AND to_uid='$user_id'";
    $fid = $obj->SelectAllByVal2("dostums_friend", "uid", $input_by, "to_uid", $user_id, "id");
    $fidd = $obj->SelectAllByVal2("dostums_friend", "to_uid", $input_by, "uid", $user_id, "id");
    $insert_post = array("id" => $fid);

    $insert_postd = array("id" => $fidd);

    //echo $user_id;
    $obj->delete("dostums_friend", $insert_postd);

    $insert_postT2 = array("uid" => $input_by, "to_uid" => $user_id);
    $obj->delete("dostums_friends_blocklist", $insert_postT2);

    if ($obj->delete("dostums_friend", $insert_post)AND $obj->delete("dostums_friends_blocklist", $insert_postT2)) {

        echo 1;
    } else {
        echo 0;
    }
}

elseif ($st == 28) {
    $exlike = $obj->exists_multiple("dostums_hidden_timeline_photos", array("user_id" => $user_id, "photo_id" => $photo_id, "status"));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $user_id,
            "photo_id" => $photo_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_hidden_timeline_photos", $insert_post);
        echo 1;
    } else {
        $insert_post = array("user_id" => $user_id, "photo_id" => $photo_id);
        $obj->delete("dostums_hidden_timeline_photos", $insert_post);
        echo 0;
    }
}


elseif ($st == 29) {

    $fid = $obj->SelectAllByVal2("dostums_post", "user_id", $user_id, "photo_id", $photo_id, "id");
    $insert_post = array("id" => $fid);

    $obj->delete("dostums_post", $insert_post);

    if ($obj->delete("dostums_post", $insert_post)) {
        echo 1;
    } else {
        echo 0;
    }
}

elseif ($st == 30) {
    $exlike = $obj->exists_multiple("dostums_trusted_contact", array("user_id" => $input_by, "trusted_contact_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "trusted_contact_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_trusted_contact", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $rbid = $obj->SelectAllByVal2("dostums_trusted_contact", "user_id", $input_by, "trusted_contact_id", $user_id, "id");
        $insert_post = array("id" => $rbid);

        $obj->delete("dostums_trusted_contact", $insert_post);
        echo 0;
    }
}

elseif ($st == 31) {
    $tcallid = $obj->SelectAllByVal2("dostums_trusted_contact", "user_id", $input_by, "status", $status, "id");
    $insert_post = array("id" => $tcallid);

    $obj->delete("dostums_trusted_contact", $insert_post);
    echo 0;
}

elseif ($st == 32) {
    $exlike = $obj->exists_multiple("dostums_legacy_contact", array("user_id" => $input_by, "legacy_contact_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "legacy_contact_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_legacy_contact", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $rbid = $obj->SelectAllByVal2("dostums_legacy_contact", "user_id", $input_by, "legacy_contact_id", $user_id, "id");
        $insert_post = array("id" => $rbid);

        $obj->delete("dostums_legacy_contact", $insert_post);
        echo 0;
    }
}

elseif ($st == 33) {
    $exlike = $obj->exists_multiple("dostums_restricted_list", array("user_id" => $input_by, "restricted_list__id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "restricted_list__id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_restricted_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $rbid = $obj->SelectAllByVal2("dostums_restricted_list", "user_id", $input_by, "restricted_list__id", $user_id, "id");
        $insert_post = array("id" => $rbid);

        $obj->delete("dostums_restricted_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 34) {
    $exlike = $obj->exists_multiple("dostums_users_block_list", array("user_id" => $input_by, "user_block_list_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "user_block_list_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_users_block_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $dublid = $obj->SelectAllByVal2("dostums_users_block_list", "user_id", $input_by, "user_block_list_id", $user_id, "id");
        $insert_post = array("id" => $dublid);

        $obj->delete("dostums_users_block_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 35) {
    $exlike = $obj->exists_multiple("dostums_users_message_block_list", array("user_id" => $input_by, "user_message_block_list_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "user_message_block_list_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_users_message_block_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $dumblid = $obj->SelectAllByVal2("dostums_users_message_block_list", "user_id", $input_by, "user_message_block_list_id", $user_id, "id");
        $insert_post = array("id" => $dumblid);

        $obj->delete("dostums_users_message_block_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 36) {


    $insert_post = array("user_id" => $input_by,
        "group_id" => $group_id,
        "from_user_id" => $input_by,
        "post" => $msg,
        "photo_id" => 0,
        "post_status" => 0,
        "date" => date('Y-m-d'),
        "status" => 1);
    $post_id = $obj->insertAndReturnID("dostums_post", $insert_post);
    $groupname = $obj->SelectAllByVal("dostums_group", "group_id", $group_id, "name");
    //notification group status start
    $groupstatus = "<a href='profiles.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> posted a group status on <a herf='group.php?group_id=" . $group_id . "'>" . $groupname . "</a>";

    $notifigroupstatus = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "group_id" => $group_id, "notification" => $groupstatus, "notification_type" => 6, "date" => date('Y-m-d'), "status" => 6));
    //notification  group status end
    $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

    if ($permission == "") {
        $new_permission = 1;
    } else {
        $new_permission = $permission;
    }

    $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
    $get_country_ids = $obj->FlyQuery("SELECT IFNULL(country_id,0) as country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
    $get_country_id = $get_country_ids[0]->country_id;

    $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

    echo 1;
}

elseif ($st == 37) {
    $exlike = $obj->exists_multiple("dostums_block_app_invites_list", array("user_id" => $input_by, "app_invites_block_list" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "app_invites_block_list" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_block_app_invites_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $dbailid = $obj->SelectAllByVal2("dostums_block_app_invites_list", "user_id", $input_by, "app_invites_block_list", $user_id, "id");
        $insert_post = array("id" => $dbailid);

        $obj->delete("dostums_block_app_invites_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 38) {


    $insert_post = array("user_id" => $input_by,
        "page_id" => $page_id,
        "from_user_id" => $input_by,
        "post" => $msg,
        "photo_id" => 0,
        "post_status" => 0,
        "date" => date('Y-m-d'),
        "status" => 1);
    $post_id = $obj->insertAndReturnID("dostums_post", $insert_post);

    $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");

    if ($permission == "") {
        $new_permission = 1;
    } else {
        $new_permission = $permission;
    }

    $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
    //page notification start here
    //$fanpage = SelectAllByVal("dostums_fanpage", "page_id", $page_id, "name");
    //$//pagepoststatus = "<a href='profiles.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> posted something on   <a href='page.php?page_id=" . $page_id . "'>" . $fanpage . "</a> status";
    //$notifipagepoststatus = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "page_id" => $page_id, "notification" => $pagepoststatus, "notification_type" => 7, "date" => date('Y-m-d'), "status" => 7));
    //page notification end here



    $cmnt_type = $obj->FlyQuery("SELECT a.id,a.page_id,df.name as page_name,a.photo_id FROM dostums_post as a
        LEFT JOIN dostums_fanpage as df on df.page_id=a.page_id WHERE a.id='" . $post_id . "'");
    if ($cmnt_type[0]->page_id != 0) {

        //post from group
        $cmntstring = "on <a href='page.php?page_id=" . $cmnt_type[0]->page_id . "'>" . $cmnt_type[0]->page_name . "</a> wall.";
        $comment = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a> posted something " . $cmntstring;
        $notificmnt = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $comment, "notification_type" => 7, "source" => "status.php - st:38", "date" => date('Y-m-d'), "status" => 7));
    }






    $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
    $get_country_id = $get_country_ids[0]->country_id;

    $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

    echo 1;
}

elseif ($st == 39) {
    $exlike = $obj->exists_multiple("dostums_event_invite_block_list", array("user_id" => $input_by, "event_block_list_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "event_block_list_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostums_event_invite_block_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $deiblid = $obj->SelectAllByVal2("dostums_event_invite_block_list", "user_id", $input_by, "event_block_list_id", $user_id, "id");
        $insert_post = array("id" => $deiblid);

        $obj->delete("dostums_event_invite_block_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 40) {
    $exlike = $obj->exists_multiple("dostumas_blocked_app_list", array("user_id" => $input_by, "blocked_app_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "blocked_app_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostumas_blocked_app_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $dbalid = $obj->SelectAllByVal2("dostumas_blocked_app_list", "user_id", $input_by, "blocked_app_id", $user_id, "id");
        $insert_post = array("id" => $dbalid);

        $obj->delete("dostumas_blocked_app_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 41) {
    $exlike = $obj->exists_multiple("dostumas_blocked_page_list", array("user_id" => $input_by, "blocked_page_id" => $user_id));
    if ($exlike == 0) {
        $insert_post = array("user_id" => $input_by,
            "blocked_page_id" => $user_id,
            "date" => date('Y-m-d'),
            "status" => 1);
        $obj->insert("dostumas_blocked_page_list", $insert_post);
        echo 1;
    } elseif ($exlike == 1) {
        $dbplid = $obj->SelectAllByVal2("dostumas_blocked_page_list", "user_id", $input_by, "blocked_page_id", $user_id, "id");
        $insert_post = array("id" => $dbplid);

        $obj->delete("dostumas_blocked_page_list", $insert_post);
        echo 0;
    }
}

elseif ($st == 42) {
    $chkpermission = $obj->exists_multiple("dostums_post_permission_record", array("post_id" => $post_id));
    if ($chkpermission == 0) {
        $obj->insert("dostums_post_permission_record", array("user_id" => $user_id, "post_id" => $post_id, "permission_id" => $stp));
        echo 1;
    } else {
        $obj->updateUsingMultiple("dostums_post_permission_record", array("permission_id" => $stp), array("post_id" => $post_id));
        echo 1;
    }
}

elseif ($st == 43) {
    $chkpermission = $obj->exists_multiple("dostums_post_permission_record", array("post_id" => $post_id, "page_id" => $page_id));
    if ($chkpermission == 0) {
        $obj->insert("dostums_post_permission_record", array("user_id" => $user_id, "post_id" => $post_id, "page_id" => $page_id, "permission_id" => $stp, "date" => date('Y-m-d'), "status" => 1));
        echo 1;
    } else {
        $obj->updateUsingMultiple("dostums_post_permission_record", array("permission_id" => $stp, "date" => date('Y-m-d'), "status" => 1), array("post_id" => $post_id, "page_id" => $page_id));
        echo 1;
    }
}

elseif ($st == 44) {
    $chkpermission = $obj->exists_multiple("dostums_post_permission_record", array("post_id" => $post_id, "group_id" => $group_id));
    if ($chkpermission == 0) {
        $obj->insert("dostums_post_permission_record", array("user_id" => $user_id, "post_id" => $post_id, "group_id" => $group_id, "permission_id" => $stp, "date" => date('Y-m-d'), "status" => 1));
        echo 1;
    } else {
        $obj->updateUsingMultiple("dostums_post_permission_record", array("permission_id" => $stp, "date" => date('Y-m-d'), "status" => 1), array("post_id" => $post_id, "group_id" => $group_id));
        echo 1;
    }
}

//[ Remove tag start]
else if($st == 45){
          $table = "dostums_tags";
          $userID = $_POST['userID'];
          $postID = $_POST['postID'];

          if ($obj->exists_multiple("dostums_tags", array("post_id" => $postID, "to_uid" => $userID)) == 1){

            // $update = array("post_id" => $postID, "to_uid" => $userID);
            // $UpdateArray = array("to_uid" => $userID.'-removed', "date" => date('Y-m-d'), "status" => 2);
            // $updateMerge = array_merge($update, $UpdateArray);

               $update = $obj->FlyQuery("UPDATE `dostums_tags` SET `to_uid`='$userID',
                                        `date`=date('Y-m-d'),`status`=2
                                         WHERE `post_id` = '$postID' AND `to_uid` = '$userID'");

            // if($update ){
              $return_array = array("output" => "success", "msg" => "Tag Removed.");
              echo json_encode($return_array);
              exit();
          //   } else{
          //     $return_array = array("output" => "error", "msg" => "Not removed");
          //     echo json_encode($return_array);
          //    exit();
          //   }
          }
}
//[ Remove tag end]


elseif ($st == 88) {


    $insert_post = array("id" => $post_id,"user_id" => $input_by,
        "from_user_id" => $input_by,
        "post" => $msg,
        "photo_id" => 0,
        "post_status" => 0,
        "date" => date('Y-m-d'),
        "status" => 1);
    $obj->update("dostums_post", $insert_post);
    $permission = $obj->SelectAllByVal2("dostums_post_permission", "user_id", $input_by, "date", date('Y-m-d'), "post_permission");
    //notification status start
    $notification_sms = "<a href='profile.php?user_id=" . $input_by . "'>" . $dostums_user_name . "</a>  post something on his wall and updated now.";
    $notifistatus = $obj->insert("dostums_notifications", array("post_id" => $post_id,"user_id" => $input_by,"notification" => $notification_sms, "notification_type" => 1, "source" => "status.php - st:1", "date" => date('Y-m-d'), "status" => 1));
    //notification status end
    if ($permission == "") {
        $new_permission = 1;
    } else {
        $new_permission = $permission;
    }
    $obj->update("dostums_post_permission_record", array("post_id" =>$post_id,"user_id" => $input_by,"permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
    $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
    $get_country_id = $get_country_ids[0]->country_id;
    $obj->insert("dostums_post_location_record", array("post_id" => $post_id,"user_id" => $input_by,"country_id" => $get_country_id,"date" => date('Y-m-d'), "status" => 1));

    echo 1;
}

elseif ($st == 89) {
    @unlink("../profile/".$photo);
    $obj->delete("dostums_photo",array("id"=>$photo_id));
    $obj->update("dostums_post",array("id"=>$post_id,"photo_id"=>"0"));
    echo 1;
}

elseif($st == 90){
//   $like_id = $_POST['post_id'];
    
   $delete_post = array("user_id" => $input_by, "post_id" => $post_id);
   $delete = $obj->delete("dostums_likes", $delete_post);
   
   if($delete){
       
        $button =  " <button type='button' id='$post_id' class='sp-unlike def_button' onclick='like($post_id);'>
                            <span id='placeicon'>
                               <i class='fa fa-thumbs-up'></i>
                            </span>
                            <span id='post'> Like</span>
                        </button>
                       ";
       
        $totalLikes = '';   
            $totalLikesTextContent = '';
            $totalLikesdropdown = '';
            $totalLikesText = '';
            
            $countTotalLike = $obj->FlyQuery("SELECT count(id) AS totalLike FROM dostums_likes Where post_id = '$post_id' AND  status = '1'");
            if(!empty($countTotalLike)){
                foreach ($countTotalLike as $value) {
                    $totalLikes .= $value->totalLike;
               }
            } else {
                $totalLikes .= 0;
            }
            
            
            if($totalLikes != 0){
                
                $totalLikesTextContent .= "    
                                       <i class='fa fa-thumbs-up'></i>
                                       $totalLikes people liked this post
                                      ";
                
                $lis = '';
                $likesIDs2 = $obj->FlyQuery("SELECT user_id from dostums_likes WHERE post_id = '$post_id' ORDER BY id DESC");
               
                if(!empty($likesIDs2)){
                    foreach ($likesIDs2 as $lvalue) {
                                    $ides = $lvalue->user_id;
                                    $likesnames2 = $obj->FlyQuery("SELECT id, first_name, last_name from dostums_user WHERE id = '$ides' ");
                                    if(!empty($likesnames2)){
                                        foreach ($likesnames2 as $value) {
                                            $userid = $value->id;
                                            $full_name = $value->first_name . ' ' .  $value->last_name;
                                            $lis .= " <li><a href='profiles.php?user_id=".$userid." '>". $full_name ."</a></li><li style='margin:0px;' class='divider'></li> ";
                                        }
                                    }
                    }
                    if($totalLikes >= 10){
                        $lis .=  "<li><a href='home_view.php?view=".$post_id."'>See All</a></li>";
                    }
                }
                
                $totalLikesdropdown .= "<span class='dropdown'>
                                                        <a href='' class='dropdown-toggle' data-toggle='dropdown'>
                                                            & See who liked this post</i>
                                                            <span class='caret'></span>
                                                        </a>
                                                        <ul class='dropdown-menu'>
                                                          $lis
                                                        </ul>
                                    </span>
                                    ";
                
                $totalLikesText .= "
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <div class='share-panel'>
                                                  $totalLikesTextContent
                                                      $totalLikesdropdown
                                                </div>
                                           </div>
                                        </div>
                                   ";
                 
            }
        
       $return_array = array("output" => "success", "msg" => 'if con', "button" => $button, "response" => $totalLikesText, "totalLikes" => $totalLikes);
        echo json_encode($return_array);
        exit();
   } else {
        $return_array = array("output" => "error", "msg" => 'else con');
        echo json_encode($return_array);
        exit();
   }
}

// [for normal edit post with tagname start]
elseif ($st == 91) {

  $post_id = $_POST['post_id'];
  $msg = $_POST['msg'];
  @$tagFriend = $_POST['names'];
  $permission = $_POST['permission'];


  if ($permission == "") {
      $new_permission = 1;
  } else {
      $new_permission = $permission;
  }


  $update_post = array("post" => $msg,
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


  // $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));
  //
  //
  $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
  $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
  $get_country_id = $get_country_ids[0]->country_id;

  $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

  echo '1';
}
// [for normal edit post  with tagname end]

// [for normal edit post without tagname start]
elseif ($st == 92) {

  $post_id = $_POST['post_id'];
  $msg = $_POST['msg'];
  $permission = $_POST['permission'];


  if ($permission == "") {
      $new_permission = 1;
  } else {
      $new_permission = $permission;
  }


  $update_post = array("post" => $msg,
                       "post_status" => 1,
                       "post_permission" => $new_permission,
                       "post_time" => date('Y-m-d H:i:s'),
                       "date" => date('Y-m-d'), "status" => 1);
                      //  print_r($update_post);
   $update_id = $obj->updateUsingMultiple("dostums_post", $update_post, array("id" => $post_id));
   $delete_tags = array( "post_id" => $post_id);
   $deleted = $obj->delete("dostums_tags", $delete_tags);

  // $notifiimage = $obj->insert("dostums_notifications", array("user_id" => $input_by, "post_id" => $post_id, "notification" => $image, "notification_type" => 5, "date" => date('Y-m-d'), "status" => 5));
  //
  //
  $obj->insert("dostums_post_permission_record", array("user_id" => $input_by, "post_id" => $post_id, "permission_id" => $new_permission, "date" => date('Y-m-d'), "status" => 1));
  $get_country_ids = $obj->FlyQuery("SELECT country_id FROM dostums_post_location_record WHERE user_id='" . $input_by . "' AND date='" . date('Y-m-d') . "' ORDER by id DESC LIMIT 1");
  $get_country_id = $get_country_ids[0]->country_id;

  $obj->insert("dostums_post_location_record", array("user_id" => $input_by, "post_id" => $post_id, "country_id" => $get_country_id, "date" => date('Y-m-d'), "status" => 1));

  echo '1';
}
// [for normal edit post  without tagname end]

 else {
    echo 0;
}
?>
