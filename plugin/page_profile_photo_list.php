<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-image"></i> Recent Photos <a class="pull-right" href="./page-photos.php?page_id=<?php echo $new_page_id; ?>">
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
                                                WHERE (dp.id in (SELECT dpcp.photo_id FROM dostums_page_cover_photo AS dpcp 
                                                WHERE dpcp.page_id=".$new_page_id.") 
                                                or dp.id in (SELECT dppp.photo_id FROM dostums_page_profile_photo AS dppp WHERE dppp.page_id=".$new_page_id.")
                                                or dps.photo_id in (SELECT dphsp.id FROM dostums_photo as dphsp)
                                                and (dps.status = 120 or dps.status = 121 or dps.status = 122)  and dps.photo_id != 0 AND dps.group_id='0'
                                                ) AND dps.page_id=".$new_page_id."");			
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