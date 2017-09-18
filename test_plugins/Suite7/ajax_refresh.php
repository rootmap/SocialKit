<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=suitecrm_db', 'suitecrm_user', 'DBPASSWORD', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT id, name FROM `accounts` WHERE name like (:keyword) and deleted = '0' order by name asc limit 0, 15";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
echo '<li><b>Accounts</b></li><br>';
foreach ($list as $rs) {
	//Jake
	echo '<li><a href="https://sugarcrm.hostingharrisburg.com/index.php?action=DetailView&module=Accounts&record='.$rs['id'].'">'.$rs['name'].'</a></li><br>';
	// put in bold the written text
	//$query_string = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
	// add new option
        //echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['name']).'\')">'.$query_string.'</li><br>';
}

$sql2 = "SELECT id, Concat_WS('',NULL,`first_name`,' ',`last_name`) as name FROM `contacts` WHERE deleted = '0' and first_name like (:keyword) OR deleted = '0' and last_name like (:keyword) order by last_name asc limit 0, 15";
$query2 = $pdo->prepare($sql2);
$query2->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query2->execute();
$list2 = $query2->fetchAll();
echo '<li><b>Contacts</b></li><br>';
foreach ($list2 as $rs2) {
        //Jake
       echo '<li><a href="https://sugarcrm.hostingharrisburg.com/index.php?action=DetailView&module=Contacts&record='.$rs2['id'].'">'.$rs2['name'].'</a></li><br>';
        // put in bold the written text
       // $query_string = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
        // add new option
       //echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['name']).'\')">'.$query_string.'</li><br>';
}
?>
