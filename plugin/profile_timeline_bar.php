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
                        <li class="active"><a href="./home.php"><i class="fa fa-tasks"></i>timeline</a></li>
                        <li><a href="./user-about.php?user_id=<?php echo $new_user_id; ?>"><i class="fa fa-info-circle"></i>about</a></li>
                        <li><a href="./all-friend-list.php"><i class="fa fa-users"></i>friends</a></li>
                        <li><a href="photos.php?user_id=<?php echo $new_user_id; ?>"><i class="fa fa-file-image-o"></i>photos</a></li>
                        <li><a href="messages.php"><i class="fa fa-comment"></i>messages</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>