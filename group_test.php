<?php  
include('class/auth.php');
if(isset($_GET['user_id']))
{
	if($_GET['user_id']==$input_by)
	{
		$new_user_id=$input_by;
	}
	else
	{
		$new_user_id=$_GET['user_id'];
	}
}
else
{
	$new_user_id=$input_by;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dostums - Home </title>
<?php include('plugin/header_script.php'); ?>
</head>
<body>

<header>
    <div class="header-wrapper">

        <div class="header-nav">
            <?php include('plugin/header_nav.php'); ?>
        </div>
    </div>
</header>


<?php //chat box script
include('plugin/chat_box.php'); 
//chat box script ?>

<?php //chat user list
include('plugin/chat_box_head_list.php');
//chat user list ?>

<div class="main-container page-container section-padd">
    <div class="mailbox-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h4 class="pull-left page-title"><i class="mdi-action-settings"></i> settings
                    <span class="sub-text"> Manage My Profile  </span></h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Profile</a></li>
                        <li><a href="setting.php">Setting</a></li>
                        <li class="active">Privacy</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 ">

                    <div class="panel panel-default">
                        <div class="panel-body p-0">
                            <div class="list-group mail-list">
                                <a href="setting.php" class="list-group-item no-border active"><i
                                                class="mdi-action-settings-applications"></i>General </a>
                                        <a href="security_settings.php" class="list-group-item no-border"><i
                                                class="mdi-hardware-security"></i>Security </a>
                                <hr class="lihr">
                                <a href="privacy.php" class="list-group-item no-border active"><i
                                                class="mdi-action-settings-applications"></i>Privacy </a>
                                <a href="blocking.php" class="list-group-item no-border"><i class="mdi-content-block"></i>Blocking
                                </a> <a href="notifications.php" class="list-group-item no-border"><i
                                        class="mdi-social-notifications"></i>Notifications </a>
                                        
                                <a href="mobile.php" class="list-group-item no-border"><i
                                        class="mdi-social-notifications"></i>Mobile </a>
                                <a href="followers.php"     class="list-group-item no-border"><i
                                        class="mdi-social-people"></i>Followers
                                    <b>(354)</b></a>
                                <hr class="lihr">
                                <a href="dostums_ads.php"     class="list-group-item no-border"><i
                                        class="mdi-action-assignment"></i>Ads
                                    <b>(354)</b></a>

                                <a href="#"     class="list-group-item no-border"><i
                                        class="mdi-action-payment"></i>Payments
                                   </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">

                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Basic Information <small>You won't be able to change your name within the next 60 days</small></h5>
                                <div class="ibox-tools">
                                    <button class="def_button" id="basic_info" type="button">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <form class="">
                                    <fieldset>
      
                                        <script type="text/javascript">

                                            $(document).ready(function() {
    
                                                load_notification = {'st':1};
                                                     $.post('lib/setting.php', load_notification,  function(data) {
                                                        if(data!=0)
                                                        {
                                                            var datacl=jQuery.parseJSON(data);
                                                            var firstname=datacl[0].first_name;
                                                            var last_name=datacl[0].last_name;
                                                            var email=datacl[0].email;
                                                            var dob=datacl[0].dob;
                                                            var occupation=datacl[0].occupation;
                                                            var company=datacl[0].company;
                                                            //var country_id=datacl[0].country_id;
                                                            var city_id=datacl[0].city_id;
                                                            var website_url=datacl[0].website_url;
                                                            
                                                            $('#first_name').val(firstname);
                                                            $('#last_name').val(last_name);
                                                            $('#occupation').val(occupation);
                                                            $('#company').val(company);
                                                            //$('#country_id').val(country_id).selected;
                                                            $('#city_id').val(city_id);
                                                            $('#website_url').val(website_url);
                                                            $('#basic_info_edit').css("display","none");
                                                            //console.log(city_id);
                                                        }
                                                        else
                                                        {
                                                            alert("Something Went Wrong Please retry Again");
                                                        }
                                                     });                                                 
                                                
                                            });
                                        </script>
                                       
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <!-- Text input-->
                                                <div class="control-group ">
                                                    <label class="control-label" for="textinput">First Name</label>
                                                    <div class="controls">
                                                        <input id="first_name" name="textinput" value="Tanim" class=" form-control" type="text">
                                                        <p class="help-block hide">help</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- Text input-->
                                                <div class="control-group">
                                                    <label class="control-label" for="textinput">Last Name</label>
                                                    <div class="controls">
                                                        <input id="last_name" name="textinput" value="Ahmed" class=" form-control" type="text">
                                                        <p class="help-block hide">help</p>
                                                    </div>
                                                </div>
                                                </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="textinput">Occupation</label>
                                            <div class="controls">
                                                <input id="occupation" name="textinput" value="Senior UI/UX Engineer" class=" form-control" type="text">
                                                <p class="help-block hide">help</p>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label" for="textinput">Company</label>
                                            <div class="controls">
                                                <input id="company" name="textinput" value="Bluescheme Ltd." class=" form-control" type="text">
                                                <p class="help-block hide">help</p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <!-- Text input-->
                                                <div class="control-group ">
                                                    <label class="control-label" for="textinput">Location</label>
                                                    <div class="controls">
                                                        <select  class="form-control " name="country" id="country_id" >  
                                                            <option value="" class="form-option form-option-empty">All Countries</option> 
                                                            <?php 
                                                            $ucountry=$obj->SelectAllByVal("dostums_user","id",$input_by,"country_id");
                                                            $sqlcountry=$obj->SelectAll("dostums_country"); 
                                                            if(!empty($sqlcountry))
                                                            foreach ($sqlcountry as $country):
                                                            ?>
                                                            <option <?php if($ucountry==$country->id){ ?> selected <?php } ?> value="<?php echo $country->country_name; ?>" data-code="<?php echo $country->country_code; ?>" class="form-option"><?php echo $country->country_name; ?></option>    
                                                            <?php 
                                                            endforeach;
                                                            ?>
                                                        </select>
                                                        <p class="help-block hide">help</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- Text input-->
                                                <div class="control-group">
                                                    <label class="control-label" for="textinput"> &nbsp; </label>
                                                    <div class="controls">
                                                        <input id="city_id" name="location-sub" value="Dhaka" class=" form-control" type="text">
                                                        <p class="help-block hide">help</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="textinput">Website URL</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <div class="input-group-addon">http://</div>
                                                    <input type="text"  class="form-control" id="website_url" value="tanimdesign.net">
                                                </div>                                                <p class="help-block hide">help</p>
                                            </div>
                                        </div>

                                        <div id="basic_info_edit" class="form-group">
                                            <label class="control-label" for="textinput"></label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-success" id="basicsave">Save Change</button>
                                                </div>                                                
                                            </div>
                                        </div>




                                    </fieldset>
                                </form>

                            </div>
                        </div>

                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>About <small></small></h5>
                            <div class="ibox-tools">

                                <div class="ibox-tools">
                                    <button class="def_button" id="about_info" type="button">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="ibox-content">


                            <script type="text/javascript">

                                    $(document).ready(function() {

                                        load_notificationabout = {'st':2};
                                             $.post('lib/setting.php', load_notificationabout,  function(datad) {
                                                if(datad!=0)
                                                {
                                                    var datacl=jQuery.parseJSON(datad);
                                                    var about_short=datacl[0].about_short;
                                                    var about_long=datacl[0].about_long;
                                                    
                                                    
                                                    $('#about_short').val(about_short);
                                                    $('#about_long').val(about_long);
                                                    
                                                    $('#about_info_edit').css("display","none");
                                                    //console.log(city_id);
                                                }
                                                else
                                                {
                                                    alert("Something Went Wrong Please retry Again");
                                                }
                                             });                                                 
                                        
                                    });
                                </script>

                            <form class="">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label" for="textinput">About You</label>
                                        <div class="controls">
                                            <input id="about_short" name="textinput" value="About" class=" form-control" type="text">
                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Passion/Vission</label>
                                        <div class="controls">

                                            <textarea class="form-control" id="about_long" name="textarea">default text</textarea>

                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>

                                    <div id="about_info_edit" class="form-group">
                                        <label class="control-label" for="textinput"></label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-success" id="aboutsave">Save Change</button>
                                            </div>                                                
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>
                    </div>

                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Password <small></small></h5>
                            <div class="ibox-tools">

                                <div class="ibox-tools">
                                    <button class="def_button" id="password_info" type="button">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="ibox-content">

                            <form class="">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label" id="currentpassword_label" for="textinput">Current Password</label>
                                        <div class="controls">
                                            <input id="password" name="textinput" value="**********" class=" form-control" type="password">
                                            <p class="help-block hide">To Change Password Type Your Current Password</p>
                                        </div>
                                    </div>

                                    <div id="retypebox" class="form-group" style="display:none;">
                                        <label class="control-label" for="textinput">New Password</label>
                                        <div class="controls">
                                            <input id="newpassword" name="textinput" placeholder="New Password" class=" form-control" type="text">
                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>

                                    <div id="retypebox2" class="form-group" style="display:none;">
                                        <label class="control-label" for="textinput">Re-Type Password</label>
                                        <div class="controls">
                                            <input id="rnewpassword" name="textinput" placeholder="Re-Type New Password" class=" form-control" type="text">
                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>

                                    <div id="password_info_edit" class="form-group" style="display:none;">
                                        <label class="control-label" for="textinput"></label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <button type="button" style="margin-top:3px;" class="btn btn-success" id="passwordsave">Change Password</button>
                                            </div>                                                
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>
                    </div>


                    <!--<div class="ibox ">
                        <div class="ibox-title">
                            <h5>Education <small></small></h5>
                            <div class="ibox-tools">

                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="ibox-content">

                            <form class="">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Section Title</label>
                                        <div class="controls">
                                            <input id="section_title" name="textinput" value="Education " class=" form-control" type="text">
                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="textinput">Description</label>
                                        <div class="controls">

                                            <textarea class="form-control" id="description" name="textarea">BSc in Electrical & Electronics Engineering from Stamford University  </textarea>
                                            <p class="help-block hide">help</p>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>
                    </div>-->
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Social Link <small></small></h5>
                            <div class="ibox-tools">

                                <div class="ibox-tools">
                                    <button class="def_button" id="social_info" type="button">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="ibox-content">

                            <form class="">
                                <fieldset>
									
                                    <div class="form-group">
                                        <table class="table  table-social">
                                            <thead>
                                            <tr>
                                                <th><i class="fa fa-2x fa-twitter-square"></i> </th>
                                                <th> Twitter  </th>
                                                <th style="width:40%;"><span id="social11" class="1"><span  onclick="social('1')"><?php $s1=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","1","social_name");
												if($s1=="")
												{
													echo "Add Your ID/Name";	
												}
												else
												{
													echo $s1;	
												}
												 ?></span></span> <button id="social1" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><i class="fa fa-2x fa-linkedin-square"></i> </td>
                                                <td> linkedin  </td>
                                                <td>


                                                    <span  id="social12" class="2"><span  onclick="social('2')"><?php  $s2=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","2","social_name");
													if($s2=="")
													{
														echo "Add Your ID/Name";	
													}
													else
													{
														echo $s2;	
													}
													 ?></span></span>
                                                    <button  id="social2"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>

                                            </tr>

                                            <tr>
                                                <td><i class="fa fa-2x fa-facebook"></i> </td>
                                                <td> Facebook  </td>
                                                <td style="widtd: 100px">


                                                    <span  id="social13"  class="3"><span  onclick="social('3')"><?php  $s3=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","3","social_name"); 
													if($s3=="")
													{
														echo "Add Your ID/Name";	
													}
													else
													{
														echo $s3;	
													}
													?></span></span>


                                                    <button  id="social3"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>

                                            </tr>


                                            <tr>
                                                <td><i class="fa fa-2x fa-google-plus-square"></i> </td>
                                                <td>  Google+
                                                </td>
                                                <td >

                                                    <span  id="social14"  class="4"><span  onclick="social('4')"><?php  $s4=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","4","social_name"); 
													if($s4=="")
													{
														echo "Add Your ID/Name";	
													}
													else
													{
														echo $s4;	
													}
													?></span></span>



                                                    <button  id="social4"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                            </tr>


                                            <tr>
                                                <td><i class="fa fa-2x fa-youtube-square"></i> </td>
                                                <td>  YouTube
                                                </td>
                                                <td>    <span  id="social15"  class="5"><span  onclick="social('5')"><?php  $s5=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","5","social_name");
												if($s5=="")
												{
													echo "Add Your ID/Name";	
												}
												else
												{
													echo $s5;	
												}
												 ?></span></span>
                                                    <button  id="social5"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                            </tr>

                                            <tr>
                                                <td><i class="fa fa-2x fa-youtube-square"></i> </td>
                                                <td>  Viber
                                                </td>
                                                <td>   <span  id="social16" class="6"><span  onclick="social('6')"><?php  $s6=$obj->SelectAllByVal2("dostums_user_social_info","user_id",$input_by,"social_id","6","social_name");
												if($s6=="")
												{
													echo "Add Your ID/Name";	
												}
												else
												{
													echo $s6;	
												}
												 ?></span></span>
                                                    <button  id="social6"  type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></td>
                                            </tr>



                                            </tbody>
                                        </table>
                                    </div>



                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('plugin/fotter.php') ?>


    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="assets/material/dropdownjs/jquery.dropdown.js"></script>
    <script src="assets/material/js/ripples.min.js"></script>
    <script src="assets/material/js/material.min.js"></script>


    <script src="assets/js/jquery.scrollto.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/chat.js"></script>

    <script src="lib/setting.js"></script>
    
    

</body>
</html>