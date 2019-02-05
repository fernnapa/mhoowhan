<?php
include("../../db_connect.php");


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


echo  '

<tr>
 

<input type="hidden" id="dep_id" name="dep_id" style="font-family:Prompt;" value="'.$id.'" >
<tr>
    <th style="text-align: right; font-family:Prompt;">รหัสหน่วยงาน</th>
    <th style="text-align: center; font-family:Prompt;"><input type="text" id="dep_no" name="dep_no" style="width:99%" class="form-control" value="'.$no.'"></th>
</tr>

<tr>
    <th style="text-align: right; font-family:Prompt;">ชื่อหน่วยงาน</th>
    <th><input type="text" id="dep_name" name="dep_name" style="font-family:Prompt;" value="'.$name.'" class="form-control"></th>

</tr>
<tr>
    <th style="text-align: right; font-family:Prompt;">ลองติจูด</th>
    <th>&nbsp;&nbsp;'.$latitude.'</th>

</tr>
<tr>
    <th style="text-align: right; vertical-align:top; font-family:Prompt; ">ละติจูด</th>
    <th>&nbsp;&nbsp;'.$longtitude.'</th>
    </tr>';

?>

