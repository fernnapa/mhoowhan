<?php
include("../../db_connect.php");
include("datatable_TOR.php");
$output = '';
if(isset($_POST["query"]))
{
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
    
        $query = "SELECT * FROM tor
        LEFT JOIN type_eq
        ON type_eq.type_id = tor_type
        LEFT JOIN contract
        ON contract.con_id = tor_contract
        WHERE tor_id LIKE '%".$search."%'
        OR tor_name LIKE '%".$search."%'
        OR tor_des LIKE '%".$search."%'
        OR tor_type LIKE '%".$search."%'
        OR con_name LIKE '%".$search."%'";
}
else
{

 echo '<link rel="stylesheet" href="style.css">';

 $query = "SELECT * FROM tor 
 LEFT JOIN type_eq
 ON type_eq.type_id = tor_type
 LEFT JOIN contract
 ON contract.con_id = tor_contract";

}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= 
'<div class="table-responsive">
<p></p>
<form id="form3"> 
<table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered " >
<thead>
<tr>
  
    <td style="text-align: center;width:100px; font-family:Prompt; font-size: 15px;"><b>ชื่อ TOR</b></td>
    <td style="text-align: center; width:300px; font-family:Prompt; font-size: 15px;"><b>รายละเอียด TOR</b></td>
    <td style="text-align: center; width:100px; font-family:Prompt; font-size: 15px;"><b>ประเภท TOR</b></td>
    <td style="text-align: center; font-family:Prompt; font-size: 15px;"><b>สัญญาปี</b></td>
    <td style="text-align: center; font-family:Prompt;"><b></b></td>
    

</tr>
</thead>
  ';
 while($row = mysqli_fetch_array($result))
 {
  $type_name = $row["type_name"];
  $con_name = $row["con_name"];

  $output .= '
   <tr>
   <td style="text-align:left font-family:Prompt;">'.$row['tor_name'].'</td>
   <td style="text-align:left font-family:Prompt;">'.$row['tor_des'].'</td>
   <td style="text-align:left font-family:Prompt;">'.$type_name.'</td>
   <td style="text-align:left font-family:Prompt;">'.$con_name.'</td>
   
    <td><button type="button" class="btn btn-icons btn-rounded btn-warning" data-toggle="modal" value="'.$row["tor_id"].'" onclick="showTor(this.value)" data-target="#ModalEditTor"><i class="mdi mdi-pencil"></i></button>
    <button type="button" class="btn btn-icons btn-rounded btn-danger" onclick="removeTor('.$row["tor_id"].')"><i class="mdi mdi-delete"></i></button></td>                    
    </tr>

   
  ';
 }
 echo $output;
}
else
{
 echo '<br/><p style="color:red; text-align: center; font-family:Prompt; font-size:20px;"><b>ไม่พบข้อมูล</b></p> ';
}


?>

