<?php 
session_start();
        if(isset($_REQUEST['emp_user'])){
				//connection
                  include("db_connect.php");
				//รับค่า user & password
                  $emp_user = $_REQUEST['emp_user'];
                  $emp_pass = $_REQUEST['emp_pass'];
				//query 
                  $sql="SELECT * FROM `employee` WHERE emp_user ='$emp_user' AND emp_pass ='$emp_pass'";
  // echo $sql;
                  $result = mysqli_query($conn,$sql);


                  if(mysqli_num_rows($result)== 1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["emp_id"] = $row["emp_id"];                      
                      $_SESSION["User"] = $row["emp_fname"]." ".$row["emp_lname"];
                      $_SESSION["emp_status"] = $row["emp_status"];
                      $_SESSION["emp_position"] = $row["emp_position"];
                      $_SESSION["emp_pic"] = $row["emp_pic"];

                      if($_SESSION["emp_status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า index_admin.php

                        Header("Location: ../Admin/pages/index_admin.php");

                      }

                      if ($_SESSION["emp_status"]=="member"){  //ถ้าเป็น เจ้าหน้าที่ ให้กระโดดไปหน้า index_emp.php

                        Header("Location: ../Employee/index_emp.php");
                      }

                      if ($_SESSION["emp_status"]=="head"){  //ถ้าเป็น หัวหน้าฝ่าย ให้กระโดดไปหน้า index_head.php

                        Header("Location: ../Head/index_head.php");
                      }

                      if ($_SESSION["emp_status"]=="leader"){  //ถ้าเป็น ผู้อำนวยศูนย์ ให้กระโดดไปหน้า index_leader.php

                        Header("Location: ../Leader/index_leader.php");
                      }



                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>