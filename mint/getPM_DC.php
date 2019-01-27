<?php
session_start();
include("../Home/db_connect.php");


if(isset($_GET['id'])){

    $id = $_GET['id'];
}

$sql = "SELECT * FROM permit
    LEFT JOIN a_status
    ON permit.pm_status = a_status.status_id
    LEFT JOIN department
    ON permit.pm_dep = department.dep_id 
    WHERE pm_id = $id";
$pm_name = "";
$pm_userTname = "";
$pm_username = "";
$pm_userno = "";
$pm_position= "";
$pm_dep = "";
$pm_TypeR = "";
$pm_firstdate = "";
$pm_enddate = "";
$pm_empno = "";
$pm_date = "";
$pm_head = "";
$pm_hd_position ="";
$pm_head_dc = "";
$pm_dc_position ="";



$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
    $pm_name = $row["pm_name"];
    $pm_userTname = $row["pm_userTname"];
    $pm_username = $row["pm_username"];
    $pm_userno = $row["pm_userno"];
    $pm_position = $row["pm_position"];
    $pm_dep = $row["dep_name"];
    $pm_TypeR = $row["pm_TypeR"];
    $pm_firstdate = $row["pm_firstdate"];
    $pm_enddate = $row["pm_enddate"];
    $pm_empno = $row["pm_empno"];
    $pm_date = $row["pm_date"];
    $pm_head = $row["pm_head"];
    $pm_hd_position =$row["pm_hd_position"];
    $pm_head_dc = $_SESSION["User"];
    $pm_dc_position =  $_SESSION["emp_position"];


 
}

echo  
'

<div class="table-responsive" >
<table style="width:100%" align="center" border="1" class="table-bordered" >
                                     
    <tr>
    <input type="hidden" name="pm_id" id="pm_id" value="'.$id.'" >
    <input type="hidden" name="pm_userTname" id="pm_userTname" value="'.$pm_userTname.'" >

    <td style="text-align: right;" width="40%;"><b>ชื่อผู้ยืม </b></td>
    <td width="60%;"><input type="text"  name="pm_username" id="pm_username" value="'.$pm_username.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;" width="30%;"><b>เลขประจำตัวผู้ยืม </b></td>
    <td width="20%;"><input type="text" name="pm_userno" id="pm_userno" value="'.$pm_userno.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ตำเเหน่ง </b></td>
    <td ><input type="text" name="pm_position" id="pm_position" value="'.$pm_position.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>หน่วยงาน </b></td>
    <td ><input type="text" name="pm_dep" id="pm_dep" value="'.$pm_dep.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ประเภทห้อง </b></td>
    <td ><input type="text" name="pm_TypeR" id="pm_TypeR" value="'.$pm_TypeR.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่เริ่มทำรายการ </b></td>
    <td ><input type="text" name="pm_date" id="pm_date" value="'.$pm_date.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่เริ่ม </b></td>
    <td><input type="text" name="pm_firstdate" id="pm_firstdate" value="'.$pm_firstdate.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่สิ้นสุด: </b></td>
    <td ><input type="text" name="pm_enddate" id="pm_enddate" value="'.$pm_enddate.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>พนักงานที่ทำรายการยืมคืน </b></td>
    <td ><input type="text" name="pm_empno" id="pm_empno" value="'.$pm_empno.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>หัวหน้าฝ่ายที่ตรวจสอบ </b></td>
    <td ><input type="text" name="pm_empno" id="pm_empno" value="'.$pm_head.'" readonly style="cursor: not-allowed; border: none;" ></td> 
    <td ><input type="hidden" name="pm_hd_position" id="pm_hd_position" value="'.$pm_hd_position.'" ></td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ผู้อนุมัติการยืม-คืน </b></td>
    <td ><input type="text" name="pm_head_dc" id="pm_head_dc"  value="'.$pm_head_dc.'"readonly style="cursor: not-allowed; border: none;"></td> 
    <td ><input type="hidden" name="pm_dc_position" id="pm_dc_position" value="'.$pm_dc_position.'" ></td> 
    </tr>
    </table>
    </div>
    <br>
    
    



    
  <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">Serial</td>
                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                        <td style="text-align: center;">สัญญา</td>

                   </tr>
                    </thead>
                    <tr>';
                    
                       $sql = "SELECT * FROM permit_detail
                            WHERE per_id = $id";
                       $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):

                echo    '<td style="text-align:left">'.$data['pmd_eq_barcode'].'</td>
                        <td style="text-align:left">'.$data['pmd_eq_serial'].'</td>
                        <td style="text-align:left">'.$data['pmd_con_name'].'</td>
                        <td style="text-align:left">'.$data['pmd_type_name'].'</td>

                    </tr>';
                endwhile;
                echo '</table>';
                
                

?>

