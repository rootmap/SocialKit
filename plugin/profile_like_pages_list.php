<style>
.panel-search{ left:15px !important; width:95% !important; height:55px !important;}
.list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
.btn-default{border:1px solid #DDDDDD !important; }
</style>
<div class="panel panel-default panel-page">
	<?php
		 $stringQuery2 = "SELECT 
						df.id,
						df.user_id,
						df.page_id,
						df.name,
						dpp.photo_id,
						dpp.status,
						IFNULL(dp.photo,'page_default.png') AS `photo`
						FROM dostums_fanpage as df 
						Left JOIN dostums_page_profile_photo as dpp on df.page_id = dpp.page_id AND dpp.status='2'
						LEFT JOIN dostums_photo as dp on dpp.photo_id = dp.id
						where df.user_id in (select user_id from dostums_page_likes where user_id='".$new_user_id."') 
						GROUP BY df.page_id";
                    $lstPages = $obj->FlyQuery($stringQuery2); 
		
		?>
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-globe"></i> Pages
            <small class="text-muted">
            <?php 
				echo is_array($lstPages) ? (count($lstPages) >=1 ? count($lstPages): "&nbsp;0") : "&nbsp;0"; 
				?>
             likes</small>

            <a href="all-page-list.php" class="pull-right">
                <small> View all</small>
            </a>
        </div>

    </div>

    

    <!-- START list group-->
    <div id="search-result-feed" class="list-group latest-user-group has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
    
    </div>
    <div id="default-feed" class="list-group latest-user-group has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
    	<?php
			 if(is_array($lstPages)){
			 if(count($lstPages)>0){	  
			 $p =0;
			  
			 foreach($lstPages as $lpVal){  
			?>
        <!-- START list group item-->
        <div id="listpld_<?php echo $lpVal->id; ?>" class="list-group-item">
            <div class="media">
                <a href="page.php?page_id=<?php echo $lpVal->page_id; ?>" class="pull-left">
                    <img class="media-object  thumb48" alt="Image"
                         src="./profile/<?php echo $lpVal->photo;?>">
                </a>
                <?php  
                     $sqlquerypp=$obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,page_id FROM dostums_page_likes WHERE page_id='".$lpVal->page_id."' AND user_id='".$lpVal->user_id."'");
                     if(!empty($sqlquerypp))
						{
					 	$dplstatus=$sqlquerypp[0]->status;
						}
						else
						{
						$dplstatus=0;
						}
				?>
                <div class="media-body clearfix">
                    <?php 
                    if($dplstatus==1){
                    ?>
                    <small onclick="PageLikeFromProfile('<?php echo $lpVal->page_id; ?>','<?php echo $lpVal->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i
                            class="fa fa-thumbs-up"></i> Unlike </span></small>
                    <?php 
                    }elseif($dplstatus==2){
                    ?>
                    <small onclick="PageLikeFromProfile('<?php echo $lpVal->page_id; ?>','<?php echo $lpVal->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i
                            class="fa fa-thumbs-up"></i> Confirm Like </span></small>
                    <?php
                    }elseif($dplstatus==0){
                    ?>
                    <small onclick="PageLikeFromProfile('<?php echo $lpVal->page_id; ?>','<?php echo $lpVal->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i
                            class="fa fa-thumbs-up"></i> like </span></small>
                    <?php
                    }
                    ?>        
                    <a href="page.php?page_id=<?php echo $lpVal->page_id; ?>" class="media-heading text-primary">
                        <span class="circle circle-success circle-lg text-left"></span>
                    	<strong><?php echo $lpVal->name; ?>  </strong>  
                    </a>

                    <!--<p class="mb-sm">
                        <small>503 members</small>
                        <small>The eSelling Zone is an online...</small>
                    </p>-->
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
            <input id="page-search" type="text" class="form-control input-sm" placeholder="Search page ..">
             <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i>
                </button>
             </span>
             
             <script>
				$('document').ready(function(e) {
						$('#search-result-feed').hide()
						$('#page-search').keyup(function(e) {
							$('#default-feed').hide();
							var countvalues=$(this).val().length;
							if(countvalues>=4)
							{
								$.post("./lib/search_pages.php", {'st': 1,'search_pg_data': $(this).val(),'user_id':<?php echo $new_user_id; ?>},function(fetch){
									var datacl=jQuery.parseJSON(fetch);
									var opt3=datacl.data;
									$('#default-feed').hide();
									$('#search-result-feed').show();
									$('#search-result-feed').html(opt3);
								});
								
							}
							else if(countvalues==0)
							{
								$('#search-result-feed').hide();
								$('#default-feed').show();
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