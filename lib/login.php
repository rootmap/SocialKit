<?php
session_start();
include('../class/db_Class.php');
$obj = new db_class();
extract($_POST);
if($st==1)
{
	include('../class/login.php');
	$login=new loginClass();
       // $query="SELECT * FROM dostums_user WHERE email='".$email."' AND password='".$login->MakePassword($password)."' AND user_permission='1'";
	//echo $query;
        if($obj->exists_multiple("dostums_user",array("email"=>$email,"password"=>$login->MakePassword($password),"user_permission"=>1))==1)
	{
		//$login->MakePassword($password);
		$signup_ip=$login->GetPcAddress();
		$user_id=$obj->SelectAllByVal2("dostums_user_view","email",$email,"password",$login->MakePassword($password),"id");
		$name=$obj->SelectAllByVal2("dostums_user_view","email",$email,"password",$login->MakePassword($password),"name");

		session_regenerate_id();
		$_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID'] = $user_id;
		$_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'] = $name;
		session_write_close();

		echo 1;
	}
	else
	{
		echo 2;
	}


}
elseif($st==2)
{
	include('../class/login.php');
	$login=new loginClass();
	if($obj->exists_multiple("dostums_user_view",array("email"=>$email))==1)
	{

		$signup_ip=$login->GetPcAddress();
		$user_id=$obj->SelectAllByVal("dostums_user_view","email",$email,"id");

		$chkreset=$obj->exists_multiple("reset_code_view",array("user_id"=>$user_id));
		$newreset_code=substr($login->MakePassword(time()),0,4);
			if($chkreset==0)
			{

				$obj->insert("reset_code",array("user_id"=>$user_id,"reset_code"=>$newreset_code,"date"=>date('Y-m-d'),"status"=>1));
				session_regenerate_id();
				$_SESSION['SESS_FORMULA_DOSTUMS_RESET_APPS_ID'] = $user_id;
				session_write_close();
			}
			else
			{
				$obj->update("reset_code",array("user_id"=>$user_id,"reset_code"=>$newreset_code,"date"=>date('Y-m-d'),"status"=>1));
				session_regenerate_id();
				$_SESSION['SESS_FORMULA_DOSTUMS_RESET_APPS_ID'] = $user_id;
				session_write_close();
			}


			$my_name = "Dostums Reset Password";
			$my_mail = "reset@dostums.com";
			$my_replyto = "contact@dostums.com";
			$my_subject = "Dostums Reset Password.";
			$my_message = "Hallo Sir,\r\n Please Reset Your Password using this code : <font color='#FF0000'>".$newreset_code."</font> ,  Or You Can Use this Reset Link. <a href='".$obj->baseUrl('login.php')."'>Click Here</a>.\r\n\r\n";

			include("../phpmail/class.phpmailer.php");
			$email = new PHPMailer();
			$email->From      = $my_mail;
			$email->FromName  = $my_name;
			$email->Subject   = $my_subject;
			$email->Body      = $my_message;
			$email->AddAddress('f.bhuyian@gmail.com');
			if($email->Send()==1){ echo 1; }
			else{ echo 3; }

	}
	else
	{
		echo 2;
	}


}
elseif($st==3)
{
	$reset_user_id=$_SESSION['SESS_FORMULA_DOSTUMS_RESET_APPS_ID'];
	include('../class/login.php');
	$login=new loginClass();
	if(empty($password))
	{
		echo 0;
	}
	else
	{
		//$signup_ip=$login->GetPcAddress();
		//$user_id=$obj->SelectAllByVal("dostums_user_view",,"reset_code",$reset_code,"id");
		$chkreset=$obj->exists_multiple("dostums_user",array("id"=>$reset_user_id));
		if($chkreset==1)
		{
			$obj->update("dostums_user",array("id"=>$reset_user_id,"password"=>$login->MakePassword($password)));
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

}
elseif($st==4)
{
	$reset_user_id=$_SESSION['SESS_FORMULA_DOSTUMS_RESET_APPS_ID'];
	include('../class/login.php');
	$login=new loginClass();
	if(empty($reset_code))
	{
		echo 0;
	}
	else
	{
		//$signup_ip=$login->GetPcAddress();
		//$user_id=$obj->SelectAllByVal("dostums_user_view",,"reset_code",$reset_code,"id");
		$chkreset=$obj->exists_multiple("reset_code_view",array("user_id"=>$reset_user_id,"reset_code"=>$reset_code));
		if($chkreset==1)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

}
else
{
	echo 0;
}
?>
