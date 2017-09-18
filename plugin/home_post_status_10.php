<script>
    $(document).ready(function() {
        $.post('lib/imageload.php', {'st': 3, 'usrid':<?php echo $input_by; ?>}, function(defim) {
            var ndcl = jQuery.parseJSON(defim);
            var thumbdef = ndcl.thumb;
            $('img[name=comment_profile_photo]').attr('src', './profile/' + thumbdef);
        });
    });
</script>
<?php
include('class/extraClass.php');
$extra = new SiteExtra();


    $sqlquery = $obj->FlyQuery("SELECT
                          dp.id AS postID,
                          dp.user_id AS postUserID,
                          dp.post,
                          dp.photo_id,
                          dp.`post_permission` AS postPermission,
                          dp.share_id,
                          CASE dp.share_id WHEN 0 THEN
                          (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=dp.id)
                          ELSE
                          (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=dp.share_id)
                          END AS share_count,
                          dp.post_status,
                          dp.group_id,
                          dp.page_id,
                          dp.status,

                          DATE_FORMAT(dp.post_time, '%l:%i %p %b %e, %Y') date

                          FROM
                          dostums_post AS dp

                          WHERE

         (dp.user_id IN  (
                            SELECT
                            CASE
                              WHEN df.uid <> '" .$new_user_id. "'
                                   THEN df.uid
                              ELSE df.to_uid
                            END AS uis
                            FROM dostums_friend AS df
                            WHERE (df.uid = '" .$new_user_id. "' OR df.to_uid = '" .$new_user_id. "') AND df.status = '2'
                         ) OR dp.`user_id` = '" .$new_user_id. "'
                           OR dp.group_id IN ( SELECT dgm.group_id from
                                               dostums_group_members AS dgm WHERE
                                               dgm.user_id = '" .$new_user_id. "' )
                           OR dp.page_id IN  ( SELECT dpl.page_id from
                                                   dostums_page_likes AS dpl WHERE
                                                   dpl.user_id = '" .$new_user_id. "' )
          ) AND (dp.status = '1' OR dp.status = '2' OR dp.status = '3' OR dp.status = '4')  ORDER BY dp.id DESC
     ");

// echo '<pre>';
// print_r($sqlquery);

// $new_user_id

$postbreak = 1;
if (!empty($sqlquery)) {
    foreach ($sqlquery as $post){

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
?>

<?php
if($postUserID != $new_user_id && $postPermission == '3'){
?>
<div class="col-xs-12 col-sm-12 " style="display:none;visibility:hidden;">
<?php
} else{
?>
<div class="col-xs-12 col-sm-12 ">
<?php
}
?>
                        <div class="panel panel-default panel-customs-post">
                            <!-- [drop down start] -->
                            <div class="dropdown">
                                <span class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <span class="glyphicon glyphicon-chevron-down  "></span>
                                </span>


                                <!-- [Actions under a post start] -->
                                <ul class="dropdown-menu" role="menu">
                                  <?php
                                    // echo $status;
                                     if(($postUserID == $new_user_id && $post_status != 5) OR ($postUserID == $new_user_id && $post_status == 5)){
                                  ?>
                                  <li role="presentation">
                                      <a href="home_edit.php?edit=<?php echo $postID; ?>" role="menuitem" tabindex="-1" >
                                          <div class="post-top-dropdown">
                                              <div>Edit post</div>
                                              <div class="text-muted">Edit the basic content of your post</div>
                                          </div>
                                       </a>
                                   </li>

                                   <li role="presentation">
                                       <a onclick="PostActionButton1(<?php echo $postID?>,'hide');" role="menuitem" tabindex="-1" href="#">
                                           <div class="post-top-dropdown">
                                               <div>Hide from timeline</div>
                                               <div class="text-muted">Temporary hide this post</div>
                                           </div>
                                        </a>
                                    </li>

                                  <li role="presentation" class="divider"></li>
                                  <li role="presentation"><a onclick="PostActionButton1(<?php echo $postID?>,'del');" role="menuitem" tabindex="-1" href="#">Delete post</a></li>
                                  <li role="presentation"><a href="home_view.php?view=<?php echo $postID;?>" role="menuitem" tabindex="-1" >View details</a></li>
                                  <?php
                                    } elseif ($postUserID != $new_user_id && $post_status != 5) {
                                  ?>
                                   <li role="presentation">
                                       <a role="menuitem" tabindex="-1" href="#">
                                           <div class="post-top-dropdown">
                                               <!-- <div>Unfollow <?php //echo $friendName = $obj->SelectAllByVal("dostums_user","id",$postUserID,"first_name");?> </div> -->
                                               <div>Unfollow <?php echo $full_name;?></div>
                                               <div class="text-muted">Temporary hide this post</div>
                                           </div>
                                        </a>
                                    </li>

                                  <li role="presentation" class="divider"></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report post</a></li>
                                  <li role="presentation"><a href="home_view.php?view=<?php echo $postID;?>" role="menuitem" tabindex="-1" >View details</a></li>
                                  <?php
                                    } elseif ($postUserID != $new_user_id && $post_status == 5) {
                                  ?>
                                  <li role="presentation">
                                      <a onclick="PostActionButton2(<?php echo $postID;?>,<?php echo $new_user_id;?>)" role="menuitem" tabindex="-1" href="#">
                                          <div class="post-top-dropdown">
                                              <div>Remove Tag</div>
                                              <div class="text-muted">You will removed from this tag</div>
                                          </div>
                                       </a>
                                   </li>

                                  <li role="presentation" class="divider"></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Report post</a></li>
                                  <li role="presentation"><a href="home_view.php?view=<?php echo $postID;?>" role="menuitem" tabindex="-1" >View details</a></li>
                                  <?php
                                     }
                                  ?>

                                </ul>
                                <!-- [Actions under a post end] -->

                            </div>
                            <!-- [drop down end] -->

                            <!-- [header start] -->
                            <div class="panel-heading">
                                <?php
                                echo $postID;
                                  if(!empty($postUserID)){
                                     $thumbphotoid = $obj->SelectAllByVal2("dostums_profile_photo","user_id",$postUserID,"status", '2' , "photo_id");
                                     if(!empty($thumbphotoid)){
                                ?>
                                        <a href="./profiles.php?user_id=<?php echo $postUserID;?>"><img class="img-circle pull-left  img-responsive" src="./profile/<?php echo $obj->SelectAllByVal('dostums_photo','id',$thumbphotoid,'photo');?>" alt="user3"></a>
                                <?php
                                     } else{
                                ?>
                                        <a href="./profiles.php?user_id=<?php echo $postUserID;?>"><img class="img-circle pull-left  img-responsive" src="./images/user/default-user.png" alt="user3"></a>
                                <?php
                                     }
                                  }
                                ?>

                                <h3>
                                  <a href="./profiles.php?user_id=<?php echo $postUserID;?>"><span style="color:#2c99ce;font-weight:bold;"><?php echo $full_name;?></span></a>
                                  <?php
                                       if($shareID != '0'){
                                          echo '<span style="color:#777;">Shared Something</span>';
                                       } else{
                                             if($post_status == '5'){
                                                 echo '<span class="text-muted ">with </span>';
                                                 $tags = $obj->FlyQuery("SELECT to_uid FROM dostums_tags WHERE post_id = '$postID' AND status = '1' ");
                                                 if(!empty($tags)){
                                                     foreach ($tags AS $tagToIdValue) {
                                                       $tagIDES = $tagToIdValue->to_uid;
                                                       $usernames = $obj->FlyQuery("SELECT id,CONCAT(first_name,' ',last_name ) AS fullname FROM dostums_user WHERE id = '$tagIDES' ");
                                                         if(!empty($usernames)){

                                                             foreach ($usernames as $uName) {

                                                               $tagNames =  $uName->fullname;
                                                               $id =  $uName->id;
                                                               ?>
                                                                  <a class="_3rdUser" href="./profiles.php?user_id=<?php echo $id;?>"><?php echo $tagNames;?> , </a>
                                                               <?php

                                                             }
                                                         }
                                                     }
                                                 }

                                             } else{
                                                 echo '<span style="color:#777;">Posted Something</span>';
                                             }
                                       }



                                  ?>
                                </h3>


                                <h5><span> <span><?php echo $sharedDate;?></span> - <?php if($postPermission == '1')
                                                           {
                                                             echo '<i class="fa fa-globe" aria-hidden="true"></i>';
                                                           } else if($postPermission == '2')
                                                                      {
                                                                        echo '<i class="fa fa-users" aria-hidden="true"></i>';
                                                                      } else if($postPermission == '3') {
                                                                               echo '<i class="fa fa-lock" aria-hidden="true"></i>';
                                                                             } else if($postPermission == '0'){
                                                                                    echo '<i class="fa fa-globe" aria-hidden="true"></i>';
                                                                                 }?></span></h5>
                            </div>
                            <!-- [header end] -->

                            <!-- [content body start] -->
                            <div class="panel-body">
                                 <?php
                                 if(!empty($postWriting)){
                                 ?>
                                 <p>
                                   <?php echo $postWriting;?>
                                 </p> <br>
                                 <?php
                                 }

                                 if(!empty($photoID)){
                                 ?>
                                 <img src="./profile/<?php echo $obj->SelectAllByVal('dostums_photo','id',$photoID,'photo');?>" class="img-responsive" alt="">
                                 <?php
                                 }
                                 ?>
                            </div>
                            <!-- [content body end] -->



                            <div class="panel-bottom">
                                <div class="panel-footer has-share-panel">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php include('status/postactionbar2.php'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                   $totalLikes = '';
                                   $countTotalLike = $obj->FlyQuery("SELECT count(id) AS totalLike FROM dostums_likes Where post_id = '$postID' AND  status = '1'");
                                   if(!empty($countTotalLike)){
                                     foreach ($countTotalLike as $value) {
                                       $totalLikes .= $value->totalLike;
                                     }
                                   } else {
                                       $totalLikes .= 0;
                                   }

                                   if($totalLikes != 0){
                                ?>
                                    <div class="panel-footer has-share-panel">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php include('status/postactionbar3.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                   } else {

                                   }
                                ?>


                                <?php include('status/comment_list2.php'); ?>
                                <?php include('status/comment.php'); ?>
                            </div>





                        </div>
                    </div>


<?php

  } // [end foreach]
} // [end if]
?>
