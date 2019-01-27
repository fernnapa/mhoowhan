<?php  
session_start();
include("../Home/db_connect.php");
$_SESSION['chooseEq'] = array();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <?php include("menu/link.php"); ?>
  <title>รายการจัดสรรครุภัณฑ์</title>
  

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
         
    </style>

</head>

<?php include("menu/navbar_emp.php"); ?>

<body>
  
                    <div class="modal fade" tabindex="1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title"><b>รายการจัดสรรครุภัณฑ์</b></h4>
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
                    <td><h3><b>รายการจัดสรร/ยืม-คืน ครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    
                    
                    <div class="table-responsive" id="result">
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
                        <td style="text-align: center;">รายละเอียด</td>
                       


                        </tr>
                    </thead>
                    <tr>
                    <?php
                       $sql = "SELECT * FROM allocate
                            LEFT JOIN a_status
                            ON allocate.ac_status = a_status.status_id
                            LEFT JOIN department
                            ON allocate.ac_dep = department.dep_id
                          
                          
                            WHERE ac_status = 2";
                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                         $id = $data['ac_id'];
                         $stn = $data['status_name'];

                         if($stn == "จัดสรร"){ ?>
                          <td style="text-align:left"><?php echo $data['ac_title']; ?></td>
                          <td style="text-align:left"><?php echo $data['ac_name']; ?></td>
                          <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                          <td style="text-align:left"><?php echo $data['ac_empid']; ?></td>
                          <td style="text-align:left"><?php echo $data['status_name']; ?></td>
                          
                          <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['ac_id']; ?>)">ดูรายละเอียด</button></td>
                          
                              
                      <?php } ?>
  
                     
                          </tr>
                         <?php endwhile; ?>

                         <?php
                                $sql2 = "SELECT * FROM permit
                                LEFT JOIN a_status
                                ON permit.pm_status = a_status.status_id
                                LEFT JOIN department
                                ON permit.pm_dep = department.dep_id
                              
                                WHERE pm_status= 3 ";
                              $result2 = mysqli_query($conn, $sql2);
                              while($data1 = mysqli_fetch_array($result2)):
                              $idpm = $data1['pm_id'];
                              $stnpm = $data1['status_name'];

                              if($stnpm == "ยืม - คืน"){ ?>  
                                <td style="text-align:left"><?php echo $data1['pm_name']; ?></td>
                                <td style="text-align:left"><?php echo $data1['pm_username']; ?></td>
                                <td style="text-align:left"><?php echo $data1['dep_name']; ?></td>
                                <td style="text-align:left"><?php echo $data1['pm_userno']; ?></td>
                                <td style="text-align:left"><?php echo $data1['status_name']; ?></td>
                          
                          <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showPM_DC_dt(<?php echo $data1['pm_id']; ?>)">ดูรายละเอียด</button></td>
                          
                              
                      <?php } ?>
  
                     
                          </tr>
                         <?php endwhile; ?>


                  </table>
                  </form>
                  </div>
                  
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
              xhttp.open("GET", "getAC_DC_dt.php?id="+str, true);
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
              xhttp.open("GET", "getPM_DC_dt.php?id="+str, true);
              xhttp.send();
              }
  </script>
  
  
  
  
  
  
  
  
          </body>
  </html>
  
  
















