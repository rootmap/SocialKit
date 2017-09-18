<style>
    .panel-search{ left:15px !important; width:95% !important; height:55px !important;}
    .list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
    .btn-default{border:1px solid #DDDDDD !important; }
</style>

<script>

    function likeunlike(user_id)
    {
        var page_id = '<?php echo $_GET['page_id']; ?>';
        load_data_like = {'st': 18, 'user_id': user_id, 'page_id': page_id};
        $.post('lib/status.php', load_data_like, function (data) {
            if (data == 2)
            {
                $('#like_unlike_' + user_id).fadeIn('slow');
                $('#like_unlike_' + user_id).html('<i class="fa fa-thumbs-o-down"></i> Request Send');
            }
            else if (data == 1)
            {
                $('#like_unlike_' + user_id).fadeIn('slow');
                $('#like_unlike_' + user_id).html('<i class="fa fa-thumbs-o-down"></i> Unlike');
            }
            else if (data == 0)
            {
                $('#like_unlike_' + user_id).fadeIn('slow');
                $('#like_unlike_' + user_id).html('<i class="fa fa-thumbs-o-up"></i> Like');
            }
            /*else
             {
             window.location.reload();	
             }*/
        });
    }

    function PageInvite(user_id)
    {
        var page_id = '<?php echo $_GET['page_id']; ?>';
        load_data_likepf = {'st': 25, 'user_id': user_id, 'page_id': page_id};
        $.post('lib/status.php', load_data_likepf, function (datas) {
            if (datas == 2)
            {
                $('#listplui_' + user_id).hide('slow');
            }
        });
    }

</script>

<div class="panel panel-default">

    <?php
    $stringQuery = "SELECT 
    a.user_id,
    a.page_id,
    a.status,
    concat(du.first_name,' ',du.last_name) as name,
    IFNULL(dp.photo,'generic-man-profile.jpg') as photo,
    a.date
    FROM dostums_page_likes as a 
    LEFT JOIN dostums_user as du ON du.id=a.user_id
    LEFT JOIN dostums_profile_photo as dpp ON dpp.user_id=a.user_id AND dpp.status='2'
    LEFT JOIN dostums_photo as dp ON dp.id=dpp.photo_id
    WHERE a.page_id='" . $new_page_id . "' AND a.status='1'";
    $lstGroups = $obj->FlyQuery($stringQuery);
//echo "<pre>";
//print_r($lstGroups);
    ?>
    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-users"></i> Follower
            <a href="./all-page-followers-list.php?page_id=<?php echo $new_page_id; ?>" class="pull-right">
                <small> 
                    <?php
                    echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
                    ?>
                    people (View All)</small>
            </a>
        </div>

    </div>
    <!-- START list group-->
    <div id="all-page-follower-list" class="list-group latest-user-group  has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
        <?php
        if (is_array($lstGroups)) {
            if (count($lstGroups) > 0) {
                //$i =0;

                foreach ($lstGroups as $lVal) {
                    ?>
                    <!-- START list group item-->
                    <div class="list-group-item" >
                        <div class="media">
                            <a href="./profile.php?user_id=<?php echo $lVal->user_id; ?>" class="pull-left">
                                <img class="media-object img-circle thumb48" alt="Image"
                                     src="./profile/<?php echo $lVal->photo; ?>">
                            </a>
                            <div class="media-body clearfix">

            <!--                    <small class="pull-right ">
                                <?php //if($lVal->status==1){ ?>
                <span id="like_unlike_<?php //echo $lVal->user_id;  ?>" onClick="likeunlike(<?php //echo $lVal->user_id;  ?>)" class="btn btn-sm btn-danger">
                <i class="fa fa-thumbs-o-up"></i> Unlike</span>
                                <?php //}elseif($lVal->status==2){ ?>
                <span id="like_unlike" onClick="likeunlike(<?php //echo $lVal->user_id;  ?>)" class="btn btn-sm btn-danger">
                <i class="fa fa-thumbs-o-up"></i> Requested</span>
                                <?php //}elseif($lVal->status==0){ ?>
                <span id="like_unlike" onClick="likeunlike(<?php //echo $lVal->user_id;  ?>)" class="btn btn-sm btn-danger">
                <i class="fa fa-thumbs-o-up"></i> Like</span>
                                <?php //} ?>
                </small>-->
                                <a href="./profile.php?user_id=<?php echo $lVal->user_id; ?>" class="media-heading text-primary">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                    <?php echo $lVal->name; ?>
                                </a>

                                <p class="mb-sm">
                                    <small><?php echo $lVal->date; ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END list group item-->
                    <?php
                }
            }
        }
        ?>
    </div>
    <div id="all-page-list-search-result" class="list-group latest-user-group  has-friend-list mCustomScrollbar"  data-mcs-theme="dark"></div>
    <!-- END list group-->
    <!-- START panel footer-->
    <div class="panel-footer clearfix">
        <div class="input-group">
            <input id="page-follwer-search" type="text" class="form-control input-sm" placeholder="Search user ..">
            <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i>
                </button>
            </span>

            <script>
                $('document').ready(function () {
                    $('#all-page-list-search-result').hide()
                    $('#page-follwer-search').keyup(function () {
                        //$('#all-page-follower-list').hide();
                        var page_id = '<?php echo $_GET['page_id']; ?>';
                        var countvaluespgf = $(this).val().length;
                        if (countvaluespgf >= 4)
                        {
                            $.post("./lib/search_pages.php", {'st': 2, 'search_pgf_data': $(this).val(), 'page_id': page_id}, function (fetch) {
                                var datacls = jQuery.parseJSON(fetch);
                                var opt34 = datacls.data;
                                $('#all-page-follower-list').hide();
                                $('#all-page-list-search-result').show();
                                $('#all-page-list-search-result').html(opt34);
                            });

                        }
                        else if (countvaluespgf == 0)
                        {
                            $('#all-page-list-search-result').hide();
                            $('#all-page-follower-list').show();
                        }
                        else
                        {

                        }
                    });

                });


            </script>
        </div>
    </div>
    <!-- END panel-footer-->
    
</div>