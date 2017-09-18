<!-- jQuery ui tagging and auto suggestion scripts end -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:20px !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Create New Group&nbsp;:</strong></h4>
            </div>
            <script>
                $(document).ready(function (e) {
                    $('#step2_button').click(function (e) {
                        var emptyflag = false;
                        var group_name = $('#group-name-create').val();
                        var privacya = '';
                        if (document.getElementById('optionsRadios_0').checked)
                        {
                            var privacya = 1;
                        }
                        else if (document.getElementById('optionsRadios_1').checked)
                        {
                            var privacya = 2;
                        }
                        else if (document.getElementById('optionsRadios_2').checked)
                        {
                            var privacya = 3;
                        }
                        else
                        {
                            alert("Please Select Your Privacy Setting");
                            var privacya = '';
                        }
                        if (group_name == "") {
                            emptyflag = true;
                        }
                        console.log(privacya + " " + group_name);

                        if (privacya != "")
                        {

                            $.post("./lib/group.php", {'st': 1, 'group_name': group_name, 'fly_id': $('#fly_id').val(), 'privacy': privacya}, function (data)
                            {
                                var datacl = jQuery.parseJSON(data);
                                var group_id = datacl.group_id;
                                var status = datacl.status;
                                if (status == 1)
                                {
                                    $('#step1').hide();
                                    $('#step2').show('slow');
                                    $('#conglomarate').attr('class', group_id);
                                    //var group_id=$('#conglomarate').attr('class');
                                }
                                else
                                {
                                    alert('Failed, Please try again after reloading page.');
                                    location.replace("./<?php echo $obj->filename(); ?>");
                                }
                            });

                        }

                    });

                    $('#group_icon').click(function (e) {
                        var group_id = $('#conglomarate').attr('class');
                        //var icon_id=$(this).attr('name');
                        console.log(group_id);
                    });

                    $('#step3_button').click(function (e) {
                        //$('#step2').hide('slow');
                        $('#step3').show('slow');
                        //location.replace("./group.php");
                    });

                    $('#finish').click(function (e) {
                        $('#step3').hide('slow');
                        var conglomarate = $('#conglomarate').attr('class');
                        location.replace("./group.php?group_id=" + conglomarate);
                    });
                });
            </script>

            <div class="modal-body">
                <!--Create Group SignUP Form-->
                <form role="form" action="" method="post" class="registration-form">

                    <fieldset id="step1">
                        <!--<div class="form-top">
                          <div class="form-top-left">
                               <h3>Step 1 / 3</h3>
           
                               <p>Tell us about your group:</p>
                           </div>
                           <div class="form-top-right">
                               <i class="fa fa-user"></i>
                           </div>
                       </div>-->
                        <div class="form-bottom">
                            <div class="form-group">
                                <center><label class="control-label"><h4><strong>Step 1 / 3 (Tell us about your group)&nbsp;:</strong></h4></label></center></br>
                                <label class="control-label" for="form-first-name">Group name</label>
                                <input type="text" name="form-first-name" placeholder="what is your group name?"
                                       class="form-first-name form-control" id="group-name-create">
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-last-name">Members</label><br>
                                <div id="addedsignupmember" style="padding-left: 0px; margin-bottom: 5px;"></div>
                                <input type="text" id="tags" name="group-members" placeholder="who do you want to add to the group?" class="form-control">
                            </div>
                            <?php

                            function groupflygenerate() {
                                if (!$_SESSION['SESS_FLY_GENMEM']) {
                                    $_SESSION['SESS_FLY_GENMEM'] = time();
                                    $newsess = $_SESSION['SESS_FLY_GENMEM'];
                                } else {
                                    $newsess = $_SESSION['SESS_FLY_GENMEM'];
                                }

                                return $newsess;
                            }
                            ?>
                            <input type="hidden" value="<?php echo groupflygenerate(); ?>" id="fly_id">
                            <script>
                                $('document').ready(function (e) {
                                    $('#tags').keyup(function (e) {
                                        var countval = $(this).val().length;
                                        if (countval >= 4)
                                        {
                                            var unique_id = $('#fly_id').val();
                                            $.post("./lib/search_friends.php", {'st': 2, 'search_data': $(this).val(), 'unique_id': unique_id}, function (fetch) {
                                                var datacl = jQuery.parseJSON(fetch);
                                                var opt = datacl.data;
                                                $('#suggestion_group').html(opt);
                                                //$('#loading').hide();
                                                $.ajaxSetup({cache: false});
                                            });



                                        }
                                        else if (countval == 0)
                                        {
                                            $('#suggestion_group').hide();
                                            //$('#loading').hide();
                                        }
                                    });

<?php
if (isset($_SESSION['SESS_FLY_GENMEM'])) {
    ?>
                                        autoloadmemberflygen();
    <?php
}
?>

                                });


                                function signupaddgroupmem(user_id, reqtype)
                                {
                                    var unique_id = $('#fly_id').val();
                                    load_data_mem_signup = {'st': 4, 'usrid': user_id, 'unique_id': unique_id};
                                    $.post('lib/group.php', load_data_mem_signup, function (data) {
                                        var datafly = jQuery.parseJSON(data);
                                        var status = datafly.status;
                                        if (status == 1)
                                        {
                                            $('#searchgrmem_' + user_id).hide('slow');
                                            autoloadmemberflygen();
                                        }
                                        else
                                        {
                                            $('#searchgrmem_' + user_id).hide('slow');

                                        }

                                    });
                                }

                                function closeflygrmem(id)
                                {
                                    var unique_id = $('#fly_id').val();
                                    var c = confirm('Are You Sure To Remove This Member ?');
                                    if (c == true)
                                    {
                                        $.post('lib/group.php', {'st': 6, 'unique_id': unique_id, 'id': id}, function (deldata) {

                                            var datacldel = jQuery.parseJSON(deldata);
                                            var delstatus = datacldel.status;
                                            if (delstatus == 1)
                                            {
                                                $('#groupflymem_' + id).hide();
                                                autoloadmemberflygen();
                                            }

                                        });
                                    }

                                }

                                function autoloadmemberflygen()
                                {
                                    var unique_ids = $('#fly_id').val();
                                    $.post('lib/group.php', {'st': 5, 'unique_id': unique_ids}, function (datas) {
                                        var sdcl = jQuery.parseJSON(datas);
                                        var statusd = sdcl.status;
                                        if (statusd == 1)
                                        {
                                            var alllist = sdcl.alldata;
                                            $('#addedsignupmember').html(alllist);
                                        }
                                    });
                                }

                            </script>
                            <!-- START list group-->
                            <div class="list-group latest-user-group" id="suggestion_group"></div>
                            <!-- END list group-->
                            <div class="divider"></div>
                            <!--<div class="form-group">
                                <label class="control-label" for="form-last-name">Favourites</label>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="">
                                    Add this group to your favourites
                                  </label>
                                </div>
                            </div>
                            <div class="divider"></div>-->
                            <div class="form-group">
                                <label class="control-label" for="form-last-name">Privacy</label>
                            </div>
                            <?php
                            $sqlprivacy = $obj->FlyQuery("SELECT name,icon_class,detail FROM privacy_setting");
                            if (!empty($sqlprivacy))
                                $ps = 1;
                            $a = 0;
                            foreach ($sqlprivacy as $priv_sett):
                                ?>
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="public" id="optionsRadios_<?php echo $a; ?>" value="option1">
                                            <strong><i class="<?php echo $priv_sett->icon_class; ?> fa-lg" style="margin-right:10px;"></i><?php echo $priv_sett->name; ?>&nbsp;</strong>
                                            (<?php echo $priv_sett->detail; ?>)
                                        </label>
                                    </div>
                                </div>
                                <!--<div class="divider"></div>-->
                                <?php
                                if ($ps == 1) {
                                    $ps = 0;
                                    ?>
                                    <br />
                                    <?php
                                }


                                $ps++;
                                $a++;
                            endforeach;
                            ?>
                            <div class="divider"></div>

                            <button type="button" class="btn btn-primary btn-next" id="step2_button">Next</button>
                        </div>
                    </fieldset>

                    <fieldset id="step2">
                        <!--<div class="form-top">
                            <div class="form-top-left">
                                <h3>Step 2 / 3</h3>
            
                                <p>Set up your account:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>-->
                        <script>
                            $(document).ready(function (e) {
                                $('button[id=group_icon]').click(function (e) {
                                    var icon_id = $(this).attr('name');
                                    var conglomarate = $('#conglomarate').attr('class');
                                    $.post("lib/group.php", {'st': 2, 'icon_id': icon_id, 'group_id': conglomarate}, function (data) {
                                        if (data == 1)
                                        {
                                            alert('Your Group Icon Successfully Saved!!!');
                                            //location.replace("./group.php?group_id=" + conglomarate);
                                        }
                                        else
                                        {
                                            alert('Sorry!!! Failed. Please Try Again.');
                                        }
                                    });
                                });

                            });
                        </script>    
                        <div class="form-bottom">
                            <span id="conglomarate"></span>
                            <div class="form-group">
                                <center><label class="control-label"><h4><strong>Step 2 / 3 (Choose an icon for your group)&nbsp;:</strong></h4></label></center></br>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <?php
                                    $sqlicon = $obj->FlyQuery("SELECT id,name,class FROM dostums_group_icon");
                                    if (!empty($sqlicon))
                                        $i = 1;
                                    foreach ($sqlicon as $icon):
                                        ?>
                                        <button class="btn btn-default def_button2" type="button" name="<?php echo $icon->id; ?>" id="group_icon" title="<?php echo $icon->name; ?>"><i class="<?php echo $icon->class; ?> fa-1x"></i></button>

                                        <?php
                                        if ($i == 14) {
                                            $i = 0;
                                            ?>
                                            <br />
                                            <?php
                                        }


                                        $i++;
                                    endforeach;
                                    ?>

                                </fieldset>                                               
                            </div>
                            <button type="button" class="btn btn-info btn-previous">Previous</button>
                            <button type="submit" class="btn btn-primary btn-skip" id="skip">Skip</button>
                            <button type="submit" class="btn btn-success btn-next" id="step3_button">Next</button>
                        </div>
                    </fieldset>



                    <fieldset id="step3">
                        <script>
                            $(document).ready(function (e) {
                                $('#finish').click(function (e) {
                                    var group_des = $('#group_des').val();
                                    var group_addr = $('#group_addr').val();
                                    var group_phn = $('#group-phn').val();
                                    var web_addr = $('#group-web').val();
                                    var con_email = $('#group-email').val();
                                    var conglomarate = $('#conglomarate').attr('class');
                                    $.post("lib/group.php", {'st': 3, 'group_des': group_des, 'group_addr': group_addr, 'group_phn': group_phn, 'web_addr': web_addr, 'con_email': con_email, 'group_id': conglomarate}, function (data) {
                                        if (data == 1)
                                        {
                                            alert('Your Group Info Successfully Saved!!!');
                                            location.replace("./group.php?group_id=" + conglomarate);
                                        }
                                        else
                                        {
                                            alert('Sorry!!! Failed. Please Try Again.');
                                        }
                                    });
                                });

                            });
                        </script>



                        <div class="form-bottom">
                            <div class="form-group">
                                <center><label class="control-label"><h4><strong>Step 3 / 3 (Tell us about the group and its purpose)&nbsp;:</strong></h4></label></center>
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-last-name">Description</label>
                                <textarea class="form-control" rows="1" name="group_description" placeholder="Describe about your group, its value, purpose and interest" id="group_des"></textarea>
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-address">Address</label>
                                <textarea class="form-control" rows="1" name="group_address" placeholder="what is your mailing address?" id="group_addr"></textarea>
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-phone">Phone</label>
                                <input type="tel" name="group_phone" placeholder="what is your web address?" class="form-control" id="group-phn">
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-web-address">Web Address</label>
                                <input type="text" name="web_address" placeholder="what is your web address?" class="form-control" id="group-web">
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label class="control-label" for="form-contact-email">Contact Email</label>
                                <input type="email" name="contact_email" placeholder="what is your contact email?" class="form-control" id="group-email">
                            </div>
                            <div class="divider"></div>
                            <button type="button" class="btn btn-info btn-previous">Previous</button>
                            <button type="submit" class="btn btn-primary btn-skip" id="">Skip</button>
                            <button type="button" class="btn btn-success btn-next" id="finish">Next</button>
                        </div>
                    </fieldset>

                </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
