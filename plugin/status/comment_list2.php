<?php
	$comCount = '';
	$comments = '';
	$commentsArray = $obj->FlyQuery("SELECT count(id) AS come, comment FROM dostums_comment WHERE post_id = '$postID'");

	if(!empty($commentsArray)){
		 foreach ($commentsArray as $com) {
				 $comCount .= $com->come;
				 $comments .= $com->comment;
		 }
	}
?>

<div class="comments-box has-comments">
    <div
		    <?php if($comCount < 4){ ?>
					style="display:none;" <?php } ?>
					class="all-comments-count"
					onclick="loadallcomment(<?php echo $postID; ?>)"
					id="loadallcomment<?php echo $postID; ?>">
        <span id="mcc<?php echo $postID; ?>">View <?php echo $comments; ?> more comments</span>
        <span class="dropdown-toggle" type="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-chevron-down"></span>
       </span>
    </div>


    <?php

        if($comCount > 3)
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$postID),"3");
        }
        else
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$postID),"3");
        }
    ?>
    <div class="comments-list-wrapper">
        <ul class="commentList" id="comment_list_instant_load_<?php echo $postID; ?>">
            <?php
            if(!empty($commentsql))
            foreach($commentsql as $data_comment):
            ?>
            <?php include('onlycomment.php'); ?>
            <?php endforeach; ?>

        </ul>
    </div>

    <div class="input-placeholder">Add a comment...</div>

</div>
