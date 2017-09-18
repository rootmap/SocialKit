<div class="col-sm-3 col-xs-12 rightCol no-padding">
    <aside>

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
                                                    <small class="text-muted"><?php echo $extra->duration($livefeed->post_time); ?></small>
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



        <?php
      //  include 'adds.php';
        ?>





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
