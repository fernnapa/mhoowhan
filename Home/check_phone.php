<?php 
session_start();
        if(isset($_REQUEST['emp_user'])){
				//connection
                  include("db_connect.php");
				//รับค่า user & password
                  $emp_user = $_REQUEST['emp_user'];
                  $eq_id = $_POST['id_eq'];
                
                 $emp_pass = $_REQUEST['emp_pass'];
				//query 
                  $sql="SELECT * FROM `employee` WHERE emp_user ='$emp_user' AND emp_pass ='$emp_pass'";
  // echo $sql;
                  $result = mysqli_query($conn,$sql);


                  if(mysqli_num_rows($result)== 1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["emp_id"] = $row["emp_id"]; 
                      $_SESSION["emp_no"] = $row["emp_no"];                                           
                      $_SESSION["User"] = $row["emp_fname"]." ".$row["emp_lname"];
                      $_SESSION["emp_status"] = $row["emp_status"];
                      $_SESSION["emp_position"] = $row["emp_position"];
                      $_SESSION["emp_pic"] = $row["emp_pic"];


                      if ($_SESSION["emp_status"]=="member"){
                          $sql2="SELECT * FROM `equipment` WHERE `eq_id` = $eq_id";
                          $result2 = mysqli_query($conn,$sql2);
                          while($row2 = mysqli_fetch_array($result2))
                          {
                                   $eq  = $row2["eq_id"];
                          }
                        echo "<script>";
                        echo 'location.href = "../Admin/pages/viewQR_Admin.php?ID='.$eq.'"';
                        echo "</script>";

                      }



                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
             header("Location: login_phone.php"); //user & password incorrect back to login again

        }
?>