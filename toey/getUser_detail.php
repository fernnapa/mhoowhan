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
</tr>

<tr style="text-align: center;">
<th style="text-align: center; font-family:Prompt;">หมายเลขพนักงาน</th>
<td><input type="hidden" id="emp_id" name="emp_id" style="font-family:Prompt;" value="'.$id.'">
<input type="text" style="width:99%"  placeholder="'.$id.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center; font-family:Prompt;">ชื่อ</th>
<td><input type="text" id="emp_fname" name="emp_fname" style="font-family:Prompt;" value="'.$fname.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center; font-family:Prompt;">สกุล</th>
<td><input type="text" id="emp_lname" name="emp_lname" style="font-family:Prompt;" value="'.$lname.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center; font-family:Prompt">ตำเเหน่ง</th>
<td><input type="text" id="emp_position" name="emp_position" style="font-family:Prompt;" value="'.$position.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center; font-family:Prompt">โทรศัพท์</th>
<td><input type="text" id="emp_tel" name="emp_tel" style="font-family:Prompt;" value="'.$tel.'" readonly class="form-control"></td>
</tr>

<tr style="text-align: center;">
<th style="text-align: center;">อีเมล์</th>
<td><input type="text" id="emp_mail" name="emp_mail" style="font-family:Prompt;" value="'.$mail.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center;">Username</th>
<td><input type="text" id="emp_user" name="emp_user" style="font-family:Prompt;" value="'.$user.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center;">Password</th>
<td><input type="text" id="emp_pass" name="emp_pass" style="font-family:Prompt;" value="'.$pass.'" readonly class="form-control"></td>
</tr>
<tr style="text-align: center;">
<th style="text-align: center;">status</th>       
<td><input type="text" id="emp_pass" name="emp_pass" style="font-family:Prompt;" value="'.$status.'" readonly class="form-control"></td>
</tr>'
;
?>

