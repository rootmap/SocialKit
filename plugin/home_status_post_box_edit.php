<form class="facebook-share-box" enctype="multipart/form-data" role="form" method="post" action="#">
    <div class="share">
        <div class="arrow" style="left: 0px;"></div>
        <div class="panel panel-default panel-customs-post  panel-status">
            <div class="panel-heading">
                <ul class="post-types list-unstyled list-inline">
                    <li class="post-type active">
                        <a href="#"><i class="fa fa-angle-double-right"></i> Update Your Post Detail</a>
                    </li>
                </ul>
            </div>


            <?php
            $editurl = $_GET['edit'];

            $datas = $obj->FlyQuery("SELECT * FROM dostums_post as dp WHERE dp.id = '$editurl' ");

            if(!empty($datas)){
              foreach ($datas as $dval) {
                 $user_id = $dval->user_id;
                 $group_id = $dval->group_id;
                 $from_user_id = $dval->from_user_id;
                 $to_user_id = $dval->to_user_id;
                 $post = $dval->post;
                 $post_status = $dval->post_status;
                 $post_permission	 = $dval->post_permission;
                 $post_time = $dval->post_time;
                 $share_id = $dval->share_id;
                 $date = $dval->date;
                 $status = $dval->status;
              }
            }

            $editqueary = $obj->FlyQuery("SELECT a.*,dp.photo FROM `dostums_post` as a
                                        LEFT JOIN dostums_photo as dp ON dp.id=a.photo_id
                                         WHERE a.id='" . $editurl . "'");
            ?>

            <div class="panel-body">
                <div class="status-contnent">
                    <input type="hidden" class="from-control" id="photo_id" value="<?php echo $editqueary[0]->photo_id; ?>" placeholder="photo">
                    <input type="hidden" class="from-control" id="page_id"  value="<?php echo $editqueary[0]->page_id; ?>" placeholder="page">
                    <input type="hidden" class="from-control" id="group_id" value="<?php echo $editqueary[0]->group_id; ?>" placeholder="group">
                    <input type="hidden" class="from-control" id="post_id"  value="<?php echo $_GET['edit']; ?>" placeholder="post">

                    <textarea placeholder="What's on your mind ?"
                              style="height: 62px; margin-top: -10px; overflow: hidden;"
                              class="form-control message" id="status_message" rows="10"
                              cols="40" name="message"><?php echo $editqueary[0]->post; ?></textarea>
                              <?php
                                 if (!empty($editqueary[0]->photo)) {
                              ?>
                                      <span id="clspic">

                                           <a id="close" href="javascript:void(0);"
                                             style="position: absolute; padding-left: 3px;
                                             padding-right: 3px; background:#000; borde-bottom-left-radious:5px;
                                             right: 15px; margin-top: 30px;">
                                             <i style="color:#fff;" class="fa  fa-times"></i>
                                           </a>

                                          <img class="img-responsive" style="margin-top:30px" width="100%" src="profile/<?php echo $editqueary[0]->photo; ?>">
                                      </span>
                                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $("a#close").click(function () {
                                                    var c = confirm("Do You Want To Delete Picture From This Post.");
                                                    if (c)
                                                    {
                                                        $.post("./lib/status.php",{'st':89,'post_id':'<?php echo $_GET['edit']; ?>','photo_id':'<?php echo $editqueary[0]->photo_id; ?>','photo':'<?php echo $editqueary[0]->photo; ?>'},function(data){
                                                            if(data==1)
                                                            {
                                                                $("#clspic").hide();
                                                                window.location.reload();

                                                            }
                                                        });
                                                          //  $("#uploadImage").show();
                                                    }
                                                });
                                            });
                                        </script>
                            <?php
                                   }  // END IF
                            ?>
                </div>
                <!-- [END status-contnent] -->

                <div style='margin-top:5px; display:none;' id="imagestatusboxshow" class="clearfix"></div>
                <div style='margin-top:5px; display:none;' id="imagestatusboxshow2" class="clearfix"></div>

            </div>
            <!-- [end panel body] -->


            <div class="panel-footer">


              <!-- [tag friends part start] -->
              <?php
                 if($post_status != '5'){
              ?>
                 <div class="row" style="display:none;"  id='content'>
              <?php
                } else{
              ?>
                  <div class="row" style=""  id='content'>
              <?php
                }
              ?>
                <div class="col-md-12" style="padding-bottom: 10px;">
                  <p>Who are you with?</p>
                    <?php
                      include('lib/tag_friends_list_for_edit.php');
                    ?>
                </div>
              </div>
              <!-- [tag friends part end] -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group icon-group">
                            <button class="btn btn-default btn-icon" data-toggle="tooltip"
                                    data-placement="top" id="add_location" title="Add a Location" type="button"><i
                                    class="fa fa-map-marker"></i>
                            </button>

                                    <?php
                                         $photoID = $editqueary[0]->photo_id;
                                         if($photoID == '0'){
                                    ?>
                                                          <!-- <button class="btn btn-default btn-icon " data-toggle="tooltip"
                                                                  data-placement="top" title="Add a Photos" type="button"><i
                                                                  class="fa-camera fa"></i>
                                                          </button> -->
                                                    <button class="btn btn-default btn-icon photos"
                                                            title="Add a Photos" type="button" id="uploadImage"><i
                                                            class="fa-camera fa"></i>
                                                    </button>
                                                            <!-- <button style="color:#333; font-size:14px;"
                                                                    class="photos def_button"  type="button" id="uploadImage">
                                                              <i class="fa fa-camera"></i>  Add Photo
                                                            </button> -->

                                    <?php
                                         }
                                    ?>
                                                    <!-- <button class="btn btn-default btn-icon photos"
                                                            title="Add a Photos" type="button" id="uploadImage" style="display:none;"><i
                                                            class="fa-camera fa"></i>
                                                    </button> -->
                                    <!-- [upload photo eng start] -->
                                          <div class="fileUpload" style="float:left;">
                                              <span id="uploadFile"></span>
                                              <input type="file" id="uploadStatusImage" class="upload" />
                                          </div>

                                          <script type="text/javascript">
                                              $(window).load(function() {
                                                  var options =
                                                  {
                                                      imgSrc: ''
                                                  }

                                                  <?php
                                                    if (in_array($obj->filename(), array("profile.php", "group.php"))) {
                                                  ?>
                                                        $('.change-cover-photo').on('click',function(evt){
                                                             evt.preventDefault();
                                                             $('#file_cover').trigger('click');
                                                         });

                                                         $('.change-profile-photo').on('click',function(evt){
                                                             evt.preventDefault();
                                                             $('#file').trigger('click');
                                                         });
                                                  <?php
                                                     }
                                                  ?>

                                                  var cropper = $('#profile_photo').cropbox(options);


                                                  $('#uploadStatusImage').on('change', function(){
                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                           options.imgSrc = e.target.result;
                                                           var img = e.target.result;
                                                           var d = new Date();
                                                           var n = d.getTime();

                                                           $('#imagestatusboxshow').show();
                                                           $('#imagestatusboxshow').html("<img id='img"+n+"' class='img-responsive' src='"+e.target.result+"' />");
                                                           $('#post_button').html("<input onclick='EditUploadImageString("+n+")' type='button' id='btnImagePostStatus' class='btn btn-post btn-info pull-right no-margin' value='Update' name='submit'>");
                                                      }
                                                      reader.readAsDataURL(this.files[0]);
                                                      this.files = [];
                                                  })

                                                  //status end
                                                  <?php if (in_array($obj->filename(), array("profile.php", "group.php"))) { ?>
                                                  $('#file_cover').on('change', function(){
                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                           options.imgSrc = e.target.result;
                                                           var img = e.target.result;
                                                           $('#cover-photo').css('background',"url("+ e.target.result +")");
                                                           post_data = {'img':img,'st':2};
                                                           $.post('lib/image.php', post_data,  function(datas) {
                                                              alert("Done.");
                                                           });

                                                      }
                                                      reader.readAsDataURL(this.files[0]);
                                                      this.files = [];
                                                  })
                                                  $('#file').on('change', function(){
                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                          options.imgSrc = e.target.result;
                                                          $('#profile_photo').attr("src",e.target.result);
                                                           var img = e.target.result;
                                                              post_data = {'img':img,'st':1};
                                                               $.post('lib/image.php', post_data,  function(datas) {
                                                                  alert("Done.");
                                                               });

                                                      }
                                                      reader.readAsDataURL(this.files[0]);
                                                      this.files = [];
                                                  })
                                                  <?php } ?>
                                              });
                                          </script>
                                    <!-- [upload photo eng end] -->



                            <!-- tag button start -->
                                <!-- <button class="btn btn-default btn-icon " data-toggle="tooltip"
                                        data-placement="top" title="Tag Friends" type="button"><i
                                        class="fa-user fa"></i>
                                </button> -->
                                <?php
                                  if($post_status != '5'){
                                ?>
                                <button id='hideshow' class="btn btn-default btn-icon " title="Tag Friends" type="button">
                                        <i class="fa-user fa"></i>
                                </button>
                                <?php
                                 }
                                ?>
                            <!-- tag button end -->
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <select id="statusPermission"
                                        class="form-control select privacy-dropdown"
                                        placeholder="Shared Public">
                                    <option <?php if ($post_permission == '1' ) echo 'selected' ; ?> value="1">Public</option>
                                    <option <?php if ($post_permission == '2' ) echo 'selected' ; ?> value="2">Friends</option>
                                    <option <?php if ($post_permission == '3' ) echo 'selected' ; ?> value="3">Only me</option>
                                </select>
                            </div>

                            <div class=" col-sm-6" id="post_button">
                                <input type="button" id="btnPostStatusedit_update"
                                       class="btn btn-post btn-success pull-right no-margin"
                                       value="Update" name="Update">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
