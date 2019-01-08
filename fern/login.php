<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Log In</title>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
   <link rel="stylesheet" href="../css/style-login.css">
   
</head>

<body>
      <div class="overlay">
         <!-- LOGN IN FORM by Omar Dsoky -->
         <form name="frmlogin"  method="post" action="check_log.php">
            <!--   con = Container  for items in the form-->
            <div class="con">
            <!--     Start  header Content  -->
               <header class="head-form">
               <img class="user" src="../images/user1.png" style="width:30%">
                  <h2>Log In</h2>
                  <!--     A welcome message or an explanation of the login form -->
                  <p>login here using your username and password</p>
               </header>
               <!--     End  header Content  -->
               <br>

               <div class="field-set" style="align:center;">
                  <!--   user name -->
                  <span class="input-item">
                     <i class="fa fa-user-circle"></i>
                  </span>
                  <!--   user name Input-->
                  <input class="form-input" id="emp_user" name="emp_user" type="text" placeholder="@UserName" required>
                  <br>
     
                  <!--   Password -->
                  <span class="input-item">
                     <i class="fa fa-key"></i>
                  </span>
                  <!--   Password Input-->
                  <input class="form-input" id="emp_pass" type="password" placeholder="Password"  name="emp_pass" required>
     
                  <!--      Show/hide password  -->
                  <span>
                     <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                  </span>
                  <br>
                  
                  <!--      button LogIn -->
                 
                  <button type="submit" name="" vlue="Login" class="log-in"> Log In </button><br/>
                  <button type="button" class="cancelbtn btn danger" onclick="window.location='../index.php'">Cancel</button>
               </div>  
               <!--   End Conrainer  -->
            </div>
            
            <!-- End Form -->
         </form>
      </div>
  
    <script  src="js/index.js"></script>

   </body>

</html>
