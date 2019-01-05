<?php  
 require_once 'db_connect.php';
          

               if($_POST['con_name'] != "" ){
                    
                              
                              $name = $_POST['con_name']; 
                              $des = $_POST['con_des']; 

                  $result = "SELECT * FROM contract WHERE con_name = '$name'";
                  $result = mysqli_query($conn, $result);
                    $num_rows = mysqli_num_rows($result);        
                    if($num_rows>0){
                           $data = 2;
                            echo $data;
                    }else{
                            $sql = "INSERT INTO `contract`(`con_name`,`con_des`) VALUES 
                                  ('$name','$des')";
                    
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


