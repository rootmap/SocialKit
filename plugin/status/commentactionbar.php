
<div class="share-panel" id="<?php echo $data_comment->post_id; ?>">
    
    <button type="button" id="bcomlikes<?php echo $data_comment->post_id; ?>_<?php echo $data_comment->id; ?>"
            class="sp-comment-like def_button"
            onclick="likeComment(<?php echo $data_comment->id; ?>,<?php echo $data_comment->post_id; ?>)">
            <i class="fa fa-thumbs-up"></i>
            <span id="comlikes<?php echo $data_comment->post_id; ?>_<?php echo $data_comment->id; ?>">like</span>
    </button>
  <?php
  // echo $input_by;
  $currentUserID = $data_comment->user_id;
  if($currentUserID == $input_by){
  //  echo "matched";
  ?>
  <button type="button"
          onclick="deleteComment(<?php echo $data_comment->id; ?>,<?php echo $data_comment->post_id; ?>)"
          class="sp-comment-delete def_button"><i class="fa fa-trash"></i>
          Delete
  </button>
  <?php
 } else{
  //  echo "not matched";
 }
  ?>


    <span class="date sub-text"><?php echo $obj->duration($data_comment->post_time,date('Y-m-d H:i:s')); ?></span>


</div>
