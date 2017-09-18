
    <div id="friend_blocked_list">
    	<script>
			jQuery(function () {
				 load_total_blocked_frnds = {'st':25,'usrid':<?php echo $input_by; ?>,'iteam':'myFriendBlock'};
				 $.post('lib/shout.php', load_total_blocked_frnds,  function(data_notification) {
					 $('#friend_blocked_list').html(data_notification);
				 });

			});

		</script>
    </div>
