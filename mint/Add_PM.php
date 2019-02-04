<?php  
include("../db_connect.php");
session_start();
 
 $data=0;

               if($_POST['pm_username'] != "" && $_POST['pm_userTname'] != ""  && $_POST['pm_name'] != "" && $_POST['pm_userno'] != "" && $_POST['pm_position'] != "" && $_POST['pm_dep'] != "test" && $_POST['pm_TypeR'] != "" && $_POST['pm_firstdate'] != "" && $_POST['pm_enddate'] != ""  && $_POST['pm_empno'] != "" ){
               //  echo $_POST['pm_userTname'];
               //  echo $_POST['pm_username'];
               //  echo $_POST['pm_userno'];
               //  echo $_POST['pm_position'];
               //  echo $_POST['pm_dep'];
               //  echo $_POST['pm_TypeR'];
               //  echo $_POST['pm_empno'];
               //  echo $_POST['pm_firstdate'];
               //  echo $_POST['pm_enddate'];
               //  echo $_POST['date'];
               //  return;

                 $pm_name =  $_POST['pm_name'];
                $pm_userTname =  $_POST['pm_userTname'];
             $pm_username =  $_POST['pm_username'];
                $pm_userno =  $_POST['pm_userno'];
                $pm_position = $_POST['pm_position'];
             $pm_dep = $_POST['pm_dep'];
                $pm_TypeR = $_POST['pm_TypeR'];
                $pm_empno =  $_POST['pm_empno'];
                $pm_firstdate = $_POST['pm_firstdate'];
             $pm_enddate =  $_POST['pm_enddate'];
                $date = $_POST['date'];
                $dateAN = $_POST['date'];



                            $status = 7;
                            $sql = "INSERT INTO `permit`( `pm_name`, `pm_userTname`, `pm_username`, `pm_userno`, `pm_position`, `pm_dep`, `pm_TypeR`, `pm_firstdate`, `pm_enddate`, `pm_empno`, `pm_date`, `pm_status`, `pm_date_analys`) 
                                            VALUES ('$pm_name','$pm_userTname','$pm_username','$pm_userno','$pm_position','$pm_dep',' $pm_TypeR','$pm_firstdate','$pm_enddate','$pm_empno ','$date', '$status', '$dateAN')";
                                    if(mysqli_query($conn, $sql)){

                            $choose = $_SESSION['chooseEq'];
                            foreach ($choose as $key => $value) {
                                        $status_eq = 5;
                            $updateeq = "UPDATE `equipment` SET `eq_status`= '$status_eq' WHERE eq_id = '$value'";
                            if(mysqli_query($conn, $updateeq)){ 

                             }else{
                                           $data = "6";
                                           echo $data;
                                           return;  
                                  }
                            $pm = "SELECT pm_id FROM `permit` ORDER BY pm_id DESC LIMIT 1";
                            $result = mysqli_query($conn, $pm);
                            while($data = mysqli_fetch_array($result)){
                               $pm_id = $data['pm_id']; 
                                
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
                                     WHERE eq_id = '$value'";
                            
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
                                
                              
                            $pmd = "INSERT INTO `permit_detail`(`pmd_eq_id`, `pmd_eq_barcode`, `pmd_eq_serial`, `pmd_con_name`, `pmd_type_name`, `pmd_status_name`, `per_id`) 
                                                VALUES ('$eq_id','$eq_barcode','$eq_serial','$con_name','$type_name','$status_name',' $pm_id')";
                                                            if(mysqli_query($conn, $pmd)){
                                                                        $data = 1;
                                                                        
                                                            }else{
                                                                          $data = "6";
                                                                          echo $data;
                                                                          return;
                                                                 }
                             }
                            }
                             $denie = $_SESSION['chooseEq'];
                             foreach ($denie as $key => $value) {
                                $del_val = $value;
                                if (($key = array_search($del_val, $_SESSION['chooseEq'])) !== false) {
                                    unset($_SESSION['chooseEq'][$key]);
                                }
                             } 
                             $data =1;
                             echo $data;
                                        
                                    }else{
                                                  $data = "6";
                                                  echo $data;
                                                  return;
                                         }
                  }else{
                          $data = 5;
                          echo $data;
                          return;
                        }
         
      
                        
   
 ?>  


