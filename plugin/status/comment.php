<div class="write-comments panel-customs-post-comment">
    <img alt="User Image" name="comment_profile_photo" src="images/user/default-user-picture.gif" class="img-circle">

    <div class="panel-customs-post-textarea">
        <textarea rows="4" id="content<?php echo $postID; ?>"></textarea>
        <button onclick="comment(<?php echo $postID; ?>)" class="btn btn-success" type="button">Post comment</button>
        <button id="cancel<?php echo $postID; ?>" class="btn btn-default " type="reset">Cancel</button>
    </div>
    <div class="clearfix"></div>
</div>
