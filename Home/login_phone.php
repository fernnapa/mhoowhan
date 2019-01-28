<?php
       if(isset($_GET['ERFdfgRTsTR'])){
        $id_eq = $_GET['ERFdfgRTsTR'];
    }
?>


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

  <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">

  
  <style>
            body{
                font-family: 'Kanit', sans-serif;
                background-image: url("../img/auth/login_1.jpg");
                height: auto; 
                background-size: cover;
            }
  </style>


</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <header class="head-form" align ="center">
                    <img class="user" src="../images/logo01.png" style="width:30%">
                    <h2 font style="font-family:Prompt;">Log In</h2>
                    <p><font size="2" color="red" style="font-family:Prompt;">*เฉพาะเจ้าหน้าที่ศูนย์คอมพิวเตอร์ มหาวิทยาเทคโนโลยีสุรนารี</font></p>
                </header><br/>
                <form name="frmlogin"  method="post" action="check_phone.php">
                <div class="form-group">
                  <label class="label"><b>Username</b></label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="emp_user" name="emp_user" placeholder="Username" required>
                    <input type="hidden" class="form-control" id="id_eq" name="id_eq" value="<?php echo $id_eq; ?>" >

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
      
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div> 
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit" name="" vlue="Login" style="font-family:Prompt;">เข้าสู่ระบบ</button>
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
            <p>
                <br/><span class="copytext">Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="http://ccs.sut.ac.th/2012/" target="_blank">The Center for Computer Services. SUT</a></span>
		        </p>
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