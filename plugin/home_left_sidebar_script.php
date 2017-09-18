<div class="col-sm-2 col-xs-12 aside no-padding hidden-xs">
    <aside class="side-menu">
        <!-- Main Menu -->
        <div class="side-menu-container">
            <ul class="nav navbar-nav">

                <li><a href="profile.php">
                        <span class="fa">
                            <?php
                            $photo_id = $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $new_user_id, "status", 2, "photo_id");
                            $photo = $obj->SelectAllByVal("dostums_photo", "id", $photo_id, "photo");

                            if ($photo == "") {
                                $new_photo = "generic-man-profile.jpg";
                            } else {
                                $new_photo = $photo;
                            }
                            ?>
                            <img alt="user" src="./profile/<?php echo $new_photo; ?>" style="border:1px solid #2C99CE;">

                        </span>
                        <?php echo $dostums_user_name; ?>
                    </a></li>
                <li><a href="user-about.php"><span class="fa fa-edit"></span> Profile Setting</a></li>
                <li class="divider"></li>
                <li class=" navbar-header"><a class="text-muted">FAVORITES</a></li>
                <li><a href="recent_notice_detail.php"><span class="fa fa-newspaper-o"></span> News Feed</a></li>
                <li><a href="./messages.php"><span class="fa fa-envelope"></span> Messages</a></li>
                <!--<li><a href="#"><span class="fa fa-calendar"></span> Events</a></li>
                <li><a href="#"><span class="fa fa-comments"></span> GROUPS</a></li>
                <li><a href="#"><span class="fa fa-bookmark"></span> Saved <span
                        class="label label-success ">16</span> </a></li>-->

                <!-- group-->
                <li class="divider"></li>
                <?php
                $stringQuery = "SELECT dg.name,dg.group_id,dgi.class FROM dostums_group as dg Left JOIN dostums_group_icon as dgi on dg.icon_id = dgi.id WHERE dg.user_id ='" . $input_by . "' and dg.name != '' or dg.name is null GROUP BY dg.group_id";
                $lstGroups = $obj->FlyQuery($stringQuery);
                ?>
                <li class=" navbar-header"><a href="./all-group-list.php" class="text-muted">GROUPS
                        <span class="label label-warning">
                            <?php
                            echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
                            ?></span></a></li>
                <?php
                if (is_array($lstGroups)) {
                    if (count($lstGroups) > 0) {
                        $i = 0;

                        foreach ($lstGroups as $lKey => $lVal) {
                            ?>
                            <li><a href="group.php?group_id=<?php echo $lVal->group_id; ?>">
                                    <span style="color:#2C99CE;" class="<?php echo $lVal->class == "" ? "fa fa-users text-warning" : $lVal->class; ?>">
                                    </span><?php echo $lVal->name; ?></a></li>
                            <?php
                            if ($i == 4)
                                break;
                            $i++;
                        }
                    }
                }
                ?>

<!--<li><a href="#"><span class="fa  fa-plus-square"></span> New Groups</a></li>-->
                <li><a href="./all-group-list.php"><span class="glyphicon glyphicon-signal"></span> Groups Feed</a></li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#myModal"><span class="fa  fa-pencil-square"></span> Create Group</a>
                    <?php include('plugin/group_signup_form.php'); ?>
                </li>

                <!-- Page -->
                <li class="divider"></li>
                <?php
                $stringQuery2 = "SELECT
				df.user_id,
				df.page_id,
				df.name,
				dpp.photo_id,
				dpp.status,
				IFNULL(dp.photo,'page_default.png') AS `photo`
				FROM dostums_fanpage as df
				left JOIN dostums_page_profile_photo as dpp
				on df.page_id = dpp.page_id AND dpp.status='2'
				LEFT JOIN dostums_photo as dp on dpp.photo_id = dp.id
				WHERE df.user_id ='" . $input_by . "' and (df.name != '' or df.name is null) GROUP BY df.page_id";
                $lstPages = $obj->FlyQuery($stringQuery2);
                ?>

                <li class=" navbar-header">
                    <a href="./all-page-list.php" class="text-muted">PAGES
                        <span class="label label-warning">
                            <?php
                            echo is_array($lstPages) ? (count($lstPages) >= 1 ? count($lstPages) : "&nbsp;0") : "&nbsp;0";
                            ?>
                        </span>
                    </a>
                </li>
                <?php
                if (is_array($lstPages)) {
                    if (count($lstPages) > 0) {
                        $p = 0;

                        foreach ($lstPages as $lpKey => $lpVal) {
                            ?>
                            <li><a href="page.php?page_id=<?php echo $lpVal->page_id; ?>">
                                    <span class="glyphicon">
                                        <img alt="d" src="./profile/<?php echo $lpVal->photo; ?>">
                                    </span><?php echo $lpVal->name; ?>
                                </a></li>
                            <?php
                            if ($p == 4)
                                break;
                            $p++;
                        }
                    }
                }
                ?>

                <li><a href="./all-page-list.php"><span class="glyphicon glyphicon-signal"></span> Pages Feed</a></li>

<!--<li><a href="#"><span class="fa fa-envelope"></span> Like Pages</a></li>
<li><a href="#"><span class="fa fa-pencil-square"></span> New Page</a></li>-->
                <li><a href="#" data-toggle="modal" data-target="#fanpage_modal_form"><span class="fa  fa-plus-square"></span> Create Page</a>
                    <?php include('plugin/page_signup_form.php'); ?>
                </li>
                <!--<li><a href="#"><span class="fa  fa-bullhorn"></span> Promote Page</a></li>-->

                <!-- friends -->
                <li class="divider"></li>
                <li class="navbar-header"><a href="./all-friend-list.php" class="text-muted">FRIENDS
                        <span class="label label-danger" id="total_friend_profile">
                            <script>
                                jQuery(function () {
                                    window.setInterval(function () {
                                        load_frnd_notification = {'st': 3, 'usrid':<?php echo $input_by; ?>};
                                        $.post('lib/shout.php', load_frnd_notification, function (data_notification) {
                                            var frndData = jQuery.parseJSON(data_notification);
                                            var friend_request = frndData.friend_request;
                                            $('#total_friend_profile').html(friend_request);

                                        });
                                    }, 1000);
                                });
                            </script>
                            0
                        </span>
                    </a></li>
                <li><a href="./all-friend-list.php"><span class="fa fa-users"></span> All Friends</a></li>
                <!--<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Close Friends</a></li>
                <li><a href="#"><span class="fa fa-envelope"></span> Family</a></li>-->


            </ul>
        </div>
        <!-- /.navbar-collapse -->


    </aside>
</div>
