
<?php
include("../db_connect.php");


if(isset($_GET['id'])){

    $id = $_GET['id'];
}

$sql = "SELECT * FROM permit
    LEFT JOIN a_status
    ON permit.pm_status = a_status.status_id
    LEFT JOIN department
    ON permit.pm_dep = department.dep_id
    LEFT JOIN employee
    ON permit.pm_empno = employee.emp_id
    -- LEFT JOIN employee
    -- ON permit.pm_head = employee.emp_no
    -- LEFT JOIN employee
    -- ON permit.pm_head_dc = employee.emp_no
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
    $pm_fname = "";
    $pm_lname = "";
    $pm_date = "";
    $pm_head = "";
    $pm_hd_position  = "";




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
    $pm_fname = $row["emp_fname"];
    $pm_lname =$row["emp_lname"];
    $pm_date = $row["pm_date"];
    $pm_head = $row["pm_head"];
    $pm_hd_position  = $row["pm_dc_position"];

 
}

echo  
'

<div class="table-responsive" >
<table style="width:100%" align="center" border="1" class="table table-hover table-striped table-bordered" >
                                     
    <tr>
    <input type="hidden" name="pm_id" id="pm_id" value="'.$id.'" >
    <input type="hidden" name="pm_userTname" id="pm_userTname" value="'.$pm_userTname.'" >

    <td style="text-align: right;" width="40%;"><b>ชื่อผู้ยืม </b></td>
    <td style="text-align: left;" width="60%;">'.$pm_username.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;" ><b>เลขประจำตัวผู้ยืม </b></td>
    <td style="text-align: left;" >'.$pm_userno.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ตำเเหน่ง </b></td>
    <td style="text-align: left;">'.$pm_position.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>หน่วยงาน </b></td>
    <td style="text-align: left;">'.$pm_dep.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>จุดประสงค์การยืม </b></td>
    <td style="text-align: left;">'.$pm_name.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ประเภทห้อง </b></td>
    <td style="text-align: left;">'.$pm_TypeR.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่เริ่มทำรายการ </b></td>
    <td style="text-align: left;">'.$pm_date.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่เริ่ม </b></td>
    <td style="text-align: left;">'.$pm_firstdate.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>วันที่สิ้นสุด </b></td>
    <td style="text-align: left;" >'.$pm_enddate.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>พนักงานที่ทำรายการยืมคืน </b></td>
    <td style="text-align: left;">'.$pm_fname.'&nbsp;&nbsp;'.$pm_lname.'</td> 
    </tr>
    <tr>
    <td style="text-align: right;"><b>ผู้ทำการตรวจสอบ </b></td>
    <td style="text-align: left;">'.$pm_head.'
    <input type="hidden" name="pm_hd_position" id="pm_hd_position" value="'.$pm_hd_position.'" ></td> 
    </tr>
    
    </table>
    </div>
    <br><br>
        
    
    <h4 align="center" style="font-family:Prompt; font-weight: bold;">รายการครุภัณฑ์ของศูนย์คอมพิวเตอร์</h4>  



    
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

