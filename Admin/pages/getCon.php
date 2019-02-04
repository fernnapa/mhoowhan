<?php
include("../../db_connect.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
}

$sql = "SELECT * FROM contract WHERE con_id = $id";
$name = "";
$des = "";

$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
    
    $id = $row["con_id"];
    $name = $row["con_name"];
    $des = $row["con_des"];
    $exp = $row["con_exp"];


   }
echo '<link rel="stylesheet" href="style.css">';

echo  
'

<tr>
<th style="text-align: left;">ชื่อสัญญา</th>
<th style="text-align: left;">รายละเอียดสัญญา</th>
<th style="text-align: left;">วันที่หมดอายุสัญญา</th>

                                       
</tr>
<tr>
<input type="hidden" id="con_id" name="con_id" value="'.$id.'">
<td><input type="text" id="con_name" name="con_name" style="width:99%" value="'.$name.'" class="form-control"></td>
<td><input type="text" id="con_des" name="con_des" style="width:99%" value="'.$des.'" class="form-control"></td>
<td><input type="date" id="con_exp" name="con_exp" style="width:99%" value="'.$exp.'" class="form-control"></td>


</tr>'
;

?>

