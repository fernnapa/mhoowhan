<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--font-->
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

      <script>
           function push_depName(depName){
            var dep =  depName;
            var data = dep.split("|")
            // alert(data[0]);
            // alert(data[1]);
            document.getElementById("dep_no").value = data[1];
            document.getElementById("dname").value = data[0];
           }    
      </script>

      <!-- <script>
           function push_status(astatus){
            var st =  astatus;
            var data = st.split("|")
            // alert(data[0]);
            // alert(data[1]);
            document.getElementById("status_id").value = data[1];
            document.getElementById("status_name").value = data[0];
           }    
      </script>
       -->


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
  width: 80%;
  padding: 10px 10px;
  margin: 5px 3;
  display: inline-block;
  border: 0px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 20px 20px;
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


 
                  $eq_id = $_REQUEST["eq_id"];
                  $sql = "SELECT * FROM equipment 
                  LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                  LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                  LEFT JOIN contract ON tor.tor_contract = contract.con_id
                  LEFT JOIN a_status ON equipment.eq_status = a_status.status_id

                  WHERE eq_id='$eq_id' ";

                  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
                  $row = mysqli_fetch_array($result);
                  extract($row);


                  
        
?>


        <form action="listupdate_db.php" method="post" name="listupdate" id="listupdate">
        <br />
        <table width="800" border="0" align="center" cellpadding="1" cellspacing="0"> 
        
          
           <div class="container" align="center">  
           <tr>
           
                <td height="30" colspan="4" align="center" bgcolor="#A5B8CD">
                <h3>การจัดสรรครุภัณฑ์คอมพิวเตอร์</h3></td>
           </tr>
           <tr>
                <td width="15%" align="right" bgcolor="#EBEBEB">BarCode : </td>
                <td width="20%" bgcolor="#EBEBEB"><input name="barcode" type="text" id="barcode" value="<?=$eq_barcode;?>"  required="required" readonly/>
                <td width="15%" align="right" bgcolor="#EBEBEB">รายการ : </td>
                <td width="20%" bgcolor="#EBEBEB"><input name="titletor" type="text" id="titletor" value="<?=$type_name;?>"  required="required" readonly/></td>
                </td>
           </tr>
           
           <tr>
                <td  align="right" bgcolor="#EBEBEB">Serial Number : </td>
                <td  bgcolor="#EBEBEB"><input type="text" name="serial" id="serial" value="<?=$eq_serial;?>"  required="required" readonly/>
                <td align="right" bgcolor="#EBEBEB">สถานะ : </td>
                <td bgcolor="#EBEBEB">
                  <?php  

                        $sql_status_list = "SELECT * FROM `a_status`";   
                        $rs_status_list =$con->query($sql_status_list);

                  ?>
                        <select name="status" onchange="push_status(this.value)"  id="status"  required="required">

                        <option value="">โปรดเลือก</option>

                        <?php while($row = $rs_status_list->fetch_assoc()){ ?>

                        <option value="<?php echo $row["status_id"] ?>"><?php echo $row["status_name"] ?> </option>

                  <?php } ?>

                  </select>
                        


                </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">หน่วยงาน : </td>
                 <td bgcolor="#EBEBEB">
                 <?php  

                          $sql_dep_list = "SELECT * FROM `department`";   
                          $rs_dep_list =$con->query($sql_dep_list);

                  ?>
                    <select name="" onchange="push_depName(this.value)" id=""  required="required">

                        <option value="">โปรดเลือก</option>
                        
                        <?php while($row = $rs_dep_list->fetch_assoc()){ ?>

                              <option value="<?php echo $row["dep_name"] ?>|<?php echo $row["dep_no"] ?>"><?php echo $row["dep_name"] ?> </option>

                        <?php } ?>

                  </select>
                  <input type="hidden" name="dname" id="dname">

                 <td align="right" bgcolor="#EBEBEB">รหัสหน่วยงาน : </td>
                 <td bgcolor="#EBEBEB"><input name="dep_no" type="text" id="dep_no" readonly /></td>
                 </td>
           </tr>
           <tr>
                 <td  align="right" bgcolor="#EBEBEB">คำนำหน้า : </td>
                 <td  bgcolor="#EBEBEB"><input name="tname" type="text" id="tname"  required="required"/>
                 <td  align="right" bgcolor="#EBEBEB">ชื่อผู้เช่ายืม : </td>
                 <td  bgcolor="#EBEBEB"><input name="name" type="text" id="name"  required="required"/></td>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">ตำแหน่ง : </td>
                 <td bgcolor="#EBEBEB"><input name="position" type="text" id="position"  required="required"/>
                 <td align="right" bgcolor="#EBEBEB">รหัสพนักงาน : </td>
                 <td bgcolor="#EBEBEB"><input name="empid" type="text" id="empid"  required  pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"/></td>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">ประเภทห้อง : </td>
                 <td bgcolor="#EBEBEB"><input name="typeR" type="text" id="typeR"  required="required"/>
                 <td align="right" bgcolor="#EBEBEB">หนังสืออ้างอิง : </td>
                 <td bgcolor="#EBEBEB"><input name="refer" type="text" id="refer"  required="required"/>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB"> สัญญาเช่า : </td>
                 <td bgcolor="#EBEBEB"><input name="con" type="text" id="con" value="<?=$con_des;?>" required="required" readonly/>
                 <td align="right" bgcolor="#EBEBEB">หมายเหตุ : </td>
                 <td bgcolor="#EBEBEB"><input name="note" type="text" id="note"  required="required"/>
                 </td>
           </tr>
           <tr>
                 <td align="right" bgcolor="#EBEBEB">รหัสพนักงานจัดสรร : </td>
                 <td bgcolor="#EBEBEB"><input name="allo_no" type="text" id="allo_no"  required pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น"/></td>
                 <td bgcolor="#EBEBEB"> </td>
                 <td bgcolor="#EBEBEB">
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