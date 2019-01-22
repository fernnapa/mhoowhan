<style>
input[type="text"] {
  height: 30px; 
  font-size:15px;
}
</style>

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

echo  
'
<tr style="text-align: center;">
<td><img src="upload/'.$pic.'" width="125px;" height="120px;" /></td>
<input type="hidden" id="emp_id" name="emp_id" value="'.$id.'">
</tr>

<tr style="text-align: center;">
<td style="text-align: center; font-family:Prompt;"><b>หมายเลขพนักงาน</b></td>
<td><input type="text" style="font-family:Prompt;"  placeholder="'.$id.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center; font-family:Prompt;"><b>ชื่อ</b></td>
<td><input type="text" id="emp_fname" name="emp_fname" style="font-family:Prompt;" value="'.$fname.'" class="form-control"></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center; font-family:Prompt;"><b>สกุล</b></td>
<td><input type="text" id="emp_lname" name="emp_lname" style="font-family:Prompt;" value="'.$lname.'" class="form-control"></td>
</tr>
<tr>
<td style="text-align: center; font-family:Prompt"><b>ตำเเหน่ง</b></td>
<td><input type="text" id="emp_position" name="emp_position" style="font-family:Prompt;" value="'.$position.'" class="form-control"></td>
</tr>
<tr>
<td style="text-align: center; font-family:Prompt"><b>โทรศัพท์</b></td>
<td><input type="text" id="emp_tel" name="emp_tel" style="font-family:Prompt;" value="'.$tel.'" class="form-control"></td>
<tr>
<td style="text-align: center; font-family:Prompt""><b>อีเมล์</b></td>
<td><input type="text" id="emp_mail" name="emp_mail" style="font-family:Prompt;" value="'.$mail.'" class="form-control"></td>
</tr>

<tr>
<td style="text-align: center; font-family:Prompt"><b>Username</b></td>
<td><input type="text" id="emp_user" name="emp_user" style="font-family:Prompt;" value="'.$user.'" class="form-control"></td>
</tr>
<tr>
<td style="text-align: center; font-family:Prompt"><b>Password</b></td>
<td><input type="text" id="emp_pass" name="emp_pass" style="font-family:Prompt;" value="'.$pass.'" class="form-control"></td>
</tr>
<tr>
<td style="text-align: center; font-family:Prompt"><b>status</b></td>   
<td><select name="emp_status" id="emp_status" class="form-control">
                <option >'.$status.'</option>
                <option value="user">User</option>
                <option value="head">Head</option>
                <option value="leader">Leader</option>
                <option value="admin">Admin</option>
    </select>
</td>
</tr>
<tr>
<td style="text-align: center; font-family:Prompt"><b>รูปภาพ</b></td>
<td><input type="file" name="images[]" id="select_image" multiple /></td>
<input type="hidden" id="emp_pic" name="emp_pic" style="font-family:Prompt; " value="'.$pic.'"></td>
</tr>
'
;

?>

