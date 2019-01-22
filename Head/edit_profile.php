<?php  
session_start();
include("../Home/db_connect.php");
?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อมูลส่วนตัว</title>
 
  <?php include("menu/link.php")  ?>
  </head>
  <?php include("menu/navbar_head.php")  ?>
  <body>

  <?php
  

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM employee WHERE emp_id='" . $_SESSION["emp_id"] . "'";
    $result = mysqli_query($conn, $sql); 

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {

?>
  
                    <div class="container">
                        <h2 style="text-align: center; font-family:Prompt;">แก้ไขข้อมูลส่วนตัว</h2>
                        <hr>
	                    <div class="row">
                    <!-- left column -->
                            <div class="col-md-3">
                                <div class="text-center">
                                <img src="img/<?php echo $row["emp_pic"]; ?>"width='100%' height='100%' class="img-fluid">
                                </div>
                            </div>
      
                    <!-- edit form column -->
                            <div class="col-md-9 personal-info">
                                 <h4 style="font-family:Prompt;"><b>ข้อมูลส่วนตัว</b></h4><br/>
                                <form action="save_profile.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label class="col-lg-3 control-label" style="font-family:Prompt; font-weight: bold;">อัพโหลดรูปภาพ</label>
                                        <div class="col-lg-8">
                                        <input type="file" name="file" class="text-center center-block file-upload">
                                        <input type="hidden" name="hdnOldFile" value="<?php echo $row["emp_pic"];?>">
                                        </div>
                                    </div> <hr/>     
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" style="font-family:Prompt; font-weight: bold;">หมายเลขพนักงาน:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="emp_id" readonly type="text" value="<?php echo $row["emp_id"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" style="font-family:Prompt; font-weight: bold;">ชื่อ:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="emp_fname" type="text" value="<?php echo $row["emp_fname"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" style="font-family:Prompt; font-weight: bold;">สกุล:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="emp_lname" type="text" value="<?php echo $row["emp_lname"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" style="font-family:Prompt; font-weight: bold;">ตำแหน่ง:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="emp_position" type="text" value="<?php echo $row["emp_position"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="font-family:Prompt; font-weight: bold;">โทรศัพท์:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="emp_tel" type="text" value="<?php echo $row["emp_tel"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="font-family:Prompt; font-weight: bold;">อีเมล์:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="emp_mail" type="text" value="<?php echo $row["emp_mail"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="font-family:Prompt; font-weight: bold;">Username:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="emp_user" type="text" value="<?php echo $row["emp_user"];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="font-family:Prompt; font-weight: bold;">Password:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="emp_pass" type="password" value="<?php echo $row["emp_pass"];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                        <br>
                              	        <button class="btn btn-success" type="submit" value="Save"><i class="glyphicon glyphicon-ok-sign"></i>บันทึก</button>
                               	        <a href="index_profile.php"><button class="btn btn-danger" type="button"><i class=""></i>ยกเลิก</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>


<?php            
    }
} else {
    echo "0 results";
}

$conn->close();

?>
  <?php include ("../Admin/pages/footer.php"); ?>
</body>
</html>

