<?php
include("../db_connect.php");
include("datatable_all.php");


$output = '';
$i = 0;
$a = "";
if(isset($_POST["query"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $search2 = mysqli_real_escape_string($conn, $_POST["query2"]);

        // // echo $search;
        // // echo $search2;

        // return;
    if($search != 'ทั้งหมด')
    {
            $a = $search2;
        if($search2 == 'ทั้งหมด')
            {
                $query = "SELECT * FROM equipment
                            LEFT JOIN a_status
                            ON equipment.eq_status = a_status.status_id
                            LEFT JOIN tor
                            ON equipment.eq_tor = tor.tor_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id 
                            WHERE type_name LIKE '%".$search."%' AND status_name = 'รอจัดสรร'";
            }
        else
            {
                $a = $search2;
                $query = "SELECT * FROM equipment
                LEFT JOIN a_status
                ON equipment.eq_status = a_status.status_id
                LEFT JOIN tor
                ON equipment.eq_tor = tor.tor_id
                LEFT JOIN contract
                ON tor.tor_contract = contract.con_id
                LEFT JOIN type_eq
                ON tor.tor_type = type_eq.type_id 
                WHERE type_name LIKE '%".$search."%' AND con_name = '$a' AND status_name = 'รอจัดสรร'";
            }
    }
    else
    {   
        if($search2 == 'ทั้งหมด')
        {
                $query = "SELECT * FROM equipment
                LEFT JOIN a_status
                ON equipment.eq_status = a_status.status_id
                LEFT JOIN tor
                ON equipment.eq_tor = tor.tor_id
                LEFT JOIN contract
                ON tor.tor_contract = contract.con_id
                LEFT JOIN type_eq
                ON tor.tor_type = type_eq.type_id WHERE status_name = 'รอจัดสรร' ";       
        }
        else
        {
                $a = $search2;
                $query = "SELECT * FROM equipment
                LEFT JOIN a_status
                ON equipment.eq_status = a_status.status_id
                LEFT JOIN tor
                ON equipment.eq_tor = tor.tor_id
                LEFT JOIN contract
                ON tor.tor_contract = contract.con_id
                LEFT JOIN type_eq
                ON tor.tor_type = type_eq.type_id WHERE con_name = '$a' AND status_name = 'รอจัดสรร' ";   
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
            $query = "SELECT * FROM equipment
                        LEFT JOIN a_status
                        ON equipment.eq_status = a_status.status_id
                        LEFT JOIN tor
                        ON equipment.eq_tor = tor.tor_id
                        LEFT JOIN contract
                        ON tor.tor_contract = contract.con_id
                        LEFT JOIN type_eq
                        ON tor.tor_type = type_eq.type_id 
                        WHERE con_name LIKE '%".$search."%' AND status_name = 'รอจัดสรร'";
            }
        else
            {
            $a = $search2;
            $query = "SELECT * FROM equipment
            LEFT JOIN a_status
            ON equipment.eq_status = a_status.status_id
            LEFT JOIN tor
            ON equipment.eq_tor = tor.tor_id
            LEFT JOIN contract
            ON tor.tor_contract = contract.con_id
            LEFT JOIN type_eq
            ON tor.tor_type = type_eq.type_id 
            WHERE con_name LIKE '%".$search."%' AND type_name = '$a' AND status_name = 'รอจัดสรร'";
            }
    }
    else
    {
        if($search2 == 'ทั้งหมด')
        {
            $query = "SELECT * FROM equipment
            LEFT JOIN a_status
            ON equipment.eq_status = a_status.status_id
            LEFT JOIN tor
            ON equipment.eq_tor = tor.tor_id
            LEFT JOIN contract
            ON tor.tor_contract = contract.con_id
            LEFT JOIN type_eq
            ON tor.tor_type = type_eq.type_id WHERE  status_name = 'รอจัดสรร' ";
        }
        else
        {
            $a = $search2;
        $query = "SELECT * FROM equipment
        LEFT JOIN a_status
        ON equipment.eq_status = a_status.status_id
        LEFT JOIN tor
        ON equipment.eq_tor = tor.tor_id
        LEFT JOIN contract
        ON tor.tor_contract = contract.con_id
        LEFT JOIN type_eq
        ON tor.tor_type = type_eq.type_id WHERE type_name = '$a' AND status_name = 'รอจัดสรร' ";
        }
    }


}
else
{
 $query = "SELECT * FROM equipment
 LEFT JOIN a_status
ON equipment.eq_status = a_status.status_id
LEFT JOIN tor
ON equipment.eq_tor = tor.tor_id
LEFT JOIN contract
ON tor.tor_contract = contract.con_id
LEFT JOIN type_eq
ON tor.tor_type = type_eq.type_id WHERE status_name = 'รอจัดสรร' ";
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

<td style="text-align: center;">Barcode</td>
<td style="text-align: center;">Serial Number</td>
<td style="text-align: center;">สัญญา</td>
<td style="text-align: center;">ประเภทครุภัณฑ์</td>
<td style="text-align: center;">สถานะ</td>
<td style="text-align: center;">เลือกครุภัณฑ์</td>

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
    $tor_name = $row["tor_name"];
    $con_name = $row["con_name"];
    

  $output .= '
   <tr style="font-family:Prompt;">

                        <td style="text-align:left">'.$row['eq_barcode'].'</td>
                        <td style="text-align:left">'.$row['eq_serial'].'</td>
                        <td style="text-align:left">'.$row['con_name'].'</td>
                        <td style="text-align:left">'.$row['type_name'].'</td>
                        <td style="text-align:left">'.$row['status_name'].'</td>
                        <input type="hidden" name="id" value="'.$row['eq_id'].'">

    <td style="font-family:Prompt;"><button type="button" name="submit" id="submit'.$row['eq_id'].'" class="btn btn-success btn-block" value="'.$row['eq_id'].'" onclick="getid(this)" style="font-family:Prompt;">เลือกครุภัณฑ์</button></td>                    
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

