<?php
require_once 'db_connect.php';
include 'datatable.php';

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
    
        $query = "SELECT * FROM tor
        LEFT JOIN type
        ON type.type_id = tor_type
        LEFT JOIN contract
        ON contract.con_id = tor_contract
        WHERE tor_id LIKE '%".$search."%'
        OR tor_name LIKE '%".$search."%'
        OR tor_des LIKE '%".$search."%'
        OR tor_type LIKE '%".$search."%'
        OR con_name LIKE '%".$search."%'";
}
else
{

 echo '<link rel="stylesheet" href="style.css">';

 $query = "SELECT * FROM tor 
 LEFT JOIN type
 ON type.type_id = tor_type
 LEFT JOIN contract
 ON contract.con_id = tor_contract";

}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
<thead>
<tr>
  
    <td style="text-align: center;width:100px;"><b>ชื่อ TOR</b></td>
    <td style="text-align: center; width:300px;"><b>รายละเอียด TOR</b></td>
    <td style="text-align: center; width:200px;"><b>ประเภท TOR</b></td>
    <td style="text-align: center;"><b>สัญญา</b></td>
    <td style="text-align: center;"><b></b></td>
    <td style="text-align: center;"><b></b></td>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $type_name = $row["type_name"];
  $con_name = $row["con_name"];

  $output .= '
   <tr>
   <td style="text-align:left">'.$row['tor_name'].'</td>
   <td style="text-align:left">'.$row['tor_des'].'</td>
   <td style="text-align:left">'.$type_name.'</td>
   <td style="text-align:left">'.$con_name.'</td>
   
    <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" value="'.$row["tor_id"].'" onclick="showTor(this.value)" data-target="#ModalEditTor">เเก้ไข</button></td>
    <td><button type="button" class="btn btn-danger btn-block" onclick="removeTor('.$row["tor_id"].')">ลบ</button></td>                    
    </tr>

   
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}


?>

