<?php  
 require_once 'db_connect.php';
          

               if($_POST['emp_id'] != ""  && $_POST['emp_fname'] != "" && $_POST['emp_lname'] != "" && $_POST['emp_position'] != "" && $_POST['emp_user'] != "" && $_POST['emp_pass'] != "" && $_POST['emp_status'] != ""){
                    
                    
                    if(is_array($_FILES))  {
                         foreach($_FILES['images']['name'] as $name => $value)  
                    {     
                         if(!empty($value) || $value != NULL || $value != ""){   
                                   $file_name = explode(".", $_FILES['images']['name'][$name]);  
                                   $allowed_extension = array("jpg", "jpeg", "png", "gif");

                                    $pic = $_FILES['images']['name'][$name];
                                   $id = $_POST['emp_id']; 
                                   $fname = $_POST['emp_fname']; 
                                   $lname = $_POST['emp_lname']; 
                                   $position = $_POST['emp_position']; 
                                   $tel = $_POST['emp_tel']; 
                                   $mail = $_POST['emp_mail']; 
                                   $user =  $_POST['emp_user']; 
                                   $pass = $_POST['emp_pass']; 
                                   $status = $_POST['emp_status']; 
                              
                              if(in_array($file_name[1], $allowed_extension))  
                              {  
                                   $new_name = $_FILES['images']['name'][$name];  
                                   $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                                   $targetPath = "upload/".$new_name;
                                   $noup = 2;   
                              }
                         }else{
                              $noup = 1;
                              $pic = ""; 
                              $id = $_POST['emp_id']; 
                              $fname = $_POST['emp_fname']; 
                              $lname = $_POST['emp_lname']; 
                              $position = $_POST['emp_position']; 
                              $tel = $_POST['emp_tel']; 
                              $mail = $_POST['emp_mail']; 
                              $user =  $_POST['emp_user']; 
                              $pass = $_POST['emp_pass']; 
                              $status = $_POST['emp_status']; 
                              
                         }
                       
                   
                    } 
               }
                         $image = $_POST['emp_pic'];
                  $result = "SELECT * FROM employee WHERE emp_id = '$id' OR emp_pic = '$image'";
                  $result = mysqli_query($conn, $result);
                    $num_rows = mysqli_num_rows($result);        
                    if($num_rows>0){
                           $data = 2;
                            echo $data;
                    }else{
                            $sql = "INSERT INTO `employee`(`emp_id`, `emp_fname`, `emp_lname`, `emp_position`, `emp_tel`, `emp_mail`,`emp_pic`,`emp_user`,`emp_pass`,`emp_status`) VALUES 
                                  ('$id','$fname','$lname','$position','$tel','$mail','$pic','$user','$pass','$status')";
                    
                                    if(mysqli_query($conn, $sql)){
                                       if($noup == 1){
                                                  $data = 1; 
                                                  echo $data;
                                       }else{
                                        move_uploaded_file($sourcePath, $targetPath); 
                                        $data = 1; 
                                        echo $data;
                                       }      
                                    }else{
                                                  $data = 0;
                                                  echo $data;
                                         }
                          }
                  }else{
                          $data = 0;
                          echo $data;
                        }
         
      

   
 ?>  


