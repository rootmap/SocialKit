
    <div id="followers_profile_list" class="col-md-12">
    	<script>
			jQuery(function () {
				 var page_id ='<?php echo $_GET['page_id']; ?>';
				 load_total_followersProfile = {'st':18,'page_id':page_id};
				 $.post('lib/shout.php', load_total_followersProfile,  function(data_notificationpfl) {
					 $('#followers_profile_list').html(data_notificationpfl);
				 });
			});
	
		</script>
    </div>
   
