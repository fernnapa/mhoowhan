<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบติดตามการใช้งานครุภัณฑ์คอมพิวเตอร์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/favicon.png" type="image/png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-theme-aa { color:#fff !important; background-color:#1abc9c !important}</style>

<style>
body {
  margin: 0;
}
.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 40px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 60px;
  
}
</style>
</head>
<body>

<div class="header">
  <div class="w3-bar w3-theme-aa w3-center-align w3-large w3-card-2">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-teal w3-hover-teal"><img src="img/logo11.png" alt=""></a>
  <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-right w3-hover-red w3-hover-text-white w3-teal" title="ออกจากระบบ">LOGOUT&nbsp;&nbsp;<i class="fa fa-sign-in"></i></a> -->
  <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-teal w3-right w3-hover-red w3-teal">LOGIN</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-teal w3-right">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-teal w3-right">REPORT</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-teal w3-right">MAP</a>
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hover-text-teal w3-right">HOME</a>
 </div>
</div>
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d1 w3-hide w3-hide-large w3-hide-medium w3-white">
    <a href="index.php" class="w3-bar-item w3-button w3-text-teal ">HOME</a>
    <a href="#team" class="w3-bar-item w3-button w3-text-teal ">MAP</a>
    <a href="#work" class="w3-bar-item w3-button w3-text-teal">REPORT</a>
    <a href="#pricing" class="w3-bar-item w3-button  w3-text-teal">CONTACT</a>
    <a href="login.php" class="w3-bar-item w3-button  w3-text-red">LOGIN&nbsp;&nbsp;<i class="fa fa-sign-in"></i></a>
  </div>
</div>
</body>
</html>

<script>
// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "80%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

