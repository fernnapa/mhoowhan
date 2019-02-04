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


echo  '<tr>
            <input type="hidden" id="dep_id" name="dep_id" style="font-family:Prompt;" value="'.$id.'" >
            <tr>
                <th style="text-align: left; width:30%; font-family:Prompt;">รหัสหน่วยงาน</th>
                <th><input type="text" id="dep_no" name="dep_no" style="font-family:Prompt;" value="'.$no.'"></th>
            </tr>
            <tr>    
                <th style="text-align: left; width:30%; font-family:Prompt;">ชื่อหน่วยงาน
                <th><input type="text" id="dep_name" name="dep_name" style="font-family:Prompt;" value="'.$name.'"></th>
            </tr>
            <tr>
                <th style="text-align: left; width:30%; font-family:Prompt;">ลองติจูด</th>
                <th>'.$latitude.'</th>
            </tr>
            <tr>
                <th style="text-align: left; width:30%; font-family:Prompt;">ละติจูด</th>
                <th>'.$longtitude.'</th>
            </tr>
</tr>'

?>

