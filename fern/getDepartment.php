<?php
include_once 'con_db.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];
}


$sql = "SELECT dep_id, dep_no, dep_name, lat, lng
FROM department WHERE dep_id = $id";

$no = "";
$name = "";
$latitude = "";
$longtitude = "";

$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
 $no = $row["dep_no"];
 $name = $row["dep_name"];
 $latitude = $row["lat"];
 $longtitude = $row["lng"];
}


echo  
'<input type="hidden" id="dep_id" name="dep_id" style="width:99%" value="'.$id.'" >
<td><input type="text" id="dep_no" name="dep_no" style="width:99%" value="'.$no.'"></td>
<td><input type="text" id="dep_name" name="dep_name" style="width:99%" value="'.$name.'"></td>
<td><input type="text" id="dep_latitude" name="dep_latitude" style="width:99%" value="'.$latitude.'"></td>
<td><input type="text" id="dep_longtitude" name="dep_longtitude" style="width:99%" value="'.$longtitude.'"></td>'

?>

