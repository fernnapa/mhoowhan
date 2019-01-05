<?php  
 require_once 'db_connect.php';
          

               if($_POST['con_name'] != "" )
            
               {  
                    $id = $_POST['con_id'];
                     $name = $_POST['con_name'];
                     $des = $_POST['con_des'];

                     $result = "SELECT * FROM contract WHERE con_name = '$name' AND NOT con_id = '$id'";
                     $result = mysqli_query($conn, $result);
                       $num_rows = mysqli_num_rows($result);        
                       if($num_rows>0){
                              $data = 2;
                               echo $data;
                       }else{

                                
                $sql = "UPDATE `contract` SET `con_name`='$name', `con_des`='$des' WHERE `con_id` = $id";                   
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


