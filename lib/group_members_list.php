<div id="group_member_list" class="col-md-12">
	<script>
        jQuery(function () {
            var group_id ='<?php echo $_GET['group_id']; ?>';
             load_total_frnds = {'st':11,'group_id':group_id,'usrid':'<?php echo $input_by; ?>'};
             $.post('lib/shout.php', load_total_frnds,  function(data_notification) {
                 $('#group_member_list').html(data_notification);
             });
        });

    </script>
</div>
   
