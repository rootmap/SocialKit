<div class="panel panel-default">
    <div class="panel-heading">
        <h5>Group Detail</h5>
    </div>
    <div class="panel-body">

        <div class="panel-content profile-content">
            <h4><strong><?php echo $obj->SelectAllByVal("dostums_group","group_id",$new_group_id,"name"); ?>  </strong></h4>

            <p><i class="fa  fa-clock-o "></i>&nbsp;Published &nbsp;:&nbsp;<?php echo substr($obj->SelectAllByVal("dostums_group","group_id",$new_group_id,"date"),0,4); ?></p>

            <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $obj->SelectAllByVal("dostums_group","group_id",$new_group_id,"address");?></p>
            <h5>
                <strong>About</strong>
            </h5>

            <p><?php echo $obj->SelectAllByVal("dostums_group","group_id",$new_group_id,"about");?></p>

            <!--<div class="row profile-info-graph">
                <div class="col-md-4">
                    <i class="fa fa-bullhorn c1  fa-2x"></i>
                    <h5><span>169</span> Posts</h5>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-users fa-2x c2 "></i>
                    <h5><span>288</span> Members </h5>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-bar-chart-o c3 fa-2x"></i>
                    <h5><span>240</span> Followers</h5>
                </div>
            </div>
            <div class="user-button">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-sm btn-block" type="button"><i
                                class="fa fa-envelope"></i> Message
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-sm btn-block" type="button"><i
                                class="fa fa-user"></i> Join
                        </button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>