<div class="share-panel">


   <?php
    //  $likersName = '';

     $likesIDs = $obj->FlyQuery("SELECT user_id from dostums_likes WHERE post_id = ' ".$postID."' ORDER BY id DESC LIMIT 1");

     if(!empty($likesIDs)){
       echo '<i class="fa fa-thumbs-up"></i>'.'&nbsp;';
       foreach ($likesIDs as $value) {
          $ids = $value->user_id;

          $likesnames = $obj->FlyQuery("SELECT id, first_name, last_name from dostums_user WHERE id = '$ids'");
          if(!empty($likesnames)){
            foreach ($likesnames as $value) {
              $userid = $value->id;
                echo $likersName = "<a href='profiles.php?user_id=$userid'>".$value->first_name . ' ' . $value->last_name. '</a> ';
            }
          }

       }

       if($totalLikes >= 2){
          // echo "<div class='dropdown'><span class='dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>See More</span><ul class='dropdown-menu' role='menu'>dsfsdfdsf</ul></div>";

          $likesIDs2 = $obj->FlyQuery("SELECT user_id from dostums_likes WHERE post_id = '$postID' ORDER BY id DESC LIMIT 19");
          @$lis = '';
          if(!empty($likesIDs2)){
            $likers = $totalLikes - 1;

            foreach ($likesIDs2 as $value) {
               $ides = $value->user_id .'<br/>';
               $likesnames2 = $obj->FlyQuery("SELECT id, first_name, last_name from dostums_user WHERE id = '$ides' ");
               if(!empty($likesnames2)){
                 foreach ($likesnames2 as $value) {
                   $userid = $value->id;
                    $full_name = $value->first_name . ' ' .  $value->last_name;
                    @$lis .= " <li><a href='profiles.php?user_id=".$userid." '>". $full_name ."</a></li><li style='margin:0px;' class='divider'></li> ";
                 }
               }
            }

            if($totalLikes >= 10){

              @$lis .=  "<li><a href='home_view.php?view=".$postID."'>See All</a></li>";

            }

          }

          $likers = $totalLikes - 1;
          echo "
          <span class='dropdown'>
              <a href='' class='dropdown-toggle' data-toggle='dropdown'>
                  & See Others</i>
                  <span class='caret'></span>
              </a>
              <ul class='dropdown-menu'>
                  ".
                     @$lis
                  ."

              </ul>
          </span>
          ";

       }


      //  echo "Likes the post";
     }
   ?>

</div>
