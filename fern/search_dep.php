<?php
require_once 'con_db.php';
include 'datatable.php';

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "SELECT * FROM department 
        WHERE dep_no LIKE '%".$search."%'
        OR dep_name LIKE '%".$search."%' 
        OR lat LIKE '%".$search."%' 
        OR lng LIKE '%".$search."%' ";
}
else
{
 $query = "SELECT * FROM department ORDER BY dep_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3">
<table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
    <thead>
     <tr>
   <th style="text-align: center;">หมายเลขหน่วยงาน</th>
   <th style="text-align: center;">ชื่อหน่วยงาน</th>
   <th style="text-align: center;">แลตติจูด</th>
   <th style="text-align: center;">ลองติจูด</th>
   <th style="text-align: center;">Action</th>
   <th style="text-align: center;"></th>
    </tr>
     </thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td style="text-align: left;">'.$row["dep_no"].'</td>
    <td style="text-align: left;">'.$row["dep_name"].'</td>
    <td style="text-align: left;">'.$row["lat"].'</td>
    <td style="text-align: left;">'.$row["lng"].'</td>
    <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" value="'.$row["dep_id"].'" onclick="showDepartment(this.value)" data-target="#myModal2">เเก้ไข</button></td>
    <td><button type="button" class="btn btn-danger btn-block" value="'.$row["dep_id"].'" onclick="remove(this.value)">ลบ</button></td>                    
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

