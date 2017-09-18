<style>
    .panel-search{ left:15px !important; width:95% !important; height:55px !important;}
    .list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
    .btn-default{border:1px solid #DDDDDD !important; }
</style>

<script>
	function grpinvite(user_id)
	{
		var group_id ='<?php echo $_GET['group_id']; ?>';
		load_data_like = {'st': 16,'user_id':user_id, 'group_id': group_id};
		$.post('lib/status.php', load_data_like, function (data) {
			if (data == 2)
			{
				$('#invite_member_'+user_id).fadeIn('slow');
				$('#invite_member_'+user_id).html('<i class="fa fa-user-times"></i> Invited');
			}
			else if (data == 0)
			{
				$('#invite_member_'+user_id).fadeIn('slow');
				$('#invite_member_'+user_id).html('<i class="fa fa-user-plus"></i> Invite');
			}
		});
	}
					
</script>

<div class="panel panel-default">
<?php
    $stringQuery = "SELECT a.id,
	a.group_id,
	a.user_id,
	a.input_by,
	a.date_time,
	a.status,
	IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
	concat(du.first_name,' ',du.last_name) as name
	FROM dostums_group_members AS a
	LEFT JOIN dostums_user as du ON du.id=a.user_id 
	LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.user_id 
	LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id  
	WHERE a.`group_id`='".$new_group_id."' 
	AND a.status=1 GROUP BY a.id";
    $lstGroups = $obj->FlyQuery($stringQuery);
	?>
	<div class="panel-heading">
        <div class="panel-title"><i class="fa fa-users"></i> Members
            <a href="./all-group-member-list.php?group_id=<?php echo $new_group_id; ?>" class="pull-right">
                <small id="total_group_member"> 
                        <?php
						echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
						?>
                    people (View All)</small>
            </a></div>

    </div>
    <!-- START list group-->
    <div id="all-group-list" class="list-group latest-user-group  has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
        <?php
        if (is_array($lstGroups)) {
            if (count($lstGroups) > 0) {
                //$i =0;

                foreach ($lstGroups as $lVal) {
                    ?>
                    
                    
                    <div class="list-group-item" >
                        <div class="media">
                            <a href="./profile.php?user_id=<?php echo $lVal->user_id;?>" class="pull-left">
                                <img class="media-object img-circle thumb48" alt="Image"
                                     src="./profile/<?php echo $lVal->photo; ?>">
                            </a>
                            <div class="media-body clearfix">
                                <?php /*?><small class="pull-right "><span id="add_member" class="btn btn-sm btn-danger">
                                <?php
									if ($lVal->status==0){
										echo '<i class="fa fa-user-plus"></i> Invite </span></small>';
									}elseif($lVal->status==1){
										echo '<i class="fa fa-user-plus"></i> Suspend </span></small>';	
									}elseif($lVal->status==2){
										echo '<i class="fa fa-user-plus"></i> Invited </span></small>';	
									}
								?><?php */?>
                                
                                <a href="./profile.php?user_id=<?php echo $lVal->user_id;?>" class="media-heading text-primary">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                    <?php echo $lVal->name; ?>
                                </a>
            
                                <p class="mb-sm">
                                    <small><?php echo $lVal->date_time; ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php
		
                    }
                }
            }
        ?>
        
    </div>
    <div id="all-group-list-search" class="list-group latest-user-group  has-friend-list mCustomScrollbar"  data-mcs-theme="dark"></div>
    <!-- END list group-->
    <!-- START panel footer-->
    <div class="panel-footer clearfix">
        <div class="input-group">
            <input id="group-members-search" type="text" class="form-control input-sm" placeholder="Search user ..">
             <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i>
                </button>
             </span>
             
             <script>
                $('document').ready(function () {
                    $('#all-group-list-search').hide()
                    $('#group-members-search').keyup(function () {
                        $('#all-group-list').hide();
                        var countvaluesgm = $(this).val().length;
                        if (countvaluesgm >= 4)
                        {
							//var group_id ='<?php //echo $_GET['group_id']; ?>';
                            $.post("./lib/search_groups.php", {'st': 2, 'search_grp_members_data': $(this).val(),'group_id':'<?php echo $_GET['group_id']; ?>'}, function (fetch) {
                                var datacls = jQuery.parseJSON(fetch);
                                var opt34 = datacls.datas;
                                $('#all-group-list').hide();
                                $('#all-group-list-search').show();
                                $('#all-group-list-search').html(opt34);
                            });

                        }
                        else if (countvaluesgm == 0)
                        {
                            $('#all-group-list-search').hide();
                            $('#all-group-list').show();
                        }
                        else
                        {

                        }
                    });

                });


            </script>
        </div>
    </div>
    <!-- END panel-footer-->
</div>