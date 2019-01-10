<?php  
 require_once 'db_connect.php';
          

               if($_POST['type_name'] != "" ){
                    
                    
                              $name = $_POST['type_name']; 

                  $result = "SELECT * FROM type_eq WHERE type_name = '$name'";
                  $result = mysqli_query($conn, $result);
                    $num_rows = mysqli_num_rows($result);        
                    if($num_rows>0){
                           $data = 2;
                            echo $data;
                    }else{
                            $sql = "INSERT INTO `type_eq`(`type_name`) VALUES 
                                  ('$name')";
                    
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


