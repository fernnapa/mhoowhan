<?php 
session_start();
        if(isset($_REQUEST['emp_user'])){
				//connection
                  include("con_db.php");
				//รับค่า user & password
                  $emp_user = $_REQUEST['emp_user'];
                  $emp_pass = $_REQUEST['emp_pass'];
				//query 
                  $sql="SELECT * FROM `employee` WHERE emp_user ='$emp_user' AND emp_pass ='$emp_pass'";
// echo $sql;
                  $result = mysqli_query($connect,$sql);


                  if(mysqli_num_rows($result)== 1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["emp_id"] = $row["emp_id"];
                      $_SESSION["User"] = $row["emp_fname"]." ".$row["emp_lname"];
                      $_SESSION["emp_status"] = $row["emp_status"];

                      if($_SESSION["emp_status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: /mhoowhan/Admin/index_admin.php");

                      }

                      if ($_SESSION["emp_status"]=="member"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: /mhoowhan/index_member.php");
                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
             Header("Location: /mhoowhan/login.php"); //user & password incorrect back to login again

        }
?>