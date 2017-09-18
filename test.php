<?php
// [update status start]
         $ar = array('status' => '1');
         $selectall = $obj->SelectAllByID_Multiple("online_user_track", $ar);

         foreach ($selectall as $value) {
           $user_id = $value->user_id;

           $selectLastTime = $value->last_time;
          //  $database_time = new DateTime($selectLastTime);

           $dateTime = new DateTime($selectLastTime);
          //  $d = $database_time->format("Y-m-d H:i:s");
           $d = $dateTime->format("Y-m-d H:i:s");
           $current = date("Y:m:d H:i:s");
    echo "<pre/> database time ";
    print_r($d);
    echo "<br/> current ";
    print_r($current);
    echo "<br/>";
    echo $user_id;
    echo "<br/>";


     if ($dateTime->diff(new DateTime)->format('%R') == '+') {
      //  echo "inactive";
       $minit = $dateTime->diff(new DateTime)->i;
       if($minit >= 1){
?>
        <script>
      setInterval(function() {
        var uid = "<?php echo $user_id;?>";
        console.log(uid);
        $.ajax({
                type: "POST",
                url: "./lib/shout.php",
                dataType: "json",
                data: {
                  st:41,
                  uid:uid
                },
                success: function (response) {
                  var obj = response;
                  if (obj.output == "success") {
                    // success(obj.msg);
                  } else {
                    // error(obj.msg);
                  }
                }
              });
      }, 7000);
        </script>
<?php
       }

          $date1 = strtotime($selectLastTime);
          $date2 = time();
          $subTime = $date1 - $date2;
          $y = intval($subTime / (60 * 60 * 24 * 365));
          $d = intval($subTime / (60 * 60 * 24)) % 365;
          $h = intval($subTime / (60 * 60)) % 24;
          $m = intval($subTime / 60) % 60;

          $result = "";
          if ($y != 0) {
              $result = substr($y, 1, 200) . " y ago";
          } elseif ($d != 0) {
              $result = substr($d, 1, 200) . " d ago";
          } elseif ($h != 0) {
              $result = substr($h, 1, 200) . " h ago";
          } elseif ($m != 0) {
              $result = substr($m, 1, 200) . " min ago";
          } else {
              $s = intval($subTime % 60);
              $result = substr($s, 1, 200) . " sec ago";
          }

          // echo $result;
          //
     } else {
      //  echo 'active';
     }
}
// [update status end]
?>





// $qe2 = $obj->FlyQuery("SELECT
//                       onut.user_id as uidm,
//                       onut.last_time as last_time
//                       FROM online_user_track AS onut
//                       WHERE onut.status = '2' AND onut.user_id IN ( SELECT
//                                                                     CASE WHEN df.uid <> '". $input_by ."' THEN df.uid ELSE                                                      df.to_uid END AS friend_id
//                                                                     FROM dostums_friend AS df
//                                                                     WHERE
//                                                                     (df.uid = '". $input_by ."' OR df.to_uid = '". $input_by ."')
//                                                                     AND
//                                                                     df.status = '2'
//                                                                   )");
//
// if(!empty($qe2)){
//   foreach ($qe2 as  $qeval2) {
//         // echo $offlineUserId = $qeval2->uidm;
//   }
// }


$date1 = strtotime($selectLastTime);
$date2 = time();
$subTime = $date1 - $date2;
$y = intval($subTime / (60 * 60 * 24 * 365));
$d = intval($subTime / (60 * 60 * 24)) % 365;
$h = intval($subTime / (60 * 60)) % 24;
$m = intval($subTime / 60) % 60;

$result = "";
if ($y != 0) {
    $result = substr($y, 1, 200) . " y ago";
} elseif ($d != 0) {
    $result = substr($d, 1, 200) . " d ago";
} elseif ($h != 0) {
    $result = substr($h, 1, 200) . " h ago";
} elseif ($m != 0) {
    $result = substr($m, 1, 200) . " min ago";
} else {
    $s = intval($subTime % 60);
    $result = substr($s, 1, 200) . " sec ago";
}

echo $result;
