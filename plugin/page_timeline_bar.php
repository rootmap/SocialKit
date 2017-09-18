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
                        <li class="active"><a href="./page.php?page_id=<?php echo $new_page_id; ?>"><i class="fa fa-tasks"></i>timeline</a></li>
                        <li><a href="./page_about.php?page_id=<?php echo $new_page_id; ?>"><i class="fa fa-info-circle"></i>about</a></li>
                        <li><a href="./all-page-followers-list.php?page_id=<?php echo $new_page_id; ?>"><i class="fa fa-users"></i>Followers</a></li>
                        <li><a href="./page-photos.php?page_id=<?php echo $new_page_id; ?>"><i class="fa fa-file-image-o"></i>photos</a></li>
                        <?php if(in_array($input_by,$admin_list)){ ?>
                        <li><a href="./page_settings.php?page_id=<?php echo $new_page_id; ?>"><i class="fa fa-cog"></i>Settings</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>