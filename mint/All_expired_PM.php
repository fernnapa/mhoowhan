<?php
include("../db_connect.php");

if(isset($_POST['id_exp'])){
    $id =  $_POST['id_exp']; 
    $pm_date_refund =  $_POST['pm_date_refund']; 
    echo $id;
    echo $pm_date_refund;
    return;


    $sql = "SELECT * FROM `permit_detail` WHERE per_id = $id";
    $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result))
            {
                $pmd_eq_id = $data['pmd_eq_id'];
                $pmd_eq_barcode = $data['pmd_eq_barcode'];
                $pmd_eq_serial = $data['pmd_eq_serial'];
                $pmd_con_name = $data['pmd_con_name'];
                $pmd_type_name = $data['pmd_type_name'];

                $bu_pm_id = "";
                $bu_pm_name = "";
                $bu_userTname = "";
                $bu_username = "";
                $bu_pm_userno = "";
                $bu_pm_position = "";
                $bu_pm_dep = "";
                $bu_pm_TypeR ="";
                $bu_pm_firstdate = "";
                $bu_pm_enddate = "";
                $bu_pm_empno = "";
                $bu_pm_date = "";
                $bu_pm_status ="";
                $bu_pm_note = "";

                $stt = 1;
                $updateeq = "UPDATE `equipment` SET `eq_status`='$stt' WHERE eq_id = $pmd_eq_id";
                mysqli_query($conn, $updateeq);

                $insBU = "INSERT INTO `backup_permit`(`bu_pm_id`, `bu_pm_name`, `bu_userTname`, `bu_username`, `bu_pm_userno`, `bu_pm_position`, `bu_pm_dep`, `bu_pm_TypeR`, `bu_pm_firstdate`, `bu_pm_enddate`, `bu_pm_empno`, `bu_pm_date`, `bu_pm_eq_id`, `bu_pm_barcode`, `bu_pm_serial`, `bu_pmd_con_name`, `pmd_type_name`) 
                VALUES ('$bu_pm_id','$bu_pm_name','$bu_userTname','$bu_username','$bu_pm_userno','$bu_pm_position','$bu_pm_dep','$bu_pm_TypeR','$bu_pm_firstdate','$bu_pm_enddate','$bu_pm_empno','$bu_pm_date','$pmd_eq_id','$pmd_eq_barcode','$pmd_eq_serial','$pmd_con_name','$pmd_type_name')";
                mysqli_query($conn, $insBU);

                    $buid = "SELECT bu_id FROM `backup_permit` ORDER BY bu_id DESC LIMIT 1";
                    $result = mysqli_query($conn, $buid);
                        while($data = mysqli_fetch_array($result))
                            {
                                $bu_id = $data['bu_id']; 
                            }
                        $selectper = "SELECT * FROM `permit` 
                            LEFT JOIN a_status
                            ON permit.pm_status = a_status.status_id
                            LEFT JOIN department
                            ON permit.pm_dep = department.dep_id
                            WHERE pm_id = $id";
                        $result = mysqli_query($conn, $selectper);
                            while($data = mysqli_fetch_array($result))
                            {
                                $bu_pm_id = $data['pm_id'];
                                $bu_pm_name = $data['pm_name'];
                                $bu_pm_userTname = $data['pm_userTname'];
                                $bu_pm_username = $data['pm_username'];
                                $bu_pm_userno = $data['pm_userno'];
                                $bu_pm_position = $data['pm_position'];
                                $bu_pm_dep = $data['dep_name'];
                                $bu_pm_TypeR = $data['pm_TypeR'];
                                $bu_pm_firstdate = $data['pm_firstdate'];
                                $bu_pm_enddate = $data['pm_enddate'];
                                $bu_pm_empno = $data['pm_empno'];
                                $bu_pm_date = $data['pm_date'];
                            }
                            $insBU2 = "UPDATE `backup_permit` SET `bu_pm_id`='$bu_pm_id',`bu_pm_name`='$bu_pm_name',`bu_userTname`='$bu_pm_userTname',`bu_username`='$bu_pm_username',`bu_pm_userno`='$bu_pm_userno',`bu_pm_position`='$bu_pm_position',`bu_pm_dep`='$bu_pm_dep',`bu_pm_TypeR`='$bu_pm_TypeR',`bu_pm_firstdate`='$bu_pm_firstdate',`bu_pm_enddate`='$bu_pm_enddate',`bu_pm_empno`='$bu_pm_empno',`bu_pm_date`='$bu_pm_date' WHERE bu_id = $bu_id";
                                if(mysqli_query($conn, $insBU2))
                                {
                                    $data = 1;
                                }else{
                                    $data = 2;
                                    echo $data;
                                    return;
                                }
            }
                
            $data = 1;
                echo $data;

        }

?>
