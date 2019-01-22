<?php
    include("../Home/db_connect.php");

    $id = $_POST["emp_id"];
    $fname = $_POST["emp_fname"];
    $lname = $_POST["emp_lname"];
    $position = $_POST["emp_position"];
    $tel = $_POST["emp_tel"];
    $mail = $_POST["emp_mail"];
    $user = $_POST["emp_user"];
    $pass = $_POST["emp_pass"];
    $photo = basename($_FILES['file']['name']);

    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);

    $sqlpic = "SELECT * FROM employee WHERE emp_id='".$id."'";
    $resultpic =mysqli_query($conn,$sqlpic);
    $row = mysqli_fetch_assoc($resultpic);
    $path = 'img/'.$row["emp_pic"];
    unlink($path);

// echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    // echo "File is valid, and was successfully uploaded.\n";
} else {
    // echo "Possible file upload attack!\n";
}

// echo 'Here is some more debugging info:';
// print_r($_FILES);

// print "</pre>";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE employee SET 
    emp_fname ='" . $fname . "', 
    emp_lname ='" . $lname . "',
    emp_pass ='" . $position . "', 
	emp_tel ='" . $tel . "',
    emp_mail ='" . $mail . "',
    emp_user ='" . $user . "',
    emp_pass ='" . $pass . "',
    emp_pic ='" . $photo . "'
    WHERE emp_id =" . $id;

    if (mysqli_query($conn, $sql)) {
		echo "<script>
                alert('Profile have been saved sucessfully!')
                window.location.href = 'index_profile.php'   
            </script> ";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
