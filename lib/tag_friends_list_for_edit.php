


<select multiple id="e1" style="width:100%;" class='frind_names'>
  <script>
  jQuery(function () {
     load_total_frnds = {'st':39,'usrid':'<?php echo $input_by; ?>','status':'<?php echo $post_status;?>','postID':<?php echo $editurl;?>};
     $.post('lib/shout.php', load_total_frnds,  function(data_notification) {
       $('#e1').html(data_notification);
     });
  });

</script>
</select>
