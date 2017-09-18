<img id="modal_big_image"  style="height:500px;" src='#'>
<script>
    $(document).ready(function (e) {
        $('.close_mike_modal').click(function (e) {
            $('#myModal').hide();
            $('#the-lights').hide();
        });
    });
</script>
<div class="description">
    <div class="modal-description-inner">
        <div class='modla-text-area'>
            <div style="position: absolute; right: 5px; top: 5px; cursor: pointer;" class="close_mike_modal"><i class="fa fa-close"></i></div>
            <div class="user-heading">
                <img alt="user3" id="modal_user_image" src="images/user/user4.jpg" class="img-circle pull-left  ">

                <h3><a id="modal_user_link" href="#">Regina Dealova </a></h3>
                <h5><span id="modal_post_permission">Public</span> - <span id="modal_post_time">Jun 15, 2016</span></h5>
            </div>
            <div class="modal-info-area">
                <p id="modal_post_content"></p>	
            </div>

        </div>

        <div class="modal-comments-area">
            <div class="panel-bottom">
                <div class="panel-footer has-share-panel">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="share-panel">

                                <a class="sp-mike-like" name="s" href="#" title="#"><i class="fa fa-thumbs-up"></i> <span class="mike-like">26</span> <span id="mike-like-place">likes</span></a>
                                <a class="sp-mike-comments" href="#" title="#">
                                    <i class="fa fa-comments"></i>

                                </a>
                                <a class="sp-share" href="#" title="#"><i class="fa fa-share"></i> Share</a>
                                  

                            </div>

                        </div>

                    </div>

                </div>
                <div class="comments-box has-comments">

                    <div class="all-comments-count" id="modal_likecommentbox">
                        <span  class="mcc_modal"  id="modal_total_comment_like">View 9 more comments</span>
                        <span data-toggle="dropdown" type="button" class="dropdown-toggle">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </span>
                    </div>

                    <div class="comments-list-wrapper">
                        <ul class="commentList">

                            <li>
                                <div class="commenterImage">
                                    <img class="img-responsive" src="https://lh3.googleusercontent.com/-ll1jsqW_tKI/AAAAAAAAAAI/AAAAAAAAFzk/sxT1miO22bs/s46-c-k-no/photo.jpg">
                                </div>
                                <style type="text/css">

                                </style>
                                <div class="commentText">
                                    <p class=""><strong> <a href="user-profile.html"> Lamia Alonso </a>
                                        </strong> Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2015</span>

                                </div>
                            </li>


                        </ul>
                        <div class="input-placeholder">Add a comment...</div>
                        <input type="hidden" name="mikepostid" value="0">
                    </div>

                    <script>
                        $(document).ready(function () {
                            $('.input-placeholder').click(function () {
                                $(this).parent(".comments-box").parent(".panel-bottom").children(".write-comments").show('slow');
                                $(this).hide('slow');
                            });
                            
                            
                            $("button.btn.btn-default[type='reset']").click(function(){
                                 $(this).parent("div").parent("div").hide("slow");
                                 var getdiv=$(this).parent("div").parent("div").parent("div").children("div").find(".input-placeholder").show("slow");
                                 console.log(getdiv);
                            });
                            
                        });



                    </script>

                    <script type="text/javascript">
                        function mikecomment()
                        {
                            var post_id = $('input[name=mikepostid]').val();
                            var msg = $('#miketextarea_' + post_id).val();
                            if (msg == "")
                            {
                                $('#miketextarea_' + post_id).css("border", "1px #f00 solid");
                            }
                            else
                            {
                                $('#miketextarea_' + post_id).attr("style", "");
                                load_data_comment = {'st': 3, 'post_id': post_id, 'msg': msg};
                                load_new_comment = {'st': 1, 'post_id': post_id};
                                $.post('lib/status.php', load_data_comment, function (data) {
                                    if (data == 1)
                                    {
                                        loadallinbar(post_id);
                                        loadmikecomment(post_id);
                                        $('#miketextarea_' + post_id).val("");
                                        $('.input-placeholder').show('slow');
                                        $('div.write-comments').hide('slow');
                                    }
                                    else
                                    {
                                        window.location.refresh();
                                    }
                                });
                            }

                        }

                        function loadmikecomment(post_id)
                        {
                            load_new_comment = {'st': 1, 'post_id': post_id};
                            $.post('lib/comment.php', load_new_comment, function (comment) {
                                if (comment)
                                {
                                    $('#modal_comment_list_instant_load_' + post_id).fadeIn('slow');
                                    $('#modal_comment_list_instant_load_' + post_id).html(comment);
                                }
                                else
                                {
                                    window.location.refresh();
                                }
                            });
                        }

                        function loadallinbar(post_id)
                        {
                            load_count_comment = {'st': 3, 'post_id': post_id};
                            $.post('lib/comment.php', load_count_comment, function (commentc) {

                                var globaldataconds = false;
                                var datacl = jQuery.parseJSON(commentc);
                                var like = datacl.likes;
                                var commentd = datacl.comment;
                                var globalcomlik = (like - 0) + (commentd - 0);
                                if (globalcomlik != 0)
                                {
                                    globaldataconds = true;
                                }

                                if (globaldataconds)
                                {

                                    if (globalcomlik != 0)
                                    {


                                        $('#modal_loadallcomment' + post_id).css('display', 'inline-block');
                                        $('#modal_mcc' + post_id).fadeIn('slow');
                                        if (like == 0)
                                        {
                                            $('#modal_mcc' + post_id).html(commentd + " comments");
                                        }
                                        else if (commentd == 0)
                                        {
                                            $('#modal_mcc' + post_id).html(like + " likes");
                                        }
                                        else if (like != 0 && commentd != 0)
                                        {
                                            $('#modal_mcc' + post_id).html(like + " likes and " + commentd + " comments");

                                        }
                                        else
                                        {
                                            $('#modal_loadallcomment' + post_id).css('display', 'none');
                                            $('#modal_mcc' + post_id).fadeIn('slow');
                                        }

                                        if (commentd != 0)
                                        {
                                            $('.commentList' + post_id).html(commentd);
                                        }
                                        else
                                        {
                                            $('#modal_postcomment' + post_id).html(" ");
                                        }


                                    }
                                    else
                                    {
                                        $('#modal_loadallcomment' + post_id).fadeOut('slow');
                                        $('#modal_loadallcomment' + post_id).css('display', 'none');
                                    }

                                }
                                else
                                {
                                    //location.reload();
                                    $('#modal_loadallcomment' + post_id).fadeOut('slow');
                                    $('#modal_loadallcomment' + post_id).css('display', 'none');
                                }



                            });
                        }
                    </script>



                    <div class="write-comments" style="display: none;">
                        <div class="panel-customs-post-textarea">
                            <textarea class="form-control" name="make-textarea" style="margin-bottom: 3px; border-bottom: 1px #CCC solid; " placeholder="Add a comment"></textarea>
                            <button type="button" onclick="mikecomment()" class="btn btn-success btn-shm ">Post comment</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>