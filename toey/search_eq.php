<?php
require_once 'db_connect.php';
include 'datatable.php';

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM equipment
        LEFT JOIN tor
      ON equipment.eq_tor = tor.tor_id
      LEFT JOIN contract
      ON tor.tor_contract = contract.con_id 
        WHERE eq_id LIKE '%".$search."%'
        OR eq_barcode LIKE '%".$search."%'
        OR eq_serial LIKE '%".$search."%'
        OR eq_pic LIKE '%".$search."%'
        OR eq_status LIKE '%".$search."%'
        OR tor_name LIKE '%".$search."%' 
        OR con_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM equipment
 LEFT JOIN tor
ON equipment.eq_tor = tor.tor_id
LEFT JOIN contract
ON tor.tor_contract = contract.con_id ";
 echo '<link rel="stylesheet" href="style.css">';

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
<tr >
<td style="text-align: center;"></td>

<td style="text-align: center;">Barcode</td>
<td style="text-align: center;">Serial Number</td>
<td style="text-align: center;">TOR</td>
<td style="text-align: center;">สัญญา</td>
<td style="text-align: center;">สถานะ</td>
<td style="text-align: center;">Action</td>
<td style="text-align: center;"></td>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
    $tor_name = $row["tor_name"];
    $con_name = $row["con_name"];


  $output .= '
   <tr>
   <td><img src="equipment_pic/'.$row['eq_pic'].'" width="90px;" height="80px;" / class="w3-card-2 w3-round"></td>
   <td style="text-align:left">'.$row['eq_barcode'].'</td>
   <td style="text-align:left">'.$row['eq_serial'].'</td>
   <td style="text-align:left">'.$tor_name.'</td>
   <td style="text-align:left">'.$con_name.'</td>
   <td style="text-align:left">'.$row['eq_status'].'</td>
  

    <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" value="'.$row["eq_id"].'" onclick="showEq(this.value)" data-target="#myModal2">เเก้ไข</button></td>
    <td><button type="button" class="btn btn-danger btn-block" value="'.$row["eq_id"].'" onclick="removeEq(this.value)">ลบ</button></td>                    
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

