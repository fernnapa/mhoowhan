<?php
include_once 'db_connect.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];
}


$sql = "SELECT emp_id, emp_fname, emp_lname, emp_position, emp_tel, emp_mail, emp_pic, emp_user, emp_pass, emp_status
FROM employee WHERE emp_id = $id";
$fname = "";
$lname = "";
$position = "";
$tel = "";
$mail = "";
$pic = "";
$user = "";
$pass = "";
$status = "";

$rs = $conn->query($sql);
while($row = mysqli_fetch_assoc($rs)){
    $id = $row["emp_id"];
    $fname = $row["emp_fname"];
    $lname = $row["emp_lname"];
    $position = $row["emp_position"];
    $tel = $row["emp_tel"];
    $mail = $row["emp_mail"];
    $pic = $row["emp_pic"];
    $user = $row["emp_user"];
    $pass = $row["emp_pass"];
    $status = $row["emp_status"];
}
echo '<link rel="stylesheet" href="style.css">';

echo  
'
<tr>
<td><img src="img/'.$pic.'" width="125px;" height="120px;" /></td>
</tr>
<tr>
<th style="text-align: center;">หมายเลขพนักงาน</th>
<th style="text-align: center;">ชื่อ</th>
<th style="text-align: center;">สกุล</th>
<th style="text-align: center;">ตำเเหน่ง</th>
<th style="text-align: center;">โทรศัพท์</th>
                                       
</tr>
<tr>
<input type="hidden" id="emp_id" name="emp_id" value="'.$id.'">
<td><input type="text" style="width:99%"  placeholder="'.$id.'" readonly class="form-control"></td>
<td><input type="text" id="emp_fname" name="emp_fname" style="width:99%" value="'.$fname.'" class="form-control"></td>
<td><input type="text" id="emp_lname" name="emp_lname" style="width:99%" value="'.$lname.'" class="form-control"></td>
<td><input type="text" id="emp_position" name="emp_position" style="width:99%" value="'.$position.'" class="form-control"></td>
<td><input type="text" id="emp_tel" name="emp_tel" style="width:99%" value="'.$tel.'" class="form-control"></td>

</tr>
<tr>
<th style="text-align: center;">อีเมล์</th>
<th style="text-align: center;">รูปภาพ</th>
<th style="text-align: center;">Username</th>
<th style="text-align: center;">Password</th>
<th style="text-align: center;">status</th>       
</tr>
<tr>

<td><input type="text" id="emp_mail" name="emp_mail" style="width:99%" value="'.$mail.'" class="form-control"></td>
<td><input type="file" name="images[]" id="select_image" multiple /></td>
<input type="hidden" id="emp_pic" name="emp_pic" style="width:99%" value="'.$pic.'">
<td><input type="text" id="emp_user" name="emp_user" style="width:99%" value="'.$user.'" class="form-control"></td>
<td><input type="text" id="emp_pass" name="emp_pass" style="width:99%" value="'.$pass.'" class="form-control"></td>
<td><select name="emp_status" id="emp_status" style="width: 99%" class="form-control">
                <option >'.$status.'</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select></td>
</tr>'
;

?>

