
    <div id="friend_request_list">
    	<script>
			jQuery(function () {
         window.setInterval(function() {
    				 load_total_frnds = {'st':7,'usrid':<?php echo $input_by; ?>};
    				 $.post('lib/shout.php', load_total_frnds,  function(data_notification) {
    					 $('#friend_request_list').html(data_notification);
    				 });
         }, 2000);
			});

		</script>
    </div>
