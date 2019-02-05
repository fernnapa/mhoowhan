<?php  
include("../../db_connect.php");
          

               if($_POST['eq_barcode'] != ""  && $_POST['eq_sr'] != "" && $_POST['eq_con'] != "null" && $_POST['eq_type'] != "null" ){
                            $barcode = $_POST['eq_barcode']; 
                           $sr = $_POST['eq_sr']; 
                            $con = $_POST['eq_con']; 
                            $type = $_POST['eq_type']; 

                              // return;
                  
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
                        LEFT JOIN type_eq ON type_eq.type_id = tor_type WHERE con_name = '$con' AND type_name = '$type'";
                                $rs = $conn->query($t);
                                while($row = mysqli_fetch_assoc($rs)){
                                    $tor_i = $row["tor_id"];

                                    
                                }
                            $status = 1;
                            $sql = "INSERT INTO `equipment`(`eq_barcode`, `eq_serial`, `eq_status`, `eq_tor`) VALUES 
                                  ('$barcode','$sr','$status','$tor_i')";
                    
                                    if(mysqli_query($conn, $sql)){   
                                                  $data = 1; 
                                                  echo $data;
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


