<style>
input[type="text"] {
  height: 30px; 
  font-size: 3;
  font-family: 'Kanit', sans-serif;
  }
</style>

<?php
include("../../Home/db_connect.php");

   
$sql = "SELECT * FROM allocate
RIGHT JOIN allocate_detail
ON allocate_detail.ac_id = allocate.ac_id 
LEFT JOIN a_status
ON a_status.status_id = allocate.ac_status
LEFT JOIN department
ON department.dep_id = allocate.ac_dep";

$per_bar = "";
$per_title = "";
$per_sn = "";
$per_dep = "";
$per_dname = "";
$per_type = "";
$per_empid ="";
$per_aname ="";
$per_po = "";
$per_status = "";

 $rs = $conn->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $per_bar = $row["ald_eq_barcode"];
     $per_title = $row["ald_type_name"];
     $per_sn = $row["ald_eq_serial"];
     $per_dep = $row["dep_no"];
     $per_dname = $row["dep_name"];
     $per_type = $row["ac_typeR"];
     $per_empid = $row["ac_empid"];
     $per_aname = $row["ac_name"];
     $per_po = $row["ac_position"];
     $per_status = $row["status_name"];
 }
 
 echo  
'
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2">Barcode  :</font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="bar_code" name="bar_code" style="width:99%" value="'.$per_bar.'" readonly> </td>
    </tr>
    
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> รายการ  :</font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="title" name="title" style="width:99%" value="'.$per_title.'" readonly> </td>
    </tr>
    
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> Serial No.  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="al_type" name="al_type" style="width:99%" value="'.$per_sn.'" readonly> 
    </td>
    </tr>
    
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> รหัสหน่วยงาน  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="dep_id" name="dep_id" style="width:99%" value="'.$per_dep.'" readonly> 
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> หน่วยงาน  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="dep_name" name="dep_name" style="width:99%" value="'.$per_dname.'" readonly> 
    </td>
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> ประเภทห้อง  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_type.'" readonly> 
    </td>
    </tr>
    
    

    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> รหัสพนักงาน  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="al_name" name="al_name" style="width:99%" value="'.$per_empid.'" readonly>  
    </td>
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> ชื่อ-สกุล  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="al_po" name="al_po" style="width:99%" value="'.$per_aname.'" readonly>  
    </td>
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> ตำแหน่ง  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="per_a" name="per_a" style="width:99%" value="'.$per_po.'" readonly>     
    </td>
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> สัญญาเช่า  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$year.'" readonly>  
    </td>
    </tr>
    <tr>
    <td style="text-align: center; font-family:Prompt;"><font size="2"> สถานะ  : </font></td>
    <td style="text-align: center;"><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_status.'" readonly> </td>
    </td>
    </tr>
    <tr>
    <td style="text-align: center; vertical-align:top; font-family:Prompt;"><font size="2"> Specification  : </font></td>
    <td style="text-align: center;"><textarea class="form-control" rows="5" id="comment" name="tor_des" readonly>'.$tor_des.'</textarea>
    </td>
    </tr>          
 ';
 ?>
 
 

