<div class="panel panel-default">


    <div class="panel-heading">
        <div class="panel-title"><i class="fa fa-users"></i> Friends
            <a class="pull-right" href="./all-friend-list.php">
                <small id="total_friend_profile"> 
                    <script>
                        jQuery(function () {
                            window.setInterval(function () {
                                load_frnd_notification = {'st': 3, 'usrid':<?php echo $new_user_id; ?>};
                                $.post('lib/shout.php', load_frnd_notification, function (data_notification) {
                                    var frndData = jQuery.parseJSON(data_notification);
                                    var friend_request = frndData.friend_request;
                                    $('#total_friend_profile').html(friend_request + " People");

                                });
                            }, 1000);
                        });

                    </script>
                    0 people</small>
            </a></div>

    </div>
    <!-- START list group-->
    <div class="list-group scrollbar latest-user-group has-friend-list mCustomScrollbar"  id="friendlist_profile" data-mcs-theme="dark">

        <script>
            jQuery(function () {
                load_total_frnd = {'st': 4, 'usrid':<?php echo $new_user_id; ?>};
                $.post('lib/shout.php', load_total_frnd, function (data_notification) {
                    $('#friendlist_profile').html(data_notification);
                });
            });

        </script>
    </div>
    
    <div id="srchrslt-frndlist" class="list-group scrollbar latest-user-group has-friend-list mCustomScrollbar"  data-mcs-theme="dark">
    
    </div>
    <!-- END list group-->
    <!-- START panel footer-->
    <div class="panel-footer clearfix">
        <div class="input-group">
            <input id="prof-frnd-search" type="text" class="form-control input-sm" placeholder="Search user ..">
            <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i>
                </button>
            </span>

            <script>
                $('document').ready(function () {
                    $('#srchrslt-frndlist').hide()
                    $('#prof-frnd-search').keyup(function () {
                        var countvaluespfl = $(this).val().length;
                        if (countvaluespfl >= 4)
                        {
                            $.post("./lib/search_friends.php", {'st': 4, 'search_pfr_data': $(this).val()}, function (fetch) {
                                var datacl = jQuery.parseJSON(fetch);
                                var opt3 = datacl.data;
                                $('#friendlist_profile').hide();
                                $('#srchrslt-frndlist').show();
                                $('#srchrslt-frndlist').html(opt3);
                            });

                        }
                        else if (countvaluespfl == 0)
                        {
                            $('#srchrslt-frndlist').hide();
                            $('#friendlist_profile').show();
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
        </div>
    </div>
    <!-- END panel-footer-->
</div>