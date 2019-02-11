<?php
include("../../db_connect.php");
include("datatable_BU_PM.php");


$output = '';
$i = 0;
$a = "";
if(isset($_POST["type"]) )
{
        $search = mysqli_real_escape_string($conn, $_POST["type"]);
        $search2 = mysqli_real_escape_string($conn, $_POST["b"]);

        // echo $search;
        // echo $search2;
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
                            WHERE type_name LIKE '%".$search."%' AND status_id = 1 OR
                            type_name LIKE '%".$search."%' AND status_id = 2 OR
                            type_name LIKE '%".$search."%' AND status_id = 3 OR
                            type_name LIKE '%".$search."%' AND status_id = 5 OR
                            type_name LIKE '%".$search."%' AND status_id = 6 OR
                            type_name LIKE '%".$search."%' AND status_id = 7 OR
                            type_name LIKE '%".$search."%' AND status_id = 8 OR
                            type_name LIKE '%".$search."%' AND status_id = 10 OR
                            type_name LIKE '%".$search."%' AND status_id = 11";
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
                WHERE type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 1 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 2 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 3 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 5 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 6 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 7 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 8 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 10 OR
                type_name LIKE '%".$search."%' AND con_name = '$a' AND status_id = 11 ";
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
                ON tor.tor_type = type_eq.type_id 
                WHERE status_id = 1 OR status_id = 2 OR status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11";
       
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
                ON tor.tor_type = type_eq.type_id WHERE status_id = '$a' OR 
                status_id = '$a'  OR 
                status_id = '$a' OR 
                status_id = '$a'  OR 
                status_id = '$a'  OR 
                status_id = '$a' OR 
                status_id = '$a'  OR 
                status_id = '$a' OR
                status_id = '$a'";   
        }
    }
}elseif(isset($_POST["status"]))
{
    $search = mysqli_real_escape_string($conn, $_POST["status"]);
    $search2 = mysqli_real_escape_string($conn, $_POST["b"]);
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
                        WHERE status_id = '$search'";
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
            WHERE status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a' OR
                status_id = '$search' AND type_name = '$a'";
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
            ON tor.tor_type = type_eq.type_id 
            WHERE status_id = 1 OR status_id = 2 OR status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11";
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
        WHERE type_name = '$a'  OR 
                type_name = '$a'  OR 
                type_name = '$a' OR 
                type_name = '$a'  OR 
                type_name = '$a'  OR 
                type_name = '$a'  OR 
                type_name = '$a'  OR 
                type_name = '$a'  OR
                type_name = '$a'  "; 
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
ON tor.tor_type = type_eq.type_id 
WHERE status_id = 1 OR status_id = 2 OR status_id = 3 OR status_id = 5 OR status_id = 6 OR status_id = 7 OR status_id = 8 OR status_id = 10 OR status_id = 11";

}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered " class="hover" >
<thead>
<tr style="font-weight: bold; font-family:Prompt;">

<td style="text-align: center; font-size: 15px;">Barcode</td>
<td style="text-align: center; font-size: 15px;">Serial Number</td>
<td style="text-align: center; font-size: 15px;">TOR</td>
<td style="text-align: center; font-size: 15px;">สัญญา</td>
<td style="text-align: center; font-size: 15px;">สถานะ</td>
<td style="text-align: center;"></td>

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
                        <td style="text-align:left">'.$row['tor_name'].'</td>
                        <td style="text-align:left">'.$row['con_name'].'</td>
                        <td style="text-align:left">'.$row['status_name'].'</td>
                        <input type="hidden" name="id" value="'.$row['eq_id'].'">
                        <td>
                        <button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row['eq_id'].'" onclick="showEq(this.value)" data-target="#myModal2"><i class="mdi mdi-pencil"></i></button>&nbsp;<button type="button" class="btn btn-icons btn-rounded btn-danger" value="'.$row['eq_id'].'" onclick="removeEq(this.value)"><i class="mdi mdi-delete"></i></button></td>
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



