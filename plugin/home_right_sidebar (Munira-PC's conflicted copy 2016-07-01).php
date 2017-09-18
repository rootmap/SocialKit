<div class="col-sm-3 col-xs-12 rightCol no-padding">
    <aside>
        <div class="panel hide panel-default panel-right">
            <div class="panel-heading text-center">
                <div class="panel-title "><i class="fa fa-bullhorn"></i> NOTICE BOARD</div>

            </div>

            <div class="panel-body no-padding">

                <div id="carousel-example-generic" class="carousel slide carousel-notice"
                     data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner " role="listbox">
                        <div class="item active">
                            <a href="notice-details.html"><img src="images/notice/1.jpg" alt="..."></a>

                            <div class="carousel-caption">
                                <h4> শেখ মুজিবুর রহমান </h4>

                                <div class="sub-notice">
                                    <small>1st President of Bangladesh<br>
                                        11 April 1971 – 12 January 1972
                                    </small>
                                    <div style="clear:both;"></div>
                                    <a target="_blank" href="notice-details.html" class="btn btn-danger btn-sm">View details </a>
                                </div>
                            </div>
                        </div>

                        <div class="item ">
                            <a href="notice-details.html"> <img src="images/notice/2.jpg" alt="..."> </a>

                            <div class="carousel-caption">
                                <h4> Mahatma Gandhi </h4>

                                <div class="sub-notice">
                                    <small><b>Born</b> 2 October 1869<br>
                                        <b>Died</b> 30 January 1948
                                    </small>
                                    <div style="clear:both;"></div>
                                    <a class="btn btn-danger btn-sm">View details </a>
                                </div>
                            </div>
                        </div>

                        <div class="item ">
                            <a href="notice-details.html"> <img src="images/notice/1.jpg" alt="..."> </a>

                            <div class="carousel-caption">
                                <h4> Mahatma Gandhi </h4>

                                <div class="sub-notice">
                                    <small><b>Born</b> 2 October 1869<br>
                                        <b>Died</b> 30 January 1948
                                    </small>
                                    <div style="clear:both;"></div>
                                    <a class="btn btn-danger btn-sm">View details </a>
                                </div>
                            </div>
                        </div>



                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


            </div>


        </div>

        <div class="panel panel-default   panel-news">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-list-alt"></span> Recent News </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 no-padding">


                        <ul class="news-slider hasNews list-unstyled">
                            <?php
                            $sqlnotice = $obj->SelectAllByIDOrderLimit("dostums_notice_view", array("status" => 1), "DESC", "10");
                            $s = 1;
                            if (!empty($sqlnotice))
                                foreach ($sqlnotice as $notice):
                                    if ($s == 4) {
                                        ?>
                                        <li class="news-item">
                                            <div class="news-item-inner">
                                                <a class="has-image-full" title="#" href="#">

                                                    <div class="image ">
                                                        <img class="img-responsive"  src="<?php echo $obj->baseurl("upload/" . $notice->notice_image); ?>">
                                                    </div>

                                                    <span class="info">সেপ্টেম্বর ১০, ২০১৫</span>

                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                    } elseif ($s == 4) {
                                        ?>
                                        <li class="news-item ">
                                            <div class="news-item-inner">
                                                <a title="#" href="#" class="has-only-text">
                                                    <i class="mdi-navigation-chevron-right arrow"></i>

                                                    <?php echo $notice->notice_title; ?>

                                                    <span class="info"><?php echo $notice->notice_date; ?></span>

                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="news-item">
                                            <div class="news-item-inner">
                                                <a title="#" href="#">
                                                    <i class="mdi-navigation-chevron-right arrow"></i>

                                                    <div class="image">
                                                        <img width="81" height="66" alt="#" src="<?php echo $obj->baseurl("upload/" . $notice->notice_image); ?>">
                                                    </div>
                                                    <?php echo $notice->notice_title; ?>
                                                    <span class="info"><?php echo $notice->notice_date; ?></span>
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    $s++;
                                endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer">

            </div>
        </div>

        <!--Here starts Donation widget-->
        <div class="panel panel-default  panel-customs-post">
            <div class="panel-body text-center no-padding">
                <label style="font-size:15px;">DONATE NOW</label>

                <div class="col-sm-12">
                    <div class="form-group">

                        <select id="why_donation" class="form-control" style="background-color:#ccffff;">
                            <option value="0">Donate Type</option>
                            <option value="1">Group</option>
                            <option value="2">Club</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">   
                    <div class="input-group">
                        <select id="select_money_symbol" class="form-control" style="background-color:#ccffff; ">
                            <option value="1">USD</option>
                            <option value="2">GBP</option>
                            <option value="3">Taka</option>
                            <option value="4">Dinner</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">

                        <input type="text"  class="form-control"  id="Inputmoney_amnt" placeholder="USD">

                    </div>
                </div>

                <div class="col-sm-12" style="text-align: center;">

                    <button type="button" id="OpM" class="btn btn-primary">Donate Today</button>

                    <?php include('plugin/donation_info_form.php'); ?>

                </div>                                                                   
            </div>
        </div>
        <!--Here starts Donation widget-->

        <div class="panel panel-default panel-live-feed">
            <div class="panel-heading">

                <div class="panel-title"><i class="fa fa-life-saver"></i> Live Feed</div>
            </div>


            <div class="panel-body no-padding-tb">
                <div class="row">
                    <div class="col-xs-12 no-padding">


                        <ul class="livefeed-slider hasNews list-unstyled list-group latest-user-group  has-friend-list">
                            <?php
                            $sqllivefeed = $obj->SelectAllByIDOrderLimit("dostums_post_view", array("status" => 1), "DESC", "10");
                            $s = 1;
                            if (!empty($sqllivefeed))
                                foreach ($sqllivefeed as $livefeed):
                                    ?>
                                    <li class="news-item list-group-item">
                                        <!-- START list group item-->
                                        <div>
                                            <div class="media">
                                                <div class="pull-left">

                                                    <?php
                                                    $photo_id = $obj->SelectAllByVal2("dostums_profile_photo", "user_id", $livefeed->user_id, "status", 2, "photo_id");
                                                    $photo = $obj->SelectAllByVal("dostums_photo", "id", $photo_id, "photo");

                                                    if ($photo == "") {
                                                        $new_photo = "generic-man-profile.jpg";
                                                    } else {
                                                        $new_photo = $photo;
                                                    }
                                                    ?>     
                                                    <img src="./profile/<?php echo $new_photo; ?>" alt="Image" class="media-object img-circle thumb48">
                                                </div>
                                                <div class="media-body ">
                                                    <!--<small class="pull-right "><span > 2h ago </span></small>-->
                                                    <a style="font-weight:bold;" href="profile.php?user_id=<?php echo $livefeed->user_id; ?>"><?php echo $obj->SelectAllByVal("dostums_user_view", "id", $livefeed->user_id, "name"); ?></a> <?php echo $obj->limit_words($livefeed->post, 5); ?>. <br>
                                                    <small class="text-muted"><?php echo $extra->duration($livefeed->post_time);?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END list group item-->
                                    </li>
                                    <?php
                                endforeach;
                            ?>                 
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel panel-default panel-latest-user">
            <div class="panel-heading">

                <div class="panel-title">Latest User</div>
            </div>
            <!-- START list group-->
            <div class="list-group latest-user-group" id="default-feed">
                <?php
                $sqlquery_latest_user = $obj->FlyQuery("SELECT dostums_user_view.id,dostums_user_view.name,dostums_user_view.date FROM dostums_user_view WHERE NOT EXISTS (select null from dostums_friend_view where dostums_friend_view.uid=" . $new_user_id . " AND dostums_friend_view.to_uid=dostums_user_view.id) AND dostums_user_view.id!=" . $new_user_id . " ORDER BY rand()  LIMIT 0,3");
                if (!empty($sqlquery_latest_user))
                    foreach ($sqlquery_latest_user as $latest_user):
                        include('suggestion_frnd.php');
                    endforeach;
                ?>

            </div>
            <!-- END list group-->
            <!-- START list group-->
            <div class="list-group latest-user-group" id="search-result-feed">

            </div>
            <!-- END list group-->
            <!-- START panel footer-->
            <div class="panel-footer clearfix">
                <div class="input-group">
                    <input id="searchltu" type="text" class="form-control input-sm" placeholder="Search user ..">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
            <!-- END panel-footer-->
        </div>


        <div class="panel panel-default  panel-customs-post">
            <div class="panel-body text-center no-padding">
                <img src="images/ads/1.gif" alt="s" class="img-responsive">
            </div>
        </div>


        <div class="panel panel-default  panel-customs-post">
            <div class="panel-body text-center">
                <p><br> <br> <br> ads <br> <br><br></p>
            </div>
        </div>


    </aside>
</div>

<script>
    $('document').ready(function (e) {
        $('#searchltu').keyup(function (e) {
            var countvalues = $(this).val().length;
            if (countvalues >= 4)
            {
                $.post("./lib/search_suggestion_friends.php", {'st': 2, 'search_fr_data': $(this).val()}, function (fetch) {
                    var datacl = jQuery.parseJSON(fetch);
                    var opt2 = datacl.data;
                    $('#default-feed').hide();
                    $('#search-result-feed').show();
                    $('#search-result-feed').html(opt2);
                });

            }
            else if (countvalues == 0)
            {
                $('#search-result-feed').hide();
                $('#default-feed').show();
            }
            else
            {

            }
        });

        /*$('.friends').click(function(e){
         var getlink=$(this).find('a').attr('href');
         alert('success');	
         });*/

    });


</script>