<style>
input[type="text"] {
  height: 30px; }
</style>

<?php
// $connect = mysqli_connect("localhost", "root", "", "project"); 
// mysqli_query($connect, "SET NAMES 'utf8' "); 
include ('con_db.php');
if(isset($_GET['id'])){
     $id = $_GET['id'];
 }

$barcode = "";
$serial = "";
$result = "SELECT * FROM allocate WHERE ac_id = '$id'" ; 
 
        $rs = $connect->query($result);
        while($row = mysqli_fetch_assoc($rs)){
            $barcode = $row["ac_barcode"];
            $serial = $row["ac_serial"];
        }
 
        $result2 = "SELECT * FROM equipment WHERE eq_barcode = '$barcode' AND eq_serial = '$serial'";
        
        $rs2 = $connect->query($result2); 
        while($row = mysqli_fetch_assoc($rs2)){
            $eq =  $row["eq_id"];
        }
 
        $result3 = "SELECT * FROM equipment WHERE eq_id = '$eq'";
        $rs3 = $connect->query($result3);
        while($row = mysqli_fetch_assoc($rs3)){
            $eq_pic = $row["eq_pic"];
        }
 
 
 echo  
'<table style="width:80%" align="center">
     <tr>
     <td align="center"><img src="fern/pic/'.$eq_pic.'" width="450px;" height="320px;" /></td>
     </tr>    
 </table>';
 ?>
 
 

