<?php
include("../db_connect.php");
session_start();


?>
<!DOCTYPE html>
<html>
    <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include("menu/link.php"); ?>     
    <style>
             .modal-dialog.a{
                max-width : 1020px;
                max-height: 550px;
            }
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
    <?php include("menu/navbar_emp.php"); ?>

    <title>แบบฟอร์มการจัดสรร</title>
        <body >
        <div class="card">
        <div class="card-body">
<!-- Modal ดูข้อมูลPM -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalViewAC">
                            <div class="modal-dialog a" role="document">
                            <div class="modal-content">
                            <div class="card">
                            <div class="card-body">
                            <div class="modal-header">
                            <h4 style="font-family:Prompt;" class="modal-title"><b>รายการจัดสรรครุภัณฑ์</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                                    <div class="modal-body table-responsive">
                                            <form id="ViewAC" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-family:Prompt;">ปิด</button>
                                        </div>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>


                
                <div class="container" > 
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>เเบบฟอร์มการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>
                    <div class="table-responsive">
                        <p></p>
                        <form id="form3"> 
                        <table id="tableshow" align="center" style="width:100%;" class="table table-hover table-striped table-bordered" >
                        <thead>
                        <tr style="font-weight: bold;">

                        <td style="text-align: center;">จุดประสงค์การจัดสรร</td>
                        <td style="text-align: center;">ชื่อผู้เช่ายืม</td>
                        <td style="text-align: center;">หน่วยงาน</td>
                        <td style="text-align: center;">พนักงานจัดสรร</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">รายละเอียด</td>
                        <td style="text-align: center;">แบบฟอร์ม</td>

                    </tr>
                    </thead>
                   <?php $query = "SELECT * FROM permit
                        LEFT JOIN a_status
                        ON permit.pm_status = a_status.status_id
                        LEFT JOIN department
                        ON permit.pm_dep = department.dep_id
                        WHERE pm_status= 3";
                    $result = mysqli_query($conn, $query);
                    while($data = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                    <td style="text-align:left"><?php echo $data['pm_name']; ?></td>
                    <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                    <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                    <td style="text-align:left"><?php echo $data['pm_empno']; ?></td>
                    <td style="text-align:left"><?php echo $data['status_name']; ?></td>

                    <td><button type="button" name="submitview" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#ModalViewAC" onclick="showAC_DC_dt(<?php echo $data['pm_id']; ?>)" style="font-family:Prompt;">ดูรายละเอียด</button></td>
                    <td><a href="PDF_PM.php?pm_id=<?php echo $data['pm_id']; ?>" class="btn btn-danger" data-role="pdf" style="font-family:Prompt;">แบบฟอร์ม</a></button></td> 
                    </tr> 
                    <?php } ?>
        </table>
                    <br>
                    <div class="table-responsive" id="result">
                    
                </div>
                     
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
      </div>
    </div>
  </div>
  </div>
  </div>



<!-- /.data -->
<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": true,

        "oLanguage": {
        "sSearch": "ค้นหา : "
        },
        retrieve: true,
});  
 }); 
</script>

<script>
            function showAC(str) {
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
            xhttp.open("GET", "get_ALL_AC.php?id="+str, true);
            xhttp.send();
            }
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
            xhttp.open("GET", "../getPM_DC_dt.php?id="+str, true);
            xhttp.send();
            }
</script>

<script>
            function showAC_dt(str) {
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
            xhttp.open("GET", "getPM_dt.php?id="+str, true);
            xhttp.send();
            }
</script>




        </body>
</html>
