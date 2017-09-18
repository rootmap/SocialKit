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
                                b.id,
                                b.group_id,
                                b.page_id,
                                b.user_id,
                                b.from_user_id,
                                b.photo_id,
                                count(dc.id) AS `comment`,
                                count(dl.id) AS `likes`,
                                b.share_id,
                                 CASE b.share_id WHEN 0 THEN 
                                 (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=b.id)
                                 ELSE 
                                 (SELECT count(a.id) FROM dostums_post as a WHERE a.share_id=b.share_id)
                                 END AS share_count,
                                b.post,
                                b.post_time,
                                b.post_status,
                                b.status 
                                FROM dostums_post AS b 
                                LEFT JOIN dostums_comment as dc on dc.post_id=b.id 
                                LEFT JOIN dostums_likes as dl ON dl.post_id=b.id
                                WHERE b.page_id='" . $new_page_id . "'  
                                GROUP BY b.id
                                ORDER BY b.id DESC LIMIT 10");


$postbreak = 1;
if (!empty($sqlquery)) {
    foreach ($sqlquery as $post):
        $new_post_head_id = $post->id . "statushead" . time();
        @$chkpermission = $obj->FlyQuery("SELECT * FROM dostums_post_permission_record WHERE user_id='".$post->user_id."' AND post_id='".$post->id."' ORDER BY id DESC LIMIT 1");
        $shared_text = '';
        $status_published = '';


        if ($post->post_status == "1") {
            $shared_text = "Shared ";
            $link = '';
            if ($post->user_id == $input_by) {
                $link .='<li role="presentation"><a role="menuitem" class="dostums-post-delete" id="' . $post->id . '" tabindex="-1" href="#"><i class="fa fa-trash"></i> Delete Post </a></li>';
            }
                
            if ($chkpermission[0]->permission_id == 1) {
                $status_published = ' in publically.';
            } elseif ($chkpermission[0]->permission_id == 2) {
                $status_published = ' with friends.';
            } elseif ($chkpermission[0]->permission_id == 3 && $post->user_id == $input_by) {
                $status_published = 'on only me/custom.';
            } else {
                $status_published = 'in publically.';
            }

        } else {
            $shared_text = "Posted ";
            $link = '';
            $status_published = 'in publically.';
            if ($post->user_id == $input_by) {
                $link .='<li role="presentation"><a role="menuitem" tabindex="-1" class="dostums-post-edit" id="' . $post->id . '" href="page_view.php?view=' . $post->id . '&page_id=' . $post->page_id . '"><i class="fa fa-list"></i> View Post </a></li>
                        <li role="presentation"><a role="menuitem"  class="dostums-post-edit"  id="' . $post->id . '" tabindex="-1" href="#"><i class="fa fa-edit"></i> Edit Post </a></li>
                        <li role="presentation"><a role="menuitem" class="dostums-post-delete" id="' . $post->id . '" tabindex="-1" href="#"><i class="fa fa-trash"></i> Delete Post </a></li>';
            } else{
                $link .='<li role="presentation"><a role="menuitem" tabindex="-1" class="dostums-post-edit" id="' . $post->id . '" href="page_view.php?view=' . $post->id . '&page_id=' . $post->page_id . '"><i class="fa fa-list"></i> View Post </a></li>';
            }
                
            if ($chkpermission[0]->permission_id == 1) {
                $status_published = ' in publically.';
            } elseif ($chkpermission[0]->permission_id == 2) {
                $status_published = ' with friends.';
            } elseif ($chkpermission[0]->permission_id == 3 && $post->user_id == $input_by) {
                $status_published = 'on only me/custom.';
            } else {
                $status_published = 'in publically.';
            }
        }



        //status 3 code
        ?>
        <div class="panel panel-default  panel-customs-post">
            <div class="dropdown">
                <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                    <span class=" glyphicon glyphicon-chevron-down "></span>
                </span>
                <ul class="dropdown-menu" role="menu">
                    <?php echo $link; ?>
                    <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Hide from
                        Timeline</a></li>-->
                    <!--/*<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Location</a>
                    </li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Change Date</a>
                    </li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turn off
                        notifications</a></li>
                    <li role="presentation" class="divider"></li>
                    */-->

                </ul>
            </div>

            <div class="panel-heading" id="<?php echo $new_post_head_id; ?>">
                <script type="text/javascript">
                    $(document).ready(function() {
                        load_post = {'st': 1, 'post_id':<?php echo $post->id; ?>};
                        $.post('lib/imageload.php', load_post, function(datapost) {
                            if (datapost != 0)
                            {
                                var datacl = jQuery.parseJSON(datapost);
                                var user_id = datacl.user_id;
                                var name = datacl.name;
                                var thumb = datacl.thumb;
                                var thumbbig = datacl.thumbbig;

                                var to_user_id = datacl.to_user_id;

                                if (to_user_id == 0)
                                {
                                    var sharedhtmlname = "<?php echo $shared_text." ".$status_published; ?>";
                                    var sharedhtml = "<?php echo $shared_text; ?>";
                                }
                                else
                                {

                                    var to_name = datacl.to_name;
                                    var thumb2 = datacl.thumb2;
                                    var thumbbig2 = datacl.thumbbig2;
                                    var sharedhtmlname = "<?php echo $shared_text; ?> on <a href='profile.php?user_id=" + to_user_id + "' style='color:#000;'>" + to_name + "</a> Timeline";
                                    var sharedhtml = "<?php echo $shared_text; ?>";
                                }

                                var datahtml = "<img class='img-circle pull-left' src='./profile/" + thumb + "' alt='" + thumb + "'><h3><a href='profile.php?user_id=" + user_id + "'>" + name + "</a> " + sharedhtmlname + "</h3><h5><span>" + sharedhtml + "</span> - <span><?php echo $extra->duration($post->post_time, date('Y-m-d H:i:s')); ?></span></h5>";

                                $('#<?php echo $new_post_head_id; ?>').html(datahtml);
                            }
                            else
                            {
                                window.location.refresh();
                            }
                        });

                    });
                </script>
            </div>
            <?php include('status/post.php'); ?>
            <div class="panel-bottom">
                <div class="panel-footer has-share-panel">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php include('status/postactionbar_page.php'); ?>
                        </div>
                    </div>
                </div>
                <?php include('status/comment_list.php'); ?>
                <?php include('status/comment.php'); ?>
            </div>
        </div>
        <?php
        //status 3 code
        $postbreak++;


        if ($postbreak == 6) {
            break;
        }

    endforeach;
}
?>                        