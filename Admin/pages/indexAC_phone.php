<?php  
        session_start();
        include("../../db_connect.php");
        $_SESSION['chooseEq'] = array();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <?php include("link_phone.php"); ?>
            
                <style>
                        table, th, td    {
                        }
                        td {
                            padding: 5px;
                            text-align: center;    
                        }
                        th {
                            padding: 5px;
                        }
                        body{
                            font-family: 'Kanit', sans-serif;
                        }
                        .search-table-outter { overflow-x: scroll; }
                        .w3-theme-l2 {color:#fff !important;background-color:#78acce !important}
                </style>
                </head>
                

                <title>รายการจัดสรรครุภัณฑ์</title>
         <body >
<!-- Modal ดูข้อมูลPM -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" style="font-family:Prompt;"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewAC" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>


                    
                <div class="container" > 
                   
                    <table border="0" align="center" style="width:100%;" class="w3-teal w3-round">
                    <tr>
                    <td style="font-family:Prompt;"><h3><b>รายการจัดสรรครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    
                    <br>
                    <div  id="result">
                    <p></p>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr >
                        <td style="text-align: center;">จุดประสงค์การจัดสรร</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
 

                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                            LEFT JOIN employee
                            ON allocate.ac_emp = employee.emp_id
                          
                          
                            WHERE ac_status = 9 OR ac_status = 7 OR ac_status = 6 OR ac_status= 2 OR ac_status= 8 OR ac_status= 10 OR ac_status= 11";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];
//                          $test =0;

                        //  $exp_date = $data['pm_enddate'];
                        //  $today_date = date('Y-m-d');
                        //  $exp = strtotime($exp_date);
                        //  $td = strtotime($today_date);
                        //  if($td > $exp){
                        //     $test =1;
                         
                       ?>

                        <?php 
                            // if($test == 1){
                            //     $status = 12; 
                            //     $update = "UPDATE `allocate` SET `ac_status`='$status' WHERE ac_id = $id ";
                            //     $rs = mysqli_query($conn, $update);
                            //     $st = "SELECT * FROM allocate
                            //     LEFT JOIN a_status
                            //     ON allocate.ac_status = a_status.status_id
                            //     LEFT JOIN department
                            //     ON allocate.ac_dep = department.dep_id WHERE ac_id = $id";
                            //     $rs1 = mysqli_query($conn, $st);
                            //     while($ex = mysqli_fetch_array($rs1)){
                            //       $stn = $ex['ac_status'];
                            //       $name = $ex['ac_name'];
                            //       $username = $ex['ac_username'];
                            //       $dep = $ex['dep_name'];
                            //       $emp = $ex['pm_empno'];
                            //       $status_name = $ex['status_name'];
                            //     }
                            
                        
                        if($stn == "รอตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                    <?php } ?>
                    <?php if($stn == "ไม่ผ่านการตรวจสอบ"){ ?>  
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                     

                    <?php } if($stn == "ไม่อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        

                    <?php } if($stn == "อนุมัติ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                        
                        
                    <?php }if($stn == "ผ่านการตรวจสอบ"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                       
                    <?php }if($stn == "รออนุมัติ"){?>

                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                      

                         <?php }if($stn == "จัดสรร"){ ?>
                        <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                        <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['emp_fname']; ?>&nbsp;&nbsp;<?php echo $data['emp_lname']; ?></td>
                        <td style="text-align:center"  class="w3-blue-gray"><?php echo $data['status_name']; ?></td>
                      
                    <?php } ?>
                        </tr>
                       <?php endwhile; ?>
                </table>
                </form>
<br>
<br>
                <table align="center" border="0" style="width:100%">
                <tr>
                <td><a class="btn btn-danger btn-block" href="../../Home/logout_phone.php">ออกจากระบบ</a>
                </tr>
                </table>
                </div>
                <br>
                </div>





                
                        
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
          <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<!-- /.data -->
<!-- /.script modal add -->


<!-- /.data -->
<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true
});  
 }); 
</script>







        </body>
</html>
