<?php  
include("../../db_connect.php");          
    
     
               if($_POST['eq_barcode'] != ""  && $_POST['eq_sr'] != "" && $_POST['eq_con'] != "" && $_POST['eq_type'] != ""){
               // //    echo  $barcode = $_POST['eq_barcode']; 
               // //         echo    $sr = $_POST['eq_sr']; 
               // //         echo     $con = $_POST['eq_con']; 
               // //          echo    $type = $_POST['eq_type']; 

               //                return;
               $id = $_POST['eq_id']; 

                                $barcode = $_POST['eq_barcode']; 
                                  $sr = $_POST['eq_sr']; 
                                 $con = $_POST['eq_con']; 
                                 $type = $_POST['eq_type']; 
       
               
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

               
                                  
               $t = "SELECT * FROM tor LEFT JOIN contract ON contract.con_id = tor_contract 
               LEFT JOIN type_eq ON type_eq.type_id = tor_type WHERE con_name = '$con' AND type_name = '$type'";
                       $rs = $conn->query($t);
                       while($row = mysqli_fetch_assoc($rs)){
                           $tor_i = $row["tor_id"];

                           
                       }
                   
                                   
                $sql = "UPDATE `equipment` SET `eq_barcode`='$barcode', `eq_serial`='$sr', `eq_tor`='$tor_i' WHERE `eq_id` = '$id'";                   
                                    if(mysqli_query($conn, $sql)){
                                                  $data = 1; 
                                                  echo $data;
                                     
                                    }else{
                                                  $data = 5;
                                                  echo $data;
                                         }
                                        
                          }else{
                          $data = 7;
                          echo $data;
                        }
         


   
 ?>  


