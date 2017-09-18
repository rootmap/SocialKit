<div class="panel-body">

    <p><?php
        echo $obj->emotion($post->post);
        ?>
    </p>
    <?php
    if ($post->status == 2) {
        $new_post_image_id = $post->id . "status2" . time();
        ?>

        <a href="javascript:void(0)" id="<?php echo $new_post_image_id; ?>" class="panel-customs-post-image">

            <script type="text/javascript">

                $(document).ready(function () {
                    load_notification = {'st': 2, 'post_id':<?php echo $post->id; ?>};
                    $.post('lib/imageload.php', load_notification, function (data) {
                        if (data != 0)
                        {
                            var datacl = jQuery.parseJSON(data);
                            var thumb = datacl.thumb;
                            if (thumb == "FALSE")
                            {
                                var newthumb = "generic-man-profile.jpg";
                            }
                            else
                            {
                                var newthumb = thumb;
                            }
                            //var company=datacl[0].company;
                            $('#<?php echo $new_post_image_id; ?>').html("<img src='./profile/" + newthumb + "' alt='s' class='img-responsive'>");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                        }
                    });

                });
            </script>  
        </a>
        <?php
    } elseif ($post->status == 3) {
        $new_post_image_id = $post->id . "status3" . time();
        ?>

        <a href="javascript:void(0)" id="<?php echo $new_post_image_id; ?>" class="panel-customs-post-image">

            <script type="text/javascript">

                $(document).ready(function () {
                    load_notification = {'st': 2, 'post_id':<?php echo $post->id; ?>};
                    $.post('lib/imageload.php', load_notification, function (data) {
                        if (data != 0)
                        {
                            var datacl = jQuery.parseJSON(data);
                            var thumb = datacl.thumb;
                            if (thumb == "FALSE")
                            {
                                var newthumb = "generic-man-profile.jpg";
                            }
                            else
                            {
                                var newthumb = thumb;
                            }
                            //var company=datacl[0].company;
                            $('#<?php echo $new_post_image_id; ?>').html("<img src='./profile/" + newthumb + "' alt='s' class='img-responsive'>");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                        }
                    });

                });
            </script>  
        </a>
        <?php
    } elseif ($post->status == 60 || $post->status == 61 || $post->status == 62) {
        $new_post_image_id = $post->id . "status63" . time() . "" . $post->status;
        ?>

        <a href="javascript:void(0)" id="<?php echo $new_post_image_id; ?>" class="panel-customs-post-image">

            <script type="text/javascript">

                $(document).ready(function () {
                    load_notification = {'st': 2, 'post_id':<?php echo $post->id; ?>};
                    $.post('lib/imageload.php', load_notification, function (data) {
                        if (data != 0)
                        {
                            var datacl = jQuery.parseJSON(data);
                            var thumb = datacl.thumb;
                            if (thumb == "FALSE")
                            {
                                var newthumb = "generic-man-profile.jpg";
                            }
                            else
                            {
                                var newthumb = thumb;
                            }
                            //var company=datacl[0].company;
                            $('#<?php echo $new_post_image_id; ?>').html("<img src='./profile/" + newthumb + "' alt='s' class='img-responsive'>");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                        }
                    });

                });
            </script>  
        </a>
        <?php
    } elseif ($post->status == 120 || $post->status == 121 || $post->status == 122) {
        $new_post_image_id = $post->id . "status123" . time() . "" . $post->status;
        ?>

        <a href="javascript:void(0)" id="<?php echo $new_post_image_id; ?>" class="panel-customs-post-image">

            <script type="text/javascript">

                $(document).ready(function () {
                    load_notification = {'st': 2, 'post_id':<?php echo $post->id; ?>};
                    $.post('lib/imageload.php', load_notification, function (data) {
                        if (data != 0)
                        {
                            var datacl = jQuery.parseJSON(data);
                            var thumb = datacl.thumb;
                            if (thumb == "FALSE")
                            {
                                var newthumb = "generic-man-profile.jpg";
                            }
                            else
                            {
                                var newthumb = thumb;
                            }
                            //var company=datacl[0].company;
                            $('#<?php echo $new_post_image_id; ?>').html("<img src='./profile/" + newthumb + "' alt='s' class='img-responsive'>");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                        }
                    });

                });
            </script>  
        </a>
        <?php
    } elseif ($post->status == 4) {
        $new_post_image_id = $post->id . "status4" . time();
        ?>

        <a href="javascript:void(0)" id="<?php echo $new_post_image_id; ?>" class="panel-customs-post-image">

            <script type="text/javascript">

                $(document).ready(function () {
                    load_notification = {'st': 2, 'post_id':<?php echo $post->id; ?>};
                    $.post('lib/imageload.php', load_notification, function (data) {
                        if (data != 0)
                        {
                            var datacl = jQuery.parseJSON(data);
                            var thumb = datacl.thumb;
                            if (thumb == "FALSE")
                            {
                                var newthumb = "generic-man-profile.jpg";
                            }
                            else
                            {
                                var newthumb = thumb;
                            }
                            //var company=datacl[0].company;
                            $('#<?php echo $new_post_image_id; ?>').html("<img src='./profile/" + newthumb + "' alt='s' class='img-responsive'>");
                        }
                        else
                        {
                            alert("Something Went Wrong Please retry Again");
                        }
                    });

                });
            </script>  
        </a>
    <?php } ?>
</div>