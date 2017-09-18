<?php
include('../class/auth.php');
$new_user_id = $input_by;

$item_per_page = 5;
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);


//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
    header('HTTP/1.1 500 Invalid page number!');
    exit;
}


//get current starting point of records
$position = (($page_number-1) * $item_per_page);


include('../class/extraClass.php');
$extra = new SiteExtra();


$mysqlis = new mysqli("localhost","root", "", "sulsocial");

$results = $obj->FlyQueryWithLimit("SELECT
                                  dp.id AS postID,
                                  dp.user_id AS postUserID,
                                  dp.post,
                                  dp.photo_id,
                                  dp.`post_permission` AS postPermission,
                                  dp.share_id,
                                  dp.post_status,
                                  dp.group_id,
                                  dp.page_id,
                                  dp.status,
                                  dp.from_user_id,
                                  dp.to_user_id,
                                  DATE_FORMAT(dp.post_time, '%l:%i %p %b %e, %Y') date


                                FROM dostums_post AS dp

                                WHERE (dp.`user_id` = '".$new_user_id."'
                                         AND (dp.status = '1' OR dp.status = '3' OR dp.status = '4')
                                      )
                                      OR dp.id IN ( SELECT
                                                    dt.post_id
                                                    FROM dostums_tags AS dt
                                                    WHERE (dt.uid = '".$new_user_id."' OR dt.to_uid = '".$new_user_id."')
                                                          AND dt.status='1'
                                                  )
                                      OR dp.id IN ( SELECT
                                                    a.id

                                                    FROM dostums_post AS a
                                                    WHERE (
                                                            (a.to_user_id = '".$new_user_id."' AND a.post_status = '2')
                                                             AND a.status = '2'
                                                          )
                                                          OR
                                                          (
                                                            (a.from_user_id = '".$new_user_id."' AND a.post_status = '1')
                                                             AND a.status = '2'
                                                          )
                                                   )  ORDER BY dp.id DESC LIMIT :start, :end ",$position,$item_per_page);






if(!empty($results)){
    foreach ($results as $post) {
        $postID = $post->postID;
        $new_post_head_id = $post->postID . "statushead" . time();
        $postUserID = $post->postUserID;
        @$postWriting = $post->post;
        @$photoID = $post->photo_id;
        @$postPermission = $post->postPermission;
        @$shareID = $post->share_id;
        @$share_count = $post->share_count;
        @$post_status = $post->post_status;
        @$status = $post->status;
        @$groupID = $post->group_id;
        @$pageID = $post->page_id;
        $sharedDate = $post->date;
        $first_name = $obj->SelectAllByVal("dostums_user","id",$postUserID,"first_name");
        $last_name = $obj->SelectAllByVal("dostums_user","id",$postUserID,"last_name");
        $full_name = $first_name . ' ' . $last_name;
        
        /////////
        $post_show_hide = '';
        if($postUserID != $new_user_id && $postPermission == '3'){
            $post_show_hide .= "<div class='col-xs-12 col-sm-12 ' style='display:none;visibility:hidden;'>";
        } else {
            $post_show_hide .= "<div class='col-xs-12 col-sm-12 ' style='padding-right:0px;padding-left:0px; '>";
        }
        /////////
        
        /////////
        if(!empty($postUserID)){
                $thumbphotoid = $obj->SelectAllByVal2("dostums_profile_photo","user_id",$postUserID,"status", '2' , "photo_id");
                $userphotoname = '';
                if(!empty($thumbphotoid)){
                    $userphotoname .= $obj->SelectAllByVal('dostums_photo','id',$thumbphotoid,'photo');
                } else {
                    $userphotoname .= 'default-user.png';
                }
        }
        /////////
        
        /////////
        $header_text = '';
        $share_content = '';
        if($shareID != '0'){
            $header_text .= '<span style="color:#777;">Shared Something</span>';
            
            $sharePostData = $obj->FlyQuery("SELECT
                                                                   dp.id AS postID,
                                                                   dp.user_id AS postUserID,
                                                                   dp.post,
                                                                   dp.photo_id,
                                                                   dp.`post_permission` AS postPermission,
                                                                   dp.share_id,
                                                                   dp.post_status,
                                                                   dp.group_id,
                                                                   dp.page_id,
                                                                   dp.status,
                                                                   dp.from_user_id,
                                                                   dp.to_user_id,
                                                                   DATE_FORMAT(dp.post_time, '%l:%i %p %b %e, %Y') date

                                                                  FROM dostums_post AS dp

                                                                  WHERE dp.id = '".$shareID."'
                                                                    AND (dp.status <> '0' OR dp.status <> '5')
                                    ");
            
             if(!empty($sharePostData)){
                    foreach ($sharePostData as $svalue) {
                                            $sphotoID = $svalue->postID;
                                            $spostUserID = $svalue->postUserID;
                                            $spost = $svalue->post;
                                            $sphoto_id = $svalue->photo_id;
                                            $spostPermission = $svalue->postPermission;
                                            $sshare_id = $svalue->share_id;
                                            $spost_status = $svalue->post_status;
                                            $sstatus = $svalue->status;
                                            $sfrom_user_id = $svalue->from_user_id;
                                            $sto_user_id = $svalue->to_user_id;
                                            $sdate = $svalue->date;
                                            $sfirst_name = $obj->SelectAllByVal("dostums_user","id",$spostUserID,"first_name");
                                            $slast_name = $obj->SelectAllByVal("dostums_user","id",$spostUserID,"last_name");

                                            $sfull_name = $sfirst_name . ' ' . $slast_name;
                                            
                                            
                                            $share_user_photo = '';
                                            if(!empty($spostUserID)){
                                                $thumbphotoid = $obj->SelectAllByVal2("dostums_profile_photo","user_id",$spostUserID,"status", '2' , "photo_id");
                                                if(!empty($thumbphotoid)){ 
                                                         $photoname = $obj->SelectAllByVal('dostums_photo','id',$thumbphotoid,'photo');
                                                    $share_user_photo = " 
                                                                        <a href='./profiles.php?user_id=$spostUserID'>
                                                                          <img class='img-circle pull-left  img-responsive' src='./profile/$photoname' alt='user3'>
                                                                        </a>
                                                                        ";
                                                } else {
                                                    $share_user_photo = " 
                                                                        <a href='./profiles.php?user_id=$spostUserID'>
                                                                            <img class='img-circle pull-left  img-responsive' src='./images/user/default-user.png' alt='user3'>
                                                                        </a>
                                                                        ";
                                                }
                                            }   
                                            
                                            
                                             $s_user_name = '';
                                            if(!empty($sfull_name)){
                                                $s_user_name .= " 
                                                                <a href='./profiles.php?user_id=$spostUserID'>
                                                                   <span style='color:#2c99ce;font-weight:bold;'>$sfull_name</span>
                                                                </a>
                                                                ";
                                            }
                                            
                                            $spost_text = '';
                                            if(!empty($spost)){
                                                $spost_text .= $spost;
                                            }
                                            
                                            $spost_img = '';
                                            if(!empty($sphoto_id)){
                                                $img = $obj->SelectAllByVal('dostums_photo','id',$sphoto_id,'photo');
                                                $spost_img .= " <img src='./profile/$img' class='img-responsive' alt=''> ";
                                            }
                                            
                                            
                        $share_content .= " <div style='border:1px solid #ededed; padding:12px;'>
                                                <div class='row'>
                                                   <div class='col-md-2 col-xs-2'>
                                                   $share_user_photo
                                                   </div>
                                                   
                                                   <div class='col-md-10 col-xs-10'>
                                                      <h5>
                                                        $s_user_name
                                                        
                                                        <span style='color:#777;'>Posted Something</span><br/>
                                                        <span style='color:#777;'> 
                                                           <span>
                                                           $sdate
                                                           </span>
                                                      </h5>
                                                    </div>
                                                   
                                                    <div class='col-xs-12' style='padding:15px;'>
                                                       <p>$spost_text</p> <br/>
                                                        $spost_img
                                                    </div>

                                                </div>
                                            </div>    
                                          ";
                    }
             } else {
                      $share_content .=  "Share data problem in load.";
             }
             
        } else{
            if($post_status == '5'){
                $header_text .= '<span class="text-muted ">with </span>';
                $tags = $obj->FlyQuery("SELECT to_uid FROM dostums_tags WHERE post_id = '$postID' AND status = '1' ");
                if(!empty($tags)){
                  foreach ($tags AS $tagToIdValue) {
                      $tagIDES = $tagToIdValue->to_uid;
                      $usernames = $obj->FlyQuery("SELECT id,CONCAT(first_name,' ',last_name ) AS fullname FROM dostums_user WHERE id = '$tagIDES' ");
                  
                      if(!empty($usernames)){
                        foreach ($usernames as $uName) {
                                    $tagNames =  $uName->fullname;
                                    $id =  $uName->id;
                                    $header_text .= "<a class='_3rdUser' href='./profiles.php?user_id=$id'>$tagNames , </a>";
                        }        
                      }
                  }
                }
            
            } else{
                $header_text .= '<span style="color:#777;">Posted Something</span>';
            }
        }
        /////////
        
        
        ////////
        $showpost_permission = '';
        if($postPermission == '1'){
            $showpost_permission .= '<i class="fa fa-globe" aria-hidden="true"></i>';
        } else if($postPermission == '2') {
            $showpost_permission .= '<i class="fa fa-users" aria-hidden="true"></i>';
        } else if($postPermission == '3') {
            $showpost_permission .= '<i class="fa fa-lock" aria-hidden="true"></i>';
        } else if($postPermission == '0'){
            $showpost_permission .= '<i class="fa fa-globe" aria-hidden="true"></i>';
        } else{
            
        }
        ////////
        
        
        ////////
        $actionLi = '';
        if(($postUserID == $new_user_id && $post_status != 5) OR ($postUserID == $new_user_id && $post_status == 5)){
            $actionLi .= "    
                            <li role='presentation'>
                                <a href='home_edit.php?edit=$postID' role='menuitem' tabindex='-1'>
                                   <div class='post-top-dropdown'>
                                      <div>Edit post</div>
                                      <div class='text-muted'>Edit the basic content of your post</div>
                                   </div>
                                </a>
                            </li>
                            <li role='presentation'>
                                <a onclick='PostActionButton1_hide($postID)' role='menuitem' tabindex='-1' href=''>
                                    <div class='post-top-dropdown'>
                                        <div>Hide from timeline</div>
                                        <div class='text-muted'>Temporary hide this post</div>
                                     </div>
                                 </a>
                            </li>
                            <li role='presentation' class='divider'></li>
                            <li role='presentation'>
                                <a onclick='PostActionButton1_delete($postID)' role='menuitem' tabindex='-1' href=''>Delete post</a>
                            </li>
                            <li role='presentation'><a href='home_view.php?view=$postID' role='menuitem' tabindex='-1' >View details</a></li>
                         ";
            
        } elseif ($postUserID != $new_user_id && $post_status != 5) {
            
//                        <li role='presentation'>
//                            <a role='menuitem' tabindex='-1' onclick='javascript:warning('This service is inactive. Please contact with Dostums developer.');'>
//                                <div class='post-top-dropdown'>
//                                    <div>Unfollow $full_name</div>
//                                    <div class='text-muted'>Temporary hide this post</div>
//                                </div>
//                            </a>
//                        </li>
//                        <li role='presentation' class='divider'></li>
            
            $actionLi .= " 
                        
                        <li role='presentation'>
                            <a role='menuitem' tabindex='-1' onclick='javascript:warning('This service is inactive. Please contact with Dostums developer.');'>Report post</a>
                        </li>
                        <li role='presentation'>
                            <a href='home_view.php?view=$postID' role='menuitem' tabindex='-1' >View details</a>
                        </li>
                         ";
        } elseif ($postUserID != $new_user_id && $post_status == 5) {
            $actionLi .= "
                          <li role='presentation'>
                            <a onclick='PostActionButton2($postID,$new_user_id)' role='menuitem' tabindex='-1' href=''>
                                <div class='post-top-dropdown'>
                                    <div>Remove Tag</div>
                                    <div class='text-muted'>You will removed from this tag</div>
                                </div>
                            </a>
                        </li>
                        <li role='presentation' class='divider'></li>
                        <li role='presentation'><a role='menuitem' tabindex='-1' href=''>Report post</a></li>
                        <li role='presentation'>
                            <a href='home_view.php?view=$postID' role='menuitem' tabindex='-1' >View details</a>
                        </li>
                         ";
        }
        else{
            $actionLi .= 'No Condition set.';
        }
        ////////
        
        
        ////////
        $content = '';
        if(!empty($postWriting)){
            $content .= " 
                         <p>$postWriting</p><br/>
                         ";
        }
        
        if(!empty($photoID)){
            $photo = $obj->SelectAllByVal('dostums_photo','id',$photoID,'photo');
            $content .= " <img src='./profile/$photo' class='img-responsive' alt=''> ";
        }
        ////////
        
        
        //////// [ like action strat from here for a single post]
        $like = '';
        $totalLikesTextContent = '';
        $totalLikesdropdown = '';
        $totalLikesText = '';
        $button = '';
        
        $exlike = $obj->exists_multiple("dostums_likes", array("user_id" => $input_by, "post_id" => $postID));
        
        if($exlike == 0){
            $button .= " 
                    <button type='button' id='$postID' class='sp-like def_button' onclick='like($postID);'>
                                <span id='posticon$postID'><i class='fa fa-thumbs-up'></i></span> 
                                <span id='postlike$postID'>
                                 Like
                                </span>
                    </button>
                   "; 
        } else {
            $button .= " 
                        <button type='button' id='$postID' class='sp-unlike def_button' onclick='un_like($postID);'>
                            <span id='placeicon'>
                               <i class='fa fa-thumbs-down'></i>
                            </span>
                            <span id='post'> Unlike</span>
                        </button>
                     ";
        }
        
        
        
        $like .= "  <span id ='like_unlike_button_$postID'>
                        $button
                    </span>
                     ";
        
        
        
        $checkLike = $obj->FlyQuery("SELECT
                    COUNT(dl.id) AS counter
                    FROM dostums_likes as dl
                    WHERE dl.post_id = '".$postID."' AND dl.status = '1'");

        $counter = $checkLike[0]->counter;
        
        
        
        if($counter != 0){
            $totalLikesTextContent .= "    
                                       <i class='fa fa-thumbs-up'></i></span> 
                                       $counter people liked this post
                                      ";
            $lis = '';
            $likesIDs2 = $obj->FlyQuery("SELECT user_id from dostums_likes WHERE post_id = '$postID' ORDER BY id DESC");
            
            if(!empty($likesIDs2)){
                foreach ($likesIDs2 as $value) {
                                $ides = $value->user_id;
                                $likesnames2 = $obj->FlyQuery("SELECT id, first_name, last_name from dostums_user WHERE id = '$ides' ");
                                if(!empty($likesnames2)){
                                    foreach ($likesnames2 as $value) {
                                        $userid = $value->id;
                                        $full_name = $value->first_name . ' ' .  $value->last_name;
                                        $lis .= " <li><a href='profiles.php?user_id=".$userid." '>". $full_name ."</a></li><li style='margin:0px;' class='divider'></li> ";
                                    }
                                }
                }
                if($counter >= 10){
                    $lis .=  "<li><a href='home_view.php?view=".$postID."'>See All</a></li>";
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
            
            
        }
       
        //[This area is for control show hide action if there is like  exit or not][start]
        $divcontrol = " ";
        if($counter >= 1){
            $divcontrol .= " <div class='panel-footer has-share-panel' id='likers_$postID'> ";
        } else {
            $divcontrol .= " <div class='panel-footer has-share-panel' id='likers_$postID' style='display:none;'> ";
        }
        //[This area is for control show hide action if there is like exit or not][end]
        
       $totalLikesText .= "         $divcontrol
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <div class='share-panel'>
                                                  $totalLikesTextContent
                                                      $totalLikesdropdown
                                                </div>
                                           </div>
                                        </div>
                                      </div>  
                                   ";
            
        //////// [ like action end from here for a single post]
        
        
        
        //////// [ Comment action strat from here for a single post]
        $comment = '';
        
        $comments = '';
            $commentsArray = $obj->FlyQuery("SELECT count(id) AS cou FROM dostums_comment WHERE post_id = '$postID'");
            if(!empty($commentsArray)){
               foreach ($commentsArray as $commentValue) {
                   $comments .= $commentValue->cou;
               }
            }
        
        $comment .= "<a title='' href='javascript:void(0);' class='sp-comments'>
                        <i class='fa fa-comments'></i> 
                        <span id='postcomment$postID'>
                        $comments
                        </span> Comment
                     </a>   
                    ";
        
        
        
        
        
        $comment_area = '';
        $comment_talk = '';
        
        
        if($comments>3)
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$postID),"3");
        }
        else
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$postID),"3");
        }
        
        
        if(!empty($commentsql)){
            foreach($commentsql as $data_comment):
                
            $data_comment_id = $data_comment->id;
            $data_comment_user_id = $data_comment->user_id;
            $data_comments = $data_comment->comment;
            $data_comment_post_id = $data_comment->post_id;
            
            $cname = $obj->SelectAllByVal("dostums_user_view","id",$data_comment_user_id,"name");
            
            $photo_id=$obj->SelectAllByVal2("dostums_profile_photo","user_id",$data_comment_user_id,"status",2,"photo_id");
		    $photo=$obj->SelectAllByVal("dostums_photo","id",$photo_id,"photo");
            
            if($photo=="")
            {
                $new_photo="generic-man-profile.jpg";
            }
            else
            {
                $new_photo=$photo;
            }
            
            $comment_delete = '';
            $currentUserID = $data_comment_user_id;
            if($currentUserID == $input_by){
                $comment_delete .= "  
                                    <button type='button'
                                        onclick='deleteComment($data_comment_id , $data_comment_post_id)'
                                        class='sp-comment-delete def_button'><i class='fa fa-trash'></i>
                                        Delete
                                    </button>
                                   ";
            } else {
                $comment_delete .= " ";
            }
            
            $duration = $extra->duration($data_comment->post_time,date('Y-m-d H:i:s'));
            
            
                $comment_talk .= "  
                                <li id='com$data_comment_id'>
                                    <div class='commenterImage'>
                                        <img class='img-circle' src='./profile/$new_photo'>
                                    </div>
                                    <div class='commentText'>
                                      <p style='display:block;'>
                                        <strong>
                                            <a style='color:#28a4c9' href='profile.php?user_id=$data_comment_user_id'>$cname</a>
                                        </strong><br/>&nbsp;$data_comments
                                      </p>      
                                    </div> 
                                    
                                   <div class='share-panel' id='$data_comment_post_id'>
                                       
                                       $comment_delete
                                        <br/><span class='date sub-text'>$duration</span>
                                   </div>
                                </li>
                                 ";
            endforeach;
            
        }
        
        $comment_area .= "  <div class='panel-footer comments-list-wrapper' id='comment_$postID'>
                                <ul class='commentList' id='comment_list_instant_load_$postID'>
                                    $comment_talk
                                </ul>
                            </div>
                            
                            <div class='comments-box has-comments'>
                                <textarea class='form-control' style='min-width: 100%;background:white;border:1px solid #ededed;' id='content$postID' placeholder='Add a comment...'></textarea>
                                <div class='row'>
                                 <button style='float:right; margin-right:12px;' onclick='comment($postID)' class='btn btn-success' type='button'>Post comment</button>
                                 <button style='float:right; margin-right:7px; height:32px;' id='cancel$postID' onclick='clearFields($postID)' class='btn btn-default' type='reset'>Cancel</button>
                                </div>
                            </div>
                         ";
        
        
        
        
        //////// [ comment action strat from here for a single post]
        
        
        ////////
        $share = '';
        
        $shares = '';
        $countshare = $obj->FlyQuery("SELECT
                                      COUNT(dp.share_id) as countshare
                                      FROM dostums_post AS dp
                                      WHERE dp.share_id = '".$postID."' AND dp.status = '2'");
                 if(!empty($countshare)){
                   foreach ($countshare as  $cvalue) {
                     if($cvalue->countshare != '0'){
                       $shares = $cvalue->countshare;
                     }else{
                       echo '';
                     }
                   }
                 }
        
        $share .= "<button onclick='share_button($postID)' type='button' id='share' class='def_button'>
                      <i class='fa fa-share'></i>
                       $shares Share
                   </button>   
                  ";
        
        $shareButton = "
                        <button id='shareButtons_$postID' style='display:none;'  type='button' class='btn btn-info btn-lg'
                          data-toggle='modal' data-target='#myHomeShareModal'>share_button
                        </button>
                       ";
        ////////
        
        
//        echo start
        echo "  $post_show_hide
                  <div class='panel panel-default panel-customs-post'>
                     
                     <!--[dropdown start]-->
                     <div class='dropdown'>
                        <span class='dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                            <span class='glyphicon glyphicon-chevron-down'></span>
                        </span>
                        <ul class='dropdown-menu' role='menu'>
                          $actionLi
                        </ul>
                     </div>   
                     <!--[dropdown end]-->
                     
                     <!--[panel header start]-->
                     <div class='panel-heading'>
                        <a href='./profiles.php?user_id=$postUserID'>
                            <img class='img-circle pull-left  img-responsive' src='./profile/$userphotoname' alt='user3'>
                        </a>    
                        
                        <h3>
                          <a href='./profiles.php?user_id=$postUserID'>
                            <span style='color:#2c99ce;font-weight:bold;'>$full_name</span>
                          </a>
                          $header_text
                        </h3>
                        
                        <h5>
                           <span> 
                             <span> $sharedDate </span> - $showpost_permission
                           </span>
                        </h5>
                     </div>
                     <!--[panel header end]-->
                     
                     <!-- [content body start] -->
                     <div class='panel-body'>
                        $content
                            
                        $share_content
                     </div>
                     <!-- [content body end] -->
                     
                     <!--[panel bottom start]-->
                     <div class='panel-bottom'>
                        <div class='panel-footer has-share-panel'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='share-panel'>
                                        <!-- [start like eng] -->
                                        $like
                                        <!-- [end like eng] -->
                                        
                                        <!-- [start comment eng] -->
                                        $comment
                                        <!-- [end comment eng] -->
                                        
                                        <!-- [start share eng] -->
                                        $share
                                        <span id='postpermission_$postID'></span>
                                        <!-- [start share eng] -->
                                        
                                        <!-- [start share model button] -->
                                        $shareButton
                                        <!-- [start share model button] -->
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                           $totalLikesText
                           
                           $comment_area 
                               
                     </div>
                     <!--[panel bottom end]-->
                     
                  </div>
               </div>
        ";
//        echo end
          include('./page_signup_form.php');
    }
}



?>

