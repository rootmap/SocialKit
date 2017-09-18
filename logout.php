<?php
session_start();
unset($_SESSION['SESS_FORMULA_DOSTUMS_APPS_ID']);
unset($_SESSION['SESS_FORMULA_DOSTUMS_APPS_NAME']);
header('location: login.php');
?>