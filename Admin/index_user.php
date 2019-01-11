<?php  
session_start();
include("../Home/db_connect.php");
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index_user.php">
          <img src="../images/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index_user.php">
          <img src="../images/favicon.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right" style="font-family:Prompt;">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, คุณ <?php echo $_SESSION["User"] ?></span>
              <img class="img-xs rounded-circle" src="images/faces/face2.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2" href ="#">
                จัดการข้อมูลส่วนตัว
              </a>
              <a class="dropdown-item" href ="../Home/logout.php">
               ออกจากระบบ
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="font-family:Prompt;">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces/face2.jpg" alt="profile image">      <!--    เอารูปมาแสดง  --->
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">คุณ <?php echo $_SESSION["User"] ?></p>
                  <div>
                    <small class="designation text-muted">Manager</small>      <!--    เอาตำแหน่งมาแสดง  --->
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <hr  class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto " style="width: 100%;">
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index_user.php">           <!-----  หน้าแรก----->
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">หน้าแรก</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">จัดการข้อมูล</span>
              <i class="menu-title"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/index_map.php">
              <i class="menu-icon mdi mdi-flag-variant"></i>
              <span class="menu-title">แผนที่</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">แผนภูมิ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">รายงาน</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">         
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                

                <div class="container">  
                <h2 align ="center">รายการครุภัณฑ์คอมพิวเตอร์ </h2>
                <br />  
                <div class="table-responsive">  
                <td align="center"><a href='' class='btn btn-success'>ย้อนกลับ</a></button></td>
                <br/><br/>
                     <table id="com_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr align="center">  
                                    
                                    <td>Barcode</td>  
                                    <td>รายการ</td>  
                                    <td>SN Number</td> 
                                    <td>สัญญาเช่า</td> 
                                    <td>สถานะ</td>
                                    <td width ="15">action</td>
                                    <td width ="15"></td>
                                    <!-- <td width ="15"></td> -->
                                    
                               </tr>  
                          </thead>  
                          <?php  
                          $query ="SELECT * FROM equipment 
                          LEFT JOIN tor ON equipment.eq_tor = tor.tor_id
                          LEFT JOIN type_eq ON tor.tor_type = type_eq.type_id
                          LEFT JOIN contract ON tor.tor_contract = contract.con_id
                          LEFT JOIN a_status ON equipment.eq_status = a_status.status_id 
                          WHERE eq_status ='1'
                          ORDER BY eq_id DESC";  
                          $result = mysqli_query($conn, $query);  
                   
                          while($row = mysqli_fetch_array($result))  
                          {  

                              
                               echo '  
                               <tr>  
                                    
                                    <td>'.$row["eq_barcode"].'</td>
                                    <td>'.$row["type_name"].'</td>  
                                    <td>'.$row["eq_serial"].'</td>
                                    <td>'.$row["con_des"].' </td>
                                    <td>'.$row["status_name"].'</td>
                                    <form class="form-inline" onsubmit="openModal()" id="myFormEdit">
                                    <td align="center"><button type="submit" id="detail"class="btn btn-info btn - viewdata" data-toggle="modal" data-target="#myModalView" value="'.$row["eq_id"].'" onclick="showEquipment('.$row["eq_id"].')" form="myFormView"><i class="glyphicon glyphicon-pencil">&nbsp;</i>ดูรายละเอียด</button></td>';  
                                    
                                    if ($row["status_name"] == "จัดสรร"){

                                        echo"<td align='center'><a class='btn btn-danger' data-role='update'>จัดสรรแล้ว</a></button></td>";

                                    }else{
                                        echo"<td align='center'><a href='updatelist.php? eq_id=$row[eq_id]'< class='btn btn-success' data-role='update'>จัดสรร</a></button></td>";
                                    }
                                     
                                   //  if ($row["status_name"] == "รอจัดสรร"){
                                   //      echo"<td align='center'><a class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   // }else{
                                   //      echo"<td align='center'><a href='editlist.php? eq_id=$row[eq_id]'< class='btn btn-warning' data-role='update'>แก้ไข</a></button></td>";
                                   // }
                        
                                echo  "</tr>";
                               
                          }  
                          ?>  
                     </table> 


                                 <div class="modal fade" tabindex="-1" role="dialog" id="myModalView">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">รายละเอียด</h4>
                            </div>
                                    <div class="modal-body">
                                            
                                            <table style="width:90%" align="center" id="txtHint">
                                                                                                    
                                             </table>
                                             </form>
                </div>  
                <div class="modal-footer">
                         <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
               </div>
               </div>       
                    
                   
                                         
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

<script>  
                    $(document).ready(function(){  
                    $('#com_data').DataTable();  
                    });  
 </script>  

<script>
                    $('#myFormView').on('submit', function(e){
                    $('#myModalView').modal('show');
                    e.preventDefault();
                    });
            </script>
            
<!-- /.script edit -->   
<!-- /.script showmodal -->   

            <script>
            function showEquipment(str) {
            var xhttp;    
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "select.php?id="+str, true);
            xhttp.send();
            }
            </script>