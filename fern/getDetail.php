<style>
input[type="text"] {
  height: 30px; }

</style>

<?php
$connect = mysqli_connect("localhost", "root", "", "db_com"); 
mysqli_query($connect, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){

     $id = $_GET['id'];
 }


 $sql = "SELECT *
FROM allocate 

LEFT JOIN a_status
ON a_status.status_id = allocate.ac_status
LEFT JOIN contract
ON contract.con_id = allocate.ac_contract
LEFT JOIN department
ON department.dep_id = allocate.ac_dep
LEFT JOIN equipment
ON equipment.eq_id = allocate.ac_equipment
LEFT JOIN tor
ON tor.tor_id = tor.tor_contract
WHERE ac_id = $id";

$per_bar = "";
$per_title = "";
$per_dep = "";
$per_dname = "";
$per_type = "";
$per_pic = "";

$per_empid ="";
$per_aname ="";
$per_po = "";

$per_sn = "";
$per_refer = "";
$per_con = "";
$per_tor = "";
$per_status = "";
 
 $rs = $connect->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $id = $row["ac_id"];
     $per_bar = $row["ac_barcode"];
     $per_title = $row["ac_title"];
     $per_dep = $row["dep_no"];
     $per_dname = $row["dep_name"];
     $per_type = $row["ac_typeR"];
     

     $per_empid = $row["ac_empid"];
     $per_aname = $row["ac_name"];
     $per_po = $row["ac_position"];

     $per_sn = $row["ac_serial"];
     $per_refer = $row["ac_refer"];
     $per_con = $row["con_des"];
     $per_tor = $row["tor_des"];
     $per_status = $row["status_name"];

 }
 
 
 echo  
'<table style="width:90%" align="center">
    
     <tr>
     <td style="text-align: left;">Barcode  :</td>
     <td><input type="text" class="form-control" id="bar_code" name="bar_code" style="width:99%" value="'.$per_bar.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">รายการ  :</td>
     <td><input type="text" class="form-control" id="title" name="title" style="width:99%" value="'.$per_title.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">รหัสหน่วยงาน  :</td>
     <td><input type="text" class="form-control" id="dep_id" name="dep_id" style="width:99%" value="'.$per_dep.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">หน่วยงาน  :</td>
     <td><input type="text" class="form-control" id="dep_name" name="dep_name" style="width:99%" value="'.$per_dname.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">สัญญาเช่า  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_type.'" readonly>  </td>
     </tr>   
     <tr>
     <td style="text-align: left;">รหัสพนักงาน  :</td>
     <td><input type="text" class="form-control" id="al_name" name="al_name" style="width:99%" value="'.$per_empid.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ชื่อ-สกุล  :</td>
     <td><input type="text" class="form-control" id="al_po" name="al_po" style="width:99%" value="'.$per_aname.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ตำแหน่ง  :</td>
     <td><input type="text" class="form-control" id="per_a" name="per_a" style="width:99%" value="'.$per_po.'" readonly>  </td>
     
     </tr>
     
     <tr>
     <td style="text-align: left;">ประเภท  :</td>
     <td><input type="text" class="form-control" id="al_type" name="al_type" style="width:99%" value="'.$per_sn.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">Serial No.  :</td>
     <td><input type="text" class="form-control" id="serial" name="serial" style="width:99%" value="'.$per_refer.'" readonly>  </td>
     </tr>
     
     <tr>
     <td style="text-align: left;">สถานะ  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_con.'" readonly>  </td>
     </tr>  
     <tr>
     <td style="text-align: left;">สัญญาเช่า  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_tor.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">Specification  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_status.'" readonly>  </td>
     </tr>   
                                       

 </table>';
 ?>
 
 

