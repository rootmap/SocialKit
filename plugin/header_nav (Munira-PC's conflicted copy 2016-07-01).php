<style type="text/css">
	.main {
    width: 310px;
    margin-left: auto;
    margin-right: auto;
    }
	
	input {
		font-family: 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		font-size: 13px;
		color: #555860;
	}
	
	.search {
		position: relative;
		margin-left: 0px;
		width: 295px;
	}
	
	.search input {
		height: 35px;
		width: 100%;
		padding: 0 30px 0 5px;
		background: white url("http://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 270px 11px no-repeat;
		
		border-width: 1px;
		border-style: solid;
		border-color: #a8acbc #babdcc #c0c3d2;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		-ms-box-sizing: border-box;
		-o-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		-o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
		box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
	}
	
	.search input:focus {
		outline: none;
		border-color: #66b1ee;
		-webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		-o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
		box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
	}
	
	.search input:focus + .results { display: block }
	
	.search .results {
		width:120%;
		display: block;
		position: absolute;
		top: 40px;
		left: 0;
		right: 0;
		z-index: 10;
		padding: 0;
		margin: 0;
		border-width: 1px;
		border-style: solid;
		border-color: #cbcfe2 #c8cee7 #c4c7d7;
		background-color: #fdfdfd;
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
		background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
		background-image: linear-gradient(top, #fdfdfd, #eceef4);
		-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		-o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
	}
	
	.search .results li { display: block;
		border:1px solid #ccc !important;
		/*padding-bottom:15px !important;*/
	}
	
	.search .results li:first-child { margin-top: -1px }
	
	.search .results li:first-child:before, .search .results li:first-child:after {
		display: block;
		content: '';
		width: 0;
		height: 0;
		position: absolute;
		left: 50%;
		margin-left: -5px;
		border: 5px outset transparent;
	}
	
	.search .results li:first-child:before {
		border-bottom: 5px solid #c4c7d7;
		top: -11px;
	}
	
	.search .results li:first-child:after {
		border-bottom: 5px solid #fdfdfd;
		top: -10px;
	}
	
	.search .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }
	
	.search .results li:last-child { margin-bottom: -1px }
	
	.search .results a {
		display: block;
		position: relative;
		margin: 0 -1px;
		padding: 6px 40px 6px 10px;
		color: #000 !important;
		font-weight: 500;
		text-shadow: 0 1px #fff;
		border: 0px solid transparent;
	}
	
	.search .results a span { font-weight: 200 }
	
	.search .results li:hover{
		border-color: #2380dd #2179d5 #1a60aa;
		background-color: #338cdf;
		color: #fff !important;	
		background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
		background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
		background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
		background-image: linear-gradient(top, #59aaf4, #338cdf);
		transition: all 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
		}
		
	.search .results li:hover a{ color: #fff !important;	}
	
	.search .results li:hover .btn{ background-color: #ff5722 !important; color: #fff !important;	}
	
	:-moz-placeholder {
		color: #a7aabc;
		font-weight: 200;
	}
	
	::-webkit-input-placeholder {
		color: #a7aabc;
		font-weight: 200;
	}
	
	.add-f-btn{
		position:absolute !important;
		top:-5px !important;
		color: #fff !important;	
		padding-right:10px !important;
	}
	
	.frnd-img{height:50px !important; width:50px !important;}
	
	#load-spin:hover{background-color: #fafafa !important; color:#000 !important;}
	
	@media only screen and (max-width : 767px){
 		#custom-search-input{display:none !important;}
	}
	
	</style>
<div class="navbar navbar-default navbar-site  navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse"><span class="icon-bar"></span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="home.php"><img src="images/dostums-logo.png" alt="dostums ">
            </a></div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <div id="custom-search-input" class="row">
                    	<!--<div class="input-group col-md-12">
                            <input id="magicsuggest"   type="text" class="search-query form-control" placeholder="Search"/>
                            <span class="input-group-btn">
                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">
                                    <span class=" fa fa-search"></span>
                                </button>
							</span>
                        </div>-->
                        <section class="main">
                        	<!--<script>
								$(document).ready(function(e) {
                                    $('#link_search_result').click(function(e){
										var searchres=$('input[name=q]').val();
										window.location.replace('./all-frnd-search-results.php?result='+searchres);
									});
                                });
							</script>-->
                             <form class="search" method="get" action="search.php" >
                                 <input id="searchMe" type="text" name="q" placeholder="Search Dostums Friends..." />
                                 <ul class="results" id="suggestions" data-mcs-theme="dark">
                                     <!--<li class="friends">
                                        <a href="#">
                                        	<div class="row">
                                            	<div class="col-sm-3">
                                                	<img class="img-circle img-thumbnail" src="./images/group/group-profile-photo.jpg" style="height:50px !important; width:50px !important; margin-top:-10px !important;"/>
                                                </div>
                                                <div class="col-sm-5" style="padding-left:0px !important;">
                                                	Robiul Islam<br><small><i class="fa fa-map-marker margin-right10"></i>Dhaka, Bangladesh</small>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                	<a id="add-f-btn" href="#" class="btn btn-info btn-xs text-center"><span class="glyphicon glyphicon-plus">&nbsp;</span>Add Friend</a>
                                                    <a id="add-f-btn" href="#" class="btn btn-primary btn-xs text-center"><span class="glyphicon glyphicon-refresh">&nbsp;</span>Request Sent</a>
                                                	<a id="add-f-btn" href="#" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok">&nbsp;</span>Friends</a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>-->
                                    <li id="loading" style="padding:0px !important; display:none;">
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
                                    <!--<li id="not-found" style="padding:0px !important;">
                                        <a id="load-spin" href="#">
                                            <div class="row">
                                                <div class="col-sm-9 text-right text-info" style="overflow: hidden; margin-top:10px;">
                                                    <span class="text-warning" style=" font-weight:400; font-size:16px;">
                                                    Sorry! nothing found.
                                                </div>
                                                <div class="col-sm-3 text-left">
                                                    <img class="" src="./images/spinner/search-failed4.png" style=""/>
                                                </div>
                                            </div>
                                        </a>
                                    </li>-->
                               	</ul>
                             </form>
                        </section>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
                    <a href="./home.php" style="border-left:1px solid #e5e5e5 !important;"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                </li> 
				<li>
                    <a href="./profile.php">
                     <span class="gylphycon">
							<?php
                            $photo_id=$obj->SelectAllByVal2("dostums_profile_photo","user_id",$new_user_id,"status",2,"photo_id");
                            $photo=$obj->SelectAllByVal("dostums_photo","id",$photo_id,"photo");
                            
                            if($photo=="")
                            {
                                $new_photo="generic-man-profile.jpg";	
                            }
                            else
                            {
                                $new_photo=$photo;	
                            }
                            ?>
                         <img alt="user" class="img-circle" src="./profile/<?php echo $new_photo; ?>" style="height:15px; width:15px; border:1px solid #2C99CE;"/> 
                             
                        </span> 
                         <?php echo substr($dostums_user_name,0,10).".."; ?>      
                   	</a>
                </li>
                
                <li class="dropdown">
                    <a href="./friend-requests.php" data-toggle="dropdown" class="dropdown-toggle count-info">
                        <!--<i class="fa fi-torsos-male-female" style="font-size: 18px; margin-top:2px;"></i>-->
                        <i class="fa fa-user-plus" id="user_request_plus" aria-hidden="true"></i>
                        <span id="user_request" class="badge badge-danger">0</span>
                    </a>
                    <ul id="totaluser_requestbox" class="dropdown-menu">
                        
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span class="badge badge-danger" id="message_notification"><script>
                            $.post('lib/chat.php', {'st': 4}, function (data_notification) {
                                $('#message_notification').html(data_notification);
                            });
                            </script>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages" id="message_new_history">
                        <script>
                            $.post('lib/chat.php', {'st': 5}, function (data_notification) {
                                $('#message_new_history').html(data_notification);
                            });
                        </script>
                    </ul>
                </li> 
                
                

                <li class="dropdown ">
                    <a href="notification_more.php" data-toggle="dropdown" class="dropdown-toggle count-info">
                        <!--<i class="fa fi-torsos-male-female" style="font-size: 18px; margin-top:2px;"></i>-->
                        <i class="fa fa-bell" id="totalfriendrequest_bell"></i> 
                        <span id="totalfriendrequest" class="badge badge-danger"></span>
                    </a>
                    <ul id="totalfriendrequestbox" class="dropdown-menu">

                    </ul>
                </li>
                
                <li class="dropdown" style="display:none !important;">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-bell"></i> 
                        <span id="totalnotifications" class="label label-info">1</span>
                    </a>
                    <ul id="totalfriendrequestbox" class="dropdown-menu dropdown-alerts dropdown-messages">

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="./profile.php" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    	<li><a href="setting.php">General Settings <span class="fa fa-cog pull-right"></span></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="setting.php">Account Settings <span class="fa fa-cogs pull-right"></span></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="setting.php">Profile Settings <span class="fa fa-user pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="setting.php">Privacy Settings <span class="fa fa-user-secret pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="./logout.php">Sign Out <span class="fa fa-sign-out pull-right"></span></a></li>
                    </ul>
                </li>

                <li >
                    <a id="chat-trigger" href="#" style="border-right:1px solid #e5e5e5 !important;"> <i class="fa fa-comment"></i> CHAT </a>
                </li>
            </ul>


            <!-- /.navbar-right -->
        </div>
    </div>
</div>

<script>
	$('document').ready(function(e) {
		
			$('.friends').hide('slow');
			$('#loading').hide();
			$('#not-found').hide();
			$('#suggestions').hide();
			$('#searchMe').keyup(function(e) {
				$('#loading').show('slow');
				$('#suggestions').show();
				var countval=$(this).val().length;
				if(countval>=4)
				{
					$.post("./lib/search_friends.php", {'st': 1,'search_data': $(this).val()},function(fetch){
						var datacl=jQuery.parseJSON(fetch);
						var opt=datacl.data;
						$('#suggestions').html(opt);
						//$('#suggestions').show();
						$('#loading').hide();
						$.ajaxSetup({cache: false});
					});
					
				}
				else if(countval==0)
				{
					$('#suggestions').hide();
					$('#loading').hide();
				}
				else
				{
					$('.friends').hide();
				}
			});
			
			$('.friends').click(function(e){
				var getlink=$(this).find('a').attr('href');
				alert('success');	
			});
		
    });
	
	
</script>
