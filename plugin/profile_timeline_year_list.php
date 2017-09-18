<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><i class="mdi-device-access-time"></i> Timeline</h3>
        <div class="btn-group pull-right btn-vrt boxHeaderOptions">
            <i class="mdi-navigation-refresh"></i>
            <ul class="dropdown-menu">
                <li><a title="#" href="#"><i class="mdi-device-access-time"></i> Time span</a></li>
                <li><a title="#" href="#"><i class="mdi-communication-chat"></i> Chart type</a></li>
                <li><a title="#" href="#"><i class="mdi-navigation-refresh"></i> Refresh</a></li>
            </ul>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="panel-body has-timeline">
        <ul style="max-width: 300px;" class="nav nav-pills nav-stacked">
            <!--<li class="active"><a href="javascript:void(0)" onclick="timelineWisepostdata(this.value)">2015</a></li>-->
            <!--            <li class=""><a href="javascript:void(0)">2014</a></li>
                        <li class=""><a href="javascript:void(0)">2013</a></li>
                        <li class=""><a href="javascript:void(0)">2012</a></li>
                        <li class=""><a href="javascript:void(0)">2011</a></li>
                        <li class=""><a href="javascript:void(0)">2010</a></li>-->
            <?php
            $active = (int) date('Y');
            $firstYear = (int) date('Y') - 5;
            $lastYear = $firstYear + 5;
            for ($i = $lastYear; $i >= $firstYear; $i--) {
                ?>
                <li <?php if ($i == $active) { ?> class="active" <?php } ?> ><a href="javascript:void(0)" onclick="timelineWisepostdata(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
        </ul>
    </div>
</div>
<script>
    function timelineWisepostdata(da) {
        alert(da)
       $.post("Untitled-1.php", {'company_id': da }, function (data) {
//                var total = data.length;
//                if (total != 0)
//                {
//                    var str = '';
//                    var i = 1;
//                    $.each(data, function (index, val) {
//
//                        str += '<p  id="' + val.emp_code + '">' + i + '. ' + val.name + ' -' + val.emp_code + '</p>';
//                        i += 1;
//                    });
//                    // console.log("Data Found");
//                    $(".emp2").html(str);
//                }
//                else
//                {
//                    $(".emp2").html('0 Record Found');
//                }
                //console.log(data);
            })
    }

</script>
