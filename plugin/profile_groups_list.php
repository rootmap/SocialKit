<style>
    .panel-search{ left:15px !important; width:95% !important; height:55px !important;}
    .list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
    .btn-default{border:1px solid #DDDDDD !important; }
</style>
<div class="panel panel-default panel-page panel-page-group">
    <?php
    $stringQuery = "SELECT
	dg.id, 
	dg.user_id,
    dg.name,
    dg.group_id,
    dgi.class 
    FROM dostums_group as dg 
    Left JOIN dostums_group_icon as dgi on dg.icon_id = dgi.id 
    WHERE 
    dg.user_id ='".$new_user_id."' 
    ORDER BY dg.group_id DESC";
    $lstGroups = $obj->FlyQuery($stringQuery);
    ?>
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-group"></i> GROUPS
            <small class="text-muted">
                <?php
                echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
                ?>
            </small>
            <a href="./all-group-list.php" class="pull-right">
                <small> View all</small>
            </a>
        </div>
    </div>


    <!-- START list group-->
    <div id="search-result-feed2" class="list-group latest-user-group has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
        
    </div>
    <div id="default-feed2" class="list-group latest-user-group has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
        <?php
        if (is_array($lstGroups)) {
            if (count($lstGroups) > 0) {
                foreach ($lstGroups as $lVal) {
                    ?>
                    <!-- START list group item-->
                    <div id="listgjd_<?php echo $lVal->id; ?>" class="list-group-item" title="<?php echo $lVal->name; ?>">
                        <div class="media">
                            <a href="group.php?group_id=<?php echo $lVal->group_id; ?>" class="pull-left">
                                <span style="color:#2C99CE; margin-right:15px; font-size:30px;" class="<?php echo   $lVal->class == "" ? "fa fa-users text-warning": $lVal->class;?>">
                            </a>
                            <div class="media-body clearfix">
                            	<?php  
									 $sqlquerydgms=$obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,group_id FROM dostums_group_members WHERE group_id='".$lVal->group_id."' AND user_id='".$new_user_id."'");
									 if(!empty($sqlquerydgms))
									 {
									 $dgmstatus=$sqlquerydgms[0]->status;
									 }
									 else
									 {
										$dgmstatus=0; 
									 }
								?>
                                <small class="pull-right ">
                                	<!--<span onclick="grpjoinleave(<?php //echo $lVal->group_id; ?>)" id="invite_member_<?php //echo $lVal->group_id; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Join </span>-->
                                	<?php
										if($dgmstatus==1){
										?>
										<span onclick="GroupJoinFromProfile('<?php echo $lVal->group_id; ?>','<?php echo $lVal->id; ?>')" class="btn btn-sm btn-success"><i class="fa fa-user-times"></i> Leave</span>
										<?php 
										}elseif($dgmstatus==2){
										?>
										<span onclick="GroupJoinFromProfile('<?php echo $lVal->group_id; ?>','<?php echo $lVal->id; ?>')" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i> Accept</span>
										<?php
										}elseif($dgmstatus==3){
										?>
										<span onclick="GroupJoinFromProfile('<?php echo $lVal->group_id; ?>','<?php echo $lVal->id; ?>')" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i> Request Sent</span>
										<?php
										}elseif($dgmstatus==0){
										?>
										<span onclick="GroupJoinFromProfile('<?php echo $lVal->group_id; ?>','<?php echo $lVal->id; ?>')" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Join</span>
										<?php
										}
										?>
                                </small>
                                <a href="group.php?group_id=<?php echo $lVal->group_id; ?>" class="media-heading">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                    <strong class="text-primary"><?php echo substr($lVal->name,0,9); ?></strong>
                                </a>

                                <p class="mb-sm">
                                    <small>503 members</small>
                                    <small>The eSelling Zone is an online...</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END list group item-->


        <?php
		
                    }
                }
            }
        ?>


    </div>
    <!-- END list group-->
    <!-- START panel footer-->
    <div class="panel-footer clearfix">
        <div class="input-group">
            <input id="group-search" type="text" class="form-control input-sm" placeholder="Search group ..">
            <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i>
                </button>
            </span>

            <script>
                $('document').ready(function (e) {
                    $('#search-result-feed2').hide()
                    $('#group-search').keyup(function (e) {
                        $('#default-feed2').hide();
                        var countvalues = $(this).val().length;
                        if (countvalues >= 4)
                        {
                            $.post("./lib/search_groups.php", {'st': 1, 'search_gr_data': $(this).val(),'user_id':<?php echo $new_user_id; ?>}, function (fetch) {
                                var datacl = jQuery.parseJSON(fetch);
                                var opt3 = datacl.data;
                                $('#default-feed2').hide();
                                $('#search-result-feed2').show();
                                $('#search-result-feed2').html(opt3);
                            });

                        }
                        else if (countvalues == 0)
                        {
                            $('#search-result-feed2').hide();
                            $('#default-feed2').show();
                        }
                        else
                        {

                        }
                    });

                    /*$('.friends').click(function(e){
                     var getlink=$(this).find('a').attr('href');
                     alert('success');	
                     });*/

                });


            </script>
        </div>
    </div>
    <!-- END panel-footer-->
</div>