<?php  
session_start();
include("../db_connect.php");          

               if($_POST['emp_id'] != ""  && $_POST['emp_fname'] != "" && $_POST['emp_lname'] != "" && $_POST['emp_position'] != "" && $_POST['emp_user'] != "" && $_POST['emp_pass'] != ""){
           $update = $_POST['emp_id'];
                    //   echo   $_POST['emp_id'];
            //   echo   $_POST['emp_fname'];
            //   echo   $_POST['emp_lname'];
            //   echo   $_POST['emp_position'];
            //   echo   $_POST['emp_user'];
            //   echo   $_POST['emp_pass'];
            //   echo   $_POST['emp_tel'];
            //   echo   $_POST['emp_mail'];
            //   echo   $_POST['emp_pic'];
            //     return;

                    if(is_array($_FILES))  {
                         foreach($_FILES['images']['name'] as $name => $value)  
                    {     
                         if(!empty($value) || $value != NULL || $value != ""){   
                                   $file_name = explode(".", $_FILES['images']['name'][$name]);  
                                   $allowed_extension = array("jpg", "jpeg", "png", "gif");

                                   $id = $_POST['emp_id'];
                                   $new_pic = $_FILES['images']['name'][$name];
                                   $fname = $_POST['emp_fname']; 
                                   $lname = $_POST['emp_lname']; 
                                   $position = $_POST['emp_position']; 
                                   $tel = $_POST['emp_tel']; 
                                   $mail = $_POST['emp_mail']; 
                                   $user =  $_POST['emp_user']; 
                                   $pass = $_POST['emp_pass']; 
                                   $image = $_FILES['images']['name'][$name];

                                
                              if(in_array($file_name[1], $allowed_extension))  
                              {  
                                   $new_name = $_FILES['images']['name'][$name];  
                                   $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                                   $targetPath = "images/".$new_name;
                                   $noup = 2;  

                                   $p = "SELECT * FROM employee WHERE emp_id = $id"; 
                                   $rs = $conn->query($p);
                                         while($row = mysqli_fetch_assoc($rs))
                                         {
                                              $img_old = $row["emp_pic"];
                                                          
                                        }   

                                        $result = "SELECT * FROM employee WHERE emp_pic = '$new_pic'";
                                        $result = mysqli_query($conn, $result);   
                                        $num_rows = mysqli_num_rows($result);   
                                          if($num_rows>0){
                                             $pic = $img_old; 
                                             $data = 2;
                                             echo $data;
                                             return;
                                             }else{
                                                                            
                                        $pic = $_FILES['images']['name'][$name];
                                             $data = 1;
                                        unlink("images/$img_old");
                                                  }


                              }else{
                                   $data = 6;
                                   echo $data;
                                   return;
                              }
                         }else{
                              $noup = 1;
                              $pic = $_POST['emp_pic']; 
                              $id = $_POST['emp_id']; 
                              $fname = $_POST['emp_fname']; 
                              $lname = $_POST['emp_lname']; 
                              $position = $_POST['emp_position']; 
                              $tel = $_POST['emp_tel']; 
                              $mail = $_POST['emp_mail']; 
                              $user =  $_POST['emp_user']; 
                              $pass = $_POST['emp_pass']; 
                         }
                    } 
               }

                $sql = "UPDATE `employee` SET `emp_fname`='$fname', `emp_lname`='$lname', `emp_position`='$position', `emp_tel`='$tel', `emp_mail`='$mail',`emp_pic`='$pic',`emp_user`='$user',`emp_pass`='$pass' WHERE `emp_id` = $id";                   
                                    if(mysqli_query($conn, $sql)){
                                       if($noup == 1){
                                                  $data = 1; 
                                                  echo $data;
                                       }else{
                                        move_uploaded_file($sourcePath, $targetPath); 
                                        $sql="SELECT * FROM `employee` WHERE emp_id ='$update'";
                                        // echo $sql;
                                                        $result = mysqli_query($conn,$sql);
                                      
                                      
                                      
                                                            $row = mysqli_fetch_array($result);
                                      
                                                  
                                                            $_SESSION["emp_pic"] = $row["emp_pic"];
                                      
                                        $data = 1; 
                                        echo $data;
                                       }      
                                    }else{
                                                  $data = 0;
                                                  echo $data;
                                         }
                          }else{
                          $data = 0;
                          echo $data;
                        }
         
      

   
 ?>  


