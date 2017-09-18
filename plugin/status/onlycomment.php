<li id="com<?php echo $data_comment->id; ?>">
    <div class="commenterImage">
    	<?php
		$photo_id=$obj->SelectAllByVal2("dostums_profile_photo","user_id",$data_comment->user_id,"status",2,"photo_id");
		$photo=$obj->SelectAllByVal("dostums_photo","id",$photo_id,"photo");

		if($photo=="")
		{
			$new_photo="generic-man-profile.jpg";
		}
		else
		{
			$new_photo=$photo;
		}
		?>
        <img class="img-circle" src="./profile/<?php echo $new_photo; ?>">
    </div>
    <div class="commentText">
        <p style="display:block;">
            <strong>
                <a style="color:#28a4c9" href="profile.php?user_id=<?php echo $data_comment->user_id; ?>"><?php echo $obj->SelectAllByVal("dostums_user_view","id",$data_comment->user_id,"name"); ?> </a>
            </strong>&nbsp;<?php echo $data_comment->comment; ?>
        </p>

        <?php include('commentactionbar.php'); ?>

    </div>

</li>
