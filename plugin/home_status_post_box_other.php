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
                                                <button style="color:#333; font-size:14px;" class="photos def_button"  type="button" id="uploadImage"><i class="fa fa-camera"></i> Add photos</button>
                                            </li>
                                            <li class="post-type">
                                                <button style="color:#333; font-size:14px;" class="link def_button"  type="button"><i class="fa fa-link"></i> Share Dostums Link</button>
                                            </li>
                                        </ul>
                                        <div class="fileUpload" style="float:left;">
                                            <span id="uploadFile"></span>
                                            <input type="file" id="uploadStatusImage" class="upload" />
                                        </div>	
                                        <script type="text/javascript">

											$(window).load(function() {
												var options =
												{
													imgSrc: 'images/user/profile-photo.jpg'
												}
												
												var cropper = $('#profile_photo').cropbox(options);
												//status
												$('#uploadStatusImage').on('change', function(){
													var reader = new FileReader();
													reader.onload = function(e) {
														 options.imgSrc = e.target.result;
														 var img = e.target.result;
														 //<img class="img-responsive" src="./profile/5617bfc9217bf.gif" />														 
														 var d = new Date();
														 var n = d.getTime(); 
														 
														 $('#imagestatusboxshow').show();
														 $('#imagestatusboxshow').html("<img id='img"+n+"' class='img-responsive' src='"+e.target.result+"' />");
														 $('#post_button').html("<input onclick='UploadImageStringOther("+n+",<?php echo $new_user_id; ?>)' type='button' id='btnImagePostStatus' class='btn btn-post btn-info pull-right no-margin' value='Post' name='submit'>");
														
													}
													reader.readAsDataURL(this.files[0]);
													this.files = [];
												})
												
												//status end
											});
										</script>
                                    </div>
                                    <div class="panel-body">
                                        <div class="status-contnent">
                                            <textarea placeholder="What's on your mind ?"
                                                      style="height: 62px; overflow: hidden;"
                                                      class="form-control message" id="status_message" rows="10"
                                                      cols="40" name="message"></textarea>
                                        </div>
                                        <div style='margin-top:5px; display:none;' id="imagestatusboxshow" class="clearfix"></div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6 pull-right" id="post_button">
                                                        <input type="button" id="btnPostStatus_other" class="btn btn-post btn-success pull-right no-margin" value="Post" name="<?php echo $new_user_id; ?>">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>