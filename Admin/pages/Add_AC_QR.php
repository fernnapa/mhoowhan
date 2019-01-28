<?php  

include("../../Home/db_connect.php");
 
 $data=0;

               if($_POST['ac_title'] != "" && $_POST['ac_tname'] != ""  && $_POST['ac_name'] != "" && $_POST['ac_empid'] != "" && $_POST['ac_position'] != "" && $_POST['ac_dep'] != "test" && $_POST['ac_typeR'] != ""  && $_POST['ac_emp'] != "" ){
               


                $ac_title =  $_POST['ac_title'];
                $ac_tname =  $_POST['ac_tname'];
                $ac_name =  $_POST['ac_name'];
                $ac_empid =  $_POST['ac_empid'];
                $ac_position = $_POST['ac_position'];
                $ac_dep = $_POST['ac_dep'];
                $ac_typeR = $_POST['ac_typeR'];
                $ac_emp =  $_POST['ac_emp'];
                $date = $_POST['date'];
                $id = $_POST['id'];




                            $status = 7;
                            $sql = "INSERT INTO `allocate`(`ac_title`, `ac_dep`, `ac_tname`, `ac_name`, `ac_position`, `ac_empid`, `ac_typeR`, `ac_emp`, `ac_date`, `ac_status`) 
                                                     VALUES ('$ac_title','$ac_dep','$ac_tname','$ac_name','$ac_position','$ac_empid','$ac_typeR','$ac_emp','$date','$status')";
                            
            
                                    if(mysqli_query($conn, $sql)){

                                        $status_eq = 5;
                            $updateeq = "UPDATE `equipment` SET `eq_status`= '$status_eq' WHERE eq_id = $id";
                            if(mysqli_query($conn, $updateeq)){ 

                             }else{
                                           $data = 6;
                                           echo $data;
                                           return;  
                                  }
                            $ac = "SELECT ac_id FROM `allocate` ORDER BY ac_id DESC LIMIT 1";
                            $result = mysqli_query($conn, $ac);
                            while($data = mysqli_fetch_array($result)){
                               $ac_id = $data['ac_id']; 
                                
                            }

                   
                            $eq_choose = "SELECT * FROM equipment
                                     LEFT JOIN a_status
                                     ON equipment.eq_status = a_status.status_id
                                     LEFT JOIN tor
                                     ON equipment.eq_tor = tor.tor_id
                                     LEFT JOIN contract
                                     ON tor.tor_contract = contract.con_id
                                     LEFT JOIN type_eq
                                     ON tor.tor_type = type_eq.type_id 
                                     WHERE eq_id = $id";
                            
                              $result = mysqli_query($conn, $eq_choose);
                              while($data = mysqli_fetch_array($result)){
                                 $eq_id = $data['eq_id']; 
                                 $eq_barcode =  $data['eq_barcode']; 
                                 $eq_serial =  $data['eq_serial']; 
                                 $con_name = $data['con_name'];
                                 $type_name =  $data['type_name']; 
                                 $status_name =  $data['status_name'];

                                // echo $eq_id; 
                                // echo $eq_barcode; 
                                // echo  $eq_serial; 
                                // echo $con_name;
                                // echo $type_name; 
                                // echo $status_name;
                                
                              
                            $ald = "INSERT INTO `allocate_detail`(`ald_eq_id`, `ald_eq_barcode`, `ald_eq_serial`, `ald_con_name`, `ald_type_name`, `ald_status_name`, `ac_id`) 
                                                   VALUES ('$eq_id','$eq_barcode','$eq_serial','$con_name','$type_name','$status_name',' $ac_id')";

                                                            if(mysqli_query($conn, $ald)){
                                                                        $data = 1;

                                                                        echo $data;
                                                                        
                                                            }else{
                                                                          $data = 6;
                                                                          echo $data;
                                                                          return;
                                                                 }
                             }
                            
                             
                             } 
                          
                                
                  }else{
                          $data = 5;
                          echo $data;
                          return;
                        }
         
      
                        
   
 ?>  


