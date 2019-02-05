<?php
include("../db_connect.php");
include("datatable_all.php");



$output = '';
$i = 0;
$a = "";
if(isset($_POST["query"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
       
        // echo $search;
        // echo $search2;
        // return;
        if($search == 'ทั้งหมด')
        {    
            $query = "SELECT * FROM allocate
            LEFT JOIN a_status
            ON allocate.ac_status = a_status.status_id
            LEFT JOIN department
            ON allocate.ac_dep = department.dep_id
            WHERE ac_status = 9 OR ac_status = 7 OR ac_status = 6 OR ac_status= 2 OR ac_status= 8 OR ac_status= 10 OR ac_status= 11";
        }
        else
        { $query = "SELECT * FROM allocate
            LEFT JOIN a_status
            ON allocate.ac_status = a_status.status_id
            LEFT JOIN department
            ON allocate.ac_dep = department.dep_id
            WHERE ac_status = '$search'";
        }

}
else
{
    $query = "SELECT * FROM allocate
    LEFT JOIN a_status
    ON allocate.ac_status = a_status.status_id
    LEFT JOIN department
    ON allocate.ac_dep = department.dep_id
    WHERE ac_status = 9 OR ac_status = 7 OR ac_status = 6 OR ac_status= 2 OR ac_status= 8 OR ac_status= 10 OR ac_status= 11";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered" >
<thead>
<tr style="font-weight: bold;">

                        <td style="text-align: center;">จุดประสงค์การจัดสรร</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">รายละเอียด</td>
                        <td style="text-align: center;">แบบฟอร์ม</td>

</tr>
</thead>
  ';
 while($data = mysqli_fetch_array($result))
 {
    $id = $data['ac_id'];
    $stn = $data['status_name'];


   
    if($stn == "รอตรวจสอบ"){
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td></td>

    </tr>
        ';
    }
    if($stn == "ไม่ผ่านการตรวจสอบ"){
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_dt('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td></td>
    </tr>
        ';
    }
    if($stn == "ไม่อนุมัติ")
    {
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td></td>
    </tr>';
    }
    if($stn == "อนุมัติ")
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td></td>
        </tr>';
    }
    
    if($stn == "รออนุมัติ")
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>

        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_at('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td></td>
        </tr>';   
    }
    if($stn == "จัดสรร")
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['ac_empid'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>

        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt('.$data['ac_id'].')" style="font-family:Prompt;">ดูรายละเอียด</button></td>
        <td><a href="PDF_AC.php?ac_id='.$data['ac_id'].'" class="btn btn-danger" data-role="pdf" style="font-family:Prompt;">แบบฟอร์ม</a></button></td> 
        </tr>';   
    }
 }
 echo $output;
}
else
{
    echo '<br/><p style="text-align: center; font-size:20px;"><b>ไม่พบข้อมูล</b></p>';
}


?>

