<!-- START list group item-->
    <div class="list-group-item" id="suggest<?php echo $latest_user->id; ?>">
        <div class="media">
            <div class="pull-left" id="suggestion_image_<?php echo $latest_user->id; ?>">
                <script type="text/javascript">
                    $(document).ready(function() {
                             load_suggest_photo = {'st':3,'usrid':<?php echo $latest_user->id; ?>};
                             $.post('lib/imageload.php', load_suggest_photo,  function(suggest_photo) {
                                if(suggest_photo!=0)
                                {
                                    var datacl=jQuery.parseJSON(suggest_photo);
                                    var thumb=datacl.thumb;
                                    
                                    var datahtml="<img class='media-object img-circle thumb48' alt='Loading ..' src='./profile/"+thumb+"'>";

                                    $('#suggestion_image_<?php echo $latest_user->id; ?>').html(datahtml);
                                }
                                else
                                {
                                    window.location.refresh();
                                }
                             });                                                 
                        
                    });
                </script>
            </div>
            <div class="media-body clearfix">
            <button onclick="frndrequest('<?php echo $latest_user->id; ?>','request_status_<?php echo $latest_user->id; ?>','1')" class="pull-right def_button" id="request_status_<?php echo $latest_user->id; ?>">
                <span class="btn btn-sm btn-info">
                    <i class="fa fa-user-plus"></i> Add 
                </span>
            </button>              
                <a class="media-heading text-primary" href="profiles.php?user_id=<?php echo $latest_user->id; ?>" style="text-transform:capitalize; font-weight:bold;">
                    <span class="circle circle-success circle-lg text-left"></span>
                    <?php echo $latest_user->name; ?>
                </a>

                <p class="mb-sm">
                    <small><?php echo $latest_user->date; ?></small>
                </p>
            </div>
        </div>
    </div>
    <!-- END list group item-->