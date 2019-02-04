<?php  
include("../../db_connect.php");
          

               if($_POST['tor_name'] != "" && $_POST['tor_type'] != "" && $_POST['tor_contract'] != "" ){
                
                $name = $_POST['tor_name'];
                $type = $_POST['tor_type'];
                $con = $_POST['tor_contract'];
                $des = $_POST['tor_des'];



                  $result = "SELECT * FROM tor WHERE tor_type = '$type' AND tor_contract = '$con'";
                  $result = mysqli_query($conn, $result);
                    $num_rows = mysqli_num_rows($result);        
                    if($num_rows>0){
                           $data = 2;
                            echo $data;
                            return;
                    }else{
                            $sql = "INSERT INTO `tor`( `tor_name`,  `tor_des` , `tor_type`, `tor_contract`) VALUES 
                                  ('$name','$des','$type','$con')";
                    
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


