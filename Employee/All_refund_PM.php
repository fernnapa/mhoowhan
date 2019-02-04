<?php
include("../db_connect.php");


if(isset($_POST['id_rf'])){
    $id =  $_POST['id_rf']; 
    $pm_date_refund =  $_POST['pm_date_refund']; 
    
    // echo $pm_date_refund;
    // return;
  
    $pmstt = 12;
    $UPD_dateRFN = "UPDATE `permit` SET `pm_status`= '$pmstt',`pm_date_refund`= '$pm_date_refund' WHERE `pm_id` = $id";
    mysqli_query($conn, $UPD_dateRFN);
    // echo $UPD_dateRFN;
    // return;
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

                    $buid = "SELECT * FROM `backup_permit` ORDER BY bu_id DESC LIMIT 1";
                    $result3 = mysqli_query($conn, $buid);
                        while($data3 = mysqli_fetch_array($result3))
                            {
                                $bu_id = "";
                                $bu_id = $data3['bu_id']; 
                            }
                        $selectper = "SELECT * FROM `permit` 
                            LEFT JOIN a_status
                            ON permit.pm_status = a_status.status_id
                            LEFT JOIN department
                            ON permit.pm_dep = department.dep_id
                            WHERE pm_id = '$id'";
                        $result2 = mysqli_query($conn, $selectper);
                            while($data2 = mysqli_fetch_array($result2))
                            {
                                $bu_pm_id = $data2['pm_id'];
                                $bu_pm_name = $data2['pm_name'];
                                $bu_pm_userTname = $data2['pm_userTname'];
                                $bu_pm_username = $data2['pm_username'];
                                $bu_pm_userno = $data2['pm_userno'];
                                $bu_pm_position = $data2['pm_position'];
                                $bu_pm_dep = $data2['dep_name'];
                                $bu_pm_TypeR = $data2['pm_TypeR'];
                                $bu_pm_firstdate = $data2['pm_firstdate'];
                                $bu_pm_enddate = $data2['pm_enddate'];
                                $bu_pm_empno = $data2['pm_empno'];
                                $bu_pm_date = $data2['pm_date'];
                                $bu_pm_date_refund = $data2['pm_date_refund'];

                            }
                            $insBU2 = "UPDATE `backup_permit` SET `bu_pm_id`='$bu_pm_id',`bu_pm_name`='$bu_pm_name',`bu_userTname`='$bu_pm_userTname',`bu_username`='$bu_pm_username',`bu_pm_userno`='$bu_pm_userno',`bu_pm_position`='$bu_pm_position',`bu_pm_dep`='$bu_pm_dep',`bu_pm_TypeR`='$bu_pm_TypeR',`bu_pm_firstdate`='$bu_pm_firstdate',`bu_pm_enddate`='$bu_pm_enddate',`bu_pm_empno`='$bu_pm_empno',`bu_pm_date`='$bu_pm_date',`bu_pm_date_refund`='$bu_pm_date_refund' WHERE bu_id = $bu_id";
                                if(mysqli_query($conn, $insBU2))
                                {
                                    $data = 1;
                                }else{
                                    $data = 2;
                                    echo $data;
                                    return;
                                }
            }
                $Del = "DELETE FROM `permit` WHERE pm_id = $id";
                if(mysqli_query($conn, $Del))
                {
                    $data = 1;
                }else{
                    $data = 2;
                    echo $data;
                    return;
                }
            $data = 1;
                echo $data;

        }

?>
