<aside id="chat" style="margin-top:25px;">

    <ul role="tablist" class="tab-nav tn-justified" style="overflow: hidden;" tabindex="0">
        <li class="active" role="presentation" >
          <a data-toggle="tab" role="tab" aria-controls="online" href="#online" aria-expanded="false">Online Now</a>
        </li>
        <li role="presentation">
          <a data-toggle="tab" role="tab" aria-controls="friends" href="#friends" aria-expanded="true">Friends</a>
        </li>
    </ul>

    <div class="tab-content tab-content-chat">

        <!-- [ online friends panel start] -->
        <div id="online" class="tab-pane active" role="tabpanel">
            <div class="listview chatListView" id="live">
                <script type="text/javascript">
                     setInterval(function(){

                         $.ajax({
                                 type: "POST",
                                 url: "./lib/shout.php",
                                 dataType: "json",
                                 data: {
                                   st:42
                                 },
                                 success: function (response) {
                                   var obj = response;
                                   if (obj.output == "success") {
                                      var content = obj.content;
                                      $('#live').html(content);
                                   } else {
                                     // error(obj.msg);
                                   }
                                 }
                               });
                     }, 5000);
                </script>
            </div>
        </div>
        <!-- [ online friends panel end] -->

        <!-- [ friends panel start] -->
        <div id="friends" class="tab-pane" role="tabpanel">
            <div class="listview chatListView">
                <?php
                 $chk = $obj->FlyQuery("SELECT
                                       df.id,
                                       df.uid,
                                       df.to_uid,
                                       df.status,
                                       case when df.uid <> '". $new_user_id ."'  then df.uid else df.to_uid END AS friendID
                                       FROM dostums_friend AS df
                                       WHERE (df.uid = '". $new_user_id ."' OR df.to_uid = '". $new_user_id ."') AND df.status = '2' ORDER BY df.id DESC");
                
                 
                 
                 if(!empty($chk)){
                   foreach ($chk as $chkvalue) {
                       $uval = $chkvalue->friendID;
                
                       $chknotification = $obj->FlyQuery("SELECT du.id as uid,
                         concat(du.first_name,' ',du.last_name) as name,
                         IFNULL(dp.photo,'generic-man-profile.jpg') as photo
                         FROM
                         dostums_user AS du
                         LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id='".$uval."' AND dpp.status='2'
                         LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
                         WHERE du.id = '". $uval ."' ");
                
                
                 if (!empty($chknotification))
                     foreach ($chknotification as $noti) {
                        ?>
                        <a href="profile.php?user_id=<?php echo $noti->uid; ?>" class="lv-item" id="chat_window" name="<?php echo $noti->id; ?>" datalink="profile.php?user_id=<?php echo $noti->id; ?>">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img alt="" src="./profile/<?php echo $noti->photo; ?>" class="lv-img-sm">
                                </div>
                                <div class="media-body">
                                    <div class="lv-title"><?php echo $noti->name; ?></div>
                                </div>
                            </div>
                        </a> 
                        <?php
                     }
                
                   }
                 }
                ?>
            </div>
        </div>
        <!-- [ friends panel end] -->



    </div>

</aside>






<!--
SELECT
alldata.* FROM
(select
a.id,
a.uid,
a.status,
IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
concat(du.first_name,' ',du.last_name) as name
FROM
dostums_friend as a
LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.uid AND dpp.status='2'
LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
LEFT JOIN dostums_user as du ON du.id=a.uid
WHERE (a.to_uid='13' OR a.uid = '13') AND a.status='2') as alldata WHERE alldata.uid!='' -->
