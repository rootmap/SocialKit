<div class="share-panel">


    <button type="button" id="<?php echo $postID; ?>" class="sp-like def_button">
        <i class="fa fa-thumbs-up"></i> <span id="postlike<?php echo $postID; ?>">
          <?php
            $likes = '';
            $likesArray = $obj->FlyQuery("SELECT count(id) AS cou FROM dostums_likes WHERE post_id = '$postID'");
            if(!empty($likesArray)){
               foreach ($likesArray as $likeValue) {
                   $likes .= $likeValue->cou;
               }
            }
            if ($likes != 0) {
                echo $likes;
          ?>
                likes
          <?php
            } else {
          ?> Like
          <?php
                   }
          ?></span>
    </button>

    <a title="#" href="javascript:void(0);" class="sp-comments"><i class="fa fa-comments"></i> <span id="postcomment<?php echo $postID; ?>">
            <?php
            $comments = '';
            $commentsArray = $obj->FlyQuery("SELECT count(id) AS cou FROM dostums_comment WHERE post_id = '$postID'");
            if(!empty($commentsArray)){
               foreach ($commentsArray as $commentValue) {
                   $comments .= $commentValue->cou;
               }
            }

            $comment_status = false;
            if ($comments != 0) {
                echo $comments;
                $comment_status = true;
                ?>
            <?php } else { ?>  <?php
                $comment_status = false;
            }
            ?> </span> Comment</a>

    <?php
    // if ($share_count == 0) {
    //     $sharecount="";
    // } else {
    //     $sharecount=$share_count;
    // }

    $share

    ?>


    <!-- <button type="button" id="<?php //echo $postID; ?>" class="sp-share def_button">
      <i class="fa fa-share"></i> <?php //echo $sharecount; ?> share
    </button> -->

    <button onclick="share_button(<?php echo $postID;?>)" type="button" id="share_<?php echo $postID; ?>" class="def_button">
      <i class="fa fa-share"></i>
                                 <?php  $postID;
                                         $countshare = $obj->FlyQuery("SELECT
                                                                       COUNT(dp.share_id) as countshare
                                                                       FROM dostums_post AS dp
                                                                       WHERE dp.share_id = '".$postID."' AND dp.status = '2'");
                                          if(!empty($countshare)){
                                            foreach ($countshare as  $cvalue) {
                                              if($cvalue->countshare != '0'){
                                                echo $cvalue->countshare;
                                              }else{
                                                echo '';
                                              }
                                            }
                                          }
                                  ?> share
    </button>

  <span id="postpermission_<?php echo $postID; ?>"></span>

<button id="shareButton_<?php echo $postID?>" style="display:none;"  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myShareModal">share_button</button>

  <!-- Modal -->
  <div id="myShareModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- [Modal content start]-->
      <div class="modal-content" style="margin-top: 110px;">
        <!-- [Modal header start] -->
        <div class="modal-header" style="border-bottom: 1px solid #ededed;padding-top: 12px;padding-left: 20px;padding-right: 20px; padding-bottom: 5px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title"><i class="fa fa-share-square-o"></i> Share Post</h5>
        </div>
        <!-- [Modal header end] -->

        <!-- [Modal body start] -->
        <div class="modal-body" style="padding: 12px 20px 12px 20px;">

         <div class="col-md-12" style="padding:0px;">
          <select class="selectpicker show-tick show-menu-arrow" onchange="shareOption(this);">
            <option value="1">Share on your Timeline</option>
            <option value="2">Share on a friend's Timeline</option>
            <!-- <option value="3">Share in a group</option>
            <option value="4">Share in a page</option> -->
          </select>
        </div>

          <div class="col-md-12" id="name" style="padding:0px;">
            <div class="col-md-12" style="padding:0px;">
                        <div id="custom-search-input" class="row">
                                 <form class="search" method="get" style="width:100%!important;" >
                                     <!-- <input id="searchMe" type="text" name="q" placeholder="Search Dostums Friends..." /> -->

                                     <p id="feildname" style="margin-left: 15px;"></p>
                                     <input  id="keyFriendName" onkeyup="keyFriendNames();" onblur="myBlurFunction();"  placeholder="Friend's name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;" >
                                     <!-- <input id="keyGroupName" onkeyup="keyGroupNames();" onblur="myBlurFunction();" placeholder="Group name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;">
                                     <input id="keyPageName" onkeyup="keyPageNames();" onblur="myBlurFunction();" placeholder="Page name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;"> -->
                                     <span id="element_name">
                                     </span>

                                     <ul class="results" id="sharesuggestions" data-mcs-theme="dark" style="width:100%!important;margin-top:30px!important;border:none;">
                                        <li id="shareloading" style="padding:0px !important; display:none;">
                                          <!-- display:none; -->
                                            <a id="load-spin" href="#">
                                            	<div class="row">
                                                	<div class="col-sm-6 text-right" style="margin-top:5px;">
                                                    	Please Wait...
                                                    </div>
                                                	<div class="col-sm-6 text-left">
                                                    	<img class="" src="./images/spinner/rolling.gif" style=""/>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                   	</ul>
                                 </form>
                        </div>
            </div>

          </div>

          <div class="col-md-12" style="padding:0px;">
             <textarea style="background-color: snow;border-bottom: 1px solid #ccc;margin-top:20px;" class="form-control" id="sharetext" name="text" placeholder="Say something about this" rows="4"></textarea>
          </div>
          <!-- [Show content start] -->
            <div id="content_of_share" style="padding: 12px 0px 12px 0px;border: 1px solid #ccc;margin-top: 12px;border-radius: 2px;">
              <div class="row">
                <div class="col-md-12">

                  <span id="userimg">

                  </span>
                  <span id="userName">

                  </span>

                </div>

               <div  class="col-md-12" style="margin-top: 10px;padding: 0px 30px 0px 30px;">
                 <span id="contented">

                 </span>
               </div>

             </div>
            </div>
          <!-- [Show content end] -->

        </div>
        <!-- [Modal body end] -->

        <!-- [Modal footer start] -->
        <div class="modal-footer" style="padding: 0px 11px 9px 20px;">
          <div class="row">
            <div class="col-md-6">

             <span id="permi">
              <select id="statusPermissions"
              class="form-control select privacy-dropdown pull-right"
                      placeholder="Shared Public">
                  <option value="1" style="text-align:left!important;">Public</option>
                  <option value="2" style="text-align:left;">Friends</option>
                  <option value="3" style="text-align:left;">Only me</option>
              </select>
              </span>

            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-lg pull-right btn-post btn-success no-margin" onclick="sharepost(<?php echo $postID;?>);">Post</button>
              <button type="button" class="btn btn-lg pull-right btn-default btn-info no-margin" data-dismiss="modal">Cancel</button>
              <span id="postedid" style="display:none;"></span>
            </div>
          </div>
        </div>
        <!-- [Modal footer end] -->
      </div>
<!-- [Modal content end] -->
    </div>
  </div>
<!-- Modal -->

</div>
