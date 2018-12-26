<?php
$connect = mysqli_connect("localhost", "root", "", "db_ccs"); 
mysqli_query($connect, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){

     $id = $_GET['id'];
 }
 
 
 $sql = "SELECT *
FROM allocate 
LEFT JOIN status
ON status.status_id = allocate.status_id
LEFT JOIN agreement
ON agreement.ag_id = allocate.rent_id
LEFT JOIN tor
ON tor.tor_id = tor.ag_id
WHERE allocate_id = $id";

$per_bar="";
$per_title="";
$per_de="";
$per_name="";
$per_a="";
$per_po="";
$per_aid="";
$per_type="";
$per_sn="";
$per_status="";
$per_rent="";
$per_tor="";
 
 $rs = $connect->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $per_bar = $row["bar_code"];
     $per_title = $row["a_title"];
     $per_de = $row["depart_id"];
     $per_name = $row["depart_name"];
     $per_a = $row["a_name"];
     $per_po = $row["a_position"];
     $per_aid = $row["a_id"];
     $per_type = $row["type_r"];
     $per_sn = $row["a_serial_no"];
     $per_status = $row["status_name"];
     $per_rent = $row["ag_name"];
     $per_tor = $row["tor_detail"];

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
     <td><input type="text" class="form-control" id="dep_id" name="dep_id" style="width:99%" value="'.$per_de.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">หน่วยงาน  :</td>
     <td><input type="text" class="form-control" id="dep_name" name="dep_name" style="width:99%" value="'.$per_name.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">รหัสพนักงาน  :</td>
     <td><input type="text" class="form-control" id="al_name" name="al_name" style="width:99%" value="'.$per_aid.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ชื่อ-สกุล  :</td>
     <td><input type="text" class="form-control" id="al_po" name="al_po" style="width:99%" value="'.$per_a.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ตำแหน่ง  :</td>
     <td><input type="text" class="form-control" id="per_a" name="per_a" style="width:99%" value="'.$per_po.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">ประเภท  :</td>
     <td><input type="text" class="form-control" id="al_type" name="al_type" style="width:99%" value="'.$per_type.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">Serial No.  :</td>
     <td><input type="text" class="form-control" id="serial" name="serial" style="width:99%" value="'.$per_sn.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">สถานะ  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_status.'" readonly>  </td>
     </tr>  
     <tr>
     <td style="text-align: left;">สัญญาเช่า  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_rent.'" readonly>  </td>
     </tr>
     <tr>
     <td style="text-align: left;">Specification  :</td>
     <td><input type="text" class="form-control" id="stat" name="stat" style="width:99%" value="'.$per_tor.'" readonly>  </td>
     </tr>                                           

 </table>';
 ?>
 
 

