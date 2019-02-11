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
            LEFT JOIN employee
            ON allocate.ac_emp = employee.emp_id
            WHERE 
            ac_status = 9 OR 
            ac_status = 7 OR 
            ac_status = 6 OR 
            ac_status = 2 OR 
            ac_status= 8 OR 
            ac_status= 10 OR 
            ac_status= 11";
        }
        else
        { $query = "SELECT * FROM allocate
            LEFT JOIN a_status
            ON allocate.ac_status = a_status.status_id
            LEFT JOIN department
            ON allocate.ac_dep = department.dep_id
            LEFT JOIN employee
            ON allocate.ac_emp = employee.emp_id
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
    LEFT JOIN employee
    ON allocate.ac_emp = employee.emp_id
    WHERE 
    ac_status = 9 OR 
    ac_status = 7 OR 
    ac_status = 6 OR 
    ac_status = 2 OR 
    ac_status= 8 OR 
    ac_status= 10 OR 
    ac_status= 11";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive" id="result">
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

</tr>
</thead>
  ';
 while($data = mysqli_fetch_array($result))
 {
    $id = $data['ac_id'];
    $stn = $data['status_id'];

    if($stn == 1){
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].'  '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>

    </tr>
        ';
    }
    if($stn == 8){
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
    </tr>
        ';
    }
    if($stn == 11)
    {
        $output .= '
    <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
    </tr>';
    }
    if($stn == 10)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>
        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        </tr>';
    }
    
    if($stn == 6)
    {
        
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>

        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        </tr>';   
    }
    if($stn == 2)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>

        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        </tr>';   
    }

    if($stn == 7)
    {
        $output .= '
        <tr>
        <td style="text-align:left">'.$data['ac_title'].'</td>
        <td style="text-align:left">'.$data['ac_name'].'</td>
        <td style="text-align:left">'.$data['dep_name'].'</td>
        <td style="text-align:left">'.$data['emp_fname'].' '.$data['emp_lname'].'</td>
        <td style="text-align:left">'.$data['status_name'].'</td>

        <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showData('.$data['ac_id'].')" style="font-family:Prompt;"><i class="mdi mdi-file-document"></i>ดูรายละเอียด</button></td>
        </tr>';   
    }


 
 }

 echo $output;
}
else
{
 
    echo '<div class="table-responsive" id="result">
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

</tr>
</thead>
<tr>
        <td style="text-align:center" colspan="6"><font size="3" color="red"><b>ไม่พบข้อมูล</b></font></td>
        
        </tr>';
}


?>

