<?php  
 require_once 'db_connect.php';
          

               if($_POST['tor_name'] != "" && $_POST['tor_type'] != "" && $_POST['tor_contract'] != "")
            
               {  
                     $id = $_POST['tor_id'];
                     $name = $_POST['tor_name'];
                     $type = $_POST['tor_type'];
                     $con = $_POST['tor_contract'];
                     $des = $_POST['tor_des'];   
            
                     $result = "SELECT * FROM tor WHERE tor_name = '$name' AND tor_type = '$type' AND NOT tor_id = '$id'";
                     $result = mysqli_query($conn, $result);
                       $num_rows = mysqli_num_rows($result);        
                       if($num_rows>0){
                              $data = 2;
                               echo $data;
                       }else{


                $sql = "UPDATE `tor` SET `tor_name`='$name', `tor_des`='$des', `tor_type`='$type', `tor_contract`='$con' WHERE `tor_id` = $id";                   
                                    if(mysqli_query($conn, $sql)){
                                                  $data = 1; 
                                                  echo $data;
                                            
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


