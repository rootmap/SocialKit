
    <div id="friendlist_profile_l" class="col-md-12">
    	<script>
			jQuery(function () {
				 load_total_frnds = {'st':6,'usrid':'<?php echo $input_by; ?>'};
				 $.post('lib/shout.php', load_total_frnds,  function(data_notification) {
					 $('#friendlist_profile_l').html(data_notification);
				 });
			});
	
		</script>
    </div>
   
