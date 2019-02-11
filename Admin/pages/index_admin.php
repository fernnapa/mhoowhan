<?php  
session_start();
include("../../db_connect.php");
?>  

<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>หน้าแรก</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <?php include("link.php"); ?>

    <style>
    .modal-dialog.a{
        max-width : 900px;
        max-height: 550px;
    }

    table, th, td{
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
    </style>

</head>


<body>

    <?php include("navbar.php"); ?>

    <div class="card">
      <div class="card-body">

    <!-----------------detail---------------------------->
    <div class="modal fade" tabindex="1" role="dialog" id="ModalViewAC">
        <div class="modal-dialog a" role="document">
            <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family:Prompt;"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body table-responsive">
                    <form id="ViewAC" ></form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

  <!-----------------detail---------------------------->

  <div class="container" >    
        <table border="0" align="center" style="width:100%;" class="w3-teal">
            <tr>
                <td><p><h3 style="font-family:Prompt;"><b>รายการการจัดการครุภัณฑ์คอมพิวเตอร์</b></h3></a></button></td>
            </tr>
        </table>
        <hr>
                    
                    <div class="table-responsive" id="result">
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-hover table table-striped table-bordered" >
                    <thead>
                    <tr >
                        <td style="text-align: center; font-weight: bold; width='350px'">รายชื่อ</td>
                        <td style="text-align: center; font-weight: bold; width='500px'">หน่วยงาน</td>
                        <td style="text-align: center; font-weight: bold; width='100px'">สถานะ</td>
                        <td style="text-align: center; font-weight: bold; width='100px'">พนักงานจัดสรร</td>
                        <td></td>



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
                          
                          
                            WHERE ac_status = 2";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];

                         if($stn == "จัดสรร"){ ?>
                          <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                          <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                          <td style="text-align:left"><?php echo $data['status_name']; ?></td>             
                          <td style="text-align:left"><?php echo $data['emp_fname']." ".$data['emp_lname']; ?></td>
                          <td><button type="button" name="submitview" class="btn btn-icons  btn-primary btn-md"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)"><i class="mdi mdi-file-document"></i></button></td>

                              
                      <?php } ?>
  
                     
                          </tr>
                         <?php endwhile; ?>

                         <?php
                                $sql2 = "SELECT * FROM permit
                                LEFT JOIN a_status
                                ON permit.pm_status = a_status.status_id
                                LEFT JOIN department
                                ON permit.pm_dep = department.dep_id
                                LEFT JOIN employee
								ON permit.pm_empno = employee.emp_id
                               
                              
                                WHERE pm_status= 3 ";
                              $result2 = mysqli_query($conn, $sql2);
                              while($data1 = mysqli_fetch_array($result2)):
                              $idpm = $data1['pm_id'];
                              $stnpm = $data1['status_name'];

                              if($stnpm == "ยืม - คืน"){ ?>  
                                <td style="text-align:left"><?php echo $data1['pm_username']; ?></td>
                                <td style="text-align:left"><?php echo $data1['dep_name']; ?></td>
                                <td style="text-align:left"><?php echo $data1['status_name']; ?></td>
                                <td style="text-align:center"><?php echo $data1['emp_fname']." ".$data1['emp_lname']; ?></td>  

                          
                          <td><button type="button" name="submitview" class="btn btn-icons  btn-primary btn-md"  data-toggle="modal" data-target="#ModalViewAC" onclick="showPM_DC_dt(<?php echo $data1['pm_id']; ?>)"><i class="mdi mdi-file-document"></i></button></td>
                          
                              
                      <?php } ?>
  
                     
                          </tr>
                         <?php endwhile; ?>


                  </table>
                  </form>
                  </div>
                  
                  </div>
<!------------------------------------------ /.modal detail------------------------------------------------------->
                </div>  
              </div>
            </div>
          </div>
        </div>
        
        
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
  </div>
  </div>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>


<!-- /.script modal ค้นหา -->
<script>
$(document).ready(function(){
      
        $('#tableshow').DataTable({
        "searching": true,
        "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหา",
          

        },
        "Paginate": {
            "sPrevious": "ก่อนหน้า", // This is the link to the previous page
            "sNext": "ถัดไป" // This is the link to the next page
        },
  
      retrieve: true,

      
});  
 }); 
</script>
  
  
<script>
              function showAC_DC_dt(str) {
              var xhttp;    
              if (str == "") {
                  document.getElementById("ViewAC").innerHTML = "";
                  return;
              }
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("ViewAC").innerHTML = this.responseText;
                  }
              };
              xhttp.open("GET", "../../getAC_DC_dt.php?id="+str, true);
              xhttp.send();
              }
</script>

<script>
              function showPM_DC_dt(str) {
              var xhttp;    
              if (str == "") {
                  document.getElementById("ViewAC").innerHTML = "";
                  return;
              }
              xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("ViewAC").innerHTML = this.responseText;
                  }
              };
              xhttp.open("GET", "../../getPM_DC_dt.php?id="+str, true);
              xhttp.send();
              }
  </script>
  
  
  
  

