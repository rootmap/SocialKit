<form class="facebook-share-box" enctype="multipart/form-data" role="form" method="post" action="#">
                            <div class="share">
                                <div class="arrow" style="left: 0px;"></div>
                                <div class="panel panel-default panel-customs-post  panel-status">
                                    <div class="panel-heading">

                                        <ul class="post-types list-unstyled list-inline">
                                            <li class="post-type active">
                                                <button style="color:#333; font-size:14px;" class="status def_button" type="button"><i class="fa fa-file"></i> Update Status</button>
                                            </li>
                                            <li class="post-type">
                                                <button style="color:#333; font-size:14px;" class="photos def_button"  type="button" id="uploadPageImage"><i class="fa fa-camera"></i> Add photos</button>
                                            </li>
                                            <li class="post-type">
                                                <button style="color:#333; font-size:14px;" class="link def_button"  type="button"><i class="fa fa-link"></i> Share Dostums Link</button>
                                            </li>
                                        </ul>
                                        <div class="fileUpload" style="float:left;">
                                            <span id="uploadFile"></span>
                                                <input type="file" id="uploadPageStatusImage" class="upload" />
                                        </div>	
                                        <script type="text/javascript">

                                            $(window).load(function() {
                                                    var options =
                                                    {
                                                            imgSrc: ''
                                                    }

                                                    $('.change-cover-photo').on('click',function(evt){
                                                             evt.preventDefault();
                                                             $('#file_cover').trigger('click');
                                                     });

                                                     $('.change-profile-photo').on('click',function(evt){
                                                             evt.preventDefault();
                                                             $('#file').trigger('click');
                                                     });
                                                     
                                                    var cropper = $('#profile_photo').cropbox(options);
                                                    
                                                    //status
                                                    $('#uploadPageStatusImage').on('change', function(){
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                     options.imgSrc = e.target.result;
                                                                     var img = e.target.result;
                                                                     //<img class="img-responsive" src="./profile/5617bfc9217bf.gif" />														 
                                                                     var d = new Date();
                                                                     var n = d.getTime(); 

                                                                     $('#imagestatusboxshow').show();
                                                                     $('#imagestatusboxshow').html("<img id='img"+n+"' class='img-responsive' src='"+e.target.result+"' />");
                                                                     $('#page_post_button').html("<input onclick='UploadPageImageString("+n+")' type='button' id='btnPageImagePostStatus' class='btn btn-post btn-info pull-right no-margin' value='Post' name='submit'>");

                                                                     //
                                                                     /*post_data = {'img':img,'st':2};
                                                                     $.post('lib/image.php', post_data,  function(datas) {
                                                                            alert("Done.");
                                                                     });*/

                                                            }
                                                            reader.readAsDataURL(this.files[0]);
                                                            this.files = [];
                                                    });

                                                    //status end
                                                    <?php if (in_array($obj->filename(), array("page.php"))) { ?>
                                                    $('#file_cover').on('change', function(){
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                     options.imgSrc = e.target.result;
                                                                     var img = e.target.result;
                                                                     $('#cover-photo').css('background',"url("+ e.target.result +")");
                                                                     post_data = {'img':img,'st':8,'page_id':<?php echo $new_page_id; ?>};
                                                                     $.post('lib/image.php', post_data,  function(datas) {
                                                                            alert("Done.");
                                                                     });

                                                            }
                                                            reader.readAsDataURL(this.files[0]);
                                                            this.files = [];
                                                    });
                                                    
                                                    $('#file').on('change', function(){
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                    options.imgSrc = e.target.result;
                                                                    //alert(e.target.result);
                                                                    $('#profile_photo').attr("src",e.target.result);
                                                                    //cropper = $('#profile_photo').cropbox(options);

                                                                     var img = e.target.result;
                                                                            post_data = {'img':img,'st':7,'page_id':<?php echo $new_page_id; ?>};
                                                                             $.post('lib/image.php', post_data,  function(datas) {
                                                                                     //window.location.assign("profile.php");
                                                                                    //$('.cropped').append('<img src="'+img+'">');
                                                                                    alert("Done.");
                                                                             });

                                                            }
                                                            reader.readAsDataURL(this.files[0]);
                                                            this.files = [];
                                                    });
                                                    <?php 
                                                    }
                                                    ?>
                                            });
                                    </script>
                                    </div>
                                    <div class="panel-body">
                                        <div class="status-contnent">
                                            <textarea placeholder="What's on your mind ?"
                                                      style="height: 62px; overflow: hidden;"
                                                      class="form-control message" id="page_status_message" rows="10"
                                                      cols="40" name="message"></textarea>
                                            <input id="page-id-postbox" type="hidden" value="<?php echo $new_page_id ?>"
                                        </div>
                                        <div style='margin-top:5px; display:none;' id="imagestatusboxshow" class="clearfix"></div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group icon-group">
                                                    <button class="btn btn-default btn-icon" data-toggle="tooltip"
                                                            data-placement="top" id="add_location" title="Add a Location" type="button"><i
                                                            class="fa fa-map-marker"></i></button>
                                                    <!--<button class="btn btn-default btn-icon " data-toggle="tooltip"
                                                            data-placement="top" title="Add a Photos" type="button"><i
                                                            class="fa-camera fa"></i></button>-->
                                                    <button class="btn btn-default btn-icon " data-toggle="tooltip"
                                                            data-placement="top" title="Tag Friends" type="button"><i
                                                            class="fa-user fa"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">

                                                    <div class="form-group col-sm-6">
                                                        <select id="statusPermission" 
                                                        class="form-control select privacy-dropdown"
                                                                placeholder="Shared Public">
                                                            <option value="1">Public</option>
                                                            <option value="2">Friends</option>
                                                            <option value="3">Only me</option>

                                                        </select>

                                                    </div>

                                                    <div class=" col-sm-6" id="page_post_button">
                                                        <input type="button" id="btnPagePostStatus" class="btn btn-post btn-success pull-right no-margin" value="Post" name="submit">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>