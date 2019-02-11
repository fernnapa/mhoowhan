<?php
include("../db_connect.php");
include("datatable_BU_PM.php");



$output = '';
$i = 0;
$a = "";
if(isset($_POST["query"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $search2 = mysqli_real_escape_string($conn, $_POST["query2"]);

        // echo $search;
        // echo $search2;
        // return;
    if($search != 'ทั้งหมด')
    {   
            $a = $search2;
        if($search2 == 'ทั้งหมด')
            {
                $query = "SELECT * FROM backup_permit
                    WHERE pmd_type_name LIKE '%".$search."%'";
            }
        else
            {
                $a = $search2;
                $query = "SELECT * FROM backup_permit
                WHERE pmd_type_name LIKE '%".$search."%' AND bu_pmd_con_name = '$a'";
            }
    }
    else
    {   
        if($search2 == 'ทั้งหมด')
        {
                $query = "SELECT * FROM backup_permit";       
        }
        else
        {
                $a = $search2;
                $query = "SELECT * FROM backup_permit
                WHERE bu_pmd_con_name = '$a'";   
        }
    }
}elseif(isset($_POST["query2"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["query2"]);
    $search2 = mysqli_real_escape_string($conn, $_POST["query"]);
    // echo $search;
    // echo $search2;
    // return;
    if($search != 'ทั้งหมด')
    {
            $a = $search2;
        if($search2 == 'ทั้งหมด')
            {
            $a = $search2;
            $query = "SELECT * FROM backup_permit
              WHERE bu_pmd_con_name LIKE '%".$search."%'";
            }
        else
            {
            $a = $search2;
            $query = "SELECT * FROM backup_permit
            WHERE bu_pmd_con_name LIKE '%".$search."%' AND pmd_type_name = '$a'";
            }
    }
    else
    {
        if($search2 == 'ทั้งหมด')
        {
            $query = "SELECT * FROM backup_permit";
        }
        else
        {
            $a = $search2;
        $query = "SELECT * FROM equipment
        WHERE pmd_type_name = '$a'";
        }
    }


}
else
{
 $query = "SELECT * FROM backup_permit";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered" class="hover" >
<thead>
<tr style="font-weight: bold; ">

                      
<td style="text-align: center; ">ผู้ยืม</td>
<td style="text-align: center; ">Serial Number</td>
<td style="text-align: center; ">สัญญา</td>
<td style="text-align: center; ">ประเภทครุภัณฑ์</td>
<td style="text-align: center; ">จุดประสงค์การยืม</td>
<td style="text-align: center; ">วันที่ยืม</td>
<td style="text-align: center; ">วันที่คืน</td>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {

  $output .= '
   <tr >

                        
   <td style="text-align:left">'.$row['bu_username'].'</td>
   <td style="text-align:left">'.$row['bu_pm_serial'].'</td>
   <td style="text-align:left">'.$row['bu_pmd_con_name'].'</td>
   <td style="text-align:left">'.$row['pmd_type_name'].'</td>
   <td style="text-align:left">'.$row['bu_pm_name'].'</td>
   <td style="text-align:left">'.$row['bu_pm_firstdate'].'</td>
   <td style="text-align:left">'.$row['bu_pm_date_refund'].'</td>


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

