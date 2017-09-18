<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-image"></i> Photos <a class="pull-right" href="photos.php?user_id=<?php echo $new_user_id; ?>">
            <small> View all</small>
        </a></div>

    </div>

    <div class="panel-body panel-gallery">
        <div class="has-gallery">
			<?php
            $query_photo_profile="SELECT
	b.id,
	b.photo,

    e.id as post_id,
	e.user_id,
	e.group_id,
	e.page_id

from dostums_photo as b
INNER JOIN dostums_post as e ON e.photo_id=b.id

WHERE (b.id in
              (SELECT
                  c.photo_id
               from dostums_cover_photo as c
               where c.user_id='".$new_user_id."'
              )
	   or
       b.id in
              (SELECT
                     d.photo_id
               from dostums_profile_photo as d
               where d.user_id='".$new_user_id."'
              )
	   or
       e.photo_id in
              (SELECT
                  dphp.id
               FROM dostums_photo as dphp
              )
      ) AND e.user_id='".$new_user_id."' AND e.group_id='0' AND e.page_id='0'
ORDER BY b.id DESC";

			$sqlphoto=$obj->FlyQuery($query_photo_profile);
			$photo_limit_quantity=1;
                        if(!empty($sqlphoto))
			foreach($sqlphoto as $photo):
			?>
            <a class="open-demo-modal"  id="<?php echo $photo->post_id; ?>">
            <img src="./profile/<?php echo $photo->photo; ?>" alt="img">
            </a>
			<?php

                        $photo_limit_quantity++;
                          if($photo_limit_quantity==10)
                        {
                            break;
                        }

                        endforeach; ?>
        </div>


    </div>
</div>
