<?php
include("../../db_connect.php");
include("datatable_Type.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
}

$sql = "SELECT type_name
FROM type_eq WHERE type_id = $id";
$name = "";

$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
    $name = $row["type_name"];
   }
echo '<link rel="stylesheet" href="style.css">';

echo  
'

<tr>
<th style="text-align: center;">ชื่อประเภท</th>

                                       
</tr>
<tr>
<input type="hidden" id="type_id" name="type_id" value="'.$id.'">
<td><input type="text" id="type_name" name="type_name" style="width:99%" value="'.$name.'" class="form-control"></td>

</tr>'
;

?>

