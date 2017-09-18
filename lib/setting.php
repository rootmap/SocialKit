<?php  
include('../class/auth.php');
extract($_POST);
if($st==1)
{
	$basic_info=$obj->FlyQuery("Select first_name,last_name,email,dob,(select country_name from dostums_country where id=country_id) as country_id,city_id,(select occupation from dostums_user_about where user_id='".$input_by."') as occupation,(select company from dostums_user_about where user_id='".$input_by."') as company,(select website_url from dostums_user_about where user_id='".$input_by."') as website_url from dostums_user where id='".$input_by."'");
	
	echo json_encode($basic_info);
	
}
elseif($st==101)
{
	$country=$obj->SelectAllByVal("dostums_country","country_name",$country_id,"id");
	
	$obj->update("dostums_user",array("id"=>$input_by,"first_name"=>$first_name,"last_name"=>$last_name,"country_id"=>$country,"city_id"=>$city_id,"date"=>date('Y-m-d')));
	
	$chkuser=$obj->exists_multiple("dostums_user_about",array("user_id"=>$input_by));
	if($chkuser==0)
	{
		$obj->insert("dostums_user_about",array("user_id"=>$input_by,"occupation"=>$occupation,"company"=>$company,"website_url"=>$website_url,"date"=>date('Y-m-d'),"status"=>1));
	}
	else
	{
		$obj->update("dostums_user_about",array("user_id"=>$input_by,"occupation"=>$occupation,"company"=>$company,"website_url"=>$website_url,"date"=>date('Y-m-d')));
	}
	
	$basic_info=$obj->FlyQuery("Select first_name,last_name,email,dob,(select country_name from dostums_country where id=country_id) as country_id,city_id,(select occupation from dostums_user_about where user_id='".$input_by."') as occupation,(select company from dostums_user_about where user_id='".$input_by."') as company,(select website_url from dostums_user_about where user_id='".$input_by."') as website_url from dostums_user where id='".$input_by."'");
	
	echo json_encode($basic_info);
	
}
elseif($st==2)
{
	$basic_info=$obj->FlyQuery("select about_short,about_long from dostums_user_about where user_id='".$input_by."'");
	if(empty($basic_info))
	{
		$newarray=array("about_short"=>"","about_long"=>"");
		$a="[";
		$b="]";
		echo json_encode($a."".$newarray."".$b);
		
	}
	else
	{
		echo json_encode($basic_info);	
	}
	
	
}
elseif($st==202)
{
	$chkuser=$obj->exists_multiple("dostums_user_about",array("user_id"=>$input_by));
	if($chkuser==0)
	{
		$obj->insert("dostums_user_about",array("user_id"=>$input_by,"about_short"=>$about_short,"about_long"=>$about_long,"date"=>date('Y-m-d'),"status"=>1));
	}
	else
	{
		$obj->update("dostums_user_about",array("user_id"=>$input_by,"about_short"=>$about_short,"about_long"=>$about_long,"date"=>date('Y-m-d')));
	}
	$basic_info=$obj->FlyQuery("select about_short,about_long from dostums_user_about where user_id='".$input_by."'");
	if(empty($basic_info))
	{
		$newarray=array("about_short"=>"","about_long"=>"");
		$a="[";
		$b="]";
		echo json_encode($a."".$newarray."".$b);
		
	}
	else
	{
		echo json_encode($basic_info);	
	}
	
	
}
elseif($st==3)
{
	include('../class/login.php');
	$login=new loginClass();
	$basic_info=$obj->exists_multiple("dostums_user_view",array("id"=>$input_by,"password"=>$login->MakePassword($password)));
	
	if($basic_info==1)
	{
		echo 1;	
	}
	else
	{
		echo 0;	
	}
	
}
elseif($st==303)
{
	include('../class/login.php');
	$login=new loginClass();
	$basic_info=$obj->exists_multiple("dostums_user_view",array("id"=>$input_by,"password"=>$login->MakePassword($xpassword)));
	
	if($basic_info==1)
	{
		$obj->update("dostums_user",array("id"=>$input_by,"password"=>$login->MakePassword($password)));
		
		$my_name = "Dostums Your Reset Password Changed";
		$my_mail = "reset@dostums.com";
		$my_replyto = "contact@dostums.com";
		$my_subject = "Dostums Your Reset Password Changed.";
		$my_message = "Hallo Sir,\r\n Your Password has been Chnaged from your account, please reply email if this is not your activity.\r\n\r\n";
		$useremail=$obj->SelectAllByVal("dostums_user","id",$input_by,"email");
		include("../phpmail/class.phpmailer.php");
		$email = new PHPMailer();
		$email->From      = $my_mail;
		$email->FromName  = $my_name;
		$email->Subject   = $my_subject;
		$email->Body      = $my_message;
		$email->AddAddress($useremail);
		if($email->Send()==1){ echo 1; }
		else{ echo 1; }
		
	}
	else
	{
		echo 0;	
	}
	
}
elseif($st==4)
{
	$chkuser=$obj->exists_multiple("dostums_user_social_info",array("user_id"=>$input_by,"social_id"=>$social_id));
	if($chkuser==0)
	{
		$obj->insert("dostums_user_social_info",array("user_id"=>$input_by,"social_id"=>$social_id,"social_name"=>$social_identity,"date"=>date('Y-m-d'),"status"=>1));	
	}
	else
	{
		$obj->updateUsingMultiple("dostums_user_social_info",array("social_name"=>$social_identity,"date"=>date('Y-m-d'),"status"=>1),array("user_id"=>$input_by,"social_id"=>$social_id));
	}
	echo 1;
	
}
else
{
	echo 0;	
}
?>








