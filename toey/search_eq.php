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
      LEFT JOIN a_status
      ON equipment.eq_status = a_status.status_id 
        WHERE eq_id LIKE '%".$search."%'
        OR eq_barcode LIKE '%".$search."%'
        OR eq_serial LIKE '%".$search."%'
        OR eq_pic LIKE '%".$search."%'
        OR eq_status LIKE '%".$search."%'
        OR tor_name LIKE '%".$search."%' 
        OR con_name LIKE '%".$search."%'
        OR status_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM equipment
 LEFT JOIN tor
ON equipment.eq_tor = tor.tor_id
LEFT JOIN contract
ON tor.tor_contract = contract.con_id 
LEFT JOIN a_status
ON equipment.eq_status = a_status.status_id ";

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
<th style="text-align: center;font-family:Prompt;"><b>Barcode</b></th>
<th style="text-align: center;font-family:Prompt;"><b>Serial Number</b></th>
<th style="text-align: center;font-family:Prompt;"><b>TOR</b></th>
<th style="text-align: center;font-family:Prompt; " ><b>สัญญา</b></th>
<th style="text-align: center;font-family:Prompt;"><b>สถานะ</b></th>
<th style="text-align: center;font-family:Prompt;"><b>Action</b></th>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
    $tor_name = $row["tor_name"];
    $con_name = $row["con_name"];
    $status_name = $row["status_name"];



  $output .= '
   <tr>
   <td><img src="equipment_pic/'.$row['eq_pic'].'" style="width:90px;height:80px;"" / class="img-md rounded w3-card-2"></td>
   <td style="text-align:left;font-family:Prompt;">'.$row['eq_barcode'].'</td>
   <td style="text-align:left;font-family:Prompt;">'.$row['eq_serial'].'</td>
   <td style="text-align:left;font-family:Prompt;">'.$tor_name.'</td>
   <td style="text-align:left;font-family:Prompt;">'.$con_name.'</td>
   <td style="text-align:left;font-family:Prompt;">'.$status_name.'</td>
  

    <td><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row["eq_id"].'" onclick="showEq(this.value)" data-target="#myModal2"><i class="mdi mdi-pencil"></i></button>
    <button type="button" class="btn btn-icons btn-rounded btn-danger" value="'.$row["eq_id"].'" onclick="removeEq(this.value)"><i class="mdi mdi-delete"></i></button></td>                    
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

