<div id="group_admins_list" class="col-md-12">
	<script>
        jQuery(function () {
            var group_id ='<?php echo $_GET['group_id']; ?>';
             load_total_admins = {'st':17,'group_id':group_id,'usrid':'<?php echo $input_by; ?>'};
             $.post('lib/shout.php', load_total_admins,  function(data_notificationgadmin) {
                 $('#group_admins_list').html(data_notificationgadmin);
             });
        });
	</script>
</div>
   
