<?php
session_start();

include("../db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include("menu/link.php"); ?>    
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
    <?php include("menu/navbar_emp.php"); ?>
    <title>ดาวน์โหลดรายการยืม-คืนครุภัณฑ์</title>
        <body >
<!-- Modal ดูข้อมูลPM -->
<div class="card">
      <div class="card-body">    
                    <div class="container" > 
          
                    <table border="0" align="center" style="width:100%;" class="w3-teal">
                    <tr>
                    <td><p><h3 style="font-family:Prompt;"><b>ดาวน์โหลดรายการยืม-คืนครุภัณฑ์</b></h3></a></button></td>
                    </tr>
                    </table>

                    <div class="table-responsive" id="result">
                    <table align="right">
                    <tr>
                    <form method="post" action="../mint/Download_PM.php">
                    <td><input type="submit" name="export" class="btn btn-success" value="Export" /></td>
                    </tr>
                    </table>
                    <br>
                    <br>
                    <form id="form3"> 
                    <table id="tableshow" align="center" style="width:100%;" class="table table-striped table-bordered " >
                    <thead>
                    <tr style="font-family:Prompt; font-weight: bold; font-size: 15px;">
                        <td style="text-align: center;">Barcode</td>
                        <td style="text-align: center;">รายการ</td>
                        <td style="text-align: center;">รหัสหน่วยงาน</td>
                        <td style="text-align: center;">ชื่อหน่วยงาน</td>
                        <td style="text-align: center;">คำนำหน้าชื่อ</td>
                        <td style="text-align: center;">ชื่อ</td>
                        <td style="text-align: center;">ตำเเหน่ง</td>
                        <td style="text-align: center;">รหัสพนักงาน</td>
                        <td style="text-align: center;">Serial Number</td>
                        <td style="text-align: center;">สัญญาปี</td>
                        <td style="text-align: center;">สถานะ</td>
                        <td style="text-align: center;">TOR</td>


                   </tr>
                    </thead>
                    <tr>
                    <?php
                       $status_name = "ยืม - คืน";
                       $sql = "SELECT * FROM permit_detail 
                       LEFT JOIN permit
                       ON permit_detail.per_id = permit.pm_id
                       LEFT JOIN department
                       ON permit.pm_dep = department.dep_id
                       WHERE pmd_status_name = '$status_name'";

                         $result = mysqli_query($conn, $sql);
                       while($data = mysqli_fetch_array($result)):
                               $cn  =   $data['pmd_con_name'];
                               $tn  =   $data['pmd_type_name'];
                            
                            $tor = "SELECT * FROM tor
                            LEFT JOIN type_eq
                            ON tor.tor_type = type_eq.type_id
                            LEFT JOIN contract
                            ON tor.tor_contract = contract.con_id
                            WHERE type_name = '$tn' AND con_name = '$cn' ";
                            $result2 = mysqli_query($conn, $tor);
                            while($data2 = mysqli_fetch_array($result2)){
                                     $tor_name  = $data2['tor_name'];
                            }
                        
                        ?>
                        <td style="text-align:left"><?php echo $data['pmd_eq_barcode']; ?></td>
                        <td style="text-align:left"><?php echo $data['pmd_type_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_no']; ?></td>
                        <td style="text-align:left"><?php echo $data['dep_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_userTname']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_username']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_position']; ?></td>
                        <td style="text-align:left"><?php echo $data['pm_userno']; ?></td>
                        <td style="text-align:left"><?php echo $data['pmd_eq_serial']; ?></td>
                        <td style="text-align:left"><?php echo $data['pmd_con_name']; ?></td>
                        <td style="text-align:left"><?php echo $data['pmd_status_name']; ?></td>
                        <td style="text-align:left"><?php echo $tor_name; ?></td>

                   
                        </tr>
                       <?php endwhile; ?>
                </table>
                </form>
                </div>
                <br>
                </div>
<!-- /.data -->


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
  </div>
  </div>





<!-- /.script modal add -->
<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
          "searching": false,
        "lengthChange": false,
});  
 }); 
</script>
        </body>
</html>
