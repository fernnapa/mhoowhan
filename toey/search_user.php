<?php
require_once 'db_connect.php';
include 'datatable.php';

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM employee 
        WHERE emp_id LIKE '%".$search."%'
        OR emp_fname LIKE '%".$search."%'
        OR emp_lname LIKE '%".$search."%'
        OR emp_position LIKE '%".$search."%'
        OR emp_tel LIKE '%".$search."%'
        OR emp_mail LIKE '%".$search."%'
        OR emp_pic LIKE '%".$search."%'
        OR emp_user LIKE '%".$search."%'
        OR emp_pass LIKE '%".$search."%' 
        OR emp_status LIKE '%".$search."%' ";
}
else
{
 $query = "SELECT * FROM employee ORDER BY emp_id";
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
    <td style="text-align: center;"><b>หมายเลขพนักงาน</b></td>
    <td style="text-align: center; width:20px;"><b>ชื่อ</b></td>
    <td style="text-align: center;"><b>สกุล</b></td>
    <td style="text-align: center;"><b>ตำเเหน่ง</b></td>
    <td style="text-align: center;"><b>โทรศัพท์</b></td>
    <td style="text-align: center;"><b>อีเมล์</b></td>
    <td style="text-align: center;"><b>Username</b></td>
    <td style="text-align: center;"><b>Password</b></td>
    <td style="text-align: center;"><b>status</b></td>
    <td style="text-align: center;"><b></b></td>
    <td style="text-align: center;"></td>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td><img src="upload/'.$row['emp_pic'].'" width="90px;" height="80px;" / class="w3-card-2 w3-round"></td>
   <td style="text-align:left">'.$row['emp_id'].'</td>
   <td style="text-align:left">'.$row['emp_fname'].'</td>
   <td style="text-align:left">'.$row['emp_lname'].'</td>
   <td style="text-align:left">'.$row['emp_position'].'</td>
   <td style="text-align:left">'.$row['emp_tel'].'</td>
   <td style="text-align:left">'.$row['emp_mail'].'</td>
   <td style="text-align:left">'.$row['emp_user'].'</td>
   <td style="text-align:left">'.$row['emp_pass'].'</td>
   <td style="text-align:left">'.$row['emp_status'].'</td>

    <td><button type="button" class="btn btn-warning btn-block" data-toggle="modal" value="'.$row["emp_id"].'" onclick="showUser(this.value)" data-target="#myModal2">เเก้ไข</button></td>
    <td><button type="button" class="btn btn-danger btn-block" value="'.$row["emp_id"].'" onclick="remove(this.value)">ลบ</button></td>                    
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

