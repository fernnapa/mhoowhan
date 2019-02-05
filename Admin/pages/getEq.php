<?php
include("../../db_connect.php");


if(isset($_GET['id'])){

    $id = $_GET['id'];
}


$sql = "SELECT * FROM equipment 
        LEFT JOIN tor
        ON equipment.eq_tor = tor.tor_id
        LEFT JOIN contract
        ON tor.tor_contract = contract.con_id
        LEFT JOIN type_eq
        ON tor.tor_type = type_eq.type_id 
        WHERE eq_id = $id";

        $eq_id = "";
        $barcode = "";
        $sr = "";
        $pic = "";
        $con = "";
        $type= "";
        $tor = "";
        $status = "";


        $rs = $conn->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
        $eq_id = $row["eq_id"];
        $barcode = $row["eq_barcode"];
        $sr = $row["eq_serial"];
        $tor = $row["eq_tor"];
        $con = $row["con_name"];
        $con_i = $row["con_id"];

        $type = $row["type_name"];
        $type_i = $row["type_id"];

 
}


echo  '  <tr>
<input type="hidden" name="eq_id" value="'.$eq_id.'" class="form-control name_list " />

<th style="text-align: center; width:30%; font-family:Prompt;">Barcode</th>
<th><input type="text" name="eq_barcode" value="'.$barcode.'" class="form-control name_list"/></th>
</tr>
<tr>
<th style="text-align: center; font-family:Prompt; ">SERIAL NO</th>
<th><input type="text" name="eq_sr" value="'.$sr.'" class="form-control name_list" /></th>
</tr>

<tr>
<th style="text-align: center; font-family:Prompt;">สัญญาปี</th>
<th><select name="eq_con" id="eq_con" style="width: 99%" class="form-control" onchange="filterType(this.value)">
            <option value="'.$con.'">'.$con.'</option>';
            
    $year = "SELECT * FROM contract ORDER BY con_name";
    $result = mysqli_query($conn, $year);
    while($data = mysqli_fetch_array($result)):
        $conname = $data['con_name'];
        $con_id = $data['con_id'];
    echo       ' <option value="'.$conname.'">'.$conname.'</option>';
    endwhile;

echo '</select></th>
</tr>
<tr>
<th style="text-align: center;font-family:Prompt;">ประเภทครุภัณฑ์</th>
<th id="getdltype"><select name="eq_type" id="eq_type" style="width: 99%" class="form-control" >
                <option value="'.$type.'">'.$type.'</option>';
        $t = "SELECT * FROM tor LEFT JOIN contract ON contract.con_id = tor_contract 
            LEFT JOIN type_eq ON type_eq.type_id = tor_type WHERE con_name = '$conname'";
            $rs = $conn->query($t);
            while($row = mysqli_fetch_assoc($rs)){
            $type_n = $row["type_name"];
            $type_i = $row["type_id"];
        
    echo     '<option value="'.$type_n.'">'.$type_n.'</option>';    
        }      
echo '</select></th>
</tr>';

?>

