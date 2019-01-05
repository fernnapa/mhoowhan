<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--font-->
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

<style>
body {
        font-family: 'Kanit', sans-serif;
}
h1 {
        font-family: 'Kanit', sans-serif;
}
</style>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<?php
include('connection.php');  


 
$com_no = $_REQUEST["com_no"];
$sql = "SELECT * FROM db_com 
LEFT JOIN com_eq ON com_eq.bar_id = db_com.barcode_id 
WHERE com_no='$com_no' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>


        <form action="listEdit.php" method="post" name="updateuser" id="updateuser">
<br />
        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">   
           <div class="container" align="center">  
           <tr>
                <td height="30" colspan="4" align="center" bgcolor="#A5B8CD">
                <h3>การจัดสรรครุภัณฑ์คอมพิวเตอร์</h3></td>
           </tr>
           <tr>
                <td  align="right" bgcolor="#EBEBEB">BarCode : </td>
                <td  bgcolor="#EBEBEB"><input name="barcode_id" type="text" id="barcode_id" value="<?=$bar_id;?>" size="15" required="required" readonly/>
                <td  align="right" bgcolor="#EBEBEB">รายการ : </td>
                <td  bgcolor="#EBEBEB"><input name="list_com" type="text" id="list_com" value="<?=$com_list;?>" size="20" required="required" readonly/></td>
                </td>
           </tr>
           <tr>
                <td  align="right" bgcolor="#EBEBEB">SN Number : </td>
                <td  bgcolor="#EBEBEB"><input type="text" name="SN" id="SN" value="<?=$com_SN;?>"  required="required" readonly/>
                <td align="right" bgcolor="#EBEBEB">หนังสืออ้างอิง : </td>
                <td bgcolor="#EBEBEB"><input type="text" name="refer" id="refer" value="<?=$refer;?>" size="15" required="required" readonly/></td>
                </td>
           </tr>
           <tr>
                <td align="right" bgcolor="#EBEBEB">ประเภทครุภัณฑ์(TOR) : </td>
                <td bgcolor="#EBEBEB"><input name="TOR" type="text" id="TOR" value="<?=$com_TOR;?>" size="15" required="required" readonly/>
                <td align="right" bgcolor="#EBEBEB">สถานะ : </td>
                <td bgcolor="#EBEBEB"><input type="text" name="Status" id="Status" value="<?=$com_status;?>" size="15" required="required" readonly/></td>
                    
               
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">รหัสหน่วยงาน : </td>
                 <td bgcolor="#EBEBEB"><input name="ins_no" type="text" id="ins_no" value="<?=$ins_no;?>" required pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"/>
                 <td align="right" bgcolor="#EBEBEB">หน่วยงาน : </td>
                 <td bgcolor="#EBEBEB"><input name="ins" type="text" id="ins" value="<?=$ins_name;?>"required="required"/></td>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">คำนำหน้า : </td>
                 <td bgcolor="#EBEBEB"><input name="prefix" type="text" id="prefix" value="<?=$prefix;?>" required="required"/>
                 <td align="right" bgcolor="#EBEBEB">ชื่อผู้เช่ายืม : </td>
                 <td bgcolor="#EBEBEB"><input name="emp_name" type="text" id="emp_name" value="<?=$emp_name;?>" required="required"/></td>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">ตำแหน่ง : </td>
                 <td bgcolor="#EBEBEB"><input name="position" type="text" id="position" value="<?=$emp_posi;?>" required="required"/>
                 <td align="right" bgcolor="#EBEBEB">รหัสพนักงาน : </td>
                 <td bgcolor="#EBEBEB"><input name="emp_id" type="text" id="emp_id" value="<?=$emp_no;?>" required  pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"/></td>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">ประเภท : </td>
                 <td bgcolor="#EBEBEB"><input name="category" type="text" id="category" value="<?=$category;?>" required="required"/>
                 <td align="right" bgcolor="#EBEBEB">รหัสพนักงานจัดสรร : </td>
                 <td bgcolor="#EBEBEB"><input name="emp_no" type="text" id="emp_no" value="<?=$allocate_no;?>" required pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"/></td>
                 </td>
           </tr>
           </table>
           <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
           <tr>
                
                <td align="right"><button type="button" class="btn btn-danger" onclick="window.location='Showlist.php' ">ยกเลิก</button></td> 
                <td align="right"><button type="submit" class="btn btn-success"  name="Update" id="Update" value="Update">บันทึกการจัดสรร</button></td>
          </tr>
        </div>
        </table>

        </form>