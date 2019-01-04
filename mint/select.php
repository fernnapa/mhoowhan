<?php
include ('connection.php');
mysqli_query($con, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){

     $id = $_GET['id'];
 }
 
 
 $sql = "SELECT *
FROM db_com WHERE com_no = $id";

$barcode="";
$list="";
$sn="";
$refer="";
$tor="";
$status="";

 
 $rs = $con->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $barcode = $row["bar_id"];
     $list = $row["com_list"];
     $sn = $row["com_sn"];
     $refer = $row["refer"];
     $tor = $row["TOR"];
     $status = $row["Status_com"];
    
 }
 
 
 echo  
'<table style="width:90%" align="center">
 <tr>
     <td style="text-align: left;">Barcode</td>
     <td><input type="text" id="bar_code" name="bar_code" style="width:99%" value="'.$barcode.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">รายการ</td>
     <td><input type="text" id="title" name="title" style="width:99%" value="'.$list.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">SN Number</td>
     <td><input type="text" id="dep_id" name="dep_id" style="width:99%" value="'.$sn.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">หนังสืออ้างอิง</td>
     <td><input type="text" id="dep_name" name="dep_name" style="width:99%" value="'.$refer.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">ประเภทครุภัณฑ์(TOR)</td>
     <td><input type="text" id="dep_name" name="dep_name" style="width:99%" value="'.$tor.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">สถานะ</td>
     <td><input type="text" id="al_name" name="al_name" style="width:99%" value="'.$status.'" readonly>  </td>
</tr>    
<tr>
     <td style="text-align: left;">รหัสหน่วยงาน  </td>
     <td><input name="ins_no" type="text" id="ins_no" style="width:99%" value="" readonly></td>
</tr>
<tr>
    <td style="text-align: left;">หน่วยงาน  </td>
    <td ><input name="ins" type="text" id="ins" style="width:99%" value="" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">คำนำหน้า  </td>
    <td><input name="prefix" type="text" id="prefix" style="width:99%" value="" readonly/></td>
</tr>  
<tr>
    <td style="text-align: left;">ชื่อผู้เช่ายืม  </td>
    <td><input name="emp_name" type="text" id="emp_name" style="width:99%" value="" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">ตำแหน่ง  </td>
    <td><input name="position" type="text" id="position" style="width:99%" value="" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">รหัสพนักงาน </td>
    <td><input name="emp_id" type="text" id="emp_id" style="width:99%" value="" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">ประเภท  </td>
    <td ><input name="category" type="text" id="category" style="width:99%" value="" readonly/></td>
<tr/>
<tr>
    <td style="text-align: left;">รหัสพนักงานจัดสรร  </td>
    <td><input name="emp_no" type="text" id="emp_no" style="width:99%" value="" readonly/></td>
</tr>                                      
 </tr>
 </table>';
 ?>
 
 

