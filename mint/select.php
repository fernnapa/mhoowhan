<?php
include("../Home/db_connect.php");
mysqli_query($con, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){

     $id = $_GET['id'];
 }
 
 
                $sql = "SELECT * FROM equipment 
                LEFT JOIN allocate ON allocate.ac_barcode = equipment.eq_barcode
                LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                LEFT JOIN contract ON tor.tor_contract = contract.con_id
                LEFT JOIN a_status ON equipment.eq_status = a_status.status_id 
                
                
                
                WHERE eq_id = $id";

            // $barcode="";
            // $pic="";
            // $titlelist="";
            // $tor="";
            // $serial="";
            // $status="";
            // $dep="";
            // $dname="";
            // $contract ="";
            // $tname ="";
            // $name ="";
            // $position ="";
            // $empid ="";
            // $typeR ="";
            // $refery ="";
            // $note ="";
            // $allocate_no ="";

 
                $rs = $conn->query($sql);
                while($row = mysqli_fetch_assoc($rs)){
                

                    $barcode= $row["eq_barcode"];
                    $pic= $row["eq_pic"];
                    $titletor= $row["type_name"];
                    $serial= $row["eq_serial"];
                    $status= $row["status_name"];
                    $dep= $row["ac_dep"];
                    $dname= $row["ac_dname"];
                    $contract = $row["con_des"];
                    $tname = $row["ac_tname"];
                    $name = $row["ac_name"];
                    $position = $row["ac_position"];
                    $empid = $row["ac_empid"];
                    $typeR = $row["ac_typeR"];
                    $refer = $row["ac_refer"];
                    $note = $row["ac_note"];
                    $allocate_id = $row["ac_emp"];
 
                }
 
 
        echo  
        '<table style="width:90%" align="center">
        <tr>
            <td style="text-align: left;">Barcode</td>
            <td><input type="text" id="barcode" name="barcode" style="width:99%" value="'.$barcode.'" readonly>  </td>
        </tr>
        <tr>
            <td style="text-align: left;">รายการ</td>
            <td><input type="text" id="title" name="title" style="width:99%" value="'.$titletor.'" readonly>  </td>
        </tr>
        <tr>
            <td style="text-align: left;">Serial Number</td>
            <td><input type="text" id="SN" name="SN" style="width:99%" value="'.$serial.'" readonly>  </td>
        </tr>
        <tr>
            <td style="text-align: left;">สถานะ</td>
            <td><input type="text" id="status" name="status" style="width:99%" value="'.$status.'" readonly>  </td>
        </tr>
        <tr>
            <td style="text-align: left;">หน่วยงาน</td>
            <td><input type="text" id="dname" name="dname" style="width:99%" value="'.$dname.'" readonly>  </td>
        </tr> 
        <tr>
            <td style="text-align: left;">รหัสหน่วยงาน</td>
            <td><input type="text" id="dep_" name="dep_no" style="width:99%" value="'.$dep.'" readonly>  </td>
        </tr>   
        <tr>
            <td style="text-align: left;">สัญญาเช่า</td>
            <td><input name="con" type="text" id="con" style="width:99%" value="'.$contract.'" readonly></td>
        </tr>
        <tr>
            <td style="text-align: left;">คำนำหน้า </td>
            <td ><input name="tname" type="text" id="tname" style="width:99%" value="'.$tname.'" readonly/></td>
        </tr>
        <tr>
            <td style="text-align: left;">ชื่อผู้เช่ายืม</td>
            <td><input name="name" type="text" id="name" style="width:99%" value="'.$name.'" readonly/></td>
        </tr>  
        <tr>
            <td style="text-align: left;">ตำแหน่ง </td>
            <td><input name="position" type="text" id="position" style="width:99%" value="'.$position.'" readonly/></td>
        </tr>
        <tr>
            <td style="text-align: left;">รหัสพนังงาน  </td>
            <td><input name="empid" type="text" id="empid" style="width:99%" value="'.$empid.'" readonly/></td>
        </tr>
        <tr>
            <td style="text-align: left;">ประเภทห้อง </td>
            <td><input name="typeR" type="text" id="typeR" style="width:99%" value="'.$typeR.'" readonly/></td>
        </tr>
        <tr>
            <td style="text-align: left;">หนังสืออ้างอิง</td>
            <td ><input name="refer" type="text" id="refer" style="width:99%" value="'.$refer.'" readonly/></td>
        <tr/>
        <tr>
            <td style="text-align: left;">หมายเหตุ </td>
            <td><input name="note" type="text" id="note" style="width:99%" value="'.$note.'" readonly/></td>
        </tr>   
        <tr>
            <td style="text-align: left;">รหัสพนักงานจัดสรร  </td>
            <td><input name="allo_no" type="text" id="allo_no" style="width:99%" value="'.$allocate_id.'" readonly/></td>
        </tr>                                       
        </tr>
        </table>';
        ?>
        
        

