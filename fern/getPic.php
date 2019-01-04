<style>
input[type="text"] {
  height: 30px; }

</style>

<?php
$connect = mysqli_connect("localhost", "root", "", "db_com"); 
mysqli_query($connect, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){
     $id = $_GET['id'];
 }

 $sql = "SELECT *
FROM allocate 

LEFT JOIN equipment
ON equipment.eq_id = allocate.ac_equipment

WHERE ac_id = $id";

$per_pic = "";
 
 $rs = $connect->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $id = $row["ac_id"];
     $per_pic = $row["eq_pic"];
 }
 
 echo  
'<table style="width:80%" align="center">
     <tr>
     <td align="center"><img src="fern/pic/'.$per_pic.'" width="450px;" height="320px;" /></td>
     </tr>    
 </table>';
 ?>
 
 

