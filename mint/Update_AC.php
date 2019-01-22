<?php
require_once 'db_connect.php';

if($_POST['ac_name'] != "" && $_POST['ac_tname'] != ""  && $_POST['ac_title'] != "" && $_POST['ac_empid'] != "" && $_POST['ac_position'] != "" && $_POST['ac_dep'] != "test" && $_POST['ac_typeR'] != ""  && $_POST['ac_emp'] != "" )
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
                                        $ac_title =  $_POST['ac_title'];
                                        $ac_tname =  $_POST['ac_tname'];
                                        $ac_name =  $_POST['ac_name'];
                                        $ac_empid =  $_POST['ac_empid'];
                                        $ac_position = $_POST['ac_position'];
                                        $ac_dep = $_POST['ac_dep'];
                                        $ac_typeR = $_POST['ac_typeR'];
                                        $ac_emp =  $_POST['ac_emp'];
                                        $date = $_POST['date'];
                                        $status = 7;
                                        $note = "";

          $sql = "UPDATE `allocate` SET `ac_title`='$ac_title',
                                        `ac_dep`='$ac_dep',
                                        `ac_tname`='$ac_tname',
                                        `ac_name`='$ac_name',
                                        `ac_position`='$ac_position',
                                        `ac_empid`='$ac_empid',
                                        `ac_typeR`='$ac_typeR',
                                        `ac_emp`='$ac_emp',
                                        `ac_date`='$date',
                                        `ac_status`='$status',
                                        `ac_note`='$note' 
                                        WHERE ac_id = $id ";
    
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