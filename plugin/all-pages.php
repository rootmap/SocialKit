<style>
    .panel-search{ left:15px !important; width:95% !important; height:55px !important;}
    .list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
    .btn-default{border:1px solid #DDDDDD !important; }
</style>
<script type="text/javascript">
    function PageLikeFromProfile(page_id,trid)
            {
                    var user_id='<?php echo $new_user_id; ?>';
                    load_data_like = {'st': 20,'user_id':user_id, 'page_id': page_id};
                    $.post('lib/status.php', load_data_like, function (data) {
                            if (data == 2)
                            {
                  $('#listpld_'+trid).hide('slow');
                            }
                            else if (data == 1)
                            {
                   $('#listpld_'+trid).hide('slow');
                            }
                            else if (data == 0)
                            {
                   $('#listpld_'+trid).hide('slow');
                }
                            /*else
                             {
                             window.location.reload();	
                             }*/
                    });
            }
</script>
<div class="panel ">
    <div class="panel-heading">
        <?php
        //QUERY FOR PAGES YOU MANAGE LIST
        $stringQuery2 = "SELECT 
				df.user_id,
				df.page_id,
				df.name,
				dpp.photo_id,
				dpp.status,
				IFNULL(dp.photo,'page_default.png') AS `photo`
				FROM dostums_fanpage as df
				left JOIN dostums_page_profile_photo as dpp 
				on df.page_id = dpp.page_id AND dpp.status='2'
				LEFT JOIN dostums_photo as dp on dpp.photo_id = dp.id 
				WHERE df.user_id ='".$input_by."' and (df.name != '' or df.name is null) GROUP BY df.page_id";
        $lstPages = $obj->FlyQuery($stringQuery2);
        //QUERY FOR INVITED PAGES LIST
        $stringQuery3 = "SELECT
				dpl.id,
				dpl.user_id,
				dpl.page_id,
				dpl.status AS dpglk_status,
				df.name,
				IFNULL(dp.photo,'page_default.png') AS photo
				FROM dostums_page_likes AS dpl
				LEFT JOIN dostums_fanpage AS df ON df.page_id=dpl.page_id
				left JOIN dostums_page_profile_photo as dppp on dppp.page_id=df.page_id AND dppp.status='2'
				LEFT JOIN dostums_photo as dp on dp.id=dppp.photo_id
				WHERE dpl.user_id ='" . $input_by . "' AND dpl.status='2' and (df.name != '' or df.name is not null)
				GROUP BY df.page_id";
        $InvtedPages = $obj->FlyQuery($stringQuery3);
        
        //QUERY FOR FOLLOWING PAGE LIST
        $stringQuery4 = "SELECT
				dpl.id,
				dpl.user_id,
				dpl.page_id,
				dpl.status AS dpglk_status,
				df.name,
				IFNULL(dp.photo,'page_default.png') AS photo
				FROM dostums_page_likes AS dpl
				LEFT JOIN dostums_fanpage AS df ON df.page_id=dpl.page_id AND dpl.user_id != df.user_id 
				left JOIN dostums_page_profile_photo as dppp on dppp.page_id=df.page_id AND dppp.status='2'
				LEFT JOIN dostums_photo as dp on dp.id=dppp.photo_id
				WHERE dpl.user_id ='" . $input_by . "' AND dpl.status='1' and (df.name != '' or df.name is not null)
				GROUP BY df.page_id";
        $FollowingPages = $obj->FlyQuery($stringQuery4);
        ?>


        <div class="panel-tools pull-right">

            <div class="panel-search hide" style="display: block;">
                <input id="page-search" type="text" class="search-input" placeholder="Search All Pages..." >
                <i class="search-close">×</i>
            </div>

            <script>
                $('document').ready(function (e) {
                    $('#search-result-feed').hide()
                    $('#page-search').keyup(function (e) {
                        $('#default-feed').hide();
                        var countvalues = $(this).val().length;
                        if (countvalues >= 4)
                        {
                            $.post("./lib/search_pages.php", {'st': 1,'search_pg_data': $(this).val(),'user_id':<?php echo $input_by; ?>}, function (fetch) {
                                var datacl = jQuery.parseJSON(fetch);
                                var opt3 = datacl.data;
                                $('#default-feed').hide();
                                $('#search-result-feed').show();
                                $('#search-result-feed').html(opt3);
                            });

                        }
                        else if (countvalues == 0)
                        {
                            $('#search-result-feed').hide();
                            $('#default-feed').show();
                        }

                        $('#pginvite-btn').click(function () {
                            $('#pgsu-manage-feed').hide('slow')
                            $('#pgs-invitations-feed').show('slow')
                        });
                        $('#pgurttl-btn').click(function () {
                            $('#pgsu-manage-feed').show('slow')
                            $('#pgs-invitations-feed').hide('slow')
                        });
                        $('#pgsearch-btn').click(function () {
                            $('#pgsu-manage-feed').show('slow')
                            $('#pgs-invitations-feed').hide('slow')
                        });
                    });

                    /*$('.friends').click(function(e){
                     var getlink=$(this).find('a').attr('href');
                     alert('success');	
                     });*/

                });


            </script>

            <ul class="panel-actions actions pull-right"  style="padding-left:0px !important; padding-right:0px !important;">
                <li>
                    <button id="pginvite-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-refresh text-primary"></i> Invitations

                        <span class="badge badge-primary" id="total_page_list">
                            <script>
                                jQuery(function () {
                                    window.setInterval(function () {
                                        load_page_invitation_notification = {'st': 20, 'usrid': '<?php echo $new_user_id; ?>'};
                                        $.post('lib/shout.php', load_page_invitation_notification, function (df) {
                                            var sd = jQuery.parseJSON(df);
                                            var pil = sd.total_invitations_list;
                                            $('#total_page_list').html(pil);

                                        });
                                    }, 1000);
                                });
                            </script>
                            0
                        </span>
                    </button>
                </li>

                <li>
                    <button id="pgflw-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-check-square-o text-primary"></i> Following

                        <span class="badge badge-success">
                            <?php
                            echo is_array($FollowingPages) ? (count($FollowingPages) >= 1 ? count($FollowingPages) : "&nbsp;0") : "&nbsp;0";
                            ?>
                        </span>
                    </button>
                </li>

                <li>
                    <button id="pgurttl-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-check-square-o text-primary"></i> Your Pages
                        <span class="badge badge-warning">
                            <?php
                            echo is_array($lstPages) ? (count($lstPages) >= 1 ? count($lstPages) : "&nbsp;0") : "&nbsp;0";
                            ?>
                        </span>
                    </button>
                </li>

                <li>
                    <button id="pgsearch-btn" class="btn btn-default btn-sm panel-search-trigger">
                        <i class="mdi-action-search"></i>
                    </button>
                </li>
            </ul>





        </div>    <div style="clear: both"></div>
    </div>
    <div class="panel-body">



        <fieldset id="pgsu-manage-feed">
            <div style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="search-result-feed" class="list-group"></div>
                    <div id="default-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-file-text fa-2x" style="color:#FF6D00; margin-right:15px;"></i>Pages You Manage&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-warning">
                                        <?php
                                        echo is_array($lstPages) ? (count($lstPages) >= 1 ? count($lstPages) : "&nbsp;0") : "&nbsp;0";
                                        ?></span>
                                </strong></h5></a>
                        <?php
                        if (is_array($lstPages)) {
                            if (count($lstPages) > 0) {
                                $p = 0;

                                foreach ($lstPages as $lpKey => $lpVal) {
                                    ?>
                                    <div class="list-group-item">
                                        <a href="page.php?page_id=<?php echo $lpVal->page_id; ?>">
                                            <span class="img-thumbnail" style=" margin-right: 20px;">
                                                <img alt="d" src="./profile/<?php echo $lpVal->photo; ?>" style="height:48px; width:48px;">
                                            </span><?php echo $lpVal->name; ?>
                                            <button class="btn btn-success btn-xs pull-right"><i class="fa fa-plus">&nbsp; &nbsp;</i>Log in</button>
                                        </a>
                                    </div>

                                    <?php
                                    //if($p == 4) break;
                                    //$p++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
        </fieldset>

        <!--page invitations notifications feed starts here-->
        <fieldset id="pgs-invitations-feed">
            <div style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="default-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-file-text fa-2x" style="color:#FF6D00; margin-right:15px;"></i>Pages You Are Invited&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-warning">
                                        <?php
                                        echo is_array($InvtedPages) ? (count($InvtedPages) >= 1 ? count($InvtedPages) : "&nbsp;0") : "&nbsp;0";
                                        ?></span>
                                </strong></h5></a>
                        <?php
                        if (is_array($InvtedPages)) {
                            if (count($InvtedPages) > 0) {
                                $p = 0;

                                foreach ($InvtedPages as $lpKeyivp => $lprows) {
                                    ?>
                                    <div id="listpld_<?php echo $lprows->id; ?>" class="list-group-item">
                                        <a href="page.php?page_id=<?php echo $lprows->page_id; ?>">
                                            <span class="img-thumbnail" style=" margin-right: 20px;">
                                                <img alt="d" src="./profile/<?php echo $lprows->photo; ?>" style="height:48px; width:48px;">
                                            </span><?php echo $lprows->name; ?>
                                        </a>    
                                            <?php
                                            $sqlquerypp = $obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,page_id FROM dostums_page_likes WHERE page_id='" . $lprows->page_id . "' AND user_id='" . $new_user_id . "'");
                                            if (!empty($sqlquerypp)) {
                                                $dplstatus = $sqlquerypp[0]->status;
                                            } else {
                                                $dplstatus = 0;
                                            }
                                            if ($dplstatus == 1) {
                                                ?>

                                                <small onclick="PageLikeFromProfile('<?php echo $lprows->page_id; ?>','<?php echo $lprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> Unlike </span></small>
                                                <?php
                                            } elseif ($dplstatus == 2) {
                                                ?>

                                                <small onclick="PageLikeFromProfile('<?php echo $lprows->page_id; ?>','<?php echo $lprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> Confirm Like </span></small>
                                                <?php
                                            } elseif ($dplstatus == 0) {
                                                ?>
                                                <small onclick="PageLikeFromProfile('<?php echo $lprows->page_id; ?>','<?php echo $lprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> like </span></small>
                                                <?php
                                            }
                                            ?>
                                    </div>

                                    <?php
                                    //if($p == 4) break;
                                    //$p++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
        </fieldset>
        <!--page invitations notifications feed ends here-->

        <div style="clear:both;"></div>
        
        <!--page invitations notifications feed starts here-->
        <fieldset id="pgs-following-feed">
            <div style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="pgs-flw-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-file-text fa-2x" style="color:#FF6D00; margin-right:15px;"></i>Pages You Are Following&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-warning">
                                        <?php
                                        echo is_array($FollowingPages) ? (count($FollowingPages) >= 1 ? count($FollowingPages) : "&nbsp;0") : "&nbsp;0";
                                        ?></span>
                                </strong></h5></a>
                        <?php
                        if (is_array($FollowingPages)) {
                            if (count($FollowingPages) > 0) {
                                $p = 0;

                                foreach ($FollowingPages as $fpKeyivp => $fprows) {
                                    ?>
                                    <div id="listpld_<?php echo $fprows->id; ?>" class="list-group-item">
                                        <a href="page.php?page_id=<?php echo $fprows->page_id; ?>">
                                            <span class="img-thumbnail" style=" margin-right: 20px;">
                                                <img alt="d" src="./profile/<?php echo $fprows->photo; ?>" style="height:48px; width:48px;">
                                            </span><?php echo $fprows->name; ?>
                                        </a>    
                                            <?php
                                            $sqlquerypfl = $obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,page_id FROM dostums_page_likes WHERE page_id='" . $fprows->page_id . "' AND user_id='" . $new_user_id . "'");
                                            if (!empty($sqlquerypfl)) {
                                                $dpflstatus = $sqlquerypfl[0]->status;
                                            } else {
                                                $dpflstatus = 0;
                                            }
                                            if ($dpflstatus == 1) {
                                                ?>

                                                <small onclick="PageLikeFromProfile('<?php echo $fprows->page_id; ?>','<?php echo $fprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> Unlike </span></small>
                                                <?php
                                            } elseif ($dpflstatus == 2) {
                                                ?>

                                                <small onclick="PageLikeFromProfile('<?php echo $fprows->page_id; ?>','<?php echo $fprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> Confirm Like </span></small>
                                                <?php
                                            } elseif ($dpflstatus == 0) {
                                                ?>
                                                <small onclick="PageLikeFromProfile('<?php echo $fprows->page_id; ?>','<?php echo $fprows->id; ?>')" class="pull-right "><span class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i> like </span></small>
                                                <?php
                                            }
                                            ?>
                                    </div>

                                    <?php
                                    //if($p == 4) break;
                                    //$p++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
        </fieldset>
        <!--page invitations notifications feed ends here-->

        <div style="clear:both;"></div>


    </div>

    <div class="panel-footer">

        <!--<nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>-->

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#pgs-invitations-feed").hide();
            $("#pgs-following-feed").hide();
            $("#pginvite-btn").click(function (){
                $("#default-feed").hide();
                $("#search-result-feed").hide();
                $("#pgs-following-feed").hide();
                $("#pgs-invitations-feed").show('slow');
            });
            
            $("#pgurttl-btn").click(function (){
                $("#default-feed").show('slow');
                $("#search-result-feed").hide();
                $("#pgs-following-feed").hide();
                $("#pgs-invitations-feed").hide();
            });
            
            $("#pgflw-btn").click(function (){
                $("#default-feed").hide();
                $("#search-result-feed").hide();
                $("#pgs-invitations-feed").hide();
                $("#pgs-following-feed").show('slow');
            });
        });
    </script>


</div>