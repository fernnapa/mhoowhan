<?php
include_once 'db_connect.php';

?>
<!DOCTYPE html>
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("link.php");?>
        <link rel="stylesheet" href="style.css">      
    <style>
            
            td {
                padding: 3px;
                text-align: center;    
            }
            
            
           
            .search-table-outter { overflow-x: scroll; }
            .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
    </style>
    </head>
    <title>แบบฟอร์มการจัดสรรครุภัณฑ์คอมพิวเตอร์</title>
        <body >


        <?php 

            $ac_id = $_GET['ac_id'];
            
          
        $sql = "SELECT * 
        FROM `allocate` 
        LEFT JOIN allocate_detail 
        ON allocate_detail.ac_id = allocate.ac_id
        LEFT JOIN department
        ON department.dep_id = allocate.ac_dep
        WHERE allocate.ac_id = $ac_id";
        
        $result = mysqli_query($conn, $sql);
        while($ac = mysqli_fetch_array($result)){

                                        $ac_id= $ac["ac_id"];
                                        $ac_date= $ac["ac_date"];
                                        $ald_con_name= $ac["ald_con_name"];
                                        $ac_tname= $ac["ac_tname"];
                                        $ac_name= $ac["ac_name"];
                                        $ac_position= $ac["ac_position"];
                                        $ac_empid= $ac["ac_empid"];
                                        $ac_head = $ac["ac_head"];
                                        $ac_head_dc = $ac["ac_head_dc"];
                                        $ac_note = $ac["ac_note"];
                                 
        }                           
                                       
                                     
        ?>
            
<!-- Modal ดูข้อมูลPM -->
               <br>       
                    <div class="container w3-card-4 w3-round" style="width:100% " > 
                    <table border="0" align="center" style="width:100%;" >
                    <tr>
                    <td><h3><b>แบบฟอร์มการจัดสรรเครื่องคอมพิวเตอร์</b></h3></a></button></td>
                    </tr>
                    </table>
                    </div>

                     <!-- แบบฟอร์ม -->
                    <table border="1" style="width:100%" align="center" >
                    
                                        <tr>
                                        <td>

                                        <div align='left'>
                                        เลขที่แบบฟอร์ม CCS01-<?php echo date('Y'); ?>-<?php echo $ac_id ?><br>
                                         รับเมื่อวันที่ <?php echo $ac_date; ?><br>
                                         เวลา <?php echo date('H:i น.'); ?>
                                        </div>
                                   
                                        </td>
                                        <td >
                                        <div align='left'>
                                        อ้างอิงจากหนังสือรับเลขที่ : <?php echo $ald_con_name; ?><br>
                                        เลขที่หนังสือ ศธ.      <br>
                                        เลขที่ใบงาน 
                                        </div>
                                        </td>

                                        </tr>
                                        <tr >
                                        
                                        <td colspan="2">
                                        <div align='left'>
                                        จากหน่วยงาน : &nbsp; &nbsp; ศูนย์คอมพิวเตอร์ <br>
                                        ชื่อ : &emsp; <?php echo $ac_tname;?><?php echo $ac_name; ?> &emsp;&emsp;  รหัสพนักงาน :&emsp; <?php echo $ac_empid; ?>&emsp;&emsp; ตำแหน่ง :&emsp; <?php echo $ac_position; ?>
                                        </div>
                                        </td>


                                        </tr>
                                        <tr>
                                        <td colspan="2">
                                        <div align='left'>
                                        1. เรียน ผู้อำนวยการศูนย์คอมพิวเตอร์<br>
                                        &emsp;&emsp; เห็นควรดำเนินการดังนี้ <br><br>
                                        &emsp;&emsp;<input type="checkbox" name="test" value="value1" >ชนิดเครื่องคอมพิวเตอร์  &emsp; <input type="checkbox" name="test" value="value1">PC &emsp; <input type="checkbox" name="test" value="value1">AIO &emsp; <input type="checkbox" name="test" value="value1">NB 
                                        &emsp; ตามTOR &emsp;&emsp; สัญญาที่ &emsp;&emsp; จำนวน  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;&emsp; จัดสรรครั้งนี้ จำนวน &emsp;&emsp; เครื่อง  &emsp;&emsp; คงเหลือ  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;<input type="checkbox" name="test" value="value1" >ชนิดเครื่องคอมพิวเตอร์  &emsp; <input type="checkbox" name="test" value="value1">PC &emsp; <input type="checkbox" name="test" value="value1">AIO &emsp; <input type="checkbox" name="test" value="value1">NB 
                                        &emsp; ตามTOR &emsp;&emsp; สัญญาที่ &emsp;&emsp; จำนวน  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;&emsp; จัดสรรครั้งนี้ จำนวน &emsp;&emsp; เครื่อง  &emsp;&emsp; คงเหลือ  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;<input type="checkbox" name="test" value="value1" >ชนิดเครื่องคอมพิวเตอร์  &emsp; <input type="checkbox" name="test" value="value1">PC &emsp; <input type="checkbox" name="test" value="value1">AIO &emsp; <input type="checkbox" name="test" value="value1">NB 
                                        &emsp; ตามTOR &emsp;&emsp; สัญญาที่ &emsp;&emsp; จำนวน  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;&emsp; จัดสรรครั้งนี้ จำนวน &emsp;&emsp; เครื่อง  &emsp;&emsp; คงเหลือ  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;<input type="checkbox" name="test" value="value1" >ชนิดเครื่องคอมพิวเตอร์  &emsp; <input type="checkbox" name="test" value="value1">PC &emsp; <input type="checkbox" name="test" value="value1">AIO &emsp; <input type="checkbox" name="test" value="value1">NB 
                                        &emsp; ตามTOR &emsp;&emsp; สัญญาที่ &emsp;&emsp; จำนวน  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;&emsp; จัดสรรครั้งนี้ จำนวน &emsp;&emsp; เครื่อง  &emsp;&emsp; คงเหลือ  &emsp;&emsp; เครื่อง <br>
                                        &emsp;&emsp;<input type="checkbox" name="test" value="value1">ไม่ควรจัดสรร  &emsp;&emsp; เนื่องจาก <br><br>
                                        &emsp;&emsp; เพื่อโปรดพิจารณา ทั้งนี้ ได้แนบสถานะการจัดสรรเครื่องคอมพิวเตอร์มาพร้อมนี้ด้วยแล้ว <br><br><br>
                                        </div>
                                        <div align='right'>
                                        (    &emsp;&emsp;&emsp;&emsp;    )<br>
                                        <br>
                                        <?php echo date('d-m-Y'); ?><br><br>
                                        </div>

                                        <div align='left'>
                                        2. ผลการพิจารณา<br>
                                        &emsp;&emsp; <input type="checkbox" name="test" value="value1"> อนุมัติ &emsp; <input type="checkbox" name="test" value="value1"> ไม่อนุมัติ &nbsp; &nbsp; เนื่องจาก
                                        </div>

                                        <div align='right'>
                                        (    &emsp;&emsp;&emsp;&emsp;    )<br>
                                        <br>
                                        <?php echo date('d-m-Y'); ?><br><br>
                                        </div>

                                        </td>
                                        </tr>
                                        
                            
                                        </table>
                    
                    