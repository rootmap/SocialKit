<?php $donation_id = $obj->GenerateUniqueTransaction(@$_SESSION['SESS_DONATION'], "DONATION", 0); ?>
<input type="hidden" id="donate_user_donation_type" value="0" />
<input type="hidden" id="donate_user_first_name" value="" />
<input type="hidden" id="donate_user_last_name" value="" />
<input type="hidden" id="donate_user_address" value="" />
<input type="hidden" id="donate_user_City_Town" value="" />
<input type="hidden" id="donate_select_city" value="" />
<input type="hidden" id="donate_Preferred_Email_Address" value="" />
<input type="hidden" id="donate_Personal" value="" />
<input type="hidden" id="donate_Phone_Number" value="" />
<input type="hidden" id="donate_select_Home" value="" />
<input type="hidden" id="donate_NameOnCard" value="" />
<input type="hidden" id="donate_CardNumber" value="" />
<input type="hidden" id="donate_select_month" value="" />
<input type="hidden" id="donate_select_year" value="" />
<input type="hidden" id="donate_Group_Type" value="" />
<input type="hidden" id="donate_Group_Or_Business_Name" value="" />
<input type="hidden" id="donate_Search" value="" />
<input type="hidden" id="donate_why_donation" value="" />
<input type="hidden" id="donate_select_money_symbol" value=""/>
<input type="hidden" id="donate_amount_pay" value=""/>



<script>
    $(document).ready(function () {

//        $('#step-2').hide('slow');
//        $('#step-3').hide('slow');
//        $('#step-4').hide('slow');
//        $('#step-5').hide('slow');

        $('#OpM').click(function () {
            var whyneeded = $("#why_donation").val();
            var currency = $("#select_money_symbol").val();
            var amount = $("#Inputmoney_amnt").val();
            if (whyneeded != '' && currency != '' && amount != '') {
                $("#myModaldif").modal('show');
//            $('#step-2').hide('slow');
//                $('#step-1').show('slow');


                $("#donate_why_donation").val(whyneeded);
                $("#donate_select_money_symbol").val(currency);
                $("#donate_amount_pay").val(amount);

            }
            else {
                alert('Please Fill up Field');
            }
        });

        $('#step-2-btn').click(function () {

            var whyneeded = $("#why_donation").val();
            var currency = $("#select_money_symbol").val();
            var amount = $("#exampleInputmoney").val();
            var first_name = $("#exampleFirstName").val();
            var last_name = $("#exampleLastName").val();
            var address = $("#exampleStreetAddress").val();
            var City_Town = $("#exampleCity_Town").val();
            var Preferred_select_city = $("#select_city").val();

            if (first_name != '' && last_name != '' && address != '' && City_Town != '' && Preferred_select_city != '') {
                $('#step-1').hide('slow');
                $('#step-2').show('slow');


                $("#donate_why_donation").val(whyneeded);


                $("#donate_select_money_symbol").val(currency);


                $("#donate_amount_pay").val(amount);



                $("#donate_user_first_name").val(first_name);


                $("#donate_user_last_name").val(last_name);


                $("#donate_user_address").val(address);


                $("#donate_user_City_Town").val(City_Town);


                $("#donate_select_city").val(Preferred_select_city);

            }
            else {
                alert('Please Fill up Field');
            }
        });





        $("#step_8_skip").click(function () {

            $('#step-1').hide('slow');
            $('#step-2').hide('slow');
            $('#step-3').show('slow');

            var first_name = $("#exampleFirstName").val();
            $("#donate_user_first_name").val(first_name);

            var last_name = $("#exampleLastName").val();
            $("#donate_user_last_name").val(last_name);

            var address = $("#exampleStreetAddress").val();
            $("#donate_user_address").val(address);

            var City_Town = $("#exampleCity_Town").val();
            $("#donate_user_City_Town").val(City_Town);

            var Preferred_select_city = $("#select_city").val();
            $("#donate_select_city").val(Preferred_select_city);



        });




        $('#step-3-btn').click(function () {
            var Preferred_Email = $("#PreferredEmailAddress").val();
            var Preferred_Personal = $("#Personal").val();
            var PhoneNumber = $("#Phone_Number").val();
            var selectHome = $("#select_Home").val();
            if (Preferred_Personal != '' && PhoneNumber != '' && selectHome != '') {

                $('#step-1').hide('slow');
                $('#step-2').hide('slow');
                $('#step-3').show('slow');


                $("#donate_Preferred_Email_Address").val(Preferred_Email);
                $("#donate_Personal").val(Preferred_Personal);
                $("#donate_Phone_Number").val(PhoneNumber);
                $("#donate_select_Home").val(selectHome);
            }
            else
            {
                alert('Please Fill up Field');
            }
        });

//        $('#//step-3-btn').click(function () {
//            $('#step-1').hide('slow');
//            $('#step-2').hide('slow');
//            $('#step-3').show('slow');
//
//            var Preferred_Email = $("#PreferredEmailAddress").val();
//            $("#donate_Preferred_Email_Address").val(Preferred_Email);
//
//            var Preferred_Personal = $("#Personal").val();
//            $("#donate_Personal").val(Preferred_Personal);
//
//            var PhoneNumber = $("#Phone_Number").val();
//            $("#donate_Phone_Number").val(PhoneNumber);
//
//            var selectHome = $("#select_Home").val();
//            $("#donate_select_Home").val(selectHome);
//
//        });


        $('#step-7-btn').click(function () {

            $('#step-1').hide('slow');
            $('#step-2').hide('slow');
            $('#step-3').show('slow');

            var Preferred_Email = $("#PreferredEmailAddress").val();
            $("#donate_Preferred_Email_Address").val(Preferred_Email);

            var Preferred_Personal = $("#Personal").val();
            $("#donate_Personal").val(Preferred_Personal);

            var PhoneNumber = $("#Phone_Number").val();
            $("#donate_Phone_Number").val(PhoneNumber);

            var selectHome = $("#select_Home").val();
            $("#donate_select_Home").val(selectHome);

        });



        $('#step-5-btn').click(function () {
            $('#step-1').hide('slow');
            $('#step-2').show('slow');
            $('#step-3').hide('slow');
            $('#step-4').hide('slow');
            $('#step-5').hide('slow');

            var Group_Type = $("#GroupType").val();
            $("#donate_Group_Type").val(Group_Type);

            var Group_Or_Business_Name = $("#GroupOrBusinessName").val();
            $("#donate_Group_Or_Business_Name").val(Group_Or_Business_Name);


        });

        $('#step-6-btn').click(function () {
            $('#step-1').hide('slow');
            $('#step-2').show('slow');
            $('#step-3').hide('slow');
            $('#step-4').hide('slow');
            $('#step-5').hide('slow');

            var Group_Type = $("#GroupType").val();
            $("#donate_Group_Type").val(Group_Type);

            var Group_Or_Business_Name = $("#GroupOrBusinessName").val();
            $("#donate_Group_Or_Business_Name").val(Group_Or_Business_Name);


        });

        $("#step_5_finish").click(function () {

            var Search_user = $("#Search_user").val();
            //console.log(Search_user);
            if (Search_user != '')
            {
                var Search_submit = $("#Search").val();
                $("#donate_Search").val(Search_submit);
                $('#step-1').hide('slow');
                $('#step-2').show('slow');
                $('#step-3').hide('slow');
                $('#step-4').hide('slow');
                $('#step-5').hide('slow');
            }
            else
            {
                alert(" Please check box!");
            }


        });


        $("#step_5_skip").click(function () {

            $('#step-1').hide('slow');
            $('#step-2').hide('slow');
            $('#step-3').show('slow');
            $('#step-5').hide('slow');
            var Preferred_Email = $("#PreferredEmailAddress").val();
            $("#donate_Preferred_Email_Address").val(Preferred_Email);

            var Preferred_Personal = $("#Personal").val();
            $("#donate_Personal").val(Preferred_Personal);

            var PhoneNumber = $("#Phone_Number").val();
            $("#donate_Phone_Number").val(PhoneNumber);

            var selectHome = $("#select_Home").val();
            $("#donate_select_Home").val(selectHome);



        });




        $('#btn-Previous1').click(function () {
            $('#step-2').hide('slow');
            $('#step-3').hide('slow');
            $('#step-4').hide('slow');
            $('#step-5').hide('slow');
            $('#step-1').show('slow');
            $('#step_id_start').show('slow');
            checkboxcheck();
            console.log(1);
        });

        $('#btn-Previous2').click(function () {
            $('#step-3').hide('slow');

            $('#step-4').hide('slow');


            $('#step-2').show('slow');
            //checkboxcheck();
        });

        $('#btn-Previous3').click(function () {
            $('#step-4').hide('slow');
            $('#step-3').show('slow');
            checkboxcheck();
        });


//skip individual Previous button start
        $('#btn-Previous22').click(function () {
            $('#step-1-final').hide('slow');
            $('#step-2').hide('slow');

            $('#step-3').hide('slow');

            $('#step-4').hide('slow');

            $('#step-5').hide('slow');
            $('#step-1').show('slow');
            //checkboxcheck();
        });
        checkboxcheck();
        console.log(1);

//skip individual Previous button end



        //radio button validation

        //radio button validation

    });



    function checkboxcheck()
    {
        if (document.getElementById('donate_user_step_1').checked)
        {
            $('#step_id_start').show();
            $('#step-5').hide();
            var st1 = $("#donate_user_step_1").val();
            $("#donate_user_donation_type").val(st1);
        }
        else if (document.getElementById('donate_user_step_4').checked)
        {
            $("#step_id_start").hide();
            $('#step-5').hide();
            $('#step-4').show();
            var st1 = $("#donate_user_step_4").val();
            $("#donate_user_donation_type").val(st1);
        }
        else if (document.getElementById('donate_user_step_5').checked)
        {
            $("#step_id_start").hide();
            $('#step-4').hide();
            $('#step-5').show();
            var st1 = $("#donate_user_step_5").val();
            $("#donate_user_donation_type").val(st1);
        }

    }


    function save()
    {
        var first_name = $("#donate_user_first_name").val();
        var last_name = $("#donate_user_last_name").val();
        var address = $("#donate_user_address").val();
        var City_Town = $("#donate_user_City_Town").val();
        var select_city = $("#donate_select_city").val();
        var Email_Address = $("#donate_Preferred_Email_Address").val();
        var Personal = $("#donate_Personal").val();
        var Phone_Number = $("#donate_Phone_Number").val();
        var select_Home = $("#donate_select_Home").val();
        var NameOnCard = $("#donate_NameOnCard").val();
        var CardNumber = $("#donate_CardNumber").val();
        var month = $("#donate_select_month").val();
        var year = $("#donate_select_year").val();
        var Group_Type = $("#donate_Group_Type").val();
        var Group_Or_Business_Name = $("#donate_Group_Or_Business_Name").val();
        var Search = $("#donate_Search").val();
        var disabled_Select = $("#donate_why_donation").val();
        var Select_money_symbol = $("#select_money_symbol").val();
        var amount_pay = $("#Inputmoney_amnt").val();

        $.post("./lib/donate.php", {'st': 1, 'first_name': first_name,'donation_id':'<?php echo $donation_id; ?>', 'last_name': last_name, 'address': address, 'City_Town': City_Town,
            'useselect_cityr': select_city, 'Email_Address': Email_Address, 'Personal': Personal, 'Phone_Number': Phone_Number,
            'select_Home': select_Home, 'NameOnCard': NameOnCard, 'CardNumber': CardNumber, 'month': month, 'year': year,
            'Group_Type': Group_Type, 'Group_Or_Business_Name': Group_Or_Business_Name, 'Search': Search,
            'why_donation': disabled_Select, ' Select_money_symbol': Select_money_symbol, 'amount_pay': amount_pay}, function (data) {
            //alert(data);
            $("#labelfordonationmsg").html("<label>Donation Record Successfully Saved</label>");
            window.location.replace("./processing.php?total=" + amount_pay);
            //$("#myModaldif").modal('hide');
        });

        //$("#myModaldif").modal('hide');

    }


</script>



<!-- user search start -->
<script type="text/javascript">
    $('document').ready(function () {
        $('#Search_user').keyup(function () {
//                                                                    $('#legacy_contact').hide();
//                                                                    $('#legacy_contact_defult').hide();
            var countvaldubl = $(this).val().length;
            if (countvaldubl >= 4)
            {

                $.post("./lib/user_search.php", {'st': 2, 'search_dubl_data': $(this).val()}, function (datadubl) {
                    //alert(datadubl);
                    $('#user_suggestion').show();
                    var datacldubl = jQuery.parseJSON(datadubl);
                    var optdubl = datacldubl.datadubl;
                    $('#user_suggestion').html(optdubl);
                    $.ajaxSetup({cache: false});
                });

            }
            else if (countvaldubl == 0)
            {
                $('#user_suggestion').hide();
//                                                                        $('#legacy_contact_defult').show();
                //location.reload();
            }
        });

    });
</script>

<script type="text/javascript">

</script>


<!--user search end-->

<!-- Modal -->
<div class="modal fade" id="myModaldif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:50px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-left">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Donate for Dostums: <span id="labelfordonationmsg"></span></h4>
            </div>
            <div class="modal-body">


                <!--Step-01 starts here--> 

                <fieldset id="step-1">
                    <?php
                    $sql_udt = $obj->FlyQuery("SELECT a.*,concat(a.present_address,' ',a.permanent_address) as address,concat(a.first_name,' ',a.last_name) as name, IFNULL(a.city_id,'none') as city_id, a.country_id, IFNULL(dc.country_name,'none') as country_name, a.blood_group, IFNULL(dbg.name,'none') as blood_group, dua.about_short,dua.about_long,dua.occupation,dua.company, dei.school,dei.college,dei.university1,dei.university2 FROM dostums_user as a left JOIN dostums_country as dc ON dc.id=a.`country_id` left JOIN dostums_blood_group as dbg ON dbg.id=a.`blood_group` LEFT JOIN dostums_user_about as dua on dua.user_id=a.id LEFT JOIN dostums_educational_institutions as dei on dei.user_id=a.id WHERE a.id='" . $input_by . "'");
                    if (!empty($sql_udt)) {
                        foreach ($sql_udt as $rowsud):
                            ?>


                            <div class="form-group text-center">
                                <label>Primary Contact Person&nbsp (Step-1/3):</label>
                            </div>

                            <div class="col-sm-12">
                                <label class="col-md-4">
                                    <input name="radios" onclick="checkboxcheck()" id="donate_user_step_1" value="1"    type="radio">
                                    individual
                                </label>
                                <label class="col-md-4">
                                    <input name="radios" onclick="checkboxcheck()" id="donate_user_step_4" value="2"  type="radio">
                                    group's

                                </label>
                                <label class="col-md-4">
                                    <input name="radios" onclick="checkboxcheck()" id="donate_user_step_5" value="3"  type="radio">
                                    multiple  person
                                </label>
                            </div>

                            <div id="show_place">
                                <div class="first_page" id="step_id_start" style="clear: both; display: none;">

                                    <div class="form-group">

                                        <label for="exampleFirstName">First Name</label>
                                        <input type="text" class="form-control" id="exampleFirstName" value="<?php echo $rowsud->first_name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleLastName">Last Name</label>
                                        <input type="text" class="form-control" id="exampleLastName" value="<?php echo $rowsud->last_name; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleStreetAddress">Street Address</label>
        <!--                                        <textarea name="address" class="form-control" id="exampleStreetAddress" value="<?php //echo $rowsud->present_address;                              ?>"></textarea>-->
                                        <input type="text"  name="address" class="form-control" id="exampleStreetAddress" value="<?php echo $rowsud->present_address; ?>"> 

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleCity_Town">City/Town</label>
                                        <input type="text" class="form-control" id="exampleCity_Town" placeholder="City/Town">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleCity/Town">City/Town</label>
                                        <select class="form-control" id="select_city">
                                            <option>Dhaka</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button id="step-2-btn" type="button" class="btn btn-success">Next</button>
                                        <button id="skip-1-btn" type="button" class="btn btn-info">Skip</button>
                                    </div>
                                </div>  
                            </div>
                        </fieldset>

                        <script>
                            $(document).ready(function () {
                                $("#skip-1-btn").click(function () {
                                    $("#step-1").hide('slow');
                                    $("#step-1-final").show('slow');
                                });
                            });
                        </script>


                        <fieldset id="step-4" style="display: none;">

                            <div class="second_page" style="clear:both;">
                                <div class="col-lg-12" style="margin-left:0px; padding-left:0px;">

                                    <div class="form-group">
                                        <label for="GroupType" class="control-label">Group Name</label>


                                        <select class="form-control" id="GroupType" name="group_id">
                                            <?php
                                            $sqlgroup = $obj->FlyQuery("SELECT group_id,name FROM dostums_group");
                                            if (count($sqlgroup) >= 0):
                                                ?>
                                                <?php foreach ($sqlgroup as $groupsty): ?>
                                                    <option  value="<?php echo $groupsty->group_id; ?>">
                                                        <?php echo $groupsty->name; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="GroupOrBusinessName">Donation Submitted By </label>
                                        <input type="text" class="form-control" value="<?php echo $dostums_user_name; ?>" id="GroupOrBusinessName" placeholder="Group Or Business Name">
                                    </div>
                                    <div class="form-group">

                                        <button type="button" class="btn btn-primary" id="btn-Previous3">Previous</button>
                                        <button id="step-5-btn" type="button" class="btn btn-success">Next</button>
                                        <button id="step-6-btn" type="button" class="btn btn-info">Skip</button>
                                    </div>
                                </div>

                            </div>

                        </fieldset>

                        <fieldset id="step-5" style="display: none;">
                            <div class="form-group col-lg-12">
                                <label class="col-md-8">Multiple's Person</label>
                                <input type="text" class="form-control" placeholder="Search" id="Search_user">
                                <div id="user_suggestion" class="col-md-9" style="clear: both;"></div>


                            </div>
                            <script type="text/javascript">
                                function DonateMultiUserDelete(donation_id, user_id,id)
                                {
                                    $.post("./lib/user_search.php", {"st": 4, "donation_id": donation_id, "user_id": user_id}, function (data) {
                                            $("#dmud_" + id).hide("slow");
                                    });
                                    //alert(donation_id);
                                }
                            </script>
                            <?php
                            
                            $sqldonateuser = $obj->FlyQuery("SELECT a.id,a.user_id,u.name,a.donation_id FROM `dostums_donate_multiple_person` as a 
                            LEFT JOIN (SELECT id,name FROM dostums_user_view) as u on u.id=a.user_id
                            WHERE a.`donation_id`='".$donation_id."'");
                            if (!empty($sqldonateuser)) {
                                ?>
                            <div class="form-group col-lg-12" id="donatemu">
                                    <?php foreach ($sqldonateuser as $user): ?>
                                    <label id="dmud_<?php echo $user->id; ?>" style="border: 1px #CCC solid; margin: 3px; padding: 3px 15px 3px 3px; border-radius:2px;"> <?php echo $user->name; ?> 
                                        <i class="fa fa-close" onclick="DonateMultiUserDelete('<?php echo $user->donation_id; ?>','<?php echo $user->user_id; ?>','<?php echo $user->id; ?>')" style="position: absolute; cursor: pointer; margin-top: -3px; margin-left:3px; color: #F00;"></i></label>
                                    <?php endforeach; ?> 
                                </div>
                                <?php }else{  ?>
                            <div class="form-group col-lg-12" id="donatemu"></div>
                                <?php } ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary pull-left" id="btn-Previous4">Previous</button>
                                <button type="submit" id="step_5_finish" class="btn btn-success pull-left">Next</button>
                                <button type="button" id="step_5_skip" class="btn btn-info pull-left">skip</button>

                            </div>

                        </fieldset>


                        <!--Step-01 ends here-->

                        <!--Step-02 starts here-->
                        <fieldset id="step-2" style="display: none;">
                            <div class="form-group">
                                <label for="PreferredEmailAddress">Preferred Email Address</label>
                                <input type="text" class="form-control" id="PreferredEmailAddress" value="<?php echo $rowsud->email; ?>">
                            </div>
                            <div class="form-group" >
                                <select class="form-control" id="Personal">
                                    <option>Personal</option>
                                    <option>Business</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" id="Phone_Number" value="<?php echo $rowsud->phone_number; ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="select_Home">
                                    <option>Home</option>
                                    <option>Business</option>
                                    <option>Mobile</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="btn-Previous1">Previous</button>
                                <button id="step-3-btn" type="button" class="btn btn-success">Next</button>
                                <button id="step-7-btn" type="button" class="btn btn-info">Skip</button>
                            </div>
        <?php
    endforeach;
}
?>

                </fieldset>

                <!--Step-02 ends here-->


                <!--Step-03 start-->
                <fieldset id="step-3" style="display: none;">
                    <label style="font-size: 18px; font-weight: bolder;">Payment Method</label>


                    <div class="col-lg-12">

                        <label class="col-md-12">
                            <input type="radio"   name="optionsRadios" id="ssl_multi" value="1">

                            <a href="#">Online Via SSL</a>
                        </label>


                    </div>
                    <div class="clearfix" style="margin-top: 30px;"></div>
                    <label style="font-size: 18px; font-weight: bolder;">Payment Detail</label>


                    <div class="col-lg-12">
                        <script>
                            $(document).ready(function () {
                                $("#OpM").click(function () {
                                    var getAmount = $("#Inputmoney_amnt").val();
                                    if (getAmount != null)
                                    {
                                        $("#dam").html(getAmount);
                                    }

                                    var getCurrency = $("#select_money_symbol").val();
                                    if (getCurrency != null)
                                    {
                                        var getselectvalue = $("#select_money_symbol option[value=" + getCurrency + "]").html();
                                        $("#anm").html(getselectvalue);
                                    }

                                    var getPlace = $("#why_donation").val();
                                    if (getPlace != null)
                                    {
                                        var getselectvalueplace = $("#why_donation option[value=" + getPlace + "]").html();
                                        $("#bsm").html(getselectvalueplace);
                                    }
                                    //alert(getAmount);
                                });

                            });
                        </script>

                        <label class="col-md-12">
                            Donate Amount : <span id="dam"></span>
                        </label>
                        <label class="col-md-12">
                            Donate Currency : <span id="anm">66333</span>
                        </label>
                        <label class="col-md-12">
                            Donate Place : <span id="bsm">560</span>
                        </label>


                    </div>

                    <div class="first_page" style="clear: both;">

                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-previous" id="btn-Previous2">Previous</button>
                            <button id="finishmultidonation" type="button"   class="btn btn-success">Finish & Save Donation Info</button>
                            <script>
                                $(document).ready(function () {
                                    $("#finishmultidonation").click(function () {
                                        var donation_amount = $("#dam").html();
                                        var donation_Currency = $("#anm").html();
                                        var donation_Place = $("#bsm").html();
                                        // alert(donation_amount+", "+donation_Currency+", "+donation_Place);
                                        if (document.getElementById("ssl_multi").checked == true)
                                        {
                                            //save all data
                                            
                                            save();
                                            
                                            
                                        }
                                        else
                                        {
                                            alert("Please Check Payment Method.");
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>

                </fieldset>
                <!--Step-03 end-->
                <!--Step-03 skip individual start-->
                <fieldset id="step-1-final" style="display: none;">
                    <label style="font-size: 18px; font-weight: bolder;">Payment Method</label>


                    <div class="col-lg-12">

                        <label class="col-md-12">
                            <input type="radio"   name="optionsRadios" id="ssl_multi" value="1">

                            <a href="#">Online Via SSL</a>
                        </label>


                    </div>
                    <div class="clearfix" style="margin-top: 30px;"></div>
                    <label style="font-size: 18px; font-weight: bolder;">Payment Detail</label>


                    <div class="col-lg-12">
                        <script>
                            $(document).ready(function () {
                                $("#OpM").click(function () {
                                    var getAmount = $("#Inputmoney_amnt").val();
                                    if (getAmount != null)
                                    {
                                        $("#dam").html(getAmount);
                                    }

                                    var getCurrency = $("#select_money_symbol").val();
                                    if (getCurrency != null)
                                    {
                                        var getselectvalue = $("#select_money_symbol option[value=" + getCurrency + "]").html();
                                        $("#anm").html(getselectvalue);
                                    }

                                    var getPlace = $("#why_donation").val();
                                    if (getPlace != null)
                                    {
                                        var getselectvalueplace = $("#why_donation option[value=" + getPlace + "]").html();
                                        $("#bsm").html(getselectvalueplace);
                                    }
                                    //alert(getAmount);
                                });

                            });
                        </script>

                        <label class="col-md-12">
                            Donate Amount : <span id="dam"></span>
                        </label>
                        <label class="col-md-12">
                            Donate Currency : <span id="anm">66333</span>
                        </label>
                        <label class="col-md-12">
                            Donate Place : <span id="bsm">560</span>
                        </label>


                    </div>

                    <div class="first_page" style="clear: both;">

                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-previous" id="btn-Previous22">Previous</button>
                            <button id="finishmultidonation" type="button"   class="btn btn-success">Finish & Save Donation Info</button>
                            <script>
                                $(document).ready(function () {
                                    $("#finishmultidonation").click(function () {
                                        var donation_amount = $("#dam").html();
                                        var donation_Currency = $("#anm").html();
                                        var donation_Place = $("#bsm").html();
                                        // alert(donation_amount+", "+donation_Currency+", "+donation_Place);
                                        if (document.getElementById("ssl_multi").checked == true)
                                        {
                                            save();
                                        }
                                        else
                                        {
                                            alert("Please Check Payment Method.");
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>

                </fieldset>
                <!--Step-03 skip individual end-->


                <!--step-05 start-->

                <!--step-05 end--> 
            </div>
        </div>
    </div>
</div>
