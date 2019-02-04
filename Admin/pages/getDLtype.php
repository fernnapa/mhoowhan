<?php
include("../../db_connect.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
}



echo  
'

<select name="eq_type" id="eq_type" style="width: 99%" class="form-control" >
     <option value="null">เลือกประเภท</option>';
     $sql = "SELECT * FROM tor 
     LEFT JOIN contract ON contract.con_id = tor_contract 
     LEFT JOIN type_eq ON type_eq.type_id = tor_type 
     WHERE con_name = '$id'";
        $rs = $conn->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            $type_i = $row["type_id"];
            $type_n = $row["type_name"];
   echo         '<option value="'.$type_n.'">'.$type_n.'</option>';
        }
    echo  ' </select>';

?>

