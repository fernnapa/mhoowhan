<?php  
session_start();
?>  
<?php
include_once("../../fern/con_db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อมูลหน่วยงาน</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>  
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="../index_admin.php">
          <img src="../../images/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index_admin.php">
          <img src="../../images/favicon.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, คุณ <?php echo $_SESSION["User"] ?></span>
              <img class="img-xs rounded-circle" src="../images/faces/face2.jpg" alt="Profile image">
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
              <a class="dropdown-item" href ="../../fern/logout.php">
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
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="../images/faces/face2.jpg" alt="profile image">      <!--    เอารูปมาแสดง  --->
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
            <a class="nav-link" href="../index_admin.php">           <!-----  หน้าแรก----->
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">หน้าแรก</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">จัดการข้อมูล</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="index_eq.php">ข้อมูลครุภัณฑ์คอมพิวเตอร์</a>         <!-----  หน้า จัดการ ----->
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index_tor.php">ข้อมูลประเภทครุภัณฑ์</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index_department.php">ข้อมูลหน่วยงาน</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index_emp.php">ข้อมูลผู้ใช้งาน</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">แผนที่</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">แผนภูมิ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/font-awesome.html">
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
                  <h3 align="center">ข้อมูลหน่วยงาน</h3><br />  
                  <div class="table-responsive">
                    <!-- /.data -->
                    <div class="container w3-card-2 w3-round-large" style="width:70% " >          
                      <table align="center" style="width:100%">
                        <tr>
                        <form class="form-inline" onsubmit="openModal()" id="myForm">
                        <th colspan="6"><input type="text" style="width:100%;" size="50" name="search_text" id="search_text" class="form-control"></th>
                        <th style="text-align:right;"><button type="submit" class="btn btn-success btn-block" onclick="window.location='../../GoogleMap/create_dep.php'">เพิ่มข้อมูล</button></th>
                        </form>                        
                        </tr>
                      </table>
                    </div>
                    <br>
                    
                    <div class="container w3-card-2 w3-round-large" style="width:100% ">  
                        <table id="data-table" class="table table-bordered">  
                            <thead>  
                              <tr >  
                                <td style="text-align: center;">หมายเลขหน่วยงาน</td>
                                <td style="text-align: center;">ชื่อหน่วยงาน</td>
                                <td style="text-align: center;">แลตติจูด</td>
                                <td style="text-align: center;">ลองติจูด</td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>  
                              </tr>  
                            </thead>  
                        </table>  
                    </div>  
                    <!-- /.data


                   















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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>


<!-- /.script modal add -->

<script>
            function showDepartment(str) {
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
            xhttp.open("GET", "getDepartment.php?id="+str, true);
            xhttp.send();
            }
            </script>

