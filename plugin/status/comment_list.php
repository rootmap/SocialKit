<div class="comments-box has-comments">
	
    <div <?php if($post->comment<4){ ?> style="display:none;" <?php } ?> class="all-comments-count" 
                                        onclick="loadallcomment(<?php echo $post->id; ?>)"  id="loadallcomment<?php echo $post->id; ?>">
        <span id="mcc<?php echo $post->id; ?>">View <?php echo $post->comment; ?> more comments</span>
        <span class="dropdown-toggle" type="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-chevron-down"></span>
       </span>
    </div>
    <?php
        
        if($post->comment>3)
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$post->id),"3");
        }
        else
        {
            $commentsql=$obj->FlyQueryWithCond("dostums_comment_view","id,user_id,post_id,likes,comment,post_time",array("post_id"=>$post->id),"3");
        }
    ?>
    <div class="comments-list-wrapper">
        <ul class="commentList" id="comment_list_instant_load_<?php echo $post->id; ?>">
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