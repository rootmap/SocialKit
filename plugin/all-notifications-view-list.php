<style>
.panel-search{ left:15px !important; width:95% !important; height:55px !important;}
.list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
.btn-default{border:1px solid #DDDDDD !important; }
</style>
<div class="panel ">
    <div class="panel-heading">
       <h3 class="panel-title">Your Search Results Matches with&nbsp;<span></span>&nbsp;People</h3>  
	</div>
    <div class="panel-body">

		<!--/*<script>
			jQuery(function () {
				 load_total_searches = {'st':3,'usrid':<?php //echo $input_by; ?>};
				 $.post('lib/search_friends.php', load_total_searches,  function(data_notification) {
					 $('#friendlist_profile_l').html(data_notification);
				 });
			});
	
		</script>*/-->

        <div id="" style="clear:both;" class="row">
			<script>
				$('document').ready(function() {
					
							var search_string='<?php echo $_GET['result']; ?>';
								$.post("./lib/search_friends.php", {'st': 3,'search_data': search_string},function(fetchs){
									var datacls=jQuery.parseJSON(fetchs);
									var opts=datacls.data;
									$('#friendlist_profile_l').html(opts);
								});
						
						
				});
				
				
			</script>
            <div class="col-lg-12">
            	<div class="list-group" id="friendlist_profile_l">
                		<!--<a class="list-group-item bg-default">
                        
                        </a>-->
                        <?php ?>
                </div>
            </div>


        </div>

        <div style="clear:both;"></div>


    </div>

    <div class="panel-footer">

        <!--<nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>-->

    </div>


</div>