<form class="facebook-share-box" enctype="multipart/form-data" role="form" method="post" action="#">

    <div class="share">
        <div class="arrow" style="left: 0px;"></div>
        <div class="panel panel-default panel-customs-post  panel-status">
            <div class="panel-heading">

               <!-- [button list] -->
                <ul class="post-types list-unstyled list-inline">
                    <li class="post-type active">
                        <button style="color:#333; font-size:14px;" class="status def_button" type="button"><i class="fa fa-file"></i> Update Status</button>
                    </li>


                    <li class="post-type">
                        <button style="color:#333; font-size:14px;" class="photos def_button"  type="button" id="uploadImage">
                          <i class="fa fa-camera"></i>  Add Photo
                        </button>
                    </li>


                </ul>
                <!-- [button list] -->


                <!-- [upload photo eng start] -->
                <div class="fileUpload" style="float:left;">
                    <span id="uploadFile"></span>
                    <input type="file" id="uploadStatusImage" class="upload" >
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
                                 $('#imagestatusboxshow').html("<img id='img"+n+"' class='img-responsive' src='"+img+"' />");
                                 $('#post_button').html("<input onclick='UploadImageString("+n+")' type='button' id='btnImagePostStatus' class='btn btn-post btn-info pull-right no-margin' value='Post' name='submit'>");
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

            </div>

            <!-- [message panel start]  -->
            <div class="panel-body">
                <div class="status-contnent">
                    <textarea placeholder="What's on your mind ?"
                              style="height: 62px; overflow: hidden;"
                              class="form-control message" id="status_message" rows="10"
                              cols="40" name="message"></textarea>
                </div>
                <div style='margin-top:5px; display:none;' id="imagestatusboxshow" class="clearfix"></div>
            </div>
            <!-- [message panel end]  -->

            <div class="panel-footer">


                <!-- [tag friends part start] -->
                <div class="row" style="display:none;"  id='content'>
                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <p>Who are you with?</p>
                      <?php
                        include('lib/tag_friends_list.php');
                      ?>
                  </div>
                </div>
                <!-- [tag friends part end] -->


                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group icon-group">
                            <button class="btn btn-default btn-icon" data-toggle="tooltip"
                                    data-placement="top" id="add_location" title="Add a Location" type="button"><i
                                    class="fa fa-map-marker"></i></button>
                            <button id='hideshow' class="btn btn-default btn-icon " title="Tag Friends" type="button">
                                    <i class="fa-user fa"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">

                          <?php
                            if (!in_array($obj->filename(), array("page.php", "group.php"))) {
                          ?>
                            <div class="form-group col-sm-6">
                                <select id="statusPermission"
                                class="form-control select privacy-dropdown"
                                        placeholder="Shared Public">
                                    <option value="1">Public</option>
                                    <option value="2">Friends</option>
                                    <option value="3">Only me</option>
                                </select>
                            </div>
                            <div class="col-sm-6" id="post_button">
                            <?php
                              } else{
                            ?>
                            <div class="col-sm-12" id="post_button">
                            <?php
                              }
                             ?>
                                <input type="button" id="btnPostStatus" class="btn btn-post btn-success pull-right no-margin" value="Post" name="submit">
                            </div>

                            <!-- [input field for get page name, pageID, groupID start] -->
                            <input id="pageName" type="text" value="<?php echo $obj->filename();?>" style="display:none;">
                            <?php
                              if(!empty($new_page_id)){
                            ?>
                            <input id="pageIdNumber" type="text" value="<?php echo $new_page_id;?>" style="display:none;">
                            <?php
                              } else if(!empty($new_group_id)){
                            ?>
                            <input id="groupIdNumber" type="text" value="<?php echo $new_group_id;?>" style="display:none;">
                            <?php
                              }
                            ?>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</form>
