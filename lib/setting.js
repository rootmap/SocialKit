// JavaScript Document
$(document).ready(function () {

    $("#basic_info").click(function ()
    {
        $("#first_name_label").hide("slow");
        $('#first_name').show('slow');
        $('#first_name').css("border-bottom-color", "#09f");

        $('#last_name_label').hide("slow");
        $('#last_name').show('slow');
        $('#last_name').css("border-bottom-color", "#09f");

        $('#occupation_label').hide("slow");
        $('#occupation').show("slow");
        $('#occupation').css("border-bottom-color", "#09f");

        $('#company_label').hide("slow");
        $('#company').show('slow');
        $('#company').css("border-bottom-color", "#09f");

        $('#country_label').hide("slow");
        $('#country_id').show('slow');
        $('#country_id').css("border-bottom-color", "#09f");

        $('#city_label').hide("slow");
        $('#city_id').show('slow');
        $('#city_id').css("border-bottom-color", "#09f");

        $('#website_url_label').hide("slow");
        $('#website_url').show('slow');
        $('#website_url').css("border-bottom-color", "#09f");


        $('#basic_info_edit').css("display", "inline-block");
    });

    $("#basicsave").click(function ()
    {

        $('#basic_info_edit').html("Please Wait Your Changes Updating...");
        load_notification = {'st': 101, 'first_name': $('#first_name').val(), 'last_name': $('#last_name').val(),
            'occupation': $('#occupation').val(), 'company': $('#company').val(), 'country_id': $('#country_id').val(),
            'city_id': $('#city_id').val(), 'website_url': $('#website_url').val()};
        $.post('lib/setting.php', load_notification, function (data) {
            if (data != 0)
            {
                var datacl = jQuery.parseJSON(data);
                var firstname = datacl[0].first_name;
                var last_name = datacl[0].last_name;
                var email = datacl[0].email;
                var dob = datacl[0].dob;
                var occupation = datacl[0].occupation;
                var company = datacl[0].company;
                var country_id = datacl[0].country_id;
                var city_id = datacl[0].city_id;
                var website_url = datacl[0].website_url;

                $('#first_name').val(firstname);
                $('#last_name').val(last_name);
                $('#occupation').val(occupation);
                $('#company').val(company);
                $('#country_id').val(country_id);
                $('#city_id').val(city_id);
                $('#website_url').val(website_url);
                $('#basic_info_edit').css("display", "none");
                //console.log(city_id);
            }
            else
            {
                alert("Something Went Wrong Please retry Again");
            }
        });

    });

    $("#about_info").click(function ()
    {

        $('#about_short_label').hide("about_short");
        $('#about_short').show('about_short');
        $('#about_short').css("border-bottom-color", "#09f");

        $('#about_long_label').hide("about_long");
        $('#about_long').show('about_long');
        $('#about_long').css("border-bottom-color", "#09f");
        
        $('#about_info_edit').css("display", "inline-block");

    });

    $("#aboutsave").click(function ()
    {

        $('#about_info_edit').html("Please Wait Your Changes Updating...");
        load_notification = {'st': 202, 'about_short': $('#about_short').val(), 'about_long': $('#about_long').val()};
        $.post('lib/setting.php', load_notification, function (data2) {
            if (data2 != 0)
            {
                var datacl = jQuery.parseJSON(data2);
                var about_short = datacl[0].about_short;
                var about_long = datacl[0].about_long;


                $('#about_short').val(about_short);
                $('#about_long').val(about_long);
                $('#about_info_edit').css("display", "none");
                //console.log(city_id);
            }
            else
            {
                alert("Something Went Wrong Please retry Again");
            }
        });


    });

    $("#password_info").click(function ()
    
    {
     
        $('.retypebox').show('slow');
        $('#password').css("border-bottom-color", "#09f");
        
        //$('#retypebox').css("display", "inline-block");
        //$('#retypebox2').css("display", "inline-block");
        $('#currentpassword_label').html('Type Your Current Password');
        $('#password_info_edit').css("display", "inline-block");
        $('#password').val("");
        $('#newpassword').val("");
        $('#rnewpassword').val("");
        
    });

    $("#passwordsave").click(function ()
    {

        if ($('#password').val() == "")
        {
            alert('Password Should Not Be Empty, Please Type Your Current Password');
        }
        else
        {

            load_notification = {'st': 3, 'password': $('#password').val()};
            $.post('lib/setting.php', load_notification, function (data2) {
                if (data2 == 1)
                {

                    if ($('#newpassword').val() != $('#rnewpassword').val())
                    {
                        alert("New Password Mismatch with Re-type Password.");
                    }
                    else
                    {
                        load_notificationpassword = {'st': 303, 'xpassword': $('#password').val(), 'password': $('#newpassword').val()};
                        $.post('lib/setting.php', load_notificationpassword, function (data3) {
                            if (data3 == 1)
                            {
                                $('#password').val('********');
                                $('#password_info_edit').css("display", "none");
                                $('#password_info_process').html("Please Wait Your Changes Updating...");
                                alert('Password Changed Successfully');
                                //$('#retypebox').css("display", "none");
                                //$('#retypebox2').css("display", "none");
                                $('.retypebox').css("display", "none");
                                 $('#password_info_process').hide('slow');
                                $('#currentpassword_label').html('Your Current Password');
                               
                                //console.log(city_id);
                            }
                            else
                            {
                                alert("Something Went Wrong Please retry Again");
                            }
                        });
                    }
                }
                else
                {
                    alert("Current Password Mismatch With Existsing Password.");
                }
            });
        }
    });




});

function social(socialid)
{
    var d = new Date();
    var n = d.getTime();
    $('#social' + socialid).css("display", "none");
    if (socialid == 1)
    {
        var data = "<input type='text' name='" + socialid + "' id='" + n + "' style='margin-bottom:10px; width:130px; margin-right:5px; display:inline;' class='form-control' placeholder='Type Here' /><button type='button' style=' display:inline; margin-top:4px;' class='btn btn-info' onclick='editSocial(" + n + ")'>Save</button>";
    }
    else
    {
        var data = "<input type='text' name='" + socialid + "' id='" + n + "' style='margin-top:15px; width:130px;  margin-right:5px; display:inline;' class='form-control' placeholder='Type Here' /><button type='button'  style=' display:inline; margin-top:4px;' class='btn btn-info' onclick='editSocial(" + n + ")'>Save</button>";
    }
    $('#social1' + socialid).html(data);
}

function editSocial(socialid)
{
    var newsosa = $('#' + socialid).val();
    var exsosa = $('#' + socialid).attr("name");

    //alert(exsosa);
    $('#social1' + exsosa).html("Please Wait We Are Saving Your Data...");
    load_notification = {'st': 4, 'social_id': exsosa, 'social_identity': newsosa};
    $.post('lib/setting.php', load_notification, function (data2) {
        if (data2 != 0)
        {
            //var datacl=jQuery.parseJSON(data2);
            var newdata = "<span  onclick='social(" + exsosa + ")'>" + newsosa + "</span><button  id='social" + exsosa + "'  type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            $('#social1' + exsosa).html(newdata);
            //console.log(city_id);
        }
        else
        {
            alert("Something Went Wrong Please retry Again");
        }
    });
}