<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', true);
date_default_timezone_set('Asia/Dacca');
$hostname = "192.206.45.26";
//$hostname = "localhost";
$db_name = "game_db";
$db_username = "rm";
$db_password = "gamedb##321##";

try {
	$pdo_conn = new PDO("mysql:host=$hostname;dbname=$db_name", $db_username, $db_password);
	/*** echo a message saying we have connected ***/
	//echo 'Connected to database';
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>