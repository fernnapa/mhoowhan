<?php
include("../../db_connect.php");
include("datatable.php");

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
        OR emp_pic LIKE '%".$search."%' ";
}
else
{
 $query = "SELECT * FROM employee ORDER BY emp_id";

}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table table-striped table-bordered " >
<thead>
<tr >
    <td style="text-align: center; font-weight: bold; font-size: 15px;">รูปภาพ</td>
    <td style="text-align: center; font-weight: bold; font-size: 15px;"><b>หมายเลขพนักงาน</b></td>
    <td style="text-align: center; font-weight: bold; font-size: 15px;"><b>ชื่อ</b></td>
    <td style="text-align: center; font-weight: bold; font-size: 15px;"><b>สกุล</b></td>
    <td style="text-align: center; font-weight: bold; font-size: 15px;"><b>อีเมล์</b></td>
    <td style="text-align: center;"><b></b></td>
</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td><img src="img/'.$row['emp_pic'].'" style="width="350px; height="350px;" ></td>
   <td style="text-align:left">'.$row['emp_id'].'</td>
   <td style="text-align:left">'.$row['emp_fname'].'</td>
   <td style="text-align:left">'.$row['emp_lname'].'</td>
   <td style="text-align:left">'.$row['emp_mail'].'</td>  
   <td style="text-align:center"><button type="button" class="btn btn-icons btn-rounded btn-primary" data-toggle="modal"  value="'.$row["emp_id"].'" onclick="showEmp(this.value)" data-target="#myModal3"><i class="mdi mdi-file-document"></i></button>
    <button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row["emp_id"].'" onclick="showUser(this.value)" data-target="#myModal2"><i class="mdi mdi-pencil"></i></button>
    <button type="button" class="btn btn-icons btn-rounded btn-danger" value="'.$row["emp_id"].'" onclick="remove(this.value)"><i class="mdi mdi-delete"></i></button></td>                    
    </tr>

  ';
 }
 echo $output;
}
else
{
 echo '<br/><p style="color:red; text-align: center; font-family:Prompt; font-size:20px;"><b>ไม่พบข้อมูล</b></p>  ';
}


?>

