<?php  
 require_once 'db_connect.php';
 session_start();
 
 $data=0;
                $id = $_POST['id'];
               
                // echo $_POST['pm_userTname'];
                // echo $_POST['pm_username'];
                // echo $_POST['pm_userno'];
                // echo $_POST['pm_position'];
               //  echo $_POST['pm_dep'];
                // echo $_POST['pm_TypeR'];
                // echo $_POST['pm_empno'];
                // echo $_POST['pm_firstdate'];
                // echo $_POST['pm_enddate'];
                // echo $_POST['date'];
                // return;

                $choose = $_SESSION['chooseEq'];
                foreach ($choose as $key => $value) {
                    $status_eq = 5;
                    $updateeq = "UPDATE `equipment` SET `eq_status`= '$status_eq' WHERE eq_id = '$value'";
                    if(mysqli_query($conn, $updateeq)){ 

                     }else{
                                   $data = 6;
                                   echo $data;
                                   return;  
                          }

                    $sql = "SELECT * FROM equipment 
                    LEFT JOIN a_status
                    ON equipment.eq_status = a_status.status_id
                    LEFT JOIN tor
                    ON equipment.eq_tor = tor.tor_id
                    LEFT JOIN contract
                    ON tor.tor_contract = contract.con_id
                    LEFT JOIN type
                    ON tor.tor_type = type.type_id 
                    WHERE eq_id = '$value'";

                    $result = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_array($result)){
                        $eq_id = $data['eq_id']; 
                        $eq_barcode =  $data['eq_barcode']; 
                        $eq_serial =  $data['eq_serial']; 
                        $con_name = $data['con_name'];
                        $type_name =  $data['type_name']; 
                        $status_name =  $data['status_name'];

                        $pmd = "INSERT INTO `permit_detail`(`pmd_eq_id`, `pmd_eq_barcode`, `pmd_eq_serial`, `pmd_con_name`, `pmd_type_name`, `pmd_status_name`, `per_id`) 
                                                VALUES ('$eq_id','$eq_barcode','$eq_serial','$con_name','$type_name','$status_name','$id')";
                                                            if(mysqli_query($conn, $pmd)){
                                                                        $data = 1;
                                                                        
                                                            }else{
                                                                          $data = 6;
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
                $data = 1;
                echo $data;

 ?>  


