<?php 
session_start();
        if(isset($_REQUEST['emp_user'])){
				//connection
                  include("con_db.php");
				//รับค่า user & password
                  $emp_user = $_REQUEST['emp_user'];
                  $emp_pass = $_REQUEST['emp_pass'];
				//query 
                  $sql="SELECT * FROM authoritie Where au_user='".$emp_user."' and au_pass='".$emp_pass."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["emp_id"] = $row["au_id"];
                      $_SESSION["User"] = $row["au_fname"]." ".$row["au_lname"];
                      $_SESSION["emp_status"] = $row["au_status"];

                      if($_SESSION["emp_status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: index_admin.php");

                      }

                      if ($_SESSION["emp_status"]=="member"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: index_emp.php");

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