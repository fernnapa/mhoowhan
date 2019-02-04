<?php
include("../../db_connect.php");
include("datatable_BU_PM.php");



$output = '';
$i = 0;
$a = "";
if(isset($_POST["query"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);

        // echo $search;
        // echo $search2;
        // return;
    if($search != 'ทั้งหมด')
    {   
                $query = "SELECT * FROM backup_contract
                    WHERE buc_type_name LIKE '%".$search."%'";
    }
    else
    {
                $query = "SELECT * FROM backup_contract";
    }
    }
else
{
 $query = "SELECT * FROM backup_contract";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " class="hover" >
<thead>
<tr style="font-weight: bold;">

<td style="text-align: center;">ลำดับที่</td>
<td style="text-align: center;">ชื่อสัญญา</td>
<td style="text-align: center;">Barcode</td>
<td style="text-align: center;">Serial Number</td>
<td style="text-align: center;">ประเภท</td>
<td style="text-align: center;">สถานะ</td>



</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {

  $output .= '
   <tr >

   <td style="text-align:left">'.$row['buc_id'].'</td>
   <td style="text-align:left">'.$row['buc_con_name'].'</td>
   <td style="text-align:left">'.$row['buc_barcode'].'</td>
   <td style="text-align:left">'.$row['buc_serial'].'</td>
   <td style="text-align:left">'.$row['buc_type_name'].'</td>
   <td style="text-align:left">'.$row['buc_status'].'</td>



    </tr>

   
  ';
 }
 echo $output;
}
else
{
 echo '<br/><p style="color:red; text-align: center; font-family:Prompt; font-size:20px;"><b>ไม่พบข้อมูล</b></p>';
}


?>

