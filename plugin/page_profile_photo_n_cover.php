<?php 
$sqlcurrent_profile_image=$obj->SelectAllByVal2("dostums_page_profile_photo","page_id",$new_page_id,"status",2,"photo_id");
if(!empty($sqlcurrent_profile_image))
{
	$profile_image="./profile/".$obj->SelectAllByVal("dostums_photo","id",$sqlcurrent_profile_image,"photo");	
}
else
{
	$profile_image="./images/user/generic-man-profile.jpg";
}

$sqlcurrent_cover_image=$obj->SelectAllByVal2("dostums_page_cover_photo","page_id",$new_page_id,"status",2,"photo_id");
if(!empty($sqlcurrent_cover_image))
{
	$cover_image="./profile/".$obj->SelectAllByVal("dostums_photo","id",$sqlcurrent_cover_image,"photo");	
}
else
{
	$cover_image="./images/user/ocean-beach-generic-cover.jpg";
}

$change_flag=false;
$groupownerquery=$obj->FlyQuery("SELECT user_id,page_id FROM dostums_fanpage WHERE page_id='".$new_page_id."'");
$group_owner=$groupownerquery[0]->user_id;
if($group_owner==$input_by)
{
    $change_flag=true;
}
else
{
    $change_flag=false;
}
?>
<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
    <div class="cover-photo" id="cover-photo" style="
    background:url('<?php echo $cover_image; ?>'); background-color: #435e9c; background-repeat: no-repeat;
background-position: center; background-size: cover;">
		<?php 
                if (in_array($obj->filename(), array("page.php")) && $change_flag==true) {
                //if($obj->filename()=="page.php"){  ?>
        <div class="fileUpload" style="float:left;">
            <span id="uploadFile"></span>
            <input type="file" id="file_cover" class="upload" />
        </div>    
        <?php if(in_array($input_by,$admin_list)){ ?>    
        <a href="#" class="change-cover-photo"> <i class="fa fa-image"></i> change photo</a>
        <?php } ?>
		<?php } ?>
        <div class="profile-photo-box">
                    <?php if (in_array($obj->filename(), array("page.php")) && $change_flag==true) {  ?>
                    <div class="fileUpload" style="float:left;">
                        <span id="uploadFile"></span>
                        <input type="file" id="file" class="upload" />
                    </div>	
                    
                    <?php } ?>
            <img id="profile_photo" class="profile-photo show-in-modal" src="<?php echo $profile_image; ?>">
            <?php if($obj->filename()=="page.php"){  ?>
            <?php if(in_array($input_by,$admin_list)){ ?>    
            <a href="#" class="change-profile-photo"> <i class="fa fa-image"></i> change photo</a>
            <?php } } ?>
        </div>
		
        <div class="cover-name"><?php echo $obj->SelectAllByVal("dostums_fanpage","page_id",$new_page_id,"name"); ?> <br>
            <span class="user-name-display"><?php echo "D.P-".$new_page_id; ?></span>
        </div>

        <div class="profile-photo-user">
			
            <ul class="list-unstyled list-inline  navbar-global navbar-right">
                <li><a id="page_like" class="user-actions-follow-button btn-stroke btn-info btn-sm  follow-button btn">
                    <i class="fa fa-thumbs-o-up"></i> Like
                </a></li>
    
                <!--<li class="dropdown keep-open">
                    <a data-toggle="dropdown"
                       class="dropdown-toggle btn-primary btn-stroke btn-sm btn-stroke" href="#"
                       aria-expanded="false"> <span class="fa fa-gear "></span></a>
                    <ul class="dropdown-menu dropdown-sm">
                        <li><a href="#">Add People </a></li>
                        <li><a href="#">Manage Requests </a></li>
                        <li><a href="#">Create Event </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                            <div class="togglebutton">
                                Turn off notifications
                            </div>
                        </a></li>
                        <li class="divider"></li>
                        <li><a href="#">Add to Favorites </a></li>
                        <li><a href="#">Report Page </a></li>
                        <li><a href="#">Create New Group </a></li>
                    </ul>
                </li>-->
    
    
                <li class="hide">
    
                    <a class=" btn-stroke btn-sm  follow-button btn ">
                        <i class="fa fa-pencil"></i> edit profile
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <?php 
    //profile time line bar start
    include('page_timeline_bar.php');
    //profile time line end
    ?>

</div>