<?php
session_start();
include("../db_connect.php");

?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">      
    <style>
            
            td {
                padding: 3px;
                text-align: center;    
            }

            body{
            font-family: 'Sarabun', sans-serif;
            
            }


            .search-table-outter { overflow-x: scroll; }
            .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
            @page { margin: 0; }
    </style>
    </head>
 

    <title>ใบยืมครุภัณฑ์คอมพิวเตอร์และอุปกรณ์ต่อพ่วง</title>
        <body onload="window.print()">


        <?php 

            $pm_id = $_GET['print'];
            
          
        $sql = "SELECT * 
        FROM `permit` 
        LEFT JOIN permit_detail 
        ON permit_detail.per_id = permit.pm_id
        LEFT JOIN department
        ON department.dep_id = permit.pm_dep
        LEFT JOIN employee
        ON employee.emp_id = permit.pm_empno
        WHERE permit.pm_id = $pm_id";
        
        $result = mysqli_query($conn, $sql);

        $type  = array();
        $barcode  = array();
        $sr  = array();

        while($pm = mysqli_fetch_array($result)){

                                        
                                        $per_id= $pm["per_id"];
                                        $pm_date= $pm["pm_date"];
                                        $pmd_con_name= $pm["pmd_con_name"];
                                        $pm_userTname= $pm["pm_userTname"];
                                        $pm_username= $pm["pm_username"];
                                        $pm_position= $pm["pm_position"];
                                        $pm_userno= $pm["pm_userno"];
                                        $pm_head = $pm["pm_head"];
                                        $pm_hd_position =$pm["pm_hd_position"];
                                        $pm_head_dc = $pm["pm_head_dc"];
                                        $pm_dc_position =$pm["pm_dc_position"];
                                        $pm_note = $pm["pm_note"];
                                        $pm_TypeR = $pm["pm_TypeR"];
                                        $pm_fname = $pm["emp_fname"];
                                        $pm_lname = $pm["emp_lname"];
                                        $emp_position = $pm["emp_position"];
                                        $emp_id = $pm["emp_id"];
                                        $pmd_type_name = $pm["pmd_type_name"];
                                        $pmd_eq_barcode = $pm["pmd_eq_barcode"];
                                        $pmd_eq_serial = $pm["pmd_eq_serial"];
                                        $pm_firstdate =$pm["pm_firstdate"];
                                        $pm_enddate = $pm["pm_enddate"];

                    array_push($type,$pmd_type_name);
                    array_push($barcode,$pmd_eq_barcode);
                    array_push($sr,$pmd_eq_serial);

                    

                                 
        }                           
                                       
                                     
        ?>

                   
                    <br>
                    
                    </div>
                    <br>
                    <div class="container" style="width:100% " > 

                    <table border="0" align="center" style="width:90%" >
                    <tr>
                    <td style ="width:20%"><img src="img/sut.png" width="100%" ></td>
                    <td style ="width:80%">ใบยืมครุภัณฑ์คอมพิวเตอร์และอุปกรณ์ต่อพ่วง
                    <br>ศูนย์คอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีสุรนารี <br>
                    บริการแจ้งซ่อมผ่านระบบ Online ที่ http://eCCS.sut.ac.th สายด่วนโทร 1919</td>
                    </tr>
                    </table>
                    </div>
                    <table border="1" style="width:90%; font-size:13px;" align="center" >
                                        <tr>
                                        <td colspan="4" border="0"><div align='left'>เรียน ผู้อำนวยการศูนย์คอมพิวเตอร์<br>
                                        ข้าพเจ้า  &emsp;<?php echo $pm_fname; ?>&nbsp;<?php echo $pm_lname; ?> &emsp;
                                        &emsp;&emsp;
                                        ตำแหน่ง &emsp;<?php echo $emp_position; ?> <br>
                                        รหัสพนักงาน &emsp;<?php echo $emp_id; ?> &emsp; สังกัดหน่วยงาน &emsp; ศูนย์คอมพิวเตอร์ <br>
                                        </div>
                                        </td>
                                        </tr>
                                        
                                        <tr>

                                        <td colspan="2" border="0"><div align='left'>อุปกรณ์</div></td> 
                                        <td> <div align='left'>Barcode/รหัสพัสดุ</div></td>
                                        <td><div align='left'>Serial Number</div></td>
                                            
                                        
                                        </tr>

                                        <?php foreach ($type as $key => $value) {  ?>
                                        <tr>
                                            <td colspan="2" border="0">

                                        
                                                        <div align='left'>
                                                        <?php echo $value; ?>
                                                        </div>
                                                        </td>
                                                    
                                                        <td>
                                                        <div align='left'>
                                                        <?php echo $barcode[$key];?>
                                                        </div>
                                                        </td>

                                                        <td>
                                                        <div align='left'>
                                                        <?php echo $sr[$key]; ?>
                                                        </div>
                                                        </td>
                                        </tr>
                                        <?php  } ?>

                                    
                                       
                                        <tr>
                                        <td colspan="2" border="0"> 
                                        <div align='left'>
                                        ผู้ยืม <br>
                                        
                                        <br>
                                        </div>
                                        <div align='rigth'>
                                        (<?php echo $pm_userTname; ?><?php echo $pm_username; ?>)<br>
                                        ตำแหน่ง : <?php echo $pm_position; ?><br>
                                        วันที่ <?php echo date('d/m/Y'); ?>
                                        </div>
                                        </td>
                                        <td colspan="2" border="0">
                                        <div align='left'>
                                        ผู้รับรองการยืม <br><br>
                                        </div>
                                        <div align='rigth'>
                                        (<?php echo $pm_head;?> )<br>
                                        ตำแหน่ง : <?php echo $pm_hd_position;?> <br>
                                        วันที่ <?php echo date('d/m/Y'); ?>
                                        </div>
                                        </td>
                                        </tr>
                                       
                                        <tr>
                                        <td colspan="4" border="0"> สำหรับศูนย์คอมพิวเตอร์</td>
                                        
                                        </tr>
                                        <tr>
                                        <td colspan="2" border="0">
                                        <div align='left'>
                                        สัญญาเลขที่ <?php echo $pmd_con_name; ?>
                                        </div>
                                        <br>
                                        <div align='rigth'>
                                        (<?php echo $pm_fname; ?>&nbsp;<?php echo $pm_lname; ?>)<br>
                                        วันที่ <?php echo date('d/m/Y'); ?><br>
                                        ผู้ติดตั้ง/ผู้ตรวจสอบ/ผู้จัดสรร
                                        </div>
                                        </td>
                                        <td colspan="2" border="0">
                                        <div align='left'>
                                        อนุมัติ
                                        
                                        </div>
                                        <br>
                                        <div align='rigth'>
                                        ( <?php echo $pm_head_dc;?> )<br>
                                        ตำแหน่ง : <?php echo $pm_dc_position;?> <br>
                                        วันที่ <?php echo date('d/m/Y'); ?>
                                        </div>
                                        </td>
                                        </tr>


                                        </tr>
                                        <tr>
                                        <td colspan="2" border="0">
                                        <div align='left'>
                                        กรณีคืนเครื่อง
                                        </div>
                                        <div align='rigth'>
                                        ลงชื่อ .............................. ผู้คืน <br>
                                        ( ...........................................)<br>
                                        ลงชื่อ .............................. ผู้รับคืน <br>
                                        ( ...........................................)<br>
                                        วันที่ <?php echo date('d/m/Y'); ?><br>
                                        
                                        </div>
                                        </td>
                                        <td colspan="2" border="0">
                                        <div align='left'>
                                        ประเภทการใช้งาน <br>
                                        <?php echo $pm_TypeR; ?>
                                        <br><br><br><br><br>
                                        </div>
                                        
                                        </td>
                                        </tr>

                                        <tr>
                                        <td colspan="2" rowspan="2" border="0">
                                        <div align='left'>
                                        หมายเหตุ <br>
                                        จัดสรรให้ตามหนังสือเลขที่ ศธ. <br><br><br><br>
                                        </div>
                                        </td>

                                        <td>
                                        <div align='center'>
                                        ราคาเครื่องละ <br>
                                        ........................
                                        </div>
                                        </td>
                                        <td>
                                        <div align='center'>
                                        ระยะเวลาตั้งแต่ <br>
                                        <?php echo $pm_firstdate; ?> ถึง <?php echo $pm_enddate; ?><br>
                                        
                                        </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <td>
                                        <div align='center'>
                                        จัดเช่า/ซื้อ ทั้งสิ้น <br>
                                        ........................
                                        </div>
                                        </td>
                                        <td>
                                        <div align='center'>
                                        เช่า/ซื้อจาก <br>
                                        .................................... <br> 
                                        </div></td>
                                        </tr>

                                        <tr>
                                        <th colspan="4" border="0">
                                        <div align='center'>
                                        <br>  กรุณาส่งเอกสารกลับศูนย์คอมพิวเตอร์ ภายใน 7 วัน <br><br>
                                        </div>
                                        </th>
                                        </tr>
</table>
<br>
<br>
                        
                        </body>
                        </html>