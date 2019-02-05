<?php
include("../db_connect.php");
session_start();


                                        if(isset($_GET['id'])){

                                        $id = $_GET['id'];
                                        }



                            $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            LEFT JOIN employee
                            ON allocate.ac_emp = employee.emp_no
                            WHERE ac_id = $id";
                                        $ac_title = "";
                                        $ac_tname = "";
                                        $ac_name = "";
                                        $ac_empid = "";
                                        $ac_position= "";
                                        $dep_name = "";
                                        $ac_TypeR = "";
                                        $ac_emp = "";
                                        $ac_date = "";



                                        $rs = $conn->query($sql);
                                        while($row = mysqli_fetch_assoc($rs)){
                                        
                                        $ac_title = $row["ac_title"];
                                        $ac_tname = $row["ac_tname"];;
                                        $ac_name = $row["ac_name"];;
                                        $ac_empid = $row["ac_empid"];;
                                        $ac_position= $row["ac_position"];;
                                        $ac_dep = $row["dep_name"];;
                                        $ac_typeR = $row["ac_typeR"];;
                                        $ac_emp = $row["ac_emp"];;
                                        $ac_date = $row["ac_date"];
                                        
                                        }

                                        echo  
                                        '

                                        <div class="table-responsive" >
                                        <table style="width:100%" align="center" border="1" class="table table-hover table-striped table-bordered" >
                                        
                                        <tr>
                                        <input type="hidden" name="ac_id" id="ac_id" value="'.$id.'" >
                                        <input type="hidden" name="ac_tname" id="ac_tname" value="'.$ac_tname.'" >

                                        <td style="text-align: right;" width="40%;"><b>ชื่อผู้ยืม </b></td>
                                        <td style="text-align: left;" width="60%;">'.$ac_name.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;" width="30%;"><b>เลขประจำตัว </b></td>
                                        <td style="text-align: left;" width="20%;">'.$ac_empid.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>ตำเเหน่ง </b></td>
                                        <td style="text-align: left;">'.$ac_position.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>หน่วยงาน </b></td>
                                        <td style="text-align: left;">'.$ac_dep.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>ประเภทห้อง </b></td>
                                        <td style="text-align: left;">'.$ac_typeR.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>วันที่เริ่มทำรายการ </b></td>
                                        <td style="text-align: left;">'.$ac_date.'</td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>พนักงานที่ทำรายการจัดสรร </b></td>
                                        <td style="text-align: left;">'.$ac_emp.'</td> 
                                        </tr>
                                        
                                        </table>
                                        </div>
                                        <br><br>
                                        
                                        <h4 align="center" style="font-family:Prompt; font-weight: bold;">รายการครุภัณฑ์ของศูนย์คอมพิวเตอร์</h4>  




                                        
                                        <table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered " >
                                        <thead>
                                        <tr >
                                        <td style="text-align: center; font-weight: bold;">Barcode</td>
                                        <td style="text-align: center; font-weight: bold;">Serial</td>
                                        <td style="text-align: center; font-weight: bold;">ประเภทครุภัณฑ์</td>
                                        <td style="text-align: center; font-weight: bold;">สัญญา</td>

                                        </tr>
                                        </thead>
                                        <tr>';
                                        
                                        $sql = "SELECT * FROM allocate_detail
                                        WHERE ac_id = $id";
                                        $result = mysqli_query($conn, $sql);
                                        while($data = mysqli_fetch_array($result)):

                                        echo    '<td style="text-align:left">'.$data['ald_eq_barcode'].'</td>
                                        <td style="text-align:left">'.$data['ald_eq_serial'].'</td>
                                        <td style="text-align:left">'.$data['ald_type_name'].'</td>
                                        <td style="text-align:left">'.$data['ald_con_name'].'</td>

                                        </tr>';
                                        endwhile;
                                        echo '</table>';
                                        

                                        ?>

