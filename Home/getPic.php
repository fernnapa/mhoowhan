<style>
input[type="text"] {
  height: 30px; }
</style>

<?php
// $connect = mysqli_connect("localhost", "root", "", "project"); 
// mysqli_query($connect, "SET NAMES 'utf8' "); 
include ('db_connect.php');
if(isset($_GET['id'])){
     $id = $_GET['id'];
 }


$result = "SELECT * FROM allocate_detail 
LEFT JOIN allocate
ON allocate_detail.ac_id = allocate.ac_id
LEFT JOIN a_status
ON a_status.status_id = allocate.ac_id
LEFT JOIN equipment
ON equipment.eq_status = a_status.status_id"; 


$eq_pic = "";

$rs = $conn->query($result);
while($row = mysqli_fetch_assoc($rs)){
 
$eq_pic = $row["eq_pic"];

}
 
 echo  
'<table style="width:100%" align="center">
     <tr>
     <td align="center"><img src="Admin/pages/equipment_pic/'.$eq_pic.'" width="360px;" height="290px;" /></td>
     </tr>    
 </table>';
 ?>
