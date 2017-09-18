<style>
    .panel-search{ left:15px !important; width:95% !important; height:55px !important;}
    .list-group .list-group-item{padding:10px 15px !important; border:1px solid #DDDDDD !important;}
    .btn-default{border:1px solid #DDDDDD !important; }
</style>
<div class="panel ">
    <div class="panel-heading">
        <?php
        //QUERY FOR GROUP LIST YOU MANAGE
        $stringQuery = "SELECT 
			dg.name,
			dg.group_id,
			dgi.class 
			FROM dostums_group as dg 
			Left JOIN dostums_group_icon as dgi on dg.icon_id = dgi.id 
			WHERE dg.user_id ='" . $input_by . "' 
			and dg.name != '' 
			or dg.name is null 
			GROUP BY dg.group_id";
        $lstGroups = $obj->FlyQuery($stringQuery);

        //QUERY FOR GROUP LIST YOU ARE IN(JOINED) AS MEMBER
        $stringQuerygjam = "SELECT 
			dgm.id,dgm.group_id,dgm.user_id,dgm.input_by,dgm.date_time,dgm.status, 
			dg.name,
			IFNULL(dgi.class,'fa fa-users') as icon
			FROM dostums_group_members AS dgm
			LEFT JOIN dostums_group AS dg ON dg.group_id=dgm.group_id
			LEFT JOIN dostums_group_icon AS dgi ON dgi.id=dg.icon_id
			WHERE dgm.user_id='" . $input_by . "' 
			AND dgm.user_id != dgm.input_by
			AND dgm.status='1'
			GROUP BY dg.group_id";
        $lstGroupsjam = $obj->FlyQuery($stringQuerygjam);

        //QUERY FOR GROUP LIST YOU ARE INVITED TO JOIN
        $stringQuerygjinv = "SELECT 
			dgm.id,dgm.group_id,dgm.user_id,dgm.input_by,dgm.date_time,dgm.status, 
			dg.name,
			IFNULL(dgi.class,'fa fa-users') as icon
			FROM dostums_group_members AS dgm
			LEFT JOIN dostums_group AS dg ON dg.group_id=dgm.group_id
			LEFT JOIN dostums_group_icon AS dgi ON dgi.id=dg.icon_id
			WHERE dgm.user_id='" . $input_by . "' AND dgm.status='2'
			GROUP BY dg.group_id";
        $lstGroupsjinv = $obj->FlyQuery($stringQuerygjinv);
        ?>


        <div class="panel-tools pull-left">

            <div class="panel-search hide" style="display: block;">
                <input id="group-search" type="text" class="search-input" placeholder="Search All Groups..." >
                <i class="search-close">×</i>
            </div>
            <script>
                $('document').ready(function (e) {
                    $('#search-result-feed').hide()
                    $('#group-search').keyup(function (e) {
                        $('#default-feed').hide();
                        var countvalues = $(this).val().length;
                        if (countvalues >= 4)
                        {
                            $.post("./lib/search_groups.php", {'st': 1, 'search_gr_data': $(this).val(), 'user_id':<?php echo $input_by; ?>}, function (fetch) {
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


            <ul class="panel-actions actions pull-left"  style="padding-left:0px !important; padding-right:0px !important;">
                <li>
                    <button id="grpinvite-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-refresh text-primary"></i> Invitations <span class="badge badge-info" id="total_grp_invitaions">
                            <script>
                                jQuery(function () {
                                    window.setInterval(function () {
                                        load_group_invitation_notifications = {'st': 26, 'user_id': <?php echo $new_user_id ?>};
                                        $.post('lib/shout.php', load_group_invitation_notifications, function (fetch_data) {
                                            var grpinvitations = jQuery.parseJSON(fetch_data);
                                            var ttl_group_invitations = grpinvitations.ttl_group_mem_inv;
                                            $('#total_grp_invitaions').html(ttl_group_invitations);

                                        });
                                    }, 1000);
                                });
                            </script>
                            0
                        </span>
                    </button>
                </li>

                <li>
                    <button id="grpjoined-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-check-square-o text-primary"></i> Joined <span class="badge badge-primary">
                            <?php
                            echo is_array($lstGroupsjam) ? (count($lstGroupsjam) >= 1 ? count($lstGroupsjam) : "&nbsp;0") : "&nbsp;0";
                            ?>
                        </span>
                    </button>
                </li>

                <li>
                    <button id="yourgrps-btn" class="btn btn-default btn-sm">
                        <i class="fa fa-check-square-o text-primary"></i> Your Groups
                        <span class="badge badge-success">
                            <?php
                            echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
                            ?>
                        </span>
                    </button>
                </li>

                <li>
                    <a class="panel-search-trigger" href="">
                        <i class="mdi-action-search"></i>
                    </a>
                </li>
            </ul>





        </div>    <div style="clear: both"></div>
    </div>
    <div class="panel-body">



        <fieldset id="your-groups-feed">
            <div id="" style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="search-result-feed" class="list-group"></div>
                    <div id="default-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-sitemap fa-2x" style="color:#4CAF50; margin-right:15px;"></i>Groups You Manage&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-success">
                                        <?php
                                        echo is_array($lstGroups) ? (count($lstGroups) >= 1 ? count($lstGroups) : "&nbsp;0") : "&nbsp;0";
                                        ?></span>
                                </strong></h5></a>
                        <?php
                        if (is_array($lstGroups)) {
                            if (count($lstGroups) > 0) {
                                //$i =0;

                                foreach ($lstGroups as $lVal) {
                                    ?>
                                    <div class="list-group-item">
                                        <a href="group.php?group_id=<?php echo $lVal->group_id; ?>">
                                            <span style="color:#2C99CE; margin-right:15px; font-size:24px;" class="<?php echo $lVal->class == "" ? "fa fa-users text-warning" : $lVal->class; ?>">
                                            </span><span style="font-size:14px;"><?php echo $lVal->name; ?></span></a>
                                        <button class="btn btn-success btn-xs pull-right"><i class="fa fa-eye">&nbsp; &nbsp;</i>View Group</button>
                                    </div>

                                    <?php
                                    //if($i == 15) break;
                                    //$i++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>
        </fieldset>

        <fieldset id="joined-groups-feed">
            <div id="" style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="default-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-sitemap fa-2x" style="color:#4CAF50; margin-right:15px;"></i>Groups You Joined&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-success">
                                        <?php
                                        echo is_array($lstGroupsjam) ? (count($lstGroupsjam) >= 1 ? count($lstGroupsjam) : "&nbsp;0") : "&nbsp;0";
                                        ?></span>
                                </strong></h5></a>
                        <?php
                        if (is_array($lstGroupsjam)) {
                            if (count($lstGroupsjam) > 0) {
                                //$i =0;

                                foreach ($lstGroupsjam as $gjamval) {
                                    ?>
                                    <div id="listgjd_<?php echo $gjamval->id; ?>" class="list-group-item">
                                        <a href="group.php?group_id=<?php echo $gjamval->group_id; ?>">
                                            <span style="color:#2C99CE; margin-right:15px; font-size:24px;" class="<?php echo $gjamval->class == "" ? "fa fa-users text-warning" : $gjamval->class; ?>">
                                            </span><span style="font-size:14px;"><?php echo $gjamval->name; ?></span></a>

                                        <?php
                                        $sqlquerydgms = $obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,group_id FROM dostums_group_members WHERE group_id='" . $lVal->group_id . "' AND user_id='" . $new_user_id . "'");
                                        if (!empty($sqlquerydgms)) {
                                            $dgmstatus = $sqlquerydgms[0]->status;
                                        } else {
                                            $dgmstatus = 0;
                                        }
                                        ?>
                                        <?php
                                        if ($dgmstatus == 1) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $gjamval->group_id; ?>', '<?php echo $gjamval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-times"></i> Leave</span>
                                            <?php
                                        } elseif ($dgmstatus == 2) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $gjamval->group_id; ?>', '<?php echo $gjamval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-plus"></i> Accept</span>
                                            <?php
                                        } elseif ($dgmstatus == 3) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $gjamval->group_id; ?>', '<?php echo $gjamval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-plus"></i> Request Sent</span>
                                            <?php
                                        } elseif ($dgmstatus == 0) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $gjamval->group_id; ?>', '<?php echo $gjamval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Join</span>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                        <?php
                                        //if($i == 15) break;
                                        //$i++;
                                    }
                                }
                            }
                            ?>
                    </div>
                </div>


            </div>
        </fieldset>

        <fieldset id="group-invitations-feed">
            <div id="" style="clear:both;" class="row">

                <div class="col-lg-12">
                    <div id="default-feed" class="list-group">
                        <a class="list-group-item bg-default">
                            <h5><strong><i class="fa fa-sitemap fa-2x" style="color:#4CAF50; margin-right:15px;"></i>Groups You Are Invited&nbsp;:
                                    &nbsp; Total &nbsp; 
                                    <span class="badge badge-success">
<?php
echo is_array($lstGroupsjinv) ? (count($lstGroupsjinv) >= 1 ? count($lstGroupsjinv) : "&nbsp;0") : "&nbsp;0";
?></span>
                                </strong></h5></a>
                                        <?php
                                        if (is_array($lstGroupsjinv)) {
                                            if (count($lstGroupsjinv) > 0) {
                                                //$i =0;

                                                foreach ($lstGroupsjinv as $ginval) {
                                                    ?>
                                    <div id="listgjd_<?php echo $ginval->id; ?>" class="list-group-item">
                                        <a href="group.php?group_id=<?php echo $ginval->group_id; ?>">
                                            <span style="color:#2C99CE; margin-right:15px; font-size:24px;" class="<?php echo $ginval->class == "" ? "fa fa-users text-warning" : $ginval->class; ?>">
                                            </span><span style="font-size:14px;"><?php echo $ginval->name; ?></span></a>
            <?php
            $sqlquerydgins = $obj->FlyQuery("SELECT IFNULL(status,'0') as status,user_id,group_id FROM dostums_group_members WHERE group_id='" . $ginval->group_id . "' AND user_id='" . $new_user_id . "'");
            if (!empty($sqlquerydgins)) {
                $dginstatus = $sqlquerydgins[0]->status;
            } else {
                $dginstatus = 0;
            }
            ?>
                                        <?php
                                        if ($dginstatus == 1) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $ginval->group_id; ?>', '<?php echo $ginval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-times"></i> Leave</span>
                                            <?php
                                        } elseif ($dginstatus == 2) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $ginval->group_id; ?>', '<?php echo $ginval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-plus"></i> Accept</span>
                                            <?php
                                        } elseif ($dginstatus == 3) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $ginval->group_id; ?>', '<?php echo $ginval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-user-plus"></i> Request Sent</span>
                                            <?php
                                        } elseif ($dginstatus == 0) {
                                            ?>
                                            <span onclick="GroupJoinFromProfile('<?php echo $ginval->group_id; ?>', '<?php echo $ginval->id; ?>')" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Join</span>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                        <?php
                                        //if($i == 15) break;
                                        //$i++;
                                    }
                                }
                            }
                            ?>
                    </div>
                </div>


            </div>
        </fieldset>

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
            $("#group-invitations-feed").hide();
            $("#joined-groups-feed").hide();
            $("#grpinvite-btn").click(function (){
                $("#your-groups-feed").hide();
                $("#search-result-feed").hide();
                $("#joined-groups-feed").hide();
                $("#group-invitations-feed").show('slow');
            });
            
            $("#grpjoined-btn").click(function (){
                $("#your-groups-feed").hide();
                $("#search-result-feed").hide();
                $("#group-invitations-feed").hide();
                $("#joined-groups-feed").show('slow');
            });
            
            $("#yourgrps-btn").click(function (){
                $("#group-invitations-feed").hide();
                $("#search-result-feed").hide();
                $("#joined-groups-feed").hide();
                $("#your-groups-feed").show('slow');
            });
        });
    </script>


</div>