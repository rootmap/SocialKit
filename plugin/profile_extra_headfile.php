<!DOCTYPE html>
<html lang="en">
<head>
<title>Dostums - Profile : <?php echo $obj->SelectAllByVal("dostums_user_view","id",$new_user_id,"name"); ?> </title>
<?php include('plugin/header_script.php');  ?>
</head>
<body class="home">
<header>
    <div class="header-wrapper">
        <div class="header-nav">
            <?php include('plugin/header_nav.php'); ?>
        </div>
    </div>
</header>