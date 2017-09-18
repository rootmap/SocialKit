<div class="share-panel">


    <button type="button" id="<?php echo $post->id; ?>" class="sp-like def_button" onclick="like('<?php echo $post->id; ?>')">
        <i class="fa fa-thumbs-up"></i> <span id="postlike<?php echo $post->id; ?>">
            <?php
            if ($post->likes != 0) {
                echo $post->likes;
                ?>
                likes
                <?php
            } else {
                ?> Like
                <?php
            }
            ?></span>
    </button>

    <a title="#" href="#" class="sp-comments"><i class="fa fa-comments"></i> <span id="postcomment<?php echo $post->id; ?>">
            <?php
            $comment_status = false;
            if ($post->comment != 0) {
                echo $post->comment;
                $comment_status = true;
                ?>
            <?php } else { ?>  <?php
                $comment_status = false;
            }
            ?> </span> Comment</a>

    <?php
    if ($post->share_count == 0) {
        $sharecount = "";
    } else {
        $sharecount = $post->share_count;
    }
    ?>


    <button type="button" id="<?php echo $post->id; ?>" class="sp-share def_button">
        <i class="fa fa-share"></i> <?php echo $sharecount; ?> shares
    </button>

    <span id="postpermission_<?php echo $post->id; ?>">
        <span id="static_permission_<?php echo $post->id; ?>">
            <?php
            if (!empty($chkpermission)) {
                ?>
                <button type="button" id="permissionstatuslabel_<?php echo $post->id; ?>"  class="def_button pull-right"><i class="fa fa-cogs"></i>
                    <?php
                    $permission_name = $obj->SelectAllByVal("dostums_status_permission", "id", $chkpermission[0]->permission_id, "name");
                    if ($permission_name == '') {
                        echo "Public";
                    } else {
                        echo $permission_name;
                    }
                    ?>
                </button>
            <?php } ?>

            <?php
            $chkpost_country = $obj->SelectAllByID_Multiple("dostums_post_location_record", array("user_id" => $post->user_id, "post_id" => $post->id));
            if (!empty($chkpost_country)) {
                ?>
                <button type="button"  class="def_button pull-right"><i class="fa fa-globe"></i>
                    <?php echo $obj->SelectAllByVal("dostums_country", "id", $chkpost_country[0]->country_id, "country_name"); ?>
                </button>
            <?php } ?>
        </span>
    </span>
    <span style="display: none; width: 100px;" class=" pull-right" id="dynamicpermission_<?php echo $post->id; ?>">
        <select style="" id="statusPermission_<?php echo $post->id; ?>"
                class="form-control select privacy-dropdown"
                placeholder="Shared Public">
            <option value="1">Public</option>
            <option value="2">Friends</option>
            <option value="3">Only me</option>

        </select>
    </span>
    <?php
    if ($post->user_id == $input_by) {
        ?>
        <script>
            $(document).ready(function () {
                $('#postpermission_<?php echo $post->id; ?>').click(function () {
                    $('#static_permission_<?php echo $post->id; ?>').toggle();
                    $('#dynamicpermission_<?php echo $post->id; ?>').toggle();
                    //alert('Success');
                });

                $('#statusPermission_<?php echo $post->id; ?>').change(function () {
                    var statusPermission = $(this).val();
                    var userid = '<?php echo $input_by; ?>';
                    var post_id = '<?php echo $post->id; ?>';
                    if (statusPermission != '')
                    {
                        $.post('./lib/status.php', {'st': 42, 'user_id': userid, 'post_id': post_id, 'stp': statusPermission}, function (data) {
                            if (data == 1)
                            {
                                var prht = $('#statusPermission_<?php echo $post->id; ?> value=' + statusPermission).html();
                                $('#permissionstatuslabel_<?php echo $input_by; ?>').html(prht);
                                //alert('Permission Changed Successfully');
                                $('#static_permission_<?php echo $post->id; ?>').toggle();
                                $('#dynamicpermission_<?php echo $post->id; ?>').toggle();
                            }
                            else
                            {
                                alert('Permission Changed Failed');
                                window.location.replace('./<?php echo $obj->filename(); ?>');
                            }
                        });
                    }
                    //alert(statusPermission+' - '+userid+'- '+post_id);
                });

            });
        </script>
    <?php } ?>

</div>
