<style>
input[type="text"] {
  height: 30px; }
</style>

<?php
include("db_connect.php");

 $sql ="SELECT * FROM `allocate` 
 RIGHT JOIN allocate_detail
 ON allocate_detail.ac_id = allocate.ac_id 
 LEFT JOIN a_status
 ON a_status.status_id = allocate.ac_status
 INNER JOIN equipment
 ON equipment.eq_status = a_status.status_id 
 LEFT JOIN tor 
 ON tor.tor_id = equipment.eq_tor
 LEFT JOIN type_eq
 ON type_eq.type_id = tor.tor_type
 LEFT JOIN contract
 ON contract.con_id = tor.tor_contract
 LEFT JOIN department
 ON department.dep_id = allocate.ac_dep";



$barcode = "";
$title = "";
$sn = "";
$dep_no = "";
$dep_name = "";
$dep_type = "";
$empid ="";
$emp_name ="";
$emp_po = "";
$contract = "";
$tor = "";
$status = "";


 
 $rs = $conn->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     
     $barcode = $row["ald_eq_barcode"];
     $title = $row["ald_type_name"];   
     $sn = $row["ald_eq_serial"];
     $dep_no = $row["dep_no"];
     $dep_name = $row["dep_name"];
     $dep_type = $row["ac_typeR"];
     $empid = $row["ac_empid"];
     $emp_name = $row["ac_name"];
     $emp_po = $row["ac_position"];
     $contract = $row["con_des"];
     $tor = $row["tor_des"];
     $status = $row["status_name"];
    
   
 }
 
 
 echo  
'<table style="width:90%" align="center">
    
     <tr>
     <td style="text-align: left;">Barcode  :</td>
     <td><input type="text" class="form-control" id="bar_code" name="bar_code" style="width:99%" value="'.$barcode.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">รายการ  :</td>
     <td><input type="text" class="form-control" id="title" name="title" style="width:99%" value="'.$title.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">Serial No.  :</td>
     <td><input type="text" class="form-control" id="al_type" name="al_type" style="width:99%" value="'.$sn.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">รหัสหน่วยงาน  :</td>
     <td><input type="text" class="form-control" id="dep_id" name="dep_id" style="width:99%" value="'.$dep_no.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">หน่วยงาน  :</td>
     <td><input type="text" class="form-control" id="dep_name" name="dep_name" style="width:99%" value="'.$dep_name.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ประเภทห้อง  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$dep_type.'" readonly>  </td>
     </tr>  
     
     <tr>
     <td style="text-align: left;">รหัสพนักงาน  :</td>
     <td><input type="text" class="form-control" id="al_name" name="al_name" style="width:99%" value="'.$empid.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ชื่อ-สกุล  :</td>
     <td><input type="text" class="form-control" id="al_po" name="al_po" style="width:99%" value="'.$emp_name.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ตำแหน่ง  :</td>
     <td><input type="text" class="form-control" id="per_a" name="per_a" style="width:99%" value="'.$emp_po.'" readonly>  </td>   
     </tr>      
     <tr>
     <td style="text-align: left;">สัญญาเช่า  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$contract.'" readonly>  </td>
     </tr>  
     <tr>
     <td style="text-align: left;">Specification  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$tor.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">สถานะ  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$status.'" readonly>  </td>
     </tr>   
                                       
 </table>';
 ?>
 
 

