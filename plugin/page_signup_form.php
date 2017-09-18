<input type="hidden" id="new_page_id" />
<input type="hidden" id="new_page_name" />
<input type="hidden" id="new_page_cat" />
<input type="hidden" id="new_fan_page_id" />
<script>
    $(document).ready(function () {
        $("#modal2").hide();
        $("#modal3").hide();
        $("#modal4").hide();
        $(".detail-form-btn").click(function () {
            var newid = $(this).parent().parent().attr("id");
            var newtextname = $(this).parent().find('input[name=name]').val();
            var newselectcat = $(this).parent().find('select').val();


            $("#new_page_name").val(newtextname);
            $("#new_page_cat").val(newselectcat);

            var page_id = $('#new_page_id').val();
            var page_name = $('#new_page_name').val();
            var page_cat = $('#new_page_cat').val();


            if (page_id != "")
            {
                $.post("./lib/fanpage.php", {'st': 1, 'page_type_id': page_id, 'fanpage_name': page_name, 'page_category': page_cat}, function (data)
                {
                    var datacl = jQuery.parseJSON(data);
                    var fanpage_id = datacl.page_id;
                    var status = datacl.status;
                    if (status == 1)
                    {
                        $("#modal1").hide();
                        $("#modal2").show();
                        $('#conglomarate').attr('class', fanpage_id);
                        $('.fpage_name').html(page_name);
                        $("#new_fan_page_id").val(fanpage_id);
                    }
                    else
                    {
                        alert('Failed, Please try again after reloading page.');
                        //location.replace("./page.php?page_id="+fanpage_id);
                    }
                });
            }
        });

        $("#btn_modal3").click(function (e) {
            $("#modal2").hide();
            $("#modal3").show();
        });

        $("#prev_btn1").click(function () {
            $("#modal2").hide();
            $("#modal1").show();
        });

        $("#skip_btn1").click(function () {
            $("#modal2").hide();
            $("#modal3").show();
        });

        $("#prev_btn2").click(function () {
            $("#modal3").hide();
            $("#modal2").show();
        });

        $("#skip_btn2").click(function () {
            $("#modal3").hide();
            $("#modal4").show();
        });

        $("#btn_modal4").click(function () {
            $("#modal3").hide();
            $("#modal4").show();
        });

        $("#prev_btn3").click(function () {
            $("#modal4").hide();
            $("#modal3").show();
        });
    });
</script>



<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="fanpage_modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:20px !important;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Create New Page&nbsp;:</strong></h4>
            </div>

            <div class="modal-body"><!--modal body starts-->
                <form role="form" action="" method="post" class="registration-form"><!--Main form starts-->
                    <fieldset class="fanpage_reg" id="step1"><!--fieldset section-1 starts-->
                        <div id="modal1" class="form-bottom">
                            <center><label id="">Step 1 / 4 (Please Select Your Page Type & Name)&nbsp;:</label></center></br>
                            <div id="pgtb1" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 1-->
                                <div id="lcl_bp1" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/lbp-icon.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Local Business or Place</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp1").on("click", function () {
                                            $("#lcl_bp1").hide();
                                            $("#lcl_bp2").show();
                                            $("#new_page_id").val("1");
                                        });

                                        $("#lcl_bp_cancel1").on("click", function () {
                                            $("#lcl_bp2").hide();
                                            $("#lcl_bp1").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp2" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmail3">Local Business or Place</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Choose a  Category</label>
                                        <select class="form-control" name="category" id="category_id">
                                            <option class="form-option form-option-empty" value="">Choose a  Category</option>
                                            <?php
                                            $sqlfpcategory = $obj->SelectAllByID_Multiple("dostums_fanpage_category", array("page_type_id" => 1));
                                            if (!empty($sqlfpcategory))
                                                foreach ($sqlfpcategory as $category):
                                                    ?>
                                                    <option value="<?php echo $category->id; ?>" class="form-option"><?php echo $category->name; ?></option>
                                                    <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Business or Place Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword3" placeholder="Business or Place Name?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel1" type="button" class="btn btn-primary btn-xs">Cancel</button>
                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 1-->

                            <div id="pgtb2" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 2-->
                                <div id="lcl_bp3" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/company_org_ins.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Company, Oraganization or Institution</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp3").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp3").hide();
                                            $("#lcl_bp4").show();
                                            $("#new_page_id").val("2");
                                        });
                                        $("#lcl_bp_cancel2").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp4").hide();
                                            $("#lcl_bp3").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp4" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmailx">Company, Oraganization or Institution</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmailx" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmaily">Choose a  Category</label>
                                        <select class="form-control" name="category" id="category_id">
                                            <option class="form-option form-option-empty" value="">Choose a  Category</option>
                                            <?php
                                            $sqlfpcategorys = $obj->SelectAllByID_Multiple("dostums_fanpage_category", array("page_type_id" => 2));
                                            if (!empty($sqlfpcategorys))
                                                foreach ($sqlfpcategorys as $categorys):
                                                    ?>
                                                    <option value="<?php echo $categorys->name; ?>" class="form-option"><?php echo $categorys->name; ?></option>
                                                    <?php
                                                endforeach;
                                            ?>

                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPasswordh">Company Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPasswordm" placeholder="Company Name?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel2" type="button" class="btn btn-primary btn-xs">Cancel</button>
                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 2-->

                            <div id="pgtb3" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 3-->
                                <div id="lcl_bp5" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/brand-product.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Brand or Product</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp5").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp5").hide();
                                            $("#lcl_bp6").show();
                                            $("#new_page_id").val("3");
                                        });
                                        $("#lcl_bp_cancel3").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp6").hide();
                                            $("#lcl_bp5").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp6" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmailx">Brand or Product</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmailx" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmaily">Choose a  Category</label>
                                        <select class="form-control" name="category" id="category_id">
                                            <option class="form-option" value="">Choose a  Category</option>
                                            <?php
                                            $sqlfpcategorysa = $obj->SelectAllByID_Multiple("dostums_fanpage_category", array("page_type_id" => 3));
                                            if (!empty($sqlfpcategorysa))
                                                foreach ($sqlfpcategorysa as $categorysa):
                                                    ?>
                                                    <option value="<?php echo $categorysa->name; ?>" class="form-option"><?php echo $categorysa->name; ?></option>
                                                    <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPasswordh">Brand or Product Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPasswordm" placeholder="Brand or Product Name?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel3" type="button" class="btn btn-primary btn-xs">Cancel</button>
                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 3-->
                            <div class="clearfix"></div>
                            <div id="pgtb4" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 4-->
                                <div id="lcl_bp7" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/artist-band-pf.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Artist,Band or Public Figure</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp7").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp7").hide();
                                            $("#lcl_bp8").show();
                                            $("#new_page_id").val("4");
                                        });
                                        $("#lcl_bp_cancel4").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp8").hide();
                                            $("#lcl_bp7").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp8" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmail3">Artist,Band or Public Figure</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Choose a  Category</label>
                                        <select class="form-control" name="category" id="category_id">
                                            <option class="form-option" value="">Choose a  Category</option>
                                            <?php
                                            $sqlfpcategorysaf = $obj->SelectAllByID_Multiple("dostums_fanpage_category", array("page_type_id" => 4));
                                            if (!empty($sqlfpcategorysaf))
                                                foreach ($sqlfpcategorysaf as $categorysaf):
                                                    ?>
                                                    <option value="<?php echo $categorysaf->name; ?>" class="form-option"><?php echo $categorysaf->name; ?></option>
                                                    <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Artist,Band or Public Figure</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword3" placeholder="Artist,Band or Public Figure?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel4" type="button" class="btn btn-primary btn-xs">Cancel</button>

                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 4-->

                            <div id="pgtb5" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 5-->
                                <div id="lcl_bp9" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/media-entertainment.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Media or Entertainment</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp9").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp9").hide();
                                            $("#lcl_bp10").show();
                                            $("#new_page_id").val("5");
                                        });
                                        $("#lcl_bp_cancel5").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp10").hide();
                                            $("#lcl_bp9").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp10" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmailx">Media or Entertainment</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmailx" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmaily">Choose a  Category</label>
                                        <select class="form-control" name="category" id="category_id">
                                            <option class="form-option" value="">Choose a  Category</option>
                                            <?php
                                            $sqlfpcategorysaf = $obj->SelectAllByID_Multiple("dostums_fanpage_category", array("page_type_id" => 5));
                                            if (!empty($sqlfpcategorysaf))
                                                foreach ($sqlfpcategorysaf as $categorysaf):
                                                    ?>
                                                    <option value="<?php echo $categorysaf->name; ?>" class="form-option"><?php echo $categorysaf->name; ?></option>
                                                    <?php
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPasswordh">Media or Entertainment Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPasswordm" placeholder="Media or Entertainment Name?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel5" type="button" class="btn btn-primary btn-xs">Cancel</button>
                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 5-->

                            <div id="pgtb6" class="col-lg-4 page_type_box"><!--Here Starts Page Type Box 6-->
                                <div id="lcl_bp11" class="thumbnail">
                                    <img class="page_type_icon" src="./images/page/page_type_icons/community-icon.png" alt="Local Business or Place"/>
                                    <div class="caption page_type_label text-center">
                                        <h5>Cause or Community</h5>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#lcl_bp12").hide();
                                        $("#lcl_bp11").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp11").hide();
                                            $("#lcl_bp12").show();
                                            $("#new_page_id").val("6");
                                        });
                                        $("#lcl_bp_cancel6").on("click", function () {
                                            //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                            $("#lcl_bp12").hide();
                                            $("#lcl_bp11").show();
                                        });
                                    });
                                </script>
                                <div id="lcl_bp12" class="thumbnail text-center page_type_form">
                                    <!--                                                <form class="form-inline">-->
                                    <div class="form-group text-warning">
                                        <label for="exampleInputEmailx">Cause or Community</label>
                                        <input type="hidden" class="form-control" id="exampleInputEmailx" placeholder="Email">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputPasswordh">Cause or Community Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPasswordm" placeholder="Cause or Community Name?">
                                    </div>
                                    <div class="clearfix"></div>
                                    <button id="lcl_bp_cancel6" type="button" class="btn btn-primary btn-xs">Cancel</button>
                                    <button type="button" class="btn btn-success btn-xs detail-form-btn">Next</button>
                                    <!--                                                </form>-->
                                </div>
                            </div><!--Here Ends Page Type Box 3-->

                            <script type="text/javascript">
                                $(function () {
                                    $("#lcl_bp1").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp1").hide();
                                        $("#lcl_bp2").show();
                                        $("#lcl_bp3").show();
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp5").show();
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp7").show();
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp9").show();
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp11").show();
                                        $("#lcl_bp12").hide();
                                    });
                                    $("#lcl_bp3").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp3").hide();
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp12").hide();
                                        $("#lcl_bp4").show();
                                        $("#lcl_bp1").show();
                                        $("#lcl_bp5").show();
                                        $("#lcl_bp7").show();
                                        $("#lcl_bp9").show();
                                        $("#lcl_bp11").show();
                                    });
                                    $("#lcl_bp5").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp5").hide();
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp12").hide();
                                        $("#lcl_bp6").show();
                                        $("#lcl_bp1").show();
                                        $("#lcl_bp3").show();
                                        $("#lcl_bp7").show();
                                        $("#lcl_bp9").show();
                                        $("#lcl_bp11").show();
                                    });
                                    $("#lcl_bp7").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp7").hide();
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp12").hide();
                                        $("#lcl_bp8").show();
                                        $("#lcl_bp1").show();
                                        $("#lcl_bp3").show();
                                        $("#lcl_bp5").show();
                                        $("#lcl_bp9").show();
                                        $("#lcl_bp11").show();
                                    });
                                    $("#lcl_bp9").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp9").hide();
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp12").hide();
                                        $("#lcl_bp10").show();
                                        $("#lcl_bp1").show();
                                        $("#lcl_bp3").show();
                                        $("#lcl_bp5").show();
                                        $("#lcl_bp7").show();
                                        $("#lcl_bp11").show();
                                    });
                                    $("#lcl_bp11").on("click", function () {
                                        //$("#lcl_bp1, #lcl_bp2").toggle("slow");
                                        $("#lcl_bp11").hide();
                                        $("#lcl_bp4").hide();
                                        $("#lcl_bp6").hide();
                                        $("#lcl_bp2").hide();
                                        $("#lcl_bp10").hide();
                                        $("#lcl_bp8").hide();
                                        $("#lcl_bp12").show();
                                        $("#lcl_bp1").show();
                                        $("#lcl_bp3").show();
                                        $("#lcl_bp5").show();
                                        $("#lcl_bp7").show();
                                        $("#lcl_bp9").show();
                                    });
                                });
                            </script>
                            <div class="clearfix"></div>
                        </div><!--form-bottom-01 ends here -->
                        <div id="modal2" class="form-bottom">
                            <span id="conglomarate"></span>

                            <center><label id="new_page_name">Step 2 / 4 (Please tell us about&nbsp;<span class="fpage_name"></span>)&nbsp;:</label></center></br><!--your page detail-->
                            <div class="form-group">
                                <label class="control-label" for="form-last-name"><i class="fa fa-info-circle margin-right5"></i>About &nbsp;<span class="fpage_name"></span></label>
                                <textarea class="form-control" rows="1" name="page_description" placeholder="Describe about your group, its value, purpose and interest" id="page_des"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="form-web-address"><i class="fa fa-info-circle margin-right5"></i>Web Address</label>
                                <input type="text" name="page_web_address" placeholder="what is your web address?" class="form-control" id="page-web">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="form-web-address"><i class="fa fa-info-circle margin-right5"></i>Dostums Web Address</label>
                                <input type="text" name="dp_web_address" placeholder="what is your Dostums web address?" class="form-control" id="dp-web">
                            </div>
                            <button type="button" class="btn btn-info" id="prev_btn1">Previous</button>
                            <button type="button" class="btn btn-primary" id="skip_btn1">Skip</button>
                            <button type="button" class="btn btn-success" id="btn_modal3">Next</button>
                            <script>
                                $(document).ready(function (e) {
                                    $("#btn_modal3").click(function (e) {
                                        var page_des = $('#page_des').val();
                                        var page_web = $('#page-web').val();
                                        var dp_web = $('#dp-web').val();
                                        var fanpage_id = $('#new_fan_page_id').val();
                                        $.post("./lib/fanpage.php", {'st': 2, 'page_des': page_des, 'page_web': page_web, 'dp_web': dp_web, 'fanpage_id': fanpage_id}, function (data) {
                                            if (data == 1)
                                            {
                                                $("#modal3").hide();
                                                $("#modal4").hide();
                                                //alert('Your Page Detail Successfully Saved!!!');
                                                location.replace("./page.php?page_id="+fanpage_id);
											}
                                            else
                                            {
                                                alert('Sorry!!! Failed. Please Try Again.');
                                            }
                                        });
                                    });

                                });
                            </script>
                            <div class="clearfix"></div>
                        </div><!--form-bottom-02 ends here -->
                        <div id="modal3" class="form-bottom">
                            <center><label>Step 3 / 4 (Please upload your &nbsp;<span class="fpage_name"></span>) photos)&nbsp;:</label></center>
                            <div class="clearfix"></div>
                            <div class="row" id="photo-up">
                                <div class="col-md-4 photo-thumb">
                                    <a href="#" class="thumbnail">
                                        <img id="imagePreview" class="img-responsive" src="./images/placeholder.png" alt="Profile Photo">
                                    </a>
                                </div>
                                <div class="col-md-4 text-center photo-link" style="margin-top: 10px !important; border-right: 1px solid #999 !important;">
                                    <input id="upload" type="file" id="uploadFile" name="image" class="img"/>
                                    <a id="upload_link" class="text-info f-link" href="">Upload From Computer</a>
                                </div>
                                <div class="col-md-4 text-left photo-link" style="margin-top: 10px !important;">
                                    <input id="upload" type="file" id="uploadFile" name="image" class="img"/>
                                    <a id="upload_link" class="text-success f-link" href="">Choose From Your Photos</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row text-right" style="margin-top: 15px !important;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-info" id="prev_btn2">Previous</button>
                                    <button type="submit" class="btn btn-primary" id="skip_btn2">Skip</button>
                                    <button type="button" class="btn btn-success" id="btn_modal4">Next</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--form-bottom-03 ends here -->
                        <div id="modal4" class="form-bottom">
                            <center><label>Step 4 / 4 (Please tell us about your &nbsp;<span class="fpage_name"></span>) audience)&nbsp;:</label></center>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label ><i class="fa fa-info-circle margin-right5"></i>Locations</label>
                                        <div class="input-group">
                                            <div id="incl-stat" class="input-group-btn">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Include</a></li>
                                                    <li><a href="#">Exclude</a></li>
                                                </ul>
                                            </div><!-- /btn-group -->
                                            <input type="text" class="form-control" aria-label="..." placeholder="Add a country, state/province, city/ZIP or address">
                                        </div><!-- /input-group -->
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label ><i class="fa fa-info-circle margin-right5"></i>Audience Specifications</label>
                                        <!-- select button -->
                                        <select class="form-control">
                                            <option>Everyone in this location</option>
                                            <option>People who live in this location</option>
                                            <option>People recently in this location</option>
                                            <option>People traveling in this location</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <div class="col-md-5" style="padding-left:0px !important;">
                                            <label ><i class="fa fa-info-circle margin-right5"></i>Age</label>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6" style="padding-left:0px !important;">
                                                <!-- select button -->
                                                <select class="form-control text-center">
                                                    <option value="0">From - (16)</option>
                                                    <?php
                                                    for ($x = 16; $x <= 64; $x++) {
                                                        ?>
                                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="padding-right:0px !important;">
                                                <!-- select button -->
                                                <select class="form-control text-center">
                                                    <option value="0">To - (65+)</option>
                                                    <?php
                                                    for ($y = 65; $y <= 120; $y++) {
                                                        ?>
                                                        <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div><br>
                                    <div class="form-group" style="padding-right:0px !important;">
                                        <label ><i class="fa fa-info-circle margin-right5"></i>Gender</label>
                                        <div class="clearfix"></div>
                                        <div id="gen-btn" class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-success">All</button>
                                            <button type="button" class="btn btn-warning">Men</button>
                                            <button type="button" class="btn btn-info">Women</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label ><i class="fa fa-info-circle margin-right5"></i>Interests</label>
                                        <div class="clearfix"></div>
                                        <!-- select button -->
                                        <select class="form-control">
                                            <option>Business and industry</option>
                                            <option>Entertainment</option>
                                            <option>Family and relationships</option>
                                            <option>Fitness and wellness</option>
                                            <option>Food and drink</option>
                                            <option>Hobbies and activities</option>
                                            <option>Shopping and fashion</option>
                                            <option>Sports and outdoors</option>
                                            <option>Technology</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row text-right" style="margin-top: 15px !important;">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-info" id="prev_btn3">Previous</button>
                                    <button type="submit" class="btn btn-primary" class="finish">Skip</button>
                                    <button type="button" class="btn btn-success" class="finish">Next</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--form-bottom-04 ends here -->
                    </fieldset><!--fieldset section-1 starts-->
                </form><!--Main form ends-->
            </div><!--modal body ends-->
        </div>
    </div>
</div>






<!-- [ share modal start] -->
        <div id="myHomeShareModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 110px;">
                      <!-- [start modal header] -->
                         <div class="modal-header" style="border-bottom: 1px solid #ededed;padding-top: 12px;padding-left: 20px;padding-right: 20px; padding-bottom: 5px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title"><i class="fa fa-share-square-o"></i> Share Post</h5>
                            <input type="hidden" value="" id="postedid">
                         </div>
                      <!-- [end modal header] -->

                      <!-- [start modal body] -->
                            <div class="modal-body" style="padding: 12px 20px 12px 20px;">
                                   <div class="col-md-12" style="padding:0px;">
                                        <select class="selectpicker show-tick show-menu-arrow" onchange="shareOption(this);">
                                          <option value="1">Share on your Timeline</option>
                                          <option value="2">Share on a friend's Timeline</option>
                                          <!-- <option value="3">Share in a group</option>
                                          <option value="4">Share in a page</option> -->
                                        </select>
                                   </div>

                                  <div class="col-md-12" id="name" style="padding:0px;">
                                      <div class="col-md-12" style="padding:0px;">
                                          <div id="custom-search-input" class="row">
                                             <form class="search" method="get" style="width:100%!important;" >
                                                  <!-- <input id="searchMe" type="text" name="q" placeholder="Search Dostums Friends..." /> -->
                                                  <p id="feildname" style="margin-left: 15px;"></p>
                                                  <input  id="keyFriendName" onkeyup="keyFriendNames();" onblur="myBlurFunction();"  placeholder="Friend's name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;" >
                                                  <!-- <input id="keyGroupName" onkeyup="keyGroupNames();" onblur="myBlurFunction();" placeholder="Group name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;">
                                                       <input id="keyPageName" onkeyup="keyPageNames();" onblur="myBlurFunction();" placeholder="Page name" type="text" class="form-control" style="width:100%;height: 35px;background:none; display:none;"> -->
                                                  <span id="element_name"></span>
                                                     <ul class="results" id="sharesuggestions" data-mcs-theme="dark" style="width:100%!important;margin-top:30px!important;border:none;">
                                                       <li id="shareloading" style="padding:0px !important; display:none;">
                                                           <a id="load-spin" href="#">
                                                             <div class="row">
                                                                 <div class="col-sm-6 text-right" style="margin-top:5px;">
                                                                     Please Wait...
                                                                 </div>
                                                                 <div class="col-sm-6 text-left">
                                                                     <img class="" src="./images/spinner/rolling.gif" style=""/>
                                                                   </div>
                                                               </div>
                                                           </a>
                                                       </li>
                                                   </ul>
                                              </form>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-12" style="padding:0px;">
                                     <textarea style="background-color: snow;border-bottom: 1px solid #ccc;margin-top:20px;" class="form-control" id="sharetext" name="text" placeholder="Say something about this" rows="4"></textarea>
                                  </div>

                                  <div id="content_of_share" style="padding: 12px 0px 12px 0px;border: 1px solid #ccc;margin-top: 12px;border-radius: 2px;">
                                    <div class="row">
                                          <div class="col-md-12">
                                            <span id="userimg"></span>
                                            <span id="userName"></span>
                                          </div>
                                           <div  class="col-md-12" style="margin-top: 10px;padding: 0px 30px 0px 30px;">
                                             <span id="contented"></span>
                                           </div>
                                    </div>
                                  </div>
                            </div>
                      <!-- [end modal body] -->

                      <!-- [start modal fotter] -->
                          <div class="modal-footer" style="padding: 0px 11px 9px 20px;">
                        <div class="row">
                          <div class="col-md-6">
                           <span id="permi">
                            <select id="statusPermissions"
                            class="form-control select privacy-dropdown pull-right"
                                    placeholder="Shared Public">
                                <option value="1" style="text-align:left!important;">Public</option>
                                <option value="2" style="text-align:left;">Friends</option>
                                <option value="3" style="text-align:left;">Only me</option>
                            </select>
                            </span>
                          </div>
                          <div class="col-md-6">
                            <button type="button" class="btn btn-sm  btn-post btn-success no-margin" onclick="sharepost();">Post</button>
                            <button type="button" class="btn btn-sm  btn-default btn-info no-margin" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                      <!-- [end modal fotter] -->

                    </div>
                  </div>
                </div>
<!-- [ share modal end] -->




<script>
    $(function () {
        $("#upload_link").on('click', function (e) {
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });

</script>
<style>
    #upload{
        display:none
    }

    /*    #imagePreview {
        width: 180px;
        height: 180px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }*/
</style>
