<?php
include_once 'db_connect.php';

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
'<input type="hidden" id="dep_id" name="dep_id" style="font-family:Prompt;" value="'.$id.'" >
<tr><td><input type="text" id="dep_no" name="dep_no" style="font-family:Prompt;" value="'.$no.'"></td>
<td><input type="text" id="dep_name" name="dep_name" style="font-family:Prompt;" value="'.$name.'"></td></tr>
<tr><td><input type="text" id="dep_latitude" name="dep_latitude" style="font-family:Prompt;" value="'.$latitude.'"></td>
<td><input type="text" id="dep_longtitude" name="dep_longtitude" style="font-family:Prompt;" value="'.$longtitude.'"></td></tr>'

?>

