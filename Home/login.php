<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>เข้าสู่ระบบ</title>
  <link rel="icon" href="../images/favicon.png" type="image/png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../admin/images/favicon.png" />

 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <header class="head-form" align ="center">
                    <img class="user" src="../images/user1.png" style="width:30%">
                    <h2>Log In</h2>
                    <p>login here using your username and password</p>
                </header><br/>
                <form name="frmlogin"  method="post" action="check_log.php">
                <div class="form-group">
                  <label class="label"><b>Username</b></label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="emp_user" name="emp_user" placeholder="Username" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label"><b>Password</b></label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="emp_pass" name="emp_pass"  placeholder="*********" required>
                    <span>
                     <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                    </span>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit" name="" vlue="Login">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <br/><br/>
            <p>
                <span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
		    </p>
            <!-- <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p> -->
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="../admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../admin/js/off-canvas.js"></script>
  <script src="../admin/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>