<?php
include_once 'db_connect.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];
}

$sql = "SELECT * FROM tor 
LEFT JOIN type_eq
ON type_eq.type_id = tor_type
LEFT JOIN contract
ON contract.con_id = tor_contract
WHERE tor_id = $id";

$name = "";
$type = "";
$con = "";
$des = "";


$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
    $id = $row["tor_id"];
    $name = $row["tor_name"];
    $des = $row["tor_des"];
    $type_id = $row["type_id"];
    $type_name = $row["type_name"];
    $con_id = $row["con_id"];
    $con_name = $row["con_name"];
   }
echo '<link rel="stylesheet" href="style.css">';

echo  
'

<tr>
                                            </tr>
                                            <input type="hidden" id="tor_id" name="tor_id"  value="'.$id.'">

                                            <tr>
                                                <th style="text-align: right; font-family:Prompt;">ชื่อ TOR</th>
                                                <th style="text-align: center;"><input type="text" id="tor_name" name="tor_name" style="width:99%" class="form-control" value="'.$name.'"></th>
                                            </tr>

                                            
                                            <tr>
                                                <th style="text-align: right; font-family:Prompt;">ประเภท TOR</th>
                                                <th style="text-align: center;"><select name="tor_type" id="tor_type" style="width: 99%" class="form-control">
                                                            <option value="'.$type_id.'" >'.$type_name.'</option>';
                                            
                                                    $type = "SELECT * FROM type";
                                                    $result = mysqli_query($conn, $type);
                                                    while($data = mysqli_fetch_array($result)):
                                                     $tid =  $data["type_id"];
                                                     $tname     = $data["type_name"];

      echo                                              '<option value="'.$tid.'">'.$tname.'</option>';
                                                    endwhile;

      echo                                          '</select></th>        
                                            </tr>
                                            <tr>
                                                <th style="text-align: right; font-family:Prompt;">สัญญา</th>
                                                <th style="text-align: center;"><select name="tor_contract" id="tor_contract" style="width: 99%" class="form-control">
                                                            <option value="'.$con_id.'">'.$con_name.'</option>';
                                            
                                                        $cont = "SELECT * FROM contract";
                                                        $result = mysqli_query($conn, $cont);
                                                        while($data = mysqli_fetch_array($result)):
                                                          $cid =  $data["con_id"];
                                                          $cname =  $data["con_name"];
        echo                                     '<option value="'.$cid.'">'.$cname.'</option>';
                                            endwhile;
        echo                                       '</select></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: right; vertical-align:top; font-family:Prompt; ">รายละเอียด TOR</th>
                                                <th style="text-align: center;"><textarea class="form-control" rows="5" id="comment" name="tor_des" >'.$des.'</textarea></th>
                                            </tr>';

?>

