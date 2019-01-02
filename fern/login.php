<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    rel="stylesheet">
</head>
<body>
    <div class="loginBox">
    <img class="user" src="images/user.png">
    <h3>Sign in </h3>
    <form name="frmlogin"  method="post" action="check_log.php">
        <div class="inputBox">
            <input type="text" id="emp_user" required name="emp_user" placeholder="Username">
            <span><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
        <div class="inputBox">
            <input type="password" id="emp_pass"required name="emp_pass" placeholder="Password">
            <span><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
            <input type="submit" name="" vlue="Login">

        </form>
    </div>

</body>
</html>