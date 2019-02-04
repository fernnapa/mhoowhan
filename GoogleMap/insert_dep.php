<?php
include("config.php");
include("mysql.php");
$mysql = new J_MYSQL;  /// J_MYSQL คือ class สำหรับเชื่อมต่อฐานข้อมูล
$mysql->J_Connect();
$mysql->set_char_utf8();
$arr = array(
    "dep_no" => $_POST["dep_no"],
    "dep_name" => $_POST["location_name"],
    "lat" => $_POST["lat"],
    "lng" => $_POST["lng"],
);

$rs = $mysql->J_Insert($arr,"department");
$mysql->J_Close();
?>

