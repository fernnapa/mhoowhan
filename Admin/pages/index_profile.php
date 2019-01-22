<?php  
session_start();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Map</title>

  <?php include("link.php"); ?>
</head>

<body>

<?php include("navbar.php"); ?>

    <?php 
include("../../Home/db_connect.php");
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
  
      $sql = "SELECT * FROM employee WHERE emp_id='" . $_SESSION["emp_id"] . "'";
      $result = mysqli_query($conn, $sql); 
  
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
  
  ?>
        <div class="container">
            <h2 style="text-align: center; font-family:Prompt;">ข้อมูลส่วนตัว</h2>
            <hr> <br/> 
                <form method="post">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="text-center">
                              <img src="img/<?php echo $row["emp_pic"]; ?>"width='100%' height='100%' class="img-fluid">
                                  <h6 style="font-family:Prompt;">รูปภาพ</h6>
                          </div>
                      </div>
                     
  
                      <div class="col-md-8">
                          <div class="tab-content profile-tab" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">หมายเลขพนักงาน: </label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_id"]; ?></p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">ชื่อ: </label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_fname"]; ?></p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">สกุล:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_lname"]; ?></p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">ตำแหน่ง:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_position"]; ?></p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">โทรศัพท์:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_tel"]; ?></p>
                                              </div>
                                          </div>
  
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">อีเมล์:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_mail"]; ?></p>
                                              </div>
                                          </div>
                                          <hr>
  
  
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">Username:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_user"]; ?></p>
                                              </div>
                                          </div>
  
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">Password:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_pass"]; ?></p>
                                              </div>
                                          </div>
  
                                          <div class="row">
                                              <div class="col-md-4" style="text-align: right;">
                                                  <label class="control-label" style="font-family:Prompt;">สถานะผู้ใช้งาน:</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <p style="font-family:Prompt;"><?php echo $row["emp_status"]; ?></p>
                                              </div>
                                          </div>
  
                                          <br/><br/>
                                          <div class="row">
                                            <div class="col-md-8" style="text-align: center;">
                                              <?php echo "
                                                <a href=\"edit_profile.php?id=" . $row['emp_id'] . "\" class='btn btn-warning' name='btnAddMore' value='Edit Profile'><i class='mdi mdi-pencil' style='text-align: center; font-family:Prompt;'> &nbsp;แก้ไขข้อมูล</i></a>";
                                              ?>
                                            </div>
                                          </div>
                              </div>
                          </div>
                      </div>
                  </div> 
                </form>        
        </div>
 
    <?php      
        
              }
          } else {
              echo "0 results";
          }
  
          $conn->close();
  
    ?>

</body>
</html>
