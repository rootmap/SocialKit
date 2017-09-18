<div class="col-md-12  col-sm-12 col-xs-12 no-padding">
    <div class="panel-options">
        <div class="navbar navbar-default navbar-cover">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button data-target="#profile-opts-navbar" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="profile-opts-navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="./group.php?group_id=<?php echo $new_group_id; ?>&timeline"><i class="fa fa-tasks"></i>timeline</a></li>
                        <li><a href="./group-about.php?group_id=<?php echo $new_group_id; ?>"><i class="fa fa-info-circle"></i>about</a></li>
                        <li><a href="./all-group-member-list.php?group_id=<?php echo $new_group_id; ?>"><i class="fa fa-users"></i>Members</a></li>
                        <li><a href="./group-photos.php?group_id=<?php echo $new_group_id; ?>"><i class="fa fa-file-image-o"></i>photos</a></li>
                        <?php if(in_array($input_by,$admin_list)){ ?>
                        <li><a href="./group-settings.php?group_id=<?php echo $new_group_id; ?>"><i class="fa fa-cog"></i>Settings</a></li>
                        <?php } ?>
                        <!--<li><a href="messages.php"><i class="fa fa-comment"></i>messages</a></li>-->

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>