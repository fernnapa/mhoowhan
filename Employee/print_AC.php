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
   
    <title>แบบฟอร์มการจัดสรรครุภัณฑ์คอมพิวเตอร์</title>
        <body onload="window.print()">


        <?php 

            $ac_id = $_GET['print'];
            
          
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
                                        $ac_hd_position =$ac["ac_hd_position"];
                                        $ac_head_dc = $ac["ac_head_dc"];
                                        $ac_dc_position =$ac["ac_dc_position"];
                                        $ac_note = $ac["ac_note"];
                                        $ald_type_name = $ac["ald_type_name"];

                                 
        }                           
                                       
                                     
        ?>
            
<!-- Modal ดูข้อมูลPM -->
               <br>       
                    <div align='rigth'>
                  
                    </div>
                    <br>
                    <div class="container" style="width:90% " > 
                    <table border="0" align="center" style="width:90%;" >
                    <tr>
                    <td>แบบฟอร์มการจัดสรรเครื่องคอมพิวเตอร์</a></button></td>
                    </tr>
                    </table>
                    </div>

                     <!-- แบบฟอร์ม -->
                    <table border="1" style="width:90%; font-size:13px;" align="center" >
                    
                                        <tr>
                                        <td>

                                        <div align='left'>
                                        เลขที่แบบฟอร์ม CCS01-<?php echo date('Y'); ?>-<?php echo $ac_id ?><br>
                                         รับเมื่อวันที่ <?php echo $ac_date; ?><br>
                                         เวลา <?php echo date("H")+6,date(": i น."); ?>
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

                                        <?php 
                                        
                                        
                                            $sql_select_type = "SELECT ald_type_name , ald_con_name ,COUNT(ald_type_name) AS total FROM `allocate_detail` 
                                            WHERE ac_id = $ac_id
                                            GROUP by ald_type_name"; 
                                                              
                                            $rs_select_type = mysqli_query($conn, $sql_select_type);
                                            while($item = mysqli_fetch_assoc($rs_select_type)){

                                                $cn  =   $item['ald_con_name'];
                                                $tn  =   $item['ald_type_name'];

                                                $tor = "SELECT * FROM tor
                                                LEFT JOIN type_eq
                                                ON tor.tor_type = type_eq.type_id
                                                LEFT JOIN contract
                                                ON tor.tor_contract = contract.con_id
                                                WHERE type_name = '$tn' AND con_name = '$cn' ";

                                            $result2 = mysqli_query($conn, $tor);
                                            while($data2 = mysqli_fetch_array($result2)){
                                                  $tor_name  = $data2['tor_name'];
                                            }

                                        



                                        //    $rs_select_type = $conn->query($sql_select_type);s

                                        //    while($item = $rs_select_type->fetch_assoc()){

                                        ?>
                                        
                                        &emsp;&emsp;<input type="checkbox" name="check" checked> ชนิดเครื่องคอมพิวเตอร์ &emsp;<?php echo $item["ald_type_name"];?>
                                        &emsp;ตาม <?php echo $tor_name; ?> &emsp; สัญญาที่ &emsp;<?php echo $item["ald_con_name"];?> &emsp; จัดสรรครั้งนี้ จำนวน &emsp;<?php echo $item["total"]; ?> &emsp; เครื่อง  <br/>

                                        
                                        <?php } ?>
                                        
                                        &emsp;&emsp;<input type="checkbox" name="AC" id="AC" > ไม่ควรจัดสรร  &emsp;&emsp; เนื่องจาก <br><br>
                                        &emsp;&emsp; เพื่อโปรดพิจารณา ทั้งนี้ ได้แนบสถานะการจัดสรรเครื่องคอมพิวเตอร์มาพร้อมนี้ด้วยแล้ว <br><br><br>
                                        </div>
                                        <div align='right'>
                                        ( <?php echo $ac_head; ?>)<br>
                                        <?php echo $ac_hd_position; ?><br>
                                        <?php echo date('d-m-Y'); ?><br><br>
                                        </div>

                                        <div align='left'>
                                        2. ผลการพิจารณา<br>
                                        &emsp;&emsp; <input type="checkbox" name="pass" checked> อนุมัติ &emsp; <input type="checkbox" name="no" > ไม่อนุมัติ &nbsp; &nbsp; เนื่องจาก
                                        </div>

                                        <div align='right'><br><br>
                                        ( <?php echo $ac_head_dc; ?>)<br>
                                        <?php echo $ac_dc_position; ?><br>
                                        <?php echo date('d-m-Y'); ?><br><br>
                                        </div>

                                        </td>
                                        </tr>
                                        
                            
                                        </table>
                                        <br><br><br><br>
                   
             
             </body>
       </html>
                    
                    