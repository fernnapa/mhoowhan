<?php
include ('connection.php');
mysqli_query($con, "SET NAMES 'utf8' "); 
if(isset($_GET['id'])){

     $id = $_GET['id'];
 }
 
 
 $sql = "SELECT * FROM db_com 
 LEFT JOIN com_eq ON com_eq.bar_id = db_com.barcode_id
 
 
 WHERE com_no = $id";

$barcode="";
$list="";
$sn="";
$refer="";
$tor="";
$status="";
$ins_no="";
$ins="";
$ins ="";
$prefix ="";
$emp_name ="";
$emp_posi ="";
$emp_no ="";
$category ="";
$allocate_no ="";

 
 $rs = $con->query($sql);
 while($row = mysqli_fetch_assoc($rs)){
     $barcode = $row["barcode_id"];
     $list = $row["list_com"];
     $sn = $row["SN"];
     $refer = $row["refer"];
     $tor = $row["TOR"];
     $status = $row["Status_com"];
     $ins_no = $row["ins_no"];
     $ins = $row["ins_name"];
     $prefix = $row["prefix"];
     $emp_name = $row["emp_name"];
     $emp_posi = $row["emp_posi"];
     $emp_no = $row["emp_no"];
     $category = $row["category"];
     $allocate_no = $row["allocate_no"];
 
 }
 
 
 echo  
'<table style="width:90%" align="center">
 <tr>
     <td style="text-align: left;">Barcode</td>
     <td><input type="text" id="barcode_id" name="barcode_id" style="width:99%" value="'.$barcode.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">รายการ</td>
     <td><input type="text" id="title" name="title" style="width:99%" value="'.$list.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">SN Number</td>
     <td><input type="text" id="SN" name="SN" style="width:99%" value="'.$sn.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">หนังสืออ้างอิง</td>
     <td><input type="text" id="refer" name="refer" style="width:99%" value="'.$refer.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">ประเภทครุภัณฑ์(TOR)</td>
     <td><input type="text" id="TOR" name="TOR" style="width:99%" value="'.$tor.'" readonly>  </td>
</tr>
<tr>
     <td style="text-align: left;">สถานะ</td>
     <td><input type="text" id="Status" name="Status" style="width:99%" value="'.$status.'" readonly>  </td>
</tr>    
<tr>
     <td style="text-align: left;">รหัสหน่วยงาน  </td>
     <td><input name="ins_no" type="text" id="ins_no" style="width:99%" value="'.$ins_no.'" readonly></td>
</tr>
<tr>
    <td style="text-align: left;">หน่วยงาน  </td>
    <td ><input name="ins" type="text" id="ins" style="width:99%" value="'.$ins.'" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">คำนำหน้า  </td>
    <td><input name="prefix" type="text" id="prefix" style="width:99%" value="'.$prefix.'" readonly/></td>
</tr>  
<tr>
    <td style="text-align: left;">ชื่อผู้เช่ายืม  </td>
    <td><input name="emp_name" type="text" id="emp_name" style="width:99%" value="'.$emp_name.'" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">ตำแหน่ง  </td>
    <td><input name="position" type="text" id="position" style="width:99%" value="'.$emp_posi.'" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">รหัสพนักงาน </td>
    <td><input name="emp_id" type="text" id="emp_id" style="width:99%" value="'.$emp_no.'" readonly/></td>
</tr>
<tr>
    <td style="text-align: left;">ประเภท  </td>
    <td ><input name="category" type="text" id="category" style="width:99%" value="'.$category.'" readonly/></td>
<tr/>
<tr>
    <td style="text-align: left;">รหัสพนักงานจัดสรร  </td>
    <td><input name="emp_no" type="text" id="emp_no" style="width:99%" value="'.$allocate_no.'" readonly/></td>
</tr>                                      
 </tr>
 </table>';
 ?>
 
 

