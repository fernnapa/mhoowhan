<?php
header('Content-Type: application/json');
$objConnect = mysqli_connect("localhost", "root", "", "project_com");
$objConnect->set_charset("utf8");     

$strSQL = "SELECT * FROM department ";
$objQuery = mysqli_query($objConnect, $strSQL);
$resultArray = array();
while($obResult = mysqli_fetch_assoc($objQuery))
{
    array_push($resultArray, $obResult);
}
echo json_encode($resultArray);


?>