<link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">

<div class="container-scroller" >
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index_admin.php">
        <img src="../../images/banner.png" alt="logo" style="width: 170px; height: 50px;"/>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index_admin.php">
          <img src="../../images/favicon.png" alt="logo" />
        </a>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="gen_qr.php" class="nav-link"><i class="mdi mdi-qrcode"></i>สร้าง QR Code
            </a>
          </li>
        </ul>

        <ul class="navbar-nav navbar-nav-right" style="font-family:Prompt;">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, คุณ <?php echo $_SESSION["User"] ?></span>
              <img class="img-xs rounded-circle" src="img/<?php echo $_SESSION["emp_pic"]; ?>" alt="Profile image">
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
              <a class="dropdown-item mt-2" href ="index_profile.php">
                จัดการข้อมูลส่วนตัว
              </a>
              <a class="dropdown-item" href ="../../Home/logout.php">
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
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="font-family:Prompt;">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="img/<?php echo $_SESSION["emp_pic"]; ?>" alt="profile image">      <!--    เอารูปมาแสดง  --->
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">คุณ <?php echo $_SESSION["User"] ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $_SESSION["emp_position"] ?></small>      <!--    เอาตำแหน่งมาแสดง  --->
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <hr  class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto " style="width: 100%;">
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index_admin.php">           <!-----  หน้าแรก----->
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">หน้าแรก</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title" >จัดการข้อมูล</span>
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
                  <a class="nav-link" href="index_emp.php">ข้อมูลเจ้าหน้าที่</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Backup_CON.php">
              <i class="menu-icon mdi mdi-package"></i>
              <span class="menu-title">Back Up สัญญา</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index_map.php">
              <i class="menu-icon mdi mdi-flag-variant"></i>
              <span class="menu-title">แผนที่</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="chart.php">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">แผนภูมิ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../Home/logout.php">
              <i class="menu-icon mdi mdi-logout"></i>
              <span class="menu-title">ออกจากระบบ</span>
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