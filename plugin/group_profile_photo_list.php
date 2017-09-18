<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-image"></i> Recent Photos <a class="pull-right" href="./group-photos.php?group_id=<?php echo $new_group_id; ?>">
            <small> View all</small>
        </a></div>

    </div>

    <div class="panel-body panel-gallery">
        <div class="has-gallery">

            <?php 
			$sqlphoto=$obj->FlyQuery("SELECT 
                                                dps.id as post_id,
                                                dps.page_id,
                                                dps.photo_id,
                                                dp.photo

                                                FROM dostums_post AS dps
                                                LEFT JOIN dostums_photo AS dp ON dp.id=dps.photo_id 
                                                WHERE  
                                                (dp.id in (SELECT dgcp.photo_id FROM dostums_group_cover_photo AS dgcp 
                                                        WHERE dgcp.group_id=".$new_group_id.") 
                                                or dp.id in (SELECT dgpp.photo_id FROM dostums_group_profile_photo AS dgpp WHERE dgpp.group_id=".$new_group_id.")

                                                or dps.photo_id in (SELECT amikar.id FROM dostums_photo as amikar)
                                                and (dps.status = 60 or dps.status = 61 or dps.status = 62)  and dps.photo_id != 0 AND dps.page_id='0'
                                                ) AND dps.group_id=".$new_group_id."");			
			if(!empty($sqlphoto))
			foreach($sqlphoto as $photo):
			?>
            <a class="open-demo-modal"  id="<?php echo $photo->post_id; ?>"> 
            <img src="./profile/<?php echo $photo->photo; ?>" alt="img"> 
            </a>
			<?php endforeach; ?>

        </div>
	</div>
</div>