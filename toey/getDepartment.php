<?php
include_once 'db_connect.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];
}


$sql = "SELECT dep_id, dep_name, latitude, longtitude
FROM department WHERE dep_id = $id";
$name = "";
$latitude = "";
$longtitude = "";

$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
 $name = $row["dep_name"];
 $latitude = $row["latitude"];
 $longtitude = $row["longtitude"];
}


echo  
'<input type="hidden" id="dep_id" name="dep_id" style="width:99%" value="'.$id.'" >
<td><input type="text" id="dep_name" name="dep_name" style="width:99%" value="'.$name.'"></td>
<td><input type="text" id="dep_latitude" name="dep_latitude" style="width:99%" value="'.$latitude.'"></td>
<td><input type="text" id="dep_longtitude" name="dep_longtitude" style="width:99%" value="'.$longtitude.'"></td>'

?>

