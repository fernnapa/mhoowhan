<?php
require_once 'db_connect.php';

if($_POST['pm_username'] != "" && $_POST['pm_userTname'] != ""  && $_POST['pm_name'] != "" && $_POST['pm_userno'] != "" && $_POST['pm_position'] != "" && $_POST['pm_dep'] != "test" && $_POST['pm_TypeR'] != "" && $_POST['pm_firstdate'] != "" && $_POST['pm_enddate'] != ""  && $_POST['pm_empno'] != "" )
{
                
                // echo $_POST['id'];
                // echo $_POST['pm_userTname'];
                // echo $_POST['pm_username'];
                // echo $_POST['pm_userno'];
                // echo $_POST['pm_position'];
                // echo $_POST['pm_dep'];
                // echo $_POST['pm_name'];
                // echo $_POST['pm_TypeR'];
                // echo $_POST['pm_empno'];
                // echo $_POST['pm_firstdate'];
                // echo $_POST['pm_enddate'];
                // echo $_POST['date'];
                // return;  
   
            $id  = $_POST['id'];
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
    $note = "";
    $sql = "UPDATE `permit` SET `pm_name`='$pm_name',`pm_userTname`='$pm_userTname',`pm_username`='$pm_username',`pm_userno`='$pm_userno',`pm_position`='$pm_position',`pm_dep`='$pm_dep',`pm_TypeR`='$pm_TypeR',`pm_firstdate`='$pm_firstdate',`pm_enddate`='$pm_enddate',`pm_empno`='$pm_empno',`pm_date`='$date',`pm_status`='$status',`pm_note`='$note',`pm_date_analys`='$dateAN' WHERE pm_id = $id ";
                    if(mysqli_query($conn, $sql))
                    {
                        $data = 1;
                        echo $data;
                    }else{
                        $data = 6;
                        echo $data;
                        return;
                    }
}



?>