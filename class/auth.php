<?php
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID']) || (trim($_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID']) == ''))
{
		$error_data[] = 'Login Session Expired Please Login';
		$error_flag = true;
		if($error_flag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: login.php");
			exit();
					}
}

$input_by=$_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID'];
include('db_Class.php');
$obj = new db_class();

$dostums_user_name=$_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME'];
$dostums_user_id=$_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID'];

?>
