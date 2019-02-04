<?php
include("../../db_connect.php");
include("../../Employee/datatable_all.php");

$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM equipment
        LEFT JOIN tor
        ON equipment.eq_tor = tor.tor_id
        LEFT JOIN contract
        ON tor.tor_contract = contract.con_id 
        LEFT JOIN a_status
        ON equipment.eq_status = a_status.status_id 
        WHERE eq_id LIKE '%".$search."%'
        OR eq_barcode LIKE '%".$search."%'
        OR eq_serial LIKE '%".$search."%'
        OR eq_pic LIKE '%".$search."%'
        OR eq_status LIKE '%".$search."%'
        OR tor_name LIKE '%".$search."%' 
        OR con_name LIKE '%".$search."%'
        OR status_name LIKE '%".$search."%'";
}
else
{
        $query = "SELECT * FROM equipment
        LEFT JOIN tor
        ON equipment.eq_tor = tor.tor_id
        LEFT JOIN contract
        ON tor.tor_contract = contract.con_id 
        LEFT JOIN a_status
        ON equipment.eq_status = a_status.status_id ";

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
    <tr >

    <th style="text-align: center;font-family:Prompt;  font-size: 15px;"><b>Barcode</b></th>
    <th style="text-align: center;font-family:Prompt;  font-size: 15px;"><b>Serial Number</b></th>
    <th style="text-align: center;font-family:Prompt;  font-size: 15px;"><b>TOR</b></th>
    <th style="text-align: center;font-family:Prompt;  font-size: 15px;" ><b>สัญญาปี</b></th>
    <th style="text-align: center;font-family:Prompt;  font-size: 15px;"><b>สถานะ</b></th>
    <th style="text-align: center;font-family:Prompt; "><b></b></th>

    </tr>
    </thead>
      ';
    
      while($row = mysqli_fetch_array($result))
    {
    $tor_name = $row["tor_name"];
    $con_name = $row["con_name"];
    $status_name = $row["status_name"];



    $output .= '
    <tr>
    <td style="text-align:left;font-family:Prompt; ">'.$row['eq_barcode'].'</td>
    <td style="text-align:left;font-family:Prompt; ">'.$row['eq_serial'].'</td>
    <td style="text-align:left;font-family:Prompt; ">'.$tor_name.'</td>
    <td style="text-align:left;font-family:Prompt; ">'.$con_name.'</td>
    <td style="text-align:left;font-family:Prompt; ">'.$status_name.'</td>
    

      <td><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row["eq_id"].'" onclick="showEq(this.value)" data-target="#myModal2"><i class="mdi mdi-pencil"></i></button>
      <button type="button" class="btn btn-icons btn-rounded btn-danger" value="'.$row["eq_id"].'" onclick="removeEq(this.value)"><i class="mdi mdi-delete"></i></button></td>                    
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

