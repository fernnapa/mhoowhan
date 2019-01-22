<?php
require_once 'db_connect.php';
include 'datatable.php';

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
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
   <th style="text-align: center; font-family:Prompt;">หมายเลขหน่วยงาน</th>
   <th style="text-align: center; font-family:Prompt;">ชื่อหน่วยงาน</th>
   <th style="text-align: center; font-family:Prompt;">ละติจูด</th>
   <th style="text-align: center; font-family:Prompt;">ลองจิจูด</th>
   <th style="text-align: center;"></th>
  </tr>
  </thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td style="text-align: left; font-family:Prompt;">'.$row["dep_no"].'</td>
    <td style="text-align: left; font-family:Prompt;">'.$row["dep_name"].'</td>
    <td style="text-align: left; font-family:Prompt;">'.$row["lat"].'</td>
    <td style="text-align: left; font-family:Prompt;">'.$row["lng"].'</td>
    <td><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row["dep_id"].'" onclick="showDepartment(this.value)" data-target="#myModal2" style="font-family:Prompt;"><i class="mdi mdi-pencil"></i></button>
    <button type="button" class="btn btn-icons btn-rounded btn-danger" value="'.$row["dep_id"].'" onclick="remove(this.value)" style="font-family:Prompt;"><i class="mdi mdi-delete"></i></button></td>                    
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

