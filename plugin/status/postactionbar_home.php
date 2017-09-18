<div class="share-panel">

  <!-- [start like eng] -->
  <?php
    // echo $postID;
    // echo $new_user_id;

    $checkLike = $obj->FlyQuery("SELECT
                    COUNT(dl.id) AS counter
                    FROM dostums_likes as dl
                    WHERE dl.user_id = '".$new_user_id."' AND dl.post_id = '".$postID."' AND dl.status = '1'");

    $counter = $checkLike[0]->counter;

    if($counter == '0'){

  ?>

    <button type="button" id="<?php echo $postID; ?>" class="sp-like def_button">
        <span id="posticon<?php echo $postID;?>"><i class="fa fa-thumbs-up"></i></span> 
        <span id="postlike<?php echo $postID; ?>">
          <?php
            $likes = '';
            $likesArray = $obj->FlyQuery("SELECT count(id) AS cou FROM dostums_likes WHERE post_id = '$postID'");
            if(!empty($likesArray)){
               foreach ($likesArray as $likeValue) {
                   $likes .= $likeValue->cou;
               }
            }
            if ($likes != 0) {
                echo $likes;
          ?>
                likes
          <?php
            } else {
          ?> Like
          <?php
                   }
          ?></span>
    </button>
    <?php
      } else{
    ?>
     <button type="button" id="<?php echo $postID; ?>" class="sp-unlike def_button">
       <span id="placeiconinlike"><i class="fa fa-thumbs-down"></i></span><span id="postunlike<?php echo $postID; ?>"> Unlike</span>
     </button>
    <?php

      }

    ?>
<!-- [end like eng] -->

<!-- [start comment eng] -->
    <a title="#" href="javascript:void(0);" class="sp-comments">
        <i class="fa fa-comments"></i> 
        <span id="postcomment<?php echo $postID; ?>">
            <?php
            $comments = '';
            $commentsArray = $obj->FlyQuery("SELECT count(id) AS cou FROM dostums_comment WHERE post_id = '$postID'");
            if(!empty($commentsArray)){
               foreach ($commentsArray as $commentValue) {
                   $comments .= $commentValue->cou;
               }
            }

            $comment_status = false;
            if ($comments != 0) {
                echo $comments;
                $comment_status = true;
                ?>
            <?php } else { ?>  <?php
                $comment_status = false;
            }
            ?> </span> Comment
    </a>
<!-- [end comment eng] -->


<!-- [start share eng] -->
    <?php
    // if ($share_count == 0) {
    //     $sharecount="";
    // } else {
    //     $sharecount=$share_count;
    // }

    $share

    ?>


    <!-- <button type="button" id="<?php //echo $postID; ?>" class="sp-share def_button">
      <i class="fa fa-share"></i> <?php //echo $sharecount; ?> share
    </button> -->

    <button onclick="share_button(<?php echo $postID;?>)"type="button" id="share" class="def_button">
      <i class="fa fa-share"></i>
        <?php  //$postID;
//                $countshare = $obj->FlyQuery("SELECT
//                                              COUNT(dp.share_id) as countshare
//                                              FROM dostums_post AS dp
//                                              WHERE dp.share_id = '".$postID."' AND dp.status = '2'");
//                 if(!empty($countshare)){
//                   foreach ($countshare as  $cvalue) {
//                     if($cvalue->countshare != '0'){
//                       echo $cvalue->countshare;
//                     }else{
//                       echo '';
//                     }
//                   }
//                 }
        ?> share
    </button>


<span id="postpermission_<?php echo $postID; ?>"></span>

<!-- [start share model button] -->
                <button id="shareButtons_<?php echo $postID;?>"
                       style="display:none;"  type="button" class="btn btn-info btn-lg"
                       data-toggle="modal" data-target="#myHomeShareModal">share_button
                </button>
<!-- [start share model button] -->
                <?php include('plugin/page_signup_form.php'); ?>










<!-- [end share eng] -->




</div>
