<?php
header('Content-Type: application/json');
$objConnect = mysqli_connect("localhost", "root", "","project");
mysqli_query($objConnect, "SET NAMES 'utf8' "); 

$strSQL = "SELECT * FROM department";
$objQuery = mysqli_query($objConnect, $strSQL);
$resultArray  = array();
while($obResult = mysqli_fetch_assoc($objQuery))
{
    array_push($resultArray,$obResult);
}
echo json_encode($resultArray);
?>