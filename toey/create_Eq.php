<?php  
 require_once 'db_connect.php';
          

               if($_POST['eq_barcode'] != ""  && $_POST['eq_sr'] != "" && $_POST['eq_con'] != "null" && $_POST['eq_type'] != "null" ){
              
                    if(is_array($_FILES))  {
                         foreach($_FILES['images']['name'] as $name => $value)  
                    {     
                         if(!empty($value) || $value != NULL || $value != ""){   
                                   $file_name = explode(".", $_FILES['images']['name'][$name]);  
                                   $allowed_extension = array("jpg", "jpeg", "png", "gif");
                               
                              if(in_array($file_name[1], $allowed_extension))  
                              {  
                                   $new_name = $_FILES['images']['name'][$name];  
                                   $sourcePath = $_FILES["images"]["tmp_name"][$name];  
                                   $targetPath = "equipment_pic/".$new_name;

                                   $new_pic = $_FILES['images']['name'][$name];
                                   $barcode = $_POST['eq_barcode']; 
                                   $sr = $_POST['eq_sr']; 
                                   $con = $_POST['eq_con']; 
                                   $type = $_POST['eq_type']; 
                                   
                                   $result = "SELECT * FROM equipment WHERE eq_pic = '$new_pic'";
                                   $result = mysqli_query($conn, $result);   
                                   $num_rows = mysqli_num_rows($result);   
                                     if($num_rows>0){
                                        $data = 2;
                                        echo $data;
                                        return;
                                        }else{
                                             $pic = $_FILES['images']['name'][$name]; 
                                             $noup = 2;   
                                        }
                                   }else{
                                        $data = 7;
                                        echo $data;
                                        return;
                                   }
                         }else{
                              $noup = 1;
                              $pic = ""; 
                              $barcode = $_POST['eq_barcode']; 
                              $sr = $_POST['eq_sr']; 
                              $con = $_POST['eq_con']; 
                              $type = $_POST['eq_type']; 
                              $image = "test";

                              
                         }
                       
                   
                    } 
               }
                    $result = "SELECT * FROM equipment WHERE eq_barcode = '$barcode'";
                    $result = mysqli_query($conn, $result);   
                 $num_rows = mysqli_num_rows($result);        
                 if($num_rows>0){
                        $data = 3;
                        echo $data;
                        return;
                 }
                    $result = "SELECT * FROM equipment WHERE eq_serial = '$sr'";
                    $result = mysqli_query($conn, $result);   
                    $num_rows = mysqli_num_rows($result);   
                    if($num_rows>0){
                         $data = 4;
                       echo $data;
                       return;
                  }
                
                       
                        $t = "SELECT * FROM tor LEFT JOIN contract ON contract.con_id = tor_contract 
                        LEFT JOIN type ON type.type_id = tor_type WHERE con_name = '$con' AND type_name = '$type'";
                                $rs = $conn->query($t);
                                while($row = mysqli_fetch_assoc($rs)){
                                    $tor_i = $row["tor_id"];

                                    
                                }
                            $status = "รอจัดสรร";
                            $sql = "INSERT INTO `equipment`(`eq_barcode`, `eq_serial`, `eq_pic`, `eq_status`, `eq_tor`) VALUES 
                                  ('$barcode','$sr','$pic','$status','$tor_i')";
                    
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
                                                  $data = 6;
                                                  echo $data;
                                                  return;
                                         }
                          
                  }else{
                          $data = 5;
                          echo $data;
                          return;
                        }
         
      

   
 ?>  


