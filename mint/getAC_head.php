
<?php
session_start();
include("../db_connect.php");


                                        if(isset($_GET['id'])){

                                        $id = $_GET['id'];
                                        }



                            $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            WHERE ac_id = $id";
                                        $ac_title = "";
                                        $ac_tname = "";
                                        $ac_name = "";
                                        $ac_empid = "";
                                        $ac_position= "";
                                        $dep_dep = "";
                                        $ac_TypeR = "";
                                        $ac_emp = "";
                                        $ac_date = "";
                                        $ac_head = "";
                                        $ac_hd_position ="";



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
                                        $ac_head = $_SESSION["User"];
                                        $ac_hd_position = $_SESSION["emp_position"];
                                        
                                        }

                                        echo  
                                        '

                                        <div class="table-responsive" >
                                        <table style="width:100%" align="center" border="1" class="table-bordered" >
                                        
                                        <tr>
                                        <input type="hidden" name="ac_id" id="ac_id" value="'.$id.'" >
                                        <input type="hidden" name="ac_tname" id="ac_tname" value="'.$ac_tname.'" >

                                        <td style="text-align: right;" width="40%;"><b>ชื่อผู้ยืม </b></td>
                                        <td width="60%;"><input type="text"  name="ac_name" id="ac_name" value="'.$ac_name.'" readonly style="cursor: not-allowed; border: none;" ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;" width="30%;"><b>เลขประจำตัว </b></td>
                                        <td width="20%;"><input type="text" name="ac_empid" id="ac_empid" value="'.$ac_empid.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>ตำเเหน่ง </b></td>
                                        <td ><input type="text" name="ac_position" id="ac_position" value="'.$ac_position.'" readonly style="cursor: not-allowed; border: none;" ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>หน่วยงาน </b></td>
                                        <td ><input type="text" name="ac_dep" id="ac_dep" value="'.$ac_dep.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>ประเภทห้อง </b></td>
                                        <td ><input type="text" name="ac_typeR" id="ac_typeR" value="'.$ac_typeR.'" readonly style="cursor: not-allowed; border: none;" ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>วันที่เริ่มทำรายการ </b></td>
                                        <td ><input type="text" name="ac_date" id="ac_date" value="'.$ac_date.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>พนักงานที่ทำรายการจัดสรร </b></td>
                                        <td ><input type="text" name="pm_empno" id="pm_empno" value="'.$ac_emp.'" readonly style="cursor: not-allowed; border: none;" ></td> 
                                        </tr>
                                        <tr>
                                        <td style="text-align: right;"><b>ผู้ตรวจสอบ </b></td>
                                        <td ><input type="text" name="ac_head" id="ac_head"  value="'.$ac_head.'" readonly style="cursor: not-allowed; border: none;"  ></td> 
                                        <input type="hidden" name="ac_hd_position" id="ac_hd_position" value="'.$ac_hd_position.'" > 
                                        </tr>
                                        </table>
                                        </div>
                                        <br>
                                        
                                        



                                        
                                        <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                                        <thead>
                                        <tr >
                                        <td style="text-align: center;">Barcode</td>
                                        <td style="text-align: center;">Serial</td>
                                        <td style="text-align: center;">ประเภทครุภัณฑ์</td>
                                        <td style="text-align: center;">สัญญา</td>

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

