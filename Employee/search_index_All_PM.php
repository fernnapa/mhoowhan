<?php
include("../db_connect.php");
include("datatable_all.php");



$output = '';
$i = 0;
$a = "";
if(isset($_POST["query"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
       
        // echo $search;
        // echo $search2;
        // return;
        if($search == 'ทั้งหมด')
        {    
            $query = "SELECT * FROM permit
            LEFT JOIN a_status
            ON permit.pm_status = a_status.status_id
            LEFT JOIN department
            ON permit.pm_dep = department.dep_id
            LEFT JOIN employee
            ON permit.pm_empno = employee.emp_id
            WHERE pm_status = 9 OR pm_status = 7 OR pm_status = 6 OR pm_status= 3 OR pm_status= 8 OR pm_status= 10 OR pm_status= 11 OR pm_status = 12";
        }
        else
        {
            $query = "SELECT * FROM permit
            LEFT JOIN a_status
            ON permit.pm_status = a_status.status_id
            LEFT JOIN department
            ON permit.pm_dep = department.dep_id
            LEFT JOIN employee
            ON permit.pm_empno = employee.emp_id
            WHERE pm_status = '$search'";
        }

}
else
{
 $query = "SELECT * FROM permit
 LEFT JOIN a_status
 ON permit.pm_status = a_status.status_id
 LEFT JOIN department
 ON permit.pm_dep = department.dep_id
 LEFT JOIN employee
 ON permit.pm_empno = employee.emp_id
 WHERE pm_status = 9 OR pm_status = 7 OR pm_status = 6 OR pm_status= 3 OR pm_status= 8 OR pm_status= 10 OR pm_status= 11 OR pm_status = 12";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered" class="hover" >
<thead>
<tr style="font-weight: bold;">

<td style="text-align: center; ">จุดประสงค์การยืม-คืน</td>
<td style="text-align: center; ">ชื่อผู้เช่ายืม</td>
<td style="text-align: center; ">หน่วยงาน</td>
<td style="text-align: center; ">พนักงานจัดสรร</td>
<td style="text-align: center; ">สถานะ</td>
<td style="text-align: center; ">จัดการ</td>
<td style="text-align: center; ">รายละเอียด</td>


</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
    $id = $row['pm_id'];
    $stn = $row['status_id'];
    $test =0;

    $exp_date = $row['pm_enddate'];
    $today_date = date('Y-m-d');
    $exp = strtotime($exp_date);
    $td = strtotime($today_date);
    if($td > $exp)
    {
    $test =1;
    }

if($test == 1){
        $status = 12; 
        $update = "UPDATE `permit` SET `pm_status`='$status' WHERE pm_id = $id ";
        $rs = mysqli_query($conn, $update);
        $st = "SELECT * FROM permit 
        LEFT JOIN a_status
        ON permit.pm_status = a_status.status_id
        LEFT JOIN department
        ON permit.pm_dep = department.dep_id WHERE pm_id = $id";
        $rs1 = mysqli_query($conn, $st);
        while($ex = mysqli_fetch_array($rs1)){
          $stn = $ex['pm_status'];
          $name = $ex['pm_name'];
          $username = $ex['pm_username'];
          $dep = $ex['dep_name'];
          $pm_fname = $row["emp_fname"];
          $pm_lname = $row["emp_lname"];
        //   $emp = $ex['pm_empno'];
          $status_name = $ex['status_name'];
        }
if($stn == 12){
  $output .= '
    <tr>
    <td style="text-align:left">'.$name.'</td>
    <td style="text-align:left">'.$username.'</td>
    <td style="text-align:left">'.$dep.'</td>
    <td style="text-align:left">'.$pm_fname.'&nbsp;&nbsp;'.$pm_lname.'</td>
    <td style="text-align:center" class="w3-red">'.$status_name.'</td>
    <td><button type="button" name="submitRFN" class="btn btn-success btn-block" data-toggle="modal" data-target="#ModalRefund"  value="'.$id.'" onclick="idrefund(this)" style="font-family:Prompt;"><i class="mdi mdi-debug-step-over"></i>คืนครุภัณฑ์</button></td>
    <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
    
    </tr>';
        }
    }
if($stn == 7){
        $output .= '
    <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
        <td style="text-align:left">'.$row['pm_username'].'</td>
        <td style="text-align:left">'.$row['dep_name'].'</td>
        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
        <td style="text-align:left">'.$row['status_name'].'</td>
        <td></td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
       
    </tr>
        ';
    }
    if($stn == 8){
        $output .= '
        <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
        <td style="text-align:left">'.$row['pm_username'].'</td>
        <td style="text-align:left">'.$row['dep_name'].'</td>
        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
        <td style="text-align:left" >'.$row['status_name'].'</td>
        <td></td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        
        </tr>
        ';
    }
    if($stn == 11)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
                        <td style="text-align:left">'.$row['pm_username'].'</td>
                        <td style="text-align:left">'.$row['dep_name'].'</td>
                        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
                        <td style="text-align:left">'.$row['status_name'].'</td>
                        <td></td>
                        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
         
        </tr>';
    }
    if($stn == 10)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
        <td style="text-align:left">'.$row['pm_username'].'</td>
        <td style="text-align:left">'.$row['dep_name'].'</td>
        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
        <td style="text-align:left">'.$row['status_name'].'</td>
        <td></td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
       
        </tr>';
    }
    if($stn == 3)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
        <td style="text-align:left">'.$row['pm_username'].'</td>
        <td style="text-align:left">'.$row['dep_name'].'</td>
        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
        <td style="text-align:center"  class="w3-blue-gray">'.$row['status_name'].'</td>
        <td><button type="button" name="submitRFN" class="btn btn-success btn-block" data-toggle="modal" data-target="#ModalRefund"  value="'.$id.'" onclick="idrefund(this)" style="font-family:Prompt;">  <i class="mdi mdi-debug-step-over"></i>คืนครุภัณฑ์</button></td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        </tr>';
    }
    if($stn == 6)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$row['pm_name'].'</td>
        <td style="text-align:left">'.$row['pm_username'].'</td>
        <td style="text-align:left">'.$row['dep_name'].'</td>
        <td style="text-align:left">'.$row["emp_fname"].'&nbsp;&nbsp;'.$row["emp_lname"].'</td>
        <td style="text-align:left">'.$row['status_name'].'</td>
        <td></td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewPM" onclick="showData('.$row['pm_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        
      
        </tr>';   
    }
 }
 echo $output;
}
else
{
    echo '<div class="table-responsive" id="result">
    <p></p>
    <form id="form3"> 
    <table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered" >
    <thead>
    <tr style="font-weight: bold;">
    
    <td style="text-align: center; ">จุดประสงค์การยืม-คืน</td>
    <td style="text-align: center; ">ชื่อผู้เช่ายืม</td>
    <td style="text-align: center; ">หน่วยงาน</td>
    <td style="text-align: center; ">พนักงานจัดสรร</td>
    <td style="text-align: center; ">สถานะ</td>
    <td style="text-align: center; ">จัดการ</td>
    <td style="text-align: center; ">รายละเอียด</td>
    
    </tr>
    </thead>
    <tr>
            <td style="text-align:center" colspan="7"><font size="3" color="red"><b>ไม่พบข้อมูล</b></font></td>
            
            </tr>';
}


?>

