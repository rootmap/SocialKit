<div id="group_mem_rqst_list" class="col-md-12">
	<script>
        jQuery(function () {
            var group_id ='<?php echo $_GET['group_id']; ?>';
             load_total_mem_rqst = {'st':13,'group_id':group_id,'usrid':'<?php echo $input_by; ?>'};
             $.post('lib/shout.php', load_total_mem_rqst,  function(data_notificationgmr) {
                 $('#group_mem_rqst_list').html(data_notificationgmr);
             });
        });
	</script>
</div>
   
