<?php  
include("../../db_connect.php");          
    
     
               if($_POST['eq_barcode'] != ""  && $_POST['eq_sr'] != "" && $_POST['eq_con'] != "" && $_POST['eq_type'] != ""){
                    if(is_array($_FILES))  {
                         
                       
                         foreach($_FILES['images']['name'] as $name => $value)  
                    {     

                        
                         if(!empty($value) || $value != NULL || $value != ""){   
                                   $file_name = explode(".", $_FILES['images']['name'][$name]);  
                                   $allowed_extension = array("jpg", "jpeg", "png", "gif");

                                   $id = $_POST['eq_id']; 
                                   $new_pic = $_FILES['images']['name'][$name];
                                   $barcode = $_POST['eq_barcode']; 
                                   $sr = $_POST['eq_sr']; 
                                   $con = $_POST['eq_con']; 
                                   $type = $_POST['eq_type']; 
                                   $image = $_FILES['images']['name'][$name];


                                   if(in_array($file_name[1], $allowed_extension))  
                                   {  
                                        $new_name = $_FILES['images']['name'][$name];  
                                        $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                                        $targetPath = "../Admin/pages/equipment_pic/$new_name";
                                        $noup = 2;   


                                        $p = "SELECT * FROM equipment WHERE eq_id = $id"; 
                                        $rs = $conn->query($p);
                                              while($row = mysqli_fetch_assoc($rs))
                                              {
                                                   $img_old = $row["eq_pic"];
                                                               
                                         }
      
      
                                         $result = "SELECT * FROM equipment WHERE eq_pic = '$new_pic'";
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
                                         unlink("../Admin/pages/equipment_pic/$img_old");
                                                   }
                                   }else{
                                        $data = 6;
                                        echo $data;
                                        return;
                                   }


                                
                                

                         }else{
                            $noup = 1;
                            $id = $_POST['eq_id']; 
                            $pic = $_POST['eq_pic']; 
                            $barcode = $_POST['eq_barcode']; 
                            $sr = $_POST['eq_sr']; 
                            $con = $_POST['eq_con']; 
                            $type = $_POST['eq_type']; 
                            $image = "test";
                            $data = 1;
                         }
                    } 
               }

               
               $result = "SELECT * FROM equipment WHERE eq_barcode = '$barcode' AND NOT eq_id = $id ";
               $result = mysqli_query($conn, $result);   
                 $num_rows = mysqli_num_rows($result);        
                 if($num_rows>0){
                        $data = 3;
                        echo $data;
                        return;
                 }
                    $result = "SELECT * FROM equipment WHERE eq_serial = '$sr' AND NOT eq_id = $id ";
                    $result = mysqli_query($conn, $result);   
                    $num_rows = mysqli_num_rows($result);   
                    if($num_rows>0){
                         $data = 4;
                       echo $data;
                       return;
                  }

               
               
                if($data == 1){
                   
               $t = "SELECT * FROM tor LEFT JOIN contract ON contract.con_id = tor_contract 
               LEFT JOIN type_eq ON type_eq.type_id = tor_type WHERE con_name = '$con' AND type_name = '$type'";
                       $rs = $conn->query($t);
                       while($row = mysqli_fetch_assoc($rs)){
                           $tor_i = $row["tor_id"];

                           
                       }
                   
                       $status = 1;
                                   
                $sql = "UPDATE `equipment` SET `eq_barcode`='$barcode', `eq_serial`='$sr', `eq_pic`='$pic', `eq_tor`='$tor_i', `eq_status`='$status' WHERE `eq_id` = '$id'";                   
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
                                                  $data = 5;
                                                  echo $data;
                                         }
                                        }else{
                                             $data = 2;
                                             
                                        }  
                          }else{
                          $data = 7;
                          echo $data;
                        }
         


   
 ?>  


